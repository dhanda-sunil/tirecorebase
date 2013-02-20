<?php
/**
 * ProductsBaseTypeFixture
 *
 */
class ProductsBaseTypeFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 6, 'key' => 'primary'),
		'value' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 50, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
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
			'value' => 'Lorem ipsum dolor sit amet'
		),
		array(
			'id' => 2,
			'value' => 'Lorem ipsum dolor sit amet'
		),
		array(
			'id' => 3,
			'value' => 'Lorem ipsum dolor sit amet'
		),
		array(
			'id' => 4,
			'value' => 'Lorem ipsum dolor sit amet'
		),
		array(
			'id' => 5,
			'value' => 'Lorem ipsum dolor sit amet'
		),
		array(
			'id' => 6,
			'value' => 'Lorem ipsum dolor sit amet'
		),
		array(
			'id' => 7,
			'value' => 'Lorem ipsum dolor sit amet'
		),
		array(
			'id' => 8,
			'value' => 'Lorem ipsum dolor sit amet'
		),
		array(
			'id' => 9,
			'value' => 'Lorem ipsum dolor sit amet'
		),
		array(
			'id' => 10,
			'value' => 'Lorem ipsum dolor sit amet'
		),
	);

}
