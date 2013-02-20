<?php
App::uses('AppModel', 'Model');
/**
 * MoldType Model
 *
 */
class MoldType extends AppModel {

	public $actsAs = array('Bancha.BanchaRemotable','Linkable');
    public $displayField = 'description';
    
    public $belongsTo = array(
        'TreadDesign',
        'TireSize',
        'BeadPlate'
    );
    
	public $validate = array(
		'tread_design_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Tread Design is required',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'tire_size_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Tire Size is required',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'bead_plate_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Bead Plate is required',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'description' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Description is required',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'code' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Code is required',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
}
