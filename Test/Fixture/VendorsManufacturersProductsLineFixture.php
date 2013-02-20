<?php
/**
 * VendorsManufacturersProductsLineFixture
 *
 */
class VendorsManufacturersProductsLineFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'vendor_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 5, 'key' => 'index'),
		'manufacturer_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 5),
		'manufacturers_products_line_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 5),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'vendor_id' => array('column' => array('vendor_id', 'manufacturer_id', 'manufacturers_products_line_id'), 'unique' => 1)
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
			'vendor_id' => 1,
			'manufacturer_id' => 1,
			'manufacturers_products_line_id' => 1
		),
		array(
			'id' => 2,
			'vendor_id' => 2,
			'manufacturer_id' => 2,
			'manufacturers_products_line_id' => 2
		),
		array(
			'id' => 3,
			'vendor_id' => 3,
			'manufacturer_id' => 3,
			'manufacturers_products_line_id' => 3
		),
		array(
			'id' => 4,
			'vendor_id' => 4,
			'manufacturer_id' => 4,
			'manufacturers_products_line_id' => 4
		),
		array(
			'id' => 5,
			'vendor_id' => 5,
			'manufacturer_id' => 5,
			'manufacturers_products_line_id' => 5
		),
		array(
			'id' => 6,
			'vendor_id' => 6,
			'manufacturer_id' => 6,
			'manufacturers_products_line_id' => 6
		),
		array(
			'id' => 7,
			'vendor_id' => 7,
			'manufacturer_id' => 7,
			'manufacturers_products_line_id' => 7
		),
		array(
			'id' => 8,
			'vendor_id' => 8,
			'manufacturer_id' => 8,
			'manufacturers_products_line_id' => 8
		),
		array(
			'id' => 9,
			'vendor_id' => 9,
			'manufacturer_id' => 9,
			'manufacturers_products_line_id' => 9
		),
		array(
			'id' => 10,
			'vendor_id' => 10,
			'manufacturer_id' => 10,
			'manufacturers_products_line_id' => 10
		),
	);

}
