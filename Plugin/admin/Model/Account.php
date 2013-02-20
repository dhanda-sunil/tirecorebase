<?php
App::uses('AppModel', 'Model');
/**
 * Account Model
 *
 */
class Account extends AppModel {
    public $actsAs = array('Bancha.BanchaRemotable');

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'number';

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
        ),
        'User' => array(
            'foreignKey' => 'user_id'
        )
	);
}
