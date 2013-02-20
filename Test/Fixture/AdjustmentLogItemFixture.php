<?php
/**
 * AdjustmentLogItemFixture
 *
 */
class AdjustmentLogItemFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'adjustment_log_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'product_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'name' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'quantity' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 8),
		'part_number' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 50, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'upc' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 50, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'price' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => '8,2'),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
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
			'adjustment_log_id' => 1,
			'product_id' => 1,
			'name' => 'Lorem ipsum dolor sit amet',
			'quantity' => 1,
			'part_number' => 'Lorem ipsum dolor sit amet',
			'upc' => 'Lorem ipsum dolor sit amet',
			'price' => 1,
			'created' => '2012-08-02 17:19:04'
		),
		array(
			'id' => 2,
			'adjustment_log_id' => 2,
			'product_id' => 2,
			'name' => 'Lorem ipsum dolor sit amet',
			'quantity' => 2,
			'part_number' => 'Lorem ipsum dolor sit amet',
			'upc' => 'Lorem ipsum dolor sit amet',
			'price' => 2,
			'created' => '2012-08-02 17:19:04'
		),
		array(
			'id' => 3,
			'adjustment_log_id' => 3,
			'product_id' => 3,
			'name' => 'Lorem ipsum dolor sit amet',
			'quantity' => 3,
			'part_number' => 'Lorem ipsum dolor sit amet',
			'upc' => 'Lorem ipsum dolor sit amet',
			'price' => 3,
			'created' => '2012-08-02 17:19:04'
		),
		array(
			'id' => 4,
			'adjustment_log_id' => 4,
			'product_id' => 4,
			'name' => 'Lorem ipsum dolor sit amet',
			'quantity' => 4,
			'part_number' => 'Lorem ipsum dolor sit amet',
			'upc' => 'Lorem ipsum dolor sit amet',
			'price' => 4,
			'created' => '2012-08-02 17:19:04'
		),
		array(
			'id' => 5,
			'adjustment_log_id' => 5,
			'product_id' => 5,
			'name' => 'Lorem ipsum dolor sit amet',
			'quantity' => 5,
			'part_number' => 'Lorem ipsum dolor sit amet',
			'upc' => 'Lorem ipsum dolor sit amet',
			'price' => 5,
			'created' => '2012-08-02 17:19:04'
		),
		array(
			'id' => 6,
			'adjustment_log_id' => 6,
			'product_id' => 6,
			'name' => 'Lorem ipsum dolor sit amet',
			'quantity' => 6,
			'part_number' => 'Lorem ipsum dolor sit amet',
			'upc' => 'Lorem ipsum dolor sit amet',
			'price' => 6,
			'created' => '2012-08-02 17:19:04'
		),
		array(
			'id' => 7,
			'adjustment_log_id' => 7,
			'product_id' => 7,
			'name' => 'Lorem ipsum dolor sit amet',
			'quantity' => 7,
			'part_number' => 'Lorem ipsum dolor sit amet',
			'upc' => 'Lorem ipsum dolor sit amet',
			'price' => 7,
			'created' => '2012-08-02 17:19:04'
		),
		array(
			'id' => 8,
			'adjustment_log_id' => 8,
			'product_id' => 8,
			'name' => 'Lorem ipsum dolor sit amet',
			'quantity' => 8,
			'part_number' => 'Lorem ipsum dolor sit amet',
			'upc' => 'Lorem ipsum dolor sit amet',
			'price' => 8,
			'created' => '2012-08-02 17:19:04'
		),
		array(
			'id' => 9,
			'adjustment_log_id' => 9,
			'product_id' => 9,
			'name' => 'Lorem ipsum dolor sit amet',
			'quantity' => 9,
			'part_number' => 'Lorem ipsum dolor sit amet',
			'upc' => 'Lorem ipsum dolor sit amet',
			'price' => 9,
			'created' => '2012-08-02 17:19:04'
		),
		array(
			'id' => 10,
			'adjustment_log_id' => 10,
			'product_id' => 10,
			'name' => 'Lorem ipsum dolor sit amet',
			'quantity' => 10,
			'part_number' => 'Lorem ipsum dolor sit amet',
			'upc' => 'Lorem ipsum dolor sit amet',
			'price' => 10,
			'created' => '2012-08-02 17:19:04'
		),
	);

}
