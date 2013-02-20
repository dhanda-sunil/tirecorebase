<?php
App::uses('AppController', 'Controller');
/**
 * BuffSpecs Controller
 *
 * @property BuffSpec $BuffSpec
 */
class BuffSpecsController extends AppController {

	/**
	 * @banchaRemotable
	 *
	 * @param int $customer_id
	 * @param int $tire_size_id
	 * @return array(int $buff_spec_id) Preferred spec IDs in order of preference
	 */
	public function getPreferred($customer_id,$tire_size_id) {

		//@todo complete stub function
		

		return array(2,3,4);
	}

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->BuffSpec->recursive = 0;
		$this->Paginator->setAllowedFilters(array('id')); // allow Bancha to remotly filter
		$buffSpecs = $this->paginate();
		$this->set('buffSpecs', $buffSpecs);

		// provide a return value for Bancha requests
		return array_merge($this->request['paging']['BuffSpec'],
			array('records'=>$buffSpecs));
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->BuffSpec->id = $id;
		if (!$this->BuffSpec->exists()) {
			throw new NotFoundException(__('Invalid buff spec'));
		}
		$this->set('buffSpec', $this->BuffSpec->read(null, $id));

		// provide a return value for Bancha requests
		return $this->BuffSpec->data;
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->BuffSpec->create();
			if ($this->BuffSpec->save($this->request->data)) {

				// provide a return value for Bancha requests
				// never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
				if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
					return $this->BuffSpec->getLastSaveResult();
				}

				$this->Session->setFlash(__('The buff spec has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {

				// provide a return value for Bancha requests
				// never use SessionComponent::setFlash() in Bancha requests
				if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
					return $this->BuffSpec->getLastSaveResult();
				}

				$this->Session->setFlash(__('The buff spec could not be saved. Please, try again.'));
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
		$this->BuffSpec->id = $id;
		if (!$this->BuffSpec->exists()) {
			throw new NotFoundException(__('Invalid buff spec'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->BuffSpec->save($this->request->data)) {

				// provide a return value for Bancha requests
				// never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
				if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
					return $this->BuffSpec->getLastSaveResult();
				}

				$this->Session->setFlash(__('The buff spec has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {

				// provide a return value for Bancha requests
				// never use SessionComponent::setFlash() in Bancha requests
				if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
					return $this->BuffSpec->getLastSaveResult();
				}

				$this->Session->setFlash(__('The buff spec could not be saved. Please, try again.'));
			}
		} else {
			// Bancha will never do this request, so no return needed here
			$this->request->data = $this->BuffSpec->read(null, $id);
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
		$this->BuffSpec->id = $id;
		if (!$this->BuffSpec->exists()) {
			throw new NotFoundException(__('Invalid buff spec'));
		}
		if ($this->BuffSpec->delete()) {

			// provide a return value for Bancha requests
			// never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
			if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
				return $this->BuffSpec->getLastSaveResult();
			}

			$this->Session->setFlash(__('Buff spec deleted'));
			$this->redirect(array('action' => 'index'));
		}

		// provide a return value for Bancha requests
		// never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
		if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
			return $this->BuffSpec->getLastSaveResult();
		}

		$this->Session->setFlash(__('Buff spec was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
