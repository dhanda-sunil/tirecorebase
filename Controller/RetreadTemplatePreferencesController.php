<?php
App::uses('AppController', 'Controller');
/**
 * RetreadPreferences Controller
 */
class RetreadTemplatePreferencesController extends AppController {
    
    public $uses = array(
        'TireSize',
        'Material',
        'PatchLocation',
        'RetreadTemplate',
        'RetreadTemplatePreference'
    );
    
    function index(){
        // unbind model associations for speed
        $this->TireSize->unbindModelAll();
        $this->Material->unbindModelAll();
        $this->PatchLocation->unbindModelAll();
        
        $templateCount = $this->RetreadTemplate->find('count');

        if( $templateCount == 0 ){ // create default template if none exist
            $this->RetreadTemplate->save(array('RetreadTemplate'=>array('name'=>'Default','is_default'=>1)));
        }
        
        // sets
        $this->set('tireSizes', $this->TireSize->find('all',array('order'=>'TireSize.name asc')));
        $this->set('materials', $this->Material->find('list',array('order'=>'Material.name asc')));
        $this->set('patches', $this->PatchLocation->find('list'));
        $this->set('template_list', $this->RetreadTemplate->find('list'));
    }
    
    function add($id = null){

    }
    
    function edit(){
        $this->autoRender = false;
        echo '<pre>';
        print_r($this->request->data);
        echo '</pre>';
        die('pre end');
    }
    
    function view(){
        
    }
}