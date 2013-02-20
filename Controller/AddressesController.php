<?php
App::uses('AppController', 'Controller');

/**
 * Addresses Controller
 *
 * @property Address $Address
 */
class AddressesController extends AppController {

    public $components = array('DataTable');
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Address->recursive = 0;
		$this->Paginator->setAllowedFilters(array('is_billing', 'is_shipping', 'ref_table', 'ref_id')); // allow Bancha to remotly filter
		$addresses = $this->paginate(array(
			'OR' => array(
				array('deleted'=>'0000-00-00 00:00:00'), // don't show deleted records <-- move this to the model:beforeFind
				array('deleted'=>NULL),
			),
			'active'=>1
		));
		$this->set('addresses', $addresses);

		// provide a return value for Bancha requests
		return array_merge($this->request['paging']['Address'],
			array('records'=>$addresses));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Address->id = $id;
		if (!$this->Address->exists()) {
			throw new NotFoundException(__('Invalid address'));
		}
		$this->set('address', $this->Address->read(null, $id));
        $this->set('_serialize','address');

		// provide a return value for Bancha requests
		return $this->Address->data;
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Address->create();
            
            $address = array_merge_recursive($this->request->data,array('Address'=>array('is_billing'=>0,'is_shipping'=>0)));
            
            switch($address['Address']['address_type']){
                case 'Both':
                    $address['Address']['is_shipping'] = 1;
                    $address['Address']['is_billing'] = 1;
                    break;
                case 'Shipping':
                    $address['Address']['is_shipping'] = 1;
                    break;
                case 'Billing':
                    $address['Address']['is_billing'] = 1;
                    break;
            }
            
			if ($this->Address->save($address)) {

				// provide a return value for Bancha requests
				// never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
				if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
					return $this->Address->getLastSaveResult();
				}

                $this->set('response',array('success'=>1, 'title'=> 'Address Saved', 'Address' => $this->Address->read()));
                $this->set('_serialize','response');
			} else {

				// provide a return value for Bancha requests
				// never use SessionComponent::setFlash() in Bancha requests
				if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
					return $this->Address->getLastSaveResult();
				}

                $this->set('response',array('success'=>0, 'errors'=>  $this->Address->validationErrors));
                $this->set('_serialize','response');
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Address->id = $id;
		if (!$this->Address->exists()) {
			throw new NotFoundException(__('Invalid address'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Address->save($this->request->data)) {

				// provide a return value for Bancha requests
				// never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
				if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
					return $this->Address->getLastSaveResult();
				}

                $this->set('response',array('success'=>1, 'title'=> 'Address Saved', 'Address' => $this->Address->read()));
                $this->set('_serialize','response');

			} else {
				// provide a return value for Bancha requests
				// never use SessionComponent::setFlash() in Bancha requests
				if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
					return $this->Address->getLastSaveResult();
				}

                $this->set('response',array('success'=>0, 'errors'=>  $this->Address->validationErrors));
                $this->set('_serialize','response');
			}
		} else {
			// Bancha will never do this request, so no return needed here
			$this->request->data = $this->Address->read(null, $id);
		}
	}

/**
 * delete method
 *
 * @throws MethodNotAllowedException
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Address->id = $id;
		if (!$this->Address->exists()) {
			throw new NotFoundException(__('Invalid address'));
		}
		if ($this->Address->delete()) {

			// provide a return value for Bancha requests
			// never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
			if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
				return $this->Address->getLastSaveResult();
			}

			$this->Session->setFlash(__('Address deleted'));
			$this->redirect(array('action' => 'index'));
		}
		
		// provide a return value for Bancha requests
		// never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
		if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
			return $this->Address->getLastSaveResult();
		}

		$this->Session->setFlash(__('Address was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
    
    public function getby_type($ref_table, $ref_id = false){
        
        if($this->RequestHandler->responseType() == 'json'){
            
            $conditions = array(
                'active'=>1,
                'ref_table' => $ref_table
            );
            
            if( $ref_id !== false ){
                $conditions = array_merge($conditions, array(
                    'ref_id' => $ref_id
                ));
            }
            
            $this->paginate = array(
                'fields' => array('Address.id','Address.name','Address.line1', 'Address.line2', 'Address.city', 'Address.state', 'Address.zip',
                 "if(is_shipping=1 and is_billing=1,'Both',if(is_shipping=1,'Shipping',if(is_billing=1,'Billing',''))) as address_type"),
                'conditions' => $conditions
            );
            $this->DataTable->fields = array('Address.name','Address.line1', 'Address.line2', 'Address.city', 'Address.state', 'Address.zip','0.address_type','Address.id');
            $this->DataTable->emptyElements = 1;
            $this->set('address',$this->DataTable->getResponse($this,$this->Address));
            $this->set('_serialize','address');
        }
        else{
            
        }
    }
}
