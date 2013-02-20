<?php
/**
 * LocationsProductFixture
 *
 */
class LocationsProductFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'location_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 3, 'key' => 'primary'),
		'product_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 7, 'key' => 'primary'),
		'quantity' => array('type' => 'float', 'null' => false, 'default' => '0.000', 'length' => '10,3'),
		'obligated' => array('type' => 'float', 'null' => false, 'default' => '0.000', 'length' => '10,3'),
		'on_order' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => '10,3'),
		'desired' => array('type' => 'float', 'null' => true, 'default' => null, 'length' => '10,3'),
		'avg_daily' => array('type' => 'float', 'null' => true, 'default' => null, 'length' => '8,3'),
		'active' => array('type' => 'boolean', 'null' => false, 'default' => '1'),
		'inherit' => array('type' => 'boolean', 'null' => false, 'default' => '0'),
		'account_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'suspense_account_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'cogs_account_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'revenue_account_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => array('location_id', 'product_id'), 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'location_id' => 1,
			'product_id' => 1,
			'quantity' => 1,
			'obligated' => 1,
			'on_order' => 1,
			'desired' => 1,
			'avg_daily' => 1,
			'active' => 1,
			'inherit' => 1,
			'account_id' => 1,
			'suspense_account_id' => 1,
			'cogs_account_id' => 1,
			'revenue_account_id' => 1,
			'modified' => '2012-08-02 17:22:24'
		),
		array(
			'location_id' => 2,
			'product_id' => 2,
			'quantity' => 2,
			'obligated' => 2,
			'on_order' => 2,
			'desired' => 2,
			'avg_daily' => 2,
			'active' => 1,
			'inherit' => 1,
			'account_id' => 2,
			'suspense_account_id' => 2,
			'cogs_account_id' => 2,
			'revenue_account_id' => 2,
			'modified' => '2012-08-02 17:22:24'
		),
		array(
			'location_id' => 3,
			'product_id' => 3,
			'quantity' => 3,
			'obligated' => 3,
			'on_order' => 3,
			'desired' => 3,
			'avg_daily' => 3,
			'active' => 1,
			'inherit' => 1,
			'account_id' => 3,
			'suspense_account_id' => 3,
			'cogs_account_id' => 3,
			'revenue_account_id' => 3,
			'modified' => '2012-08-02 17:22:24'
		),
		array(
			'location_id' => 4,
			'product_id' => 4,
			'quantity' => 4,
			'obligated' => 4,
			'on_order' => 4,
			'desired' => 4,
			'avg_daily' => 4,
			'active' => 1,
			'inherit' => 1,
			'account_id' => 4,
			'suspense_account_id' => 4,
			'cogs_account_id' => 4,
			'revenue_account_id' => 4,
			'modified' => '2012-08-02 17:22:24'
		),
		array(
			'location_id' => 5,
			'product_id' => 5,
			'quantity' => 5,
			'obligated' => 5,
			'on_order' => 5,
			'desired' => 5,
			'avg_daily' => 5,
			'active' => 1,
			'inherit' => 1,
			'account_id' => 5,
			'suspense_account_id' => 5,
			'cogs_account_id' => 5,
			'revenue_account_id' => 5,
			'modified' => '2012-08-02 17:22:24'
		),
		array(
			'location_id' => 6,
			'product_id' => 6,
			'quantity' => 6,
			'obligated' => 6,
			'on_order' => 6,
			'desired' => 6,
			'avg_daily' => 6,
			'active' => 1,
			'inherit' => 1,
			'account_id' => 6,
			'suspense_account_id' => 6,
			'cogs_account_id' => 6,
			'revenue_account_id' => 6,
			'modified' => '2012-08-02 17:22:24'
		),
		array(
			'location_id' => 7,
			'product_id' => 7,
			'quantity' => 7,
			'obligated' => 7,
			'on_order' => 7,
			'desired' => 7,
			'avg_daily' => 7,
			'active' => 1,
			'inherit' => 1,
			'account_id' => 7,
			'suspense_account_id' => 7,
			'cogs_account_id' => 7,
			'revenue_account_id' => 7,
			'modified' => '2012-08-02 17:22:24'
		),
		array(
			'location_id' => 8,
			'product_id' => 8,
			'quantity' => 8,
			'obligated' => 8,
			'on_order' => 8,
			'desired' => 8,
			'avg_daily' => 8,
			'active' => 1,
			'inherit' => 1,
			'account_id' => 8,
			'suspense_account_id' => 8,
			'cogs_account_id' => 8,
			'revenue_account_id' => 8,
			'modified' => '2012-08-02 17:22:24'
		),
		array(
			'location_id' => 9,
			'product_id' => 9,
			'quantity' => 9,
			'obligated' => 9,
			'on_order' => 9,
			'desired' => 9,
			'avg_daily' => 9,
			'active' => 1,
			'inherit' => 1,
			'account_id' => 9,
			'suspense_account_id' => 9,
			'cogs_account_id' => 9,
			'revenue_account_id' => 9,
			'modified' => '2012-08-02 17:22:24'
		),
		array(
			'location_id' => 10,
			'product_id' => 10,
			'quantity' => 10,
			'obligated' => 10,
			'on_order' => 10,
			'desired' => 10,
			'avg_daily' => 10,
			'active' => 1,
			'inherit' => 1,
			'account_id' => 10,
			'suspense_account_id' => 10,
			'cogs_account_id' => 10,
			'revenue_account_id' => 10,
			'modified' => '2012-08-02 17:22:24'
		),
	);

}
