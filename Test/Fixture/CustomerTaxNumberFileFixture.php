<?php
/**
 * CustomerTaxNumberFileFixture
 *
 */
class CustomerTaxNumberFileFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'customer_tax_number_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'ref_id' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 14, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'ref_table' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 50, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'name' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'created_by' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
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
			'customer_tax_number_id' => 1,
			'ref_id' => 'Lorem ipsum ',
			'ref_table' => 'Lorem ipsum dolor sit amet',
			'name' => 'Lorem ipsum dolor sit amet',
			'created' => '2012-08-02 17:21:05',
			'created_by' => 1
		),
		array(
			'id' => 2,
			'customer_tax_number_id' => 2,
			'ref_id' => 'Lorem ipsum ',
			'ref_table' => 'Lorem ipsum dolor sit amet',
			'name' => 'Lorem ipsum dolor sit amet',
			'created' => '2012-08-02 17:21:05',
			'created_by' => 2
		),
		array(
			'id' => 3,
			'customer_tax_number_id' => 3,
			'ref_id' => 'Lorem ipsum ',
			'ref_table' => 'Lorem ipsum dolor sit amet',
			'name' => 'Lorem ipsum dolor sit amet',
			'created' => '2012-08-02 17:21:05',
			'created_by' => 3
		),
		array(
			'id' => 4,
			'customer_tax_number_id' => 4,
			'ref_id' => 'Lorem ipsum ',
			'ref_table' => 'Lorem ipsum dolor sit amet',
			'name' => 'Lorem ipsum dolor sit amet',
			'created' => '2012-08-02 17:21:05',
			'created_by' => 4
		),
		array(
			'id' => 5,
			'customer_tax_number_id' => 5,
			'ref_id' => 'Lorem ipsum ',
			'ref_table' => 'Lorem ipsum dolor sit amet',
			'name' => 'Lorem ipsum dolor sit amet',
			'created' => '2012-08-02 17:21:05',
			'created_by' => 5
		),
		array(
			'id' => 6,
			'customer_tax_number_id' => 6,
			'ref_id' => 'Lorem ipsum ',
			'ref_table' => 'Lorem ipsum dolor sit amet',
			'name' => 'Lorem ipsum dolor sit amet',
			'created' => '2012-08-02 17:21:05',
			'created_by' => 6
		),
		array(
			'id' => 7,
			'customer_tax_number_id' => 7,
			'ref_id' => 'Lorem ipsum ',
			'ref_table' => 'Lorem ipsum dolor sit amet',
			'name' => 'Lorem ipsum dolor sit amet',
			'created' => '2012-08-02 17:21:05',
			'created_by' => 7
		),
		array(
			'id' => 8,
			'customer_tax_number_id' => 8,
			'ref_id' => 'Lorem ipsum ',
			'ref_table' => 'Lorem ipsum dolor sit amet',
			'name' => 'Lorem ipsum dolor sit amet',
			'created' => '2012-08-02 17:21:05',
			'created_by' => 8
		),
		array(
			'id' => 9,
			'customer_tax_number_id' => 9,
			'ref_id' => 'Lorem ipsum ',
			'ref_table' => 'Lorem ipsum dolor sit amet',
			'name' => 'Lorem ipsum dolor sit amet',
			'created' => '2012-08-02 17:21:05',
			'created_by' => 9
		),
		array(
			'id' => 10,
			'customer_tax_number_id' => 10,
			'ref_id' => 'Lorem ipsum ',
			'ref_table' => 'Lorem ipsum dolor sit amet',
			'name' => 'Lorem ipsum dolor sit amet',
			'created' => '2012-08-02 17:21:05',
			'created_by' => 10
		),
	);

}
