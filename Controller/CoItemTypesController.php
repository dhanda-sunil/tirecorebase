<?php
App::uses('AppController', 'Controller');
/**
 * CoItemTypes Controller
 *
 * @property CoItemType $CoItemType
 */
class CoItemTypesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->CoItemType->recursive = 0;
		$coItemTypes = $this->paginate();
		$this->set('coItemTypes', $coItemTypes);

		// provide a return value for Bancha requests
		return array_merge($this->request['paging']['CoItemType'],
			array('records'=>$coItemTypes));
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->CoItemType->id = $id;
		if (!$this->CoItemType->exists()) {
			throw new NotFoundException(__('Invalid co item type'));
		}
		$this->set('coItemType', $this->CoItemType->read(null, $id));

		// provide a return value for Bancha requests
		return $this->CoItemType->data;
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->CoItemType->create();
			if ($this->CoItemType->save($this->request->data)) {

				// provide a return value for Bancha requests
				// never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
				if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
					return $this->CoItemType->getLastSaveResult();
				}

				$this->Session->setFlash(__('The co item type has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {

				// provide a return value for Bancha requests
				// never use SessionComponent::setFlash() in Bancha requests
				if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
					return $this->CoItemType->getLastSaveResult();
				}

				$this->Session->setFlash(__('The co item type could not be saved. Please, try again.'));
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
		$this->CoItemType->id = $id;
		if (!$this->CoItemType->exists()) {
			throw new NotFoundException(__('Invalid co item type'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->CoItemType->save($this->request->data)) {

				// provide a return value for Bancha requests
				// never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
				if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
					return $this->CoItemType->getLastSaveResult();
				}

				$this->Session->setFlash(__('The co item type has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {

				// provide a return value for Bancha requests
				// never use SessionComponent::setFlash() in Bancha requests
				if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
					return $this->CoItemType->getLastSaveResult();
				}

				$this->Session->setFlash(__('The co item type could not be saved. Please, try again.'));
			}
		} else {
			// Bancha will never do this request, so no return needed here
			$this->request->data = $this->CoItemType->read(null, $id);
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
		$this->CoItemType->id = $id;
		if (!$this->CoItemType->exists()) {
			throw new NotFoundException(__('Invalid co item type'));
		}
		if ($this->CoItemType->delete()) {

			// provide a return value for Bancha requests
			// never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
			if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
				return $this->CoItemType->getLastSaveResult();
			}

			$this->Session->setFlash(__('Co item type deleted'));
			$this->redirect(array('action' => 'index'));
		}

		// provide a return value for Bancha requests
		// never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
		if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
			return $this->CoItemType->getLastSaveResult();
		}

		$this->Session->setFlash(__('Co item type was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
