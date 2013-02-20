<?php
/**
 * LocationFixture
 *
 */
class LocationFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 3, 'key' => 'primary'),
		'company_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 2, 'key' => 'index'),
		'name' => array('type' => 'string', 'null' => false, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'description' => array('type' => 'string', 'null' => false, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'location_group_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 2),
		'modified' => array('type' => 'datetime', 'null' => false),
		'created' => array('type' => 'datetime', 'null' => false),
		'deleted' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'deleted_by' => array('type' => 'integer', 'null' => false, 'length' => 10),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'company_id' => array('column' => 'company_id', 'unique' => 0)
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
			'company_id' => 1,
			'name' => 'Lorem ipsum dolor sit amet',
			'description' => 'Lorem ipsum dolor sit amet',
			'location_group_id' => 1,
			'modified' => '2012-08-02 19:36:05',
			'created' => '2012-08-02 19:36:05',
			'deleted' => '2012-08-02 19:36:05',
			'deleted_by' => 1
		),
	);

}