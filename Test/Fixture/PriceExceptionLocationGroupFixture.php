<?php
/**
 * PriceExceptionLocationGroupFixture
 *
 */
class PriceExceptionLocationGroupFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'price_exception_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 5, 'key' => 'primary'),
		'location_group_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 2, 'key' => 'primary'),
		'adjustment' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => '8,3'),
		'indexes' => array(
			'PRIMARY' => array('column' => array('price_exception_id', 'location_group_id'), 'unique' => 1)
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
			'price_exception_id' => 1,
			'location_group_id' => 1,
			'adjustment' => 1
		),
		array(
			'price_exception_id' => 2,
			'location_group_id' => 2,
			'adjustment' => 2
		),
		array(
			'price_exception_id' => 3,
			'location_group_id' => 3,
			'adjustment' => 3
		),
		array(
			'price_exception_id' => 4,
			'location_group_id' => 4,
			'adjustment' => 4
		),
		array(
			'price_exception_id' => 5,
			'location_group_id' => 5,
			'adjustment' => 5
		),
		array(
			'price_exception_id' => 6,
			'location_group_id' => 6,
			'adjustment' => 6
		),
		array(
			'price_exception_id' => 7,
			'location_group_id' => 7,
			'adjustment' => 7
		),
		array(
			'price_exception_id' => 8,
			'location_group_id' => 8,
			'adjustment' => 8
		),
		array(
			'price_exception_id' => 9,
			'location_group_id' => 9,
			'adjustment' => 9
		),
		array(
			'price_exception_id' => 10,
			'location_group_id' => 10,
			'adjustment' => 10
		),
	);

}
