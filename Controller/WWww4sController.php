<?php
App::uses('AppController', 'Controller');
/**
 * WWww4s Controller
 *
 * @property WWww4 $WWww4
 */
class WWww4sController extends AppController {

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
 * Load the sidebar menus 
 *
 * @return void
 */
	public function sidebar_action(){
		
	}
/**
 * index method
 *
 * @return void
 */
	public function index() {
        if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
            $this->WWww4->recursive = 0;
            $wWww4s = $this->paginate();
            $this->set('wWww4s', $wWww4s);

            // provide a return value for Bancha requests
            return array_merge($this->request['paging']['WWww4'],
                array('records'=>$wWww4s));
        }
        elseif($this->RequestHandler->responseType() == 'json'){
            $this->paginate = array(
                'fields' => array('WWww4.id','WWww4.name','WWww4.id AS actionId')
            );
			$this->DataTable->fields =  array('WWww4.id','WWww4.name','WWww4.actionId');
            $this->set('response', $this->DataTable->getResponse($this,$this->WWww4));
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
		$this->WWww4->id = $id;
		if (!$this->WWww4->exists()) {
			throw new NotFoundException(__('Invalid w www4'));
		}
		$this->set('wWww4', $this->WWww4->read(null, $id));
        
        if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
            // provide a return value for Bancha requests
            return $this->WWww4->data;
        }
        else if($this->RequestHandler->responseType() == 'json'){
            $this->set('_serialize','wWww4');
        }
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->WWww4->create();
			if ($this->WWww4->save($this->request->data)) {

				// provide a return value for Bancha requests
				// never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
				if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
					return $this->WWww4->getLastSaveResult();
				}

				$this->Session->setFlash(__('The w www4 has been saved'));
                $this->set('response', array('success' => 1, 'title' => 'w www4 Saved', 'WWww4' => $this->WWww4->read()));
                $this->set('_serialize','response');
			} else {

				// provide a return value for Bancha requests
				// never use SessionComponent::setFlash() in Bancha requests
				if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
					return $this->WWww4->getLastSaveResult();
				}

				$this->Session->setFlash(__('The w www4 could not be saved. Please, try again.'));
                $this->set('response', array('success' => 0, 'title' => 'Error Saving w www4', 'errors' => $this->WWww4->validationErrors));
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
		$this->WWww4->id = $id;
		if (!$this->WWww4->exists()) {
			throw new NotFoundException(__('Invalid w www4'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->WWww4->save($this->request->data)) {

				// provide a return value for Bancha requests
				// never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
				if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
					return $this->WWww4->getLastSaveResult();
				}

				$this->Session->setFlash(__('The w www4 has been saved'));
                $this->set('response', array('success' => 1, 'title' => 'w www4 Saved', 'WWww4' => $this->WWww4->read()));
                $this->set('_serialize','response');
			} else {

				// provide a return value for Bancha requests
				// never use SessionComponent::setFlash() in Bancha requests
				if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
					return $this->WWww4->getLastSaveResult();
				}

				$this->Session->setFlash(__('The w www4 could not be saved. Please, try again.'));
                $this->set('response', array('success' => 0, 'title' => 'Error Saving w www4', 'errors' => $this->WWww4->validationErrors));
                $this->set('_serialize','response');
			}
		} else {
			// Bancha will never do this request, so no return needed here
			$this->request->data = $this->WWww4->read(null, $id);
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
		$this->WWww4->id = $id;
		if (!$this->WWww4->exists()) {
			throw new NotFoundException(__('Invalid w www4'));
		}
		if ($this->WWww4->delete()) {

			// provide a return value for Bancha requests
			// never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
			if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
				return $this->WWww4->getLastSaveResult();
			}

			$this->Session->setFlash(__('W www4 deleted'));
			$this->redirect(array('action' => 'index'));
		}

		// provide a return value for Bancha requests
		// never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
		if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
			return $this->WWww4->getLastSaveResult();
		}

		$this->Session->setFlash(__('W www4 was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
