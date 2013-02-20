<?php
/**
 * CustomersRepFixture
 *
 */
class CustomersRepFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'customer_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'primary_rep' => array('type' => 'boolean', 'null' => false, 'default' => '0'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'resource_id' => array('column' => array('customer_id', 'user_id'), 'unique' => 0)
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
			'customer_id' => 1,
			'user_id' => 1,
			'primary_rep' => 1
		),
		array(
			'id' => 2,
			'customer_id' => 2,
			'user_id' => 2,
			'primary_rep' => 1
		),
		array(
			'id' => 3,
			'customer_id' => 3,
			'user_id' => 3,
			'primary_rep' => 1
		),
		array(
			'id' => 4,
			'customer_id' => 4,
			'user_id' => 4,
			'primary_rep' => 1
		),
		array(
			'id' => 5,
			'customer_id' => 5,
			'user_id' => 5,
			'primary_rep' => 1
		),
		array(
			'id' => 6,
			'customer_id' => 6,
			'user_id' => 6,
			'primary_rep' => 1
		),
		array(
			'id' => 7,
			'customer_id' => 7,
			'user_id' => 7,
			'primary_rep' => 1
		),
		array(
			'id' => 8,
			'customer_id' => 8,
			'user_id' => 8,
			'primary_rep' => 1
		),
		array(
			'id' => 9,
			'customer_id' => 9,
			'user_id' => 9,
			'primary_rep' => 1
		),
		array(
			'id' => 10,
			'customer_id' => 10,
			'user_id' => 10,
			'primary_rep' => 1
		),
	);

}
