<?php
/**
 * PoPackingSlipFeeFixture
 *
 */
class PoPackingSlipFeeFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'po_packing_slip_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'vendor_fee_type_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'distribution' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 5),
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
			'po_packing_slip_id' => 1,
			'vendor_fee_type_id' => 1,
			'distribution' => 1,
			'price' => 1,
			'account_id' => 1
		),
		array(
			'id' => 2,
			'po_packing_slip_id' => 2,
			'vendor_fee_type_id' => 2,
			'distribution' => 2,
			'price' => 2,
			'account_id' => 2
		),
		array(
			'id' => 3,
			'po_packing_slip_id' => 3,
			'vendor_fee_type_id' => 3,
			'distribution' => 3,
			'price' => 3,
			'account_id' => 3
		),
		array(
			'id' => 4,
			'po_packing_slip_id' => 4,
			'vendor_fee_type_id' => 4,
			'distribution' => 4,
			'price' => 4,
			'account_id' => 4
		),
		array(
			'id' => 5,
			'po_packing_slip_id' => 5,
			'vendor_fee_type_id' => 5,
			'distribution' => 5,
			'price' => 5,
			'account_id' => 5
		),
		array(
			'id' => 6,
			'po_packing_slip_id' => 6,
			'vendor_fee_type_id' => 6,
			'distribution' => 6,
			'price' => 6,
			'account_id' => 6
		),
		array(
			'id' => 7,
			'po_packing_slip_id' => 7,
			'vendor_fee_type_id' => 7,
			'distribution' => 7,
			'price' => 7,
			'account_id' => 7
		),
		array(
			'id' => 8,
			'po_packing_slip_id' => 8,
			'vendor_fee_type_id' => 8,
			'distribution' => 8,
			'price' => 8,
			'account_id' => 8
		),
		array(
			'id' => 9,
			'po_packing_slip_id' => 9,
			'vendor_fee_type_id' => 9,
			'distribution' => 9,
			'price' => 9,
			'account_id' => 9
		),
		array(
			'id' => 10,
			'po_packing_slip_id' => 10,
			'vendor_fee_type_id' => 10,
			'distribution' => 10,
			'price' => 10,
			'account_id' => 10
		),
	);

}
