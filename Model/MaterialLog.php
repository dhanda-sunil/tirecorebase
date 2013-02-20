<?php
App::uses('AppModel', 'Model');
/**
 * MaterialLog Model
 *
 * @property Material $Material
 * @property User $User
 */
class MaterialLog extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'material_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Material is undefined',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'unit_change' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Unit change must be a number',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'weight_change' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Weight change must be a number',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'units' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Units must be a number',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'weight' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Units must be a number',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'event_type' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Event type is invalid',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'created_by' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Created by user is undefined',
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
		'Material' => array(
			'className' => 'Material',
			'foreignKey' => 'material_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'created_by',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
