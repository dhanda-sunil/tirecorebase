<?php
/**
 * PackagesItemFixture
 *
 */
class PackagesItemFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'package_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'ref_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'index'),
		'ref_table' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 50, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'quantity' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'deleted' => array('type' => 'datetime', 'null' => true, 'default' => null, 'key' => 'index'),
		'deleted_by' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 10),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'resource_id' => array('column' => 'ref_id', 'unique' => 0),
			'deleted' => array('column' => 'deleted', 'unique' => 0)
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
			'package_id' => 1,
			'ref_id' => 1,
			'ref_table' => 'Lorem ipsum dolor sit amet',
			'quantity' => 1,
			'created' => '2012-08-02 17:23:17',
			'modified' => '2012-08-02 17:23:17',
			'deleted' => '2012-08-02 17:23:17',
			'deleted_by' => 1
		),
		array(
			'id' => 2,
			'package_id' => 2,
			'ref_id' => 2,
			'ref_table' => 'Lorem ipsum dolor sit amet',
			'quantity' => 2,
			'created' => '2012-08-02 17:23:17',
			'modified' => '2012-08-02 17:23:17',
			'deleted' => '2012-08-02 17:23:17',
			'deleted_by' => 2
		),
		array(
			'id' => 3,
			'package_id' => 3,
			'ref_id' => 3,
			'ref_table' => 'Lorem ipsum dolor sit amet',
			'quantity' => 3,
			'created' => '2012-08-02 17:23:17',
			'modified' => '2012-08-02 17:23:17',
			'deleted' => '2012-08-02 17:23:17',
			'deleted_by' => 3
		),
		array(
			'id' => 4,
			'package_id' => 4,
			'ref_id' => 4,
			'ref_table' => 'Lorem ipsum dolor sit amet',
			'quantity' => 4,
			'created' => '2012-08-02 17:23:17',
			'modified' => '2012-08-02 17:23:17',
			'deleted' => '2012-08-02 17:23:17',
			'deleted_by' => 4
		),
		array(
			'id' => 5,
			'package_id' => 5,
			'ref_id' => 5,
			'ref_table' => 'Lorem ipsum dolor sit amet',
			'quantity' => 5,
			'created' => '2012-08-02 17:23:17',
			'modified' => '2012-08-02 17:23:17',
			'deleted' => '2012-08-02 17:23:17',
			'deleted_by' => 5
		),
		array(
			'id' => 6,
			'package_id' => 6,
			'ref_id' => 6,
			'ref_table' => 'Lorem ipsum dolor sit amet',
			'quantity' => 6,
			'created' => '2012-08-02 17:23:17',
			'modified' => '2012-08-02 17:23:17',
			'deleted' => '2012-08-02 17:23:17',
			'deleted_by' => 6
		),
		array(
			'id' => 7,
			'package_id' => 7,
			'ref_id' => 7,
			'ref_table' => 'Lorem ipsum dolor sit amet',
			'quantity' => 7,
			'created' => '2012-08-02 17:23:17',
			'modified' => '2012-08-02 17:23:17',
			'deleted' => '2012-08-02 17:23:17',
			'deleted_by' => 7
		),
		array(
			'id' => 8,
			'package_id' => 8,
			'ref_id' => 8,
			'ref_table' => 'Lorem ipsum dolor sit amet',
			'quantity' => 8,
			'created' => '2012-08-02 17:23:17',
			'modified' => '2012-08-02 17:23:17',
			'deleted' => '2012-08-02 17:23:17',
			'deleted_by' => 8
		),
		array(
			'id' => 9,
			'package_id' => 9,
			'ref_id' => 9,
			'ref_table' => 'Lorem ipsum dolor sit amet',
			'quantity' => 9,
			'created' => '2012-08-02 17:23:17',
			'modified' => '2012-08-02 17:23:17',
			'deleted' => '2012-08-02 17:23:17',
			'deleted_by' => 9
		),
		array(
			'id' => 10,
			'package_id' => 10,
			'ref_id' => 10,
			'ref_table' => 'Lorem ipsum dolor sit amet',
			'quantity' => 10,
			'created' => '2012-08-02 17:23:17',
			'modified' => '2012-08-02 17:23:17',
			'deleted' => '2012-08-02 17:23:17',
			'deleted_by' => 10
		),
	);

}
