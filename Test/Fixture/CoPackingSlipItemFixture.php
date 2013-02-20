<?php
/**
 * CoPackingSlipItemFixture
 *
 */
class CoPackingSlipItemFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'co_packing_slip_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'co_item_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'product_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
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
			'co_packing_slip_id' => 1,
			'co_item_id' => 1,
			'product_id' => 1,
			'quantity' => 1
		),
		array(
			'id' => 2,
			'co_packing_slip_id' => 2,
			'co_item_id' => 2,
			'product_id' => 2,
			'quantity' => 2
		),
		array(
			'id' => 3,
			'co_packing_slip_id' => 3,
			'co_item_id' => 3,
			'product_id' => 3,
			'quantity' => 3
		),
		array(
			'id' => 4,
			'co_packing_slip_id' => 4,
			'co_item_id' => 4,
			'product_id' => 4,
			'quantity' => 4
		),
		array(
			'id' => 5,
			'co_packing_slip_id' => 5,
			'co_item_id' => 5,
			'product_id' => 5,
			'quantity' => 5
		),
		array(
			'id' => 6,
			'co_packing_slip_id' => 6,
			'co_item_id' => 6,
			'product_id' => 6,
			'quantity' => 6
		),
		array(
			'id' => 7,
			'co_packing_slip_id' => 7,
			'co_item_id' => 7,
			'product_id' => 7,
			'quantity' => 7
		),
		array(
			'id' => 8,
			'co_packing_slip_id' => 8,
			'co_item_id' => 8,
			'product_id' => 8,
			'quantity' => 8
		),
		array(
			'id' => 9,
			'co_packing_slip_id' => 9,
			'co_item_id' => 9,
			'product_id' => 9,
			'quantity' => 9
		),
		array(
			'id' => 10,
			'co_packing_slip_id' => 10,
			'co_item_id' => 10,
			'product_id' => 10,
			'quantity' => 10
		),
	);

}
