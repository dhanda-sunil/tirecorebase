<?php
App::uses('AppController', 'Controller');
/**
 * WWww3s Controller
 *
 * @property WWww3 $WWww3
 */
class WWww3sController extends AppController {

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
            $this->WWww3->recursive = 0;
            $wWww3s = $this->paginate();
            $this->set('wWww3s', $wWww3s);

            // provide a return value for Bancha requests
            return array_merge($this->request['paging']['WWww3'],
                array('records'=>$wWww3s));
        }
        elseif($this->RequestHandler->responseType() == 'json'){
            $this->paginate = array(
                'fields' => array('WWww3.id','WWww3.name','WWww3.id AS actionId')
            );
			$this->DataTable->fields =  array('WWww3.id','WWww3.name','WWww3.actionId');
            $this->set('response', $this->DataTable->getResponse($this,$this->WWww3));
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
		$this->WWww3->id = $id;
		if (!$this->WWww3->exists()) {
			throw new NotFoundException(__('Invalid w www3'));
		}
		$this->set('wWww3', $this->WWww3->read(null, $id));
        
        if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
            // provide a return value for Bancha requests
            return $this->WWww3->data;
        }
        else if($this->RequestHandler->responseType() == 'json'){
            $this->set('_serialize','wWww3');
        }
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->WWww3->create();
			if ($this->WWww3->save($this->request->data)) {

				// provide a return value for Bancha requests
				// never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
				if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
					return $this->WWww3->getLastSaveResult();
				}

				$this->Session->setFlash(__('The w www3 has been saved'));
                $this->set('response', array('success' => 1, 'title' => 'w www3 Saved', 'WWww3' => $this->WWww3->read()));
                $this->set('_serialize','response');
			} else {

				// provide a return value for Bancha requests
				// never use SessionComponent::setFlash() in Bancha requests
				if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
					return $this->WWww3->getLastSaveResult();
				}

				$this->Session->setFlash(__('The w www3 could not be saved. Please, try again.'));
                $this->set('response', array('success' => 0, 'title' => 'Error Saving w www3', 'errors' => $this->WWww3->validationErrors));
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
		$this->WWww3->id = $id;
		if (!$this->WWww3->exists()) {
			throw new NotFoundException(__('Invalid w www3'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->WWww3->save($this->request->data)) {

				// provide a return value for Bancha requests
				// never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
				if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
					return $this->WWww3->getLastSaveResult();
				}

				$this->Session->setFlash(__('The w www3 has been saved'));
                $this->set('response', array('success' => 1, 'title' => 'w www3 Saved', 'WWww3' => $this->WWww3->read()));
                $this->set('_serialize','response');
			} else {

				// provide a return value for Bancha requests
				// never use SessionComponent::setFlash() in Bancha requests
				if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
					return $this->WWww3->getLastSaveResult();
				}

				$this->Session->setFlash(__('The w www3 could not be saved. Please, try again.'));
                $this->set('response', array('success' => 0, 'title' => 'Error Saving w www3', 'errors' => $this->WWww3->validationErrors));
                $this->set('_serialize','response');
			}
		} else {
			// Bancha will never do this request, so no return needed here
			$this->request->data = $this->WWww3->read(null, $id);
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
		$this->WWww3->id = $id;
		if (!$this->WWww3->exists()) {
			throw new NotFoundException(__('Invalid w www3'));
		}
		if ($this->WWww3->delete()) {

			// provide a return value for Bancha requests
			// never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
			if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
				return $this->WWww3->getLastSaveResult();
			}

			$this->Session->setFlash(__('W www3 deleted'));
			$this->redirect(array('action' => 'index'));
		}

		// provide a return value for Bancha requests
		// never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
		if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
			return $this->WWww3->getLastSaveResult();
		}

		$this->Session->setFlash(__('W www3 was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
