<?php
App::uses('AppController', 'Controller');
/**
 * Checkpoints Controller
 *
 * @property Checkpoint $Checkpoint
 */
class CheckpointsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Checkpoint->recursive = 0;
		$checkpoints = $this->paginate();
		$this->set('checkpoints', $checkpoints);

		// provide a return value for Bancha requests
		return array_merge($this->request['paging']['Checkpoint'],
			array('records'=>$checkpoints));
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Checkpoint->id = $id;
		if (!$this->Checkpoint->exists()) {
			throw new NotFoundException(__('Invalid checkpoint'));
		}
		$this->set('checkpoint', $this->Checkpoint->read(null, $id));

		// translate the name field
		$this->Checkpoint->data['Checkpoint']['name'] = __($this->Checkpoint->data['Checkpoint']['name']);
		// provide a return value for Bancha requests
		return $this->Checkpoint->data;
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Checkpoint->create();
			if ($this->Checkpoint->save($this->request->data)) {

				// provide a return value for Bancha requests
				// never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
				if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
					return $this->Checkpoint->getLastSaveResult();
				}

				$this->Session->setFlash(__('The checkpoint has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {

				// provide a return value for Bancha requests
				// never use SessionComponent::setFlash() in Bancha requests
				if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
					return $this->Checkpoint->getLastSaveResult();
				}

				$this->Session->setFlash(__('The checkpoint could not be saved. Please, try again.'));
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
		$this->Checkpoint->id = $id;
		if (!$this->Checkpoint->exists()) {
			throw new NotFoundException(__('Invalid checkpoint'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Checkpoint->save($this->request->data)) {

				// provide a return value for Bancha requests
				// never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
				if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
					return $this->Checkpoint->getLastSaveResult();
				}

				$this->Session->setFlash(__('The checkpoint has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {

				// provide a return value for Bancha requests
				// never use SessionComponent::setFlash() in Bancha requests
				if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
					return $this->Checkpoint->getLastSaveResult();
				}

				$this->Session->setFlash(__('The checkpoint could not be saved. Please, try again.'));
			}
		} else {
			// Bancha will never do this request, so no return needed here
			$this->request->data = $this->Checkpoint->read(null, $id);
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
		$this->Checkpoint->id = $id;
		if (!$this->Checkpoint->exists()) {
			throw new NotFoundException(__('Invalid checkpoint'));
		}
		if ($this->Checkpoint->delete()) {

			// provide a return value for Bancha requests
			// never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
			if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
				return $this->Checkpoint->getLastSaveResult();
			}

			$this->Session->setFlash(__('Checkpoint deleted'));
			$this->redirect(array('action' => 'index'));
		}

		// provide a return value for Bancha requests
		// never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
		if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
			return $this->Checkpoint->getLastSaveResult();
		}

		$this->Session->setFlash(__('Checkpoint was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
