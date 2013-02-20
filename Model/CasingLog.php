<?php
App::uses('AppModel', 'Model');
/**
 * CasingLog Model
 *
 * @property Casing $Casing
 */
class CasingLog extends AppModel {
	
    public $actsAs = array('Bancha.BanchaRemotable');

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'casing_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
    
	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Casing' => array(
			'className' => 'Casing',
			'foreignKey' => 'casing_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Checkpoint' => array(
			'className' => 'Checkpoint',
			'foreignKey' => 'checkpoint_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'NrtCode' => array(
			'className' => 'NrtCode',
			'foreignKey' => 'nrt_code_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
    
    public function save($data = null, $validate = true, $fieldList = array()) {
        
        if( !isset($data[$this->alias]['created_date']) ){
            $data[$this->alias]['created_date'] = date('Y-m-d');
        }
        if( !isset($data[$this->alias]['created_time']) ){
            $data[$this->alias]['created_time'] = date('H:i:s');
        }
        
        $this->set($data);

        return parent::save($this->data, $validate, $fieldList);
    }
}
