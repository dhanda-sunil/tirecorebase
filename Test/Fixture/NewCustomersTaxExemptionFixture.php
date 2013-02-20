<?php
/**
 * NewCustomersTaxExemptionFixture
 *
 */
class NewCustomersTaxExemptionFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'customer_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'index'),
		'tax_exempt_number' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 127, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'exp' => array('type' => 'date', 'null' => false, 'default' => null),
		'tax_file_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'have_file' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 3),
		'default' => array('type' => 'boolean', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'customer_id' => array('column' => array('customer_id', 'exp'), 'unique' => 0)
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
			'id' => 1,
			'customer_id' => 1,
			'tax_exempt_number' => 'Lorem ipsum dolor sit amet',
			'exp' => '2012-08-02',
			'tax_file_id' => 1,
			'have_file' => 1,
			'default' => 1
		),
		array(
			'id' => 2,
			'customer_id' => 2,
			'tax_exempt_number' => 'Lorem ipsum dolor sit amet',
			'exp' => '2012-08-02',
			'tax_file_id' => 2,
			'have_file' => 2,
			'default' => 1
		),
		array(
			'id' => 3,
			'customer_id' => 3,
			'tax_exempt_number' => 'Lorem ipsum dolor sit amet',
			'exp' => '2012-08-02',
			'tax_file_id' => 3,
			'have_file' => 3,
			'default' => 1
		),
		array(
			'id' => 4,
			'customer_id' => 4,
			'tax_exempt_number' => 'Lorem ipsum dolor sit amet',
			'exp' => '2012-08-02',
			'tax_file_id' => 4,
			'have_file' => 4,
			'default' => 1
		),
		array(
			'id' => 5,
			'customer_id' => 5,
			'tax_exempt_number' => 'Lorem ipsum dolor sit amet',
			'exp' => '2012-08-02',
			'tax_file_id' => 5,
			'have_file' => 5,
			'default' => 1
		),
		array(
			'id' => 6,
			'customer_id' => 6,
			'tax_exempt_number' => 'Lorem ipsum dolor sit amet',
			'exp' => '2012-08-02',
			'tax_file_id' => 6,
			'have_file' => 6,
			'default' => 1
		),
		array(
			'id' => 7,
			'customer_id' => 7,
			'tax_exempt_number' => 'Lorem ipsum dolor sit amet',
			'exp' => '2012-08-02',
			'tax_file_id' => 7,
			'have_file' => 7,
			'default' => 1
		),
		array(
			'id' => 8,
			'customer_id' => 8,
			'tax_exempt_number' => 'Lorem ipsum dolor sit amet',
			'exp' => '2012-08-02',
			'tax_file_id' => 8,
			'have_file' => 8,
			'default' => 1
		),
		array(
			'id' => 9,
			'customer_id' => 9,
			'tax_exempt_number' => 'Lorem ipsum dolor sit amet',
			'exp' => '2012-08-02',
			'tax_file_id' => 9,
			'have_file' => 9,
			'default' => 1
		),
		array(
			'id' => 10,
			'customer_id' => 10,
			'tax_exempt_number' => 'Lorem ipsum dolor sit amet',
			'exp' => '2012-08-02',
			'tax_file_id' => 10,
			'have_file' => 10,
			'default' => 1
		),
	);

}
