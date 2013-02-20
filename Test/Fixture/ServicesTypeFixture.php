<?php
/**
 * ServicesTypeFixture
 *
 */
class ServicesTypeFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 200, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'deleted' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'deleted_by' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
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
			'name' => 'Lorem ipsum dolor sit amet',
			'modified' => '2012-08-02 17:25:12',
			'created' => '2012-08-02 17:25:12',
			'deleted' => '2012-08-02 17:25:12',
			'deleted_by' => 1
		),
		array(
			'id' => 2,
			'name' => 'Lorem ipsum dolor sit amet',
			'modified' => '2012-08-02 17:25:12',
			'created' => '2012-08-02 17:25:12',
			'deleted' => '2012-08-02 17:25:12',
			'deleted_by' => 2
		),
		array(
			'id' => 3,
			'name' => 'Lorem ipsum dolor sit amet',
			'modified' => '2012-08-02 17:25:12',
			'created' => '2012-08-02 17:25:12',
			'deleted' => '2012-08-02 17:25:12',
			'deleted_by' => 3
		),
		array(
			'id' => 4,
			'name' => 'Lorem ipsum dolor sit amet',
			'modified' => '2012-08-02 17:25:12',
			'created' => '2012-08-02 17:25:12',
			'deleted' => '2012-08-02 17:25:12',
			'deleted_by' => 4
		),
		array(
			'id' => 5,
			'name' => 'Lorem ipsum dolor sit amet',
			'modified' => '2012-08-02 17:25:12',
			'created' => '2012-08-02 17:25:12',
			'deleted' => '2012-08-02 17:25:12',
			'deleted_by' => 5
		),
		array(
			'id' => 6,
			'name' => 'Lorem ipsum dolor sit amet',
			'modified' => '2012-08-02 17:25:12',
			'created' => '2012-08-02 17:25:12',
			'deleted' => '2012-08-02 17:25:12',
			'deleted_by' => 6
		),
		array(
			'id' => 7,
			'name' => 'Lorem ipsum dolor sit amet',
			'modified' => '2012-08-02 17:25:12',
			'created' => '2012-08-02 17:25:12',
			'deleted' => '2012-08-02 17:25:12',
			'deleted_by' => 7
		),
		array(
			'id' => 8,
			'name' => 'Lorem ipsum dolor sit amet',
			'modified' => '2012-08-02 17:25:12',
			'created' => '2012-08-02 17:25:12',
			'deleted' => '2012-08-02 17:25:12',
			'deleted_by' => 8
		),
		array(
			'id' => 9,
			'name' => 'Lorem ipsum dolor sit amet',
			'modified' => '2012-08-02 17:25:12',
			'created' => '2012-08-02 17:25:12',
			'deleted' => '2012-08-02 17:25:12',
			'deleted_by' => 9
		),
		array(
			'id' => 10,
			'name' => 'Lorem ipsum dolor sit amet',
			'modified' => '2012-08-02 17:25:12',
			'created' => '2012-08-02 17:25:12',
			'deleted' => '2012-08-02 17:25:12',
			'deleted_by' => 10
		),
	);

}
