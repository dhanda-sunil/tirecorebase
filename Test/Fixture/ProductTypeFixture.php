<?php
/**
 * ProductTypeFixture
 *
 */
class ProductTypeFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 2, 'key' => 'primary'),
		'name' => array('type' => 'string', 'null' => false, 'default' => null, 'key' => 'index', 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'products_measurement_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 2, 'key' => 'index'),
		'search_display_fields' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'table_suffix' => array('type' => 'string', 'null' => false, 'default' => null, 'key' => 'index', 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'name' => array('column' => 'name', 'unique' => 0),
			'measure_type_id' => array('column' => 'products_measurement_id', 'unique' => 0),
			'table_suffix' => array('column' => 'table_suffix', 'unique' => 0)
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
			'name' => 'Lorem ipsum dolor sit amet',
			'products_measurement_id' => 1,
			'search_display_fields' => 'Lorem ipsum dolor sit amet',
			'table_suffix' => 'Lorem ipsum dolor sit amet'
		),
		array(
			'id' => 2,
			'name' => 'Lorem ipsum dolor sit amet',
			'products_measurement_id' => 2,
			'search_display_fields' => 'Lorem ipsum dolor sit amet',
			'table_suffix' => 'Lorem ipsum dolor sit amet'
		),
		array(
			'id' => 3,
			'name' => 'Lorem ipsum dolor sit amet',
			'products_measurement_id' => 3,
			'search_display_fields' => 'Lorem ipsum dolor sit amet',
			'table_suffix' => 'Lorem ipsum dolor sit amet'
		),
		array(
			'id' => 4,
			'name' => 'Lorem ipsum dolor sit amet',
			'products_measurement_id' => 4,
			'search_display_fields' => 'Lorem ipsum dolor sit amet',
			'table_suffix' => 'Lorem ipsum dolor sit amet'
		),
		array(
			'id' => 5,
			'name' => 'Lorem ipsum dolor sit amet',
			'products_measurement_id' => 5,
			'search_display_fields' => 'Lorem ipsum dolor sit amet',
			'table_suffix' => 'Lorem ipsum dolor sit amet'
		),
		array(
			'id' => 6,
			'name' => 'Lorem ipsum dolor sit amet',
			'products_measurement_id' => 6,
			'search_display_fields' => 'Lorem ipsum dolor sit amet',
			'table_suffix' => 'Lorem ipsum dolor sit amet'
		),
		array(
			'id' => 7,
			'name' => 'Lorem ipsum dolor sit amet',
			'products_measurement_id' => 7,
			'search_display_fields' => 'Lorem ipsum dolor sit amet',
			'table_suffix' => 'Lorem ipsum dolor sit amet'
		),
		array(
			'id' => 8,
			'name' => 'Lorem ipsum dolor sit amet',
			'products_measurement_id' => 8,
			'search_display_fields' => 'Lorem ipsum dolor sit amet',
			'table_suffix' => 'Lorem ipsum dolor sit amet'
		),
		array(
			'id' => 9,
			'name' => 'Lorem ipsum dolor sit amet',
			'products_measurement_id' => 9,
			'search_display_fields' => 'Lorem ipsum dolor sit amet',
			'table_suffix' => 'Lorem ipsum dolor sit amet'
		),
		array(
			'id' => 10,
			'name' => 'Lorem ipsum dolor sit amet',
			'products_measurement_id' => 10,
			'search_display_fields' => 'Lorem ipsum dolor sit amet',
			'table_suffix' => 'Lorem ipsum dolor sit amet'
		),
	);

}
