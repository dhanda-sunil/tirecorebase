<?php
/**
 * CustomerCreditTypeFixture
 *
 */
class CustomerCreditTypeFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 5, 'key' => 'primary'),
		'name' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'number' => array('type' => 'boolean', 'null' => false, 'default' => '0'),
		'exp_date' => array('type' => 'boolean', 'null' => false, 'default' => '0'),
		'account_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'default' => array('type' => 'boolean', 'null' => false, 'default' => '0'),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'created_by' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
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
			'name' => 'Lorem ipsum dolor sit amet',
			'number' => 1,
			'exp_date' => 1,
			'account_id' => 1,
			'default' => 1,
			'created' => '2012-08-02 17:20:28',
			'created_by' => 1
		),
		array(
			'id' => 2,
			'name' => 'Lorem ipsum dolor sit amet',
			'number' => 1,
			'exp_date' => 1,
			'account_id' => 2,
			'default' => 1,
			'created' => '2012-08-02 17:20:28',
			'created_by' => 2
		),
		array(
			'id' => 3,
			'name' => 'Lorem ipsum dolor sit amet',
			'number' => 1,
			'exp_date' => 1,
			'account_id' => 3,
			'default' => 1,
			'created' => '2012-08-02 17:20:28',
			'created_by' => 3
		),
		array(
			'id' => 4,
			'name' => 'Lorem ipsum dolor sit amet',
			'number' => 1,
			'exp_date' => 1,
			'account_id' => 4,
			'default' => 1,
			'created' => '2012-08-02 17:20:28',
			'created_by' => 4
		),
		array(
			'id' => 5,
			'name' => 'Lorem ipsum dolor sit amet',
			'number' => 1,
			'exp_date' => 1,
			'account_id' => 5,
			'default' => 1,
			'created' => '2012-08-02 17:20:28',
			'created_by' => 5
		),
		array(
			'id' => 6,
			'name' => 'Lorem ipsum dolor sit amet',
			'number' => 1,
			'exp_date' => 1,
			'account_id' => 6,
			'default' => 1,
			'created' => '2012-08-02 17:20:28',
			'created_by' => 6
		),
		array(
			'id' => 7,
			'name' => 'Lorem ipsum dolor sit amet',
			'number' => 1,
			'exp_date' => 1,
			'account_id' => 7,
			'default' => 1,
			'created' => '2012-08-02 17:20:28',
			'created_by' => 7
		),
		array(
			'id' => 8,
			'name' => 'Lorem ipsum dolor sit amet',
			'number' => 1,
			'exp_date' => 1,
			'account_id' => 8,
			'default' => 1,
			'created' => '2012-08-02 17:20:28',
			'created_by' => 8
		),
		array(
			'id' => 9,
			'name' => 'Lorem ipsum dolor sit amet',
			'number' => 1,
			'exp_date' => 1,
			'account_id' => 9,
			'default' => 1,
			'created' => '2012-08-02 17:20:28',
			'created_by' => 9
		),
		array(
			'id' => 10,
			'name' => 'Lorem ipsum dolor sit amet',
			'number' => 1,
			'exp_date' => 1,
			'account_id' => 10,
			'default' => 1,
			'created' => '2012-08-02 17:20:28',
			'created_by' => 10
		),
	);

}
