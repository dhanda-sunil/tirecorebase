<?php
/**
 * UsersGroupFixture
 *
 */
class UsersGroupFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 6, 'key' => 'primary'),
		'name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 128, 'key' => 'unique', 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'description' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'name' => array('column' => 'name', 'unique' => 1)
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
			'name' => 'Lorem ipsum dolor sit amet',
			'description' => 'Lorem ipsum dolor sit amet',
			'modified' => '2012-08-02 17:26:02',
			'created' => '2012-08-02 17:26:02'
		),
		array(
			'id' => 2,
			'name' => 'Lorem ipsum dolor sit amet',
			'description' => 'Lorem ipsum dolor sit amet',
			'modified' => '2012-08-02 17:26:02',
			'created' => '2012-08-02 17:26:02'
		),
		array(
			'id' => 3,
			'name' => 'Lorem ipsum dolor sit amet',
			'description' => 'Lorem ipsum dolor sit amet',
			'modified' => '2012-08-02 17:26:02',
			'created' => '2012-08-02 17:26:02'
		),
		array(
			'id' => 4,
			'name' => 'Lorem ipsum dolor sit amet',
			'description' => 'Lorem ipsum dolor sit amet',
			'modified' => '2012-08-02 17:26:02',
			'created' => '2012-08-02 17:26:02'
		),
		array(
			'id' => 5,
			'name' => 'Lorem ipsum dolor sit amet',
			'description' => 'Lorem ipsum dolor sit amet',
			'modified' => '2012-08-02 17:26:02',
			'created' => '2012-08-02 17:26:02'
		),
		array(
			'id' => 6,
			'name' => 'Lorem ipsum dolor sit amet',
			'description' => 'Lorem ipsum dolor sit amet',
			'modified' => '2012-08-02 17:26:02',
			'created' => '2012-08-02 17:26:02'
		),
		array(
			'id' => 7,
			'name' => 'Lorem ipsum dolor sit amet',
			'description' => 'Lorem ipsum dolor sit amet',
			'modified' => '2012-08-02 17:26:02',
			'created' => '2012-08-02 17:26:02'
		),
		array(
			'id' => 8,
			'name' => 'Lorem ipsum dolor sit amet',
			'description' => 'Lorem ipsum dolor sit amet',
			'modified' => '2012-08-02 17:26:02',
			'created' => '2012-08-02 17:26:02'
		),
		array(
			'id' => 9,
			'name' => 'Lorem ipsum dolor sit amet',
			'description' => 'Lorem ipsum dolor sit amet',
			'modified' => '2012-08-02 17:26:02',
			'created' => '2012-08-02 17:26:02'
		),
		array(
			'id' => 10,
			'name' => 'Lorem ipsum dolor sit amet',
			'description' => 'Lorem ipsum dolor sit amet',
			'modified' => '2012-08-02 17:26:02',
			'created' => '2012-08-02 17:26:02'
		),
	);

}
