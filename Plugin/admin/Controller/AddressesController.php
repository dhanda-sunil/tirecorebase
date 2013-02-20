<?php
App::uses('AppController', 'Controller');

/**
 * Addresses Controller
 *
 * @property Address $Address
 */
class AddressesController extends AdminAppController {

//	public $components = array('BanchaPaginator');
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
			if ($this->Address->save($this->request->data)) {

				// provide a return value for Bancha requests
				// never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
				if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
					return $this->Address->getLastSaveResult();
				}

				$this->Session->setFlash(__('The address has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {

				// provide a return value for Bancha requests
				// never use SessionComponent::setFlash() in Bancha requests
				if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
					return $this->Address->getLastSaveResult();
				}

				$this->Session->setFlash(__('The address could not be saved. Please, try again.'));
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

				$this->Session->setFlash(__('The address has been saved'));
				$this->redirect(array('action' => 'index'));

			} else {
				// provide a return value for Bancha requests
				// never use SessionComponent::setFlash() in Bancha requests
				if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
					return $this->Address->getLastSaveResult();
				}

				$this->Session->setFlash(__('The address could not be saved. Please, try again.'));
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
}
