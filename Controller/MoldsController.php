<?php
App::uses('AppController', 'Controller');
/**
 * Molds Controller
 *
 * @property Mold $Mold
 */
class MoldsController extends AppController {
    
    public $components = array('DataTable');
    public $uses = array('Mold','MoldType');
    
 /**
 * index method
 *
 * @return void
 */
	public function index() {
        
        if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
            $this->Mold->recursive = 0;
            $molds = $this->paginate();
            $this->set('molds', $molds);

            // provide a return value for Bancha requests
            return array_merge($this->request['paging']['Mold'],
                array('records'=>$molds));
        }
        else if($this->RequestHandler->responseType() == 'json'){
            // removed Mold.active from fields because Cake was auto adding "OR Mold.active = 1" to conditions
            $this->paginate = array(
                'fields' => array('Mold.id','Mold.barcode','Mold.uses','Mold.in_service','Mold.last_used'),
                'link' => array(
                    'MoldType' => array(
                        'fields' => array('code','description'),
                        'TreadDesign' => array('fields' => 'tread_abb'),
                        'TireSize' => array('fields' => 'name')
                    )
                )
            );
            $this->DataTable->fields = array('Mold.barcode','MoldType.code','Mold.uses','Mold.in_service','Mold.last_used',
                'TreadDesign.tread_abb','TireSize.name','Mold.id','MoldType.description');
            $this->set('molds',$this->DataTable->getResponse($this,$this->Mold));
            $this->set('_serialize','molds');
        }
        else{
            $this->set('moldtypes',$this->MoldType->find('list'));
        }
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Mold->id = $id;
		if (!$this->Mold->exists()) {
			throw new NotFoundException(__('Invalid mold'));
		}
		$this->set('mold', $this->Mold->read(null, $id));

        if($this->RequestHandler->responseType() == 'json'){
            $this->set('_serialize','mold');
            return;
        }
        
		// provide a return value for Bancha requests
		return $this->Mold->data;
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Mold->create();
			if ($this->Mold->save($this->request->data)) {

				// provide a return value for Bancha requests
				// never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
				if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
					return $this->Mold->getLastSaveResult();
				}

                $this->set('response', array('success' => 1, 'title' => 'Mold Saved', 'mold' => $this->Mold->read()));
                $this->set('_serialize','response');
			} else {

				// provide a return value for Bancha requests
				// never use SessionComponent::setFlash() in Bancha requests
				if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
					return $this->Mold->getLastSaveResult();
				}

                $this->set('response', array('success' => 0, 'title' => 'Error Saving Mold', 'errors' => $this->Mold->validationErrors));
                $this->set('_serialize','response');
			}
		}
		//$moldTypes = $this->Mold->MoldType->find('list');
		//$this->set(compact('moldTypes'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Mold->id = $id;
		if (!$this->Mold->exists()) {
			throw new NotFoundException(__('Invalid mold'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Mold->save($this->request->data)) {

				// provide a return value for Bancha requests
				// never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
				if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
					return $this->Mold->getLastSaveResult();
				}

                $this->set('response', array('success' => 1, 'title' => 'Mold Saved', 'mold' => $this->Mold->read()));
                $this->set('_serialize','response');
			} else {

				// provide a return value for Bancha requests
				// never use SessionComponent::setFlash() in Bancha requests
				if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
					return $this->Mold->getLastSaveResult();
				}

                $this->set('response', array('success' => 0, 'title' => 'Error Saving Mold', 'errors' => $this->Mold->validationErrors));
                $this->set('_serialize','response');
			}
		} else {
			// Bancha will never do this request, so no return needed here
			$this->request->data = $this->Mold->read(null, $id);
		}
		$moldTypes = $this->Mold->MoldType->find('list');
		$this->set(compact('moldTypes'));
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
		$this->Mold->id = $id;
		if (!$this->Mold->exists()) {
			throw new NotFoundException(__('Invalid mold'));
		}
		if ($this->Mold->delete()) {

			// provide a return value for Bancha requests
			// never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
			if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
				return $this->Mold->getLastSaveResult();
			}

			$this->Session->setFlash(__('Mold deleted'));
			$this->redirect(array('action' => 'index'));
		}

		// provide a return value for Bancha requests
		// never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
		if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
			return $this->Mold->getLastSaveResult();
		}

		$this->Session->setFlash(__('Mold was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
