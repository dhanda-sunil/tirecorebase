<?php
/**
 * VendorItemFixture
 *
 */
class VendorItemFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'vendor_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'is_material' => array('type' => 'boolean', 'null' => true, 'default' => null),
		'name' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'part_number' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'upc' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 200, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'price' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => '8,2'),
		'weight' => array('type' => 'float', 'null' => false, 'default' => '0.000', 'length' => '8,3'),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'created_by' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 8),
		'modified_by' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 8),
		'inactive' => array('type' => 'boolean', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
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
			'is_material' => 1,
			'name' => 'Lorem ipsum dolor sit amet',
			'part_number' => 'Lorem ipsum dolor sit amet',
			'upc' => 'Lorem ipsum dolor sit amet',
			'price' => 1,
			'weight' => 1,
			'created' => '2012-08-02 17:26:56',
			'created_by' => 1,
			'modified_by' => 1,
			'inactive' => 1
		),
		array(
			'id' => 2,
			'vendor_id' => 2,
			'is_material' => 1,
			'name' => 'Lorem ipsum dolor sit amet',
			'part_number' => 'Lorem ipsum dolor sit amet',
			'upc' => 'Lorem ipsum dolor sit amet',
			'price' => 2,
			'weight' => 2,
			'created' => '2012-08-02 17:26:56',
			'created_by' => 2,
			'modified_by' => 2,
			'inactive' => 1
		),
		array(
			'id' => 3,
			'vendor_id' => 3,
			'is_material' => 1,
			'name' => 'Lorem ipsum dolor sit amet',
			'part_number' => 'Lorem ipsum dolor sit amet',
			'upc' => 'Lorem ipsum dolor sit amet',
			'price' => 3,
			'weight' => 3,
			'created' => '2012-08-02 17:26:56',
			'created_by' => 3,
			'modified_by' => 3,
			'inactive' => 1
		),
		array(
			'id' => 4,
			'vendor_id' => 4,
			'is_material' => 1,
			'name' => 'Lorem ipsum dolor sit amet',
			'part_number' => 'Lorem ipsum dolor sit amet',
			'upc' => 'Lorem ipsum dolor sit amet',
			'price' => 4,
			'weight' => 4,
			'created' => '2012-08-02 17:26:56',
			'created_by' => 4,
			'modified_by' => 4,
			'inactive' => 1
		),
		array(
			'id' => 5,
			'vendor_id' => 5,
			'is_material' => 1,
			'name' => 'Lorem ipsum dolor sit amet',
			'part_number' => 'Lorem ipsum dolor sit amet',
			'upc' => 'Lorem ipsum dolor sit amet',
			'price' => 5,
			'weight' => 5,
			'created' => '2012-08-02 17:26:56',
			'created_by' => 5,
			'modified_by' => 5,
			'inactive' => 1
		),
		array(
			'id' => 6,
			'vendor_id' => 6,
			'is_material' => 1,
			'name' => 'Lorem ipsum dolor sit amet',
			'part_number' => 'Lorem ipsum dolor sit amet',
			'upc' => 'Lorem ipsum dolor sit amet',
			'price' => 6,
			'weight' => 6,
			'created' => '2012-08-02 17:26:56',
			'created_by' => 6,
			'modified_by' => 6,
			'inactive' => 1
		),
		array(
			'id' => 7,
			'vendor_id' => 7,
			'is_material' => 1,
			'name' => 'Lorem ipsum dolor sit amet',
			'part_number' => 'Lorem ipsum dolor sit amet',
			'upc' => 'Lorem ipsum dolor sit amet',
			'price' => 7,
			'weight' => 7,
			'created' => '2012-08-02 17:26:56',
			'created_by' => 7,
			'modified_by' => 7,
			'inactive' => 1
		),
		array(
			'id' => 8,
			'vendor_id' => 8,
			'is_material' => 1,
			'name' => 'Lorem ipsum dolor sit amet',
			'part_number' => 'Lorem ipsum dolor sit amet',
			'upc' => 'Lorem ipsum dolor sit amet',
			'price' => 8,
			'weight' => 8,
			'created' => '2012-08-02 17:26:56',
			'created_by' => 8,
			'modified_by' => 8,
			'inactive' => 1
		),
		array(
			'id' => 9,
			'vendor_id' => 9,
			'is_material' => 1,
			'name' => 'Lorem ipsum dolor sit amet',
			'part_number' => 'Lorem ipsum dolor sit amet',
			'upc' => 'Lorem ipsum dolor sit amet',
			'price' => 9,
			'weight' => 9,
			'created' => '2012-08-02 17:26:56',
			'created_by' => 9,
			'modified_by' => 9,
			'inactive' => 1
		),
		array(
			'id' => 10,
			'vendor_id' => 10,
			'is_material' => 1,
			'name' => 'Lorem ipsum dolor sit amet',
			'part_number' => 'Lorem ipsum dolor sit amet',
			'upc' => 'Lorem ipsum dolor sit amet',
			'price' => 10,
			'weight' => 10,
			'created' => '2012-08-02 17:26:56',
			'created_by' => 10,
			'modified_by' => 10,
			'inactive' => 1
		),
	);

}
