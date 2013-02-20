<?php
App::uses('AppModel', 'Model');
/**
 * Account Model
 *
 */
class Account extends AppModel {
    public $actsAs = array('Bancha.BanchaRemotable','Containable');

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'number';

	public $validate = array(
		'customer_id' => array(
			'numeric' => array(
				'rule' => 'numeric',
				'message' => 'Customer is required',
				'allowEmpty' => false,
			),
		),
		'account_type_id' => array(
			'numeric' => array(
				'rule' => 'numeric',
				'message' => 'Account type is required',
				'allowEmpty' => false,
			),
		),
		'number' => array(
			'notEmpty' => array(
                'rule' => 'notEmpty',
                'message' => 'Account number is required',
				'allowEmpty' => false
			),
		),
		'user_id' => array(
			'numeric' => array(
                'rule' => 'numeric',
                'message' => 'Sales rep is required',
				'allowEmpty' => false
			),
		),
	);
    
/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Customer',
        'AccountType'
        ,'BillingAddress' => array(
			'className' => 'Address',
            'foreignKey' => 'default_bill_to_id'
        )
        ,'ShippingAddress' => array(
			'className' => 'Address',
            'foreignKey' => 'default_ship_to_id',
        )
        ,'User' => array(     
            'foreignKey' => 'user_id'
        )
	);
}
