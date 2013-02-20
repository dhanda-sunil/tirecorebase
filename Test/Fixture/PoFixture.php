<?php
/**
 * PoFixture
 *
 */
class PoFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'ref_id' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 20, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'vendor_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 10),
		'company_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 2),
		'location_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 3),
		'ship_location_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 3),
		'purchaser_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'taxes_group_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'vendors_accounts_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 10),
		'term_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'reference_number' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 50, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'vendors_reference_number' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 50, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'sub_total' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => '10,2'),
		'tax_total' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => '10,2'),
		'grand_total' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => '10,2'),
		'max_eta' => array('type' => 'date', 'null' => false, 'default' => '0000-00-00', 'key' => 'index'),
		'min_eta' => array('type' => 'date', 'null' => false, 'default' => '0000-00-00'),
		'activant_status' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 50, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'received' => array('type' => 'boolean', 'null' => false, 'default' => '0'),
		'billed' => array('type' => 'boolean', 'null' => false, 'default' => '0'),
		'paid' => array('type' => 'boolean', 'null' => false, 'default' => '0'),
		'is_transfer' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10),
		'transfer_co_id' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 13, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'transfer_location_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 4),
		'completed' => array('type' => 'boolean', 'null' => false, 'default' => '0'),
		'processed' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified_by' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 8),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'created_by' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 8),
		'deleted' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'deleted_by' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 8),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'eta' => array('column' => 'max_eta', 'unique' => 0),
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
			'ref_id' => 'Lorem ipsum dolor ',
			'vendor_id' => 1,
			'company_id' => 1,
			'location_id' => 1,
			'ship_location_id' => 1,
			'purchaser_id' => 1,
			'taxes_group_id' => 1,
			'vendors_accounts_id' => 1,
			'term_id' => 1,
			'reference_number' => 'Lorem ipsum dolor sit amet',
			'vendors_reference_number' => 'Lorem ipsum dolor sit amet',
			'sub_total' => 1,
			'tax_total' => 1,
			'grand_total' => 1,
			'max_eta' => '2012-08-02',
			'min_eta' => '2012-08-02',
			'activant_status' => 'Lorem ipsum dolor sit amet',
			'received' => 1,
			'billed' => 1,
			'paid' => 1,
			'is_transfer' => 1,
			'transfer_co_id' => 'Lorem ipsum',
			'transfer_location_id' => 1,
			'completed' => 1,
			'processed' => '2012-08-02 17:23:48',
			'modified' => '2012-08-02 17:23:48',
			'modified_by' => 1,
			'created' => '2012-08-02 17:23:48',
			'created_by' => 1,
			'deleted' => '2012-08-02 17:23:48',
			'deleted_by' => 1
		),
		array(
			'id' => 2,
			'ref_id' => 'Lorem ipsum dolor ',
			'vendor_id' => 2,
			'company_id' => 2,
			'location_id' => 2,
			'ship_location_id' => 2,
			'purchaser_id' => 2,
			'taxes_group_id' => 2,
			'vendors_accounts_id' => 2,
			'term_id' => 2,
			'reference_number' => 'Lorem ipsum dolor sit amet',
			'vendors_reference_number' => 'Lorem ipsum dolor sit amet',
			'sub_total' => 2,
			'tax_total' => 2,
			'grand_total' => 2,
			'max_eta' => '2012-08-02',
			'min_eta' => '2012-08-02',
			'activant_status' => 'Lorem ipsum dolor sit amet',
			'received' => 1,
			'billed' => 1,
			'paid' => 1,
			'is_transfer' => 2,
			'transfer_co_id' => 'Lorem ipsum',
			'transfer_location_id' => 2,
			'completed' => 1,
			'processed' => '2012-08-02 17:23:48',
			'modified' => '2012-08-02 17:23:48',
			'modified_by' => 2,
			'created' => '2012-08-02 17:23:48',
			'created_by' => 2,
			'deleted' => '2012-08-02 17:23:48',
			'deleted_by' => 2
		),
		array(
			'id' => 3,
			'ref_id' => 'Lorem ipsum dolor ',
			'vendor_id' => 3,
			'company_id' => 3,
			'location_id' => 3,
			'ship_location_id' => 3,
			'purchaser_id' => 3,
			'taxes_group_id' => 3,
			'vendors_accounts_id' => 3,
			'term_id' => 3,
			'reference_number' => 'Lorem ipsum dolor sit amet',
			'vendors_reference_number' => 'Lorem ipsum dolor sit amet',
			'sub_total' => 3,
			'tax_total' => 3,
			'grand_total' => 3,
			'max_eta' => '2012-08-02',
			'min_eta' => '2012-08-02',
			'activant_status' => 'Lorem ipsum dolor sit amet',
			'received' => 1,
			'billed' => 1,
			'paid' => 1,
			'is_transfer' => 3,
			'transfer_co_id' => 'Lorem ipsum',
			'transfer_location_id' => 3,
			'completed' => 1,
			'processed' => '2012-08-02 17:23:48',
			'modified' => '2012-08-02 17:23:48',
			'modified_by' => 3,
			'created' => '2012-08-02 17:23:48',
			'created_by' => 3,
			'deleted' => '2012-08-02 17:23:48',
			'deleted_by' => 3
		),
		array(
			'id' => 4,
			'ref_id' => 'Lorem ipsum dolor ',
			'vendor_id' => 4,
			'company_id' => 4,
			'location_id' => 4,
			'ship_location_id' => 4,
			'purchaser_id' => 4,
			'taxes_group_id' => 4,
			'vendors_accounts_id' => 4,
			'term_id' => 4,
			'reference_number' => 'Lorem ipsum dolor sit amet',
			'vendors_reference_number' => 'Lorem ipsum dolor sit amet',
			'sub_total' => 4,
			'tax_total' => 4,
			'grand_total' => 4,
			'max_eta' => '2012-08-02',
			'min_eta' => '2012-08-02',
			'activant_status' => 'Lorem ipsum dolor sit amet',
			'received' => 1,
			'billed' => 1,
			'paid' => 1,
			'is_transfer' => 4,
			'transfer_co_id' => 'Lorem ipsum',
			'transfer_location_id' => 4,
			'completed' => 1,
			'processed' => '2012-08-02 17:23:48',
			'modified' => '2012-08-02 17:23:48',
			'modified_by' => 4,
			'created' => '2012-08-02 17:23:48',
			'created_by' => 4,
			'deleted' => '2012-08-02 17:23:48',
			'deleted_by' => 4
		),
		array(
			'id' => 5,
			'ref_id' => 'Lorem ipsum dolor ',
			'vendor_id' => 5,
			'company_id' => 5,
			'location_id' => 5,
			'ship_location_id' => 5,
			'purchaser_id' => 5,
			'taxes_group_id' => 5,
			'vendors_accounts_id' => 5,
			'term_id' => 5,
			'reference_number' => 'Lorem ipsum dolor sit amet',
			'vendors_reference_number' => 'Lorem ipsum dolor sit amet',
			'sub_total' => 5,
			'tax_total' => 5,
			'grand_total' => 5,
			'max_eta' => '2012-08-02',
			'min_eta' => '2012-08-02',
			'activant_status' => 'Lorem ipsum dolor sit amet',
			'received' => 1,
			'billed' => 1,
			'paid' => 1,
			'is_transfer' => 5,
			'transfer_co_id' => 'Lorem ipsum',
			'transfer_location_id' => 5,
			'completed' => 1,
			'processed' => '2012-08-02 17:23:48',
			'modified' => '2012-08-02 17:23:48',
			'modified_by' => 5,
			'created' => '2012-08-02 17:23:48',
			'created_by' => 5,
			'deleted' => '2012-08-02 17:23:48',
			'deleted_by' => 5
		),
		array(
			'id' => 6,
			'ref_id' => 'Lorem ipsum dolor ',
			'vendor_id' => 6,
			'company_id' => 6,
			'location_id' => 6,
			'ship_location_id' => 6,
			'purchaser_id' => 6,
			'taxes_group_id' => 6,
			'vendors_accounts_id' => 6,
			'term_id' => 6,
			'reference_number' => 'Lorem ipsum dolor sit amet',
			'vendors_reference_number' => 'Lorem ipsum dolor sit amet',
			'sub_total' => 6,
			'tax_total' => 6,
			'grand_total' => 6,
			'max_eta' => '2012-08-02',
			'min_eta' => '2012-08-02',
			'activant_status' => 'Lorem ipsum dolor sit amet',
			'received' => 1,
			'billed' => 1,
			'paid' => 1,
			'is_transfer' => 6,
			'transfer_co_id' => 'Lorem ipsum',
			'transfer_location_id' => 6,
			'completed' => 1,
			'processed' => '2012-08-02 17:23:48',
			'modified' => '2012-08-02 17:23:48',
			'modified_by' => 6,
			'created' => '2012-08-02 17:23:48',
			'created_by' => 6,
			'deleted' => '2012-08-02 17:23:48',
			'deleted_by' => 6
		),
		array(
			'id' => 7,
			'ref_id' => 'Lorem ipsum dolor ',
			'vendor_id' => 7,
			'company_id' => 7,
			'location_id' => 7,
			'ship_location_id' => 7,
			'purchaser_id' => 7,
			'taxes_group_id' => 7,
			'vendors_accounts_id' => 7,
			'term_id' => 7,
			'reference_number' => 'Lorem ipsum dolor sit amet',
			'vendors_reference_number' => 'Lorem ipsum dolor sit amet',
			'sub_total' => 7,
			'tax_total' => 7,
			'grand_total' => 7,
			'max_eta' => '2012-08-02',
			'min_eta' => '2012-08-02',
			'activant_status' => 'Lorem ipsum dolor sit amet',
			'received' => 1,
			'billed' => 1,
			'paid' => 1,
			'is_transfer' => 7,
			'transfer_co_id' => 'Lorem ipsum',
			'transfer_location_id' => 7,
			'completed' => 1,
			'processed' => '2012-08-02 17:23:48',
			'modified' => '2012-08-02 17:23:48',
			'modified_by' => 7,
			'created' => '2012-08-02 17:23:48',
			'created_by' => 7,
			'deleted' => '2012-08-02 17:23:48',
			'deleted_by' => 7
		),
		array(
			'id' => 8,
			'ref_id' => 'Lorem ipsum dolor ',
			'vendor_id' => 8,
			'company_id' => 8,
			'location_id' => 8,
			'ship_location_id' => 8,
			'purchaser_id' => 8,
			'taxes_group_id' => 8,
			'vendors_accounts_id' => 8,
			'term_id' => 8,
			'reference_number' => 'Lorem ipsum dolor sit amet',
			'vendors_reference_number' => 'Lorem ipsum dolor sit amet',
			'sub_total' => 8,
			'tax_total' => 8,
			'grand_total' => 8,
			'max_eta' => '2012-08-02',
			'min_eta' => '2012-08-02',
			'activant_status' => 'Lorem ipsum dolor sit amet',
			'received' => 1,
			'billed' => 1,
			'paid' => 1,
			'is_transfer' => 8,
			'transfer_co_id' => 'Lorem ipsum',
			'transfer_location_id' => 8,
			'completed' => 1,
			'processed' => '2012-08-02 17:23:48',
			'modified' => '2012-08-02 17:23:48',
			'modified_by' => 8,
			'created' => '2012-08-02 17:23:48',
			'created_by' => 8,
			'deleted' => '2012-08-02 17:23:48',
			'deleted_by' => 8
		),
		array(
			'id' => 9,
			'ref_id' => 'Lorem ipsum dolor ',
			'vendor_id' => 9,
			'company_id' => 9,
			'location_id' => 9,
			'ship_location_id' => 9,
			'purchaser_id' => 9,
			'taxes_group_id' => 9,
			'vendors_accounts_id' => 9,
			'term_id' => 9,
			'reference_number' => 'Lorem ipsum dolor sit amet',
			'vendors_reference_number' => 'Lorem ipsum dolor sit amet',
			'sub_total' => 9,
			'tax_total' => 9,
			'grand_total' => 9,
			'max_eta' => '2012-08-02',
			'min_eta' => '2012-08-02',
			'activant_status' => 'Lorem ipsum dolor sit amet',
			'received' => 1,
			'billed' => 1,
			'paid' => 1,
			'is_transfer' => 9,
			'transfer_co_id' => 'Lorem ipsum',
			'transfer_location_id' => 9,
			'completed' => 1,
			'processed' => '2012-08-02 17:23:48',
			'modified' => '2012-08-02 17:23:48',
			'modified_by' => 9,
			'created' => '2012-08-02 17:23:48',
			'created_by' => 9,
			'deleted' => '2012-08-02 17:23:48',
			'deleted_by' => 9
		),
		array(
			'id' => 10,
			'ref_id' => 'Lorem ipsum dolor ',
			'vendor_id' => 10,
			'company_id' => 10,
			'location_id' => 10,
			'ship_location_id' => 10,
			'purchaser_id' => 10,
			'taxes_group_id' => 10,
			'vendors_accounts_id' => 10,
			'term_id' => 10,
			'reference_number' => 'Lorem ipsum dolor sit amet',
			'vendors_reference_number' => 'Lorem ipsum dolor sit amet',
			'sub_total' => 10,
			'tax_total' => 10,
			'grand_total' => 10,
			'max_eta' => '2012-08-02',
			'min_eta' => '2012-08-02',
			'activant_status' => 'Lorem ipsum dolor sit amet',
			'received' => 1,
			'billed' => 1,
			'paid' => 1,
			'is_transfer' => 10,
			'transfer_co_id' => 'Lorem ipsum',
			'transfer_location_id' => 10,
			'completed' => 1,
			'processed' => '2012-08-02 17:23:48',
			'modified' => '2012-08-02 17:23:48',
			'modified_by' => 10,
			'created' => '2012-08-02 17:23:48',
			'created_by' => 10,
			'deleted' => '2012-08-02 17:23:48',
			'deleted_by' => 10
		),
	);

}
