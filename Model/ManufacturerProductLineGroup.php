<?php
App::uses('AppModel', 'Model');
/**
 * ManufacturerProductLineGroup Model
 *
 * @property Manufacturer $Manufacturer
 * @property ManufacturerProductLine $ManufacturerProductLine
 */
class ManufacturerProductLineGroup extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Manufacturer' => array(
			'className' => 'Manufacturer',
			'foreignKey' => 'manufacturer_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'ManufacturerProductLine' => array(
			'className' => 'ManufacturerProductLine',
			'foreignKey' => 'manufacturer_product_line_group_id',
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
