<?php
App::uses('AppController', 'Controller');
/**
 * Alerts Controller
 *
 * @property Alert $Alert
 */
class AlertsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Alert->recursive = 0;
		$this->Paginator->setAllowedFilters(array('is_active', 'table_name', 'row_id')); // allow Bancha to remotly filter
		$alerts = $this->paginate();
		$this->set('alerts', $alerts);

		// provide a return value for Bancha requests
		return array_merge($this->request['paging']['Alert'],
			array('records'=>$alerts));
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Alert->id = $id;
		if (!$this->Alert->exists()) {
			throw new NotFoundException(__('Invalid alert'));
		}
		$this->set('alert', $this->Alert->read(null, $id));

		// provide a return value for Bancha requests
		return $this->Alert->data;
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Alert->create();
			if ($this->Alert->save($this->request->data)) {

				// provide a return value for Bancha requests
				// never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
				if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
					return $this->Alert->getLastSaveResult();
				}

				$this->Session->setFlash(__('The alert has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {

				// provide a return value for Bancha requests
				// never use SessionComponent::setFlash() in Bancha requests
				if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
					return $this->Alert->getLastSaveResult();
				}

				$this->Session->setFlash(__('The alert could not be saved. Please, try again.'));
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
		$this->Alert->id = $id;
		if (!$this->Alert->exists()) {
			throw new NotFoundException(__('Invalid alert'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Alert->save($this->request->data)) {

				// provide a return value for Bancha requests
				// never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
				if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
					return $this->Alert->getLastSaveResult();
				}

				$this->Session->setFlash(__('The alert has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {

				// provide a return value for Bancha requests
				// never use SessionComponent::setFlash() in Bancha requests
				if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
					return $this->Alert->getLastSaveResult();
				}

				$this->Session->setFlash(__('The alert could not be saved. Please, try again.'));
			}
		} else {
			// Bancha will never do this request, so no return needed here
			$this->request->data = $this->Alert->read(null, $id);
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
		$this->Alert->id = $id;
		if (!$this->Alert->exists()) {
			throw new NotFoundException(__('Invalid alert'));
		}
		if ($this->Alert->delete()) {

			// provide a return value for Bancha requests
			// never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
			if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
				return $this->Alert->getLastSaveResult();
			}

			$this->Session->setFlash(__('Alert deleted'));
			$this->redirect(array('action' => 'index'));
		}

		// provide a return value for Bancha requests
		// never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
		if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
			return $this->Alert->getLastSaveResult();
		}

		$this->Session->setFlash(__('Alert was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
