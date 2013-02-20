<?php
App::uses('AppController', 'Controller');
/**
 * Casings Controller
 *
 * @property Casing $Casing
 */
class CasingsController extends AppController {

    var $components = array('Pdf');
    var $uses = array('Casing','CasingLog','Barcode','Material');

	/*
	 * @banchaRemotable
	 * @param int $id
	 * @return int Age of tire in weeks
	 */
	public function getAge($production_week) {
		return $this->Casing->getAge($production_week);
	}

/**
 * checks first if casing has an override, next attempts to override by authenticating and checking the users group, returns array with
 * success of true/false, and an error string on false.
 * @banchaRemotable
 * @param int $casing_id
 * @param int $checkpoint_id
 * @param string $username
 * @param string $password
 */
    public function override($casing_id, $checkpoint_id, $username, $password){

        $this->Casing->id = $casing_id;
        $casing = $this->Casing->read();
        
        if($casing['Casing']['manager_override'] > 0){
            return array('success'=>true);
        }
        
        if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
            
            $this->request->data = array('User' => array(
                'username' => $username, 
                'password' => $password
            ));
            
            if($this->Auth->login()){
                $user = $this->Auth->user();

                if(in_array($user['user_group_id'],array(1,2))){
                    $this->Casing->save(array('Casing' => array(
                        'manager_override'=>$user['id'])
                    ));
                    
                    $this->CasingLog->save(array('CasingLog'=>array(
                        'casing_id' => $casing_id,
                        'user_id' => $this->Session->read('Auth.User.id'),
                        'checkpoint_id' => $checkpoint_id,
                        'casing_log_event_id' => 4, // override
                        'description' => 'override by '.$user['first_name'].' '.$user['last_name']
                    )));
                    
                    return array('success'=>true);
                }
                return array('success'=>false,'error'=>'User is not a manager');
            }
        }
        return array('success'=>false,'error'=>'Authentication failed');
    }
    
/**
 * this method will remove items from inventory based on what materials were used on the casing
 * @banchaRemotable
 * @param int $casing_id
 * @return array
 */
    public function materials($casing_id){
        $this->autoRender = false;
        $this->Casing->id = $casing_id;
        $result = $this->Material->removeInventory($this->Casing, $this->Session->read('Auth.User.id'));
        if( !$result['success'] ){
            // error
        }
        return $result;
    }
    
/**
 * @banchaRemotable
 * @param string $barcode
 * @return array
 */
    public function getLabel($barcode){
        
        $this->autoRender = false;
        
        // speed up query by unbinding unneeded associations
        $this->Casing->unbindModel(array(
            'belongsTo' => array('NrtCode','MoldType'),
            'hasMany' => array('CasingLog','CasingRepair','FinishedGood')
        ));
        $this->Casing->TireSize->unbindModel(array(
            'hasMany' => array('Casing','MoldType','BuffSpec')
        ));
        $this->Casing->TreadDesign->unbindModel(array(
            'hasMany' => array('Casing','MoldType','TreadDesignTreadWidth'),
            'belongsTo' => array('Vendor')
        ));
        $this->Casing->TreadWidth->unbindModel(array(
            'hasMany' => array('TreadDesignTreadWidth')
        ));
        $this->Casing->CoItem->Co->unbindModel(array(
            'belongsTo' => array('Account','BillingAddress','ShippingAddress')
        ));
        $this->Casing->CoItem->Co->CoItem->unbindModel(array(
            'belongsTo' => array('CoItemType','Casing')
        ));
        
        // now execute query
        $r = $this->Casing->find('first',array(
            'conditions' => array('Casing.barcode'=>$barcode),
            'recursive' => '4'
        ));
        
        $r['Pdf']['dir'] = 'Label';
        $r['Pdf']['type'] = 'pass';
        
        $this->Barcode->barcode(); 
        $this->Barcode->setType('C128'); 
        $this->Barcode->setCode("$barcode");
        $this->Barcode->setSize(50,200);
        
        $r['CasingImage'] = 'data:image/png;base64,'.$this->Barcode->getBase64Encoding();
        
        $this->Barcode->barcode(); 
        $this->Barcode->setType('C128'); 
        $this->Barcode->setCode($r['TireSize']['size_code'].$r['TreadDesign']['tread_abb'].$r['TreadWidth']['size_standard']);
        
        $r['FinishedImage'] = 'data:image/png;base64,'.$this->Barcode->getBase64Encoding();
        $r['Lines'] = count($r['CoItem']);
        //echo '<pre>'; print_r($r); die;
        //echo $str = $this->Pdf->outputHtml('Label',$r);
        if($r){    
            $str = $this->Pdf->outputBase64('Label',$r);
            //echo $str; die;
            return array('success'=>true,'string'=>$str);
        }
        else{
            return array('success'=>false,'error'=>'Error generating label');
        }
    }
