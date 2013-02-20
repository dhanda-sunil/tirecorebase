<?php
/**
 * ReceiveSessionFixture
 *
 */
class ReceiveSessionFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'vendor_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 5),
		'location_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 2),
		'scan_count' => array('type' => 'float', 'null' => false, 'default' => '0.000', 'length' => '10,3'),
		'product_count' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => '10,3'),
		'received' => array('type' => 'boolean', 'null' => false, 'default' => '0', 'key' => 'index'),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'created_by' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 5, 'key' => 'index'),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified_by' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 5),
		'deleted' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'deleted_by' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 5),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'created_by' => array('column' => 'created_by', 'unique' => 0),
			'received' => array('column' => 'received', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'MyISAM')
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
			'location_id' => 1,
			'scan_count' => 1,
			'product_count' => 1,
			'received' => 1,
			'created' => '2012-08-02 17:24:57',
			'created_by' => 1,
			'modified' => '2012-08-02 17:24:57',
			'modified_by' => 1,
			'deleted' => '2012-08-02 17:24:57',
			'deleted_by' => 1
		),
		array(
			'id' => 2,
			'vendor_id' => 2,
			'location_id' => 2,
			'scan_count' => 2,
			'product_count' => 2,
			'received' => 1,
			'created' => '2012-08-02 17:24:57',
			'created_by' => 2,
			'modified' => '2012-08-02 17:24:57',
			'modified_by' => 2,
			'deleted' => '2012-08-02 17:24:57',
			'deleted_by' => 2
		),
		array(
			'id' => 3,
			'vendor_id' => 3,
			'location_id' => 3,
			'scan_count' => 3,
			'product_count' => 3,
			'received' => 1,
			'created' => '2012-08-02 17:24:57',
			'created_by' => 3,
			'modified' => '2012-08-02 17:24:57',
			'modified_by' => 3,
			'deleted' => '2012-08-02 17:24:57',
			'deleted_by' => 3
		),
		array(
			'id' => 4,
			'vendor_id' => 4,
			'location_id' => 4,
			'scan_count' => 4,
			'product_count' => 4,
			'received' => 1,
			'created' => '2012-08-02 17:24:57',
			'created_by' => 4,
			'modified' => '2012-08-02 17:24:57',
			'modified_by' => 4,
			'deleted' => '2012-08-02 17:24:57',
			'deleted_by' => 4
		),
		array(
			'id' => 5,
			'vendor_id' => 5,
			'location_id' => 5,
			'scan_count' => 5,
			'product_count' => 5,
			'received' => 1,
			'created' => '2012-08-02 17:24:57',
			'created_by' => 5,
			'modified' => '2012-08-02 17:24:57',
			'modified_by' => 5,
			'deleted' => '2012-08-02 17:24:57',
			'deleted_by' => 5
		),
		array(
			'id' => 6,
			'vendor_id' => 6,
			'location_id' => 6,
			'scan_count' => 6,
			'product_count' => 6,
			'received' => 1,
			'created' => '2012-08-02 17:24:57',
			'created_by' => 6,
			'modified' => '2012-08-02 17:24:57',
			'modified_by' => 6,
			'deleted' => '2012-08-02 17:24:57',
			'deleted_by' => 6
		),
		array(
			'id' => 7,
			'vendor_id' => 7,
			'location_id' => 7,
			'scan_count' => 7,
			'product_count' => 7,
			'received' => 1,
			'created' => '2012-08-02 17:24:57',
			'created_by' => 7,
			'modified' => '2012-08-02 17:24:57',
			'modified_by' => 7,
			'deleted' => '2012-08-02 17:24:57',
			'deleted_by' => 7
		),
		array(
			'id' => 8,
			'vendor_id' => 8,
			'location_id' => 8,
			'scan_count' => 8,
			'product_count' => 8,
			'received' => 1,
			'created' => '2012-08-02 17:24:57',
			'created_by' => 8,
			'modified' => '2012-08-02 17:24:57',
			'modified_by' => 8,
			'deleted' => '2012-08-02 17:24:57',
			'deleted_by' => 8
		),
		array(
			'id' => 9,
			'vendor_id' => 9,
			'location_id' => 9,
			'scan_count' => 9,
			'product_count' => 9,
			'received' => 1,
			'created' => '2012-08-02 17:24:57',
			'created_by' => 9,
			'modified' => '2012-08-02 17:24:57',
			'modified_by' => 9,
			'deleted' => '2012-08-02 17:24:57',
			'deleted_by' => 9
		),
		array(
			'id' => 10,
			'vendor_id' => 10,
			'location_id' => 10,
			'scan_count' => 10,
			'product_count' => 10,
			'received' => 1,
			'created' => '2012-08-02 17:24:57',
			'created_by' => 10,
			'modified' => '2012-08-02 17:24:57',
			'modified_by' => 10,
			'deleted' => '2012-08-02 17:24:57',
			'deleted_by' => 10
		),
	);

}
