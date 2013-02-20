<?php
/**
 * PickSlipItemFixture
 *
 */
class PickSlipItemFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'co_item_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'work_order_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'product_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 7),
		'quantity_expected' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => '9,4'),
		'quantity' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => '9,4'),
		'weight' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => '8,3'),
		'scanned' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'scanned_by' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'entry_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
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
			'product_id' => 1,
			'quantity_expected' => 1,
			'quantity' => 1,
			'weight' => 1,
			'scanned' => '2012-08-02 17:23:28',
			'scanned_by' => 1,
			'entry_id' => 1,
			'created' => '2012-08-02 17:23:28',
			'modified' => '2012-08-02 17:23:28'
		),
		array(
			'id' => 2,
			'co_item_id' => 2,
			'work_order_id' => 2,
			'product_id' => 2,
			'quantity_expected' => 2,
			'quantity' => 2,
			'weight' => 2,
			'scanned' => '2012-08-02 17:23:28',
			'scanned_by' => 2,
			'entry_id' => 2,
			'created' => '2012-08-02 17:23:28',
			'modified' => '2012-08-02 17:23:28'
		),
		array(
			'id' => 3,
			'co_item_id' => 3,
			'work_order_id' => 3,
			'product_id' => 3,
			'quantity_expected' => 3,
			'quantity' => 3,
			'weight' => 3,
			'scanned' => '2012-08-02 17:23:28',
			'scanned_by' => 3,
			'entry_id' => 3,
			'created' => '2012-08-02 17:23:28',
			'modified' => '2012-08-02 17:23:28'
		),
		array(
			'id' => 4,
			'co_item_id' => 4,
			'work_order_id' => 4,
			'product_id' => 4,
			'quantity_expected' => 4,
			'quantity' => 4,
			'weight' => 4,
			'scanned' => '2012-08-02 17:23:28',
			'scanned_by' => 4,
			'entry_id' => 4,
			'created' => '2012-08-02 17:23:28',
			'modified' => '2012-08-02 17:23:28'
		),
		array(
			'id' => 5,
			'co_item_id' => 5,
			'work_order_id' => 5,
			'product_id' => 5,
			'quantity_expected' => 5,
			'quantity' => 5,
			'weight' => 5,
			'scanned' => '2012-08-02 17:23:28',
			'scanned_by' => 5,
			'entry_id' => 5,
			'created' => '2012-08-02 17:23:28',
			'modified' => '2012-08-02 17:23:28'
		),
		array(
			'id' => 6,
			'co_item_id' => 6,
			'work_order_id' => 6,
			'product_id' => 6,
			'quantity_expected' => 6,
			'quantity' => 6,
			'weight' => 6,
			'scanned' => '2012-08-02 17:23:28',
			'scanned_by' => 6,
			'entry_id' => 6,
			'created' => '2012-08-02 17:23:28',
			'modified' => '2012-08-02 17:23:28'
		),
		array(
			'id' => 7,
			'co_item_id' => 7,
			'work_order_id' => 7,
			'product_id' => 7,
			'quantity_expected' => 7,
			'quantity' => 7,
			'weight' => 7,
			'scanned' => '2012-08-02 17:23:28',
			'scanned_by' => 7,
			'entry_id' => 7,
			'created' => '2012-08-02 17:23:28',
			'modified' => '2012-08-02 17:23:28'
		),
		array(
			'id' => 8,
			'co_item_id' => 8,
			'work_order_id' => 8,
			'product_id' => 8,
			'quantity_expected' => 8,
			'quantity' => 8,
			'weight' => 8,
			'scanned' => '2012-08-02 17:23:28',
			'scanned_by' => 8,
			'entry_id' => 8,
			'created' => '2012-08-02 17:23:28',
			'modified' => '2012-08-02 17:23:28'
		),
		array(
			'id' => 9,
			'co_item_id' => 9,
			'work_order_id' => 9,
			'product_id' => 9,
			'quantity_expected' => 9,
			'quantity' => 9,
			'weight' => 9,
			'scanned' => '2012-08-02 17:23:28',
			'scanned_by' => 9,
			'entry_id' => 9,
			'created' => '2012-08-02 17:23:28',
			'modified' => '2012-08-02 17:23:28'
		),
		array(
			'id' => 10,
			'co_item_id' => 10,
			'work_order_id' => 10,
			'product_id' => 10,
			'quantity_expected' => 10,
			'quantity' => 10,
			'weight' => 10,
			'scanned' => '2012-08-02 17:23:28',
			'scanned_by' => 10,
			'entry_id' => 10,
			'created' => '2012-08-02 17:23:28',
			'modified' => '2012-08-02 17:23:28'
		),
	);

}
