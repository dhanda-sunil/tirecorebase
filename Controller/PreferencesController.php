<?php
App::uses('AppController', 'Controller');
/**
 * Preferences Controller
 *
 * @property Preference $Preference
 */
class PreferencesController extends AppController {

    public $uses = array('Preference','Customer','RetreadTemplate');
    
/**
 * getCustomerRepairPrefs
 * returns preferences for supplied tire size, if no preference exists for the tire size then defaults are returned, else an error
 * @banchaRemotable
 * @param int $customer_id
 * @param int $size_id
 * @return array
 */
    public function getCustomerRepairPrefs($customer_id,$size_id = null){
        // @todo will need to check for preference over-rides once that feature has been implemented
        
        // reduce joins
        $this->Customer->unbindModelAll();
        // get customers default retread preference template
		$customer = $this->Customer->find('first',array(
            'fields' => 'Customer.retread_template_id',
            'conditions' => array('Customer.id'=>$customer_id),
        ));
        
        // customer not found - return error
        if( !$customer ){
            return array('success'=> false,'error' => 'Customer record not found [id:'.(INT)$customer_id.']');
        }
        
        // get preferences from this template
        $template = $this->RetreadTemplate->getRetreadTemplatePreferences($customer['Customer']['retread_template_id']);

        // check for tread_design_id based on $size_id parameter
		if ($template) {
			foreach($template['RetreadTemplatePreference'] as $x => $i){        
				if($x == $size_id){
					return $i;
				}
			}
		}

        // if $size_id preference does not exist - attempt using default
        if( isset($template['RetreadTemplatePreference'][0]) ){
            return $template['RetreadTemplatePreference'][0];
        }
        
        return array('success' => false, 'error' => 'No preferences were found for this customer. Please assign a retread preference template to this customer.');
    }

/**
 * getPreferredTreadDesign
 * returns a customers preferred tread design
 * @banchaRemotable
 * @param int Customer ID
 * @param int Tire Size ID
 * @return array
 */
	public function getPreferredTreadDesign($customer_id = null, $size_id = null) {
        // @todo will need to check for preference over-rides once that feature has been implemented
        
        // reduce joins
        $this->Customer->unbindModelAll();
        // get customers default retread preference template
		$customer = $this->Customer->find('first',array(
            'fields' => 'Customer.retread_template_id',
            'conditions' => array('Customer.id'=>$customer_id),
        ));
        
        // customer not found - return error
        if( !$customer ){
            return array(
            	'success'=> false,
            	'message' => 'Customer record not found [id:'.(INT)$customer_id.']');
        }
        
        // get preferences from this template
        $template = $this->RetreadTemplate->getRetreadTemplatePreferences($customer['Customer']['retread_template_id']);
        
        // set variables
        $tread_design_id = 0;
		
		// check for tread_design_id based on $size_id parameter
		if ($template) {
			foreach($template['RetreadTemplatePreference'] as $x => $i){        
				if($x == $size_id){
					// find preferred tread design
					foreach($i['preferences'] as $j){
						if($j['name'] == $j['tread-pref'] && $j['value'] != 0){
							$tread_design_id = $j['value'];
							break;
						}
					}
					break;
				}
			}
		}

        // if $size_id preference does not exist - attempt using default
        if( !$tread_design_id && isset($template['RetreadTemplatePreference'][0]) ){
            foreach($template['RetreadTemplatePreference'][0]['preferences'] as $j){
                if($j['name'] == $j['tread-pref'] && $j['value'] != 0){
                    $tread_design_id = $j['value'];
                    break;
                }
            }
        }
        
        if( !$tread_design_id ){
            //return array('success' => true, 'error' => 'Preference does not exist for this tire size [id:'.(INT)$size_id.']');
	        return array();
        }
        
        return array('tread_design_id' => $tread_design_id);
	}
    
/**
 * @banchaRemotable
 */
	public function getCustomerPref($customer_id, $pref_name) {
		$preference =  $this->Preference->find('all', array(
			'conditions' => array(
				'type' => 'customer',
				'key_id' => $customer_id,
				'name' => $pref_name
			)
		));
        
        if(!$preference){
            return array('success'=>0);
        }
        
        return $preference;
	}

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Preference->recursive = 0;
		$preferences = $this->paginate();
		$this->set('preferences', $preferences);

		// provide a return value for Bancha requests
		return array_merge($this->request['paging']['Preference'],
			array('records'=>$preferences));
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Preference->id = $id;
		if (!$this->Preference->exists()) {
			throw new NotFoundException(__('Invalid preference'));
		}
		$this->set('preference', $this->Preference->read(null, $id));

		// provide a return value for Bancha requests
		return $this->Preference->data;
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Preference->create();
			if ($this->Preference->save($this->request->data)) {

				// provide a return value for Bancha requests
				// never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
				if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
					return $this->Preference->getLastSaveResult();
				}

				$this->Session->setFlash(__('The preference has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {

				// provide a return value for Bancha requests
				// never use SessionComponent::setFlash() in Bancha requests
				if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
					return $this->Preference->getLastSaveResult();
				}

				$this->Session->setFlash(__('The preference could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Preference->id = $id;
		if (!$this->Preference->exists()) {
			throw new NotFoundException(__('Invalid preference'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Preference->save($this->request->data)) {

				// provide a return value for Bancha requests
				// never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
				if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
					return $this->Preference->getLastSaveResult();
				}

				$this->Session->setFlash(__('The preference has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {

				// provide a return value for Bancha requests
				// never use SessionComponent::setFlash() in Bancha requests
				if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
					return $this->Preference->getLastSaveResult();
				}

				$this->Session->setFlash(__('The preference could not be saved. Please, try again.'));
			}
		} else {
			// Bancha will never do this request, so no return needed here
			$this->request->data = $this->Preference->read(null, $id);
		}
	}

/**
 * delete method
 *
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Preference->id = $id;
		if (!$this->Preference->exists()) {
			throw new NotFoundException(__('Invalid preference'));
		}
		if ($this->Preference->delete()) {

			// provide a return value for Bancha requests
			// never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
			if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
				return $this->Preference->getLastSaveResult();
			}

			$this->Session->setFlash(__('Preference deleted'));
			$this->redirect(array('action' => 'index'));
		}

		// provide a return value for Bancha requests
		// never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
		if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
			return $this->Preference->getLastSaveResult();
		}

		$this->Session->setFlash(__('Preference was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
