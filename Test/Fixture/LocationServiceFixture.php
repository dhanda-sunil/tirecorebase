<?php
/**
 * LocationServiceFixture
 *
 */
class LocationServiceFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'location_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 4, 'key' => 'primary'),
		'service_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 5, 'key' => 'primary'),
		'account_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 8),
		'suspense_account_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 8),
		'indexes' => array(
			'PRIMARY' => array('column' => array('location_id', 'service_id'), 'unique' => 1)
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
			'location_id' => 1,
			'service_id' => 1,
			'account_id' => 1,
			'suspense_account_id' => 1
		),
		array(
			'location_id' => 2,
			'service_id' => 2,
			'account_id' => 2,
			'suspense_account_id' => 2
		),
		array(
			'location_id' => 3,
			'service_id' => 3,
			'account_id' => 3,
			'suspense_account_id' => 3
		),
		array(
			'location_id' => 4,
			'service_id' => 4,
			'account_id' => 4,
			'suspense_account_id' => 4
		),
		array(
			'location_id' => 5,
			'service_id' => 5,
			'account_id' => 5,
			'suspense_account_id' => 5
		),
		array(
			'location_id' => 6,
			'service_id' => 6,
			'account_id' => 6,
			'suspense_account_id' => 6
		),
		array(
			'location_id' => 7,
			'service_id' => 7,
			'account_id' => 7,
			'suspense_account_id' => 7
		),
		array(
			'location_id' => 8,
			'service_id' => 8,
			'account_id' => 8,
			'suspense_account_id' => 8
		),
		array(
			'location_id' => 9,
			'service_id' => 9,
			'account_id' => 9,
			'suspense_account_id' => 9
		),
		array(
			'location_id' => 10,
			'service_id' => 10,
			'account_id' => 10,
			'suspense_account_id' => 10
		),
	);

}
