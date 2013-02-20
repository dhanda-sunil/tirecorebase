<?php
/**
 * CustomersPricingGroupFixture
 *
 */
class CustomersPricingGroupFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'customer_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'pricing_group_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'index'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'customer_id', 'unique' => 1),
			'pricing_group_id' => array('column' => 'pricing_group_id', 'unique' => 0)
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
			'customer_id' => 1,
			'pricing_group_id' => 1
		),
		array(
			'customer_id' => 2,
			'pricing_group_id' => 2
		),
		array(
			'customer_id' => 3,
			'pricing_group_id' => 3
		),
		array(
			'customer_id' => 4,
			'pricing_group_id' => 4
		),
		array(
			'customer_id' => 5,
			'pricing_group_id' => 5
		),
		array(
			'customer_id' => 6,
			'pricing_group_id' => 6
		),
		array(
			'customer_id' => 7,
			'pricing_group_id' => 7
		),
		array(
			'customer_id' => 8,
			'pricing_group_id' => 8
		),
		array(
			'customer_id' => 9,
			'pricing_group_id' => 9
		),
		array(
			'customer_id' => 10,
			'pricing_group_id' => 10
		),
	);

}
