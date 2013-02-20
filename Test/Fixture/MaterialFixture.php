<?php
/**
 * MaterialFixture
 *
 */
class MaterialFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'manufacturer_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'manufacturers_products_line_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'name' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'part_number' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 50, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'manf_part_number' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 60, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'tread_width' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => '6,3'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'material_measurement_id' => array('column' => 'material_uom', 'unique' => 0)
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
			'manufacturer_id' => 1,
			'manufacturers_products_line_id' => 1,
			'name' => 'Lorem ipsum dolor sit amet',
			'part_number' => 'Lorem ipsum dolor sit amet',
			'manf_part_number' => 'Lorem ipsum dolor sit amet',
			'tread_width' => 1
		),
		array(
			'id' => 2,
			'manufacturer_id' => 2,
			'manufacturers_products_line_id' => 2,
			'name' => 'Lorem ipsum dolor sit amet',
			'part_number' => 'Lorem ipsum dolor sit amet',
			'manf_part_number' => 'Lorem ipsum dolor sit amet',
			'tread_width' => 2
		),
		array(
			'id' => 3,
			'manufacturer_id' => 3,
			'manufacturers_products_line_id' => 3,
			'name' => 'Lorem ipsum dolor sit amet',
			'part_number' => 'Lorem ipsum dolor sit amet',
			'manf_part_number' => 'Lorem ipsum dolor sit amet',
			'tread_width' => 3
		),
		array(
			'id' => 4,
			'manufacturer_id' => 4,
			'manufacturers_products_line_id' => 4,
			'name' => 'Lorem ipsum dolor sit amet',
			'part_number' => 'Lorem ipsum dolor sit amet',
			'manf_part_number' => 'Lorem ipsum dolor sit amet',
			'tread_width' => 4
		),
		array(
			'id' => 5,
			'manufacturer_id' => 5,
			'manufacturers_products_line_id' => 5,
			'name' => 'Lorem ipsum dolor sit amet',
			'part_number' => 'Lorem ipsum dolor sit amet',
			'manf_part_number' => 'Lorem ipsum dolor sit amet',
			'tread_width' => 5
		),
		array(
			'id' => 6,
			'manufacturer_id' => 6,
			'manufacturers_products_line_id' => 6,
			'name' => 'Lorem ipsum dolor sit amet',
			'part_number' => 'Lorem ipsum dolor sit amet',
			'manf_part_number' => 'Lorem ipsum dolor sit amet',
			'tread_width' => 6
		),
		array(
			'id' => 7,
			'manufacturer_id' => 7,
			'manufacturers_products_line_id' => 7,
			'name' => 'Lorem ipsum dolor sit amet',
			'part_number' => 'Lorem ipsum dolor sit amet',
			'manf_part_number' => 'Lorem ipsum dolor sit amet',
			'tread_width' => 7
		),
		array(
			'id' => 8,
			'manufacturer_id' => 8,
			'manufacturers_products_line_id' => 8,
			'name' => 'Lorem ipsum dolor sit amet',
			'part_number' => 'Lorem ipsum dolor sit amet',
			'manf_part_number' => 'Lorem ipsum dolor sit amet',
			'tread_width' => 8
		),
		array(
			'id' => 9,
			'manufacturer_id' => 9,
			'manufacturers_products_line_id' => 9,
			'name' => 'Lorem ipsum dolor sit amet',
			'part_number' => 'Lorem ipsum dolor sit amet',
			'manf_part_number' => 'Lorem ipsum dolor sit amet',
			'tread_width' => 9
		),
		array(
			'id' => 10,
			'manufacturer_id' => 10,
			'manufacturers_products_line_id' => 10,
			'name' => 'Lorem ipsum dolor sit amet',
			'part_number' => 'Lorem ipsum dolor sit amet',
			'manf_part_number' => 'Lorem ipsum dolor sit amet',
			'tread_width' => 10
		),
	);

}
