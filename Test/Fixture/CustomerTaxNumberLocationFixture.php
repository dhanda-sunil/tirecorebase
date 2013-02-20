<?php
/**
 * CustomerTaxNumberLocationFixture
 *
 */
class CustomerTaxNumberLocationFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'customer_tax_number_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'index'),
		'location_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'indexes' => array(
			'customer_tax_number_id' => array('column' => array('customer_tax_number_id', 'location_id'), 'unique' => 0)
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
			'customer_tax_number_id' => 1,
			'location_id' => 1
		),
		array(
			'customer_tax_number_id' => 2,
			'location_id' => 2
		),
		array(
			'customer_tax_number_id' => 3,
			'location_id' => 3
		),
		array(
			'customer_tax_number_id' => 4,
			'location_id' => 4
		),
		array(
			'customer_tax_number_id' => 5,
			'location_id' => 5
		),
		array(
			'customer_tax_number_id' => 6,
			'location_id' => 6
		),
		array(
			'customer_tax_number_id' => 7,
			'location_id' => 7
		),
		array(
			'customer_tax_number_id' => 8,
			'location_id' => 8
		),
		array(
			'customer_tax_number_id' => 9,
			'location_id' => 9
		),
		array(
			'customer_tax_number_id' => 10,
			'location_id' => 10
		),
	);

}
