<?php
/**
 * CasingLogFixture
 *
 */
class CasingLogFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'casing_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'timestamp' => array('type' => 'timestamp', 'null' => true, 'default' => 'CURRENT_TIMESTAMP'),
		'description' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
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
			'timestamp' => 1343949573,
			'description' => 'Lorem ipsum dolor sit amet'
		),
		array(
			'id' => 2,
			'casing_id' => 2,
			'timestamp' => 1343949573,
			'description' => 'Lorem ipsum dolor sit amet'
		),
		array(
			'id' => 3,
			'casing_id' => 3,
			'timestamp' => 1343949573,
			'description' => 'Lorem ipsum dolor sit amet'
		),
		array(
			'id' => 4,
			'casing_id' => 4,
			'timestamp' => 1343949573,
			'description' => 'Lorem ipsum dolor sit amet'
		),
		array(
			'id' => 5,
			'casing_id' => 5,
			'timestamp' => 1343949573,
			'description' => 'Lorem ipsum dolor sit amet'
		),
		array(
			'id' => 6,
			'casing_id' => 6,
			'timestamp' => 1343949573,
			'description' => 'Lorem ipsum dolor sit amet'
		),
		array(
			'id' => 7,
			'casing_id' => 7,
			'timestamp' => 1343949573,
			'description' => 'Lorem ipsum dolor sit amet'
		),
		array(
			'id' => 8,
			'casing_id' => 8,
			'timestamp' => 1343949573,
			'description' => 'Lorem ipsum dolor sit amet'
		),
		array(
			'id' => 9,
			'casing_id' => 9,
			'timestamp' => 1343949573,
			'description' => 'Lorem ipsum dolor sit amet'
		),
		array(
			'id' => 10,
			'casing_id' => 10,
			'timestamp' => 1343949573,
			'description' => 'Lorem ipsum dolor sit amet'
		),
	);

}
