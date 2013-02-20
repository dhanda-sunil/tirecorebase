<?php
/**
 * CustomerInvoiceFixture
 *
 */
class CustomerInvoiceFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'customer_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'company_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'sub_total' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => '9,2'),
		'tax_total' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => '9,2'),
		'grand_total' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => '9,2'),
		'pending_total' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => '9,2'),
		'discounts_received' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => '9,2'),
		'scheduled' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 2),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'created_by' => array('type' => 'integer', 'null' => false, 'default' => null),
		'paid' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'service_charge' => array('type' => 'boolean', 'null' => false, 'default' => null),
		'period_end' => array('type' => 'date', 'null' => false, 'default' => null),
		'term_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'term_date' => array('type' => 'datetime', 'null' => false, 'default' => null),
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
			'customer_id' => 1,
			'company_id' => 1,
			'sub_total' => 1,
			'tax_total' => 1,
			'grand_total' => 1,
			'pending_total' => 1,
			'discounts_received' => 1,
			'scheduled' => 1,
			'created' => '2012-08-02 17:20:45',
			'created_by' => 1,
			'paid' => '2012-08-02 17:20:45',
			'service_charge' => 1,
			'period_end' => '2012-08-02',
			'term_id' => 1,
			'term_date' => '2012-08-02 17:20:45'
		),
		array(
			'id' => 2,
			'customer_id' => 2,
			'company_id' => 2,
			'sub_total' => 2,
			'tax_total' => 2,
			'grand_total' => 2,
			'pending_total' => 2,
			'discounts_received' => 2,
			'scheduled' => 2,
			'created' => '2012-08-02 17:20:45',
			'created_by' => 2,
			'paid' => '2012-08-02 17:20:45',
			'service_charge' => 1,
			'period_end' => '2012-08-02',
			'term_id' => 2,
			'term_date' => '2012-08-02 17:20:45'
		),
		array(
			'id' => 3,
			'customer_id' => 3,
			'company_id' => 3,
			'sub_total' => 3,
			'tax_total' => 3,
			'grand_total' => 3,
			'pending_total' => 3,
			'discounts_received' => 3,
			'scheduled' => 3,
			'created' => '2012-08-02 17:20:45',
			'created_by' => 3,
			'paid' => '2012-08-02 17:20:45',
			'service_charge' => 1,
			'period_end' => '2012-08-02',
			'term_id' => 3,
			'term_date' => '2012-08-02 17:20:45'
		),
		array(
			'id' => 4,
			'customer_id' => 4,
			'company_id' => 4,
			'sub_total' => 4,
			'tax_total' => 4,
			'grand_total' => 4,
			'pending_total' => 4,
			'discounts_received' => 4,
			'scheduled' => 4,
			'created' => '2012-08-02 17:20:45',
			'created_by' => 4,
			'paid' => '2012-08-02 17:20:45',
			'service_charge' => 1,
			'period_end' => '2012-08-02',
			'term_id' => 4,
			'term_date' => '2012-08-02 17:20:45'
		),
		array(
			'id' => 5,
			'customer_id' => 5,
			'company_id' => 5,
			'sub_total' => 5,
			'tax_total' => 5,
			'grand_total' => 5,
			'pending_total' => 5,
			'discounts_received' => 5,
			'scheduled' => 5,
			'created' => '2012-08-02 17:20:45',
			'created_by' => 5,
			'paid' => '2012-08-02 17:20:45',
			'service_charge' => 1,
			'period_end' => '2012-08-02',
			'term_id' => 5,
			'term_date' => '2012-08-02 17:20:45'
		),
		array(
			'id' => 6,
			'customer_id' => 6,
			'company_id' => 6,
			'sub_total' => 6,
			'tax_total' => 6,
			'grand_total' => 6,
			'pending_total' => 6,
			'discounts_received' => 6,
			'scheduled' => 6,
			'created' => '2012-08-02 17:20:45',
			'created_by' => 6,
			'paid' => '2012-08-02 17:20:45',
			'service_charge' => 1,
			'period_end' => '2012-08-02',
			'term_id' => 6,
			'term_date' => '2012-08-02 17:20:45'
		),
		array(
			'id' => 7,
			'customer_id' => 7,
			'company_id' => 7,
			'sub_total' => 7,
			'tax_total' => 7,
			'grand_total' => 7,
			'pending_total' => 7,
			'discounts_received' => 7,
			'scheduled' => 7,
			'created' => '2012-08-02 17:20:45',
			'created_by' => 7,
			'paid' => '2012-08-02 17:20:45',
			'service_charge' => 1,
			'period_end' => '2012-08-02',
			'term_id' => 7,
			'term_date' => '2012-08-02 17:20:45'
		),
		array(
			'id' => 8,
			'customer_id' => 8,
			'company_id' => 8,
			'sub_total' => 8,
			'tax_total' => 8,
			'grand_total' => 8,
			'pending_total' => 8,
			'discounts_received' => 8,
			'scheduled' => 8,
			'created' => '2012-08-02 17:20:45',
			'created_by' => 8,
			'paid' => '2012-08-02 17:20:45',
			'service_charge' => 1,
			'period_end' => '2012-08-02',
			'term_id' => 8,
			'term_date' => '2012-08-02 17:20:45'
		),
		array(
			'id' => 9,
			'customer_id' => 9,
			'company_id' => 9,
			'sub_total' => 9,
			'tax_total' => 9,
			'grand_total' => 9,
			'pending_total' => 9,
			'discounts_received' => 9,
			'scheduled' => 9,
			'created' => '2012-08-02 17:20:45',
			'created_by' => 9,
			'paid' => '2012-08-02 17:20:45',
			'service_charge' => 1,
			'period_end' => '2012-08-02',
			'term_id' => 9,
			'term_date' => '2012-08-02 17:20:45'
		),
		array(
			'id' => 10,
			'customer_id' => 10,
			'company_id' => 10,
			'sub_total' => 10,
			'tax_total' => 10,
			'grand_total' => 10,
			'pending_total' => 10,
			'discounts_received' => 10,
			'scheduled' => 10,
			'created' => '2012-08-02 17:20:45',
			'created_by' => 10,
			'paid' => '2012-08-02 17:20:45',
			'service_charge' => 1,
			'period_end' => '2012-08-02',
			'term_id' => 10,
			'term_date' => '2012-08-02 17:20:45'
		),
	);

}
