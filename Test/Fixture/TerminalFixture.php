<?php
/**
 * TerminalFixture
 *
 */
class TerminalFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'hash_key' => array('type' => 'string', 'null' => false, 'default' => null, 'key' => 'index', 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'description' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'registered_by' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 5),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'deleted' => array('type' => 'datetime', 'null' => true, 'default' => null, 'key' => 'index'),
		'deleted_by' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 5),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'hash' => array('column' => 'hash_key', 'unique' => 0),
			'deleted' => array('column' => 'deleted', 'unique' => 0)
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
			'hash_key' => 'Lorem ipsum dolor sit amet',
			'description' => 'Lorem ipsum dolor sit amet',
			'registered_by' => 1,
			'created' => '2012-08-02 17:25:36',
			'deleted' => '2012-08-02 17:25:36',
			'deleted_by' => 1
		),
		array(
			'id' => 2,
			'hash_key' => 'Lorem ipsum dolor sit amet',
			'description' => 'Lorem ipsum dolor sit amet',
			'registered_by' => 2,
			'created' => '2012-08-02 17:25:36',
			'deleted' => '2012-08-02 17:25:36',
			'deleted_by' => 2
		),
		array(
			'id' => 3,
			'hash_key' => 'Lorem ipsum dolor sit amet',
			'description' => 'Lorem ipsum dolor sit amet',
			'registered_by' => 3,
			'created' => '2012-08-02 17:25:36',
			'deleted' => '2012-08-02 17:25:36',
			'deleted_by' => 3
		),
		array(
			'id' => 4,
			'hash_key' => 'Lorem ipsum dolor sit amet',
			'description' => 'Lorem ipsum dolor sit amet',
			'registered_by' => 4,
			'created' => '2012-08-02 17:25:36',
			'deleted' => '2012-08-02 17:25:36',
			'deleted_by' => 4
		),
		array(
			'id' => 5,
			'hash_key' => 'Lorem ipsum dolor sit amet',
			'description' => 'Lorem ipsum dolor sit amet',
			'registered_by' => 5,
			'created' => '2012-08-02 17:25:36',
			'deleted' => '2012-08-02 17:25:36',
			'deleted_by' => 5
		),
		array(
			'id' => 6,
			'hash_key' => 'Lorem ipsum dolor sit amet',
			'description' => 'Lorem ipsum dolor sit amet',
			'registered_by' => 6,
			'created' => '2012-08-02 17:25:36',
			'deleted' => '2012-08-02 17:25:36',
			'deleted_by' => 6
		),
		array(
			'id' => 7,
			'hash_key' => 'Lorem ipsum dolor sit amet',
			'description' => 'Lorem ipsum dolor sit amet',
			'registered_by' => 7,
			'created' => '2012-08-02 17:25:36',
			'deleted' => '2012-08-02 17:25:36',
			'deleted_by' => 7
		),
		array(
			'id' => 8,
			'hash_key' => 'Lorem ipsum dolor sit amet',
			'description' => 'Lorem ipsum dolor sit amet',
			'registered_by' => 8,
			'created' => '2012-08-02 17:25:36',
			'deleted' => '2012-08-02 17:25:36',
			'deleted_by' => 8
		),
		array(
			'id' => 9,
			'hash_key' => 'Lorem ipsum dolor sit amet',
			'description' => 'Lorem ipsum dolor sit amet',
			'registered_by' => 9,
			'created' => '2012-08-02 17:25:36',
			'deleted' => '2012-08-02 17:25:36',
			'deleted_by' => 9
		),
		array(
			'id' => 10,
			'hash_key' => 'Lorem ipsum dolor sit amet',
			'description' => 'Lorem ipsum dolor sit amet',
			'registered_by' => 10,
			'created' => '2012-08-02 17:25:36',
			'deleted' => '2012-08-02 17:25:36',
			'deleted_by' => 10
		),
	);

}
