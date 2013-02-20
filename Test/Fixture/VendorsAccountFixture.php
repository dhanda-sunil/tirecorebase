<?php
/**
 * VendorsAccountFixture
 *
 */
class VendorsAccountFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'vendor_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'index'),
		'location_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'account_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'suspense_account_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'active' => array('type' => 'boolean', 'null' => false, 'default' => '1'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'vendor_id' => array('column' => array('vendor_id', 'location_id', 'account_id', 'suspense_account_id'), 'unique' => 0)
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
			'id' => 1,
			'vendor_id' => 1,
			'location_id' => 1,
			'account_id' => 1,
			'suspense_account_id' => 1,
			'active' => 1
		),
		array(
			'id' => 2,
			'vendor_id' => 2,
			'location_id' => 2,
			'account_id' => 2,
			'suspense_account_id' => 2,
			'active' => 1
		),
		array(
			'id' => 3,
			'vendor_id' => 3,
			'location_id' => 3,
			'account_id' => 3,
			'suspense_account_id' => 3,
			'active' => 1
		),
		array(
			'id' => 4,
			'vendor_id' => 4,
			'location_id' => 4,
			'account_id' => 4,
			'suspense_account_id' => 4,
			'active' => 1
		),
		array(
			'id' => 5,
			'vendor_id' => 5,
			'location_id' => 5,
			'account_id' => 5,
			'suspense_account_id' => 5,
			'active' => 1
		),
		array(
			'id' => 6,
			'vendor_id' => 6,
			'location_id' => 6,
			'account_id' => 6,
			'suspense_account_id' => 6,
			'active' => 1
		),
		array(
			'id' => 7,
			'vendor_id' => 7,
			'location_id' => 7,
			'account_id' => 7,
			'suspense_account_id' => 7,
			'active' => 1
		),
		array(
			'id' => 8,
			'vendor_id' => 8,
			'location_id' => 8,
			'account_id' => 8,
			'suspense_account_id' => 8,
			'active' => 1
		),
		array(
			'id' => 9,
			'vendor_id' => 9,
			'location_id' => 9,
			'account_id' => 9,
			'suspense_account_id' => 9,
			'active' => 1
		),
		array(
			'id' => 10,
			'vendor_id' => 10,
			'location_id' => 10,
			'account_id' => 10,
			'suspense_account_id' => 10,
			'active' => 1
		),
	);

}
