<?php
/**
 * PoItemFeeFixture
 *
 */
class PoItemFeeFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'po_item_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'po_fee_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'price' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => '9,2'),
		'account_id' => array('type' => 'integer', 'null' => true, 'default' => null),
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
			'po_item_id' => 1,
			'po_fee_id' => 1,
			'price' => 1,
			'account_id' => 1
		),
		array(
			'id' => 2,
			'po_item_id' => 2,
			'po_fee_id' => 2,
			'price' => 2,
			'account_id' => 2
		),
		array(
			'id' => 3,
			'po_item_id' => 3,
			'po_fee_id' => 3,
			'price' => 3,
			'account_id' => 3
		),
		array(
			'id' => 4,
			'po_item_id' => 4,
			'po_fee_id' => 4,
			'price' => 4,
			'account_id' => 4
		),
		array(
			'id' => 5,
			'po_item_id' => 5,
			'po_fee_id' => 5,
			'price' => 5,
			'account_id' => 5
		),
		array(
			'id' => 6,
			'po_item_id' => 6,
			'po_fee_id' => 6,
			'price' => 6,
			'account_id' => 6
		),
		array(
			'id' => 7,
			'po_item_id' => 7,
			'po_fee_id' => 7,
			'price' => 7,
			'account_id' => 7
		),
		array(
			'id' => 8,
			'po_item_id' => 8,
			'po_fee_id' => 8,
			'price' => 8,
			'account_id' => 8
		),
		array(
			'id' => 9,
			'po_item_id' => 9,
			'po_fee_id' => 9,
			'price' => 9,
			'account_id' => 9
		),
		array(
			'id' => 10,
			'po_item_id' => 10,
			'po_fee_id' => 10,
			'price' => 10,
			'account_id' => 10
		),
	);

}
