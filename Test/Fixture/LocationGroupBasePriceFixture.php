<?php
/**
 * LocationGroupBasePriceFixture
 *
 */
class LocationGroupBasePriceFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'location_group_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 2, 'key' => 'primary'),
		'product_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 8, 'key' => 'primary'),
		'last' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => '9,2'),
		'high' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => '9,2'),
		'low' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => '9,2'),
		'indexes' => array(
			'PRIMARY' => array('column' => array('location_group_id', 'product_id'), 'unique' => 1)
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
			'location_group_id' => 1,
			'product_id' => 1,
			'last' => 1,
			'high' => 1,
			'low' => 1
		),
		array(
			'location_group_id' => 2,
			'product_id' => 2,
			'last' => 2,
			'high' => 2,
			'low' => 2
		),
		array(
			'location_group_id' => 3,
			'product_id' => 3,
			'last' => 3,
			'high' => 3,
			'low' => 3
		),
		array(
			'location_group_id' => 4,
			'product_id' => 4,
			'last' => 4,
			'high' => 4,
			'low' => 4
		),
		array(
			'location_group_id' => 5,
			'product_id' => 5,
			'last' => 5,
			'high' => 5,
			'low' => 5
		),
		array(
			'location_group_id' => 6,
			'product_id' => 6,
			'last' => 6,
			'high' => 6,
			'low' => 6
		),
		array(
			'location_group_id' => 7,
			'product_id' => 7,
			'last' => 7,
			'high' => 7,
			'low' => 7
		),
		array(
			'location_group_id' => 8,
			'product_id' => 8,
			'last' => 8,
			'high' => 8,
			'low' => 8
		),
		array(
			'location_group_id' => 9,
			'product_id' => 9,
			'last' => 9,
			'high' => 9,
			'low' => 9
		),
		array(
			'location_group_id' => 10,
			'product_id' => 10,
			'last' => 10,
			'high' => 10,
			'low' => 10
		),
	);

}
