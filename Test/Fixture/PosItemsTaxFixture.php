<?php
/**
 * PosItemsTaxFixture
 *
 */
class PosItemsTaxFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'pos_items_id' => array('type' => 'integer', 'null' => true, 'default' => null),
		'tax_id' => array('type' => 'float', 'null' => false, 'default' => null),
		'price' => array('type' => 'float', 'null' => false, 'default' => null),
		'tax_name' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'itemized' => array('type' => 'boolean', 'null' => false, 'default' => '0'),
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
			'pos_items_id' => 1,
			'tax_id' => 1,
			'price' => 1,
			'tax_name' => 'Lorem ipsum dolor sit amet',
			'itemized' => 1
		),
		array(
			'id' => 2,
			'pos_items_id' => 2,
			'tax_id' => 2,
			'price' => 2,
			'tax_name' => 'Lorem ipsum dolor sit amet',
			'itemized' => 1
		),
		array(
			'id' => 3,
			'pos_items_id' => 3,
			'tax_id' => 3,
			'price' => 3,
			'tax_name' => 'Lorem ipsum dolor sit amet',
			'itemized' => 1
		),
		array(
			'id' => 4,
			'pos_items_id' => 4,
			'tax_id' => 4,
			'price' => 4,
			'tax_name' => 'Lorem ipsum dolor sit amet',
			'itemized' => 1
		),
		array(
			'id' => 5,
			'pos_items_id' => 5,
			'tax_id' => 5,
			'price' => 5,
			'tax_name' => 'Lorem ipsum dolor sit amet',
			'itemized' => 1
		),
		array(
			'id' => 6,
			'pos_items_id' => 6,
			'tax_id' => 6,
			'price' => 6,
			'tax_name' => 'Lorem ipsum dolor sit amet',
			'itemized' => 1
		),
		array(
			'id' => 7,
			'pos_items_id' => 7,
			'tax_id' => 7,
			'price' => 7,
			'tax_name' => 'Lorem ipsum dolor sit amet',
			'itemized' => 1
		),
		array(
			'id' => 8,
			'pos_items_id' => 8,
			'tax_id' => 8,
			'price' => 8,
			'tax_name' => 'Lorem ipsum dolor sit amet',
			'itemized' => 1
		),
		array(
			'id' => 9,
			'pos_items_id' => 9,
			'tax_id' => 9,
			'price' => 9,
			'tax_name' => 'Lorem ipsum dolor sit amet',
			'itemized' => 1
		),
		array(
			'id' => 10,
			'pos_items_id' => 10,
			'tax_id' => 10,
			'price' => 10,
			'tax_name' => 'Lorem ipsum dolor sit amet',
			'itemized' => 1
		),
	);

}
