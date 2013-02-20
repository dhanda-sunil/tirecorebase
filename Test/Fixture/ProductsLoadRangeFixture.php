<?php
/**
 * ProductsLoadRangeFixture
 *
 */
class ProductsLoadRangeFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 2, 'key' => 'primary'),
		'value' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 35, 'key' => 'index', 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'deleted' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'deleted_by' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 5),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'value' => array('column' => array('value', 'deleted'), 'unique' => 0)
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
			'value' => 'Lorem ipsum dolor sit amet',
			'deleted' => '2012-08-02 17:24:18',
			'deleted_by' => 1
		),
		array(
			'id' => 2,
			'value' => 'Lorem ipsum dolor sit amet',
			'deleted' => '2012-08-02 17:24:18',
			'deleted_by' => 2
		),
		array(
			'id' => 3,
			'value' => 'Lorem ipsum dolor sit amet',
			'deleted' => '2012-08-02 17:24:18',
			'deleted_by' => 3
		),
		array(
			'id' => 4,
			'value' => 'Lorem ipsum dolor sit amet',
			'deleted' => '2012-08-02 17:24:18',
			'deleted_by' => 4
		),
		array(
			'id' => 5,
			'value' => 'Lorem ipsum dolor sit amet',
			'deleted' => '2012-08-02 17:24:18',
			'deleted_by' => 5
		),
		array(
			'id' => 6,
			'value' => 'Lorem ipsum dolor sit amet',
			'deleted' => '2012-08-02 17:24:18',
			'deleted_by' => 6
		),
		array(
			'id' => 7,
			'value' => 'Lorem ipsum dolor sit amet',
			'deleted' => '2012-08-02 17:24:18',
			'deleted_by' => 7
		),
		array(
			'id' => 8,
			'value' => 'Lorem ipsum dolor sit amet',
			'deleted' => '2012-08-02 17:24:18',
			'deleted_by' => 8
		),
		array(
			'id' => 9,
			'value' => 'Lorem ipsum dolor sit amet',
			'deleted' => '2012-08-02 17:24:18',
			'deleted_by' => 9
		),
		array(
			'id' => 10,
			'value' => 'Lorem ipsum dolor sit amet',
			'deleted' => '2012-08-02 17:24:18',
			'deleted_by' => 10
		),
	);

}
