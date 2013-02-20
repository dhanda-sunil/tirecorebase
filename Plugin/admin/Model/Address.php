<?php
App::uses('AppModel', 'Model');

class Address extends AppModel {

    public $actsAs = array('Bancha.BanchaRemotable');
    public $useTable = 'addresses';
    
	public $validate = array(
		'ref_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'ref_table' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
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