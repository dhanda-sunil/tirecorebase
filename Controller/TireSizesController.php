<?php
App::uses('AppController', 'Controller');
/**
 * TireSizes Controller
 *
 * @property TireSize $TireSize
 */
class TireSizesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->TireSize->recursive = 0;
		$tireSizes = $this->paginate();
		$this->set('tireSizes', $tireSizes);

		// provide a return value for Bancha requests
		return array_merge($this->request['paging']['TireSize'],
			array('records'=>$tireSizes));
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->TireSize->id = $id;
		if (!$this->TireSize->exists()) {
			throw new NotFoundException(__('Invalid tire size'));
		}
		$this->set('tireSize', $this->TireSize->read(null, $id));

		// provide a return value for Bancha requests
		return $this->TireSize->data;
	}

	/**
	 * @banchaRemotable
	 */
	public function getByTwoCharCode($code) {
		return $this->TireSize->findByTwoCharCode($code);
	}
/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->TireSize->create();
			if ($this->TireSize->save($this->request->data)) {

				// provide a return value for Bancha requests
				// never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
				if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
					return $this->TireSize->getLastSaveResult();
				}

				$this->Session->setFlash(__('The tire size has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {

				// provide a return value for Bancha requests
				// never use SessionComponent::setFlash() in Bancha requests
				if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
					return $this->TireSize->getLastSaveResult();
				}

				$this->Session->setFlash(__('The tire size could not be saved. Please, try again.'));
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
		$this->TireSize->id = $id;
		if (!$this->TireSize->exists()) {
			throw new NotFoundException(__('Invalid tire size'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->TireSize->save($this->request->data)) {

				// provide a return value for Bancha requests
				// never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
				if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
					return $this->TireSize->getLastSaveResult();
				}

				$this->Session->setFlash(__('The tire size has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {

				// provide a return value for Bancha requests
				// never use SessionComponent::setFlash() in Bancha requests
				if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
					return $this->TireSize->getLastSaveResult();
				}

				$this->Session->setFlash(__('The tire size could not be saved. Please, try again.'));
			}
		} else {
			// Bancha will never do this request, so no return needed here
			$this->request->data = $this->TireSize->read(null, $id);
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
		$this->TireSize->id = $id;
		if (!$this->TireSize->exists()) {
			throw new NotFoundException(__('Invalid tire size'));
		}
		if ($this->TireSize->delete()) {

			// provide a return value for Bancha requests
			// never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
			if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
				return $this->TireSize->getLastSaveResult();
			}

			$this->Session->setFlash(__('Tire size deleted'));
			$this->redirect(array('action' => 'index'));
		}

		// provide a return value for Bancha requests
		// never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
		if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
			return $this->TireSize->getLastSaveResult();
		}

		$this->Session->setFlash(__('Tire size was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
