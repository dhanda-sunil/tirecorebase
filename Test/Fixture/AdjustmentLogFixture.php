<?php
/**
 * AdjustmentLogFixture
 *
 */
class AdjustmentLogFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'company_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'location_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'product_count' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 8),
		'scan_count' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 8),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'created_by' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'deleted' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'deleted_by' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
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
			'company_id' => 1,
			'location_id' => 1,
			'product_count' => 1,
			'scan_count' => 1,
			'created' => '2012-08-02 17:19:06',
			'created_by' => 1,
			'deleted' => '2012-08-02 17:19:06',
			'deleted_by' => 1
		),
		array(
			'id' => 2,
			'company_id' => 2,
			'location_id' => 2,
			'product_count' => 2,
			'scan_count' => 2,
			'created' => '2012-08-02 17:19:06',
			'created_by' => 2,
			'deleted' => '2012-08-02 17:19:06',
			'deleted_by' => 2
		),
		array(
			'id' => 3,
			'company_id' => 3,
			'location_id' => 3,
			'product_count' => 3,
			'scan_count' => 3,
			'created' => '2012-08-02 17:19:06',
			'created_by' => 3,
			'deleted' => '2012-08-02 17:19:06',
			'deleted_by' => 3
		),
		array(
			'id' => 4,
			'company_id' => 4,
			'location_id' => 4,
			'product_count' => 4,
			'scan_count' => 4,
			'created' => '2012-08-02 17:19:06',
			'created_by' => 4,
			'deleted' => '2012-08-02 17:19:06',
			'deleted_by' => 4
		),
		array(
			'id' => 5,
			'company_id' => 5,
			'location_id' => 5,
			'product_count' => 5,
			'scan_count' => 5,
			'created' => '2012-08-02 17:19:06',
			'created_by' => 5,
			'deleted' => '2012-08-02 17:19:06',
			'deleted_by' => 5
		),
		array(
			'id' => 6,
			'company_id' => 6,
			'location_id' => 6,
			'product_count' => 6,
			'scan_count' => 6,
			'created' => '2012-08-02 17:19:06',
			'created_by' => 6,
			'deleted' => '2012-08-02 17:19:06',
			'deleted_by' => 6
		),
		array(
			'id' => 7,
			'company_id' => 7,
			'location_id' => 7,
			'product_count' => 7,
			'scan_count' => 7,
			'created' => '2012-08-02 17:19:06',
			'created_by' => 7,
			'deleted' => '2012-08-02 17:19:06',
			'deleted_by' => 7
		),
		array(
			'id' => 8,
			'company_id' => 8,
			'location_id' => 8,
			'product_count' => 8,
			'scan_count' => 8,
			'created' => '2012-08-02 17:19:06',
			'created_by' => 8,
			'deleted' => '2012-08-02 17:19:06',
			'deleted_by' => 8
		),
		array(
			'id' => 9,
			'company_id' => 9,
			'location_id' => 9,
			'product_count' => 9,
			'scan_count' => 9,
			'created' => '2012-08-02 17:19:06',
			'created_by' => 9,
			'deleted' => '2012-08-02 17:19:06',
			'deleted_by' => 9
		),
		array(
			'id' => 10,
			'company_id' => 10,
			'location_id' => 10,
			'product_count' => 10,
			'scan_count' => 10,
			'created' => '2012-08-02 17:19:06',
			'created_by' => 10,
			'deleted' => '2012-08-02 17:19:06',
			'deleted_by' => 10
		),
	);

}
