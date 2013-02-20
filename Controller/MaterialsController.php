<?php
App::uses('AppController', 'Controller');
/**
 * Materials Controller
 *
 * @property Material $Material
 */
class MaterialsController extends AppController
{
    public $uses = array('Material','Batch');
    public $components = array('Pdf');
    
    public function sidebar_action(){
        $this->autoRender = false;
    }
    
	/*
	 * @banchaRemotable
	 *
	 * Return all available Patches
	 */
	public function getAvailablePatches()
	{
		$patches = $this->Material->find('list',array(
			'conditions' => array('material_type_id'=> 2),
			'fields' => array('id','name'),
		));
		return array('records' => $patches);
	}
    
/**
 * adjust inventory with values from batch and return array('success'=>boolean,'adjusted'=>int,'failed'=>int,'errors'=>array())
 * @return array
 */
    public function batchadjust(){
        $this->layout = false;
        $batch_id = $this->request->data['Batch']['id'];
        $start = $end = null;
        
        if( isset($this->request->data['start_date']) ){
            $start = $this->request->data['start_date'];
        } 
        if( isset($this->request->data['end_date']) ){
            $end = $this->request->data['end_date'];
        }

		$this->Material->recursive = 0;
		$materialsReport = $this->Material->inventoryReport($start,$end);

        // fetch batch
        $batch = $this->Batch->getCalculatedInventoryBatch($batch_id);

        $errors = array();
        $tmp = array();
        $success = $error = 0;
        
        // create temp array of sku values
        foreach($batch as $i){
            $tmp[] = $i['sku'];
        }
        
        // get material.id's by sku
        $materials = $this->Material->find('list',array('fields'=>array('id','part_number'),'conditions'=>array('part_number'=>$tmp)));

        foreach($materialsReport as $x => $i){
            $sku = $i['Material']['part_number'];
            $materialsReport[$x]['Material']['unit_count'] = 
            $materialsReport[$x]['Material']['unit_var'] = 
            $materialsReport[$x]['Material']['weight_count'] = 
            $materialsReport[$x]['Material']['weight_var'] = 
            $materialsReport[$x]['Material']['value_var'] = 0;
            if( array_key_exists($sku, $batch) ){
                $materialsReport[$x]['Material']['unit_count'] = $batch[$sku]['units'];
                $materialsReport[$x]['Material']['unit_var'] = $i['Material']['units'] - $batch[$sku]['units'];
                $materialsReport[$x]['Material']['weight_count'] = $batch[$sku]['weight'];
                $materialsReport[$x]['Material']['weight_var'] = round($i['Material']['weight'] - $batch[$sku]['weight'],2);
                $materialsReport[$x]['Material']['value_var'] = $materialsReport[$x]['Material']['unit_var'] * $i['Material']['price_per_unit'];
            }
        }
        $view = new View($this, false);
        $view->set('materials', $materialsReport);
        $this->set('user',$this->Session->read('Auth.User'));
        $view->viewPath = 'Materials';
        $file = $this->Pdf->outputFileFromHtml($view->render('adjustment_pdf_report'));

        // proceede
        if($materials){
            // loop through batch adjusting inventory
            foreach($batch as $i){
                $material_id = array_search($i['sku'], $materials);

                if($material_id){
                    $r = $this->Material->adjustInventory($material_id, $i['units'], $i['weight'], $this->Session->read('Auth.User.id'));
                    if($r['success']){
                        $success++;
                    }
                    else{
                        $error++;
                        $errors[] = $r['error'][0];
                    }
                }
            }
        }
        
        $return = array(
            'success' => 0,
            'adjusted' => $success,
            'failed' => $error,
            'errors' => $errors
        );

        if($error == 0){
            // on success set batch to inactive
            $return['success'] = 1;
            $this->Session->write('Adjustment.pdf',$file);
            $this->Session->write('Adjustment.name',$batch_id.' '.$start.' '.$end);
            $this->Batch->id = $batch_id;
            $this->Batch->save(array('Batch'=>array('active'=>0)));
        }
        
        $this->set('adjustment',$return);
        $this->set('_serialize','adjustment');
    }
    
