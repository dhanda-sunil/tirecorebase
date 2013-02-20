<?php
App::uses('AppController', 'Controller');
/**
 * FinishedGoods Controller
 *
 * @property FinishedGood $FinishedGood
 */
class FinishedGoodsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->FinishedGood->recursive = 0;
		$finishedGoods = $this->paginate();
		$this->set('finishedGoods', $finishedGoods);

		// provide a return value for Bancha requests
		return array_merge($this->request['paging']['FinishedGood'],
			array('records'=>$finishedGoods));
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->FinishedGood->id = $id;
		if (!$this->FinishedGood->exists()) {
			throw new NotFoundException(__('Invalid finished good'));
		}
		$this->set('finishedGood', $this->FinishedGood->read(null, $id));

		// provide a return value for Bancha requests
		return $this->FinishedGood->data;
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->FinishedGood->create();
			if ($this->FinishedGood->save($this->request->data)) {

				// provide a return value for Bancha requests
				// never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
				if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
					return $this->FinishedGood->getLastSaveResult();
				}

				$this->flash(__('Finishedgood saved.'), array('action' => 'index'));
			} else {

				// provide a return value for Bancha requests
				// never use SessionComponent::setFlash() in Bancha requests
				if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
					return $this->FinishedGood->getLastSaveResult();
				}

			}
		}
		$casings = $this->FinishedGood->Casing->find('list');
		$this->set(compact('casings'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->FinishedGood->id = $id;
		if (!$this->FinishedGood->exists()) {
			throw new NotFoundException(__('Invalid finished good'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->FinishedGood->save($this->request->data)) {

				// provide a return value for Bancha requests
				// never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
				if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
					return $this->FinishedGood->getLastSaveResult();
				}

				$this->flash(__('The finished good has been saved.'), array('action' => 'index'));
			} else {

				// provide a return value for Bancha requests
				// never use SessionComponent::setFlash() in Bancha requests
				if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
					return $this->FinishedGood->getLastSaveResult();
				}

			}
		} else {
			// Bancha will never do this request, so no return needed here
			$this->request->data = $this->FinishedGood->read(null, $id);
		}
		$casings = $this->FinishedGood->Casing->find('list');
		$this->set(compact('casings'));
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
		$this->FinishedGood->id = $id;
		if (!$this->FinishedGood->exists()) {
			throw new NotFoundException(__('Invalid finished good'));
		}
		if ($this->FinishedGood->delete()) {

			// provide a return value for Bancha requests
			// never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
			if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
				return $this->FinishedGood->getLastSaveResult();
			}

			$this->flash(__('Finished good deleted'), array('action' => 'index'));
		}

		// provide a return value for Bancha requests
		// never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
		if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
			return $this->FinishedGood->getLastSaveResult();
		}

		$this->flash(__('Finished good was not deleted'), array('action' => 'index'));
		$this->redirect(array('action' => 'index'));
	}
}
