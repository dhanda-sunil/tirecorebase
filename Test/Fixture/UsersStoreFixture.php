<?php
/**
 * UsersStoreFixture
 *
 */
class UsersStoreFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'location_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 6),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'user_id' => array('column' => 'user_id', 'unique' => 0)
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
			'user_id' => 1,
			'location_id' => 1
		),
		array(
			'id' => 2,
			'user_id' => 2,
			'location_id' => 2
		),
		array(
			'id' => 3,
			'user_id' => 3,
			'location_id' => 3
		),
		array(
			'id' => 4,
			'user_id' => 4,
			'location_id' => 4
		),
		array(
			'id' => 5,
			'user_id' => 5,
			'location_id' => 5
		),
		array(
			'id' => 6,
			'user_id' => 6,
			'location_id' => 6
		),
		array(
			'id' => 7,
			'user_id' => 7,
			'location_id' => 7
		),
		array(
			'id' => 8,
			'user_id' => 8,
			'location_id' => 8
		),
		array(
			'id' => 9,
			'user_id' => 9,
			'location_id' => 9
		),
		array(
			'id' => 10,
			'user_id' => 10,
			'location_id' => 10
		),
	);

}
