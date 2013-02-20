<?php
App::uses('AppController', 'Controller');

/**
 * Barcode Controller
 */
class BarcodeController extends AppController {

    public $uses = array('Barcode');
    public $helper = array('Response');
    
    /**
     * renders string as barcode png image
     * @param type $data
     * @throws Exception
     * @return void
     */
    function index($data = null,$height = null, $width = null){
        
        if($data == null || empty($data)){
            throw new Exception('Invalid barcode - string cannot be empty');
        }
        else{
            $this->response->type('image/png');
            $this->autoRender = false;

            // Generate Barcode data 
            $this->Barcode->barcode(); 
            $this->Barcode->setType('C128'); 
            $this->Barcode->setCode($data);
            
            if(!$height && !$width){
                $this->Barcode->setSize(50,200);
            }
            else{
                $this->Barcode->setSize($height,$width);
            }

            // Generates image file on server             
            $this->Barcode->showBarcodeImage();
        }
    }
}
