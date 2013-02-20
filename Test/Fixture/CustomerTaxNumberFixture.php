<?php
/**
 * CustomerTaxNumberFixture
 *
 */
class CustomerTaxNumberFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'customer_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'tax_exempt_number' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'expiration_date' => array('type' => 'date', 'null' => false, 'default' => null),
		'tax_file_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'have_file' => array('type' => 'boolean', 'null' => false, 'default' => '0'),
		'city' => array('type' => 'boolean', 'null' => false, 'default' => '0'),
		'county' => array('type' => 'boolean', 'null' => false, 'default' => '0'),
		'state' => array('type' => 'boolean', 'null' => false, 'default' => '0'),
		'federal' => array('type' => 'boolean', 'null' => false, 'default' => '0'),
		'fet' => array('type' => 'boolean', 'null' => false, 'default' => '0'),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'created_by' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'index'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'created_by' => array('column' => 'created_by', 'unique' => 0)
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
			'expiration_date' => '2012-08-02',
			'tax_file_id' => 1,
			'have_file' => 1,
			'city' => 1,
			'county' => 1,
			'state' => 1,
			'federal' => 1,
			'fet' => 1,
			'created' => '2012-08-02 17:21:10',
			'created_by' => 1
		),
		array(
			'id' => 2,
			'customer_id' => 2,
			'tax_exempt_number' => 'Lorem ipsum dolor sit amet',
			'expiration_date' => '2012-08-02',
			'tax_file_id' => 2,
			'have_file' => 1,
			'city' => 1,
			'county' => 1,
			'state' => 1,
			'federal' => 1,
			'fet' => 1,
			'created' => '2012-08-02 17:21:10',
			'created_by' => 2
		),
		array(
			'id' => 3,
			'customer_id' => 3,
			'tax_exempt_number' => 'Lorem ipsum dolor sit amet',
			'expiration_date' => '2012-08-02',
			'tax_file_id' => 3,
			'have_file' => 1,
			'city' => 1,
			'county' => 1,
			'state' => 1,
			'federal' => 1,
			'fet' => 1,
			'created' => '2012-08-02 17:21:10',
			'created_by' => 3
		),
		array(
			'id' => 4,
			'customer_id' => 4,
			'tax_exempt_number' => 'Lorem ipsum dolor sit amet',
			'expiration_date' => '2012-08-02',
			'tax_file_id' => 4,
			'have_file' => 1,
			'city' => 1,
			'county' => 1,
			'state' => 1,
			'federal' => 1,
			'fet' => 1,
			'created' => '2012-08-02 17:21:10',
			'created_by' => 4
		),
		array(
			'id' => 5,
			'customer_id' => 5,
			'tax_exempt_number' => 'Lorem ipsum dolor sit amet',
			'expiration_date' => '2012-08-02',
			'tax_file_id' => 5,
			'have_file' => 1,
			'city' => 1,
			'county' => 1,
			'state' => 1,
			'federal' => 1,
			'fet' => 1,
			'created' => '2012-08-02 17:21:10',
			'created_by' => 5
		),
		array(
			'id' => 6,
			'customer_id' => 6,
			'tax_exempt_number' => 'Lorem ipsum dolor sit amet',
			'expiration_date' => '2012-08-02',
			'tax_file_id' => 6,
			'have_file' => 1,
			'city' => 1,
			'county' => 1,
			'state' => 1,
			'federal' => 1,
			'fet' => 1,
			'created' => '2012-08-02 17:21:10',
			'created_by' => 6
		),
		array(
			'id' => 7,
			'customer_id' => 7,
			'tax_exempt_number' => 'Lorem ipsum dolor sit amet',
			'expiration_date' => '2012-08-02',
			'tax_file_id' => 7,
			'have_file' => 1,
			'city' => 1,
			'county' => 1,
			'state' => 1,
			'federal' => 1,
			'fet' => 1,
			'created' => '2012-08-02 17:21:10',
			'created_by' => 7
		),
		array(
			'id' => 8,
			'customer_id' => 8,
			'tax_exempt_number' => 'Lorem ipsum dolor sit amet',
			'expiration_date' => '2012-08-02',
			'tax_file_id' => 8,
			'have_file' => 1,
			'city' => 1,
			'county' => 1,
			'state' => 1,
			'federal' => 1,
			'fet' => 1,
			'created' => '2012-08-02 17:21:10',
			'created_by' => 8
		),
		array(
			'id' => 9,
			'customer_id' => 9,
			'tax_exempt_number' => 'Lorem ipsum dolor sit amet',
			'expiration_date' => '2012-08-02',
			'tax_file_id' => 9,
			'have_file' => 1,
			'city' => 1,
			'county' => 1,
			'state' => 1,
			'federal' => 1,
			'fet' => 1,
			'created' => '2012-08-02 17:21:10',
			'created_by' => 9
		),
		array(
			'id' => 10,
			'customer_id' => 10,
			'tax_exempt_number' => 'Lorem ipsum dolor sit amet',
			'expiration_date' => '2012-08-02',
			'tax_file_id' => 10,
			'have_file' => 1,
			'city' => 1,
			'county' => 1,
			'state' => 1,
			'federal' => 1,
			'fet' => 1,
			'created' => '2012-08-02 17:21:10',
			'created_by' => 10
		),
	);

}
