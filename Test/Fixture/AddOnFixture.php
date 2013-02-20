<?php
/**
 * AddOnFixture
 *
 */
class AddOnFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'ref_table' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 20, 'key' => 'primary', 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'ref_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'line_item_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'name' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'autoadd' => array('type' => 'boolean', 'null' => false, 'default' => null),
		'quantity' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 5),
		'priority' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 2),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'created_by' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'indexes' => array(
			'PRIMARY' => array('column' => array('ref_table', 'ref_id', 'line_item_id'), 'unique' => 1)
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
			'ref_table' => 'Lorem ipsum dolor ',
			'ref_id' => 1,
			'line_item_id' => 1,
			'name' => 'Lorem ipsum dolor sit amet',
			'autoadd' => 1,
			'quantity' => 1,
			'priority' => 1,
			'created' => '2012-08-02 17:18:57',
			'created_by' => 1
		),
		array(
			'ref_table' => 'Lorem ipsum dolor ',
			'ref_id' => 2,
			'line_item_id' => 2,
			'name' => 'Lorem ipsum dolor sit amet',
			'autoadd' => 1,
			'quantity' => 2,
			'priority' => 2,
			'created' => '2012-08-02 17:18:57',
			'created_by' => 2
		),
		array(
			'ref_table' => 'Lorem ipsum dolor ',
			'ref_id' => 3,
			'line_item_id' => 3,
			'name' => 'Lorem ipsum dolor sit amet',
			'autoadd' => 1,
			'quantity' => 3,
			'priority' => 3,
			'created' => '2012-08-02 17:18:57',
			'created_by' => 3
		),
		array(
			'ref_table' => 'Lorem ipsum dolor ',
			'ref_id' => 4,
			'line_item_id' => 4,
			'name' => 'Lorem ipsum dolor sit amet',
			'autoadd' => 1,
			'quantity' => 4,
			'priority' => 4,
			'created' => '2012-08-02 17:18:57',
			'created_by' => 4
		),
		array(
			'ref_table' => 'Lorem ipsum dolor ',
			'ref_id' => 5,
			'line_item_id' => 5,
			'name' => 'Lorem ipsum dolor sit amet',
			'autoadd' => 1,
			'quantity' => 5,
			'priority' => 5,
			'created' => '2012-08-02 17:18:57',
			'created_by' => 5
		),
		array(
			'ref_table' => 'Lorem ipsum dolor ',
			'ref_id' => 6,
			'line_item_id' => 6,
			'name' => 'Lorem ipsum dolor sit amet',
			'autoadd' => 1,
			'quantity' => 6,
			'priority' => 6,
			'created' => '2012-08-02 17:18:57',
			'created_by' => 6
		),
		array(
			'ref_table' => 'Lorem ipsum dolor ',
			'ref_id' => 7,
			'line_item_id' => 7,
			'name' => 'Lorem ipsum dolor sit amet',
			'autoadd' => 1,
			'quantity' => 7,
			'priority' => 7,
			'created' => '2012-08-02 17:18:57',
			'created_by' => 7
		),
		array(
			'ref_table' => 'Lorem ipsum dolor ',
			'ref_id' => 8,
			'line_item_id' => 8,
			'name' => 'Lorem ipsum dolor sit amet',
			'autoadd' => 1,
			'quantity' => 8,
			'priority' => 8,
			'created' => '2012-08-02 17:18:57',
			'created_by' => 8
		),
		array(
			'ref_table' => 'Lorem ipsum dolor ',
			'ref_id' => 9,
			'line_item_id' => 9,
			'name' => 'Lorem ipsum dolor sit amet',
			'autoadd' => 1,
			'quantity' => 9,
			'priority' => 9,
			'created' => '2012-08-02 17:18:57',
			'created_by' => 9
		),
		array(
			'ref_table' => 'Lorem ipsum dolor ',
			'ref_id' => 10,
			'line_item_id' => 10,
			'name' => 'Lorem ipsum dolor sit amet',
			'autoadd' => 1,
			'quantity' => 10,
			'priority' => 10,
			'created' => '2012-08-02 17:18:57',
			'created_by' => 10
		),
	);

}
