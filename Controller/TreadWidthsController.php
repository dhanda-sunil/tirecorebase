<?php
App::uses('AppController', 'Controller');
/**
 * TreadWidths Controller
 *
 * @property TreadWidth $TreadWidth
 */
class TreadWidthsController extends AppController {
    
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->TreadWidth->recursive = 0;
		$treadWidths = $this->paginate();
		$this->set('treadWidths', $treadWidths);

		// provide a return value for Bancha requests
		return array_merge($this->request['paging']['TreadWidth'],
			array('records'=>$treadWidths));
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->TreadWidth->id = $id;
		if (!$this->TreadWidth->exists()) {
			throw new NotFoundException(__('Invalid tread width'));
		}
		$this->set('treadWidth', $this->TreadWidth->read(null, $id));

		// provide a return value for Bancha requests
		return $this->TreadWidth->data;
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->TreadWidth->create();
			if ($this->TreadWidth->save($this->request->data)) {

				// provide a return value for Bancha requests
				// never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
				if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
					return $this->TreadWidth->getLastSaveResult();
				}

				$this->Session->setFlash(__('The tread width has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {

				// provide a return value for Bancha requests
				// never use SessionComponent::setFlash() in Bancha requests
				if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
					return $this->TreadWidth->getLastSaveResult();
				}

				$this->Session->setFlash(__('The tread width could not be saved. Please, try again.'));
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
		$this->TreadWidth->id = $id;
		if (!$this->TreadWidth->exists()) {
			throw new NotFoundException(__('Invalid tread width'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->TreadWidth->save($this->request->data)) {

				// provide a return value for Bancha requests
				// never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
				if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
					return $this->TreadWidth->getLastSaveResult();
				}

				$this->Session->setFlash(__('The tread width has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {

				// provide a return value for Bancha requests
				// never use SessionComponent::setFlash() in Bancha requests
				if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
					return $this->TreadWidth->getLastSaveResult();
				}

				$this->Session->setFlash(__('The tread width could not be saved. Please, try again.'));
			}
		} else {
			// Bancha will never do this request, so no return needed here
			$this->request->data = $this->TreadWidth->read(null, $id);
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
		$this->TreadWidth->id = $id;
		if (!$this->TreadWidth->exists()) {
			throw new NotFoundException(__('Invalid tread width'));
		}
		if ($this->TreadWidth->delete()) {

			// provide a return value for Bancha requests
			// never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
			if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
				return $this->TreadWidth->getLastSaveResult();
			}

			$this->Session->setFlash(__('Tread width deleted'));
			$this->redirect(array('action' => 'index'));
		}

		// provide a return value for Bancha requests
		// never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
		if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
			return $this->TreadWidth->getLastSaveResult();
		}

		$this->Session->setFlash(__('Tread width was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
