<?php
App::uses('AppController', 'Controller');
/**
 * AccountTypes Controller
 *
 */
class ShipmentsController extends AppController {
    
    public $uses = array('Shipment','CustomerLocation','CoItem','FinishedGood','ShipmentGood','Casing','Batch');
    public $components = array('Pdf','DataTable');
    
    public function sidebar_action(){
        
    }
    
    public function index(){
        
        if($this->RequestHandler->responseType() == 'json'){
            $this->paginate = array(
                'fields' => array('Shipment.id','Shipment.name','Shipment.created_date'),
                'link' => array(
                    'User' => array('fields'=>array('CONCAT(User.first_name," ",User.last_name) as name','User.first_name','User.last_name'))
                )
            );
            $this->DataTable->fields = array('Shipment.name','Shipment.created_date','0.name','User.first_name','User.last_name','Shipment.id');
            $this->set('shipments',$this->DataTable->getResponse($this,$this->Shipment));
            $this->set('_serialize','shipments');
        }
        else{
            //$this->set('shipments', $this->Shipment->find('all'));
            $this->set('batches', $this->Batch->find('all',array('conditions'=>array('type'=>'shipping','active'=>'1'))));
            $this->set('casings', array());
        }
    }
    
    public function get(){
        $this->autoRender = false;
        
        $params = array_merge_recursive($params, array(
            'conditions' => array(
                'co_item_status_id' => array(2,3),
                'Casing.shipped_date IS NULL'
            ),
            'recursive' => 3
         ));
        
        echo json_encode($this->Shipment->find('all'));
    }
    
    public function goods($shipment_id,$render=false){
        $this->layout = false;
        $this->paginate = array(
            'link' => array(
                'ShipmentGood' => array(
                    'FinishedGood' => array(
                        'Casing' => array(
                            'fields' => array('id','barcode','CONCAT(plant_dot,size_dot,product_line_dot,production_week) as dot'),
                            'Customer' => array('fields' => array('company_name')),
                            'TireSize' => array('fields' => array('name')),
                            'TreadWidth' => array('fields' => array('size_mm')),
                            'TreadDesign' => array('fields' => array('tread_abb','name')),
                            'Manufacturer' => array('fields' => array('name')),
                            'CoItem' => array('fields'=>array('line_number'), 'link'=> array(
                                    'CoItemType'=> array('fields'=>array('name')),
                                    'Co' => array('fields'=>array('ref'))
                                )
                            ),
                        )
                    )
                )
            ),
            'conditions' => array('Shipment.id' => $shipment_id)
        );

        if($render == false){
            $this->DataTable->emptyElements = 1;
            $this->DataTable->fields = array(
                'Casing.id', 'Co.ref', 'Customer.company_name', 'CoItem.line_number', 'Casing.barcode', 'CoItemType.name' ,'TreadDesign.tread_abb', 'TireSize.name', 
                'Manufacturer.name', '0.dot', 'TreadDesign.name', 'TreadWidth.size_mm'
            );
            $this->set('casings',$this->DataTable->getResponse($this,$this->Shipment));
            $this->set('_serialize','casings');
        }
        else{
            $this->autoRender = false;
            $view = new View($this, false);
            $view->set('text', 'Shipments');
            $view->viewPath = 'Shipments';
            $file = $this->Pdf->outputFileFromHtml($view->render('goods'));
            header('Content-type: application/pdf');
            header('Content-Disposition: inline; filename="Shipments '.$casings[0]['Shipment']['name'].' '.$casings[0]['Shipment']['created_date'].'.pdf"');
            readfile($file);
            unlink($file);
        }
    }
    
    public function add(){
        $this->autoRender = false;
        $data = json_decode($this->request->data,true);
        $user_id = $this->Session->read('Auth.User.id');
        $data['Shipment']['created_by'] = $user_id;
        $data['Shipment']['created_date'] = date('Y-m-d');
        $data['Shipment']['created_time'] = date('H:i:s');
        $this->Shipment->create();
        $shipment = $this->Shipment->save($data);
        if(!$shipment){
            echo json_encode(array('success'=>0,'errors'=>$this->Shipment->validationErrors));
            return false;
        }
        
        $id = $shipment['Shipment']['id'];
        
        // set batch to inactive
        if( isset($data['batch_id']) && $data['batch_id'] ){
            $this->Batch->id = $data['batch_id'];
            $this->Batch->save(array('Batch'=>array('active'=>0)));
        }
        
        // add to finished goods and shipped goods
        $success = 0;

        foreach($data['Shipment']['coItems'] as $i){
            // finished goods
            $this->FinishedGood->create();
            $finished = $this->FinishedGood->save(array(
                'FinishedGood' => array(
                    'casing_id' => $i,
                    'stock_status' => 'Shipped'
                )
            ));
            // shipped goods
            if($finished){
                $this->ShipmentGood->create();
                $this->ShipmentGood->save(array(
                    'ShipmentGood'=>array(
                        'shipment_id' => $id,
                        'finished_good_id' => $finished['FinishedGood']['id'],
                        'created_by' => $user_id
                    )
                ));
                $success++;
            }
            // update co item as shipped
            $data['shipped_date'] = date('Y-m-d H:i:s');

            $this->Casing->id = $i;
            $this->Casing->save(array(
                'Casing' => array(
                    'shipped_date' => date('Y-m-d H:i:s')
                )
            ));
        }
        
        echo json_encode(array(
            'success' => 1,
            'title' => 'Shipment saved',
            'Shipment' => $shipment['Shipment'],
            'ShipmentGood' => array('attempts' => count($data['Shipment']['coItems']), 'succeeded' => $success)
        ));
    }
    
