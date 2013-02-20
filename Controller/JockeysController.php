<?php
App::uses('AppController', 'Controller');
/**
 * Jockeys Controller
 *
 * @property Jockey $Jockey
 */
class JockeysController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Jockey->recursive = 0;
		$jockeys = $this->paginate();
		$this->set('jockeys', $jockeys);

		// provide a return value for Bancha requests
		return array_merge($this->request['paging']['Jockey'],
			array('records'=>$jockeys));
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Jockey->id = $id;
		if (!$this->Jockey->exists()) {
			throw new NotFoundException(__('Invalid jockey'));
		}
		$this->set('jockey', $this->Jockey->read(null, $id));

		// provide a return value for Bancha requests
		return $this->Jockey->data;
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Jockey->create();
			if ($this->Jockey->save($this->request->data)) {

				// provide a return value for Bancha requests
				// never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
				if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
					return $this->Jockey->getLastSaveResult();
				}

				$this->Session->setFlash(__('The jockey has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {

				// provide a return value for Bancha requests
				// never use SessionComponent::setFlash() in Bancha requests
				if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
					return $this->Jockey->getLastSaveResult();
				}

				$this->Session->setFlash(__('The jockey could not be saved. Please, try again.'));
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
		$this->Jockey->id = $id;
		if (!$this->Jockey->exists()) {
			throw new NotFoundException(__('Invalid jockey'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Jockey->save($this->request->data)) {

				// provide a return value for Bancha requests
				// never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
				if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
					return $this->Jockey->getLastSaveResult();
				}

				$this->Session->setFlash(__('The jockey has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {

				// provide a return value for Bancha requests
				// never use SessionComponent::setFlash() in Bancha requests
				if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
					return $this->Jockey->getLastSaveResult();
				}

				$this->Session->setFlash(__('The jockey could not be saved. Please, try again.'));
			}
		} else {
			// Bancha will never do this request, so no return needed here
			$this->request->data = $this->Jockey->read(null, $id);
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
		$this->Jockey->id = $id;
		if (!$this->Jockey->exists()) {
			throw new NotFoundException(__('Invalid jockey'));
		}
		if ($this->Jockey->delete()) {

			// provide a return value for Bancha requests
			// never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
			if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
				return $this->Jockey->getLastSaveResult();
			}

			$this->Session->setFlash(__('Jockey deleted'));
			$this->redirect(array('action' => 'index'));
		}

		// provide a return value for Bancha requests
		// never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
		if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
			return $this->Jockey->getLastSaveResult();
		}

		$this->Session->setFlash(__('Jockey was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
