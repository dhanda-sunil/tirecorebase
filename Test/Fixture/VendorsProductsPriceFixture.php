<?php
/**
 * VendorsProductsPriceFixture
 *
 */
class VendorsProductsPriceFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'vendor_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'index'),
		'product_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'price' => array('type' => 'float', 'null' => true, 'default' => null),
		'lead_time' => array('type' => 'integer', 'null' => true, 'default' => null),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'deleted' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'deleted_by' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'vendor_id' => array('column' => array('vendor_id', 'product_id'), 'unique' => 0)
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
			'product_id' => 1,
			'price' => 1,
			'lead_time' => 1,
			'created' => '2012-08-02 17:27:07',
			'modified' => '2012-08-02 17:27:07',
			'deleted' => '2012-08-02 17:27:07',
			'deleted_by' => 1
		),
		array(
			'id' => 2,
			'vendor_id' => 2,
			'product_id' => 2,
			'price' => 2,
			'lead_time' => 2,
			'created' => '2012-08-02 17:27:07',
			'modified' => '2012-08-02 17:27:07',
			'deleted' => '2012-08-02 17:27:07',
			'deleted_by' => 2
		),
		array(
			'id' => 3,
			'vendor_id' => 3,
			'product_id' => 3,
			'price' => 3,
			'lead_time' => 3,
			'created' => '2012-08-02 17:27:07',
			'modified' => '2012-08-02 17:27:07',
			'deleted' => '2012-08-02 17:27:07',
			'deleted_by' => 3
		),
		array(
			'id' => 4,
			'vendor_id' => 4,
			'product_id' => 4,
			'price' => 4,
			'lead_time' => 4,
			'created' => '2012-08-02 17:27:07',
			'modified' => '2012-08-02 17:27:07',
			'deleted' => '2012-08-02 17:27:07',
			'deleted_by' => 4
		),
		array(
			'id' => 5,
			'vendor_id' => 5,
			'product_id' => 5,
			'price' => 5,
			'lead_time' => 5,
			'created' => '2012-08-02 17:27:07',
			'modified' => '2012-08-02 17:27:07',
			'deleted' => '2012-08-02 17:27:07',
			'deleted_by' => 5
		),
		array(
			'id' => 6,
			'vendor_id' => 6,
			'product_id' => 6,
			'price' => 6,
			'lead_time' => 6,
			'created' => '2012-08-02 17:27:07',
			'modified' => '2012-08-02 17:27:07',
			'deleted' => '2012-08-02 17:27:07',
			'deleted_by' => 6
		),
		array(
			'id' => 7,
			'vendor_id' => 7,
			'product_id' => 7,
			'price' => 7,
			'lead_time' => 7,
			'created' => '2012-08-02 17:27:07',
			'modified' => '2012-08-02 17:27:07',
			'deleted' => '2012-08-02 17:27:07',
			'deleted_by' => 7
		),
		array(
			'id' => 8,
			'vendor_id' => 8,
			'product_id' => 8,
			'price' => 8,
			'lead_time' => 8,
			'created' => '2012-08-02 17:27:07',
			'modified' => '2012-08-02 17:27:07',
			'deleted' => '2012-08-02 17:27:07',
			'deleted_by' => 8
		),
		array(
			'id' => 9,
			'vendor_id' => 9,
			'product_id' => 9,
			'price' => 9,
			'lead_time' => 9,
			'created' => '2012-08-02 17:27:07',
			'modified' => '2012-08-02 17:27:07',
			'deleted' => '2012-08-02 17:27:07',
			'deleted_by' => 9
		),
		array(
			'id' => 10,
			'vendor_id' => 10,
			'product_id' => 10,
			'price' => 10,
			'lead_time' => 10,
			'created' => '2012-08-02 17:27:07',
			'modified' => '2012-08-02 17:27:07',
			'deleted' => '2012-08-02 17:27:07',
			'deleted_by' => 10
		),
	);

}
