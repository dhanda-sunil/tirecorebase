<?php
App::uses('AppController', 'Controller');
/**
 * WWww2s Controller
 *
 * @property WWww2 $WWww2
 */
class WWww2sController extends AppController {

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
            $this->WWww2->recursive = 0;
            $wWww2s = $this->paginate();
            $this->set('wWww2s', $wWww2s);

            // provide a return value for Bancha requests
            return array_merge($this->request['paging']['WWww2'],
                array('records'=>$wWww2s));
        }
        elseif($this->RequestHandler->responseType() == 'json'){
            $this->paginate = array(
                'fields' => array('WWww2.id','WWww2.name','WWww2.id AS actionId')
            );
			$this->DataTable->fields =  array('WWww2.id','WWww2.name','WWww2.actionId');
            $this->set('response', $this->DataTable->getResponse($this,$this->WWww2));
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
		$this->WWww2->id = $id;
		if (!$this->WWww2->exists()) {
			throw new NotFoundException(__('Invalid w www2'));
		}
		$this->set('wWww2', $this->WWww2->read(null, $id));
        
        if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
            // provide a return value for Bancha requests
            return $this->WWww2->data;
        }
        else if($this->RequestHandler->responseType() == 'json'){
            $this->set('_serialize','wWww2');
        }
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->WWww2->create();
			if ($this->WWww2->save($this->request->data)) {

				// provide a return value for Bancha requests
				// never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
				if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
					return $this->WWww2->getLastSaveResult();
				}

				$this->Session->setFlash(__('The w www2 has been saved'));
                $this->set('response', array('success' => 1, 'title' => 'w www2 Saved', 'WWww2' => $this->WWww2->read()));
                $this->set('_serialize','response');
			} else {

				// provide a return value for Bancha requests
				// never use SessionComponent::setFlash() in Bancha requests
				if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
					return $this->WWww2->getLastSaveResult();
				}

				$this->Session->setFlash(__('The w www2 could not be saved. Please, try again.'));
                $this->set('response', array('success' => 0, 'title' => 'Error Saving w www2', 'errors' => $this->WWww2->validationErrors));
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
		$this->WWww2->id = $id;
		if (!$this->WWww2->exists()) {
			throw new NotFoundException(__('Invalid w www2'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->WWww2->save($this->request->data)) {

				// provide a return value for Bancha requests
				// never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
				if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
					return $this->WWww2->getLastSaveResult();
				}

				$this->Session->setFlash(__('The w www2 has been saved'));
                $this->set('response', array('success' => 1, 'title' => 'w www2 Saved', 'WWww2' => $this->WWww2->read()));
                $this->set('_serialize','response');
			} else {

				// provide a return value for Bancha requests
				// never use SessionComponent::setFlash() in Bancha requests
				if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
					return $this->WWww2->getLastSaveResult();
				}

				$this->Session->setFlash(__('The w www2 could not be saved. Please, try again.'));
                $this->set('response', array('success' => 0, 'title' => 'Error Saving w www2', 'errors' => $this->WWww2->validationErrors));
                $this->set('_serialize','response');
			}
		} else {
			// Bancha will never do this request, so no return needed here
			$this->request->data = $this->WWww2->read(null, $id);
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
		$this->WWww2->id = $id;
		if (!$this->WWww2->exists()) {
			throw new NotFoundException(__('Invalid w www2'));
		}
		if ($this->WWww2->delete()) {

			// provide a return value for Bancha requests
			// never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
			if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
				return $this->WWww2->getLastSaveResult();
			}

			$this->Session->setFlash(__('W www2 deleted'));
			$this->redirect(array('action' => 'index'));
		}

		// provide a return value for Bancha requests
		// never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
		if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
			return $this->WWww2->getLastSaveResult();
		}

		$this->Session->setFlash(__('W www2 was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
