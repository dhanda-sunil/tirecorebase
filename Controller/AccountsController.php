<?php
App::uses('AppController', 'Controller');
/**
 * Accounts Controller
 *
 * @property Account $Account
 */
class AccountsController extends AppController {
    
    public $uses = array('Account','Address');
	
    /**
	 * Fill in a new account for each Customer
 	 */
	public function fill() {

		$this->loadModel('Customer');

		$customers = $this->Customer->find('all');
		echo "<h2>Account creations:</h2><ul>";
		foreach($customers as $customer) {
			$this->Account->create();
			$customer_name = $customer['Customer']['company_name'];
			$data=array(
				'customer_id' => $customer['Customer']['id'],
				'account_category_id' => 0,
				'account_type_id' => 0,
				'number' => rand(1000,10000),
				'desc' => sprintf("Initial account for %s", $customer_name),
			);
			printf("<li>%s</li>", $customer_name);
			$this->Account->save($data);
		}

		die();
	}

	public function fillAddresses() {
		$this->loadModel("Address");
		$this->loadModel('PhoneNumber');
		$this->loadModel('Customer');

		$customers = $this->Customer->find('all');
		$streets = array('Main St.', 'Park St.', 'Lincoln Ave', 'Wonderland Lane', 'Tread Road', 'Jefferson Ave.' ,
		'Trimble Rd.', 'Sunset Blvd.', 'Industrial Way');
		$cities = array('Springfield', 'Lexington', 'Great Heights', 'DaVinci', 'Summerville', 'Jamestown', 'Ashton',
		'Wilmington', 'Portsmouth');
		$states = array('AZ', 'NM', 'MT', 'CO', 'ID', 'TN', 'TX', 'VA' , 'MN');
		$accounts = $this->Account->find('all');
		echo "<h2>Address creations:</h2><ul>";
		foreach($accounts as $account) {
			$this->Address->create();
			//$customer_name = $customer['Customer']['company_name'];
			$street = rand(1, 1000) . ' ' . $streets[array_rand($streets)];
			$data=array(
				'ref_id' => $account['Account']['id'],
				'ref_table' => 'accounts',
				'name' => $street,
				'line1' => $street,
				'city' => $cities[array_rand($cities)],
				'state' => $states[array_rand($states)],
				'zip' => rand(10000,99999),
				'is_billing' => 1,
				'is_shipping' => 1,
				'active' => 1,
			);
			printf("<li>%s: %s</li>", $account['Account']['desc'], $data['city']);
			$this->Address->save($data);
		}

		die();
	}
	public function fillPhoneNums() {
		//$this->loadModel("Address");
		$this->loadModel('PhoneNumber');
		//$this->loadModel('Customer');

		$accounts = $this->Account->find('all');
		echo "<h2>Phone numbers created:</h2><ul>";
		foreach($accounts as $account) {
			$this->PhoneNumber->create();
			$newNum = sprintf("(%d) %d-%d", rand(100,900), rand(100,900), rand(1000,9000));
			$data=array(
				'ref_id' => $account['Account']['id'],
				'ref_table' => 'accounts',
				'value' => $newNum,
				'type' => 'Work',
				'primary' => 1
			);
			printf("<li>%s: %s</li>", $account['Account']['desc'], $data['value']);
			$this->PhoneNumber->save($data);
		}

		die();
	}



	/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Account->recursive = 0;
		$accounts = $this->paginate();
		$this->set('accounts', $accounts);

		// provide a return value for Bancha requests
		return array_merge($this->request['paging']['Account'],
			array('records'=>$accounts));
	}