    public function getbatch($id){
        
        $batch = $this->Batch->find('first',array('conditions'=>array('id'=>$id)));

        $this->paginate = array(
            'link' => array(
                'Co' => array('fields' => array('ref')),
                'CoItemType' => array('fields' => array('name')),
                'Casing' => array(
                    'fields' => array('id','barcode','CONCAT(plant_dot,size_dot,product_line_dot,production_week) as dot'),
                    'Customer' => array('fields' => array('company_name')),
                    'TireSize' => array('fields' => array('name')),
                    'TreadWidth' => array('fields' => array('size_mm')),
                    'TreadDesign' => array('fields' => array('tread_abb','name')),
                    'Manufacturer' => array('fields' => array('name')),
                )
            ),
            'conditions' => array(
                'Casing.barcode' => $batch['Batch']['data'],
                'Casing.shipped_date IS NULL'
            )
        );

        $this->DataTable->emptyElements = 1;
        $this->DataTable->fields = array(
            'Casing.id', 'Co.ref', 'Customer.company_name', 'CoItem.line_number', 'Casing.barcode', 'CoItemType.name' ,'TreadDesign.tread_abb', 'TireSize.name', 
            'Manufacturer.name', '0.dot', 'TreadDesign.name', 'TreadWidth.size_mm'
        );
        $this->set('casings',$this->DataTable->getResponse($this,$this->CoItem));
        $this->set('_serialize','casings');
    }
    
    public function unshipped_casings(){
        $this->paginate = array(
            'link' => array(
                'Co' => array('fields' => array('ref')),
                'CoItemType' => array('fields' => array('name')),
                'Casing' => array(
                    'fields' => array('id','barcode','CONCAT(plant_dot,size_dot,product_line_dot,production_week) as dot'),
                    'Customer' => array('fields' => array('company_name')),
                    'TireSize' => array('fields' => array('name')),
                    'TreadWidth' => array('fields' => array('size_mm')),
                    'TreadDesign' => array('fields' => array('tread_abb','name')),
                    'Manufacturer' => array('fields' => array('name')),
                )
            ),
            'conditions' => array(
                'CoItem.co_item_status_id' => array(2,3),
                'Casing.shipped_date IS NULL'
            ),
        );

        $this->DataTable->emptyElements = 1;
        $this->DataTable->fields = array(
            'Casing.id', 'Co.ref', 'Customer.company_name', 'CoItem.line_number', 'Casing.barcode', 'CoItemType.name' ,'TreadDesign.tread_abb', 'TireSize.name', 
            'Manufacturer.name', '0.dot', 'TreadDesign.name', 'TreadWidth.size_mm'
        );
        $this->set('casings',$this->DataTable->getResponse($this,$this->CoItem));
        $this->set('_serialize','casings');
    }
    
    public function get_casings(){

        if($this->data['Casings']){
            
            $casings = json_decode($this->data['Casings'],true);
            
            $this->paginate = array(
                'link' => array(
                    'Co' => array('fields' => array('ref')),
                    'CoItemType' => array('fields' => array('name')),
                    'Casing' => array(
                        'fields' => array('id','barcode','CONCAT(plant_dot,size_dot,product_line_dot,production_week) as dot'),
                        'Customer' => array('fields' => array('company_name')),
                        'TireSize' => array('fields' => array('name')),
                        'TreadWidth' => array('fields' => array('size_mm')),
                        'TreadDesign' => array('fields' => array('tread_abb','name')),
                        'Manufacturer' => array('fields' => array('name')),
                    )
                ),
                'conditions' => array('Casing.id' => $casings)
            );

            $this->DataTable->emptyElements = 1;
            $this->DataTable->fields = array(
                'Casing.id', 'Co.ref', 'Customer.company_name', 'CoItem.line_number', 'Casing.barcode', 'CoItemType.name' ,'TreadDesign.tread_abb', 'TireSize.name', 
                'Manufacturer.name', '0.dot', 'TreadDesign.name', 'TreadWidth.size_mm'
            );
            $this->set('casings',$this->DataTable->getResponse($this,$this->CoItem));
            $this->set('_serialize','casings');
        }
    }
    
    public function fulfillment(){
        
        $this->autoRender = false;
        
        $params = array(
            'conditions' => array(
                'co_item_status_id' => array(2,3),
                'Casing.shipped_date IS NULL'
            ),
            'recursive' => 3
         );
        
        $result = $this->CoItem->getLineItems($params);

        echo json_encode($result);
    }
}