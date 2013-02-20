<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 */
class UsersController extends AppController {
    
	public $uses = array('User','UserGroup','Location','Checkpoint');
    public $components = array('DataTable');
    
/**
 * Login must be possible without being logged in
 */
	public function beforeFilter() {
		$this->Auth->allow('login');
	}
    
/**
 * index method
 *
 * @return void
 */
	public function index() {
        
        if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
            $this->User->recursive = 0;
            $users = $this->paginate();
            $this->set('users', $users);
            // provide a return value for Bancha requests
            return array_merge($this->request['paging']['User'],
                array('records'=>$users));
        }
        elseif($this->RequestHandler->responseType() == 'json'){
            $this->paginate = array(
                'fields' => array('User.username', 'User.first_name', 'User.last_name', 'UserGroup.name','Location.name','User.id'),
                'conditions' => array(
                    'active'=>1
                ),
                'link' => array('UserGroup','Location')
            );
            $this->DataTable->emptyElements = 1;
            $this->set('users', $this->DataTable->getResponse($this,$this->User));
            $this->set('_serialize','users');
        }
        else{
            $this->set('groups',$this->UserGroup->find('list'));
            $this->set('checkpoints',$this->Checkpoint->find('list'));
            $this->set('locations',$this->Location->find('list'));
        }
	}
    
/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->set('users', $this->User->read());
        
        if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
            // provide a return value for Bancha requests
            return $this->User->data;
        }
        else if($this->RequestHandler->responseType() == 'json'){
            $this->set('_serialize','users');
        }
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
        
		if ($this->request->is('post') || $this->request->is('put')) {
            
			$this->User->create();
            
			if ($this->User->save($this->request->data)) {

				// provide a return value for Bancha requests
				// never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
				if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
					return $this->User->getLastSaveResult();
				}

                $this->set('response', array('success' => 1, 'title' => 'User Saved', 'user' => $this->User->read()));
                $this->set('_serialize','response');
                
			} else {

				// provide a return value for Bancha requests
				// never use SessionComponent::setFlash() in Bancha requests
				if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
					return $this->User->getLastSaveResult();
				}

                $this->set('response', array('success' => 0, 'title' => 'Error Saving User', 'errors' => $this->User->validationErrors));
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
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
        
		if ($this->request->is('post') || $this->request->is('put')) {

			if ($this->User->save($this->request->data)) {
                
				// provide a return value for Bancha requests
				// never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
				if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
					return $this->User->getLastSaveResult();
				}
                $this->set('response', array('success' => 1, 'title' => 'User Saved', 'user' => $this->User->read()));
                $this->set('_serialize','response');
                
			} else {

				// provide a return value for Bancha requests
				// never use SessionComponent::setFlash() in Bancha requests
				if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
					return $this->User->getLastSaveResult();
				}
                $this->set('response', array('success' => 0, 'title' => 'Error Saving User', 'errors' => $this->User->validationErrors));
                $this->set('_serialize','response');
			}
		} else {
			// Bancha will never do this request, so no return needed here
			$this->request->data = $this->User->read(null, $id);
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
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->User->delete()) {

			// provide a return value for Bancha requests
			// never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
			if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
				return $this->User->getLastSaveResult();
			}

			$this->Session->setFlash(__('User deleted'));
			$this->redirect(array('action' => 'index'));
		}

		// provide a return value for Bancha requests
		// never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
		if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
			return $this->User->getLastSaveResult();
		}

		$this->Session->setFlash(__('User was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
    
    function dashboard(){
        
    }
    
    public function sidebar_action(){
    }
    
/**
 * User Management
 *
 * @banchaRemotable
 * 
 * @return for Bancha: user record if logged in, otherwise false
 */
	public function login($data = null) {
		
		// send Bancha the logging in user data
		if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
			// prepare data (more elegant with form post)
			$this->request->data = array('User' => $data);
			if ($this->Auth->login()) {
				$user = $this->Auth->user();
				if(!empty($user['deleted']) && $user['deleted']!=='0000-00-00 00:00:00')  {
					return false;
				}
				return array('User'=>$this->Auth->user()); // return user record
			} else {
				return false; // invalid
			}
		}
        $this->layout = 'login';
		// normal login handling
    	if ($this->request->is('post')) {
        	if ($this->Auth->login()) {
            	return $this->redirect($this->Auth->redirect());
        	} else {
            	$this->Session->setFlash(__('Username or password is incorrect'), 'default', array(), 'auth');
        	}
    	}
	}
/**
 * User Management
 *
 * @banchaRemotable
 * 
 * @return for Bancha: user record if logged in, otherwise false
 */
	public function logout() {
		if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
			$this->Auth->logout();
			return true;
		}
	    $this->redirect($this->Auth->logout());
	}


/**
 * @banchaRemotable
 * Returns the stats for the current shift
 */
	public function getStats() {
		return array(
			'success' => true,
			'message' => 'Not yet implements'
			);
	}


}
