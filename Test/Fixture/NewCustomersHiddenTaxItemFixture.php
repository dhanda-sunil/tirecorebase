<?php
/**
 * NewCustomersHiddenTaxItemFixture
 *
 */
class NewCustomersHiddenTaxItemFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'customer_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'tax_item_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'default' => array('type' => 'boolean', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => array('customer_id', 'tax_item_id'), 'unique' => 1)
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
			'customer_id' => 1,
			'tax_item_id' => 1,
			'default' => 1
		),
		array(
			'customer_id' => 2,
			'tax_item_id' => 2,
			'default' => 1
		),
		array(
			'customer_id' => 3,
			'tax_item_id' => 3,
			'default' => 1
		),
		array(
			'customer_id' => 4,
			'tax_item_id' => 4,
			'default' => 1
		),
		array(
			'customer_id' => 5,
			'tax_item_id' => 5,
			'default' => 1
		),
		array(
			'customer_id' => 6,
			'tax_item_id' => 6,
			'default' => 1
		),
		array(
			'customer_id' => 7,
			'tax_item_id' => 7,
			'default' => 1
		),
		array(
			'customer_id' => 8,
			'tax_item_id' => 8,
			'default' => 1
		),
		array(
			'customer_id' => 9,
			'tax_item_id' => 9,
			'default' => 1
		),
		array(
			'customer_id' => 10,
			'tax_item_id' => 10,
			'default' => 1
		),
	);

}