/**
 * @banchaRemotable
 * @param string $barcode
 * @return array
 */
    public function getFailLabel($barcode){
        $this->autoRender = false;
        
        // speed up query by unbinding unneeded associations
        $this->Casing->unbindModel(array(
            'belongsTo' => array('MoldType'),
            'hasMany' => array('CasingLog','CasingRepair','FinishedGood')
        ));
        $this->Casing->TireSize->unbindModel(array(
            'hasMany' => array('Casing','MoldType','BuffSpec')
        ));
        $this->Casing->TreadDesign->unbindModel(array(
            'hasMany' => array('Casing','MoldType','TreadDesignTreadWidth'),
            'belongsTo' => array('Vendor')
        ));
        $this->Casing->TreadWidth->unbindModel(array(
            'hasMany' => array('TreadDesignTreadWidth')
        ));
        $this->Casing->CoItem->Co->unbindModel(array(
            'belongsTo' => array('Account','BillingAddress','ShippingAddress')
        ));
        $this->Casing->CoItem->Co->CoItem->unbindModel(array(
            'belongsTo' => array('CoItemType','Casing')
        ));
        
        // now execute query
        $r = $this->Casing->find('first',array(
            'conditions' => array('Casing.barcode'=>$barcode),
            'recursive' => 4
        ));
        
        $r['Pdf']['dir'] = 'Label';
        $r['Pdf']['type'] = 'nrt';
        $this->Barcode->barcode(); 
        $this->Barcode->setType('C128'); 
        $this->Barcode->setCode("$barcode");
        $this->Barcode->setSize(50,200);
        $r['CasingImage'] = 'data:image/png;base64,'.$this->Barcode->getBase64Encoding();
        //$r['FinishedImage'] = 'http://'.$_SERVER['HTTP_HOST'].'/barcode/index/'.$r['TireSize']['size_code'].$r['TreadDesign']['tread_abb'].$r['TreadWidth']['size_standard'];
        $r['Lines'] = count($r['CoItem']['Co']['CoItem']);
        //echo '<pre>'; print_r($r); die;
        //echo $str = $this->Pdf->outputHtml('Label',$r);
        if($r){    
            $str = $this->Pdf->outputBase64('Label',$r);
            //echo $str; die;
            return array('success'=>true,'string'=>$str);
        }
        else{
            return array('success'=>false,'message'=>'Error generating label');
        }
    }
    
    
/**
 * @banchaRemotable
 *
 * @param string $barcode
 * @param integer $checkpoint_id
 * @return void
 */
	public function getByBarcode($barcode = null,$checkpoint_id = null) {
		$casing = $this->Casing->findByBarcode($barcode);
        if($casing){
            $this->CasingLog->save(array(
                'CasingLog' => array(
                    'casing_id' => $casing['Casing']['id'],
                    'user_id' => $this->Session->read('Auth.User.id'),
                    'checkpoint_id' => $checkpoint_id,
                    'casing_log_event_id' => 1
                )
            ));
        }
        return $casing;
	}
    
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Casing->recursive = 0;
		$casings = $this->paginate();
		$this->set('casings', $casings);

		// provide a return value for Bancha requests
		return array_merge($this->request['paging']['Casing'],
			array('records'=>$casings));
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Casing->id = $id;
		if (!$this->Casing->exists()) {
			throw new NotFoundException(__('Invalid casing'));
		}
		$this->set('casing', $this->Casing->read(null, $id));

		// provide a return value for Bancha requests
		return $this->Casing->data;
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Casing->create();
			if ($this->Casing->save($this->request->data)) {

				// provide a return value for Bancha requests
				// never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
				if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
					return $this->Casing->getLastSaveResult();
				}

				$this->Session->setFlash(__('The casing has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {

				// provide a return value for Bancha requests
				// never use SessionComponent::setFlash() in Bancha requests
				if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
					return $this->Casing->getLastSaveResult();
				}

				$this->Session->setFlash(__('The casing could not be saved. Please, try again.'));
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
		$this->Casing->id = $id;
		if (!$this->Casing->exists()) {
			throw new NotFoundException(__('Invalid casing'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Casing->save($this->request->data)) {

				// provide a return value for Bancha requests
				// never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
				if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
					return $this->Casing->getLastSaveResult();
				}

				$this->Session->setFlash(__('The casing has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {

				// provide a return value for Bancha requests
				// never use SessionComponent::setFlash() in Bancha requests
				if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
					return $this->Casing->getLastSaveResult();
				}

				$this->Session->setFlash(__('The casing could not be saved. Please, try again.'));
			}
		} else {
			// Bancha will never do this request, so no return needed here
			$this->request->data = $this->Casing->read(null, $id);
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
		$this->Casing->id = $id;
		if (!$this->Casing->exists()) {
			throw new NotFoundException(__('Invalid casing'));
		}
		if ($this->Casing->delete()) {

			// provide a return value for Bancha requests
			// never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
			if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
				return $this->Casing->getLastSaveResult();
			}

			$this->Session->setFlash(__('Casing deleted'));
			$this->redirect(array('action' => 'index'));
		}

		// provide a return value for Bancha requests
		// never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
		if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
			return $this->Casing->getLastSaveResult();
		}

		$this->Session->setFlash(__('Casing was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}