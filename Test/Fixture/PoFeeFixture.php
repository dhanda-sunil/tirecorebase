<?php
/**
 * PoFeeFixture
 *
 */
class PoFeeFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'po_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'vendor_fee_type_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'price' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => '9,2'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'po_id' => array('column' => 'po_id', 'unique' => 0)
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
			'po_id' => 1,
			'vendor_fee_type_id' => 1,
			'price' => 1
		),
		array(
			'id' => 2,
			'po_id' => 2,
			'vendor_fee_type_id' => 2,
			'price' => 2
		),
		array(
			'id' => 3,
			'po_id' => 3,
			'vendor_fee_type_id' => 3,
			'price' => 3
		),
		array(
			'id' => 4,
			'po_id' => 4,
			'vendor_fee_type_id' => 4,
			'price' => 4
		),
		array(
			'id' => 5,
			'po_id' => 5,
			'vendor_fee_type_id' => 5,
			'price' => 5
		),
		array(
			'id' => 6,
			'po_id' => 6,
			'vendor_fee_type_id' => 6,
			'price' => 6
		),
		array(
			'id' => 7,
			'po_id' => 7,
			'vendor_fee_type_id' => 7,
			'price' => 7
		),
		array(
			'id' => 8,
			'po_id' => 8,
			'vendor_fee_type_id' => 8,
			'price' => 8
		),
		array(
			'id' => 9,
			'po_id' => 9,
			'vendor_fee_type_id' => 9,
			'price' => 9
		),
		array(
			'id' => 10,
			'po_id' => 10,
			'vendor_fee_type_id' => 10,
			'price' => 10
		),
	);

}
