<?php
/**
 * NewCustomersHiddenTaxItemOverwriteFixture
 *
 */
class NewCustomersHiddenTaxItemOverwriteFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'hidden_tax_item_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'tax_item_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'customer_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'indexes' => array(
			'PRIMARY' => array('column' => array('hidden_tax_item_id', 'tax_item_id', 'customer_id'), 'unique' => 1)
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
			'hidden_tax_item_id' => 1,
			'tax_item_id' => 1,
			'customer_id' => 1
		),
		array(
			'hidden_tax_item_id' => 2,
			'tax_item_id' => 2,
			'customer_id' => 2
		),
		array(
			'hidden_tax_item_id' => 3,
			'tax_item_id' => 3,
			'customer_id' => 3
		),
		array(
			'hidden_tax_item_id' => 4,
			'tax_item_id' => 4,
			'customer_id' => 4
		),
		array(
			'hidden_tax_item_id' => 5,
			'tax_item_id' => 5,
			'customer_id' => 5
		),
		array(
			'hidden_tax_item_id' => 6,
			'tax_item_id' => 6,
			'customer_id' => 6
		),
		array(
			'hidden_tax_item_id' => 7,
			'tax_item_id' => 7,
			'customer_id' => 7
		),
		array(
			'hidden_tax_item_id' => 8,
			'tax_item_id' => 8,
			'customer_id' => 8
		),
		array(
			'hidden_tax_item_id' => 9,
			'tax_item_id' => 9,
			'customer_id' => 9
		),
		array(
			'hidden_tax_item_id' => 10,
			'tax_item_id' => 10,
			'customer_id' => 10
		),
	);

}
