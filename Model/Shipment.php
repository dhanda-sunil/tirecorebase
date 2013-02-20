<?php
App::uses('AppModel', 'Model');
/**
 * Shipment Model
 *
 * @property ShipmentGood $ShipmentGood
 */
class Shipment extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';
    public $actsAs = array('Linkable');
    
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'name' => array(
			'notempty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Please enter a shipment name',
				'allowEmpty' => false,
			),
		),
		'created_by' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Invalid user',
				'allowEmpty' => false,
			),
		)
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'ShipmentGood' => array(
			'className' => 'ShipmentGood',
			'foreignKey' => 'shipment_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);
/**
 * hasMany associations
 *
 * @var array
 */
	public $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'created_by'
		)
	);
}
