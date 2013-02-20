<?php
App::uses('AppModel', 'Model');
/**
 * BeadPlate Model
 *
 * @property BuffSpec $BuffSpec
 */
class BeadPlate extends AppModel {

    public $displayField = 'description';
    
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'ref' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Ref is required',
				'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'description' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Description is required',
				'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'BuffSpec' => array(
			'className' => 'BuffSpec',
			'foreignKey' => 'bead_plate_id',
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

}
