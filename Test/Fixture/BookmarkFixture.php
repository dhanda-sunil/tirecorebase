<?php
/**
 * BookmarkFixture
 *
 */
class BookmarkFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'title' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 100, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'url' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 100, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
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
			'user_id' => 1,
			'title' => 'Lorem ipsum dolor sit amet',
			'url' => 'Lorem ipsum dolor sit amet'
		),
		array(
			'id' => 2,
			'user_id' => 2,
			'title' => 'Lorem ipsum dolor sit amet',
			'url' => 'Lorem ipsum dolor sit amet'
		),
		array(
			'id' => 3,
			'user_id' => 3,
			'title' => 'Lorem ipsum dolor sit amet',
			'url' => 'Lorem ipsum dolor sit amet'
		),
		array(
			'id' => 4,
			'user_id' => 4,
			'title' => 'Lorem ipsum dolor sit amet',
			'url' => 'Lorem ipsum dolor sit amet'
		),
		array(
			'id' => 5,
			'user_id' => 5,
			'title' => 'Lorem ipsum dolor sit amet',
			'url' => 'Lorem ipsum dolor sit amet'
		),
		array(
			'id' => 6,
			'user_id' => 6,
			'title' => 'Lorem ipsum dolor sit amet',
			'url' => 'Lorem ipsum dolor sit amet'
		),
		array(
			'id' => 7,
			'user_id' => 7,
			'title' => 'Lorem ipsum dolor sit amet',
			'url' => 'Lorem ipsum dolor sit amet'
		),
		array(
			'id' => 8,
			'user_id' => 8,
			'title' => 'Lorem ipsum dolor sit amet',
			'url' => 'Lorem ipsum dolor sit amet'
		),
		array(
			'id' => 9,
			'user_id' => 9,
			'title' => 'Lorem ipsum dolor sit amet',
			'url' => 'Lorem ipsum dolor sit amet'
		),
		array(
			'id' => 10,
			'user_id' => 10,
			'title' => 'Lorem ipsum dolor sit amet',
			'url' => 'Lorem ipsum dolor sit amet'
		),
	);

}
