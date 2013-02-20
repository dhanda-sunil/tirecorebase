<?php
App::uses('AppController', 'Controller');
/**
 * CustomerLocations Controller
 *
 * @property CustomerLocation $CustomerLocation
 */
class CustomerLocationsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->CustomerLocation->recursive = 0;
		$customerLocations = $this->paginate();
		$this->set('customerLocations', $customerLocations);

		// provide a return value for Bancha requests
		return array_merge($this->request['paging']['CustomerLocation'],
			array('records'=>$customerLocations));
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->CustomerLocation->id = $id;
		if (!$this->CustomerLocation->exists()) {
			throw new NotFoundException(__('Invalid customer location'));
		}
		$this->set('customerLocation', $this->CustomerLocation->read(null, $id));

		// provide a return value for Bancha requests
		return $this->CustomerLocation->data;
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->CustomerLocation->create();
			if ($this->CustomerLocation->save($this->request->data)) {

				// provide a return value for Bancha requests
				// never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
				if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
					return $this->CustomerLocation->getLastSaveResult();
				}

				$this->Session->setFlash(__('The customer location has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {

				// provide a return value for Bancha requests
				// never use SessionComponent::setFlash() in Bancha requests
				if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
					return $this->CustomerLocation->getLastSaveResult();
				}

				$this->Session->setFlash(__('The customer location could not be saved. Please, try again.'));
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
		$this->CustomerLocation->id = $id;
		if (!$this->CustomerLocation->exists()) {
			throw new NotFoundException(__('Invalid customer location'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->CustomerLocation->save($this->request->data)) {

				// provide a return value for Bancha requests
				// never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
				if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
					return $this->CustomerLocation->getLastSaveResult();
				}

				$this->Session->setFlash(__('The customer location has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {

				// provide a return value for Bancha requests
				// never use SessionComponent::setFlash() in Bancha requests
				if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
					return $this->CustomerLocation->getLastSaveResult();
				}

				$this->Session->setFlash(__('The customer location could not be saved. Please, try again.'));
			}
		} else {
			// Bancha will never do this request, so no return needed here
			$this->request->data = $this->CustomerLocation->read(null, $id);
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
		$this->CustomerLocation->id = $id;
		if (!$this->CustomerLocation->exists()) {
			throw new NotFoundException(__('Invalid customer location'));
		}
		if ($this->CustomerLocation->delete()) {

			// provide a return value for Bancha requests
			// never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
			if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
				return $this->CustomerLocation->getLastSaveResult();
			}

			$this->Session->setFlash(__('Customer location deleted'));
			$this->redirect(array('action' => 'index'));
		}

		// provide a return value for Bancha requests
		// never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
		if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
			return $this->CustomerLocation->getLastSaveResult();
		}

		$this->Session->setFlash(__('Customer location was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
