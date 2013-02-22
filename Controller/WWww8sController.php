<?php
App::uses('AppController', 'Controller');
/**
 * WWww8s Controller
 *
 * @property WWww8 $WWww8
 */
class WWww8sController extends AppController {

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
            $this->WWww8->recursive = 0;
            $wWww8s = $this->paginate();
            $this->set('wWww8s', $wWww8s);

            // provide a return value for Bancha requests
            return array_merge($this->request['paging']['WWww8'],
                array('records'=>$wWww8s));
        }
        elseif($this->RequestHandler->responseType() == 'json'){
            $this->paginate = array(
                'fields' => array('WWww8.id','WWww8.name','WWww8.id AS actionId')
            );
			$this->DataTable->fields =  array('WWww8.id','WWww8.name','WWww8.actionId');
            $this->set('response', $this->DataTable->getResponse($this,$this->WWww8));
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
		$this->WWww8->id = $id;
		if (!$this->WWww8->exists()) {
			throw new NotFoundException(__('Invalid w www8'));
		}
		$this->set('wWww8', $this->WWww8->read(null, $id));
        
        if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
            // provide a return value for Bancha requests
            return $this->WWww8->data;
        }
        else if($this->RequestHandler->responseType() == 'json'){
            $this->set('_serialize','wWww8');
        }
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->WWww8->create();
			if ($this->WWww8->save($this->request->data)) {

				// provide a return value for Bancha requests
				// never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
				if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
					return $this->WWww8->getLastSaveResult();
				}

				$this->Session->setFlash(__('The w www8 has been saved'));
                $this->set('response', array('success' => 1, 'title' => 'w www8 Saved', 'WWww8' => $this->WWww8->read()));
                $this->set('_serialize','response');
			} else {

				// provide a return value for Bancha requests
				// never use SessionComponent::setFlash() in Bancha requests
				if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
					return $this->WWww8->getLastSaveResult();
				}

				$this->Session->setFlash(__('The w www8 could not be saved. Please, try again.'));
                $this->set('response', array('success' => 0, 'title' => 'Error Saving w www8', 'errors' => $this->WWww8->validationErrors));
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
		$this->WWww8->id = $id;
		if (!$this->WWww8->exists()) {
			throw new NotFoundException(__('Invalid w www8'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->WWww8->save($this->request->data)) {

				// provide a return value for Bancha requests
				// never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
				if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
					return $this->WWww8->getLastSaveResult();
				}

				$this->Session->setFlash(__('The w www8 has been saved'));
                $this->set('response', array('success' => 1, 'title' => 'w www8 Saved', 'WWww8' => $this->WWww8->read()));
                $this->set('_serialize','response');
			} else {

				// provide a return value for Bancha requests
				// never use SessionComponent::setFlash() in Bancha requests
				if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
					return $this->WWww8->getLastSaveResult();
				}

				$this->Session->setFlash(__('The w www8 could not be saved. Please, try again.'));
                $this->set('response', array('success' => 0, 'title' => 'Error Saving w www8', 'errors' => $this->WWww8->validationErrors));
                $this->set('_serialize','response');
			}
		} else {
			// Bancha will never do this request, so no return needed here
			$this->request->data = $this->WWww8->read(null, $id);
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
		$this->WWww8->id = $id;
		if (!$this->WWww8->exists()) {
			throw new NotFoundException(__('Invalid w www8'));
		}
		if ($this->WWww8->delete()) {

			// provide a return value for Bancha requests
			// never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
			if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
				return $this->WWww8->getLastSaveResult();
			}

			$this->Session->setFlash(__('W www8 deleted'));
			if($this->RequestHandler->responseType() == 'json'){
				$this->set('response', array('success' => 1, 'title' => 'w www8 deleted'));
                $this->set('_serialize','response');
			}else{
				$this->redirect(array('action' => 'index'));
			}
		}else{

			// provide a return value for Bancha requests
			// never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
			if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
				return $this->WWww8->getLastSaveResult();
			}
	
			$this->Session->setFlash(__('W www8 was not deleted'));
			if($this->RequestHandler->responseType() == 'json'){
				$this->set('response', array('success' => 0, 'title' => 'Error in deleting w www8', 'errors' => $this->WWww8->validationErrors));
                $this->set('_serialize','response');	
			}else{
				$this->redirect(array('action' => 'index'));
			}
		}
	}
}
