<?php
/**
 * ManufacturerProductLineFixture
 *
 */
class ManufacturerProductLineFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'manufacturer_plant_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'manufacturer_product_line_group_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'is_material' => array('type' => 'boolean', 'null' => true, 'default' => null),
		'dot_code' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 4, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'name' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'order' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 5, 'key' => 'index'),
		'material_size_list' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'deleted' => array('type' => 'datetime', 'null' => true, 'default' => null, 'key' => 'index'),
		'deleted_by' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 10),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'manufacturer_id' => array('column' => array('manufacturer_plant_id', 'name'), 'unique' => 0),
			'deleted' => array('column' => 'deleted', 'unique' => 0),
			'order' => array('column' => 'order', 'unique' => 0)
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
			'manufacturer_plant_id' => 1,
			'manufacturer_product_line_group_id' => 1,
			'is_material' => 1,
			'dot_code' => 'Lo',
			'name' => 'Lorem ipsum dolor sit amet',
			'order' => 1,
			'material_size_list' => 'Lorem ipsum dolor sit amet',
			'deleted' => '2012-12-05 00:13:10',
			'deleted_by' => 1
		),
		array(
			'id' => 2,
			'manufacturer_plant_id' => 2,
			'manufacturer_product_line_group_id' => 2,
			'is_material' => 1,
			'dot_code' => 'Lo',
			'name' => 'Lorem ipsum dolor sit amet',
			'order' => 2,
			'material_size_list' => 'Lorem ipsum dolor sit amet',
			'deleted' => '2012-12-05 00:13:10',
			'deleted_by' => 2
		),
		array(
			'id' => 3,
			'manufacturer_plant_id' => 3,
			'manufacturer_product_line_group_id' => 3,
			'is_material' => 1,
			'dot_code' => 'Lo',
			'name' => 'Lorem ipsum dolor sit amet',
			'order' => 3,
			'material_size_list' => 'Lorem ipsum dolor sit amet',
			'deleted' => '2012-12-05 00:13:10',
			'deleted_by' => 3
		),
		array(
			'id' => 4,
			'manufacturer_plant_id' => 4,
			'manufacturer_product_line_group_id' => 4,
			'is_material' => 1,
			'dot_code' => 'Lo',
			'name' => 'Lorem ipsum dolor sit amet',
			'order' => 4,
			'material_size_list' => 'Lorem ipsum dolor sit amet',
			'deleted' => '2012-12-05 00:13:10',
			'deleted_by' => 4
		),
		array(
			'id' => 5,
			'manufacturer_plant_id' => 5,
			'manufacturer_product_line_group_id' => 5,
			'is_material' => 1,
			'dot_code' => 'Lo',
			'name' => 'Lorem ipsum dolor sit amet',
			'order' => 5,
			'material_size_list' => 'Lorem ipsum dolor sit amet',
			'deleted' => '2012-12-05 00:13:10',
			'deleted_by' => 5
		),
		array(
			'id' => 6,
			'manufacturer_plant_id' => 6,
			'manufacturer_product_line_group_id' => 6,
			'is_material' => 1,
			'dot_code' => 'Lo',
			'name' => 'Lorem ipsum dolor sit amet',
			'order' => 6,
			'material_size_list' => 'Lorem ipsum dolor sit amet',
			'deleted' => '2012-12-05 00:13:10',
			'deleted_by' => 6
		),
		array(
			'id' => 7,
			'manufacturer_plant_id' => 7,
			'manufacturer_product_line_group_id' => 7,
			'is_material' => 1,
			'dot_code' => 'Lo',
			'name' => 'Lorem ipsum dolor sit amet',
			'order' => 7,
			'material_size_list' => 'Lorem ipsum dolor sit amet',
			'deleted' => '2012-12-05 00:13:10',
			'deleted_by' => 7
		),
		array(
			'id' => 8,
			'manufacturer_plant_id' => 8,
			'manufacturer_product_line_group_id' => 8,
			'is_material' => 1,
			'dot_code' => 'Lo',
			'name' => 'Lorem ipsum dolor sit amet',
			'order' => 8,
			'material_size_list' => 'Lorem ipsum dolor sit amet',
			'deleted' => '2012-12-05 00:13:10',
			'deleted_by' => 8
		),
		array(
			'id' => 9,
			'manufacturer_plant_id' => 9,
			'manufacturer_product_line_group_id' => 9,
			'is_material' => 1,
			'dot_code' => 'Lo',
			'name' => 'Lorem ipsum dolor sit amet',
			'order' => 9,
			'material_size_list' => 'Lorem ipsum dolor sit amet',
			'deleted' => '2012-12-05 00:13:10',
			'deleted_by' => 9
		),
		array(
			'id' => 10,
			'manufacturer_plant_id' => 10,
			'manufacturer_product_line_group_id' => 10,
			'is_material' => 1,
			'dot_code' => 'Lo',
			'name' => 'Lorem ipsum dolor sit amet',
			'order' => 10,
			'material_size_list' => 'Lorem ipsum dolor sit amet',
			'deleted' => '2012-12-05 00:13:10',
			'deleted_by' => 10
		),
	);

}
