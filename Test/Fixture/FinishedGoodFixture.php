<?php
/**
 * FinishedGoodFixture
 *
 */
class FinishedGoodFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'casing_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'fg_code' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 14, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'stock_status' => array('type' => 'boolean', 'null' => false, 'default' => '0', 'comment' => 'Should this be counted in Location\\\'s sellable inventory?'),
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
			'casing_id' => 1,
			'fg_code' => 'Lorem ipsum ',
			'stock_status' => 1
		),
		array(
			'id' => 2,
			'casing_id' => 2,
			'fg_code' => 'Lorem ipsum ',
			'stock_status' => 1
		),
		array(
			'id' => 3,
			'casing_id' => 3,
			'fg_code' => 'Lorem ipsum ',
			'stock_status' => 1
		),
		array(
			'id' => 4,
			'casing_id' => 4,
			'fg_code' => 'Lorem ipsum ',
			'stock_status' => 1
		),
		array(
			'id' => 5,
			'casing_id' => 5,
			'fg_code' => 'Lorem ipsum ',
			'stock_status' => 1
		),
		array(
			'id' => 6,
			'casing_id' => 6,
			'fg_code' => 'Lorem ipsum ',
			'stock_status' => 1
		),
		array(
			'id' => 7,
			'casing_id' => 7,
			'fg_code' => 'Lorem ipsum ',
			'stock_status' => 1
		),
		array(
			'id' => 8,
			'casing_id' => 8,
			'fg_code' => 'Lorem ipsum ',
			'stock_status' => 1
		),
		array(
			'id' => 9,
			'casing_id' => 9,
			'fg_code' => 'Lorem ipsum ',
			'stock_status' => 1
		),
		array(
			'id' => 10,
			'casing_id' => 10,
			'fg_code' => 'Lorem ipsum ',
			'stock_status' => 1
		),
	);

}
