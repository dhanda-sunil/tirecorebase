<?php
App::uses('AppModel', 'Model');
/**
 * Contact Model
 *
 * @property ContactMethod $ContactMethod
 */
class Contact extends AppModel {

	public $actsAs = array('Bancha.BanchaRemotable');


/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';

    public $virtualFields = array(
        'name' => 'CONCAT(Contact.first_name, " ", Contact.last_name)'
    );
    
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'ref_table' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Invalid table (internal error)',
				'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'ref_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Invalid ref_id (internal error)',
				'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'first_name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Enter a valid first name',
				'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'active' => array(
			'boolean' => array(
				'rule' => array('boolean'),
				'message' => 'Invalid value for active',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
        'phone_number' => array(
            'rule' => array('phone', null, 'us'),
            'message' => 'Please enter a valid phone number',
            'allowEmpty' => true
		),
        'email' => array(
            'rule' => 'email',
            'message' => 'Please enter a valid email address',
            'allowEmpty' => true
        )
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'ContactMethod' => array(
			'className' => 'ContactMethod',
			'foreignKey' => 'contact_id',
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
 * belongsTo associations
 *
 * @var array
 */
/* This one is not working
	public $belongsTo =array(
		'Customer' => array(
			'className' => 'Customer',
			'foreign_key' => 'ref_id',
			'conditions' => array('Contact.ref_table'=>'customers')
		)
	);*/

}
