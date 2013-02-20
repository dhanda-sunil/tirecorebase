<?php
/**
 * ServiceSlipItemFixture
 *
 */
class ServiceSlipItemFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'co_item_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'work_order_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'service_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'quantity_expected' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => '9,4'),
		'quantity' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => '9,4'),
		'scanned' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'scanned_by' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
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
			'co_item_id' => 1,
			'work_order_id' => 1,
			'service_id' => 1,
			'quantity_expected' => 1,
			'quantity' => 1,
			'scanned' => '2012-08-02 17:25:08',
			'scanned_by' => 1
		),
		array(
			'id' => 2,
			'co_item_id' => 2,
			'work_order_id' => 2,
			'service_id' => 2,
			'quantity_expected' => 2,
			'quantity' => 2,
			'scanned' => '2012-08-02 17:25:08',
			'scanned_by' => 2
		),
		array(
			'id' => 3,
			'co_item_id' => 3,
			'work_order_id' => 3,
			'service_id' => 3,
			'quantity_expected' => 3,
			'quantity' => 3,
			'scanned' => '2012-08-02 17:25:08',
			'scanned_by' => 3
		),
		array(
			'id' => 4,
			'co_item_id' => 4,
			'work_order_id' => 4,
			'service_id' => 4,
			'quantity_expected' => 4,
			'quantity' => 4,
			'scanned' => '2012-08-02 17:25:08',
			'scanned_by' => 4
		),
		array(
			'id' => 5,
			'co_item_id' => 5,
			'work_order_id' => 5,
			'service_id' => 5,
			'quantity_expected' => 5,
			'quantity' => 5,
			'scanned' => '2012-08-02 17:25:08',
			'scanned_by' => 5
		),
		array(
			'id' => 6,
			'co_item_id' => 6,
			'work_order_id' => 6,
			'service_id' => 6,
			'quantity_expected' => 6,
			'quantity' => 6,
			'scanned' => '2012-08-02 17:25:08',
			'scanned_by' => 6
		),
		array(
			'id' => 7,
			'co_item_id' => 7,
			'work_order_id' => 7,
			'service_id' => 7,
			'quantity_expected' => 7,
			'quantity' => 7,
			'scanned' => '2012-08-02 17:25:08',
			'scanned_by' => 7
		),
		array(
			'id' => 8,
			'co_item_id' => 8,
			'work_order_id' => 8,
			'service_id' => 8,
			'quantity_expected' => 8,
			'quantity' => 8,
			'scanned' => '2012-08-02 17:25:08',
			'scanned_by' => 8
		),
		array(
			'id' => 9,
			'co_item_id' => 9,
			'work_order_id' => 9,
			'service_id' => 9,
			'quantity_expected' => 9,
			'quantity' => 9,
			'scanned' => '2012-08-02 17:25:08',
			'scanned_by' => 9
		),
		array(
			'id' => 10,
			'co_item_id' => 10,
			'work_order_id' => 10,
			'service_id' => 10,
			'quantity_expected' => 10,
			'quantity' => 10,
			'scanned' => '2012-08-02 17:25:08',
			'scanned_by' => 10
		),
	);

}
