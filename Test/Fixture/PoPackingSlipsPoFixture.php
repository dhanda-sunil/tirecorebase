<?php
/**
 * PoPackingSlipsPoFixture
 *
 */
class PoPackingSlipsPoFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'po_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'po_packing_slip_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'po_id' => array('column' => array('po_id', 'po_packing_slip_id'), 'unique' => 0)
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
			'po_packing_slip_id' => 1
		),
		array(
			'id' => 2,
			'po_id' => 2,
			'po_packing_slip_id' => 2
		),
		array(
			'id' => 3,
			'po_id' => 3,
			'po_packing_slip_id' => 3
		),
		array(
			'id' => 4,
			'po_id' => 4,
			'po_packing_slip_id' => 4
		),
		array(
			'id' => 5,
			'po_id' => 5,
			'po_packing_slip_id' => 5
		),
		array(
			'id' => 6,
			'po_id' => 6,
			'po_packing_slip_id' => 6
		),
		array(
			'id' => 7,
			'po_id' => 7,
			'po_packing_slip_id' => 7
		),
		array(
			'id' => 8,
			'po_id' => 8,
			'po_packing_slip_id' => 8
		),
		array(
			'id' => 9,
			'po_id' => 9,
			'po_packing_slip_id' => 9
		),
		array(
			'id' => 10,
			'po_id' => 10,
			'po_packing_slip_id' => 10
		),
	);

}
