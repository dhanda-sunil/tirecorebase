<?php
App::uses('AppController', 'Controller');
/**
 * CasingLogs Controller
 *
 * @property CasingLog $CasingLog
 */
class CasingLogsController extends AppController {
    
    public $uses = array('Casing','CasingLog');
    
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->CasingLog->recursive = 0;
		$casingLogs = $this->paginate();
		$this->set('casingLogs', $casingLogs);

		// provide a return value for Bancha requests

		return array_merge($this->request['paging']['CasingLog'],
			array('records'=>$casingLogs));
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->CasingLog->id = $id;
		if (!$this->CasingLog->exists()) {
			throw new NotFoundException(__('Invalid casing log'));
		}
		$this->set('casingLog', $this->CasingLog->read(null, $id));

		// provide a return value for Bancha requests
		return $this->CasingLog->data;
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->CasingLog->create();
			if ($this->CasingLog->save($this->request->data)) {

				// provide a return value for Bancha requests
				// never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
				if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
					return $this->CasingLog->getLastSaveResult();
				}

				$this->Session->setFlash(__('The casing log has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {

				// provide a return value for Bancha requests
				// never use SessionComponent::setFlash() in Bancha requests
				if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
					return $this->CasingLog->getLastSaveResult();
				}

				$this->Session->setFlash(__('The casing log could not be saved. Please, try again.'));
			}
		}
		$casings = $this->CasingLog->Casing->find('list');
		$users = $this->CasingLog->User->find('list');
		$checkpoints = $this->CasingLog->Checkpoint->find('list');
		$nrtCodes = $this->CasingLog->NrtCode->find('list');
		$this->set(compact('casings', 'users', 'checkpoints', 'nrtCodes'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->CasingLog->id = $id;
		if (!$this->CasingLog->exists()) {
			throw new NotFoundException(__('Invalid casing log'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->CasingLog->save($this->request->data)) {

				// provide a return value for Bancha requests
				// never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
				if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
					return $this->CasingLog->getLastSaveResult();
				}

				$this->Session->setFlash(__('The casing log has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {

				// provide a return value for Bancha requests
				// never use SessionComponent::setFlash() in Bancha requests
				if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
					return $this->CasingLog->getLastSaveResult();
				}

				$this->Session->setFlash(__('The casing log could not be saved. Please, try again.'));
			}
		} else {
			// Bancha will never do this request, so no return needed here
			$this->request->data = $this->CasingLog->read(null, $id);
		}
		$casings = $this->CasingLog->Casing->find('list');
		$users = $this->CasingLog->User->find('list');
		$checkpoints = $this->CasingLog->Checkpoint->find('list');
		$nrtCodes = $this->CasingLog->NrtCode->find('list');
		$this->set(compact('casings', 'users', 'checkpoints', 'nrtCodes'));
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
		$this->CasingLog->id = $id;
		if (!$this->CasingLog->exists()) {
			throw new NotFoundException(__('Invalid casing log'));
		}
		if ($this->CasingLog->delete()) {

			// provide a return value for Bancha requests
			// never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
			if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
				return $this->CasingLog->getLastSaveResult();
			}

			$this->Session->setFlash(__('Casing log deleted'));
			$this->redirect(array('action' => 'index'));
		}

		// provide a return value for Bancha requests
		// never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
		if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
			return $this->CasingLog->getLastSaveResult();
		}

		$this->Session->setFlash(__('Casing log was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
    
/**
 * @banchaRemotable
 * @param string $barcode
 * @param integer $checkpoint_id
 * @param integer $event_id
 * @return void
 */
    public function write_log($barcode,$checkpoint_id,$event_id){
        $this->autoRender = false;
		$casing = $this->Casing->findByBarcode($barcode);
        
        if($casing){
            
            $this->CasingLog->save(array(
                'CasingLog' => array(
                    'casing_id' => $casing['Casing']['id'],
                    'user_id' => $this->Session->read('Auth.User.id'),
                    'checkpoint_id' => $checkpoint_id,
                    'casing_log_event_id' => $event_id
                )
            ));
        }
        return array('success'=>true);
    }
}
