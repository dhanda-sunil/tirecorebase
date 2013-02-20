<?php
/**
 * SystemSettingCategoryFixture
 *
 */
class SystemSettingCategoryFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'parent_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'index'),
		'order' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 5, 'key' => 'index'),
		'name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 127, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'parent_id' => array('column' => array('parent_id', 'order'), 'unique' => 0),
			'order' => array('column' => 'order', 'unique' => 0)
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
			'parent_id' => 1,
			'order' => 1,
			'name' => 'Lorem ipsum dolor sit amet'
		),
		array(
			'id' => 2,
			'parent_id' => 2,
			'order' => 2,
			'name' => 'Lorem ipsum dolor sit amet'
		),
		array(
			'id' => 3,
			'parent_id' => 3,
			'order' => 3,
			'name' => 'Lorem ipsum dolor sit amet'
		),
		array(
			'id' => 4,
			'parent_id' => 4,
			'order' => 4,
			'name' => 'Lorem ipsum dolor sit amet'
		),
		array(
			'id' => 5,
			'parent_id' => 5,
			'order' => 5,
			'name' => 'Lorem ipsum dolor sit amet'
		),
		array(
			'id' => 6,
			'parent_id' => 6,
			'order' => 6,
			'name' => 'Lorem ipsum dolor sit amet'
		),
		array(
			'id' => 7,
			'parent_id' => 7,
			'order' => 7,
			'name' => 'Lorem ipsum dolor sit amet'
		),
		array(
			'id' => 8,
			'parent_id' => 8,
			'order' => 8,
			'name' => 'Lorem ipsum dolor sit amet'
		),
		array(
			'id' => 9,
			'parent_id' => 9,
			'order' => 9,
			'name' => 'Lorem ipsum dolor sit amet'
		),
		array(
			'id' => 10,
			'parent_id' => 10,
			'order' => 10,
			'name' => 'Lorem ipsum dolor sit amet'
		),
	);

}
