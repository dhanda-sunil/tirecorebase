<?php
/**
 * CustomerDeclinedCoItemFixture
 *
 */
class CustomerDeclinedCoItemFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'customer_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'co_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 13, 'key' => 'index'),
		'line_item_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'index'),
		'vehicle_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'quantity' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => '9,4'),
		'unit_price' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => '9,4'),
		'name' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'active' => array('type' => 'boolean', 'null' => false, 'default' => '1'),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified_by' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 8),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null, 'key' => 'index'),
		'created_by' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 8),
		'deleted' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'deleted_by' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 8),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'co_id' => array('column' => 'co_id', 'unique' => 0),
			'line_item_id' => array('column' => 'line_item_id', 'unique' => 0),
			'created' => array('column' => 'created', 'unique' => 0)
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
			'customer_id' => 1,
			'co_id' => 1,
			'line_item_id' => 1,
			'vehicle_id' => 1,
			'quantity' => 1,
			'unit_price' => 1,
			'name' => 'Lorem ipsum dolor sit amet',
			'active' => 1,
			'modified' => '2012-08-02 17:20:32',
			'modified_by' => 1,
			'created' => '2012-08-02 17:20:32',
			'created_by' => 1,
			'deleted' => '2012-08-02 17:20:32',
			'deleted_by' => 1
		),
		array(
			'id' => 2,
			'customer_id' => 2,
			'co_id' => 2,
			'line_item_id' => 2,
			'vehicle_id' => 2,
			'quantity' => 2,
			'unit_price' => 2,
			'name' => 'Lorem ipsum dolor sit amet',
			'active' => 1,
			'modified' => '2012-08-02 17:20:32',
			'modified_by' => 2,
			'created' => '2012-08-02 17:20:32',
			'created_by' => 2,
			'deleted' => '2012-08-02 17:20:32',
			'deleted_by' => 2
		),
		array(
			'id' => 3,
			'customer_id' => 3,
			'co_id' => 3,
			'line_item_id' => 3,
			'vehicle_id' => 3,
			'quantity' => 3,
			'unit_price' => 3,
			'name' => 'Lorem ipsum dolor sit amet',
			'active' => 1,
			'modified' => '2012-08-02 17:20:32',
			'modified_by' => 3,
			'created' => '2012-08-02 17:20:32',
			'created_by' => 3,
			'deleted' => '2012-08-02 17:20:32',
			'deleted_by' => 3
		),
		array(
			'id' => 4,
			'customer_id' => 4,
			'co_id' => 4,
			'line_item_id' => 4,
			'vehicle_id' => 4,
			'quantity' => 4,
			'unit_price' => 4,
			'name' => 'Lorem ipsum dolor sit amet',
			'active' => 1,
			'modified' => '2012-08-02 17:20:32',
			'modified_by' => 4,
			'created' => '2012-08-02 17:20:32',
			'created_by' => 4,
			'deleted' => '2012-08-02 17:20:32',
			'deleted_by' => 4
		),
		array(
			'id' => 5,
			'customer_id' => 5,
			'co_id' => 5,
			'line_item_id' => 5,
			'vehicle_id' => 5,
			'quantity' => 5,
			'unit_price' => 5,
			'name' => 'Lorem ipsum dolor sit amet',
			'active' => 1,
			'modified' => '2012-08-02 17:20:32',
			'modified_by' => 5,
			'created' => '2012-08-02 17:20:32',
			'created_by' => 5,
			'deleted' => '2012-08-02 17:20:32',
			'deleted_by' => 5
		),
		array(
			'id' => 6,
			'customer_id' => 6,
			'co_id' => 6,
			'line_item_id' => 6,
			'vehicle_id' => 6,
			'quantity' => 6,
			'unit_price' => 6,
			'name' => 'Lorem ipsum dolor sit amet',
			'active' => 1,
			'modified' => '2012-08-02 17:20:32',
			'modified_by' => 6,
			'created' => '2012-08-02 17:20:32',
			'created_by' => 6,
			'deleted' => '2012-08-02 17:20:32',
			'deleted_by' => 6
		),
		array(
			'id' => 7,
			'customer_id' => 7,
			'co_id' => 7,
			'line_item_id' => 7,
			'vehicle_id' => 7,
			'quantity' => 7,
			'unit_price' => 7,
			'name' => 'Lorem ipsum dolor sit amet',
			'active' => 1,
			'modified' => '2012-08-02 17:20:32',
			'modified_by' => 7,
			'created' => '2012-08-02 17:20:32',
			'created_by' => 7,
			'deleted' => '2012-08-02 17:20:32',
			'deleted_by' => 7
		),
		array(
			'id' => 8,
			'customer_id' => 8,
			'co_id' => 8,
			'line_item_id' => 8,
			'vehicle_id' => 8,
			'quantity' => 8,
			'unit_price' => 8,
			'name' => 'Lorem ipsum dolor sit amet',
			'active' => 1,
			'modified' => '2012-08-02 17:20:32',
			'modified_by' => 8,
			'created' => '2012-08-02 17:20:32',
			'created_by' => 8,
			'deleted' => '2012-08-02 17:20:32',
			'deleted_by' => 8
		),
		array(
			'id' => 9,
			'customer_id' => 9,
			'co_id' => 9,
			'line_item_id' => 9,
			'vehicle_id' => 9,
			'quantity' => 9,
			'unit_price' => 9,
			'name' => 'Lorem ipsum dolor sit amet',
			'active' => 1,
			'modified' => '2012-08-02 17:20:32',
			'modified_by' => 9,
			'created' => '2012-08-02 17:20:32',
			'created_by' => 9,
			'deleted' => '2012-08-02 17:20:32',
			'deleted_by' => 9
		),
		array(
			'id' => 10,
			'customer_id' => 10,
			'co_id' => 10,
			'line_item_id' => 10,
			'vehicle_id' => 10,
			'quantity' => 10,
			'unit_price' => 10,
			'name' => 'Lorem ipsum dolor sit amet',
			'active' => 1,
			'modified' => '2012-08-02 17:20:32',
			'modified_by' => 10,
			'created' => '2012-08-02 17:20:32',
			'created_by' => 10,
			'deleted' => '2012-08-02 17:20:32',
			'deleted_by' => 10
		),
	);

}
