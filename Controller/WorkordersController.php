<?php
App::uses('AppController', 'Controller');
/**
 * Accounts Controller
 *
 * @property Workorder $Workorder
 */
class WorkordersController extends AppController {


	/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->set('bob',1);
		$this->layout='mobile';
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
			if ($this->Account->save($this->request->data)) {

				// provide a return value for Bancha requests
				// never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
				if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
					return $this->Account->getLastSaveResult();
				}

				$this->Session->setFlash(__('The account has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {

				// provide a return value for Bancha requests
				// never use SessionComponent::setFlash() in Bancha requests
				if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
					return $this->Account->getLastSaveResult();
				}

				$this->Session->setFlash(__('The account could not be saved. Please, try again.'));
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

				$this->Session->setFlash(__('The account has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {

				// provide a return value for Bancha requests
				// never use SessionComponent::setFlash() in Bancha requests
				if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
					return $this->Account->getLastSaveResult();
				}

				$this->Session->setFlash(__('The account could not be saved. Please, try again.'));
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
