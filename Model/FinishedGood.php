<?php
App::uses('AppModel', 'Model');
/**
 * FinishedGood Model
 *
 * @property Casing $Casing
 */
class FinishedGood extends AppModel {

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
//		'fg_code' => array(
//			'notempty' => array(
//				'rule' => array('notempty'),
//				//'message' => 'Your custom message here',
//				//'allowEmpty' => false,
//				//'required' => false,
//				//'last' => false, // Stop validation after this rule
//				//'on' => 'create', // Limit validation to 'create' or 'update' operations
//			),
//		),
		'stock_status' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Stock status should be in stock or shipped',
				'allowEmpty' => false,
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
		)
	);
/**
 * hasOne associations
 *
 * @var array
 */
	public $hasOne = array(
		'ShipmentGood'
	);
}
