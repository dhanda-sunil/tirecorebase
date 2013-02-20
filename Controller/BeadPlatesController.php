<?php
App::uses('AppController', 'Controller');
/**
 * BeadPlates Controller
 *
 * @property BeadPlate $BeadPlate
 */
class BeadPlatesController extends AppController {

    public $components = array('DataTable');
    
/**
 * index method
 *
 * @return void
 */
	public function index() {
        if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
            $this->BeadPlate->recursive = 0;
            $beadPlates = $this->paginate();
            $this->set('beadPlates', $beadPlates);

            // provide a return value for Bancha requests
            return array_merge($this->request['paging']['BeadPlate'],
                array('records'=>$beadPlates));
        }
        elseif($this->RequestHandler->responseType() == 'json'){
            $this->paginate = array(
                'fields' => array('BeadPlate.description','BeadPlate.ref','BeadPlate.created','BeadPlate.modified','BeadPlate.id')
            );
            $this->DataTable->emptyElements = 1;
            $this->set('response', $this->DataTable->getResponse($this,$this->BeadPlate));
            $this->set('_serialize','response');
        }
        else{
        }
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->BeadPlate->id = $id;
		if (!$this->BeadPlate->exists()) {
			throw new NotFoundException(__('Invalid bead plate'));
		}
		$this->set('beadPlate', $this->BeadPlate->read(null, $id));
        
        if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
            // provide a return value for Bancha requests
            return $this->BeadPlate->data;
        }
        else if($this->RequestHandler->responseType() == 'json'){
            $this->set('_serialize','beadPlate');
        }
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->BeadPlate->create();
			if ($this->BeadPlate->save($this->request->data)) {

				// provide a return value for Bancha requests
				// never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
				if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
					return $this->BeadPlate->getLastSaveResult();
				}

				$this->Session->setFlash(__('The bead plate has been saved'));
                $this->set('response', array('success' => 1, 'title' => 'bead plate Saved', 'BeadPlate' => $this->BeadPlate->read()));
                $this->set('_serialize','response');
			} else {

				// provide a return value for Bancha requests
				// never use SessionComponent::setFlash() in Bancha requests
				if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
					return $this->BeadPlate->getLastSaveResult();
				}

				$this->Session->setFlash(__('The bead plate could not be saved. Please, try again.'));
                $this->set('response', array('success' => 0, 'title' => 'Error Saving bead plate', 'errors' => $this->BeadPlate->validationErrors));
                $this->set('_serialize','response');
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
		$this->BeadPlate->id = $id;
		if (!$this->BeadPlate->exists()) {
			throw new NotFoundException(__('Invalid bead plate'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->BeadPlate->save($this->request->data)) {

				// provide a return value for Bancha requests
				// never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
				if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
					return $this->BeadPlate->getLastSaveResult();
				}

				$this->Session->setFlash(__('The bead plate has been saved'));
                $this->set('response', array('success' => 1, 'title' => 'bead plate Saved', 'BeadPlate' => $this->BeadPlate->read()));
                $this->set('_serialize','response');
			} else {

				// provide a return value for Bancha requests
				// never use SessionComponent::setFlash() in Bancha requests
				if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
					return $this->BeadPlate->getLastSaveResult();
				}

				$this->Session->setFlash(__('The bead plate could not be saved. Please, try again.'));
                $this->set('response', array('success' => 0, 'title' => 'Error Saving bead plate', 'errors' => $this->BeadPlate->validationErrors));
                $this->set('_serialize','response');
			}
		} else {
			// Bancha will never do this request, so no return needed here
			$this->request->data = $this->BeadPlate->read(null, $id);
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
		$this->BeadPlate->id = $id;
		if (!$this->BeadPlate->exists()) {
			throw new NotFoundException(__('Invalid bead plate'));
		}
		if ($this->BeadPlate->delete()) {

			// provide a return value for Bancha requests
			// never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
			if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
				return $this->BeadPlate->getLastSaveResult();
			}

			$this->Session->setFlash(__('Bead plate deleted'));
			$this->redirect(array('action' => 'index'));
		}

		// provide a return value for Bancha requests
		// never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
		if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
			return $this->BeadPlate->getLastSaveResult();
		}

		$this->Session->setFlash(__('Bead plate was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
