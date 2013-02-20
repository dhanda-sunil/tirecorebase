<?php
App::uses('AppController', 'Controller');
/**
 * Manufacturers Controller
 *
 * @property Manufacturer $Manufacturer
 */
class ManufacturersController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Manufacturer->recursive = 0;
		$manufacturers = $this->paginate(null,array(
			'OR' => array(
				array('deleted'=>'0000-00-00 00:00:00'), // don't show deleted records
				array('deleted'=>NULL)
				)
		));
		$this->set('manufacturers', $manufacturers);

		// provide a return value for Bancha requests
		return array_merge($this->request['paging']['Manufacturer'],
			array('records'=>$manufacturers));
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Manufacturer->id = $id;
		if (!$this->Manufacturer->exists()) {
			throw new NotFoundException(__('Invalid manufacturer'));
		}
		$this->set('manufacturer', $this->Manufacturer->read(null, $id));

		// provide a return value for Bancha requests
		return $this->Manufacturer->data;
	}

/**
 * @banchaRemotable
 * @param string $id
 * @return void
 */
	public function getByManufacturererPlantId($id = null) {
		$this->Manufacturer->bindModel(array('hasMany'=>array('ManufacturerPlant')));

		$this->Manufacturer->ManufacturerPlant->id = $id;
		if (!$this->Manufacturer->ManufacturerPlant->exists()) {
			//throw new NotFoundException(__('Invalid manufacturer plant'));
            return array(
                'success' => 1,
                'data' => array(
                    
                )
            );
		}
		
		$plant = $this->Manufacturer->ManufacturerPlant->read(null, $id);
		$manufacturer = $this->Manufacturer->read(null, $plant['ManufacturerPlant']['manufacturer_id']);

		// provide a return value for Bancha requests
		return $manufacturer;
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Manufacturer->create();
			if ($this->Manufacturer->save($this->request->data)) {

				// provide a return value for Bancha requests
				// never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
				if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
					return $this->Manufacturer->getLastSaveResult();
				}

				$this->Session->setFlash(__('The manufacturer has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {

				// provide a return value for Bancha requests
				// never use SessionComponent::setFlash() in Bancha requests
				if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
					return $this->Manufacturer->getLastSaveResult();
				}

				$this->Session->setFlash(__('The manufacturer could not be saved. Please, try again.'));
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
		$this->Manufacturer->id = $id;
		if (!$this->Manufacturer->exists()) {
			throw new NotFoundException(__('Invalid manufacturer'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Manufacturer->save($this->request->data)) {

				// provide a return value for Bancha requests
				// never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
				if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
					return $this->Manufacturer->getLastSaveResult();
				}

				$this->Session->setFlash(__('The manufacturer has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {

				// provide a return value for Bancha requests
				// never use SessionComponent::setFlash() in Bancha requests
				if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
					return $this->Manufacturer->getLastSaveResult();
				}

				$this->Session->setFlash(__('The manufacturer could not be saved. Please, try again.'));
			}
		} else {
			// Bancha will never do this request, so no return needed here
			$this->request->data = $this->Manufacturer->read(null, $id);
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
		$this->Manufacturer->id = $id;
		if (!$this->Manufacturer->exists()) {
			throw new NotFoundException(__('Invalid manufacturer'));
		}
		if ($this->Manufacturer->delete()) {

			// provide a return value for Bancha requests
			// never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
			if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
				return $this->Manufacturer->getLastSaveResult();
			}

			$this->Session->setFlash(__('Manufacturer deleted'));
			$this->redirect(array('action' => 'index'));
		}

		// provide a return value for Bancha requests
		// never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
		if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
			return $this->Manufacturer->getLastSaveResult();
		}

		$this->Session->setFlash(__('Manufacturer was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
