<?php
/**
 * PriceExceptionItemFixture
 *
 */
class PriceExceptionItemFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'price_exception_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 5, 'key' => 'primary'),
		'ref_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 5, 'key' => 'primary'),
		'ref_table' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 35, 'key' => 'primary', 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'indexes' => array(
			'PRIMARY' => array('column' => array('price_exception_id', 'ref_id', 'ref_table'), 'unique' => 1)
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
			'price_exception_id' => 1,
			'ref_id' => 1,
			'ref_table' => 'Lorem ipsum dolor sit amet'
		),
		array(
			'price_exception_id' => 2,
			'ref_id' => 2,
			'ref_table' => 'Lorem ipsum dolor sit amet'
		),
		array(
			'price_exception_id' => 3,
			'ref_id' => 3,
			'ref_table' => 'Lorem ipsum dolor sit amet'
		),
		array(
			'price_exception_id' => 4,
			'ref_id' => 4,
			'ref_table' => 'Lorem ipsum dolor sit amet'
		),
		array(
			'price_exception_id' => 5,
			'ref_id' => 5,
			'ref_table' => 'Lorem ipsum dolor sit amet'
		),
		array(
			'price_exception_id' => 6,
			'ref_id' => 6,
			'ref_table' => 'Lorem ipsum dolor sit amet'
		),
		array(
			'price_exception_id' => 7,
			'ref_id' => 7,
			'ref_table' => 'Lorem ipsum dolor sit amet'
		),
		array(
			'price_exception_id' => 8,
			'ref_id' => 8,
			'ref_table' => 'Lorem ipsum dolor sit amet'
		),
		array(
			'price_exception_id' => 9,
			'ref_id' => 9,
			'ref_table' => 'Lorem ipsum dolor sit amet'
		),
		array(
			'price_exception_id' => 10,
			'ref_id' => 10,
			'ref_table' => 'Lorem ipsum dolor sit amet'
		),
	);

}
