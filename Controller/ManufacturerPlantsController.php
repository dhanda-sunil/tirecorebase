<?php
App::uses('AppController', 'Controller');
/**
 * ManufacturerPlants Controller
 *
 * @property ManufacturerPlant $ManufacturerPlant
 */
class ManufacturerPlantsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->ManufacturerPlant->recursive = 0;
		$manufacturerPlants = $this->paginate();
		$this->set('manufacturerPlants', $manufacturerPlants);

		// provide a return value for Bancha requests
		return array_merge($this->request['paging']['ManufacturerPlant'],
			array('records'=>$manufacturerPlants));
	}

	/**
	 * @banchaRemotable
	 * Get a Manufacturer Plant by code
	 */
	public function getByCode($code) {
		return $this->ManufacturerPlant->findByCode($code);
	}
	
	/**
	 * @banchaRemotable
	 * Get the size_code for a tire based on manufacturer_plant_id and tire_size_id
	 */
	public function getSizeCode($manufaturer_plant_id, $tire_size_id) {
		return array('records'=>$this->ManufacturerPlant->getTireSizeCode($manufaturer_plant_id, $tire_size_id));
	}

	
/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->ManufacturerPlant->id = $id;
		if (!$this->ManufacturerPlant->exists()) {
			throw new NotFoundException(__('Invalid manufacturer plant'));
		}
		$this->set('manufacturerPlant', $this->ManufacturerPlant->read(null, $id));

		// provide a return value for Bancha requests
		return $this->ManufacturerPlant->data;
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->ManufacturerPlant->create();
			if ($this->ManufacturerPlant->save($this->request->data)) {

				// provide a return value for Bancha requests
				// never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
				if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
					return $this->ManufacturerPlant->getLastSaveResult();
				}

				$this->Session->setFlash(__('The manufacturer plant has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {

				// provide a return value for Bancha requests
				// never use SessionComponent::setFlash() in Bancha requests
				if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
					return $this->ManufacturerPlant->getLastSaveResult();
				}

				$this->Session->setFlash(__('The manufacturer plant could not be saved. Please, try again.'));
			}
		}
		$manufacturers = $this->ManufacturerPlant->Manufacturer->find('list');
		$this->set(compact('manufacturers'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->ManufacturerPlant->id = $id;
		if (!$this->ManufacturerPlant->exists()) {
			throw new NotFoundException(__('Invalid manufacturer plant'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->ManufacturerPlant->save($this->request->data)) {

				// provide a return value for Bancha requests
				// never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
				if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
					return $this->ManufacturerPlant->getLastSaveResult();
				}

				$this->Session->setFlash(__('The manufacturer plant has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {

				// provide a return value for Bancha requests
				// never use SessionComponent::setFlash() in Bancha requests
				if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
					return $this->ManufacturerPlant->getLastSaveResult();
				}

				$this->Session->setFlash(__('The manufacturer plant could not be saved. Please, try again.'));
			}
		} else {
			// Bancha will never do this request, so no return needed here
			$this->request->data = $this->ManufacturerPlant->read(null, $id);
		}
		$manufacturers = $this->ManufacturerPlant->Manufacturer->find('list');
		$this->set(compact('manufacturers'));
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
		$this->ManufacturerPlant->id = $id;
		if (!$this->ManufacturerPlant->exists()) {
			throw new NotFoundException(__('Invalid manufacturer plant'));
		}
		if ($this->ManufacturerPlant->delete()) {

			// provide a return value for Bancha requests
			// never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
			if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
				return $this->ManufacturerPlant->getLastSaveResult();
			}

			$this->Session->setFlash(__('Manufacturer plant deleted'));
			$this->redirect(array('action' => 'index'));
		}

		// provide a return value for Bancha requests
		// never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
		if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
			return $this->ManufacturerPlant->getLastSaveResult();
		}

		$this->Session->setFlash(__('Manufacturer plant was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
