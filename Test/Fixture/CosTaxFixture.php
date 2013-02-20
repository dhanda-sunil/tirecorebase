<?php
/**
 * CosTaxFixture
 *
 */
class CosTaxFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'co_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'tax_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'index'),
		'tax_item_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'inactive' => array('type' => 'boolean', 'null' => false, 'default' => null),
		'exempt_by' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'index'),
		'overwritten_by' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'index'),
		'tax_name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 127, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'tax_item_name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 127, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'price' => array('type' => 'float', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'exempt_by' => array('column' => 'exempt_by', 'unique' => 0),
			'overwritten_by' => array('column' => 'overwritten_by', 'unique' => 0),
			'tax_id' => array('column' => 'tax_id', 'unique' => 0)
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
			'co_id' => 1,
			'tax_id' => 1,
			'tax_item_id' => 1,
			'inactive' => 1,
			'exempt_by' => 1,
			'overwritten_by' => 1,
			'tax_name' => 'Lorem ipsum dolor sit amet',
			'tax_item_name' => 'Lorem ipsum dolor sit amet',
			'price' => 1
		),
		array(
			'id' => 2,
			'co_id' => 2,
			'tax_id' => 2,
			'tax_item_id' => 2,
			'inactive' => 1,
			'exempt_by' => 2,
			'overwritten_by' => 2,
			'tax_name' => 'Lorem ipsum dolor sit amet',
			'tax_item_name' => 'Lorem ipsum dolor sit amet',
			'price' => 2
		),
		array(
			'id' => 3,
			'co_id' => 3,
			'tax_id' => 3,
			'tax_item_id' => 3,
			'inactive' => 1,
			'exempt_by' => 3,
			'overwritten_by' => 3,
			'tax_name' => 'Lorem ipsum dolor sit amet',
			'tax_item_name' => 'Lorem ipsum dolor sit amet',
			'price' => 3
		),
		array(
			'id' => 4,
			'co_id' => 4,
			'tax_id' => 4,
			'tax_item_id' => 4,
			'inactive' => 1,
			'exempt_by' => 4,
			'overwritten_by' => 4,
			'tax_name' => 'Lorem ipsum dolor sit amet',
			'tax_item_name' => 'Lorem ipsum dolor sit amet',
			'price' => 4
		),
		array(
			'id' => 5,
			'co_id' => 5,
			'tax_id' => 5,
			'tax_item_id' => 5,
			'inactive' => 1,
			'exempt_by' => 5,
			'overwritten_by' => 5,
			'tax_name' => 'Lorem ipsum dolor sit amet',
			'tax_item_name' => 'Lorem ipsum dolor sit amet',
			'price' => 5
		),
		array(
			'id' => 6,
			'co_id' => 6,
			'tax_id' => 6,
			'tax_item_id' => 6,
			'inactive' => 1,
			'exempt_by' => 6,
			'overwritten_by' => 6,
			'tax_name' => 'Lorem ipsum dolor sit amet',
			'tax_item_name' => 'Lorem ipsum dolor sit amet',
			'price' => 6
		),
		array(
			'id' => 7,
			'co_id' => 7,
			'tax_id' => 7,
			'tax_item_id' => 7,
			'inactive' => 1,
			'exempt_by' => 7,
			'overwritten_by' => 7,
			'tax_name' => 'Lorem ipsum dolor sit amet',
			'tax_item_name' => 'Lorem ipsum dolor sit amet',
			'price' => 7
		),
		array(
			'id' => 8,
			'co_id' => 8,
			'tax_id' => 8,
			'tax_item_id' => 8,
			'inactive' => 1,
			'exempt_by' => 8,
			'overwritten_by' => 8,
			'tax_name' => 'Lorem ipsum dolor sit amet',
			'tax_item_name' => 'Lorem ipsum dolor sit amet',
			'price' => 8
		),
		array(
			'id' => 9,
			'co_id' => 9,
			'tax_id' => 9,
			'tax_item_id' => 9,
			'inactive' => 1,
			'exempt_by' => 9,
			'overwritten_by' => 9,
			'tax_name' => 'Lorem ipsum dolor sit amet',
			'tax_item_name' => 'Lorem ipsum dolor sit amet',
			'price' => 9
		),
		array(
			'id' => 10,
			'co_id' => 10,
			'tax_id' => 10,
			'tax_item_id' => 10,
			'inactive' => 1,
			'exempt_by' => 10,
			'overwritten_by' => 10,
			'tax_name' => 'Lorem ipsum dolor sit amet',
			'tax_item_name' => 'Lorem ipsum dolor sit amet',
			'price' => 10
		),
	);

}
