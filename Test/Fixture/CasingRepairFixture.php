<?php
/**
 * CasingRepairFixture
 *
 */
class CasingRepairFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'casing_id' => array('type' => 'integer', 'null' => true, 'default' => null),
		'material_id' => array('type' => 'integer', 'null' => true, 'default' => null),
		'quantity' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 3),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'MyISAM')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'casing_id' => 1,
			'material_id' => 1,
			'quantity' => 1
		),
		array(
			'id' => 2,
			'casing_id' => 2,
			'material_id' => 2,
			'quantity' => 2
		),
		array(
			'id' => 3,
			'casing_id' => 3,
			'material_id' => 3,
			'quantity' => 3
		),
		array(
			'id' => 4,
			'casing_id' => 4,
			'material_id' => 4,
			'quantity' => 4
		),
		array(
			'id' => 5,
			'casing_id' => 5,
			'material_id' => 5,
			'quantity' => 5
		),
		array(
			'id' => 6,
			'casing_id' => 6,
			'material_id' => 6,
			'quantity' => 6
		),
		array(
			'id' => 7,
			'casing_id' => 7,
			'material_id' => 7,
			'quantity' => 7
		),
		array(
			'id' => 8,
			'casing_id' => 8,
			'material_id' => 8,
			'quantity' => 8
		),
		array(
			'id' => 9,
			'casing_id' => 9,
			'material_id' => 9,
			'quantity' => 9
		),
		array(
			'id' => 10,
			'casing_id' => 10,
			'material_id' => 10,
			'quantity' => 10
		),
	);

}
