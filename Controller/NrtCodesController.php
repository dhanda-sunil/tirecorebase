<?php
App::uses('AppController', 'Controller');
/**
 * NrtCodes Controller
 *
 * @property NrtCode $NrtCode
 */
class NrtCodesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->NrtCode->recursive = 0;
		$nrtCodes = $this->paginate();
		$this->set('nrtCodes', $nrtCodes);

		// provide a return value for Bancha requests
		return array_merge($this->request['paging']['NrtCode'],
			array('records'=>$nrtCodes));
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->NrtCode->id = $id;
		if (!$this->NrtCode->exists()) {
			throw new NotFoundException(__('Invalid nrt code'));
		}
		$this->set('nrtCode', $this->NrtCode->read(null, $id));

		// provide a return value for Bancha requests
		return $this->NrtCode->data;
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->NrtCode->create();
			if ($this->NrtCode->save($this->request->data)) {

				// provide a return value for Bancha requests
				// never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
				if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
					return $this->NrtCode->getLastSaveResult();
				}

				$this->Session->setFlash(__('The nrt code has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {

				// provide a return value for Bancha requests
				// never use SessionComponent::setFlash() in Bancha requests
				if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
					return $this->NrtCode->getLastSaveResult();
				}

				$this->Session->setFlash(__('The nrt code could not be saved. Please, try again.'));
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
		$this->NrtCode->id = $id;
		if (!$this->NrtCode->exists()) {
			throw new NotFoundException(__('Invalid nrt code'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->NrtCode->save($this->request->data)) {

				// provide a return value for Bancha requests
				// never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
				if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
					return $this->NrtCode->getLastSaveResult();
				}

				$this->Session->setFlash(__('The nrt code has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {

				// provide a return value for Bancha requests
				// never use SessionComponent::setFlash() in Bancha requests
				if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
					return $this->NrtCode->getLastSaveResult();
				}

				$this->Session->setFlash(__('The nrt code could not be saved. Please, try again.'));
			}
		} else {
			// Bancha will never do this request, so no return needed here
			$this->request->data = $this->NrtCode->read(null, $id);
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
		$this->NrtCode->id = $id;
		if (!$this->NrtCode->exists()) {
			throw new NotFoundException(__('Invalid nrt code'));
		}
		if ($this->NrtCode->delete()) {

			// provide a return value for Bancha requests
			// never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
			if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
				return $this->NrtCode->getLastSaveResult();
			}

			$this->Session->setFlash(__('Nrt code deleted'));
			$this->redirect(array('action' => 'index'));
		}

		// provide a return value for Bancha requests
		// never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
		if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
			return $this->NrtCode->getLastSaveResult();
		}

		$this->Session->setFlash(__('Nrt code was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
