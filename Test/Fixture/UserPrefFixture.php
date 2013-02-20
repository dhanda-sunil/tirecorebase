<?php
/**
 * UserPrefFixture
 *
 */
class UserPrefFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 4, 'key' => 'index'),
		'object' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'option' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'value' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified_by' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 4),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'user_id' => array('column' => array('user_id', 'object', 'option'), 'unique' => 0)
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
			'object' => 'Lorem ipsum dolor sit amet',
			'option' => 'Lorem ipsum dolor sit amet',
			'value' => 'Lorem ipsum dolor sit amet',
			'modified' => '2012-08-02 17:25:56',
			'modified_by' => 1
		),
		array(
			'id' => 2,
			'user_id' => 2,
			'object' => 'Lorem ipsum dolor sit amet',
			'option' => 'Lorem ipsum dolor sit amet',
			'value' => 'Lorem ipsum dolor sit amet',
			'modified' => '2012-08-02 17:25:56',
			'modified_by' => 2
		),
		array(
			'id' => 3,
			'user_id' => 3,
			'object' => 'Lorem ipsum dolor sit amet',
			'option' => 'Lorem ipsum dolor sit amet',
			'value' => 'Lorem ipsum dolor sit amet',
			'modified' => '2012-08-02 17:25:56',
			'modified_by' => 3
		),
		array(
			'id' => 4,
			'user_id' => 4,
			'object' => 'Lorem ipsum dolor sit amet',
			'option' => 'Lorem ipsum dolor sit amet',
			'value' => 'Lorem ipsum dolor sit amet',
			'modified' => '2012-08-02 17:25:56',
			'modified_by' => 4
		),
		array(
			'id' => 5,
			'user_id' => 5,
			'object' => 'Lorem ipsum dolor sit amet',
			'option' => 'Lorem ipsum dolor sit amet',
			'value' => 'Lorem ipsum dolor sit amet',
			'modified' => '2012-08-02 17:25:56',
			'modified_by' => 5
		),
		array(
			'id' => 6,
			'user_id' => 6,
			'object' => 'Lorem ipsum dolor sit amet',
			'option' => 'Lorem ipsum dolor sit amet',
			'value' => 'Lorem ipsum dolor sit amet',
			'modified' => '2012-08-02 17:25:56',
			'modified_by' => 6
		),
		array(
			'id' => 7,
			'user_id' => 7,
			'object' => 'Lorem ipsum dolor sit amet',
			'option' => 'Lorem ipsum dolor sit amet',
			'value' => 'Lorem ipsum dolor sit amet',
			'modified' => '2012-08-02 17:25:56',
			'modified_by' => 7
		),
		array(
			'id' => 8,
			'user_id' => 8,
			'object' => 'Lorem ipsum dolor sit amet',
			'option' => 'Lorem ipsum dolor sit amet',
			'value' => 'Lorem ipsum dolor sit amet',
			'modified' => '2012-08-02 17:25:56',
			'modified_by' => 8
		),
		array(
			'id' => 9,
			'user_id' => 9,
			'object' => 'Lorem ipsum dolor sit amet',
			'option' => 'Lorem ipsum dolor sit amet',
			'value' => 'Lorem ipsum dolor sit amet',
			'modified' => '2012-08-02 17:25:56',
			'modified_by' => 9
		),
		array(
			'id' => 10,
			'user_id' => 10,
			'object' => 'Lorem ipsum dolor sit amet',
			'option' => 'Lorem ipsum dolor sit amet',
			'value' => 'Lorem ipsum dolor sit amet',
			'modified' => '2012-08-02 17:25:56',
			'modified_by' => 10
		),
	);

}
