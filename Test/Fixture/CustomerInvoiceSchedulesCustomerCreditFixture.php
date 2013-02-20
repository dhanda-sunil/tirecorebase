<?php
/**
 * CustomerInvoiceSchedulesCustomerCreditFixture
 *
 */
class CustomerInvoiceSchedulesCustomerCreditFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'customer_credit_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'index'),
		'customer_invoice_schedule_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'amount' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => '9,2'),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'created_by' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'customer_credit_id' => array('column' => array('customer_credit_id', 'customer_invoice_schedule_id'), 'unique' => 0)
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
			'customer_credit_id' => 1,
			'customer_invoice_schedule_id' => 1,
			'amount' => 1,
			'created' => '2012-08-02 17:20:43',
			'created_by' => 1
		),
		array(
			'id' => 2,
			'customer_credit_id' => 2,
			'customer_invoice_schedule_id' => 2,
			'amount' => 2,
			'created' => '2012-08-02 17:20:43',
			'created_by' => 2
		),
		array(
			'id' => 3,
			'customer_credit_id' => 3,
			'customer_invoice_schedule_id' => 3,
			'amount' => 3,
			'created' => '2012-08-02 17:20:43',
			'created_by' => 3
		),
		array(
			'id' => 4,
			'customer_credit_id' => 4,
			'customer_invoice_schedule_id' => 4,
			'amount' => 4,
			'created' => '2012-08-02 17:20:43',
			'created_by' => 4
		),
		array(
			'id' => 5,
			'customer_credit_id' => 5,
			'customer_invoice_schedule_id' => 5,
			'amount' => 5,
			'created' => '2012-08-02 17:20:43',
			'created_by' => 5
		),
		array(
			'id' => 6,
			'customer_credit_id' => 6,
			'customer_invoice_schedule_id' => 6,
			'amount' => 6,
			'created' => '2012-08-02 17:20:43',
			'created_by' => 6
		),
		array(
			'id' => 7,
			'customer_credit_id' => 7,
			'customer_invoice_schedule_id' => 7,
			'amount' => 7,
			'created' => '2012-08-02 17:20:43',
			'created_by' => 7
		),
		array(
			'id' => 8,
			'customer_credit_id' => 8,
			'customer_invoice_schedule_id' => 8,
			'amount' => 8,
			'created' => '2012-08-02 17:20:43',
			'created_by' => 8
		),
		array(
			'id' => 9,
			'customer_credit_id' => 9,
			'customer_invoice_schedule_id' => 9,
			'amount' => 9,
			'created' => '2012-08-02 17:20:43',
			'created_by' => 9
		),
		array(
			'id' => 10,
			'customer_credit_id' => 10,
			'customer_invoice_schedule_id' => 10,
			'amount' => 10,
			'created' => '2012-08-02 17:20:43',
			'created_by' => 10
		),
	);

}
