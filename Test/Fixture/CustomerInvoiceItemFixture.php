<?php
/**
 * CustomerInvoiceItemFixture
 *
 */
class CustomerInvoiceItemFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'name' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'co_item_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'work_order_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'line_item_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'ref_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'ref_table' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 20, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'customer_invoice_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10),
		'quantity' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => '9,4'),
		'unit_price' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => '8,2'),
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
			'name' => 'Lorem ipsum dolor sit amet',
			'co_item_id' => 1,
			'work_order_id' => 1,
			'line_item_id' => 1,
			'ref_id' => 1,
			'ref_table' => 'Lorem ipsum dolor ',
			'customer_invoice_id' => 1,
			'quantity' => 1,
			'unit_price' => 1,
			'created' => '2012-08-02 17:20:36',
			'created_by' => 1
		),
		array(
			'id' => 2,
			'name' => 'Lorem ipsum dolor sit amet',
			'co_item_id' => 2,
			'work_order_id' => 2,
			'line_item_id' => 2,
			'ref_id' => 2,
			'ref_table' => 'Lorem ipsum dolor ',
			'customer_invoice_id' => 2,
			'quantity' => 2,
			'unit_price' => 2,
			'created' => '2012-08-02 17:20:36',
			'created_by' => 2
		),
		array(
			'id' => 3,
			'name' => 'Lorem ipsum dolor sit amet',
			'co_item_id' => 3,
			'work_order_id' => 3,
			'line_item_id' => 3,
			'ref_id' => 3,
			'ref_table' => 'Lorem ipsum dolor ',
			'customer_invoice_id' => 3,
			'quantity' => 3,
			'unit_price' => 3,
			'created' => '2012-08-02 17:20:36',
			'created_by' => 3
		),
		array(
			'id' => 4,
			'name' => 'Lorem ipsum dolor sit amet',
			'co_item_id' => 4,
			'work_order_id' => 4,
			'line_item_id' => 4,
			'ref_id' => 4,
			'ref_table' => 'Lorem ipsum dolor ',
			'customer_invoice_id' => 4,
			'quantity' => 4,
			'unit_price' => 4,
			'created' => '2012-08-02 17:20:36',
			'created_by' => 4
		),
		array(
			'id' => 5,
			'name' => 'Lorem ipsum dolor sit amet',
			'co_item_id' => 5,
			'work_order_id' => 5,
			'line_item_id' => 5,
			'ref_id' => 5,
			'ref_table' => 'Lorem ipsum dolor ',
			'customer_invoice_id' => 5,
			'quantity' => 5,
			'unit_price' => 5,
			'created' => '2012-08-02 17:20:36',
			'created_by' => 5
		),
		array(
			'id' => 6,
			'name' => 'Lorem ipsum dolor sit amet',
			'co_item_id' => 6,
			'work_order_id' => 6,
			'line_item_id' => 6,
			'ref_id' => 6,
			'ref_table' => 'Lorem ipsum dolor ',
			'customer_invoice_id' => 6,
			'quantity' => 6,
			'unit_price' => 6,
			'created' => '2012-08-02 17:20:36',
			'created_by' => 6
		),
		array(
			'id' => 7,
			'name' => 'Lorem ipsum dolor sit amet',
			'co_item_id' => 7,
			'work_order_id' => 7,
			'line_item_id' => 7,
			'ref_id' => 7,
			'ref_table' => 'Lorem ipsum dolor ',
			'customer_invoice_id' => 7,
			'quantity' => 7,
			'unit_price' => 7,
			'created' => '2012-08-02 17:20:36',
			'created_by' => 7
		),
		array(
			'id' => 8,
			'name' => 'Lorem ipsum dolor sit amet',
			'co_item_id' => 8,
			'work_order_id' => 8,
			'line_item_id' => 8,
			'ref_id' => 8,
			'ref_table' => 'Lorem ipsum dolor ',
			'customer_invoice_id' => 8,
			'quantity' => 8,
			'unit_price' => 8,
			'created' => '2012-08-02 17:20:36',
			'created_by' => 8
		),
		array(
			'id' => 9,
			'name' => 'Lorem ipsum dolor sit amet',
			'co_item_id' => 9,
			'work_order_id' => 9,
			'line_item_id' => 9,
			'ref_id' => 9,
			'ref_table' => 'Lorem ipsum dolor ',
			'customer_invoice_id' => 9,
			'quantity' => 9,
			'unit_price' => 9,
			'created' => '2012-08-02 17:20:36',
			'created_by' => 9
		),
		array(
			'id' => 10,
			'name' => 'Lorem ipsum dolor sit amet',
			'co_item_id' => 10,
			'work_order_id' => 10,
			'line_item_id' => 10,
			'ref_id' => 10,
			'ref_table' => 'Lorem ipsum dolor ',
			'customer_invoice_id' => 10,
			'quantity' => 10,
			'unit_price' => 10,
			'created' => '2012-08-02 17:20:36',
			'created_by' => 10
		),
	);

}
