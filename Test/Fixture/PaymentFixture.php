<?php
/**
 * PaymentFixture
 *
 */
class PaymentFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'amount' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => '8,2'),
		'customer_credit_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'till_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'payment_date' => array('type' => 'datetime', 'null' => false, 'default' => null),
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
			'amount' => 1,
			'customer_credit_id' => 1,
			'till_id' => 1,
			'payment_date' => '2012-08-02 17:23:19',
			'created' => '2012-08-02 17:23:19',
			'created_by' => 1
		),
		array(
			'id' => 2,
			'amount' => 2,
			'customer_credit_id' => 2,
			'till_id' => 2,
			'payment_date' => '2012-08-02 17:23:19',
			'created' => '2012-08-02 17:23:19',
			'created_by' => 2
		),
		array(
			'id' => 3,
			'amount' => 3,
			'customer_credit_id' => 3,
			'till_id' => 3,
			'payment_date' => '2012-08-02 17:23:19',
			'created' => '2012-08-02 17:23:19',
			'created_by' => 3
		),
		array(
			'id' => 4,
			'amount' => 4,
			'customer_credit_id' => 4,
			'till_id' => 4,
			'payment_date' => '2012-08-02 17:23:19',
			'created' => '2012-08-02 17:23:19',
			'created_by' => 4
		),
		array(
			'id' => 5,
			'amount' => 5,
			'customer_credit_id' => 5,
			'till_id' => 5,
			'payment_date' => '2012-08-02 17:23:19',
			'created' => '2012-08-02 17:23:19',
			'created_by' => 5
		),
		array(
			'id' => 6,
			'amount' => 6,
			'customer_credit_id' => 6,
			'till_id' => 6,
			'payment_date' => '2012-08-02 17:23:19',
			'created' => '2012-08-02 17:23:19',
			'created_by' => 6
		),
		array(
			'id' => 7,
			'amount' => 7,
			'customer_credit_id' => 7,
			'till_id' => 7,
			'payment_date' => '2012-08-02 17:23:19',
			'created' => '2012-08-02 17:23:19',
			'created_by' => 7
		),
		array(
			'id' => 8,
			'amount' => 8,
			'customer_credit_id' => 8,
			'till_id' => 8,
			'payment_date' => '2012-08-02 17:23:19',
			'created' => '2012-08-02 17:23:19',
			'created_by' => 8
		),
		array(
			'id' => 9,
			'amount' => 9,
			'customer_credit_id' => 9,
			'till_id' => 9,
			'payment_date' => '2012-08-02 17:23:19',
			'created' => '2012-08-02 17:23:19',
			'created_by' => 9
		),
		array(
			'id' => 10,
			'amount' => 10,
			'customer_credit_id' => 10,
			'till_id' => 10,
			'payment_date' => '2012-08-02 17:23:19',
			'created' => '2012-08-02 17:23:19',
			'created_by' => 10
		),
	);

}
