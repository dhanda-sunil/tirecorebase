<?php
App::uses('AppController', 'Controller');
/**
 * TDesigns Controller
 *
 * @property TDesign $TDesign
 */
class TDesignsController extends AppController {

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
            $this->TDesign->recursive = 0;
            $tDesigns = $this->paginate();
            $this->set('tDesigns', $tDesigns);

            // provide a return value for Bancha requests
            return array_merge($this->request['paging']['TDesign'],
                array('records'=>$tDesigns));
        }
        elseif($this->RequestHandler->responseType() == 'json'){
            $this->paginate = array(
                'fields' => array('TDesign.id','TDesign.tread_abb','TDesign.name','TDesign.xref','TDesign.stock_status','TDesign.vendor_id','TDesign.image','TDesign.image_type','TDesign.cure_type','TDesign.id AS actionId')
            );
			$this->DataTable->fields =  array('TDesign.id','TDesign.tread_abb','TDesign.name','TDesign.xref','TDesign.stock_status','TDesign.vendor_id','TDesign.image','TDesign.image_type','TDesign.cure_type','TDesign.actionId');
            $this->set('response', $this->DataTable->getResponse($this,$this->TDesign));
            $this->set('_serialize','response');
        }
        else{
			$vendors = $this->TDesign->Vendor->find('list');
			$this->set(compact('vendors'));
        }
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->TDesign->id = $id;
		if (!$this->TDesign->exists()) {
			throw new NotFoundException(__('Invalid t design'));
		}
		$this->set('tDesign', $this->TDesign->read(null, $id));
        
        if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
            // provide a return value for Bancha requests
            return $this->TDesign->data;
        }
        else if($this->RequestHandler->responseType() == 'json'){
            $this->set('_serialize','tDesign');
        }
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->TDesign->create();
			if ($this->TDesign->save($this->request->data)) {

				// provide a return value for Bancha requests
				// never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
				if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
					return $this->TDesign->getLastSaveResult();
				}

				$this->Session->setFlash(__('The t design has been saved'));
                $this->set('response', array('success' => 1, 'title' => 't design Saved', 'TDesign' => $this->TDesign->read()));
                $this->set('_serialize','response');
			} else {

				// provide a return value for Bancha requests
				// never use SessionComponent::setFlash() in Bancha requests
				if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
					return $this->TDesign->getLastSaveResult();
				}

				$this->Session->setFlash(__('The t design could not be saved. Please, try again.'));
                $this->set('response', array('success' => 0, 'title' => 'Error Saving t design', 'errors' => $this->TDesign->validationErrors));
                $this->set('_serialize','response');
			}
		}
		$vendors = $this->TDesign->Vendor->find('list');
		$this->set(compact('vendors'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->TDesign->id = $id;
		if (!$this->TDesign->exists()) {
			throw new NotFoundException(__('Invalid t design'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->TDesign->save($this->request->data)) {

				// provide a return value for Bancha requests
				// never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
				if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
					return $this->TDesign->getLastSaveResult();
				}

				$this->Session->setFlash(__('The t design has been saved'));
                $this->set('response', array('success' => 1, 'title' => 't design Saved', 'TDesign' => $this->TDesign->read()));
                $this->set('_serialize','response');
			} else {

				// provide a return value for Bancha requests
				// never use SessionComponent::setFlash() in Bancha requests
				if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
					return $this->TDesign->getLastSaveResult();
				}

				$this->Session->setFlash(__('The t design could not be saved. Please, try again.'));
                $this->set('response', array('success' => 0, 'title' => 'Error Saving t design', 'errors' => $this->TDesign->validationErrors));
                $this->set('_serialize','response');
			}
		} else {
			// Bancha will never do this request, so no return needed here
			$this->request->data = $this->TDesign->read(null, $id);
		}
		$vendors = $this->TDesign->Vendor->find('list');
		$this->set(compact('vendors'));
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
		$this->TDesign->id = $id;
		if (!$this->TDesign->exists()) {
			throw new NotFoundException(__('Invalid t design'));
		}
		if ($this->TDesign->delete()) {

			// provide a return value for Bancha requests
			// never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
			if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
				return $this->TDesign->getLastSaveResult();
			}

						$this->Session->setFlash(__('T design deleted'));
			if($this->RequestHandler->responseType() == 'json'){
				$this->set('response', array('success' => 1, 'title' => 'T design deleted'));
                $this->set('_serialize','response');	
			}else{
				$this->redirect(array('action' => 'index'));
			}
					}else{

			// provide a return value for Bancha requests
			// never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
			if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
				return $this->TDesign->getLastSaveResult();
			}
	
						$this->Session->setFlash(__('T design was not deleted'));
			if($this->RequestHandler->responseType() == 'json'){
				$this->set('response', array('success' => 0, 'title' => 'Error in deleting T design', 'errors' => $this->TDesign->validationErrors));
                $this->set('_serialize','response');	
			}else{
				$this->redirect(array('action' => 'index'));
			}
						
		}
	}
}
