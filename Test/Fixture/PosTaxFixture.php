<?php
/**
 * PosTaxFixture
 *
 */
class PosTaxFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'po_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'tax_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'tax_name' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'price' => array('type' => 'float', 'null' => false, 'default' => null),
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
			'po_id' => 1,
			'tax_id' => 1,
			'tax_name' => 'Lorem ipsum dolor sit amet',
			'price' => 1
		),
		array(
			'id' => 2,
			'po_id' => 2,
			'tax_id' => 2,
			'tax_name' => 'Lorem ipsum dolor sit amet',
			'price' => 2
		),
		array(
			'id' => 3,
			'po_id' => 3,
			'tax_id' => 3,
			'tax_name' => 'Lorem ipsum dolor sit amet',
			'price' => 3
		),
		array(
			'id' => 4,
			'po_id' => 4,
			'tax_id' => 4,
			'tax_name' => 'Lorem ipsum dolor sit amet',
			'price' => 4
		),
		array(
			'id' => 5,
			'po_id' => 5,
			'tax_id' => 5,
			'tax_name' => 'Lorem ipsum dolor sit amet',
			'price' => 5
		),
		array(
			'id' => 6,
			'po_id' => 6,
			'tax_id' => 6,
			'tax_name' => 'Lorem ipsum dolor sit amet',
			'price' => 6
		),
		array(
			'id' => 7,
			'po_id' => 7,
			'tax_id' => 7,
			'tax_name' => 'Lorem ipsum dolor sit amet',
			'price' => 7
		),
		array(
			'id' => 8,
			'po_id' => 8,
			'tax_id' => 8,
			'tax_name' => 'Lorem ipsum dolor sit amet',
			'price' => 8
		),
		array(
			'id' => 9,
			'po_id' => 9,
			'tax_id' => 9,
			'tax_name' => 'Lorem ipsum dolor sit amet',
			'price' => 9
		),
		array(
			'id' => 10,
			'po_id' => 10,
			'tax_id' => 10,
			'tax_name' => 'Lorem ipsum dolor sit amet',
			'price' => 10
		),
	);

}
