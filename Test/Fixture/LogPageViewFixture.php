<?php
/**
 * LogPageViewFixture
 *
 */
class LogPageViewFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'user_id' => array('type' => 'integer', 'null' => true, 'default' => null),
		'usage' => array('type' => 'integer', 'null' => false, 'default' => null),
		'peak' => array('type' => 'integer', 'null' => false, 'default' => null),
		'time' => array('type' => 'float', 'null' => true, 'default' => null),
		'controller' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 70, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'action' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 70, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'params' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'layout' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 50, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'debug' => array('type' => 'boolean', 'null' => false, 'default' => null),
		'base_url' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 200, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
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
			'user_id' => 1,
			'usage' => 1,
			'peak' => 1,
			'time' => 1,
			'controller' => 'Lorem ipsum dolor sit amet',
			'action' => 'Lorem ipsum dolor sit amet',
			'params' => 'Lorem ipsum dolor sit amet',
			'layout' => 'Lorem ipsum dolor sit amet',
			'debug' => 1,
			'base_url' => 'Lorem ipsum dolor sit amet',
			'created' => '2012-08-02 17:22:31'
		),
		array(
			'id' => 2,
			'user_id' => 2,
			'usage' => 2,
			'peak' => 2,
			'time' => 2,
			'controller' => 'Lorem ipsum dolor sit amet',
			'action' => 'Lorem ipsum dolor sit amet',
			'params' => 'Lorem ipsum dolor sit amet',
			'layout' => 'Lorem ipsum dolor sit amet',
			'debug' => 1,
			'base_url' => 'Lorem ipsum dolor sit amet',
			'created' => '2012-08-02 17:22:31'
		),
		array(
			'id' => 3,
			'user_id' => 3,
			'usage' => 3,
			'peak' => 3,
			'time' => 3,
			'controller' => 'Lorem ipsum dolor sit amet',
			'action' => 'Lorem ipsum dolor sit amet',
			'params' => 'Lorem ipsum dolor sit amet',
			'layout' => 'Lorem ipsum dolor sit amet',
			'debug' => 1,
			'base_url' => 'Lorem ipsum dolor sit amet',
			'created' => '2012-08-02 17:22:31'
		),
		array(
			'id' => 4,
			'user_id' => 4,
			'usage' => 4,
			'peak' => 4,
			'time' => 4,
			'controller' => 'Lorem ipsum dolor sit amet',
			'action' => 'Lorem ipsum dolor sit amet',
			'params' => 'Lorem ipsum dolor sit amet',
			'layout' => 'Lorem ipsum dolor sit amet',
			'debug' => 1,
			'base_url' => 'Lorem ipsum dolor sit amet',
			'created' => '2012-08-02 17:22:31'
		),
		array(
			'id' => 5,
			'user_id' => 5,
			'usage' => 5,
			'peak' => 5,
			'time' => 5,
			'controller' => 'Lorem ipsum dolor sit amet',
			'action' => 'Lorem ipsum dolor sit amet',
			'params' => 'Lorem ipsum dolor sit amet',
			'layout' => 'Lorem ipsum dolor sit amet',
			'debug' => 1,
			'base_url' => 'Lorem ipsum dolor sit amet',
			'created' => '2012-08-02 17:22:31'
		),
		array(
			'id' => 6,
			'user_id' => 6,
			'usage' => 6,
			'peak' => 6,
			'time' => 6,
			'controller' => 'Lorem ipsum dolor sit amet',
			'action' => 'Lorem ipsum dolor sit amet',
			'params' => 'Lorem ipsum dolor sit amet',
			'layout' => 'Lorem ipsum dolor sit amet',
			'debug' => 1,
			'base_url' => 'Lorem ipsum dolor sit amet',
			'created' => '2012-08-02 17:22:31'
		),
		array(
			'id' => 7,
			'user_id' => 7,
			'usage' => 7,
			'peak' => 7,
			'time' => 7,
			'controller' => 'Lorem ipsum dolor sit amet',
			'action' => 'Lorem ipsum dolor sit amet',
			'params' => 'Lorem ipsum dolor sit amet',
			'layout' => 'Lorem ipsum dolor sit amet',
			'debug' => 1,
			'base_url' => 'Lorem ipsum dolor sit amet',
			'created' => '2012-08-02 17:22:31'
		),
		array(
			'id' => 8,
			'user_id' => 8,
			'usage' => 8,
			'peak' => 8,
			'time' => 8,
			'controller' => 'Lorem ipsum dolor sit amet',
			'action' => 'Lorem ipsum dolor sit amet',
			'params' => 'Lorem ipsum dolor sit amet',
			'layout' => 'Lorem ipsum dolor sit amet',
			'debug' => 1,
			'base_url' => 'Lorem ipsum dolor sit amet',
			'created' => '2012-08-02 17:22:31'
		),
		array(
			'id' => 9,
			'user_id' => 9,
			'usage' => 9,
			'peak' => 9,
			'time' => 9,
			'controller' => 'Lorem ipsum dolor sit amet',
			'action' => 'Lorem ipsum dolor sit amet',
			'params' => 'Lorem ipsum dolor sit amet',
			'layout' => 'Lorem ipsum dolor sit amet',
			'debug' => 1,
			'base_url' => 'Lorem ipsum dolor sit amet',
			'created' => '2012-08-02 17:22:31'
		),
		array(
			'id' => 10,
			'user_id' => 10,
			'usage' => 10,
			'peak' => 10,
			'time' => 10,
			'controller' => 'Lorem ipsum dolor sit amet',
			'action' => 'Lorem ipsum dolor sit amet',
			'params' => 'Lorem ipsum dolor sit amet',
			'layout' => 'Lorem ipsum dolor sit amet',
			'debug' => 1,
			'base_url' => 'Lorem ipsum dolor sit amet',
			'created' => '2012-08-02 17:22:31'
		),
	);

}
