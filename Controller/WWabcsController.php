<?php
App::uses('AppController', 'Controller');
/**
 * WWabcs Controller
 *
 * @property WWabc $WWabc
 */
class WWabcsController extends AppController {

/**
 * Load the DataTable component if not loaded 
 *
 * @return void
 */
	public function beforeFilter(){
		parent::beforeFilter();
		if(!$this->DataTable){
			$this->DataTable = $this->Components->load('DataTable');
		}
	}
/**
 * Show the sidebar menus 
 *
 * @return void
 */	
	public function sidebar_action() {

    }
	
/**
 * index method
 *
 * @return void
 */
	public function index() {
        if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
            $this->WWabc->recursive = 0;
            $wWabcs = $this->paginate();
            $this->set('wWabcs', $wWabcs);

            // provide a return value for Bancha requests
            return array_merge($this->request['paging']['WWabc'],
                array('records'=>$wWabcs));
        }
        elseif($this->RequestHandler->responseType() == 'json'){
            $this->paginate = array(
                'fields' => array('WWabc.id','WWabc.name','WWabc.id AS actionId')
            );
			$this->DataTable->fields =  array('WWabc.id','WWabc.name','WWabc.actionId');
            $this->set('response', $this->DataTable->getResponse($this,$this->WWabc));
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
		$this->WWabc->id = $id;
		if (!$this->WWabc->exists()) {
			throw new NotFoundException(__('Invalid w wabc'));
		}
		$this->set('wWabc', $this->WWabc->read(null, $id));
        
        if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
            // provide a return value for Bancha requests
            return $this->WWabc->data;
        }
        else if($this->RequestHandler->responseType() == 'json'){
            $this->set('_serialize','wWabc');
        }
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->WWabc->create();
			if ($this->WWabc->save($this->request->data)) {

				// provide a return value for Bancha requests
				// never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
				if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
					return $this->WWabc->getLastSaveResult();
				}

				$this->Session->setFlash(__('The w wabc has been saved'));
                $this->set('response', array('success' => 1, 'title' => 'w wabc Saved', 'WWabc' => $this->WWabc->read()));
                $this->set('_serialize','response');
			} else {

				// provide a return value for Bancha requests
				// never use SessionComponent::setFlash() in Bancha requests
				if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
					return $this->WWabc->getLastSaveResult();
				}

				$this->Session->setFlash(__('The w wabc could not be saved. Please, try again.'));
                $this->set('response', array('success' => 0, 'title' => 'Error Saving w wabc', 'errors' => $this->WWabc->validationErrors));
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
		$this->WWabc->id = $id;
		if (!$this->WWabc->exists()) {
			throw new NotFoundException(__('Invalid w wabc'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->WWabc->save($this->request->data)) {

				// provide a return value for Bancha requests
				// never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
				if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
					return $this->WWabc->getLastSaveResult();
				}

				$this->Session->setFlash(__('The w wabc has been saved'));
                $this->set('response', array('success' => 1, 'title' => 'w wabc Saved', 'WWabc' => $this->WWabc->read()));
                $this->set('_serialize','response');
			} else {

				// provide a return value for Bancha requests
				// never use SessionComponent::setFlash() in Bancha requests
				if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
					return $this->WWabc->getLastSaveResult();
				}

				$this->Session->setFlash(__('The w wabc could not be saved. Please, try again.'));
                $this->set('response', array('success' => 0, 'title' => 'Error Saving w wabc', 'errors' => $this->WWabc->validationErrors));
                $this->set('_serialize','response');
			}
		} else {
			// Bancha will never do this request, so no return needed here
			$this->request->data = $this->WWabc->read(null, $id);
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
		$this->WWabc->id = $id;
		if (!$this->WWabc->exists()) {
			throw new NotFoundException(__('Invalid w wabc'));
		}
		if ($this->WWabc->delete()) {

			// provide a return value for Bancha requests
			// never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
			if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
				return $this->WWabc->getLastSaveResult();
			}

			$this->Session->setFlash(__('W wabc deleted'));
			$this->redirect(array('action' => 'index'));
		}

		// provide a return value for Bancha requests
		// never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
		if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
			return $this->WWabc->getLastSaveResult();
		}

		$this->Session->setFlash(__('W wabc was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
