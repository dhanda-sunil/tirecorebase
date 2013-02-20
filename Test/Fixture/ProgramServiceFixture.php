<?php
/**
 * ProgramServiceFixture
 *
 */
class ProgramServiceFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'program_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 8),
		'service_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'code' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 35, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'price' => array('type' => 'float', 'null' => true, 'default' => null, 'length' => '8,2'),
		'quantity' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => '8,2'),
		'min_quantity' => array('type' => 'float', 'null' => true, 'default' => null, 'length' => '8,2'),
		'max_quantity' => array('type' => 'float', 'null' => true, 'default' => null, 'length' => '8,2'),
		'increment' => array('type' => 'float', 'null' => true, 'default' => null, 'length' => '8,2'),
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
			'program_id' => 1,
			'service_id' => 1,
			'code' => 'Lorem ipsum dolor sit amet',
			'price' => 1,
			'quantity' => 1,
			'min_quantity' => 1,
			'max_quantity' => 1,
			'increment' => 1
		),
		array(
			'id' => 2,
			'program_id' => 2,
			'service_id' => 2,
			'code' => 'Lorem ipsum dolor sit amet',
			'price' => 2,
			'quantity' => 2,
			'min_quantity' => 2,
			'max_quantity' => 2,
			'increment' => 2
		),
		array(
			'id' => 3,
			'program_id' => 3,
			'service_id' => 3,
			'code' => 'Lorem ipsum dolor sit amet',
			'price' => 3,
			'quantity' => 3,
			'min_quantity' => 3,
			'max_quantity' => 3,
			'increment' => 3
		),
		array(
			'id' => 4,
			'program_id' => 4,
			'service_id' => 4,
			'code' => 'Lorem ipsum dolor sit amet',
			'price' => 4,
			'quantity' => 4,
			'min_quantity' => 4,
			'max_quantity' => 4,
			'increment' => 4
		),
		array(
			'id' => 5,
			'program_id' => 5,
			'service_id' => 5,
			'code' => 'Lorem ipsum dolor sit amet',
			'price' => 5,
			'quantity' => 5,
			'min_quantity' => 5,
			'max_quantity' => 5,
			'increment' => 5
		),
		array(
			'id' => 6,
			'program_id' => 6,
			'service_id' => 6,
			'code' => 'Lorem ipsum dolor sit amet',
			'price' => 6,
			'quantity' => 6,
			'min_quantity' => 6,
			'max_quantity' => 6,
			'increment' => 6
		),
		array(
			'id' => 7,
			'program_id' => 7,
			'service_id' => 7,
			'code' => 'Lorem ipsum dolor sit amet',
			'price' => 7,
			'quantity' => 7,
			'min_quantity' => 7,
			'max_quantity' => 7,
			'increment' => 7
		),
		array(
			'id' => 8,
			'program_id' => 8,
			'service_id' => 8,
			'code' => 'Lorem ipsum dolor sit amet',
			'price' => 8,
			'quantity' => 8,
			'min_quantity' => 8,
			'max_quantity' => 8,
			'increment' => 8
		),
		array(
			'id' => 9,
			'program_id' => 9,
			'service_id' => 9,
			'code' => 'Lorem ipsum dolor sit amet',
			'price' => 9,
			'quantity' => 9,
			'min_quantity' => 9,
			'max_quantity' => 9,
			'increment' => 9
		),
		array(
			'id' => 10,
			'program_id' => 10,
			'service_id' => 10,
			'code' => 'Lorem ipsum dolor sit amet',
			'price' => 10,
			'quantity' => 10,
			'min_quantity' => 10,
			'max_quantity' => 10,
			'increment' => 10
		),
	);

}