/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Account->id = $id;
		if (!$this->Account->exists()) {
			throw new NotFoundException(__('Invalid account'));
		}
		$this->set('account', $this->Account->read(null, $id));
        $this->set('_serialize','account');

		// provide a return value for Bancha requests
		return $this->Account->data;
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Account->create();
            
            //if($this->RequestHandler->responseType() == 'json'){
                $errors = array();
                $this->Address->set($this->data['ShippingAddress']);
                if(!$this->Address->validates()){
                    $errors[] = $this->Address->validationErrors;
                }
                $this->Address->set($this->data['BillingAddress']);
                if(!$this->Address->validates()){
                    $errors[] = $this->Address->validationErrors;
                }

            //}
            
			if (empty($errors) && $this->Account->save($this->request->data)) {

				// provide a return value for Bancha requests
				// never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
				if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
					return $this->Account->getLastSaveResult();
				}

                $account = $this->Account->read();
                
                $addr = array('ref_id' => $account['Account']['id'], 'ref_table'=>'accounts');

                // create addresses
                if( count(array_diff($this->request->data['BillingAddress'],$this->request->data['ShippingAddress'])) == 0 ){
                    $this->Address->create();
                    $addr['is_shipping'] = $addr['is_billing'] = 1;
                    $address = $this->Address->save( array('Address'=>array_merge($this->request->data['BillingAddress'], $addr)) );
                    $address2['Address']['id'] = $address['Address']['id'];
                }
                else{
                    $this->Address->create();
                    $addr['is_billing'] = '1';
                    $address = $this->Address->save( array('Address'=>array_merge($this->request->data['BillingAddress'], $addr)) );
                    $this->Address->create();
                    $addr['is_billing'] = '0';
                    $addr['is_shipping'] = '1';
                    $address2 = $this->Address->save( array('Address'=>array_merge($this->request->data['ShippingAddress'], $addr)) );
                }
                
                $this->Account->save(array('Account'=>array('default_bill_to_id'=>$address['Address']['id'],'default_ship_to_id'=>$address2['Address']['id'])));
                
                $this->set('response',array('success'=>1, 'title'=> 'Account Saved', 'Account' => $account));
                $this->set('_serialize','response');
                return;
			} else {

				// provide a return value for Bancha requests
				// never use SessionComponent::setFlash() in Bancha requests
				if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
					return $this->Account->getLastSaveResult();
				}

                $this->set('response',array('success'=>0, 'errors'=>  array_merge_recursive($errors, $this->Account->validationErrors)));
                $this->set('_serialize','response');
                return;
			}
		}
        
        $this->set('customers',$this->Account->Customer->find('list'));
        $this->set('accounttypes',$this->Account->AccountType->find('list'));
        $this->set('billingaddresses',$this->Account->BillingAddress->find('list', array(
            'fields' => array('id',"name"),
            'conditions'=>array('ref_table'=>'accounts','is_billing'=>1)
            )
        ));
        $this->set('shippingaddresses',$this->Account->ShippingAddress->find('list', array(
            'fields' => array('id',"name"),
            'conditions'=>array('ref_table'=>'accounts','is_shipping'=>1)
            )
        ));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Account->id = $id;
		if (!$this->Account->exists()) {
			throw new NotFoundException(__('Invalid account'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Account->save($this->request->data)) {

				// provide a return value for Bancha requests
				// never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
				if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
					return $this->Account->getLastSaveResult();
				}

                $this->set('response',array('success'=>1, 'title'=> 'Account Saved', 'Account' => $this->Account->read()));
                $this->set('_serialize','response');
			} else {

				// provide a return value for Bancha requests
				// never use SessionComponent::setFlash() in Bancha requests
				if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
					return $this->Account->getLastSaveResult();
				}

                $this->set('response',array('success'=>0, 'errors'=>  $this->Account->validationErrors));
                $this->set('_serialize','response');
			}
		} else {
			// Bancha will never do this request, so no return needed here
			$this->request->data = $this->Account->read(null, $id);
		}
        
        $this->set('customers',$this->Account->Customer->find('list'));
        $this->set('accounttypes',$this->Account->AccountType->find('list'));
        $this->set('billingaddresses',$this->Account->BillingAddress->find('list', array(
            'fields' => array('id',"name"),
            'conditions'=>array('ref_table'=>'accounts','is_billing'=>1)
            )
        ));
        $this->set('shippingaddresses',$this->Account->ShippingAddress->find('list', array(
            'fields' => array('id',"name"),
            'conditions'=>array('ref_table'=>'accounts','is_shipping'=>1)
            )
        ));
        //$this->loadModel('CustomerLocation');
		//$customerLocations = $this->CustomerLocation->find('list');
		//$this->set(compact('customerLocations'));
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
		$this->Account->id = $id;
		if (!$this->Account->exists()) {
			throw new NotFoundException(__('Invalid account'));
		}
		if ($this->Account->delete()) {

			// provide a return value for Bancha requests
			// never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
			if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
				return $this->Account->getLastSaveResult();
			}

			$this->Session->setFlash(__('Account deleted'));
			$this->redirect(array('action' => 'index'));
		}

		// provide a return value for Bancha requests
		// never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
		if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
			return $this->Account->getLastSaveResult();
		}

		$this->Session->setFlash(__('Account was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
