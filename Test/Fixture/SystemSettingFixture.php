<?php
/**
 * SystemSettingFixture
 *
 */
class SystemSettingFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'key' => array('type' => 'string', 'null' => false, 'default' => null, 'key' => 'primary', 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'ref_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'level' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 4, 'key' => 'primary'),
		'value' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 128, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'created_by' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 6),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified_by' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 6),
		'deleted' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'deleted_by' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 6),
		'indexes' => array(
			'PRIMARY' => array('column' => array('key', 'ref_id', 'level'), 'unique' => 1)
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
			'key' => 'Lorem ipsum dolor sit amet',
			'ref_id' => 1,
			'level' => 1,
			'value' => 'Lorem ipsum dolor sit amet',
			'created' => '2012-08-02 17:25:18',
			'created_by' => 1,
			'modified' => '2012-08-02 17:25:18',
			'modified_by' => 1,
			'deleted' => '2012-08-02 17:25:18',
			'deleted_by' => 1
		),
		array(
			'key' => 'Lorem ipsum dolor sit amet',
			'ref_id' => 2,
			'level' => 2,
			'value' => 'Lorem ipsum dolor sit amet',
			'created' => '2012-08-02 17:25:18',
			'created_by' => 2,
			'modified' => '2012-08-02 17:25:18',
			'modified_by' => 2,
			'deleted' => '2012-08-02 17:25:18',
			'deleted_by' => 2
		),
		array(
			'key' => 'Lorem ipsum dolor sit amet',
			'ref_id' => 3,
			'level' => 3,
			'value' => 'Lorem ipsum dolor sit amet',
			'created' => '2012-08-02 17:25:18',
			'created_by' => 3,
			'modified' => '2012-08-02 17:25:18',
			'modified_by' => 3,
			'deleted' => '2012-08-02 17:25:18',
			'deleted_by' => 3
		),
		array(
			'key' => 'Lorem ipsum dolor sit amet',
			'ref_id' => 4,
			'level' => 4,
			'value' => 'Lorem ipsum dolor sit amet',
			'created' => '2012-08-02 17:25:18',
			'created_by' => 4,
			'modified' => '2012-08-02 17:25:18',
			'modified_by' => 4,
			'deleted' => '2012-08-02 17:25:18',
			'deleted_by' => 4
		),
		array(
			'key' => 'Lorem ipsum dolor sit amet',
			'ref_id' => 5,
			'level' => 5,
			'value' => 'Lorem ipsum dolor sit amet',
			'created' => '2012-08-02 17:25:18',
			'created_by' => 5,
			'modified' => '2012-08-02 17:25:18',
			'modified_by' => 5,
			'deleted' => '2012-08-02 17:25:18',
			'deleted_by' => 5
		),
		array(
			'key' => 'Lorem ipsum dolor sit amet',
			'ref_id' => 6,
			'level' => 6,
			'value' => 'Lorem ipsum dolor sit amet',
			'created' => '2012-08-02 17:25:18',
			'created_by' => 6,
			'modified' => '2012-08-02 17:25:18',
			'modified_by' => 6,
			'deleted' => '2012-08-02 17:25:18',
			'deleted_by' => 6
		),
		array(
			'key' => 'Lorem ipsum dolor sit amet',
			'ref_id' => 7,
			'level' => 7,
			'value' => 'Lorem ipsum dolor sit amet',
			'created' => '2012-08-02 17:25:18',
			'created_by' => 7,
			'modified' => '2012-08-02 17:25:18',
			'modified_by' => 7,
			'deleted' => '2012-08-02 17:25:18',
			'deleted_by' => 7
		),
		array(
			'key' => 'Lorem ipsum dolor sit amet',
			'ref_id' => 8,
			'level' => 8,
			'value' => 'Lorem ipsum dolor sit amet',
			'created' => '2012-08-02 17:25:18',
			'created_by' => 8,
			'modified' => '2012-08-02 17:25:18',
			'modified_by' => 8,
			'deleted' => '2012-08-02 17:25:18',
			'deleted_by' => 8
		),
		array(
			'key' => 'Lorem ipsum dolor sit amet',
			'ref_id' => 9,
			'level' => 9,
			'value' => 'Lorem ipsum dolor sit amet',
			'created' => '2012-08-02 17:25:18',
			'created_by' => 9,
			'modified' => '2012-08-02 17:25:18',
			'modified_by' => 9,
			'deleted' => '2012-08-02 17:25:18',
			'deleted_by' => 9
		),
		array(
			'key' => 'Lorem ipsum dolor sit amet',
			'ref_id' => 10,
			'level' => 10,
			'value' => 'Lorem ipsum dolor sit amet',
			'created' => '2012-08-02 17:25:18',
			'created_by' => 10,
			'modified' => '2012-08-02 17:25:18',
			'modified_by' => 10,
			'deleted' => '2012-08-02 17:25:18',
			'deleted_by' => 10
		),
	);

}
