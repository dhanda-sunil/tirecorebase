<?php
/**
 * AlertFixture
 *
 */
class AlertFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 8, 'key' => 'primary'),
		'table_name' => array('type' => 'string', 'null' => false, 'length' => 50, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'row_id' => array('type' => 'integer', 'null' => false),
		'is_active' => array('type' => 'boolean', 'null' => false, 'default' => '1'),
		'type' => array('type' => 'string', 'null' => false, 'length' => 100, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'desc' => array('type' => 'string', 'null' => false, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'created' => array('type' => 'datetime', 'null' => false),
		'modified' => array('type' => 'datetime', 'null' => false),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
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
			'table_name' => 'Lorem ipsum dolor sit amet',
			'row_id' => 1,
			'is_active' => 1,
			'type' => 'Lorem ipsum dolor sit amet',
			'desc' => 'Lorem ipsum dolor sit amet',
			'created' => '2012-08-09 16:21:21',
			'modified' => '2012-08-09 16:21:21'
		),
	);

}
