<?php
/**
 * LocationsMaterialsLogFixture
 *
 */
class LocationsMaterialsLogFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'location_material_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'ref_table' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 20, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'ref_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'quantity' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => '10,3'),
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
			'location_material_id' => 1,
			'ref_table' => 'Lorem ipsum dolor ',
			'ref_id' => 1,
			'quantity' => 1
		),
		array(
			'id' => 2,
			'location_material_id' => 2,
			'ref_table' => 'Lorem ipsum dolor ',
			'ref_id' => 2,
			'quantity' => 2
		),
		array(
			'id' => 3,
			'location_material_id' => 3,
			'ref_table' => 'Lorem ipsum dolor ',
			'ref_id' => 3,
			'quantity' => 3
		),
		array(
			'id' => 4,
			'location_material_id' => 4,
			'ref_table' => 'Lorem ipsum dolor ',
			'ref_id' => 4,
			'quantity' => 4
		),
		array(
			'id' => 5,
			'location_material_id' => 5,
			'ref_table' => 'Lorem ipsum dolor ',
			'ref_id' => 5,
			'quantity' => 5
		),
		array(
			'id' => 6,
			'location_material_id' => 6,
			'ref_table' => 'Lorem ipsum dolor ',
			'ref_id' => 6,
			'quantity' => 6
		),
		array(
			'id' => 7,
			'location_material_id' => 7,
			'ref_table' => 'Lorem ipsum dolor ',
			'ref_id' => 7,
			'quantity' => 7
		),
		array(
			'id' => 8,
			'location_material_id' => 8,
			'ref_table' => 'Lorem ipsum dolor ',
			'ref_id' => 8,
			'quantity' => 8
		),
		array(
			'id' => 9,
			'location_material_id' => 9,
			'ref_table' => 'Lorem ipsum dolor ',
			'ref_id' => 9,
			'quantity' => 9
		),
		array(
			'id' => 10,
			'location_material_id' => 10,
			'ref_table' => 'Lorem ipsum dolor ',
			'ref_id' => 10,
			'quantity' => 10
		),
	);

}
