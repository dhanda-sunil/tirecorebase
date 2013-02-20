<?php
/**
 * ProductSubtypeFixture
 *
 */
class ProductSubtypeFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'product_type_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'name' => array('type' => 'string', 'null' => false, 'default' => null, 'key' => 'index', 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'products_measurement_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'deleted' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'deleted_by' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 8),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'name' => array('column' => 'name', 'unique' => 0),
			'products_type_id' => array('column' => 'product_type_id', 'unique' => 0),
			'products_measurement_id' => array('column' => 'products_measurement_id', 'unique' => 0)
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
			'product_type_id' => 1,
			'name' => 'Lorem ipsum dolor sit amet',
			'products_measurement_id' => 1,
			'created' => '2012-08-02 17:24:07',
			'modified' => '2012-08-02 17:24:07',
			'deleted' => '2012-08-02 17:24:07',
			'deleted_by' => 1
		),
		array(
			'id' => 2,
			'product_type_id' => 2,
			'name' => 'Lorem ipsum dolor sit amet',
			'products_measurement_id' => 2,
			'created' => '2012-08-02 17:24:07',
			'modified' => '2012-08-02 17:24:07',
			'deleted' => '2012-08-02 17:24:07',
			'deleted_by' => 2
		),
		array(
			'id' => 3,
			'product_type_id' => 3,
			'name' => 'Lorem ipsum dolor sit amet',
			'products_measurement_id' => 3,
			'created' => '2012-08-02 17:24:07',
			'modified' => '2012-08-02 17:24:07',
			'deleted' => '2012-08-02 17:24:07',
			'deleted_by' => 3
		),
		array(
			'id' => 4,
			'product_type_id' => 4,
			'name' => 'Lorem ipsum dolor sit amet',
			'products_measurement_id' => 4,
			'created' => '2012-08-02 17:24:07',
			'modified' => '2012-08-02 17:24:07',
			'deleted' => '2012-08-02 17:24:07',
			'deleted_by' => 4
		),
		array(
			'id' => 5,
			'product_type_id' => 5,
			'name' => 'Lorem ipsum dolor sit amet',
			'products_measurement_id' => 5,
			'created' => '2012-08-02 17:24:07',
			'modified' => '2012-08-02 17:24:07',
			'deleted' => '2012-08-02 17:24:07',
			'deleted_by' => 5
		),
		array(
			'id' => 6,
			'product_type_id' => 6,
			'name' => 'Lorem ipsum dolor sit amet',
			'products_measurement_id' => 6,
			'created' => '2012-08-02 17:24:07',
			'modified' => '2012-08-02 17:24:07',
			'deleted' => '2012-08-02 17:24:07',
			'deleted_by' => 6
		),
		array(
			'id' => 7,
			'product_type_id' => 7,
			'name' => 'Lorem ipsum dolor sit amet',
			'products_measurement_id' => 7,
			'created' => '2012-08-02 17:24:07',
			'modified' => '2012-08-02 17:24:07',
			'deleted' => '2012-08-02 17:24:07',
			'deleted_by' => 7
		),
		array(
			'id' => 8,
			'product_type_id' => 8,
			'name' => 'Lorem ipsum dolor sit amet',
			'products_measurement_id' => 8,
			'created' => '2012-08-02 17:24:07',
			'modified' => '2012-08-02 17:24:07',
			'deleted' => '2012-08-02 17:24:07',
			'deleted_by' => 8
		),
		array(
			'id' => 9,
			'product_type_id' => 9,
			'name' => 'Lorem ipsum dolor sit amet',
			'products_measurement_id' => 9,
			'created' => '2012-08-02 17:24:07',
			'modified' => '2012-08-02 17:24:07',
			'deleted' => '2012-08-02 17:24:07',
			'deleted_by' => 9
		),
		array(
			'id' => 10,
			'product_type_id' => 10,
			'name' => 'Lorem ipsum dolor sit amet',
			'products_measurement_id' => 10,
			'created' => '2012-08-02 17:24:07',
			'modified' => '2012-08-02 17:24:07',
			'deleted' => '2012-08-02 17:24:07',
			'deleted_by' => 10
		),
	);

}
