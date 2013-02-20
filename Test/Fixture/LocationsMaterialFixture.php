<?php
/**
 * LocationsMaterialFixture
 *
 */
class LocationsMaterialFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'location_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'material_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'quantity' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => '10,3'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'location_id' => array('column' => array('location_id', 'material_id'), 'unique' => 0)
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
			'location_id' => 1,
			'material_id' => 1,
			'quantity' => 1
		),
		array(
			'id' => 2,
			'location_id' => 2,
			'material_id' => 2,
			'quantity' => 2
		),
		array(
			'id' => 3,
			'location_id' => 3,
			'material_id' => 3,
			'quantity' => 3
		),
		array(
			'id' => 4,
			'location_id' => 4,
			'material_id' => 4,
			'quantity' => 4
		),
		array(
			'id' => 5,
			'location_id' => 5,
			'material_id' => 5,
			'quantity' => 5
		),
		array(
			'id' => 6,
			'location_id' => 6,
			'material_id' => 6,
			'quantity' => 6
		),
		array(
			'id' => 7,
			'location_id' => 7,
			'material_id' => 7,
			'quantity' => 7
		),
		array(
			'id' => 8,
			'location_id' => 8,
			'material_id' => 8,
			'quantity' => 8
		),
		array(
			'id' => 9,
			'location_id' => 9,
			'material_id' => 9,
			'quantity' => 9
		),
		array(
			'id' => 10,
			'location_id' => 10,
			'material_id' => 10,
			'quantity' => 10
		),
	);

}
