<?php
App::uses('AppController', 'Controller');
/**
 * MoldTypes Controller
 *
 * @property MoldType $MoldType
 */
class MoldTypesController extends AppController {

    public $uses = array('MoldType','Mold','TreadDesign','TireSize','BeadPlate');
    public $components = array('DataTable');
    
/**
 * index method
 *
 * @return void
 */
	public function index() {

        if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
            $this->MoldType->recursive = 0;
            $moldTypes = $this->paginate();
            $this->set('moldTypes', $moldTypes);

            // provide a return value for Bancha requests
            return array_merge($this->request['paging']['MoldType'],
                array('records'=>$moldTypes));
        }
        else if($this->RequestHandler->responseType() == 'json'){
            $this->paginate = array(
                'fields' => array('MoldType.id','MoldType.code','MoldType.description','MoldType.mold_cavity'),
                'link' => array(
                    'TreadDesign' => array('fields' => 'tread_abb'),
                    'TireSize' => array('fields' => 'name'),
                    'BeadPlate' => array('fields' => 'description')
                )
            );
            $this->DataTable->fields = array('MoldType.id','MoldType.code','MoldType.description','BeadPlate.description','MoldType.mold_cavity',
                'TreadDesign.tread_abb','TireSize.name');
            $this->set('moldtypes',$this->DataTable->getResponse($this,$this->MoldType));
            $this->set('_serialize','moldtypes');
        }
        else{
            $this->set('tread_designs',$this->TreadDesign->find('list'));
            $this->set('tire_sizes',$this->TireSize->find('list'));
            $this->set('bead_plates',$this->BeadPlate->find('list'));
        }
	}

	/**
	 * @banchaRemotable
	 *
	 * Check to see if bead plate is correct for a give tread design and tire size
	 *
	 * @param int $barcode
	 * @param int $tread_design_id
	 * @param int $tire_size_id
	 * @return array success => true || false
	 *
	 */
	public function checkBead($barcode, $tread_design_id, $tire_size_id) {
		if ($barcode % 2 == 0)
			$result = true;
		else $result = false;
		return array('success' => $result);
	}

	/**
	 * @banchaRemotable
	 *
	 * Check to see if the mold is correct
	 * @param int $barcode
	 * @param int $tread_design_id
	 * @param int $tire_size_id
	 * @return array success => true || false
	 *
	 */
	public function check_mold($barcode, $tread_design_id, $tire_size_id) {
        $this->autoRender = false;
        $mold = $this->Mold->findByBarcode($barcode);
        
        if(!$mold){
            return array('success'=>false,'message'=>'Mold not found');
        }
        else if($mold['MoldType']['tread_design_id'] != $tread_design_id && $mold['MoldType']['tire_size_id'] != $tire_size_id){
            return array('success'=>false,'message'=>'Tread Design and/or Tire Size does not match');
        }

        $data = array(
            'Mold' => array(
                'uses' => $mold['Mold']['uses']+1,
                'last_used' => date('Y-m-d')
            )
        );
        
        if(!$mold['Mold']['in_service'] || $mold['Mold']['in_service'] == '0000-00-00'){
            $data['Mold']['in_service'] = date('Y-m-d');
        }
        
        $this->Mold->id = $mold['Mold']['id'];
        $this->Mold->save($data);
        
        return array('success'=>true);
	}
/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->MoldType->id = $id;
		if (!$this->MoldType->exists()) {
			throw new NotFoundException(__('Invalid mold type'));
		}
		$this->set('moldType', $this->MoldType->read(null, $id));

        if($this->RequestHandler->responseType() == 'json'){
            $this->set('_serialize','moldType');
            return;
        }
        
		// provide a return value for Bancha requests
		return $this->MoldType->data;
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->MoldType->create();
			if ($this->MoldType->save($this->request->data)) {

				// provide a return value for Bancha requests
				// never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
				if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
					return $this->MoldType->getLastSaveResult();
				}

                $this->set('response', array('success' => 1, 'title' => 'Mold Type Saved', 'mold' => $this->MoldType->read()));
                $this->set('_serialize','response');
			} else {

				// provide a return value for Bancha requests
				// never use SessionComponent::setFlash() in Bancha requests
				if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
					return $this->MoldType->getLastSaveResult();
				}

                $this->set('response', array('success' => 0, 'title' => 'Error Saving Mold Type', 'errors' => $this->MoldType->validationErrors));
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
		$this->MoldType->id = $id;
		if (!$this->MoldType->exists()) {
			throw new NotFoundException(__('Invalid mold type'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->MoldType->save($this->request->data)) {

				// provide a return value for Bancha requests
				// never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
				if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
					return $this->MoldType->getLastSaveResult();
				}

                $this->set('response', array('success' => 1, 'title' => 'Mold Type Saved', 'mold' => $this->MoldType->read()));
                $this->set('_serialize','response');
			} else {

				// provide a return value for Bancha requests
				// never use SessionComponent::setFlash() in Bancha requests
				if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
					return $this->MoldType->getLastSaveResult();
				}

                $this->set('response', array('success' => 0, 'title' => 'Error Saving Mold Type', 'errors' => $this->MoldType->validationErrors));
                $this->set('_serialize','response');
			}
		} else {
			// Bancha will never do this request, so no return needed here
			$this->request->data = $this->MoldType->read(null, $id);
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
		$this->MoldType->id = $id;
		if (!$this->MoldType->exists()) {
			throw new NotFoundException(__('Invalid mold type'));
		}
		if ($this->MoldType->delete()) {

			// provide a return value for Bancha requests
			// never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
			if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
				return $this->MoldType->getLastSaveResult();
			}

			$this->Session->setFlash(__('Mold type deleted'));
			$this->redirect(array('action' => 'index'));
		}

		// provide a return value for Bancha requests
		// never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
		if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
			return $this->MoldType->getLastSaveResult();
		}

		$this->Session->setFlash(__('Mold type was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
