<?php
/**
 * MoldTypeFixture
 *
 */
class MoldTypeFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'tread_design_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'tire_size_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'code' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 3, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'stock_status' => array('type' => 'boolean', 'null' => false, 'default' => '1'),
		'description' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'lifetime' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 4),
		'bead_plate' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 2, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'mold_cavity' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 2),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'MyISAM')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'tread_design_id' => 1,
			'tire_size_id' => 1,
			'code' => 'L',
			'stock_status' => 1,
			'description' => 'Lorem ipsum dolor sit amet',
			'lifetime' => 1,
			'bead_plate' => '',
			'mold_cavity' => 1
		),
		array(
			'id' => 2,
			'tread_design_id' => 2,
			'tire_size_id' => 2,
			'code' => 'L',
			'stock_status' => 1,
			'description' => 'Lorem ipsum dolor sit amet',
			'lifetime' => 2,
			'bead_plate' => '',
			'mold_cavity' => 2
		),
		array(
			'id' => 3,
			'tread_design_id' => 3,
			'tire_size_id' => 3,
			'code' => 'L',
			'stock_status' => 1,
			'description' => 'Lorem ipsum dolor sit amet',
			'lifetime' => 3,
			'bead_plate' => '',
			'mold_cavity' => 3
		),
		array(
			'id' => 4,
			'tread_design_id' => 4,
			'tire_size_id' => 4,
			'code' => 'L',
			'stock_status' => 1,
			'description' => 'Lorem ipsum dolor sit amet',
			'lifetime' => 4,
			'bead_plate' => '',
			'mold_cavity' => 4
		),
		array(
			'id' => 5,
			'tread_design_id' => 5,
			'tire_size_id' => 5,
			'code' => 'L',
			'stock_status' => 1,
			'description' => 'Lorem ipsum dolor sit amet',
			'lifetime' => 5,
			'bead_plate' => '',
			'mold_cavity' => 5
		),
		array(
			'id' => 6,
			'tread_design_id' => 6,
			'tire_size_id' => 6,
			'code' => 'L',
			'stock_status' => 1,
			'description' => 'Lorem ipsum dolor sit amet',
			'lifetime' => 6,
			'bead_plate' => '',
			'mold_cavity' => 6
		),
		array(
			'id' => 7,
			'tread_design_id' => 7,
			'tire_size_id' => 7,
			'code' => 'L',
			'stock_status' => 1,
			'description' => 'Lorem ipsum dolor sit amet',
			'lifetime' => 7,
			'bead_plate' => '',
			'mold_cavity' => 7
		),
		array(
			'id' => 8,
			'tread_design_id' => 8,
			'tire_size_id' => 8,
			'code' => 'L',
			'stock_status' => 1,
			'description' => 'Lorem ipsum dolor sit amet',
			'lifetime' => 8,
			'bead_plate' => '',
			'mold_cavity' => 8
		),
		array(
			'id' => 9,
			'tread_design_id' => 9,
			'tire_size_id' => 9,
			'code' => 'L',
			'stock_status' => 1,
			'description' => 'Lorem ipsum dolor sit amet',
			'lifetime' => 9,
			'bead_plate' => '',
			'mold_cavity' => 9
		),
		array(
			'id' => 10,
			'tread_design_id' => 10,
			'tire_size_id' => 10,
			'code' => 'L',
			'stock_status' => 1,
			'description' => 'Lorem ipsum dolor sit amet',
			'lifetime' => 10,
			'bead_plate' => '',
			'mold_cavity' => 10
		),
	);

}
