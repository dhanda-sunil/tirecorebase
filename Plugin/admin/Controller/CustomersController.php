<?php
App::uses('AppController', 'Controller');
/**
 * Customers Controller
 *
 * @property Customer $Customer
 */
class CustomersController extends AdminAppController {
    
    public $uses = array('Customer','Preference');

	public $components = array('RequestHandler');

	public function loadRelationships($id) {
		$this->Customer->recursive=1;
		$customer = $this->Customer->findById($id);
		//debug($customer);
		$this->set('customer', $customer);
		$this->set('_serialize', array('customer'));
	}
    
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Customer->recursive = 0;
		$customers = $this->paginate(null,array(
			'OR' => array(
				array('deleted'=>'0000-00-00 00:00:00'), // don't show deleted records <-- move this to the model:beforeFind
				array('deleted'=>NULL),
			),
			'active'=>1
		));
		$this->set('customers', $customers);

		// provide a return value for Bancha requests
		return array_merge($this->request['paging']['Customer'],
			array('records'=>$customers));
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Customer->id = $id;
		if (!$this->Customer->exists()) {
			throw new NotFoundException(__('Invalid customer'));
		}

		$this->set('customer', $this->Customer->read(null, $id));
		
		// provide a return value for Bancha requests
		return $this->Customer->data;
	}

/**
 * @banchaRemotable
 * This function searches though id, company_name, first_name and last_name
 *
 * Currently used in the TreadTracks WorkOrder CustomerSelection screen
 *
 * @param string $search the search values, separated by one or more spaces
 * @return Object[] an array of customer records
 */
	public function search($params=array()) {

		// search specific conditions
		$searchConditions = array();
		$params['search'] = isset($params['search']) ? $params['search'] : '';
		$strings = split(' ', $params['search']);
		$afterFindStringConditions = array();
		if(count($strings)>0 && !empty($strings[0])) {

			// there are some search conditions, add each individually
			foreach($strings as $string) {
				if(is_numeric($string)) {
					//it's a number, so only search on id
					$searchConditions[] = array(
						array('Customer.id =' => $string)
					);
				} else if(strlen($string)>2) {
					//for string searches we expect at least three chars
					$searchConditions[] = array(
						'OR' => array(
							array('Customer.company_name LIKE' => '%'.$string.'%'),
							array('Customer.first_name LIKE' => '%'.$string.'%'),
							array('Customer.last_name LIKE' => '%'.$string.'%')
						)
					);
				}
			}
		}

		// use pagination, it already handles sorting and pagination for us
		$this->Customer->recursive = 0;
		$customers = $this->paginate(null,array(
			'OR' => array(
				array('deleted'=>'0000-00-00 00:00:00'), // don't show deleted records <-- move this to the model:beforeFind
				array('deleted'=>NULL),
			),
			'active'=>1,
			$searchConditions
		));
		$this->set('customers', $customers);

		// provide a return value for Bancha requests
		return array_merge($this->request['paging']['Customer'],
			array('records'=>$customers));
	}
