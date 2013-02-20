<?php
/**
 * PriceExceptionFixture
 *
 */
class PriceExceptionFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 8, 'key' => 'primary'),
		'name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 200, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'parent_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 5),
		'item_ids' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'price_group_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 3),
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
			'name' => 'Lorem ipsum dolor sit amet',
			'parent_id' => 1,
			'item_ids' => 'Lorem ipsum dolor sit amet',
			'price_group_id' => 1
		),
		array(
			'id' => 2,
			'name' => 'Lorem ipsum dolor sit amet',
			'parent_id' => 2,
			'item_ids' => 'Lorem ipsum dolor sit amet',
			'price_group_id' => 2
		),
		array(
			'id' => 3,
			'name' => 'Lorem ipsum dolor sit amet',
			'parent_id' => 3,
			'item_ids' => 'Lorem ipsum dolor sit amet',
			'price_group_id' => 3
		),
		array(
			'id' => 4,
			'name' => 'Lorem ipsum dolor sit amet',
			'parent_id' => 4,
			'item_ids' => 'Lorem ipsum dolor sit amet',
			'price_group_id' => 4
		),
		array(
			'id' => 5,
			'name' => 'Lorem ipsum dolor sit amet',
			'parent_id' => 5,
			'item_ids' => 'Lorem ipsum dolor sit amet',
			'price_group_id' => 5
		),
		array(
			'id' => 6,
			'name' => 'Lorem ipsum dolor sit amet',
			'parent_id' => 6,
			'item_ids' => 'Lorem ipsum dolor sit amet',
			'price_group_id' => 6
		),
		array(
			'id' => 7,
			'name' => 'Lorem ipsum dolor sit amet',
			'parent_id' => 7,
			'item_ids' => 'Lorem ipsum dolor sit amet',
			'price_group_id' => 7
		),
		array(
			'id' => 8,
			'name' => 'Lorem ipsum dolor sit amet',
			'parent_id' => 8,
			'item_ids' => 'Lorem ipsum dolor sit amet',
			'price_group_id' => 8
		),
		array(
			'id' => 9,
			'name' => 'Lorem ipsum dolor sit amet',
			'parent_id' => 9,
			'item_ids' => 'Lorem ipsum dolor sit amet',
			'price_group_id' => 9
		),
		array(
			'id' => 10,
			'name' => 'Lorem ipsum dolor sit amet',
			'parent_id' => 10,
			'item_ids' => 'Lorem ipsum dolor sit amet',
			'price_group_id' => 10
		),
	);

}
