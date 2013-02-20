<?php
App::uses('AppController', 'Controller');

class PdfsController extends AppController {
    
/**
 * renders view for pdf
 * @param string $dir
 * @param string $view
 * @param string $barcode
 * @return void
 */
    function view(){
        // production use is calling this through pdf component - for testing pass in parameters
        $this->autoRender = $this->layout = false;
        $data = $this->request->params['named'];
        $dir = $data['Pdf']['name'];
        $view = $data['Pdf']['view'];
        $this->set('data',$data);
        $this->render("/Pdf/$dir/$view");
    }
    
/**
 * renders view for pdf
 * @param string $dir
 * @param string $view
 * @param string $barcode
 * @return void
 */
    function test($dir, $view, $barcode){
        
        // production use is calling this through pdf component - for testing pass in parameters
        $this->autoRender = $this->layout = false;
        $this->Casing = ClassRegistry::init('Casing');
        $this->Barcode = ClassRegistry::init('Barcode');
        
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
        $data = $this->Casing->find('first',array('conditions'=>array('Casing.barcode'=>$barcode),'recursive'=>4));
        $this->Barcode->barcode(); 
        $this->Barcode->setType('C128'); 
        $this->Barcode->setCode($barcode);
        $this->Barcode->setSize(50,200);
        
        $data['CasingImage'] = 'data:image/png;base64,'.$this->Barcode->getBase64Encoding();
        
        $this->Barcode->setCode($data['TireSize']['size_code'].$data['TreadDesign']['tread_abb'].$data['TreadWidth']['size_standard']);
        
        $data['FinishedImage'] = 'data:image/jpg;base64,'.$this->Barcode->getBase64Encoding();
        $data['Lines'] = count($data['CoItem']['Co']['CoItem']);
        
        //echo '<pre>'; print_r($data); echo '</pre>';
        
        $this->set('data',$data);
        $this->render("/Pdf/$dir/$view");
    }
}