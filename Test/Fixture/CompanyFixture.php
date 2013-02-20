<?php
/**
 * CompanyFixture
 *
 */
class CompanyFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 2, 'key' => 'primary'),
		'name' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'addr1' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'addr2' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'city' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'state' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 4, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'zip' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 15, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'phone' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 20, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'fax' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 20, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'fiscal_year_month' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 2),
		'tax_year_month' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 2),
		'cash_account_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'fee_rate' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => '6,3'),
		'fee_grace_period' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 3),
		'fee_description' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
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
			'name' => 'Lorem ipsum dolor sit amet',
			'addr1' => 'Lorem ipsum dolor sit amet',
			'addr2' => 'Lorem ipsum dolor sit amet',
			'city' => 'Lorem ipsum dolor sit amet',
			'state' => 'Lo',
			'zip' => 'Lorem ipsum d',
			'phone' => 'Lorem ipsum dolor ',
			'fax' => 'Lorem ipsum dolor ',
			'fiscal_year_month' => 1,
			'tax_year_month' => 1,
			'cash_account_id' => 1,
			'fee_rate' => 1,
			'fee_grace_period' => 1,
			'fee_description' => 'Lorem ipsum dolor sit amet',
			'modified' => '2012-08-02 17:19:56',
			'created' => '2012-08-02 17:19:56'
		),
		array(
			'id' => 2,
			'name' => 'Lorem ipsum dolor sit amet',
			'addr1' => 'Lorem ipsum dolor sit amet',
			'addr2' => 'Lorem ipsum dolor sit amet',
			'city' => 'Lorem ipsum dolor sit amet',
			'state' => 'Lo',
			'zip' => 'Lorem ipsum d',
			'phone' => 'Lorem ipsum dolor ',
			'fax' => 'Lorem ipsum dolor ',
			'fiscal_year_month' => 2,
			'tax_year_month' => 2,
			'cash_account_id' => 2,
			'fee_rate' => 2,
			'fee_grace_period' => 2,
			'fee_description' => 'Lorem ipsum dolor sit amet',
			'modified' => '2012-08-02 17:19:56',
			'created' => '2012-08-02 17:19:56'
		),
		array(
			'id' => 3,
			'name' => 'Lorem ipsum dolor sit amet',
			'addr1' => 'Lorem ipsum dolor sit amet',
			'addr2' => 'Lorem ipsum dolor sit amet',
			'city' => 'Lorem ipsum dolor sit amet',
			'state' => 'Lo',
			'zip' => 'Lorem ipsum d',
			'phone' => 'Lorem ipsum dolor ',
			'fax' => 'Lorem ipsum dolor ',
			'fiscal_year_month' => 3,
			'tax_year_month' => 3,
			'cash_account_id' => 3,
			'fee_rate' => 3,
			'fee_grace_period' => 3,
			'fee_description' => 'Lorem ipsum dolor sit amet',
			'modified' => '2012-08-02 17:19:56',
			'created' => '2012-08-02 17:19:56'
		),
		array(
			'id' => 4,
			'name' => 'Lorem ipsum dolor sit amet',
			'addr1' => 'Lorem ipsum dolor sit amet',
			'addr2' => 'Lorem ipsum dolor sit amet',
			'city' => 'Lorem ipsum dolor sit amet',
			'state' => 'Lo',
			'zip' => 'Lorem ipsum d',
			'phone' => 'Lorem ipsum dolor ',
			'fax' => 'Lorem ipsum dolor ',
			'fiscal_year_month' => 4,
			'tax_year_month' => 4,
			'cash_account_id' => 4,
			'fee_rate' => 4,
			'fee_grace_period' => 4,
			'fee_description' => 'Lorem ipsum dolor sit amet',
			'modified' => '2012-08-02 17:19:56',
			'created' => '2012-08-02 17:19:56'
		),
		array(
			'id' => 5,
			'name' => 'Lorem ipsum dolor sit amet',
			'addr1' => 'Lorem ipsum dolor sit amet',
			'addr2' => 'Lorem ipsum dolor sit amet',
			'city' => 'Lorem ipsum dolor sit amet',
			'state' => 'Lo',
			'zip' => 'Lorem ipsum d',
			'phone' => 'Lorem ipsum dolor ',
			'fax' => 'Lorem ipsum dolor ',
			'fiscal_year_month' => 5,
			'tax_year_month' => 5,
			'cash_account_id' => 5,
			'fee_rate' => 5,
			'fee_grace_period' => 5,
			'fee_description' => 'Lorem ipsum dolor sit amet',
			'modified' => '2012-08-02 17:19:56',
			'created' => '2012-08-02 17:19:56'
		),
		array(
			'id' => 6,
			'name' => 'Lorem ipsum dolor sit amet',
			'addr1' => 'Lorem ipsum dolor sit amet',
			'addr2' => 'Lorem ipsum dolor sit amet',
			'city' => 'Lorem ipsum dolor sit amet',
			'state' => 'Lo',
			'zip' => 'Lorem ipsum d',
			'phone' => 'Lorem ipsum dolor ',
			'fax' => 'Lorem ipsum dolor ',
			'fiscal_year_month' => 6,
			'tax_year_month' => 6,
			'cash_account_id' => 6,
			'fee_rate' => 6,
			'fee_grace_period' => 6,
			'fee_description' => 'Lorem ipsum dolor sit amet',
			'modified' => '2012-08-02 17:19:56',
			'created' => '2012-08-02 17:19:56'
		),
		array(
			'id' => 7,
			'name' => 'Lorem ipsum dolor sit amet',
			'addr1' => 'Lorem ipsum dolor sit amet',
			'addr2' => 'Lorem ipsum dolor sit amet',
			'city' => 'Lorem ipsum dolor sit amet',
			'state' => 'Lo',
			'zip' => 'Lorem ipsum d',
			'phone' => 'Lorem ipsum dolor ',
			'fax' => 'Lorem ipsum dolor ',
			'fiscal_year_month' => 7,
			'tax_year_month' => 7,
			'cash_account_id' => 7,
			'fee_rate' => 7,
			'fee_grace_period' => 7,
			'fee_description' => 'Lorem ipsum dolor sit amet',
			'modified' => '2012-08-02 17:19:56',
			'created' => '2012-08-02 17:19:56'
		),
		array(
			'id' => 8,
			'name' => 'Lorem ipsum dolor sit amet',
			'addr1' => 'Lorem ipsum dolor sit amet',
			'addr2' => 'Lorem ipsum dolor sit amet',
			'city' => 'Lorem ipsum dolor sit amet',
			'state' => 'Lo',
			'zip' => 'Lorem ipsum d',
			'phone' => 'Lorem ipsum dolor ',
			'fax' => 'Lorem ipsum dolor ',
			'fiscal_year_month' => 8,
			'tax_year_month' => 8,
			'cash_account_id' => 8,
			'fee_rate' => 8,
			'fee_grace_period' => 8,
			'fee_description' => 'Lorem ipsum dolor sit amet',
			'modified' => '2012-08-02 17:19:56',
			'created' => '2012-08-02 17:19:56'
		),
		array(
			'id' => 9,
			'name' => 'Lorem ipsum dolor sit amet',
			'addr1' => 'Lorem ipsum dolor sit amet',
			'addr2' => 'Lorem ipsum dolor sit amet',
			'city' => 'Lorem ipsum dolor sit amet',
			'state' => 'Lo',
			'zip' => 'Lorem ipsum d',
			'phone' => 'Lorem ipsum dolor ',
			'fax' => 'Lorem ipsum dolor ',
			'fiscal_year_month' => 9,
			'tax_year_month' => 9,
			'cash_account_id' => 9,
			'fee_rate' => 9,
			'fee_grace_period' => 9,
			'fee_description' => 'Lorem ipsum dolor sit amet',
			'modified' => '2012-08-02 17:19:56',
			'created' => '2012-08-02 17:19:56'
		),
		array(
			'id' => 10,
			'name' => 'Lorem ipsum dolor sit amet',
			'addr1' => 'Lorem ipsum dolor sit amet',
			'addr2' => 'Lorem ipsum dolor sit amet',
			'city' => 'Lorem ipsum dolor sit amet',
			'state' => 'Lo',
			'zip' => 'Lorem ipsum d',
			'phone' => 'Lorem ipsum dolor ',
			'fax' => 'Lorem ipsum dolor ',
			'fiscal_year_month' => 10,
			'tax_year_month' => 10,
			'cash_account_id' => 10,
			'fee_rate' => 10,
			'fee_grace_period' => 10,
			'fee_description' => 'Lorem ipsum dolor sit amet',
			'modified' => '2012-08-02 17:19:56',
			'created' => '2012-08-02 17:19:56'
		),
	);

}
