<?php
App::uses('AppController', 'Controller');
/**
 * RepairTypes Controller
 *
 * @property RepairType $RepairType
 */
class RepairTypesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->RepairType->recursive = 0;
		$repairTypes = $this->paginate();
		$this->set('repairTypes', $repairTypes);

		// provide a return value for Bancha requests
		return array_merge($this->request['paging']['RepairType'],
			array('records'=>$repairTypes));
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->RepairType->id = $id;
		if (!$this->RepairType->exists()) {
			throw new NotFoundException(__('Invalid repair type'));
		}
		$this->set('repairType', $this->RepairType->read(null, $id));

		// provide a return value for Bancha requests
		return $this->RepairType->data;
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->RepairType->create();
			if ($this->RepairType->save($this->request->data)) {

				// provide a return value for Bancha requests
				// never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
				if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
					return $this->RepairType->getLastSaveResult();
				}

				$this->Session->setFlash(__('The repair type has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {

				// provide a return value for Bancha requests
				// never use SessionComponent::setFlash() in Bancha requests
				if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
					return $this->RepairType->getLastSaveResult();
				}

				$this->Session->setFlash(__('The repair type could not be saved. Please, try again.'));
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
		$this->RepairType->id = $id;
		if (!$this->RepairType->exists()) {
			throw new NotFoundException(__('Invalid repair type'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->RepairType->save($this->request->data)) {

				// provide a return value for Bancha requests
				// never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
				if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
					return $this->RepairType->getLastSaveResult();
				}

				$this->Session->setFlash(__('The repair type has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {

				// provide a return value for Bancha requests
				// never use SessionComponent::setFlash() in Bancha requests
				if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
					return $this->RepairType->getLastSaveResult();
				}

				$this->Session->setFlash(__('The repair type could not be saved. Please, try again.'));
			}
		} else {
			// Bancha will never do this request, so no return needed here
			$this->request->data = $this->RepairType->read(null, $id);
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
		$this->RepairType->id = $id;
		if (!$this->RepairType->exists()) {
			throw new NotFoundException(__('Invalid repair type'));
		}
		if ($this->RepairType->delete()) {

			// provide a return value for Bancha requests
			// never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
			if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
				return $this->RepairType->getLastSaveResult();
			}

			$this->Session->setFlash(__('Repair type deleted'));
			$this->redirect(array('action' => 'index'));
		}

		// provide a return value for Bancha requests
		// never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
		if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
			return $this->RepairType->getLastSaveResult();
		}

		$this->Session->setFlash(__('Repair type was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
