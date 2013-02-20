<?php
/**
 * VendorFixture
 *
 */
class VendorFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 8, 'key' => 'primary'),
		'name' => array('type' => 'string', 'null' => false, 'default' => null, 'key' => 'index', 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'website' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'tax_number' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 100, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'tax_number_expiration' => array('type' => 'date', 'null' => false, 'default' => null),
		'sets_basis' => array('type' => 'boolean', 'null' => false, 'default' => null),
		'manufacturer_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 5),
		'default_term_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 6),
		'activant_seller_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'active' => array('type' => 'boolean', 'null' => false, 'default' => '1'),
		'deleted' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'deleted_by' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 5),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'active' => array('column' => 'name', 'unique' => 0)
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
			'name' => 'Lorem ipsum dolor sit amet',
			'website' => 'Lorem ipsum dolor sit amet',
			'tax_number' => 'Lorem ipsum dolor sit amet',
			'tax_number_expiration' => '2012-08-02',
			'sets_basis' => 1,
			'manufacturer_id' => 1,
			'default_term_id' => 1,
			'activant_seller_id' => 1,
			'active' => 1,
			'deleted' => '2012-08-02 17:27:00',
			'deleted_by' => 1
		),
		array(
			'id' => 2,
			'name' => 'Lorem ipsum dolor sit amet',
			'website' => 'Lorem ipsum dolor sit amet',
			'tax_number' => 'Lorem ipsum dolor sit amet',
			'tax_number_expiration' => '2012-08-02',
			'sets_basis' => 1,
			'manufacturer_id' => 2,
			'default_term_id' => 2,
			'activant_seller_id' => 2,
			'active' => 1,
			'deleted' => '2012-08-02 17:27:00',
			'deleted_by' => 2
		),
		array(
			'id' => 3,
			'name' => 'Lorem ipsum dolor sit amet',
			'website' => 'Lorem ipsum dolor sit amet',
			'tax_number' => 'Lorem ipsum dolor sit amet',
			'tax_number_expiration' => '2012-08-02',
			'sets_basis' => 1,
			'manufacturer_id' => 3,
			'default_term_id' => 3,
			'activant_seller_id' => 3,
			'active' => 1,
			'deleted' => '2012-08-02 17:27:00',
			'deleted_by' => 3
		),
		array(
			'id' => 4,
			'name' => 'Lorem ipsum dolor sit amet',
			'website' => 'Lorem ipsum dolor sit amet',
			'tax_number' => 'Lorem ipsum dolor sit amet',
			'tax_number_expiration' => '2012-08-02',
			'sets_basis' => 1,
			'manufacturer_id' => 4,
			'default_term_id' => 4,
			'activant_seller_id' => 4,
			'active' => 1,
			'deleted' => '2012-08-02 17:27:00',
			'deleted_by' => 4
		),
		array(
			'id' => 5,
			'name' => 'Lorem ipsum dolor sit amet',
			'website' => 'Lorem ipsum dolor sit amet',
			'tax_number' => 'Lorem ipsum dolor sit amet',
			'tax_number_expiration' => '2012-08-02',
			'sets_basis' => 1,
			'manufacturer_id' => 5,
			'default_term_id' => 5,
			'activant_seller_id' => 5,
			'active' => 1,
			'deleted' => '2012-08-02 17:27:00',
			'deleted_by' => 5
		),
		array(
			'id' => 6,
			'name' => 'Lorem ipsum dolor sit amet',
			'website' => 'Lorem ipsum dolor sit amet',
			'tax_number' => 'Lorem ipsum dolor sit amet',
			'tax_number_expiration' => '2012-08-02',
			'sets_basis' => 1,
			'manufacturer_id' => 6,
			'default_term_id' => 6,
			'activant_seller_id' => 6,
			'active' => 1,
			'deleted' => '2012-08-02 17:27:00',
			'deleted_by' => 6
		),
		array(
			'id' => 7,
			'name' => 'Lorem ipsum dolor sit amet',
			'website' => 'Lorem ipsum dolor sit amet',
			'tax_number' => 'Lorem ipsum dolor sit amet',
			'tax_number_expiration' => '2012-08-02',
			'sets_basis' => 1,
			'manufacturer_id' => 7,
			'default_term_id' => 7,
			'activant_seller_id' => 7,
			'active' => 1,
			'deleted' => '2012-08-02 17:27:00',
			'deleted_by' => 7
		),
		array(
			'id' => 8,
			'name' => 'Lorem ipsum dolor sit amet',
			'website' => 'Lorem ipsum dolor sit amet',
			'tax_number' => 'Lorem ipsum dolor sit amet',
			'tax_number_expiration' => '2012-08-02',
			'sets_basis' => 1,
			'manufacturer_id' => 8,
			'default_term_id' => 8,
			'activant_seller_id' => 8,
			'active' => 1,
			'deleted' => '2012-08-02 17:27:00',
			'deleted_by' => 8
		),
		array(
			'id' => 9,
			'name' => 'Lorem ipsum dolor sit amet',
			'website' => 'Lorem ipsum dolor sit amet',
			'tax_number' => 'Lorem ipsum dolor sit amet',
			'tax_number_expiration' => '2012-08-02',
			'sets_basis' => 1,
			'manufacturer_id' => 9,
			'default_term_id' => 9,
			'activant_seller_id' => 9,
			'active' => 1,
			'deleted' => '2012-08-02 17:27:00',
			'deleted_by' => 9
		),
		array(
			'id' => 10,
			'name' => 'Lorem ipsum dolor sit amet',
			'website' => 'Lorem ipsum dolor sit amet',
			'tax_number' => 'Lorem ipsum dolor sit amet',
			'tax_number_expiration' => '2012-08-02',
			'sets_basis' => 1,
			'manufacturer_id' => 10,
			'default_term_id' => 10,
			'activant_seller_id' => 10,
			'active' => 1,
			'deleted' => '2012-08-02 17:27:00',
			'deleted_by' => 10
		),
	);

}
