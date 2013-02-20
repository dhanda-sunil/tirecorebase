<?php
App::uses('AppController', 'Controller');
/**
 * RepairEstimates Controller
 *
 * @property RepairEstimate $RepairEstimate
 */
class RepairEstimatesController extends AppController {

/**
 * @banchaRemotable
 */
    public function getCasingRepairEstimates($casing_id){
		return $this->RepairEstimate->find('all', array(
			'conditions' => array(
				'casing_id' => $casing_id,
			)
		));
    }
    
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->RepairEstimate->recursive = 0;
		$repairEstimates = $this->paginate();
		$this->set('repairEstimates', $repairEstimates);

		// provide a return value for Bancha requests
		return array_merge($this->request['paging']['RepairEstimate'],
			array('records'=>$repairEstimates));
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->RepairEstimate->id = $id;
		if (!$this->RepairEstimate->exists()) {
			throw new NotFoundException(__('Invalid repair estimate'));
		}
		$this->set('repairEstimate', $this->RepairEstimate->read(null, $id));

		// provide a return value for Bancha requests
		return $this->RepairEstimate->data;
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->RepairEstimate->create();
			if ($this->RepairEstimate->save($this->request->data)) {

				// provide a return value for Bancha requests
				// never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
				if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
					return $this->RepairEstimate->getLastSaveResult();
				}

				$this->Session->setFlash(__('The repair estimate has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {

				// provide a return value for Bancha requests
				// never use SessionComponent::setFlash() in Bancha requests
				if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
					return $this->RepairEstimate->getLastSaveResult();
				}

				$this->Session->setFlash(__('The repair estimate could not be saved. Please, try again.'));
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
		$this->RepairEstimate->id = $id;
		if (!$this->RepairEstimate->exists()) {
			throw new NotFoundException(__('Invalid repair estimate'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->RepairEstimate->save($this->request->data)) {

				// provide a return value for Bancha requests
				// never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
				if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
					return $this->RepairEstimate->getLastSaveResult();
				}

				$this->Session->setFlash(__('The repair estimate has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {

				// provide a return value for Bancha requests
				// never use SessionComponent::setFlash() in Bancha requests
				if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
					return $this->RepairEstimate->getLastSaveResult();
				}

				$this->Session->setFlash(__('The repair estimate could not be saved. Please, try again.'));
			}
		} else {
			// Bancha will never do this request, so no return needed here
			$this->request->data = $this->RepairEstimate->read(null, $id);
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
		$this->RepairEstimate->id = $id;
		if (!$this->RepairEstimate->exists()) {
			throw new NotFoundException(__('Invalid repair estimate'));
		}
		if ($this->RepairEstimate->delete()) {

			// provide a return value for Bancha requests
			// never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
			if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
				return $this->RepairEstimate->getLastSaveResult();
			}

			$this->Session->setFlash(__('Repair estimate deleted'));
			$this->redirect(array('action' => 'index'));
		}

		// provide a return value for Bancha requests
		// never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
		if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
			return $this->RepairEstimate->getLastSaveResult();
		}

		$this->Session->setFlash(__('Repair estimate was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
