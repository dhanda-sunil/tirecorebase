<?php
/**
 * CompanyVendorFixture
 *
 */
class CompanyVendorFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'vendor_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'index'),
		'company_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 2),
		'account_number' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 30, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'credit_limit' => array('type' => 'float', 'null' => true, 'default' => null, 'length' => '9,2'),
		'active' => array('type' => 'boolean', 'null' => false, 'default' => '1'),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'created_by' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified_by' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'vendor_id' => array('column' => array('vendor_id', 'company_id'), 'unique' => 0)
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
			'company_id' => 1,
			'account_number' => 'Lorem ipsum dolor sit amet',
			'credit_limit' => 1,
			'active' => 1,
			'created' => '2012-08-02 17:20:08',
			'created_by' => 1,
			'modified' => '2012-08-02 17:20:08',
			'modified_by' => 1
		),
		array(
			'id' => 2,
			'vendor_id' => 2,
			'company_id' => 2,
			'account_number' => 'Lorem ipsum dolor sit amet',
			'credit_limit' => 2,
			'active' => 1,
			'created' => '2012-08-02 17:20:08',
			'created_by' => 2,
			'modified' => '2012-08-02 17:20:08',
			'modified_by' => 2
		),
		array(
			'id' => 3,
			'vendor_id' => 3,
			'company_id' => 3,
			'account_number' => 'Lorem ipsum dolor sit amet',
			'credit_limit' => 3,
			'active' => 1,
			'created' => '2012-08-02 17:20:08',
			'created_by' => 3,
			'modified' => '2012-08-02 17:20:08',
			'modified_by' => 3
		),
		array(
			'id' => 4,
			'vendor_id' => 4,
			'company_id' => 4,
			'account_number' => 'Lorem ipsum dolor sit amet',
			'credit_limit' => 4,
			'active' => 1,
			'created' => '2012-08-02 17:20:08',
			'created_by' => 4,
			'modified' => '2012-08-02 17:20:08',
			'modified_by' => 4
		),
		array(
			'id' => 5,
			'vendor_id' => 5,
			'company_id' => 5,
			'account_number' => 'Lorem ipsum dolor sit amet',
			'credit_limit' => 5,
			'active' => 1,
			'created' => '2012-08-02 17:20:08',
			'created_by' => 5,
			'modified' => '2012-08-02 17:20:08',
			'modified_by' => 5
		),
		array(
			'id' => 6,
			'vendor_id' => 6,
			'company_id' => 6,
			'account_number' => 'Lorem ipsum dolor sit amet',
			'credit_limit' => 6,
			'active' => 1,
			'created' => '2012-08-02 17:20:08',
			'created_by' => 6,
			'modified' => '2012-08-02 17:20:08',
			'modified_by' => 6
		),
		array(
			'id' => 7,
			'vendor_id' => 7,
			'company_id' => 7,
			'account_number' => 'Lorem ipsum dolor sit amet',
			'credit_limit' => 7,
			'active' => 1,
			'created' => '2012-08-02 17:20:08',
			'created_by' => 7,
			'modified' => '2012-08-02 17:20:08',
			'modified_by' => 7
		),
		array(
			'id' => 8,
			'vendor_id' => 8,
			'company_id' => 8,
			'account_number' => 'Lorem ipsum dolor sit amet',
			'credit_limit' => 8,
			'active' => 1,
			'created' => '2012-08-02 17:20:08',
			'created_by' => 8,
			'modified' => '2012-08-02 17:20:08',
			'modified_by' => 8
		),
		array(
			'id' => 9,
			'vendor_id' => 9,
			'company_id' => 9,
			'account_number' => 'Lorem ipsum dolor sit amet',
			'credit_limit' => 9,
			'active' => 1,
			'created' => '2012-08-02 17:20:08',
			'created_by' => 9,
			'modified' => '2012-08-02 17:20:08',
			'modified_by' => 9
		),
		array(
			'id' => 10,
			'vendor_id' => 10,
			'company_id' => 10,
			'account_number' => 'Lorem ipsum dolor sit amet',
			'credit_limit' => 10,
			'active' => 1,
			'created' => '2012-08-02 17:20:08',
			'created_by' => 10,
			'modified' => '2012-08-02 17:20:08',
			'modified_by' => 10
		),
	);

}
