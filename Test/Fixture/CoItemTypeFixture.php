<?php
/**
 * CoItemTypeFixture
 *
 */
class CoItemTypeFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 50, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'co_item_type_category_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 2),
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
			'name' => 'Lorem ipsum dolor sit amet',
			'co_item_type_category_id' => 1
		),
		array(
			'id' => 2,
			'name' => 'Lorem ipsum dolor sit amet',
			'co_item_type_category_id' => 2
		),
		array(
			'id' => 3,
			'name' => 'Lorem ipsum dolor sit amet',
			'co_item_type_category_id' => 3
		),
		array(
			'id' => 4,
			'name' => 'Lorem ipsum dolor sit amet',
			'co_item_type_category_id' => 4
		),
		array(
			'id' => 5,
			'name' => 'Lorem ipsum dolor sit amet',
			'co_item_type_category_id' => 5
		),
		array(
			'id' => 6,
			'name' => 'Lorem ipsum dolor sit amet',
			'co_item_type_category_id' => 6
		),
		array(
			'id' => 7,
			'name' => 'Lorem ipsum dolor sit amet',
			'co_item_type_category_id' => 7
		),
		array(
			'id' => 8,
			'name' => 'Lorem ipsum dolor sit amet',
			'co_item_type_category_id' => 8
		),
		array(
			'id' => 9,
			'name' => 'Lorem ipsum dolor sit amet',
			'co_item_type_category_id' => 9
		),
		array(
			'id' => 10,
			'name' => 'Lorem ipsum dolor sit amet',
			'co_item_type_category_id' => 10
		),
	);

}
