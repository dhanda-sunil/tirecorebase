<?php
App::uses('AppModel', 'Model');
/**
 * Mold Model
 *
 * @property MoldType $MoldType
 */
class Mold extends AppModel {
    public $actsAs = array('Linkable');
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'mold_type_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Mold Type is required',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'barcode' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Barcode is required',
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
		'MoldType' => array(
			'className' => 'MoldType',
			'foreignKey' => 'mold_type_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
