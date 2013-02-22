<?php
App::uses('AppController', 'Controller');
/**
 * WWww6s Controller
 *
 * @property WWww6 $WWww6
 */
class WWww6sController extends AppController {

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
            $this->WWww6->recursive = 0;
            $wWww6s = $this->paginate();
            $this->set('wWww6s', $wWww6s);

            // provide a return value for Bancha requests
            return array_merge($this->request['paging']['WWww6'],
                array('records'=>$wWww6s));
        }
        elseif($this->RequestHandler->responseType() == 'json'){
            $this->paginate = array(
                'fields' => array('WWww6.id','WWww6.name','WWww6.id AS actionId')
            );
			$this->DataTable->fields =  array('WWww6.id','WWww6.name','WWww6.actionId');
            $this->set('response', $this->DataTable->getResponse($this,$this->WWww6));
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
		$this->WWww6->id = $id;
		if (!$this->WWww6->exists()) {
			throw new NotFoundException(__('Invalid w www6'));
		}
		$this->set('wWww6', $this->WWww6->read(null, $id));
        
        if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
            // provide a return value for Bancha requests
            return $this->WWww6->data;
        }
        else if($this->RequestHandler->responseType() == 'json'){
            $this->set('_serialize','wWww6');
        }
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->WWww6->create();
			if ($this->WWww6->save($this->request->data)) {

				// provide a return value for Bancha requests
				// never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
				if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
					return $this->WWww6->getLastSaveResult();
				}

				$this->Session->setFlash(__('The w www6 has been saved'));
                $this->set('response', array('success' => 1, 'title' => 'w www6 Saved', 'WWww6' => $this->WWww6->read()));
                $this->set('_serialize','response');
			} else {

				// provide a return value for Bancha requests
				// never use SessionComponent::setFlash() in Bancha requests
				if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
					return $this->WWww6->getLastSaveResult();
				}

				$this->Session->setFlash(__('The w www6 could not be saved. Please, try again.'));
                $this->set('response', array('success' => 0, 'title' => 'Error Saving w www6', 'errors' => $this->WWww6->validationErrors));
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
		$this->WWww6->id = $id;
		if (!$this->WWww6->exists()) {
			throw new NotFoundException(__('Invalid w www6'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->WWww6->save($this->request->data)) {

				// provide a return value for Bancha requests
				// never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
				if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
					return $this->WWww6->getLastSaveResult();
				}

				$this->Session->setFlash(__('The w www6 has been saved'));
                $this->set('response', array('success' => 1, 'title' => 'w www6 Saved', 'WWww6' => $this->WWww6->read()));
                $this->set('_serialize','response');
			} else {

				// provide a return value for Bancha requests
				// never use SessionComponent::setFlash() in Bancha requests
				if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
					return $this->WWww6->getLastSaveResult();
				}

				$this->Session->setFlash(__('The w www6 could not be saved. Please, try again.'));
                $this->set('response', array('success' => 0, 'title' => 'Error Saving w www6', 'errors' => $this->WWww6->validationErrors));
                $this->set('_serialize','response');
			}
		} else {
			// Bancha will never do this request, so no return needed here
			$this->request->data = $this->WWww6->read(null, $id);
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
		$this->WWww6->id = $id;
		if (!$this->WWww6->exists()) {
			throw new NotFoundException(__('Invalid w www6'));
		}
		if ($this->WWww6->delete()) {

			// provide a return value for Bancha requests
			// never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
			if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
				return $this->WWww6->getLastSaveResult();
			}

			$this->Session->setFlash(__('W www6 deleted'));
			$this->redirect(array('action' => 'index'));
		}

		// provide a return value for Bancha requests
		// never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
		if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
			return $this->WWww6->getLastSaveResult();
		}

		$this->Session->setFlash(__('W www6 was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
