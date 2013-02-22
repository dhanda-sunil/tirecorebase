<?php
App::uses('AppController', 'Controller');
/**
 * UserGroups Controller
 *
 * @property UserGroup $UserGroup
 * @property DataTablesComponent $DataTables
 */
class UserGroupsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('DataTable');

/**
 * index method
 *
 * @return void
 */
	public function index() {
        if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
            $this->UserGroup->recursive = 0;
            $userGroups = $this->paginate();
            $this->set('userGroups', $userGroups);

            // provide a return value for Bancha requests
            return array_merge($this->request['paging']['UserGroup'],
                array('records'=>$userGroups));
        }
        elseif($this->RequestHandler->responseType() == 'json'){
            $this->paginate = array(
                'fields' => array('UserGroup.id','UserGroup.name'),
            );
            $this->DataTable->emptyElements = 1;
            $this->set('groups', $this->DataTable->getResponse($this,$this->UserGroup));
            $this->set('_serialize','groups');
        }
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->UserGroup->id = $id;
		if (!$this->UserGroup->exists()) {
			throw new NotFoundException(__('Invalid user group'));
		}
		$this->set('userGroup', $this->UserGroup->read(null, $id));
        $this->set('_serialize','userGroup');
        
		// provide a return value for Bancha requests
		return $this->UserGroup->data;
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->UserGroup->create();
			if ($this->UserGroup->save($this->request->data)) {
                
                
                $group = $this->UserGroup->read();
                $this->Acl->allow($group,'controllers');
				// provide a return value for Bancha requests
				// never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
				if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
					return $this->UserGroup->getLastSaveResult();
				}

                $this->set('response', array('success' => 1, 'title' => 'User Group Saved', 'usergroup' => $group));
                $this->set('_serialize','response');
			} else {

				// provide a return value for Bancha requests
				// never use SessionComponent::setFlash() in Bancha requests
				if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
					return $this->UserGroup->getLastSaveResult();
				}

                $this->set('response', array('success' => 0, 'title' => 'Error Saving Group', 'errors' => $this->UserGroup->validationErrors));
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
		$this->UserGroup->id = $id;
		if (!$this->UserGroup->exists()) {
			throw new NotFoundException(__('Invalid user group'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->UserGroup->save($this->request->data)) {

				// provide a return value for Bancha requests
				// never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
				if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
					return $this->UserGroup->getLastSaveResult();
				}

                $this->set('response', array('success' => 1, 'title' => 'User Group Saved', 'usergroup' => $this->UserGroup->read()));
                $this->set('_serialize','response');
			} else {

				// provide a return value for Bancha requests
				// never use SessionComponent::setFlash() in Bancha requests
				if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
					return $this->UserGroup->getLastSaveResult();
				}

                $this->set('response', array('success' => 0, 'title' => 'Error Saving Group', 'errors' => $this->UserGroup->validationErrors));
                $this->set('_serialize','response');
			}
		} else {
			// Bancha will never do this request, so no return needed here
			$this->request->data = $this->UserGroup->read(null, $id);
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
		$this->UserGroup->id = $id;
		if (!$this->UserGroup->exists()) {
			throw new NotFoundException(__('Invalid user group'));
		}
		if ($this->UserGroup->delete()) {

			// provide a return value for Bancha requests
			// never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
			if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
				return $this->UserGroup->getLastSaveResult();
			}

			$this->Session->setFlash(__('User group deleted'));
			$this->redirect(array('action' => 'index'));
		}

		// provide a return value for Bancha requests
		// never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
		if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
			return $this->UserGroup->getLastSaveResult();
		}

		$this->Session->setFlash(__('User group was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
