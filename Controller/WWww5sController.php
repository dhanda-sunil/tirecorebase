<?php
App::uses('AppController', 'Controller');
/**
 * WWww5s Controller
 *
 * @property WWww5 $WWww5
 */
class WWww5sController extends AppController {

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
            $this->WWww5->recursive = 0;
            $wWww5s = $this->paginate();
            $this->set('wWww5s', $wWww5s);

            // provide a return value for Bancha requests
            return array_merge($this->request['paging']['WWww5'],
                array('records'=>$wWww5s));
        }
        elseif($this->RequestHandler->responseType() == 'json'){
            $this->paginate = array(
                'fields' => array('WWww5.id','WWww5.name','WWww5.id AS actionId')
            );
			$this->DataTable->fields =  array('WWww5.id','WWww5.name','WWww5.actionId');
            $this->set('response', $this->DataTable->getResponse($this,$this->WWww5));
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
		$this->WWww5->id = $id;
		if (!$this->WWww5->exists()) {
			throw new NotFoundException(__('Invalid w www5'));
		}
		$this->set('wWww5', $this->WWww5->read(null, $id));
        
        if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
            // provide a return value for Bancha requests
            return $this->WWww5->data;
        }
        else if($this->RequestHandler->responseType() == 'json'){
            $this->set('_serialize','wWww5');
        }
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->WWww5->create();
			if ($this->WWww5->save($this->request->data)) {

				// provide a return value for Bancha requests
				// never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
				if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
					return $this->WWww5->getLastSaveResult();
				}

				$this->Session->setFlash(__('The w www5 has been saved'));
                $this->set('response', array('success' => 1, 'title' => 'w www5 Saved', 'WWww5' => $this->WWww5->read()));
                $this->set('_serialize','response');
			} else {

				// provide a return value for Bancha requests
				// never use SessionComponent::setFlash() in Bancha requests
				if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
					return $this->WWww5->getLastSaveResult();
				}

				$this->Session->setFlash(__('The w www5 could not be saved. Please, try again.'));
                $this->set('response', array('success' => 0, 'title' => 'Error Saving w www5', 'errors' => $this->WWww5->validationErrors));
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
		$this->WWww5->id = $id;
		if (!$this->WWww5->exists()) {
			throw new NotFoundException(__('Invalid w www5'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->WWww5->save($this->request->data)) {

				// provide a return value for Bancha requests
				// never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
				if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
					return $this->WWww5->getLastSaveResult();
				}

				$this->Session->setFlash(__('The w www5 has been saved'));
                $this->set('response', array('success' => 1, 'title' => 'w www5 Saved', 'WWww5' => $this->WWww5->read()));
                $this->set('_serialize','response');
			} else {

				// provide a return value for Bancha requests
				// never use SessionComponent::setFlash() in Bancha requests
				if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
					return $this->WWww5->getLastSaveResult();
				}

				$this->Session->setFlash(__('The w www5 could not be saved. Please, try again.'));
                $this->set('response', array('success' => 0, 'title' => 'Error Saving w www5', 'errors' => $this->WWww5->validationErrors));
                $this->set('_serialize','response');
			}
		} else {
			// Bancha will never do this request, so no return needed here
			$this->request->data = $this->WWww5->read(null, $id);
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
		$this->WWww5->id = $id;
		if (!$this->WWww5->exists()) {
			throw new NotFoundException(__('Invalid w www5'));
		}
		if ($this->WWww5->delete()) {

			// provide a return value for Bancha requests
			// never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
			if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
				return $this->WWww5->getLastSaveResult();
			}

			$this->Session->setFlash(__('W www5 deleted'));
			$this->redirect(array('action' => 'index'));
		}

		// provide a return value for Bancha requests
		// never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
		if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
			return $this->WWww5->getLastSaveResult();
		}

		$this->Session->setFlash(__('W www5 was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
