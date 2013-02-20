<?php
/**
 * CustomerRefundItemFixture
 *
 */
class CustomerRefundItemFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'customer_refund_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'customer_refund_type_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'amount' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => '8,2'),
		'number' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'exp_date' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
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
			'customer_refund_id' => 1,
			'customer_refund_type_id' => 1,
			'amount' => 1,
			'number' => 'Lorem ipsum dolor sit amet',
			'exp_date' => '2012-08-02 17:20:59',
			'created' => '2012-08-02 17:20:59'
		),
		array(
			'id' => 2,
			'customer_refund_id' => 2,
			'customer_refund_type_id' => 2,
			'amount' => 2,
			'number' => 'Lorem ipsum dolor sit amet',
			'exp_date' => '2012-08-02 17:20:59',
			'created' => '2012-08-02 17:20:59'
		),
		array(
			'id' => 3,
			'customer_refund_id' => 3,
			'customer_refund_type_id' => 3,
			'amount' => 3,
			'number' => 'Lorem ipsum dolor sit amet',
			'exp_date' => '2012-08-02 17:20:59',
			'created' => '2012-08-02 17:20:59'
		),
		array(
			'id' => 4,
			'customer_refund_id' => 4,
			'customer_refund_type_id' => 4,
			'amount' => 4,
			'number' => 'Lorem ipsum dolor sit amet',
			'exp_date' => '2012-08-02 17:20:59',
			'created' => '2012-08-02 17:20:59'
		),
		array(
			'id' => 5,
			'customer_refund_id' => 5,
			'customer_refund_type_id' => 5,
			'amount' => 5,
			'number' => 'Lorem ipsum dolor sit amet',
			'exp_date' => '2012-08-02 17:20:59',
			'created' => '2012-08-02 17:20:59'
		),
		array(
			'id' => 6,
			'customer_refund_id' => 6,
			'customer_refund_type_id' => 6,
			'amount' => 6,
			'number' => 'Lorem ipsum dolor sit amet',
			'exp_date' => '2012-08-02 17:20:59',
			'created' => '2012-08-02 17:20:59'
		),
		array(
			'id' => 7,
			'customer_refund_id' => 7,
			'customer_refund_type_id' => 7,
			'amount' => 7,
			'number' => 'Lorem ipsum dolor sit amet',
			'exp_date' => '2012-08-02 17:20:59',
			'created' => '2012-08-02 17:20:59'
		),
		array(
			'id' => 8,
			'customer_refund_id' => 8,
			'customer_refund_type_id' => 8,
			'amount' => 8,
			'number' => 'Lorem ipsum dolor sit amet',
			'exp_date' => '2012-08-02 17:20:59',
			'created' => '2012-08-02 17:20:59'
		),
		array(
			'id' => 9,
			'customer_refund_id' => 9,
			'customer_refund_type_id' => 9,
			'amount' => 9,
			'number' => 'Lorem ipsum dolor sit amet',
			'exp_date' => '2012-08-02 17:20:59',
			'created' => '2012-08-02 17:20:59'
		),
		array(
			'id' => 10,
			'customer_refund_id' => 10,
			'customer_refund_type_id' => 10,
			'amount' => 10,
			'number' => 'Lorem ipsum dolor sit amet',
			'exp_date' => '2012-08-02 17:20:59',
			'created' => '2012-08-02 17:20:59'
		),
	);

}
