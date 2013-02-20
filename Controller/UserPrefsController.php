<?php
App::uses('AppController', 'Controller');
/**
 * UserPrefs Controller
 *
 * @property UserPref $UserPref
 */
class UserPrefsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
//        if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
//            $this->UserPref->recursive = 0;
//            $userPrefs = $this->paginate();
//            $this->set('userPrefs', $userPrefs);
//
//            // provide a return value for Bancha requests
//            return array_merge($this->request['paging']['UserPref'],
//                array('records'=>$userPrefs));
//        }
//        elseif($this->RequestHandler->responseType() == 'json'){
//            $this->paginate = array(
//                'fields' => array('UserPref.id','UserPref.user_id','UserPref.object','UserPref.option','UserPref.value','UserPref.modified','UserPref.modified_by')
//            );
//            $this->set('response', $this->DataTable->getResponse($this,$this->UserPref));
//            $this->set('_serialize','response');
//        }
//        else{
//            $users = $this->UserPref->User->find('list');
//            $this->set(compact('users'));
//        }
	}

/**
 * view method
 *
 * @param int $user_id
 * @param string $object
 * @param string $option
 * @return void
 */
	public function view($object, $option) {
        $this->UserPref->recursive = -1;
        $pref = $this->UserPref->find('first',array(
            'conditions' => array(
                'user_id' => $this->Session->read('Auth.User.id'),
                'object' => $object,
                'option' => $option,
            )
        ));
        
        if (!$pref) {
            $this->set('userPref', array());
        }
        else{
            $this->UserPref->id = $id = $pref['UserPref']['id'];
            $this->set('userPref', $this->UserPref->read(null, $id));
        }
        
        if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
            // provide a return value for Bancha requests
            return $this->UserPref->data;
        }
        else if($this->RequestHandler->responseType() == 'json'){
            $this->set('_serialize','userPref');
        }
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->UserPref->create();
            
            $data = $this->request->data;
            $data['UserPref']['user_id'] = $this->Session->read('Auth.User.id');
            
			if ($this->UserPref->save($data)) {

				// provide a return value for Bancha requests
				// never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
				if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
					return $this->UserPref->getLastSaveResult();
				}

				$this->Session->setFlash(__('The user pref has been saved'));
                $this->set('response', array('success' => 1, 'title' => 'user pref Saved', 'UserPref' => $this->UserPref->read()));
                $this->set('_serialize','response');
			} else {

				// provide a return value for Bancha requests
				// never use SessionComponent::setFlash() in Bancha requests
				if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
					return $this->UserPref->getLastSaveResult();
				}

				$this->Session->setFlash(__('The user pref could not be saved. Please, try again.'));
                $this->set('response', array('success' => 0, 'title' => 'Error Saving user pref', 'errors' => $this->UserPref->validationErrors));
                $this->set('_serialize','response');
			}
		}
//		$users = $this->UserPref->User->find('list');
//		$this->set(compact('users'));
	}

/**
 * edit method
 * 
 * @param int $user_id
 * @param string $object
 * @param string $option
 * @return void
 */
	public function edit($id=null) {
        $this->UserPref->recursive = -1;
        $pref = $this->UserPref->find('first',array(
            'conditions' => array(
                'user_id' => $this->Session->read('Auth.User.id'),
                'object' => $this->request->data['UserPref']['object'],
                'option' => $this->request->data['UserPref']['option'],
            )
        ));
        
        // if preference is not found - create one
        if (!$pref) {
            $this->UserPref->create();
        }
        // set existing preference
        else{
            $this->UserPref->id = $pref['UserPref']['id'];
        }

        $data = $this->request->data;
        $data['UserPref']['user_id'] = $this->Session->read('Auth.User.id');
        
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->UserPref->save($data)) {

				// provide a return value for Bancha requests
				// never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
				if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
					return $this->UserPref->getLastSaveResult();
				}

				$this->Session->setFlash(__('The user pref has been saved'));
                $this->set('response', array('success' => 1, 'title' => 'user pref Saved', 'UserPref' => $this->UserPref->read()));
                $this->set('_serialize','response');
			} else {

				// provide a return value for Bancha requests
				// never use SessionComponent::setFlash() in Bancha requests
				if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
					return $this->UserPref->getLastSaveResult();
				}

				$this->Session->setFlash(__('The user pref could not be saved. Please, try again.'));
                $this->set('response', array('success' => 0, 'title' => 'Error Saving user pref', 'errors' => $this->UserPref->validationErrors));
                $this->set('_serialize','response');
			}
		} else {
			// Bancha will never do this request, so no return needed here
			$this->request->data = $this->UserPref->read(null, $id);
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
		$this->UserPref->id = $id;
		if (!$this->UserPref->exists()) {
			throw new NotFoundException(__('Invalid user pref'));
		}
		if ($this->UserPref->delete()) {

			// provide a return value for Bancha requests
			// never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
			if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
				return $this->UserPref->getLastSaveResult();
			}

			$this->Session->setFlash(__('User pref deleted'));
			$this->redirect(array('action' => 'index'));
		}

		// provide a return value for Bancha requests
		// never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
		if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
			return $this->UserPref->getLastSaveResult();
		}

		$this->Session->setFlash(__('User pref was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
