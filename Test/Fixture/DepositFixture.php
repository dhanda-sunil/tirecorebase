<?php
/**
 * DepositFixture
 *
 */
class DepositFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'created_by' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'amount' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => '9,2'),
		'bank_account_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
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
			'created' => '2012-08-02 17:21:25',
			'created_by' => 1,
			'amount' => 1,
			'bank_account_id' => 1
		),
		array(
			'id' => 2,
			'created' => '2012-08-02 17:21:25',
			'created_by' => 2,
			'amount' => 2,
			'bank_account_id' => 2
		),
		array(
			'id' => 3,
			'created' => '2012-08-02 17:21:25',
			'created_by' => 3,
			'amount' => 3,
			'bank_account_id' => 3
		),
		array(
			'id' => 4,
			'created' => '2012-08-02 17:21:25',
			'created_by' => 4,
			'amount' => 4,
			'bank_account_id' => 4
		),
		array(
			'id' => 5,
			'created' => '2012-08-02 17:21:25',
			'created_by' => 5,
			'amount' => 5,
			'bank_account_id' => 5
		),
		array(
			'id' => 6,
			'created' => '2012-08-02 17:21:25',
			'created_by' => 6,
			'amount' => 6,
			'bank_account_id' => 6
		),
		array(
			'id' => 7,
			'created' => '2012-08-02 17:21:25',
			'created_by' => 7,
			'amount' => 7,
			'bank_account_id' => 7
		),
		array(
			'id' => 8,
			'created' => '2012-08-02 17:21:25',
			'created_by' => 8,
			'amount' => 8,
			'bank_account_id' => 8
		),
		array(
			'id' => 9,
			'created' => '2012-08-02 17:21:25',
			'created_by' => 9,
			'amount' => 9,
			'bank_account_id' => 9
		),
		array(
			'id' => 10,
			'created' => '2012-08-02 17:21:25',
			'created_by' => 10,
			'amount' => 10,
			'bank_account_id' => 10
		),
	);

}
