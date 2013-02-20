<?php
/**
 * CoreLogFixture
 *
 */
class CoreLogFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 20, 'key' => 'primary'),
		'model' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 127, 'key' => 'index', 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'field' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 127, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'ref_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 20),
		'pre_value' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'cur_value' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null, 'key' => 'index'),
		'created_by' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 6, 'key' => 'index'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'created' => array('column' => 'created', 'unique' => 0),
			'created_by' => array('column' => 'created_by', 'unique' => 0),
			'model' => array('column' => array('model', 'field', 'ref_id'), 'unique' => 0)
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
			'model' => 'Lorem ipsum dolor sit amet',
			'field' => 'Lorem ipsum dolor sit amet',
			'ref_id' => 1,
			'pre_value' => 'Lorem ipsum dolor sit amet',
			'cur_value' => 'Lorem ipsum dolor sit amet',
			'created' => '2012-08-02 17:20:14',
			'created_by' => 1
		),
		array(
			'id' => 2,
			'model' => 'Lorem ipsum dolor sit amet',
			'field' => 'Lorem ipsum dolor sit amet',
			'ref_id' => 2,
			'pre_value' => 'Lorem ipsum dolor sit amet',
			'cur_value' => 'Lorem ipsum dolor sit amet',
			'created' => '2012-08-02 17:20:14',
			'created_by' => 2
		),
		array(
			'id' => 3,
			'model' => 'Lorem ipsum dolor sit amet',
			'field' => 'Lorem ipsum dolor sit amet',
			'ref_id' => 3,
			'pre_value' => 'Lorem ipsum dolor sit amet',
			'cur_value' => 'Lorem ipsum dolor sit amet',
			'created' => '2012-08-02 17:20:14',
			'created_by' => 3
		),
		array(
			'id' => 4,
			'model' => 'Lorem ipsum dolor sit amet',
			'field' => 'Lorem ipsum dolor sit amet',
			'ref_id' => 4,
			'pre_value' => 'Lorem ipsum dolor sit amet',
			'cur_value' => 'Lorem ipsum dolor sit amet',
			'created' => '2012-08-02 17:20:14',
			'created_by' => 4
		),
		array(
			'id' => 5,
			'model' => 'Lorem ipsum dolor sit amet',
			'field' => 'Lorem ipsum dolor sit amet',
			'ref_id' => 5,
			'pre_value' => 'Lorem ipsum dolor sit amet',
			'cur_value' => 'Lorem ipsum dolor sit amet',
			'created' => '2012-08-02 17:20:14',
			'created_by' => 5
		),
		array(
			'id' => 6,
			'model' => 'Lorem ipsum dolor sit amet',
			'field' => 'Lorem ipsum dolor sit amet',
			'ref_id' => 6,
			'pre_value' => 'Lorem ipsum dolor sit amet',
			'cur_value' => 'Lorem ipsum dolor sit amet',
			'created' => '2012-08-02 17:20:14',
			'created_by' => 6
		),
		array(
			'id' => 7,
			'model' => 'Lorem ipsum dolor sit amet',
			'field' => 'Lorem ipsum dolor sit amet',
			'ref_id' => 7,
			'pre_value' => 'Lorem ipsum dolor sit amet',
			'cur_value' => 'Lorem ipsum dolor sit amet',
			'created' => '2012-08-02 17:20:14',
			'created_by' => 7
		),
		array(
			'id' => 8,
			'model' => 'Lorem ipsum dolor sit amet',
			'field' => 'Lorem ipsum dolor sit amet',
			'ref_id' => 8,
			'pre_value' => 'Lorem ipsum dolor sit amet',
			'cur_value' => 'Lorem ipsum dolor sit amet',
			'created' => '2012-08-02 17:20:14',
			'created_by' => 8
		),
		array(
			'id' => 9,
			'model' => 'Lorem ipsum dolor sit amet',
			'field' => 'Lorem ipsum dolor sit amet',
			'ref_id' => 9,
			'pre_value' => 'Lorem ipsum dolor sit amet',
			'cur_value' => 'Lorem ipsum dolor sit amet',
			'created' => '2012-08-02 17:20:14',
			'created_by' => 9
		),
		array(
			'id' => 10,
			'model' => 'Lorem ipsum dolor sit amet',
			'field' => 'Lorem ipsum dolor sit amet',
			'ref_id' => 10,
			'pre_value' => 'Lorem ipsum dolor sit amet',
			'cur_value' => 'Lorem ipsum dolor sit amet',
			'created' => '2012-08-02 17:20:14',
			'created_by' => 10
		),
	);

}
