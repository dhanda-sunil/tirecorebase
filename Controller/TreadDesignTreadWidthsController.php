<?php
App::uses('AppController', 'Controller');
/**
 * TreadDesignTreadWidths Controller
 *
 * @property TreadDesignTreadWidths $TreadDesignTreadWidths
 */
class TreadDesignTreadWidthsController extends AppController {

    /**
     * @banchaRemotable
     */
    public function getPreferredWiths($tread_design_id){
        $this->TreadDesignTreadWidth->recursive = -1;
        return $this->TreadDesignTreadWidth->findAllByTreadDesignId($tread_design_id);
    }
    
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->TreadDesignTreadWidth->recursive = 0;
		$treadDesignsTreadWidths = $this->paginate();
		$this->set('treadDesignsTreadWidths', $treadDesignsTreadWidths);

		// provide a return value for Bancha requests
		return array_merge($this->request['paging']['TreadDesignTreadWidth'],
			array('records'=>$treadDesignsTreadWidths));
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->TreadDesignTreadWidth->id = $id;
		if (!$this->TreadDesignTreadWidth->exists()) {
			throw new NotFoundException(__('Invalid tread designs tread width'));
		}
		$this->set('treadDesignsTreadWidth', $this->TreadDesignTreadWidth->read(null, $id));

		// provide a return value for Bancha requests
		return $this->TreadDesignTreadWidth->data;
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->TreadDesignTreadWidth->create();
			if ($this->TreadDesignTreadWidth->save($this->request->data)) {

				// provide a return value for Bancha requests
				// never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
				if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
					return $this->TreadDesignTreadWidth->getLastSaveResult();
				}

				$this->Session->setFlash(__('The tread designs tread width has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {

				// provide a return value for Bancha requests
				// never use SessionComponent::setFlash() in Bancha requests
				if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
					return $this->TreadDesignTreadWidth->getLastSaveResult();
				}

				$this->Session->setFlash(__('The tread designs tread width could not be saved. Please, try again.'));
			}
		}
		$treadDesigns = $this->TreadDesignTreadWidth->TreadDesign->find('list');
		$treadWidths = $this->TreadDesignTreadWidth->TreadWidth->find('list');
		$this->set(compact('treadDesigns', 'treadWidths'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->TreadDesignTreadWidth->id = $id;
		if (!$this->TreadDesignTreadWidth->exists()) {
			throw new NotFoundException(__('Invalid tread designs tread width'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->TreadDesignTreadWidth->save($this->request->data)) {

				// provide a return value for Bancha requests
				// never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
				if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
					return $this->TreadDesignTreadWidth->getLastSaveResult();
				}

				$this->Session->setFlash(__('The tread designs tread width has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {

				// provide a return value for Bancha requests
				// never use SessionComponent::setFlash() in Bancha requests
				if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
					return $this->TreadDesignTreadWidth->getLastSaveResult();
				}

				$this->Session->setFlash(__('The tread designs tread width could not be saved. Please, try again.'));
			}
		} else {
			// Bancha will never do this request, so no return needed here
			$this->request->data = $this->TreadDesignTreadWidth->read(null, $id);
		}
		$treadDesigns = $this->TreadDesignTreadWidth->TreadDesign->find('list');
		$treadWidths = $this->TreadDesignTreadWidth->TreadWidth->find('list');
		$this->set(compact('treadDesigns', 'treadWidths'));
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
		$this->TreadDesignTreadWidth->id = $id;
		if (!$this->TreadDesignTreadWidth->exists()) {
			throw new NotFoundException(__('Invalid tread designs tread width'));
		}
		if ($this->TreadDesignTreadWidth->delete()) {

			// provide a return value for Bancha requests
			// never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
			if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
				return $this->TreadDesignTreadWidth->getLastSaveResult();
			}

			$this->Session->setFlash(__('Tread designs tread width deleted'));
			$this->redirect(array('action' => 'index'));
		}

		// provide a return value for Bancha requests
		// never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
		if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
			return $this->TreadDesignTreadWidth->getLastSaveResult();
		}

		$this->Session->setFlash(__('Tread designs tread width was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
