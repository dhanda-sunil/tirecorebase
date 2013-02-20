<?php
/**
 * CustomerCreditFixture
 *
 */
class CustomerCreditFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'customer_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 6),
		'company_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'co_id' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 13, 'key' => 'index', 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'amount' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => '9,2'),
		'type' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 5),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'created_by' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'assigned' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'assigned_total' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => '9,2'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'co_id' => array('column' => 'co_id', 'unique' => 0)
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
			'customer_id' => 1,
			'company_id' => 1,
			'co_id' => 'Lorem ipsum',
			'amount' => 1,
			'type' => 1,
			'created' => '2012-08-02 17:20:30',
			'created_by' => 1,
			'assigned' => '2012-08-02 17:20:30',
			'assigned_total' => 1
		),
		array(
			'id' => 2,
			'customer_id' => 2,
			'company_id' => 2,
			'co_id' => 'Lorem ipsum',
			'amount' => 2,
			'type' => 2,
			'created' => '2012-08-02 17:20:30',
			'created_by' => 2,
			'assigned' => '2012-08-02 17:20:30',
			'assigned_total' => 2
		),
		array(
			'id' => 3,
			'customer_id' => 3,
			'company_id' => 3,
			'co_id' => 'Lorem ipsum',
			'amount' => 3,
			'type' => 3,
			'created' => '2012-08-02 17:20:30',
			'created_by' => 3,
			'assigned' => '2012-08-02 17:20:30',
			'assigned_total' => 3
		),
		array(
			'id' => 4,
			'customer_id' => 4,
			'company_id' => 4,
			'co_id' => 'Lorem ipsum',
			'amount' => 4,
			'type' => 4,
			'created' => '2012-08-02 17:20:30',
			'created_by' => 4,
			'assigned' => '2012-08-02 17:20:30',
			'assigned_total' => 4
		),
		array(
			'id' => 5,
			'customer_id' => 5,
			'company_id' => 5,
			'co_id' => 'Lorem ipsum',
			'amount' => 5,
			'type' => 5,
			'created' => '2012-08-02 17:20:30',
			'created_by' => 5,
			'assigned' => '2012-08-02 17:20:30',
			'assigned_total' => 5
		),
		array(
			'id' => 6,
			'customer_id' => 6,
			'company_id' => 6,
			'co_id' => 'Lorem ipsum',
			'amount' => 6,
			'type' => 6,
			'created' => '2012-08-02 17:20:30',
			'created_by' => 6,
			'assigned' => '2012-08-02 17:20:30',
			'assigned_total' => 6
		),
		array(
			'id' => 7,
			'customer_id' => 7,
			'company_id' => 7,
			'co_id' => 'Lorem ipsum',
			'amount' => 7,
			'type' => 7,
			'created' => '2012-08-02 17:20:30',
			'created_by' => 7,
			'assigned' => '2012-08-02 17:20:30',
			'assigned_total' => 7
		),
		array(
			'id' => 8,
			'customer_id' => 8,
			'company_id' => 8,
			'co_id' => 'Lorem ipsum',
			'amount' => 8,
			'type' => 8,
			'created' => '2012-08-02 17:20:30',
			'created_by' => 8,
			'assigned' => '2012-08-02 17:20:30',
			'assigned_total' => 8
		),
		array(
			'id' => 9,
			'customer_id' => 9,
			'company_id' => 9,
			'co_id' => 'Lorem ipsum',
			'amount' => 9,
			'type' => 9,
			'created' => '2012-08-02 17:20:30',
			'created_by' => 9,
			'assigned' => '2012-08-02 17:20:30',
			'assigned_total' => 9
		),
		array(
			'id' => 10,
			'customer_id' => 10,
			'company_id' => 10,
			'co_id' => 'Lorem ipsum',
			'amount' => 10,
			'type' => 10,
			'created' => '2012-08-02 17:20:30',
			'created_by' => 10,
			'assigned' => '2012-08-02 17:20:30',
			'assigned_total' => 10
		),
	);

}
