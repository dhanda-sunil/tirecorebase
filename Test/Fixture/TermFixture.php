<?php
/**
 * TermFixture
 *
 */
class TermFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 8, 'key' => 'primary'),
		'term' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 50, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'description' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'num_payments' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 8),
		'full_pay_discount' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => '4,2'),
		'full_pay_days' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 5),
		'full_pay_on' => array('type' => 'boolean', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
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
			'term' => 'Lorem ipsum dolor sit amet',
			'description' => 'Lorem ipsum dolor sit amet',
			'num_payments' => 1,
			'full_pay_discount' => 1,
			'full_pay_days' => 1,
			'full_pay_on' => 1
		),
		array(
			'id' => 2,
			'term' => 'Lorem ipsum dolor sit amet',
			'description' => 'Lorem ipsum dolor sit amet',
			'num_payments' => 2,
			'full_pay_discount' => 2,
			'full_pay_days' => 2,
			'full_pay_on' => 1
		),
		array(
			'id' => 3,
			'term' => 'Lorem ipsum dolor sit amet',
			'description' => 'Lorem ipsum dolor sit amet',
			'num_payments' => 3,
			'full_pay_discount' => 3,
			'full_pay_days' => 3,
			'full_pay_on' => 1
		),
		array(
			'id' => 4,
			'term' => 'Lorem ipsum dolor sit amet',
			'description' => 'Lorem ipsum dolor sit amet',
			'num_payments' => 4,
			'full_pay_discount' => 4,
			'full_pay_days' => 4,
			'full_pay_on' => 1
		),
		array(
			'id' => 5,
			'term' => 'Lorem ipsum dolor sit amet',
			'description' => 'Lorem ipsum dolor sit amet',
			'num_payments' => 5,
			'full_pay_discount' => 5,
			'full_pay_days' => 5,
			'full_pay_on' => 1
		),
		array(
			'id' => 6,
			'term' => 'Lorem ipsum dolor sit amet',
			'description' => 'Lorem ipsum dolor sit amet',
			'num_payments' => 6,
			'full_pay_discount' => 6,
			'full_pay_days' => 6,
			'full_pay_on' => 1
		),
		array(
			'id' => 7,
			'term' => 'Lorem ipsum dolor sit amet',
			'description' => 'Lorem ipsum dolor sit amet',
			'num_payments' => 7,
			'full_pay_discount' => 7,
			'full_pay_days' => 7,
			'full_pay_on' => 1
		),
		array(
			'id' => 8,
			'term' => 'Lorem ipsum dolor sit amet',
			'description' => 'Lorem ipsum dolor sit amet',
			'num_payments' => 8,
			'full_pay_discount' => 8,
			'full_pay_days' => 8,
			'full_pay_on' => 1
		),
		array(
			'id' => 9,
			'term' => 'Lorem ipsum dolor sit amet',
			'description' => 'Lorem ipsum dolor sit amet',
			'num_payments' => 9,
			'full_pay_discount' => 9,
			'full_pay_days' => 9,
			'full_pay_on' => 1
		),
		array(
			'id' => 10,
			'term' => 'Lorem ipsum dolor sit amet',
			'description' => 'Lorem ipsum dolor sit amet',
			'num_payments' => 10,
			'full_pay_discount' => 10,
			'full_pay_days' => 10,
			'full_pay_on' => 1
		),
	);

}
