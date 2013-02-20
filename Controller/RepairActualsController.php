<?php
App::uses('AppController', 'Controller');
/**
 * RepairActuals Controller
 *
 * @property RepairActual $RepairActual
 */
class RepairActualsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->RepairActual->recursive = 0;
		$repairActuals = $this->paginate();
		$this->set('repairActuals', $repairActuals);

		// provide a return value for Bancha requests
		return array_merge($this->request['paging']['RepairActual'],
			array('records'=>$repairActuals));
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->RepairActual->id = $id;
		if (!$this->RepairActual->exists()) {
			throw new NotFoundException(__('Invalid repair actual'));
		}
		$this->set('repairActual', $this->RepairActual->read(null, $id));

		// provide a return value for Bancha requests
		return $this->RepairActual->data;
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->RepairActual->create();
			if ($this->RepairActual->save($this->request->data)) {

				// provide a return value for Bancha requests
				// never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
				if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
					return $this->RepairActual->getLastSaveResult();
				}

				$this->Session->setFlash(__('The repair actual has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {

				// provide a return value for Bancha requests
				// never use SessionComponent::setFlash() in Bancha requests
				if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
					return $this->RepairActual->getLastSaveResult();
				}

				$this->Session->setFlash(__('The repair actual could not be saved. Please, try again.'));
			}
		}
		$casings = $this->RepairActual->Casing->find('list');
		$materials = $this->RepairActual->Material->find('list');
		$this->set(compact('casings', 'materials'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->RepairActual->id = $id;
		if (!$this->RepairActual->exists()) {
			throw new NotFoundException(__('Invalid repair actual'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->RepairActual->save($this->request->data)) {

				// provide a return value for Bancha requests
				// never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
				if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
					return $this->RepairActual->getLastSaveResult();
				}

				$this->Session->setFlash(__('The repair actual has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {

				// provide a return value for Bancha requests
				// never use SessionComponent::setFlash() in Bancha requests
				if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
					return $this->RepairActual->getLastSaveResult();
				}

				$this->Session->setFlash(__('The repair actual could not be saved. Please, try again.'));
			}
		} else {
			// Bancha will never do this request, so no return needed here
			$this->request->data = $this->RepairActual->read(null, $id);
		}
		$casings = $this->RepairActual->Casing->find('list');
		$materials = $this->RepairActual->Material->find('list');
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
		$this->RepairActual->id = $id;
		if (!$this->RepairActual->exists()) {
			throw new NotFoundException(__('Invalid repair actual'));
		}
		if ($this->RepairActual->delete()) {

			// provide a return value for Bancha requests
			// never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
			if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
				return $this->RepairActual->getLastSaveResult();
			}

			$this->Session->setFlash(__('Repair actual deleted'));
			$this->redirect(array('action' => 'index'));
		}

		// provide a return value for Bancha requests
		// never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
		if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
			return $this->RepairActual->getLastSaveResult();
		}

		$this->Session->setFlash(__('Repair actual was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
