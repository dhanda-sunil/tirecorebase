<?php
/**
 * UsersGroupsPermFixture
 *
 */
class UsersGroupsPermFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'perms_id' => array('type' => 'string', 'null' => false, 'default' => null, 'key' => 'primary', 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'users_group_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 6, 'key' => 'primary'),
		'access' => array('type' => 'boolean', 'null' => false, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified_by' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'indexes' => array(
			'PRIMARY' => array('column' => array('perms_id', 'users_group_id'), 'unique' => 1)
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
			'perms_id' => 'Lorem ipsum dolor sit amet',
			'users_group_id' => 1,
			'access' => 1,
			'modified' => '2012-08-02 17:26:07',
			'modified_by' => 1
		),
		array(
			'perms_id' => 'Lorem ipsum dolor sit amet',
			'users_group_id' => 2,
			'access' => 1,
			'modified' => '2012-08-02 17:26:07',
			'modified_by' => 2
		),
		array(
			'perms_id' => 'Lorem ipsum dolor sit amet',
			'users_group_id' => 3,
			'access' => 1,
			'modified' => '2012-08-02 17:26:07',
			'modified_by' => 3
		),
		array(
			'perms_id' => 'Lorem ipsum dolor sit amet',
			'users_group_id' => 4,
			'access' => 1,
			'modified' => '2012-08-02 17:26:07',
			'modified_by' => 4
		),
		array(
			'perms_id' => 'Lorem ipsum dolor sit amet',
			'users_group_id' => 5,
			'access' => 1,
			'modified' => '2012-08-02 17:26:07',
			'modified_by' => 5
		),
		array(
			'perms_id' => 'Lorem ipsum dolor sit amet',
			'users_group_id' => 6,
			'access' => 1,
			'modified' => '2012-08-02 17:26:07',
			'modified_by' => 6
		),
		array(
			'perms_id' => 'Lorem ipsum dolor sit amet',
			'users_group_id' => 7,
			'access' => 1,
			'modified' => '2012-08-02 17:26:07',
			'modified_by' => 7
		),
		array(
			'perms_id' => 'Lorem ipsum dolor sit amet',
			'users_group_id' => 8,
			'access' => 1,
			'modified' => '2012-08-02 17:26:07',
			'modified_by' => 8
		),
		array(
			'perms_id' => 'Lorem ipsum dolor sit amet',
			'users_group_id' => 9,
			'access' => 1,
			'modified' => '2012-08-02 17:26:07',
			'modified_by' => 9
		),
		array(
			'perms_id' => 'Lorem ipsum dolor sit amet',
			'users_group_id' => 10,
			'access' => 1,
			'modified' => '2012-08-02 17:26:07',
			'modified_by' => 10
		),
	);

}
