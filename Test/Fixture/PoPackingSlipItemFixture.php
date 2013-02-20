<?php
/**
 * PoPackingSlipItemFixture
 *
 */
class PoPackingSlipItemFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 20, 'key' => 'primary'),
		'po_packing_slip_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'ref_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 20),
		'ref_table' => array('type' => 'string', 'null' => false, 'default' => 'Product', 'length' => 20, 'key' => 'index', 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'line_item_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 8),
		'po_id' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 13, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'unit_price_guess' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => '9,2'),
		'fee_total' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => '8,2'),
		'quantity' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => '10,3'),
		'weight' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => '8,3'),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'ref_type' => array('column' => 'ref_table', 'unique' => 0)
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
			'ref_id' => 1,
			'ref_table' => 'Lorem ipsum dolor ',
			'line_item_id' => 1,
			'po_id' => 'Lorem ipsum',
			'unit_price_guess' => 1,
			'fee_total' => 1,
			'quantity' => 1,
			'weight' => 1,
			'created' => '2012-08-02 17:23:39',
			'modified' => '2012-08-02 17:23:39'
		),
		array(
			'id' => 2,
			'po_packing_slip_id' => 2,
			'ref_id' => 2,
			'ref_table' => 'Lorem ipsum dolor ',
			'line_item_id' => 2,
			'po_id' => 'Lorem ipsum',
			'unit_price_guess' => 2,
			'fee_total' => 2,
			'quantity' => 2,
			'weight' => 2,
			'created' => '2012-08-02 17:23:39',
			'modified' => '2012-08-02 17:23:39'
		),
		array(
			'id' => 3,
			'po_packing_slip_id' => 3,
			'ref_id' => 3,
			'ref_table' => 'Lorem ipsum dolor ',
			'line_item_id' => 3,
			'po_id' => 'Lorem ipsum',
			'unit_price_guess' => 3,
			'fee_total' => 3,
			'quantity' => 3,
			'weight' => 3,
			'created' => '2012-08-02 17:23:39',
			'modified' => '2012-08-02 17:23:39'
		),
		array(
			'id' => 4,
			'po_packing_slip_id' => 4,
			'ref_id' => 4,
			'ref_table' => 'Lorem ipsum dolor ',
			'line_item_id' => 4,
			'po_id' => 'Lorem ipsum',
			'unit_price_guess' => 4,
			'fee_total' => 4,
			'quantity' => 4,
			'weight' => 4,
			'created' => '2012-08-02 17:23:39',
			'modified' => '2012-08-02 17:23:39'
		),
		array(
			'id' => 5,
			'po_packing_slip_id' => 5,
			'ref_id' => 5,
			'ref_table' => 'Lorem ipsum dolor ',
			'line_item_id' => 5,
			'po_id' => 'Lorem ipsum',
			'unit_price_guess' => 5,
			'fee_total' => 5,
			'quantity' => 5,
			'weight' => 5,
			'created' => '2012-08-02 17:23:39',
			'modified' => '2012-08-02 17:23:39'
		),
		array(
			'id' => 6,
			'po_packing_slip_id' => 6,
			'ref_id' => 6,
			'ref_table' => 'Lorem ipsum dolor ',
			'line_item_id' => 6,
			'po_id' => 'Lorem ipsum',
			'unit_price_guess' => 6,
			'fee_total' => 6,
			'quantity' => 6,
			'weight' => 6,
			'created' => '2012-08-02 17:23:39',
			'modified' => '2012-08-02 17:23:39'
		),
		array(
			'id' => 7,
			'po_packing_slip_id' => 7,
			'ref_id' => 7,
			'ref_table' => 'Lorem ipsum dolor ',
			'line_item_id' => 7,
			'po_id' => 'Lorem ipsum',
			'unit_price_guess' => 7,
			'fee_total' => 7,
			'quantity' => 7,
			'weight' => 7,
			'created' => '2012-08-02 17:23:39',
			'modified' => '2012-08-02 17:23:39'
		),
		array(
			'id' => 8,
			'po_packing_slip_id' => 8,
			'ref_id' => 8,
			'ref_table' => 'Lorem ipsum dolor ',
			'line_item_id' => 8,
			'po_id' => 'Lorem ipsum',
			'unit_price_guess' => 8,
			'fee_total' => 8,
			'quantity' => 8,
			'weight' => 8,
			'created' => '2012-08-02 17:23:39',
			'modified' => '2012-08-02 17:23:39'
		),
		array(
			'id' => 9,
			'po_packing_slip_id' => 9,
			'ref_id' => 9,
			'ref_table' => 'Lorem ipsum dolor ',
			'line_item_id' => 9,
			'po_id' => 'Lorem ipsum',
			'unit_price_guess' => 9,
			'fee_total' => 9,
			'quantity' => 9,
			'weight' => 9,
			'created' => '2012-08-02 17:23:39',
			'modified' => '2012-08-02 17:23:39'
		),
		array(
			'id' => 10,
			'po_packing_slip_id' => 10,
			'ref_id' => 10,
			'ref_table' => 'Lorem ipsum dolor ',
			'line_item_id' => 10,
			'po_id' => 'Lorem ipsum',
			'unit_price_guess' => 10,
			'fee_total' => 10,
			'quantity' => 10,
			'weight' => 10,
			'created' => '2012-08-02 17:23:39',
			'modified' => '2012-08-02 17:23:39'
		),
	);

}
