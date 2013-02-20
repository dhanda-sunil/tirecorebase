<?php
App::uses('AppController', 'Controller');
/**
 * ManufacturerProductLines Controller
 *
 * @property ManufacturerProductLine $ManufacturerProductLine
 */
class ManufacturerProductLinesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->ManufacturerProductLine->recursive = 0;
		$manufacturerProductLines = $this->paginate(null,array(
			'OR' => array(
				array('deleted'=>'0000-00-00 00:00:00'), // don't show deleted records
				array('deleted'=>NULL)
				)
		));
		$this->set('manufacturerProductLines', $manufacturerProductLines);

		// provide a return value for Bancha requests
		return array_merge($this->request['paging']['ManufacturerProductLine'],
			array('records'=>$manufacturerProductLines));
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->ManufacturerProductLine->id = $id;
		if (!$this->ManufacturerProductLine->exists()) {
			throw new NotFoundException(__('Invalid manufacturer product line'));
		}
		$this->set('manufacturerProductLine', $this->ManufacturerProductLine->read(null, $id));

		// provide a return value for Bancha requests
		return $this->ManufacturerProductLine->data;
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->ManufacturerProductLine->create();
			if ($this->ManufacturerProductLine->save($this->request->data)) {

				// provide a return value for Bancha requests
				// never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
				if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
					return $this->ManufacturerProductLine->getLastSaveResult();
				}

				$this->Session->setFlash(__('The manufacturer product line has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {

				// provide a return value for Bancha requests
				// never use SessionComponent::setFlash() in Bancha requests
				if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
					return $this->ManufacturerProductLine->getLastSaveResult();
				}

				$this->Session->setFlash(__('The manufacturer product line could not be saved. Please, try again.'));
			}
		}
		$manufacturers = $this->ManufacturerProductLine->Manufacturer->find('list');
		$manufacturersProductsLinesGroups = $this->ManufacturerProductLine->ManufacturersProductsLinesGroup->find('list');
		$groups = $this->ManufacturerProductLine->Group->find('list');
		$vendors = $this->ManufacturerProductLine->Vendor->find('list');
		$this->set(compact('manufacturers', 'manufacturersProductsLinesGroups', 'groups', 'vendors'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->ManufacturerProductLine->id = $id;
		if (!$this->ManufacturerProductLine->exists()) {
			throw new NotFoundException(__('Invalid manufacturer product line'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->ManufacturerProductLine->save($this->request->data)) {

				// provide a return value for Bancha requests
				// never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
				if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
					return $this->ManufacturerProductLine->getLastSaveResult();
				}

				$this->Session->setFlash(__('The manufacturer product line has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {

				// provide a return value for Bancha requests
				// never use SessionComponent::setFlash() in Bancha requests
				if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
					return $this->ManufacturerProductLine->getLastSaveResult();
				}

				$this->Session->setFlash(__('The manufacturer product line could not be saved. Please, try again.'));
			}
		} else {
			// Bancha will never do this request, so no return needed here
			$this->request->data = $this->ManufacturerProductLine->read(null, $id);
		}
		$manufacturers = $this->ManufacturerProductLine->Manufacturer->find('list');
		$manufacturersProductsLinesGroups = $this->ManufacturerProductLine->ManufacturersProductsLinesGroup->find('list');
		$groups = $this->ManufacturerProductLine->Group->find('list');
		$vendors = $this->ManufacturerProductLine->Vendor->find('list');
		$this->set(compact('manufacturers', 'manufacturersProductsLinesGroups', 'groups', 'vendors'));
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
		$this->ManufacturerProductLine->id = $id;
		if (!$this->ManufacturerProductLine->exists()) {
			throw new NotFoundException(__('Invalid manufacturer product line'));
		}
		if ($this->ManufacturerProductLine->delete()) {

			// provide a return value for Bancha requests
			// never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
			if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
				return $this->ManufacturerProductLine->getLastSaveResult();
			}

			$this->Session->setFlash(__('Manufacturer product line deleted'));
			$this->redirect(array('action' => 'index'));
		}

		// provide a return value for Bancha requests
		// never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
		if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
			return $this->ManufacturerProductLine->getLastSaveResult();
		}

		$this->Session->setFlash(__('Manufacturer product line was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
