<?php
/**
 * NewCustomersTaxExemptionsTaxIdFixture
 *
 */
class NewCustomersTaxExemptionsTaxIdFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'customers_tax_exemption_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'tax_item_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'indexes' => array(
			'PRIMARY' => array('column' => array('customers_tax_exemption_id', 'tax_item_id'), 'unique' => 1)
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
			'customers_tax_exemption_id' => 1,
			'tax_item_id' => 1
		),
		array(
			'customers_tax_exemption_id' => 2,
			'tax_item_id' => 2
		),
		array(
			'customers_tax_exemption_id' => 3,
			'tax_item_id' => 3
		),
		array(
			'customers_tax_exemption_id' => 4,
			'tax_item_id' => 4
		),
		array(
			'customers_tax_exemption_id' => 5,
			'tax_item_id' => 5
		),
		array(
			'customers_tax_exemption_id' => 6,
			'tax_item_id' => 6
		),
		array(
			'customers_tax_exemption_id' => 7,
			'tax_item_id' => 7
		),
		array(
			'customers_tax_exemption_id' => 8,
			'tax_item_id' => 8
		),
		array(
			'customers_tax_exemption_id' => 9,
			'tax_item_id' => 9
		),
		array(
			'customers_tax_exemption_id' => 10,
			'tax_item_id' => 10
		),
	);

}
