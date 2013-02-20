<?php
/**
 * LocationsAccountFixture
 *
 */
class LocationsAccountFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'ref_table' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 60, 'key' => 'index', 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'ref_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'company_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 2),
		'location_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 3, 'key' => 'index'),
		'account_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 10),
		'suspense_account_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 10),
		'cogs_account_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 10),
		'revenue_account_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 10),
		'inherit' => array('type' => 'boolean', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'location_id' => array('column' => 'location_id', 'unique' => 0),
			'resource_type' => array('column' => array('ref_table', 'ref_id', 'location_id'), 'unique' => 0)
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
			'ref_table' => 'Lorem ipsum dolor sit amet',
			'ref_id' => 1,
			'company_id' => 1,
			'location_id' => 1,
			'account_id' => 1,
			'suspense_account_id' => 1,
			'cogs_account_id' => 1,
			'revenue_account_id' => 1,
			'inherit' => 1
		),
		array(
			'id' => 2,
			'ref_table' => 'Lorem ipsum dolor sit amet',
			'ref_id' => 2,
			'company_id' => 2,
			'location_id' => 2,
			'account_id' => 2,
			'suspense_account_id' => 2,
			'cogs_account_id' => 2,
			'revenue_account_id' => 2,
			'inherit' => 1
		),
		array(
			'id' => 3,
			'ref_table' => 'Lorem ipsum dolor sit amet',
			'ref_id' => 3,
			'company_id' => 3,
			'location_id' => 3,
			'account_id' => 3,
			'suspense_account_id' => 3,
			'cogs_account_id' => 3,
			'revenue_account_id' => 3,
			'inherit' => 1
		),
		array(
			'id' => 4,
			'ref_table' => 'Lorem ipsum dolor sit amet',
			'ref_id' => 4,
			'company_id' => 4,
			'location_id' => 4,
			'account_id' => 4,
			'suspense_account_id' => 4,
			'cogs_account_id' => 4,
			'revenue_account_id' => 4,
			'inherit' => 1
		),
		array(
			'id' => 5,
			'ref_table' => 'Lorem ipsum dolor sit amet',
			'ref_id' => 5,
			'company_id' => 5,
			'location_id' => 5,
			'account_id' => 5,
			'suspense_account_id' => 5,
			'cogs_account_id' => 5,
			'revenue_account_id' => 5,
			'inherit' => 1
		),
		array(
			'id' => 6,
			'ref_table' => 'Lorem ipsum dolor sit amet',
			'ref_id' => 6,
			'company_id' => 6,
			'location_id' => 6,
			'account_id' => 6,
			'suspense_account_id' => 6,
			'cogs_account_id' => 6,
			'revenue_account_id' => 6,
			'inherit' => 1
		),
		array(
			'id' => 7,
			'ref_table' => 'Lorem ipsum dolor sit amet',
			'ref_id' => 7,
			'company_id' => 7,
			'location_id' => 7,
			'account_id' => 7,
			'suspense_account_id' => 7,
			'cogs_account_id' => 7,
			'revenue_account_id' => 7,
			'inherit' => 1
		),
		array(
			'id' => 8,
			'ref_table' => 'Lorem ipsum dolor sit amet',
			'ref_id' => 8,
			'company_id' => 8,
			'location_id' => 8,
			'account_id' => 8,
			'suspense_account_id' => 8,
			'cogs_account_id' => 8,
			'revenue_account_id' => 8,
			'inherit' => 1
		),
		array(
			'id' => 9,
			'ref_table' => 'Lorem ipsum dolor sit amet',
			'ref_id' => 9,
			'company_id' => 9,
			'location_id' => 9,
			'account_id' => 9,
			'suspense_account_id' => 9,
			'cogs_account_id' => 9,
			'revenue_account_id' => 9,
			'inherit' => 1
		),
		array(
			'id' => 10,
			'ref_table' => 'Lorem ipsum dolor sit amet',
			'ref_id' => 10,
			'company_id' => 10,
			'location_id' => 10,
			'account_id' => 10,
			'suspense_account_id' => 10,
			'cogs_account_id' => 10,
			'revenue_account_id' => 10,
			'inherit' => 1
		),
	);

}
