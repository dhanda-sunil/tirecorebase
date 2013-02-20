<?php
/**
 * ManufacturerProductLineGroupFixture
 *
 */
class ManufacturerProductLineGroupFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'manufacturer_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'name' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'order' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 5, 'key' => 'index'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'manufacturer_id' => array('column' => array('manufacturer_id', 'name'), 'unique' => 0),
			'order' => array('column' => 'order', 'unique' => 0)
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
			'manufacturer_id' => 1,
			'name' => 'Lorem ipsum dolor sit amet',
			'order' => 1
		),
		array(
			'id' => 2,
			'manufacturer_id' => 2,
			'name' => 'Lorem ipsum dolor sit amet',
			'order' => 2
		),
		array(
			'id' => 3,
			'manufacturer_id' => 3,
			'name' => 'Lorem ipsum dolor sit amet',
			'order' => 3
		),
		array(
			'id' => 4,
			'manufacturer_id' => 4,
			'name' => 'Lorem ipsum dolor sit amet',
			'order' => 4
		),
		array(
			'id' => 5,
			'manufacturer_id' => 5,
			'name' => 'Lorem ipsum dolor sit amet',
			'order' => 5
		),
		array(
			'id' => 6,
			'manufacturer_id' => 6,
			'name' => 'Lorem ipsum dolor sit amet',
			'order' => 6
		),
		array(
			'id' => 7,
			'manufacturer_id' => 7,
			'name' => 'Lorem ipsum dolor sit amet',
			'order' => 7
		),
		array(
			'id' => 8,
			'manufacturer_id' => 8,
			'name' => 'Lorem ipsum dolor sit amet',
			'order' => 8
		),
		array(
			'id' => 9,
			'manufacturer_id' => 9,
			'name' => 'Lorem ipsum dolor sit amet',
			'order' => 9
		),
		array(
			'id' => 10,
			'manufacturer_id' => 10,
			'name' => 'Lorem ipsum dolor sit amet',
			'order' => 10
		),
	);

}
