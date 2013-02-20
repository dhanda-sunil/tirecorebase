<?php
/**
 * CustomersProgramFixture
 *
 */
class CustomersProgramFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'customer_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'index'),
		'program_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 8),
		'company_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 6),
		'account_number' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 50, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'desc' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'customer_id' => array('column' => 'customer_id', 'unique' => 0)
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
			'program_id' => 1,
			'company_id' => 1,
			'account_number' => 'Lorem ipsum dolor sit amet',
			'desc' => 'Lorem ipsum dolor sit amet',
			'created' => '2012-08-02 17:21:19'
		),
		array(
			'id' => 2,
			'customer_id' => 2,
			'program_id' => 2,
			'company_id' => 2,
			'account_number' => 'Lorem ipsum dolor sit amet',
			'desc' => 'Lorem ipsum dolor sit amet',
			'created' => '2012-08-02 17:21:19'
		),
		array(
			'id' => 3,
			'customer_id' => 3,
			'program_id' => 3,
			'company_id' => 3,
			'account_number' => 'Lorem ipsum dolor sit amet',
			'desc' => 'Lorem ipsum dolor sit amet',
			'created' => '2012-08-02 17:21:19'
		),
		array(
			'id' => 4,
			'customer_id' => 4,
			'program_id' => 4,
			'company_id' => 4,
			'account_number' => 'Lorem ipsum dolor sit amet',
			'desc' => 'Lorem ipsum dolor sit amet',
			'created' => '2012-08-02 17:21:19'
		),
		array(
			'id' => 5,
			'customer_id' => 5,
			'program_id' => 5,
			'company_id' => 5,
			'account_number' => 'Lorem ipsum dolor sit amet',
			'desc' => 'Lorem ipsum dolor sit amet',
			'created' => '2012-08-02 17:21:19'
		),
		array(
			'id' => 6,
			'customer_id' => 6,
			'program_id' => 6,
			'company_id' => 6,
			'account_number' => 'Lorem ipsum dolor sit amet',
			'desc' => 'Lorem ipsum dolor sit amet',
			'created' => '2012-08-02 17:21:19'
		),
		array(
			'id' => 7,
			'customer_id' => 7,
			'program_id' => 7,
			'company_id' => 7,
			'account_number' => 'Lorem ipsum dolor sit amet',
			'desc' => 'Lorem ipsum dolor sit amet',
			'created' => '2012-08-02 17:21:19'
		),
		array(
			'id' => 8,
			'customer_id' => 8,
			'program_id' => 8,
			'company_id' => 8,
			'account_number' => 'Lorem ipsum dolor sit amet',
			'desc' => 'Lorem ipsum dolor sit amet',
			'created' => '2012-08-02 17:21:19'
		),
		array(
			'id' => 9,
			'customer_id' => 9,
			'program_id' => 9,
			'company_id' => 9,
			'account_number' => 'Lorem ipsum dolor sit amet',
			'desc' => 'Lorem ipsum dolor sit amet',
			'created' => '2012-08-02 17:21:19'
		),
		array(
			'id' => 10,
			'customer_id' => 10,
			'program_id' => 10,
			'company_id' => 10,
			'account_number' => 'Lorem ipsum dolor sit amet',
			'desc' => 'Lorem ipsum dolor sit amet',
			'created' => '2012-08-02 17:21:19'
		),
	);

}
