<?php
App::uses('AppController', 'Controller');
/**
 * RetreadTemplates Controller
 *
 * @property RetreadTemplate $RetreadTemplate
 */
class RetreadTemplatesController extends AppController {
    
    public $uses = array(
        'TireSize',
        'Material',
        'PatchLocation',
        'RetreadTemplate',
        'RetreadTemplatePreference',
        'TreadDesign'
    );
    
    function sidebar_action(){
        $this->layout = false;
        $this->set('template_list', $this->RetreadTemplate->find('list'));
    }
    
    function index(){
        $this->layout = false;
        // unbind model associations for speed
        $this->TireSize->unbindModelAll();
        $this->Material->unbindModelAll();
        $this->PatchLocation->unbindModelAll();
        $this->TreadDesign->unbindModelAll();
        
        $templateCount = $this->RetreadTemplate->find('count');

        if( $templateCount == 0 ){ // create default template if none exist
            $this->RetreadTemplate->save(array('RetreadTemplate'=>array('name'=>'Default','is_default'=>1)));
        }
        
        // sets
        $this->set('tireSizes', $this->TireSize->find('all',array('order'=>'TireSize.name asc')));
        $this->set('materials', $this->Material->find('list',array('order'=>'Material.name asc')));
        $this->set('patches', $this->PatchLocation->find('list'));
        $this->set('treadDesigns', $this->TreadDesign->find('all',array(
            'fields' => array('TreadDesign.id','TreadDesign.tread_abb','TreadDesign.name'),
            'order' => 'TreadDesign.name ASC')
        ));
    }

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
        
		$this->RetreadTemplate->id = $id;
        
        if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
            $this->set('retreadTemplate', $this->RetreadTemplate->read(null, $id));

            // provide a return value for Bancha requests
            return $this->RetreadTemplate->data;
        }
        else{
            $this->autoRender = false;
            $this->RetreadTemplate->RetreadTemplatePreference->unbindModel(array('belongsTo'=>array('RetreadTemplate')));
            
            if($id){
                $template = $this->RetreadTemplate->getRetreadTemplatePreferences($id);
            }
            else{
                $findTemplate = $this->RetreadTemplate->find('first',array('conditions'=>array('is_default'=>1)));
                $template = $this->RetreadTemplate->getRetreadTemplatePreferences($findTemplate['RetreadTemplate']['id']);
            }
            
            if($template){
                // reindex array 0 - n for easier looping in javascript
                $template['RetreadTemplatePreference'] = array_values($template['RetreadTemplatePreference']);
                echo json_encode($template);
            }
        }
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
        
        $this->autoRender = false;
        $data = json_decode($this->request->data['RetreadTemplatePreference'],true);

        $this->RetreadTemplate->create();
        $template = $this->RetreadTemplate->save(array(
            'RetreadTemplate' => array(
                'name' => $data['name']
            )
        ));
        
        if(!$template){
            echo json_encode(array('success'=>0));
            return false;
        }
        
        $id = $template['RetreadTemplate']['id'];
        
        // loop through and build preferences
        foreach($data['preferences'] as $x => $i){
            $data['preferences'][$x]['retread_template_id'] = $id;
        }
        
        // add preferences
        $success = 0;
        foreach($data['preferences'] as $x => $i){
            $this->RetreadTemplatePreference->create();
            $r = $this->RetreadTemplatePreference->save(array(
                'RetreadTemplatePreference' => $i
            ));
            if($r){
                $success++;
            }
        }
        
        echo json_encode(array(
            'success' => 1,
            'title' => 'Template Saved',
            'RetreadTemplate' => $template['RetreadTemplate'],
            'RetreadPreferences' => array('attempts' => count($data['preferences']), 'succeeded' => $success)
        ));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
        
        $this->autoRender = false;
        $data = json_decode($this->request->data['RetreadTemplatePreference'],true);
        
        $this->RetreadTemplate->id = $id;
        
        if(!$this->RetreadTemplate->exists()){
            echo json_encode(array('success'=>0));
            return false;
        }
        
        $saved = $this->RetreadTemplate->save(array(
            'RetreadTemplate' => array(
                'name' => $data['name']
            )
        ));
        
        if(!$saved){
            echo json_encode(array('success'=>0));
            return false;
        }
        
        // remove existing preferences
        $this->RetreadTemplatePreference->deleteAll(array('retread_template_id'=>$id));
        
        // loop through and rebuild preferences
        foreach($data['preferences'] as $x => $i){
            $data['preferences'][$x]['retread_template_id'] = $id;
        }
        
        // addd preferences
        $success = 0;
        foreach($data['preferences'] as $x => $i){
            $this->RetreadTemplatePreference->create();
            $r = $this->RetreadTemplatePreference->save(array(
                'RetreadTemplatePreference' => $i
            ));
            if($r){
                $success++;
            }
        }
        
        echo json_encode(array(
            'success' => 1,
            'title' => 'Template Saved',
            'RetreadTemplate' => array('name'=>$data['name']),
            'RetreadPreferences' => array('attempts' => count($data['preferences']), 'succeeded' => $success)
        ));
	}

/**
 * delete method
 *
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
        $this->autoRender = false;

		$this->RetreadTemplate->id = $id;
        
		if (!$this->RetreadTemplate->exists()) {
			throw new NotFoundException(__('Invalid retread template'));
		}
        
		if ($this->RetreadTemplate->delete()) {
            
			// provide a return value for Bancha requests
			// never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
			if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
				return $this->RetreadTemplate->getLastSaveResult();
			}

            $this->loadModel('RetreadTemplatePreferences');
            $this->RetreadTemplatePreferences->deleteAll(array('retread_template_id'=>$id));
            
			$this->Session->setFlash(__('Retread template deleted'));
            echo json_encode(array('success'=>1));
		}
        else{
            $this->Session->setFlash(__('Retread template was not deleted'));
            echo json_encode(array('success'=>0));
        }

		// provide a return value for Bancha requests
		// never use SessionComponent::setFlash() or Controller::redirect() in Bancha requests
		if(isset($this->request->params['isBancha']) && $this->request->params['isBancha']) {
			return $this->RetreadTemplate->getLastSaveResult();
		}
	}
}
