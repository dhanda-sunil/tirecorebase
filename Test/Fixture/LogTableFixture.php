<?php
/**
 * LogTableFixture
 *
 */
class LogTableFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'save_session' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 20, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'table' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 30, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'model' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 30, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'ref_id' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 13, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'parent_id' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 13, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 5),
		'insert' => array('type' => 'boolean', 'null' => false, 'default' => '0'),
		'data' => array('type' => 'binary', 'null' => false, 'default' => null),
		'controller' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 70, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'action' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 70, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'params' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'indexes' => array(
			
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
			'save_session' => 'Lorem ipsum dolor ',
			'table' => 'Lorem ipsum dolor sit amet',
			'model' => 'Lorem ipsum dolor sit amet',
			'ref_id' => 'Lorem ipsum',
			'parent_id' => 'Lorem ipsum',
			'user_id' => 1,
			'insert' => 1,
			'data' => 'Lorem ipsum dolor sit amet',
			'controller' => 'Lorem ipsum dolor sit amet',
			'action' => 'Lorem ipsum dolor sit amet',
			'params' => 'Lorem ipsum dolor sit amet',
			'created' => '2012-08-02 17:22:35'
		),
		array(
			'save_session' => 'Lorem ipsum dolor ',
			'table' => 'Lorem ipsum dolor sit amet',
			'model' => 'Lorem ipsum dolor sit amet',
			'ref_id' => 'Lorem ipsum',
			'parent_id' => 'Lorem ipsum',
			'user_id' => 2,
			'insert' => 1,
			'data' => 'Lorem ipsum dolor sit amet',
			'controller' => 'Lorem ipsum dolor sit amet',
			'action' => 'Lorem ipsum dolor sit amet',
			'params' => 'Lorem ipsum dolor sit amet',
			'created' => '2012-08-02 17:22:35'
		),
		array(
			'save_session' => 'Lorem ipsum dolor ',
			'table' => 'Lorem ipsum dolor sit amet',
			'model' => 'Lorem ipsum dolor sit amet',
			'ref_id' => 'Lorem ipsum',
			'parent_id' => 'Lorem ipsum',
			'user_id' => 3,
			'insert' => 1,
			'data' => 'Lorem ipsum dolor sit amet',
			'controller' => 'Lorem ipsum dolor sit amet',
			'action' => 'Lorem ipsum dolor sit amet',
			'params' => 'Lorem ipsum dolor sit amet',
			'created' => '2012-08-02 17:22:35'
		),
		array(
			'save_session' => 'Lorem ipsum dolor ',
			'table' => 'Lorem ipsum dolor sit amet',
			'model' => 'Lorem ipsum dolor sit amet',
			'ref_id' => 'Lorem ipsum',
			'parent_id' => 'Lorem ipsum',
			'user_id' => 4,
			'insert' => 1,
			'data' => 'Lorem ipsum dolor sit amet',
			'controller' => 'Lorem ipsum dolor sit amet',
			'action' => 'Lorem ipsum dolor sit amet',
			'params' => 'Lorem ipsum dolor sit amet',
			'created' => '2012-08-02 17:22:35'
		),
		array(
			'save_session' => 'Lorem ipsum dolor ',
			'table' => 'Lorem ipsum dolor sit amet',
			'model' => 'Lorem ipsum dolor sit amet',
			'ref_id' => 'Lorem ipsum',
			'parent_id' => 'Lorem ipsum',
			'user_id' => 5,
			'insert' => 1,
			'data' => 'Lorem ipsum dolor sit amet',
			'controller' => 'Lorem ipsum dolor sit amet',
			'action' => 'Lorem ipsum dolor sit amet',
			'params' => 'Lorem ipsum dolor sit amet',
			'created' => '2012-08-02 17:22:35'
		),
		array(
			'save_session' => 'Lorem ipsum dolor ',
			'table' => 'Lorem ipsum dolor sit amet',
			'model' => 'Lorem ipsum dolor sit amet',
			'ref_id' => 'Lorem ipsum',
			'parent_id' => 'Lorem ipsum',
			'user_id' => 6,
			'insert' => 1,
			'data' => 'Lorem ipsum dolor sit amet',
			'controller' => 'Lorem ipsum dolor sit amet',
			'action' => 'Lorem ipsum dolor sit amet',
			'params' => 'Lorem ipsum dolor sit amet',
			'created' => '2012-08-02 17:22:35'
		),
		array(
			'save_session' => 'Lorem ipsum dolor ',
			'table' => 'Lorem ipsum dolor sit amet',
			'model' => 'Lorem ipsum dolor sit amet',
			'ref_id' => 'Lorem ipsum',
			'parent_id' => 'Lorem ipsum',
			'user_id' => 7,
			'insert' => 1,
			'data' => 'Lorem ipsum dolor sit amet',
			'controller' => 'Lorem ipsum dolor sit amet',
			'action' => 'Lorem ipsum dolor sit amet',
			'params' => 'Lorem ipsum dolor sit amet',
			'created' => '2012-08-02 17:22:35'
		),
		array(
			'save_session' => 'Lorem ipsum dolor ',
			'table' => 'Lorem ipsum dolor sit amet',
			'model' => 'Lorem ipsum dolor sit amet',
			'ref_id' => 'Lorem ipsum',
			'parent_id' => 'Lorem ipsum',
			'user_id' => 8,
			'insert' => 1,
			'data' => 'Lorem ipsum dolor sit amet',
			'controller' => 'Lorem ipsum dolor sit amet',
			'action' => 'Lorem ipsum dolor sit amet',
			'params' => 'Lorem ipsum dolor sit amet',
			'created' => '2012-08-02 17:22:35'
		),
		array(
			'save_session' => 'Lorem ipsum dolor ',
			'table' => 'Lorem ipsum dolor sit amet',
			'model' => 'Lorem ipsum dolor sit amet',
			'ref_id' => 'Lorem ipsum',
			'parent_id' => 'Lorem ipsum',
			'user_id' => 9,
			'insert' => 1,
			'data' => 'Lorem ipsum dolor sit amet',
			'controller' => 'Lorem ipsum dolor sit amet',
			'action' => 'Lorem ipsum dolor sit amet',
			'params' => 'Lorem ipsum dolor sit amet',
			'created' => '2012-08-02 17:22:35'
		),
		array(
			'save_session' => 'Lorem ipsum dolor ',
			'table' => 'Lorem ipsum dolor sit amet',
			'model' => 'Lorem ipsum dolor sit amet',
			'ref_id' => 'Lorem ipsum',
			'parent_id' => 'Lorem ipsum',
			'user_id' => 10,
			'insert' => 1,
			'data' => 'Lorem ipsum dolor sit amet',
			'controller' => 'Lorem ipsum dolor sit amet',
			'action' => 'Lorem ipsum dolor sit amet',
			'params' => 'Lorem ipsum dolor sit amet',
			'created' => '2012-08-02 17:22:35'
		),
	);

}
