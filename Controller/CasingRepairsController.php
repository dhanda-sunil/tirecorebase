<?php
App::uses('AppController', 'Controller');
/**
 * CasingRepairs Controller
 *
 * @property CasingRepair $CasingRepair
 */
class CasingRepairsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->CasingRepair->recursive = 0;
		$casingRepairs = $this->paginate();
		$this->set('casingRepairs', $casingRepairs);

		// provide a return value for Bancha requests
		return array_merge($this->request['paging']['CasingRepair'],
			array('records'=>$casingRepairs));
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->CasingRepair->id = $id;
		if (!$this->CasingRepair->exists()) {
			throw new NotFoundException(__('Invalid casing repair'));
		}
		$this->set('casingRepair', $this->CasingRepair->read(null, $id));

		// provide a return value for Bancha requests
		return $this->CasingRepair->data;
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->CasingRepair->create();
			if ($this->CasingRepair->save($this->request->data)) {

				// provide a return value for Bancha requests
				// never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
				if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
					return $this->CasingRepair->getLastSaveResult();
				}

				$this->Session->setFlash(__('The casing repair has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {

				// provide a return value for Bancha requests
				// never use SessionComponent::setFlash() in Bancha requests
				if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
					return $this->CasingRepair->getLastSaveResult();
				}

				$this->Session->setFlash(__('The casing repair could not be saved. Please, try again.'));
			}
		}
		$casings = $this->CasingRepair->Casing->find('list');
		$materials = $this->CasingRepair->Material->find('list');
		$this->set(compact('casings', 'materials'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->CasingRepair->id = $id;
		if (!$this->CasingRepair->exists()) {
			throw new NotFoundException(__('Invalid casing repair'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->CasingRepair->save($this->request->data)) {

				// provide a return value for Bancha requests
				// never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
				if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
					return $this->CasingRepair->getLastSaveResult();
				}

				$this->Session->setFlash(__('The casing repair has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {

				// provide a return value for Bancha requests
				// never use SessionComponent::setFlash() in Bancha requests
				if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
					return $this->CasingRepair->getLastSaveResult();
				}

				$this->Session->setFlash(__('The casing repair could not be saved. Please, try again.'));
			}
		} else {
			// Bancha will never do this request, so no return needed here
			$this->request->data = $this->CasingRepair->read(null, $id);
		}
		$casings = $this->CasingRepair->Casing->find('list');
		$materials = $this->CasingRepair->Material->find('list');
		$this->set(compact('casings', 'materials'));
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
		$this->CasingRepair->id = $id;
		if (!$this->CasingRepair->exists()) {
			throw new NotFoundException(__('Invalid casing repair'));
		}
		if ($this->CasingRepair->delete()) {

			// provide a return value for Bancha requests
			// never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
			if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
				return $this->CasingRepair->getLastSaveResult();
			}

			$this->Session->setFlash(__('Casing repair deleted'));
			$this->redirect(array('action' => 'index'));
		}

		// provide a return value for Bancha requests
		// never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
		if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
			return $this->CasingRepair->getLastSaveResult();
		}

		$this->Session->setFlash(__('Casing repair was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
