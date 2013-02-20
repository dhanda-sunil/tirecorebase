<?php
/**
 * PoPackingSlipFixture
 *
 */
class PoPackingSlipFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'vendor_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'index'),
		'company_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'index'),
		'location_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'index'),
		'item_total' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => '10,2'),
		'fee_total_total' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => '10,2'),
		'grand_total' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => '10,2'),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'created_by' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified_by' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'invoice_id' => array('column' => array('location_id', 'created'), 'unique' => 0),
			'vendor_id' => array('column' => 'vendor_id', 'unique' => 0),
			'company_id' => array('column' => 'company_id', 'unique' => 0),
			'status' => array('column' => 'status', 'unique' => 0)
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
			'vendor_id' => 1,
			'company_id' => 1,
			'location_id' => 1,
			'item_total' => 1,
			'fee_total_total' => 1,
			'grand_total' => 1,
			'created' => '2012-08-02 17:23:43',
			'created_by' => 1,
			'modified' => '2012-08-02 17:23:43',
			'modified_by' => 1
		),
		array(
			'id' => 2,
			'vendor_id' => 2,
			'company_id' => 2,
			'location_id' => 2,
			'item_total' => 2,
			'fee_total_total' => 2,
			'grand_total' => 2,
			'created' => '2012-08-02 17:23:43',
			'created_by' => 2,
			'modified' => '2012-08-02 17:23:43',
			'modified_by' => 2
		),
		array(
			'id' => 3,
			'vendor_id' => 3,
			'company_id' => 3,
			'location_id' => 3,
			'item_total' => 3,
			'fee_total_total' => 3,
			'grand_total' => 3,
			'created' => '2012-08-02 17:23:43',
			'created_by' => 3,
			'modified' => '2012-08-02 17:23:43',
			'modified_by' => 3
		),
		array(
			'id' => 4,
			'vendor_id' => 4,
			'company_id' => 4,
			'location_id' => 4,
			'item_total' => 4,
			'fee_total_total' => 4,
			'grand_total' => 4,
			'created' => '2012-08-02 17:23:43',
			'created_by' => 4,
			'modified' => '2012-08-02 17:23:43',
			'modified_by' => 4
		),
		array(
			'id' => 5,
			'vendor_id' => 5,
			'company_id' => 5,
			'location_id' => 5,
			'item_total' => 5,
			'fee_total_total' => 5,
			'grand_total' => 5,
			'created' => '2012-08-02 17:23:43',
			'created_by' => 5,
			'modified' => '2012-08-02 17:23:43',
			'modified_by' => 5
		),
		array(
			'id' => 6,
			'vendor_id' => 6,
			'company_id' => 6,
			'location_id' => 6,
			'item_total' => 6,
			'fee_total_total' => 6,
			'grand_total' => 6,
			'created' => '2012-08-02 17:23:43',
			'created_by' => 6,
			'modified' => '2012-08-02 17:23:43',
			'modified_by' => 6
		),
		array(
			'id' => 7,
			'vendor_id' => 7,
			'company_id' => 7,
			'location_id' => 7,
			'item_total' => 7,
			'fee_total_total' => 7,
			'grand_total' => 7,
			'created' => '2012-08-02 17:23:43',
			'created_by' => 7,
			'modified' => '2012-08-02 17:23:43',
			'modified_by' => 7
		),
		array(
			'id' => 8,
			'vendor_id' => 8,
			'company_id' => 8,
			'location_id' => 8,
			'item_total' => 8,
			'fee_total_total' => 8,
			'grand_total' => 8,
			'created' => '2012-08-02 17:23:43',
			'created_by' => 8,
			'modified' => '2012-08-02 17:23:43',
			'modified_by' => 8
		),
		array(
			'id' => 9,
			'vendor_id' => 9,
			'company_id' => 9,
			'location_id' => 9,
			'item_total' => 9,
			'fee_total_total' => 9,
			'grand_total' => 9,
			'created' => '2012-08-02 17:23:43',
			'created_by' => 9,
			'modified' => '2012-08-02 17:23:43',
			'modified_by' => 9
		),
		array(
			'id' => 10,
			'vendor_id' => 10,
			'company_id' => 10,
			'location_id' => 10,
			'item_total' => 10,
			'fee_total_total' => 10,
			'grand_total' => 10,
			'created' => '2012-08-02 17:23:43',
			'created_by' => 10,
			'modified' => '2012-08-02 17:23:43',
			'modified_by' => 10
		),
	);

}