	/**
	 * @banchaRemotable
	 * index method
	 *
	 * @return void
	 */
	public function index()
	{
        $start = $end = null;
        
        if( isset($this->request->data['start_date']) ){
            $start = $this->request->data['start_date'];
        } 
        if( isset($this->request->data['end_date']) ){
            $end = $this->request->data['end_date'];
        }

		$this->Material->recursive = 0;
		$materials = $this->Material->inventoryReport($start,$end);
		$batches = $this->Batch->find('all',array('conditions'=>array('type'=>'inventory','active'=>'1')));
		$compacted = compact('materials', 'batches');

		if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
			return $compacted;
		}
		else{
			$this->set($compacted);
		}

	}
    
	/**
	 * view method
	 *
	 * @param string $id
	 * @return void
	 */
	public function view($id = null)
	{
		$this->Material->id = $id;
		if (!$this->Material->exists()) {
			throw new NotFoundException(__('Invalid material'));
		}
		$this->set('material', $this->Material->read(null, $id));

		// provide a return value for Bancha requests
		return $this->Material->data;
	}

	/**
	 * add method
	 *
	 * @return void
	 */
	public function add()
	{
		if ($this->request->is('post')) {
			$this->Material->create();
			if ($this->Material->save($this->request->data)) {

				// provide a return value for Bancha requests
				// never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
				if (isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
					return $this->Material->getLastSaveResult();
				}

				$this->Session->setFlash(__('The material has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {

				// provide a return value for Bancha requests
				// never use SessionComponent::setFlash() in Bancha requests
				if (isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
					return $this->Material->getLastSaveResult();
				}

				$this->Session->setFlash(__('The material could not be saved. Please, try again.'));
			}
		}
	}

	/**
	 * edit method
	 *
	 * @param string $id
	 * @return void
	 */
	public function edit($id = null)
	{   
        $this->Material->id = $id;
        
        if( isset($this->request->data['row_id']) && isset($this->request->data['row_id']) ){
            $this->Material->id = $this->request->data['row_id'];
            
            $units = $this->request->data['field'] == 'units' ? $this->request->data['value'] : null;
            $weight = $this->request->data['field'] == 'weight' ? $this->request->data['value'] : null;
        }
        else{
            
            $units = $this->request->data['units'];
            $weight = $this->request->data['weight'];
        }
        
		if (!$this->Material->exists()) {
			throw new NotFoundException(__('Invalid material'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
            
			if ($this->Material->adjustInventory($this->Material->id, $units, $weight, $this->Session->read('Auth.User.id'))) {

				// provide a return value for Bancha requests
				// never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
				if (isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
					return $this->Material->getLastSaveResult();
				}

				$this->Session->setFlash(__('The material has been saved'));
                if( isset($this->request->data['row_id']) && isset($this->request->data['row_id']) ){
                    $this->autoRender = false;
                    echo $this->request->data['value'];
                }
                else{
                    $this->redirect(array('action' => 'index'));
                }
			} else {

				// provide a return value for Bancha requests
				// never use SessionComponent::setFlash() in Bancha requests
				if (isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
					return $this->Material->getLastSaveResult();
				}

				$this->Session->setFlash(__('The material could not be saved. Please, try again.'));
			}
		} else {
			// Bancha will never do this request, so no return needed here
			$this->request->data = $this->Material->read(null, $id);
		}
	}

    public function adjustment_report(){
        $this->layout = false;
        header('Content-type: application/pdf');
        header('Content-Disposition: inline; filename="Inventory Adjustment '.$this->Session->read('Adjustment.name').'.pdf"');
        readfile($this->Session->read('Adjustment.pdf'));
        unlink($this->Session->read('Adjustment.pdf'));
    }
    
	/**
	 * delete method
	 *
	 * @param string $id
	 * @return void
	 */
	public function delete($id = null)
	{
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Material->id = $id;
		if (!$this->Material->exists()) {
			throw new NotFoundException(__('Invalid material'));
		}
		if ($this->Material->delete()) {

			// provide a return value for Bancha requests
			// never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
			if (isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
				return $this->Material->getLastSaveResult();
			}

			$this->Session->setFlash(__('Material deleted'));
			$this->redirect(array('action' => 'index'));
		}

		// provide a return value for Bancha requests
		// never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
		if (isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
			return $this->Material->getLastSaveResult();
		}

		$this->Session->setFlash(__('Material was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
