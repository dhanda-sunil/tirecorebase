<?php
App::uses('AppModel', 'Model');
/**
 * Co Model
 *
 */
class Co extends AppModel {

    public $actsAs = array('Bancha.BanchaRemotable','Containable');
    public $displayField = 'ref';

    /*
     * Make sure new Co has status of "Open"
     */

    public function beforeSave($options = array()) {
        if(empty($this->data['Co']['id']) && empty($this->data['Co']['status'])) {
            $this->data['Co']['status'] = "Open";
        }
    }

/*
 * Validations
 */

	public $validate = array(
		'ref' => 'isUnique'
	);

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Account',
        'BillingAddress' => array(
			'className' => 'Address',
            'foreignKey' => 'bill_address_id',
            'conditions' => array('BillingAddress.is_billing'=>'1')
        ),
        'ShippingAddress' => array(
			'className' => 'Address',
            'foreignKey' => 'ship_address_id',
            'conditions' => array('ShippingAddress.is_shipping'=>'1')
        ),
        'User',
		'CoStatus'
	);

	public $hasMany = array('CoItem'
	);
    
}