/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Customer->create();
            
            //echo '<pre>'; print_r($this->request->data); die;
            $customer  = $this->Customer->save($this->request->data);
			if ($customer) {
                //var_dump($customer['Customer']['id']);
                //echo '<pre>'; print_r($customer); die;
                $addr = array('ref_id' => $customer['Customer']['id'], 'ref_table'=>'customers');

                $addressObj = ClassRegistry::init('Address');
                $accountObj = ClassRegistry::init('Account');
                
                if( count(array_diff($this->request->data['Address'],$this->request->data['Address2'])) == 0 ){
                    $addr['is_shipping'] = $addr['is_billing'] = 1;
                    $address = $addressObj->save( array_merge($this->request->data['Address'], $addr) );
                    $address2['Address']['id'] = $address['Address']['id'];
                }
                else{
                    $addressObj->create();
                    $addr['is_billing'] = '1';
                    $address = $addressObj->save( array_merge($this->request->data['Address'], $addr) );
                    $addressObj->create();
                    $addr['is_billing'] = '0';
                    $addr['is_shipping'] = '1';
                    $address2 = $addressObj->save( array_merge($this->request->data['Address2'], $addr) );
                }
                
                $accountObj->create();
                $accountObj->save(array(
                    'customer_id' => $customer['Customer']['id'],
                    'account_type_id' => $this->request->data['Account']['account_type'],
                    'number' => $this->request->data['Account']['number'],
                    'active' => '1',
                    'default_bill_to_id' => $address['Address']['id'],
                    'default_ship_to_id' => $address2['Address']['id']
                ));
                
                $this->Preference->create();
                $this->Preference->save(array(
                    'Preference' => array(
                        'type' => 'customer',
                        'key_id' => $customer['Customer']['id'],
                        'name' => 'repairs.maxAllowed',
                        'value' => $this->request->data['Preference']['AllowedRepairs'],
                        'value_type' => 'int'
                    )
                ));
                $this->Preference->create();
                $this->Preference->save(array(
                    'Preference' => array(
                        'type' => 'customer',
                        'key_id' => $customer['Customer']['id'],
                        'name' => 'fail.scrapOrReturn',
                        'value' => $this->request->data['Preference']['ScrapOrReturn'],
                        'value_type' => 'string'
                    )
                ));
                
				// provide a return value for Bancha requests
				// never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
				if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
					return $this->Customer->getLastSaveResult();
				}

				$this->Session->setFlash(__('The customer has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {

				// provide a return value for Bancha requests
				// never use SessionComponent::setFlash() in Bancha requests
				if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
					return $this->Customer->getLastSaveResult();
				}

				$this->Session->setFlash(__('The customer could not be saved. Please, try again.'));
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
		$this->Customer->id = $id;
		if (!$this->Customer->exists()) {
			throw new NotFoundException(__('Invalid customer'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Customer->save($this->request->data)) {

				// provide a return value for Bancha requests
				// never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
				if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
					return $this->Customer->getLastSaveResult();
				}
                
                if(isset($this->request->data['Preference']['AllowedRepairs']) && $this->request->data['Preference']['AllowedRepairs'] != ''){
                    $preference = $this->Preference->find('first',array('conditions'=>array('key_id'=>$id,'type'=>'customer','name'=>'repairs.MaxAllowed')));
                    if($preference){
                        $this->Preference->id = $preference['Preference']['id'];
                    }
                    else{
                        $this->Preference->create();
                    }
                    $this->Preference->save(array('type'=>'customer','key_id'=>$id,'name'=>'repairs.MaxAllowed','value'=>$this->request->data['Preference']['AllowedRepairs'])); 
                }
				$this->Session->setFlash(__('The customer has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {

				// provide a return value for Bancha requests
				// never use SessionComponent::setFlash() in Bancha requests
				if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
					return $this->Customer->getLastSaveResult();
				}

				$this->Session->setFlash(__('The customer could not be saved. Please, try again.'));
			}
		} else {
			// Bancha will never do this request, so no return needed here
			$this->request->data = $this->Customer->read(null, $id);
            $preferences = $this->Preference->find('all',array('conditions'=>array('key_id'=>$id,'type'=>'customer')));
            foreach($preferences as $i){
                $this->set(preg_replace('/\./','',$i['Preference']['name']),$i['Preference']['value']);
            }
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
		$this->Customer->id = $id;
		if (!$this->Customer->exists()) {
			throw new NotFoundException(__('Invalid customer'));
		}
		if ($this->Customer->delete()) {

			// provide a return value for Bancha requests
			// never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
			if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
				return $this->Customer->getLastSaveResult();
			}

			$this->Session->setFlash(__('Customer deleted'));
			$this->redirect(array('action' => 'index'));
		}

		// provide a return value for Bancha requests
		// never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
		if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
			return $this->Customer->getLastSaveResult();
		}

		$this->Session->setFlash(__('Customer was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
