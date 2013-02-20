<?php
/**
 * VendorsTermFixture
 *
 */
class VendorsTermFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'term_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 8),
		'vendor_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'index'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'vendor_id' => array('column' => 'vendor_id', 'unique' => 0)
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
			'term_id' => 1,
			'vendor_id' => 1
		),
		array(
			'id' => 2,
			'term_id' => 2,
			'vendor_id' => 2
		),
		array(
			'id' => 3,
			'term_id' => 3,
			'vendor_id' => 3
		),
		array(
			'id' => 4,
			'term_id' => 4,
			'vendor_id' => 4
		),
		array(
			'id' => 5,
			'term_id' => 5,
			'vendor_id' => 5
		),
		array(
			'id' => 6,
			'term_id' => 6,
			'vendor_id' => 6
		),
		array(
			'id' => 7,
			'term_id' => 7,
			'vendor_id' => 7
		),
		array(
			'id' => 8,
			'term_id' => 8,
			'vendor_id' => 8
		),
		array(
			'id' => 9,
			'term_id' => 9,
			'vendor_id' => 9
		),
		array(
			'id' => 10,
			'term_id' => 10,
			'vendor_id' => 10
		),
	);

}
