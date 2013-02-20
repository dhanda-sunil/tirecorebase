<?php
App::uses('AppModel', 'Model');
/**
 * RetreadTemplate Model
 *
 */
class RetreadTemplate extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';

    public $validate = array(
        'name' => array(
            'rule' => 'notEmpty',
            'required' => true,
            'message' => 'Template name is required'
        )
    );
    
	public $hasMany = array(
		'RetreadTemplatePreference' => array(
			'className' => 'RetreadTemplatePreference',
			'foreignKey' => 'retread_template_id',
			'conditions' => '',
			'fields' => '',
			'order' => 'RetreadTemplatePreference.tire_size_id'
		)
	);
    
    /**
     * getRetreadTemplatePreferences
     * returns a retread tempaltes preferences indexed by tire_size
     * @param type $retread_template_id
     * @return array
     */
    public function getRetreadTemplatePreferences($retread_template_id){
        
        // remove unneeded associations
        $this->RetreadTemplatePreference->unbindModelAll();
        // add TireSize back in since its used below
        $this->RetreadTemplatePreference->bindModel(array('belongsTo'=>array('TireSize')));
        // get template
        $template = $this->find('first',array('conditions'=>array('id'=>$retread_template_id),'recursive'=>2));
        
        if($template){
            $tmp = $template['RetreadTemplatePreference'];
            $template['RetreadTemplatePreference'] = array();
            // re-organize preferences multi-dimensionally by tire_size_id
            foreach($tmp as $i){
                $template['RetreadTemplatePreference'][$i['tire_size_id']]['tire_size_id'] = $i['tire_size_id'];
                if(isset($i['TireSize']['name'])){
                    $template['RetreadTemplatePreference'][$i['tire_size_id']]['tire_size_name'] = $i['TireSize']['name'];
                }
                unset($i['TireSize']);
                $template['RetreadTemplatePreference'][$i['tire_size_id']]['preferences'][] = $i;
            }
            unset($tmp);
        }
        return $template;
    }
}
