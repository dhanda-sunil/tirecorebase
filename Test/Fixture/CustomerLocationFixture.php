<?php
/**
 * CustomerLocationFixture
 *
 */
class CustomerLocationFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 3, 'key' => 'primary'),
		'company_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 10, 'key' => 'index'),
		'name' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'description' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'customer_group_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'deleted' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'deleted_by' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'account' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 50, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
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
			'customer_group_id' => 1,
			'modified' => '2012-08-22 12:11:37',
			'created' => '2012-08-22 12:11:37',
			'deleted' => '2012-08-22 12:11:37',
			'deleted_by' => 1,
			'account' => 'Lorem ipsum dolor sit amet'
		),
	);

}
