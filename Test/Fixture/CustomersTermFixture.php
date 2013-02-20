<?php
/**
 * CustomersTermFixture
 *
 */
class CustomersTermFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'company_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'term_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 8),
		'customer_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'index'),
		'sort' => array('type' => 'integer', 'null' => false, 'default' => '1', 'length' => 8),
		'active' => array('type' => 'boolean', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'customer_id' => array('column' => 'customer_id', 'unique' => 0)
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
			'term_id' => 1,
			'customer_id' => 1,
			'sort' => 1,
			'active' => 1
		),
		array(
			'id' => 2,
			'company_id' => 2,
			'term_id' => 2,
			'customer_id' => 2,
			'sort' => 2,
			'active' => 1
		),
		array(
			'id' => 3,
			'company_id' => 3,
			'term_id' => 3,
			'customer_id' => 3,
			'sort' => 3,
			'active' => 1
		),
		array(
			'id' => 4,
			'company_id' => 4,
			'term_id' => 4,
			'customer_id' => 4,
			'sort' => 4,
			'active' => 1
		),
		array(
			'id' => 5,
			'company_id' => 5,
			'term_id' => 5,
			'customer_id' => 5,
			'sort' => 5,
			'active' => 1
		),
		array(
			'id' => 6,
			'company_id' => 6,
			'term_id' => 6,
			'customer_id' => 6,
			'sort' => 6,
			'active' => 1
		),
		array(
			'id' => 7,
			'company_id' => 7,
			'term_id' => 7,
			'customer_id' => 7,
			'sort' => 7,
			'active' => 1
		),
		array(
			'id' => 8,
			'company_id' => 8,
			'term_id' => 8,
			'customer_id' => 8,
			'sort' => 8,
			'active' => 1
		),
		array(
			'id' => 9,
			'company_id' => 9,
			'term_id' => 9,
			'customer_id' => 9,
			'sort' => 9,
			'active' => 1
		),
		array(
			'id' => 10,
			'company_id' => 10,
			'term_id' => 10,
			'customer_id' => 10,
			'sort' => 10,
			'active' => 1
		),
	);

}
