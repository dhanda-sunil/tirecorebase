<?php
/**
 * NewTaxGroupFixture
 *
 */
class NewTaxGroupFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 127, 'key' => 'index', 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'created_by' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 5, 'key' => 'index'),
		'deleted' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'deleted_by' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 5, 'key' => 'index'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'created_by' => array('column' => 'created_by', 'unique' => 0),
			'deleted_by' => array('column' => 'deleted_by', 'unique' => 0),
			'name' => array('column' => 'name', 'unique' => 0)
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
			'name' => 'Lorem ipsum dolor sit amet',
			'created' => '2012-08-02 17:23:04',
			'created_by' => 1,
			'deleted' => '2012-08-02 17:23:04',
			'deleted_by' => 1
		),
		array(
			'id' => 2,
			'name' => 'Lorem ipsum dolor sit amet',
			'created' => '2012-08-02 17:23:04',
			'created_by' => 2,
			'deleted' => '2012-08-02 17:23:04',
			'deleted_by' => 2
		),
		array(
			'id' => 3,
			'name' => 'Lorem ipsum dolor sit amet',
			'created' => '2012-08-02 17:23:04',
			'created_by' => 3,
			'deleted' => '2012-08-02 17:23:04',
			'deleted_by' => 3
		),
		array(
			'id' => 4,
			'name' => 'Lorem ipsum dolor sit amet',
			'created' => '2012-08-02 17:23:04',
			'created_by' => 4,
			'deleted' => '2012-08-02 17:23:04',
			'deleted_by' => 4
		),
		array(
			'id' => 5,
			'name' => 'Lorem ipsum dolor sit amet',
			'created' => '2012-08-02 17:23:04',
			'created_by' => 5,
			'deleted' => '2012-08-02 17:23:04',
			'deleted_by' => 5
		),
		array(
			'id' => 6,
			'name' => 'Lorem ipsum dolor sit amet',
			'created' => '2012-08-02 17:23:04',
			'created_by' => 6,
			'deleted' => '2012-08-02 17:23:04',
			'deleted_by' => 6
		),
		array(
			'id' => 7,
			'name' => 'Lorem ipsum dolor sit amet',
			'created' => '2012-08-02 17:23:04',
			'created_by' => 7,
			'deleted' => '2012-08-02 17:23:04',
			'deleted_by' => 7
		),
		array(
			'id' => 8,
			'name' => 'Lorem ipsum dolor sit amet',
			'created' => '2012-08-02 17:23:04',
			'created_by' => 8,
			'deleted' => '2012-08-02 17:23:04',
			'deleted_by' => 8
		),
		array(
			'id' => 9,
			'name' => 'Lorem ipsum dolor sit amet',
			'created' => '2012-08-02 17:23:04',
			'created_by' => 9,
			'deleted' => '2012-08-02 17:23:04',
			'deleted_by' => 9
		),
		array(
			'id' => 10,
			'name' => 'Lorem ipsum dolor sit amet',
			'created' => '2012-08-02 17:23:04',
			'created_by' => 10,
			'deleted' => '2012-08-02 17:23:04',
			'deleted_by' => 10
		),
	);

}
