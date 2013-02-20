<?php
/**
 * VendorItemsAccountFixture
 *
 */
class VendorItemsAccountFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'vendor_item_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'vendor_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'company_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'location_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'account_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'suspense_account_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'created_by' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified_by' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
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
			'vendor_item_id' => 1,
			'vendor_id' => 1,
			'company_id' => 1,
			'location_id' => 1,
			'account_id' => 1,
			'suspense_account_id' => 1,
			'created' => '2012-08-02 17:26:58',
			'created_by' => 1,
			'modified' => '2012-08-02 17:26:58',
			'modified_by' => 1
		),
		array(
			'id' => 2,
			'vendor_item_id' => 2,
			'vendor_id' => 2,
			'company_id' => 2,
			'location_id' => 2,
			'account_id' => 2,
			'suspense_account_id' => 2,
			'created' => '2012-08-02 17:26:58',
			'created_by' => 2,
			'modified' => '2012-08-02 17:26:58',
			'modified_by' => 2
		),
		array(
			'id' => 3,
			'vendor_item_id' => 3,
			'vendor_id' => 3,
			'company_id' => 3,
			'location_id' => 3,
			'account_id' => 3,
			'suspense_account_id' => 3,
			'created' => '2012-08-02 17:26:58',
			'created_by' => 3,
			'modified' => '2012-08-02 17:26:58',
			'modified_by' => 3
		),
		array(
			'id' => 4,
			'vendor_item_id' => 4,
			'vendor_id' => 4,
			'company_id' => 4,
			'location_id' => 4,
			'account_id' => 4,
			'suspense_account_id' => 4,
			'created' => '2012-08-02 17:26:58',
			'created_by' => 4,
			'modified' => '2012-08-02 17:26:58',
			'modified_by' => 4
		),
		array(
			'id' => 5,
			'vendor_item_id' => 5,
			'vendor_id' => 5,
			'company_id' => 5,
			'location_id' => 5,
			'account_id' => 5,
			'suspense_account_id' => 5,
			'created' => '2012-08-02 17:26:58',
			'created_by' => 5,
			'modified' => '2012-08-02 17:26:58',
			'modified_by' => 5
		),
		array(
			'id' => 6,
			'vendor_item_id' => 6,
			'vendor_id' => 6,
			'company_id' => 6,
			'location_id' => 6,
			'account_id' => 6,
			'suspense_account_id' => 6,
			'created' => '2012-08-02 17:26:58',
			'created_by' => 6,
			'modified' => '2012-08-02 17:26:58',
			'modified_by' => 6
		),
		array(
			'id' => 7,
			'vendor_item_id' => 7,
			'vendor_id' => 7,
			'company_id' => 7,
			'location_id' => 7,
			'account_id' => 7,
			'suspense_account_id' => 7,
			'created' => '2012-08-02 17:26:58',
			'created_by' => 7,
			'modified' => '2012-08-02 17:26:58',
			'modified_by' => 7
		),
		array(
			'id' => 8,
			'vendor_item_id' => 8,
			'vendor_id' => 8,
			'company_id' => 8,
			'location_id' => 8,
			'account_id' => 8,
			'suspense_account_id' => 8,
			'created' => '2012-08-02 17:26:58',
			'created_by' => 8,
			'modified' => '2012-08-02 17:26:58',
			'modified_by' => 8
		),
		array(
			'id' => 9,
			'vendor_item_id' => 9,
			'vendor_id' => 9,
			'company_id' => 9,
			'location_id' => 9,
			'account_id' => 9,
			'suspense_account_id' => 9,
			'created' => '2012-08-02 17:26:58',
			'created_by' => 9,
			'modified' => '2012-08-02 17:26:58',
			'modified_by' => 9
		),
		array(
			'id' => 10,
			'vendor_item_id' => 10,
			'vendor_id' => 10,
			'company_id' => 10,
			'location_id' => 10,
			'account_id' => 10,
			'suspense_account_id' => 10,
			'created' => '2012-08-02 17:26:58',
			'created_by' => 10,
			'modified' => '2012-08-02 17:26:58',
			'modified_by' => 10
		),
	);

}
