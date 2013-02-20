<?php
/**
 * CoItemsRepFixture
 *
 */
class CoItemsRepFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'co_item_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'indexes' => array(
			'user_id' => array('column' => 'user_id', 'unique' => 0),
			'co_item_id' => array('column' => 'co_item_id', 'unique' => 0)
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
			'co_item_id' => 1,
			'user_id' => 1
		),
		array(
			'co_item_id' => 2,
			'user_id' => 2
		),
		array(
			'co_item_id' => 3,
			'user_id' => 3
		),
		array(
			'co_item_id' => 4,
			'user_id' => 4
		),
		array(
			'co_item_id' => 5,
			'user_id' => 5
		),
		array(
			'co_item_id' => 6,
			'user_id' => 6
		),
		array(
			'co_item_id' => 7,
			'user_id' => 7
		),
		array(
			'co_item_id' => 8,
			'user_id' => 8
		),
		array(
			'co_item_id' => 9,
			'user_id' => 9
		),
		array(
			'co_item_id' => 10,
			'user_id' => 10
		),
	);

}
