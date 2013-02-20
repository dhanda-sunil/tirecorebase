<?php
/**
 * LineItemFixture
 *
 */
class LineItemFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'name' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'model' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 200, 'key' => 'index', 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified_by' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'created_by' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'deleted' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'deleted_by' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 10),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'model' => array('column' => 'model', 'unique' => 0)
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
			'model' => 'Lorem ipsum dolor sit amet',
			'modified' => '2012-08-02 17:21:58',
			'modified_by' => 1,
			'created' => '2012-08-02 17:21:58',
			'created_by' => 1,
			'deleted' => '2012-08-02 17:21:58',
			'deleted_by' => 1
		),
		array(
			'id' => 2,
			'name' => 'Lorem ipsum dolor sit amet',
			'model' => 'Lorem ipsum dolor sit amet',
			'modified' => '2012-08-02 17:21:58',
			'modified_by' => 2,
			'created' => '2012-08-02 17:21:58',
			'created_by' => 2,
			'deleted' => '2012-08-02 17:21:58',
			'deleted_by' => 2
		),
		array(
			'id' => 3,
			'name' => 'Lorem ipsum dolor sit amet',
			'model' => 'Lorem ipsum dolor sit amet',
			'modified' => '2012-08-02 17:21:58',
			'modified_by' => 3,
			'created' => '2012-08-02 17:21:58',
			'created_by' => 3,
			'deleted' => '2012-08-02 17:21:58',
			'deleted_by' => 3
		),
		array(
			'id' => 4,
			'name' => 'Lorem ipsum dolor sit amet',
			'model' => 'Lorem ipsum dolor sit amet',
			'modified' => '2012-08-02 17:21:58',
			'modified_by' => 4,
			'created' => '2012-08-02 17:21:58',
			'created_by' => 4,
			'deleted' => '2012-08-02 17:21:58',
			'deleted_by' => 4
		),
		array(
			'id' => 5,
			'name' => 'Lorem ipsum dolor sit amet',
			'model' => 'Lorem ipsum dolor sit amet',
			'modified' => '2012-08-02 17:21:58',
			'modified_by' => 5,
			'created' => '2012-08-02 17:21:58',
			'created_by' => 5,
			'deleted' => '2012-08-02 17:21:58',
			'deleted_by' => 5
		),
		array(
			'id' => 6,
			'name' => 'Lorem ipsum dolor sit amet',
			'model' => 'Lorem ipsum dolor sit amet',
			'modified' => '2012-08-02 17:21:58',
			'modified_by' => 6,
			'created' => '2012-08-02 17:21:58',
			'created_by' => 6,
			'deleted' => '2012-08-02 17:21:58',
			'deleted_by' => 6
		),
		array(
			'id' => 7,
			'name' => 'Lorem ipsum dolor sit amet',
			'model' => 'Lorem ipsum dolor sit amet',
			'modified' => '2012-08-02 17:21:58',
			'modified_by' => 7,
			'created' => '2012-08-02 17:21:58',
			'created_by' => 7,
			'deleted' => '2012-08-02 17:21:58',
			'deleted_by' => 7
		),
		array(
			'id' => 8,
			'name' => 'Lorem ipsum dolor sit amet',
			'model' => 'Lorem ipsum dolor sit amet',
			'modified' => '2012-08-02 17:21:58',
			'modified_by' => 8,
			'created' => '2012-08-02 17:21:58',
			'created_by' => 8,
			'deleted' => '2012-08-02 17:21:58',
			'deleted_by' => 8
		),
		array(
			'id' => 9,
			'name' => 'Lorem ipsum dolor sit amet',
			'model' => 'Lorem ipsum dolor sit amet',
			'modified' => '2012-08-02 17:21:58',
			'modified_by' => 9,
			'created' => '2012-08-02 17:21:58',
			'created_by' => 9,
			'deleted' => '2012-08-02 17:21:58',
			'deleted_by' => 9
		),
		array(
			'id' => 10,
			'name' => 'Lorem ipsum dolor sit amet',
			'model' => 'Lorem ipsum dolor sit amet',
			'modified' => '2012-08-02 17:21:58',
			'modified_by' => 10,
			'created' => '2012-08-02 17:21:58',
			'created_by' => 10,
			'deleted' => '2012-08-02 17:21:58',
			'deleted_by' => 10
		),
	);

}
