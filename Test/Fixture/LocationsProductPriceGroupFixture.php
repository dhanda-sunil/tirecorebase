<?php
/**
 * LocationsProductPriceGroupFixture
 *
 */
class LocationsProductPriceGroupFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'price_group_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 2, 'key' => 'primary'),
		'customer_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 7, 'key' => 'primary'),
		'location_group_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 2, 'key' => 'primary'),
		'product_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 5, 'key' => 'primary'),
		'price' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => '8,2'),
		'indexes' => array(
			'PRIMARY' => array('column' => array('price_group_id', 'customer_id', 'location_group_id', 'product_id'), 'unique' => 1)
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
			'price_group_id' => 1,
			'customer_id' => 1,
			'location_group_id' => 1,
			'product_id' => 1,
			'price' => 1
		),
		array(
			'price_group_id' => 2,
			'customer_id' => 2,
			'location_group_id' => 2,
			'product_id' => 2,
			'price' => 2
		),
		array(
			'price_group_id' => 3,
			'customer_id' => 3,
			'location_group_id' => 3,
			'product_id' => 3,
			'price' => 3
		),
		array(
			'price_group_id' => 4,
			'customer_id' => 4,
			'location_group_id' => 4,
			'product_id' => 4,
			'price' => 4
		),
		array(
			'price_group_id' => 5,
			'customer_id' => 5,
			'location_group_id' => 5,
			'product_id' => 5,
			'price' => 5
		),
		array(
			'price_group_id' => 6,
			'customer_id' => 6,
			'location_group_id' => 6,
			'product_id' => 6,
			'price' => 6
		),
		array(
			'price_group_id' => 7,
			'customer_id' => 7,
			'location_group_id' => 7,
			'product_id' => 7,
			'price' => 7
		),
		array(
			'price_group_id' => 8,
			'customer_id' => 8,
			'location_group_id' => 8,
			'product_id' => 8,
			'price' => 8
		),
		array(
			'price_group_id' => 9,
			'customer_id' => 9,
			'location_group_id' => 9,
			'product_id' => 9,
			'price' => 9
		),
		array(
			'price_group_id' => 10,
			'customer_id' => 10,
			'location_group_id' => 10,
			'product_id' => 10,
			'price' => 10
		),
	);

}
