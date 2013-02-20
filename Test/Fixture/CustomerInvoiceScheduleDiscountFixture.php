<?php
/**
 * CustomerInvoiceScheduleDiscountFixture
 *
 */
class CustomerInvoiceScheduleDiscountFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'customer_invoice_schedule_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'index'),
		'due' => array('type' => 'date', 'null' => false, 'default' => null),
		'price' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => '9,2'),
		'used' => array('type' => 'boolean', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'vendor_invoice_schedule' => array('column' => 'customer_invoice_schedule_id', 'unique' => 0)
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
			'customer_invoice_schedule_id' => 1,
			'due' => '2012-08-02',
			'price' => 1,
			'used' => 1
		),
		array(
			'id' => 2,
			'customer_invoice_schedule_id' => 2,
			'due' => '2012-08-02',
			'price' => 2,
			'used' => 1
		),
		array(
			'id' => 3,
			'customer_invoice_schedule_id' => 3,
			'due' => '2012-08-02',
			'price' => 3,
			'used' => 1
		),
		array(
			'id' => 4,
			'customer_invoice_schedule_id' => 4,
			'due' => '2012-08-02',
			'price' => 4,
			'used' => 1
		),
		array(
			'id' => 5,
			'customer_invoice_schedule_id' => 5,
			'due' => '2012-08-02',
			'price' => 5,
			'used' => 1
		),
		array(
			'id' => 6,
			'customer_invoice_schedule_id' => 6,
			'due' => '2012-08-02',
			'price' => 6,
			'used' => 1
		),
		array(
			'id' => 7,
			'customer_invoice_schedule_id' => 7,
			'due' => '2012-08-02',
			'price' => 7,
			'used' => 1
		),
		array(
			'id' => 8,
			'customer_invoice_schedule_id' => 8,
			'due' => '2012-08-02',
			'price' => 8,
			'used' => 1
		),
		array(
			'id' => 9,
			'customer_invoice_schedule_id' => 9,
			'due' => '2012-08-02',
			'price' => 9,
			'used' => 1
		),
		array(
			'id' => 10,
			'customer_invoice_schedule_id' => 10,
			'due' => '2012-08-02',
			'price' => 10,
			'used' => 1
		),
	);

}
