<?php
App::uses('AppModel', 'Model');

class Customer extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'company_name';
    public $actsAs = array('Bancha.BanchaRemotable','Containable');
    public $hasMany = array(
	    'Account',
	    'Address' => array(
		    'className' => 'Address',
		    'foreignKey' => 'ref_id',
		    'conditions' => array('Address.ref_table'=>'customers')
	    ),
	    'Contact' => array(
		    'className' => 'Contact',
		    'foreignKey' => 'ref_id',
		    'conditions' => array('Contact.ref_table' => 'customers')
	    )
    );
    public $hasOne = array(
        'RetreadTemplate' => array(
		    'className' => 'RetreadTemplate',
		    'foreignKey' => 'id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
        )
    );

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'company_name' => array(
			'notempty' => array(
				'rule' => 'notEmpty',
				'message' => 'Please enter a company name',
				'allowEmpty' => false,
			),
		),
		'active' => array(
			'boolean' => array(
				'rule' => 'boolean',
				'message' => 'Please set company to active or inactive',
				'allowEmpty' => false,
			),
		),
		'retread_template_id' => array(
			'numeric' => array(
                'rule' => 'notEmpty',
                'message' => 'Please select a retread template',
				'allowEmpty' => false
			),
		),
	);

    public function  beforeSave($options = array()) {
		if(!empty($this->data['Customer']['tax_number_expiration'])){
			$this->data['Customer']['tax_number_expiration'] = date('Y-m-d',strtotime($this->data['Customer']['tax_number_expiration']));
        }
        else{
            unset($this->data['Customer']['tax_number_expiration']);
        }
		return true;
	}
}
