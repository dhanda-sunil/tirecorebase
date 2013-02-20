<?php
/**
 * BankAccountFixture
 *
 */
class BankAccountFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'company_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'name' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'account_number' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 50, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'routing_number' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 50, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'bank' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'interest' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'service_charge' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified_by' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'created_by' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
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
			'company_id' => 1,
			'name' => 'Lorem ipsum dolor sit amet',
			'account_number' => 'Lorem ipsum dolor sit amet',
			'routing_number' => 'Lorem ipsum dolor sit amet',
			'bank' => 1,
			'interest' => 1,
			'service_charge' => 1,
			'modified' => '2012-08-02 17:19:13',
			'modified_by' => 1,
			'created' => '2012-08-02 17:19:13',
			'created_by' => 1
		),
		array(
			'id' => 2,
			'company_id' => 2,
			'name' => 'Lorem ipsum dolor sit amet',
			'account_number' => 'Lorem ipsum dolor sit amet',
			'routing_number' => 'Lorem ipsum dolor sit amet',
			'bank' => 2,
			'interest' => 2,
			'service_charge' => 2,
			'modified' => '2012-08-02 17:19:13',
			'modified_by' => 2,
			'created' => '2012-08-02 17:19:13',
			'created_by' => 2
		),
		array(
			'id' => 3,
			'company_id' => 3,
			'name' => 'Lorem ipsum dolor sit amet',
			'account_number' => 'Lorem ipsum dolor sit amet',
			'routing_number' => 'Lorem ipsum dolor sit amet',
			'bank' => 3,
			'interest' => 3,
			'service_charge' => 3,
			'modified' => '2012-08-02 17:19:13',
			'modified_by' => 3,
			'created' => '2012-08-02 17:19:13',
			'created_by' => 3
		),
		array(
			'id' => 4,
			'company_id' => 4,
			'name' => 'Lorem ipsum dolor sit amet',
			'account_number' => 'Lorem ipsum dolor sit amet',
			'routing_number' => 'Lorem ipsum dolor sit amet',
			'bank' => 4,
			'interest' => 4,
			'service_charge' => 4,
			'modified' => '2012-08-02 17:19:13',
			'modified_by' => 4,
			'created' => '2012-08-02 17:19:13',
			'created_by' => 4
		),
		array(
			'id' => 5,
			'company_id' => 5,
			'name' => 'Lorem ipsum dolor sit amet',
			'account_number' => 'Lorem ipsum dolor sit amet',
			'routing_number' => 'Lorem ipsum dolor sit amet',
			'bank' => 5,
			'interest' => 5,
			'service_charge' => 5,
			'modified' => '2012-08-02 17:19:13',
			'modified_by' => 5,
			'created' => '2012-08-02 17:19:13',
			'created_by' => 5
		),
		array(
			'id' => 6,
			'company_id' => 6,
			'name' => 'Lorem ipsum dolor sit amet',
			'account_number' => 'Lorem ipsum dolor sit amet',
			'routing_number' => 'Lorem ipsum dolor sit amet',
			'bank' => 6,
			'interest' => 6,
			'service_charge' => 6,
			'modified' => '2012-08-02 17:19:13',
			'modified_by' => 6,
			'created' => '2012-08-02 17:19:13',
			'created_by' => 6
		),
		array(
			'id' => 7,
			'company_id' => 7,
			'name' => 'Lorem ipsum dolor sit amet',
			'account_number' => 'Lorem ipsum dolor sit amet',
			'routing_number' => 'Lorem ipsum dolor sit amet',
			'bank' => 7,
			'interest' => 7,
			'service_charge' => 7,
			'modified' => '2012-08-02 17:19:13',
			'modified_by' => 7,
			'created' => '2012-08-02 17:19:13',
			'created_by' => 7
		),
		array(
			'id' => 8,
			'company_id' => 8,
			'name' => 'Lorem ipsum dolor sit amet',
			'account_number' => 'Lorem ipsum dolor sit amet',
			'routing_number' => 'Lorem ipsum dolor sit amet',
			'bank' => 8,
			'interest' => 8,
			'service_charge' => 8,
			'modified' => '2012-08-02 17:19:13',
			'modified_by' => 8,
			'created' => '2012-08-02 17:19:13',
			'created_by' => 8
		),
		array(
			'id' => 9,
			'company_id' => 9,
			'name' => 'Lorem ipsum dolor sit amet',
			'account_number' => 'Lorem ipsum dolor sit amet',
			'routing_number' => 'Lorem ipsum dolor sit amet',
			'bank' => 9,
			'interest' => 9,
			'service_charge' => 9,
			'modified' => '2012-08-02 17:19:13',
			'modified_by' => 9,
			'created' => '2012-08-02 17:19:13',
			'created_by' => 9
		),
		array(
			'id' => 10,
			'company_id' => 10,
			'name' => 'Lorem ipsum dolor sit amet',
			'account_number' => 'Lorem ipsum dolor sit amet',
			'routing_number' => 'Lorem ipsum dolor sit amet',
			'bank' => 10,
			'interest' => 10,
			'service_charge' => 10,
			'modified' => '2012-08-02 17:19:13',
			'modified_by' => 10,
			'created' => '2012-08-02 17:19:13',
			'created_by' => 10
		),
	);

}
