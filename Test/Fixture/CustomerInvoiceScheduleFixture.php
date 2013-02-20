<?php
/**
 * CustomerInvoiceScheduleFixture
 *
 */
class CustomerInvoiceScheduleFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'customer_invoice_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'index'),
		'term_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 8, 'key' => 'index'),
		'due' => array('type' => 'date', 'null' => false, 'default' => null),
		'price' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => '9,2'),
		'paid' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'paid_total' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => '9,2'),
		'payment_number' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 2),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'vendor_invoice' => array('column' => 'customer_invoice_id', 'unique' => 0),
			'term' => array('column' => 'term_id', 'unique' => 0)
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
			'customer_invoice_id' => 1,
			'term_id' => 1,
			'due' => '2012-08-02',
			'price' => 1,
			'paid' => '2012-08-02 17:20:41',
			'paid_total' => 1,
			'payment_number' => 1
		),
		array(
			'id' => 2,
			'customer_invoice_id' => 2,
			'term_id' => 2,
			'due' => '2012-08-02',
			'price' => 2,
			'paid' => '2012-08-02 17:20:41',
			'paid_total' => 2,
			'payment_number' => 2
		),
		array(
			'id' => 3,
			'customer_invoice_id' => 3,
			'term_id' => 3,
			'due' => '2012-08-02',
			'price' => 3,
			'paid' => '2012-08-02 17:20:41',
			'paid_total' => 3,
			'payment_number' => 3
		),
		array(
			'id' => 4,
			'customer_invoice_id' => 4,
			'term_id' => 4,
			'due' => '2012-08-02',
			'price' => 4,
			'paid' => '2012-08-02 17:20:41',
			'paid_total' => 4,
			'payment_number' => 4
		),
		array(
			'id' => 5,
			'customer_invoice_id' => 5,
			'term_id' => 5,
			'due' => '2012-08-02',
			'price' => 5,
			'paid' => '2012-08-02 17:20:41',
			'paid_total' => 5,
			'payment_number' => 5
		),
		array(
			'id' => 6,
			'customer_invoice_id' => 6,
			'term_id' => 6,
			'due' => '2012-08-02',
			'price' => 6,
			'paid' => '2012-08-02 17:20:41',
			'paid_total' => 6,
			'payment_number' => 6
		),
		array(
			'id' => 7,
			'customer_invoice_id' => 7,
			'term_id' => 7,
			'due' => '2012-08-02',
			'price' => 7,
			'paid' => '2012-08-02 17:20:41',
			'paid_total' => 7,
			'payment_number' => 7
		),
		array(
			'id' => 8,
			'customer_invoice_id' => 8,
			'term_id' => 8,
			'due' => '2012-08-02',
			'price' => 8,
			'paid' => '2012-08-02 17:20:41',
			'paid_total' => 8,
			'payment_number' => 8
		),
		array(
			'id' => 9,
			'customer_invoice_id' => 9,
			'term_id' => 9,
			'due' => '2012-08-02',
			'price' => 9,
			'paid' => '2012-08-02 17:20:41',
			'paid_total' => 9,
			'payment_number' => 9
		),
		array(
			'id' => 10,
			'customer_invoice_id' => 10,
			'term_id' => 10,
			'due' => '2012-08-02',
			'price' => 10,
			'paid' => '2012-08-02 17:20:41',
			'paid_total' => 10,
			'payment_number' => 10
		),
	);

}
