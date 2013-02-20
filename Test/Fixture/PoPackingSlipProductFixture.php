<?php
/**
 * PoPackingSlipProductFixture
 *
 */
class PoPackingSlipProductFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 20, 'key' => 'primary'),
		'po_packing_slip_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'product_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 20),
		'po_id' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 13, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'price' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => '9,2'),
		'fee_total' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => '8,2'),
		'quantity' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
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
			'po_packing_slip_id' => 1,
			'product_id' => 1,
			'po_id' => 'Lorem ipsum',
			'price' => 1,
			'fee_total' => 1,
			'quantity' => 1
		),
		array(
			'id' => 2,
			'po_packing_slip_id' => 2,
			'product_id' => 2,
			'po_id' => 'Lorem ipsum',
			'price' => 2,
			'fee_total' => 2,
			'quantity' => 2
		),
		array(
			'id' => 3,
			'po_packing_slip_id' => 3,
			'product_id' => 3,
			'po_id' => 'Lorem ipsum',
			'price' => 3,
			'fee_total' => 3,
			'quantity' => 3
		),
		array(
			'id' => 4,
			'po_packing_slip_id' => 4,
			'product_id' => 4,
			'po_id' => 'Lorem ipsum',
			'price' => 4,
			'fee_total' => 4,
			'quantity' => 4
		),
		array(
			'id' => 5,
			'po_packing_slip_id' => 5,
			'product_id' => 5,
			'po_id' => 'Lorem ipsum',
			'price' => 5,
			'fee_total' => 5,
			'quantity' => 5
		),
		array(
			'id' => 6,
			'po_packing_slip_id' => 6,
			'product_id' => 6,
			'po_id' => 'Lorem ipsum',
			'price' => 6,
			'fee_total' => 6,
			'quantity' => 6
		),
		array(
			'id' => 7,
			'po_packing_slip_id' => 7,
			'product_id' => 7,
			'po_id' => 'Lorem ipsum',
			'price' => 7,
			'fee_total' => 7,
			'quantity' => 7
		),
		array(
			'id' => 8,
			'po_packing_slip_id' => 8,
			'product_id' => 8,
			'po_id' => 'Lorem ipsum',
			'price' => 8,
			'fee_total' => 8,
			'quantity' => 8
		),
		array(
			'id' => 9,
			'po_packing_slip_id' => 9,
			'product_id' => 9,
			'po_id' => 'Lorem ipsum',
			'price' => 9,
			'fee_total' => 9,
			'quantity' => 9
		),
		array(
			'id' => 10,
			'po_packing_slip_id' => 10,
			'product_id' => 10,
			'po_id' => 'Lorem ipsum',
			'price' => 10,
			'fee_total' => 10,
			'quantity' => 10
		),
	);

}
