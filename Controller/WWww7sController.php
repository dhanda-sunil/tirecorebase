<?php
App::uses('AppController', 'Controller');
/**
 * WWww7s Controller
 *
 * @property WWww7 $WWww7
 */
class WWww7sController extends AppController {

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
            $this->WWww7->recursive = 0;
            $wWww7s = $this->paginate();
            $this->set('wWww7s', $wWww7s);

            // provide a return value for Bancha requests
            return array_merge($this->request['paging']['WWww7'],
                array('records'=>$wWww7s));
        }
        elseif($this->RequestHandler->responseType() == 'json'){
            $this->paginate = array(
                'fields' => array('WWww7.id','WWww7.name','WWww7.id AS actionId')
            );
			$this->DataTable->fields =  array('WWww7.id','WWww7.name','WWww7.actionId');
            $this->set('response', $this->DataTable->getResponse($this,$this->WWww7));
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
		$this->WWww7->id = $id;
		if (!$this->WWww7->exists()) {
			throw new NotFoundException(__('Invalid w www7'));
		}
		$this->set('wWww7', $this->WWww7->read(null, $id));
        
        if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
            // provide a return value for Bancha requests
            return $this->WWww7->data;
        }
        else if($this->RequestHandler->responseType() == 'json'){
            $this->set('_serialize','wWww7');
        }
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->WWww7->create();
			if ($this->WWww7->save($this->request->data)) {

				// provide a return value for Bancha requests
				// never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
				if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
					return $this->WWww7->getLastSaveResult();
				}

				$this->Session->setFlash(__('The w www7 has been saved'));
                $this->set('response', array('success' => 1, 'title' => 'w www7 Saved', 'WWww7' => $this->WWww7->read()));
                $this->set('_serialize','response');
			} else {

				// provide a return value for Bancha requests
				// never use SessionComponent::setFlash() in Bancha requests
				if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
					return $this->WWww7->getLastSaveResult();
				}

				$this->Session->setFlash(__('The w www7 could not be saved. Please, try again.'));
                $this->set('response', array('success' => 0, 'title' => 'Error Saving w www7', 'errors' => $this->WWww7->validationErrors));
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
		$this->WWww7->id = $id;
		if (!$this->WWww7->exists()) {
			throw new NotFoundException(__('Invalid w www7'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->WWww7->save($this->request->data)) {

				// provide a return value for Bancha requests
				// never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
				if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
					return $this->WWww7->getLastSaveResult();
				}

				$this->Session->setFlash(__('The w www7 has been saved'));
                $this->set('response', array('success' => 1, 'title' => 'w www7 Saved', 'WWww7' => $this->WWww7->read()));
                $this->set('_serialize','response');
			} else {

				// provide a return value for Bancha requests
				// never use SessionComponent::setFlash() in Bancha requests
				if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
					return $this->WWww7->getLastSaveResult();
				}

				$this->Session->setFlash(__('The w www7 could not be saved. Please, try again.'));
                $this->set('response', array('success' => 0, 'title' => 'Error Saving w www7', 'errors' => $this->WWww7->validationErrors));
                $this->set('_serialize','response');
			}
		} else {
			// Bancha will never do this request, so no return needed here
			$this->request->data = $this->WWww7->read(null, $id);
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
		$this->WWww7->id = $id;
		if (!$this->WWww7->exists()) {
			throw new NotFoundException(__('Invalid w www7'));
		}
		if ($this->WWww7->delete()) {

			// provide a return value for Bancha requests
			// never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
			if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
				return $this->WWww7->getLastSaveResult();
			}

			$this->Session->setFlash(__('W www7 deleted'));
			$this->redirect(array('action' => 'index'));
		}

		// provide a return value for Bancha requests
		// never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
		if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
			return $this->WWww7->getLastSaveResult();
		}

		$this->Session->setFlash(__('W www7 was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
