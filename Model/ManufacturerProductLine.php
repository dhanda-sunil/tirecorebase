<?php
App::uses('AppModel', 'Model');
/**
 * ManufacturersProductsLine Model
 *
 * @property Manufacturer $Manufacturer
 * @property ManufacturersProductsLinesGroup $ManufacturersProductsLinesGroup
 * @property CustomerPriceExceptionsOld $CustomerPriceExceptionsOld
 * @property Material $Material
 * @property Product $Product
 * @property Group $Group
 * @property Vendor $Vendor
 */
class ManufacturerProductLine extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';
    public $actsAs = array('Bancha.BanchaRemotable');

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'manufacturer_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'manufacturers_products_lines_group_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'is_material' => array(
			'boolean' => array(
				'rule' => array('boolean'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'dot_code' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'order' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'material_size_list' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
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
	 	'ManufacturerPlant',
	 	'ManufacturerProductLineGroup' => array(
	 		'className' => 'ManufacturerProductLineGroup',
	 		'foreignKey' => 'manufacturer_product_line_group_id',
	 		'conditions' => '',
	 		'fields' => '',
	 		'order' => ''
	 	)
	 );
}