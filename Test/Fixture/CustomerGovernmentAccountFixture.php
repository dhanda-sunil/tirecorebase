<?php
/**
 * CustomerGovernmentAccountFixture
 *
 */
class CustomerGovernmentAccountFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'customer_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'vendor_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'account_number' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 100, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'account_type' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 10, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'deleted' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'deleted_by' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
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
			'customer_id' => 1,
			'vendor_id' => 1,
			'account_number' => 'Lorem ipsum dolor sit amet',
			'account_type' => 'Lorem ip',
			'created' => '2012-08-02 17:20:34',
			'modified' => '2012-08-02 17:20:34',
			'deleted' => '2012-08-02 17:20:34',
			'deleted_by' => 1
		),
		array(
			'id' => 2,
			'customer_id' => 2,
			'vendor_id' => 2,
			'account_number' => 'Lorem ipsum dolor sit amet',
			'account_type' => 'Lorem ip',
			'created' => '2012-08-02 17:20:34',
			'modified' => '2012-08-02 17:20:34',
			'deleted' => '2012-08-02 17:20:34',
			'deleted_by' => 2
		),
		array(
			'id' => 3,
			'customer_id' => 3,
			'vendor_id' => 3,
			'account_number' => 'Lorem ipsum dolor sit amet',
			'account_type' => 'Lorem ip',
			'created' => '2012-08-02 17:20:34',
			'modified' => '2012-08-02 17:20:34',
			'deleted' => '2012-08-02 17:20:34',
			'deleted_by' => 3
		),
		array(
			'id' => 4,
			'customer_id' => 4,
			'vendor_id' => 4,
			'account_number' => 'Lorem ipsum dolor sit amet',
			'account_type' => 'Lorem ip',
			'created' => '2012-08-02 17:20:34',
			'modified' => '2012-08-02 17:20:34',
			'deleted' => '2012-08-02 17:20:34',
			'deleted_by' => 4
		),
		array(
			'id' => 5,
			'customer_id' => 5,
			'vendor_id' => 5,
			'account_number' => 'Lorem ipsum dolor sit amet',
			'account_type' => 'Lorem ip',
			'created' => '2012-08-02 17:20:34',
			'modified' => '2012-08-02 17:20:34',
			'deleted' => '2012-08-02 17:20:34',
			'deleted_by' => 5
		),
		array(
			'id' => 6,
			'customer_id' => 6,
			'vendor_id' => 6,
			'account_number' => 'Lorem ipsum dolor sit amet',
			'account_type' => 'Lorem ip',
			'created' => '2012-08-02 17:20:34',
			'modified' => '2012-08-02 17:20:34',
			'deleted' => '2012-08-02 17:20:34',
			'deleted_by' => 6
		),
		array(
			'id' => 7,
			'customer_id' => 7,
			'vendor_id' => 7,
			'account_number' => 'Lorem ipsum dolor sit amet',
			'account_type' => 'Lorem ip',
			'created' => '2012-08-02 17:20:34',
			'modified' => '2012-08-02 17:20:34',
			'deleted' => '2012-08-02 17:20:34',
			'deleted_by' => 7
		),
		array(
			'id' => 8,
			'customer_id' => 8,
			'vendor_id' => 8,
			'account_number' => 'Lorem ipsum dolor sit amet',
			'account_type' => 'Lorem ip',
			'created' => '2012-08-02 17:20:34',
			'modified' => '2012-08-02 17:20:34',
			'deleted' => '2012-08-02 17:20:34',
			'deleted_by' => 8
		),
		array(
			'id' => 9,
			'customer_id' => 9,
			'vendor_id' => 9,
			'account_number' => 'Lorem ipsum dolor sit amet',
			'account_type' => 'Lorem ip',
			'created' => '2012-08-02 17:20:34',
			'modified' => '2012-08-02 17:20:34',
			'deleted' => '2012-08-02 17:20:34',
			'deleted_by' => 9
		),
		array(
			'id' => 10,
			'customer_id' => 10,
			'vendor_id' => 10,
			'account_number' => 'Lorem ipsum dolor sit amet',
			'account_type' => 'Lorem ip',
			'created' => '2012-08-02 17:20:34',
			'modified' => '2012-08-02 17:20:34',
			'deleted' => '2012-08-02 17:20:34',
			'deleted_by' => 10
		),
	);

}
