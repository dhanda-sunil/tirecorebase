<?php
App::uses('AppModel', 'Model');

class Address extends AppModel {

    public $actsAs = array('Bancha.BanchaRemotable');
    public $useTable = 'addresses';
    
	public $validate = array(
		'ref_id' => array(
			'numeric' => array(
				'rule' => 'numeric',
				'message' => 'Missing ref_id (internal error)',
				'allowEmpty' => false,
				'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'ref_table' => array(
			'notempty' => array(
				'rule' => 'notempty',
				'message' => 'Missing ref_table (internal error)',
				'allowEmpty' => false,
				'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'name' => array(
			'notempty' => array(
				'rule' => 'notempty',
				'message' => 'Missing address name',
				'allowEmpty' => false,
				'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		)
    );

//	public $hasMany=array(
//		'Customer' => array(
//			'className' => 'Customer',
//			'foreignKey' => 'ref_id',
//			'conditions' => array('Customer.ref_table'=>'customers')
//		)
//	);
}