<?php
/**
 * UsersGroupsLinkFixture
 *
 */
class UsersGroupsLinkFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 4, 'key' => 'index'),
		'group_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 6),
		'company_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 2),
		'indexes' => array(
			'user_id' => array('column' => array('user_id', 'group_id'), 'unique' => 0)
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
			'user_id' => 1,
			'group_id' => 1,
			'company_id' => 1
		),
		array(
			'user_id' => 2,
			'group_id' => 2,
			'company_id' => 2
		),
		array(
			'user_id' => 3,
			'group_id' => 3,
			'company_id' => 3
		),
		array(
			'user_id' => 4,
			'group_id' => 4,
			'company_id' => 4
		),
		array(
			'user_id' => 5,
			'group_id' => 5,
			'company_id' => 5
		),
		array(
			'user_id' => 6,
			'group_id' => 6,
			'company_id' => 6
		),
		array(
			'user_id' => 7,
			'group_id' => 7,
			'company_id' => 7
		),
		array(
			'user_id' => 8,
			'group_id' => 8,
			'company_id' => 8
		),
		array(
			'user_id' => 9,
			'group_id' => 9,
			'company_id' => 9
		),
		array(
			'user_id' => 10,
			'group_id' => 10,
			'company_id' => 10
		),
	);

}
