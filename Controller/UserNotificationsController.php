<?php
App::uses('AppController', 'Controller');
/**
 * UserNotifications Controller
 *
 * @property UserNotification $UserNotification
 */
class UserNotificationsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->UserNotification->recursive = 0;
		$this->set('userNotifications', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->UserNotification->id = $id;
		if (!$this->UserNotification->exists()) {
			throw new NotFoundException(__('Invalid user notification'));
		}
		$this->set('userNotification', $this->UserNotification->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->UserNotification->create();
			if ($this->UserNotification->save($this->request->data)) {
				$this->Session->setFlash(__('The user notification has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user notification could not be saved. Please, try again.'));
			}
		}
		$users = $this->UserNotification->User->find('list');
		$this->set(compact('users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->UserNotification->id = $id;
		if (!$this->UserNotification->exists()) {
			throw new NotFoundException(__('Invalid user notification'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->UserNotification->save($this->request->data)) {
				$this->Session->setFlash(__('The user notification has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user notification could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->UserNotification->read(null, $id);
		}
		$users = $this->UserNotification->User->find('list');
		$this->set(compact('users'));
	}

/**
 * delete method
 *
 * @throws MethodNotAllowedException
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->UserNotification->id = $id;
		if (!$this->UserNotification->exists()) {
			throw new NotFoundException(__('Invalid user notification'));
		}
		if ($this->UserNotification->delete()) {
			$this->Session->setFlash(__('User notification deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('User notification was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
