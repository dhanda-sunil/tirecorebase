<?php
/**
 * NewTaxFixture
 *
 */
class NewTaxFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 8, 'key' => 'primary'),
		'name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 127, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'account_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'always_display' => array('type' => 'boolean', 'null' => false, 'default' => null),
		'sort' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 8, 'key' => 'index'),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'created_by' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 5),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified_by' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 5),
		'deleted' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'deleted_by' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 5),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'sort' => array('column' => 'sort', 'unique' => 0)
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
			'account_id' => 1,
			'always_display' => 1,
			'sort' => 1,
			'created' => '2012-08-02 17:23:08',
			'created_by' => 1,
			'modified' => '2012-08-02 17:23:08',
			'modified_by' => 1,
			'deleted' => '2012-08-02 17:23:08',
			'deleted_by' => 1
		),
		array(
			'id' => 2,
			'name' => 'Lorem ipsum dolor sit amet',
			'account_id' => 2,
			'always_display' => 1,
			'sort' => 2,
			'created' => '2012-08-02 17:23:08',
			'created_by' => 2,
			'modified' => '2012-08-02 17:23:08',
			'modified_by' => 2,
			'deleted' => '2012-08-02 17:23:08',
			'deleted_by' => 2
		),
		array(
			'id' => 3,
			'name' => 'Lorem ipsum dolor sit amet',
			'account_id' => 3,
			'always_display' => 1,
			'sort' => 3,
			'created' => '2012-08-02 17:23:08',
			'created_by' => 3,
			'modified' => '2012-08-02 17:23:08',
			'modified_by' => 3,
			'deleted' => '2012-08-02 17:23:08',
			'deleted_by' => 3
		),
		array(
			'id' => 4,
			'name' => 'Lorem ipsum dolor sit amet',
			'account_id' => 4,
			'always_display' => 1,
			'sort' => 4,
			'created' => '2012-08-02 17:23:08',
			'created_by' => 4,
			'modified' => '2012-08-02 17:23:08',
			'modified_by' => 4,
			'deleted' => '2012-08-02 17:23:08',
			'deleted_by' => 4
		),
		array(
			'id' => 5,
			'name' => 'Lorem ipsum dolor sit amet',
			'account_id' => 5,
			'always_display' => 1,
			'sort' => 5,
			'created' => '2012-08-02 17:23:08',
			'created_by' => 5,
			'modified' => '2012-08-02 17:23:08',
			'modified_by' => 5,
			'deleted' => '2012-08-02 17:23:08',
			'deleted_by' => 5
		),
		array(
			'id' => 6,
			'name' => 'Lorem ipsum dolor sit amet',
			'account_id' => 6,
			'always_display' => 1,
			'sort' => 6,
			'created' => '2012-08-02 17:23:08',
			'created_by' => 6,
			'modified' => '2012-08-02 17:23:08',
			'modified_by' => 6,
			'deleted' => '2012-08-02 17:23:08',
			'deleted_by' => 6
		),
		array(
			'id' => 7,
			'name' => 'Lorem ipsum dolor sit amet',
			'account_id' => 7,
			'always_display' => 1,
			'sort' => 7,
			'created' => '2012-08-02 17:23:08',
			'created_by' => 7,
			'modified' => '2012-08-02 17:23:08',
			'modified_by' => 7,
			'deleted' => '2012-08-02 17:23:08',
			'deleted_by' => 7
		),
		array(
			'id' => 8,
			'name' => 'Lorem ipsum dolor sit amet',
			'account_id' => 8,
			'always_display' => 1,
			'sort' => 8,
			'created' => '2012-08-02 17:23:08',
			'created_by' => 8,
			'modified' => '2012-08-02 17:23:08',
			'modified_by' => 8,
			'deleted' => '2012-08-02 17:23:08',
			'deleted_by' => 8
		),
		array(
			'id' => 9,
			'name' => 'Lorem ipsum dolor sit amet',
			'account_id' => 9,
			'always_display' => 1,
			'sort' => 9,
			'created' => '2012-08-02 17:23:08',
			'created_by' => 9,
			'modified' => '2012-08-02 17:23:08',
			'modified_by' => 9,
			'deleted' => '2012-08-02 17:23:08',
			'deleted_by' => 9
		),
		array(
			'id' => 10,
			'name' => 'Lorem ipsum dolor sit amet',
			'account_id' => 10,
			'always_display' => 1,
			'sort' => 10,
			'created' => '2012-08-02 17:23:08',
			'created_by' => 10,
			'modified' => '2012-08-02 17:23:08',
			'modified_by' => 10,
			'deleted' => '2012-08-02 17:23:08',
			'deleted_by' => 10
		),
	);

}
