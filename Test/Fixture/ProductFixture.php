<?php
/**
 * ProductFixture
 *
 */
class ProductFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 7, 'key' => 'primary'),
		'product_type_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 6, 'key' => 'index'),
		'product_subtype_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 6, 'key' => 'index'),
		'tax_group_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'index'),
		'products_data_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'base_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 7),
		'name' => array('type' => 'string', 'null' => false, 'default' => null, 'key' => 'index', 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'description' => array('type' => 'text', 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'model' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'article_number' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 35, 'key' => 'index', 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'upc' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'key' => 'index', 'collate' => 'latin1_swedish_ci', 'comment' => 'manufacturer places code on product (not always on every product)', 'charset' => 'latin1'),
		'part_number' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 50, 'collate' => 'latin1_swedish_ci', 'comment' => 'internal company code', 'charset' => 'latin1'),
		'quick_search' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 50, 'key' => 'index', 'collate' => 'latin1_swedish_ci', 'comment' => 'not unique - used to do things like "find all tires of given size"', 'charset' => 'latin1'),
		'weight' => array('type' => 'float', 'null' => false, 'default' => '0.000', 'length' => '8,3'),
		'1_m3' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => '9,4'),
		'1_f3' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => '9,4'),
		'manufacturer_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 6, 'key' => 'index'),
		'manufacturers_products_line_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'products_measurement_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'special_tax_fet' => array('type' => 'float', 'null' => true, 'default' => null, 'length' => '6,2'),
		'warranty' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 10),
		'width' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 10, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'ratio' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 10, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'rim' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 10, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'products_side_wall_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 5),
		'products_load_range_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 5),
		'products_temperature_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 5),
		'tread_depth' => array('type' => 'float', 'null' => true, 'default' => null, 'length' => '9,2'),
		'treadwear' => array('type' => 'float', 'null' => true, 'default' => null, 'length' => '9,2'),
		'products_traction_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 10),
		'load_index' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 15, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'products_speed_rating_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 3),
		'products_ply_type_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 3),
		'products_base_type_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 3),
		'products_tread_type_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 5),
		'max_load_capacity' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 8),
		'back_spacing' => array('type' => 'float', 'null' => true, 'default' => null, 'length' => '9,3'),
		'offset' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 5),
		'lug_circle' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 10, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'lug_count' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 10, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'products_finish_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 3),
		'buy_price' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => '8,2'),
		'sell_price' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => '8,2'),
		'keywords' => array('type' => 'text', 'null' => false, 'default' => null, 'key' => 'index', 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'reps_prompt' => array('type' => 'boolean', 'null' => false, 'default' => '0'),
		'non_stock' => array('type' => 'boolean', 'null' => false, 'default' => '0'),
		'deleted' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'deleted_by' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 8),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'products_subtype_id' => array('column' => 'product_subtype_id', 'unique' => 0),
			'products_data_id' => array('column' => 'products_data_id', 'unique' => 0),
			'manufacturer_id' => array('column' => 'manufacturer_id', 'unique' => 0),
			'manufacturers_products_line_id' => array('column' => 'manufacturers_products_line_id', 'unique' => 0),
			'products_measurement_id' => array('column' => 'products_measurement_id', 'unique' => 0),
			'quick_search' => array('column' => 'quick_search', 'unique' => 0),
			'name' => array('column' => 'name', 'unique' => 0),
			'products_type_id' => array('column' => array('product_type_id', 'products_data_id', 'products_measurement_id', 'product_subtype_id'), 'unique' => 0),
			'upc_code' => array('column' => 'upc', 'unique' => 0),
			'article_number' => array('column' => 'article_number', 'unique' => 0),
			'tax_group_id' => array('column' => 'tax_group_id', 'unique' => 0),
			'keywords' => array('column' => 'keywords', 'unique' => 0)
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
			'product_type_id' => 1,
			'product_subtype_id' => 1,
			'tax_group_id' => 1,
			'products_data_id' => 1,
			'base_id' => 1,
			'name' => 'Lorem ipsum dolor sit amet',
			'description' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'model' => 'Lorem ipsum dolor sit amet',
			'article_number' => 'Lorem ipsum dolor sit amet',
			'upc' => 'Lorem ipsum dolor sit amet',
			'part_number' => 'Lorem ipsum dolor sit amet',
			'quick_search' => 'Lorem ipsum dolor sit amet',
			'weight' => 1,
			'1_m3' => 1,
			'1_f3' => 1,
			'manufacturer_id' => 1,
			'manufacturers_products_line_id' => 1,
			'products_measurement_id' => 1,
			'special_tax_fet' => 1,
			'warranty' => 1,
			'width' => 'Lorem ip',
			'ratio' => 'Lorem ip',
			'rim' => 'Lorem ip',
			'products_side_wall_id' => 1,
			'products_load_range_id' => 1,
			'products_temperature_id' => 1,
			'tread_depth' => 1,
			'treadwear' => 1,
			'products_traction_id' => 1,
			'load_index' => 'Lorem ipsum d',
			'products_speed_rating_id' => 1,
			'products_ply_type_id' => 1,
			'products_base_type_id' => 1,
			'products_tread_type_id' => 1,
			'max_load_capacity' => 1,
			'back_spacing' => 1,
			'offset' => 1,
			'lug_circle' => 'Lorem ip',
			'lug_count' => 'Lorem ip',
			'products_finish_id' => 1,
			'buy_price' => 1,
			'sell_price' => 1,
			'keywords' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'reps_prompt' => 1,
			'non_stock' => 1,
			'deleted' => '2012-08-02 17:24:11',
			'deleted_by' => 1
		),
		array(
			'id' => 2,
			'product_type_id' => 2,
			'product_subtype_id' => 2,
			'tax_group_id' => 2,
			'products_data_id' => 2,
			'base_id' => 2,
			'name' => 'Lorem ipsum dolor sit amet',
			'description' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'model' => 'Lorem ipsum dolor sit amet',
			'article_number' => 'Lorem ipsum dolor sit amet',
			'upc' => 'Lorem ipsum dolor sit amet',
			'part_number' => 'Lorem ipsum dolor sit amet',
			'quick_search' => 'Lorem ipsum dolor sit amet',
			'weight' => 2,
			'1_m3' => 2,
			'1_f3' => 2,
			'manufacturer_id' => 2,
			'manufacturers_products_line_id' => 2,
			'products_measurement_id' => 2,
			'special_tax_fet' => 2,
			'warranty' => 2,
			'width' => 'Lorem ip',
			'ratio' => 'Lorem ip',
			'rim' => 'Lorem ip',
			'products_side_wall_id' => 2,
			'products_load_range_id' => 2,
			'products_temperature_id' => 2,
			'tread_depth' => 2,
			'treadwear' => 2,
			'products_traction_id' => 2,
			'load_index' => 'Lorem ipsum d',
			'products_speed_rating_id' => 2,
			'products_ply_type_id' => 2,
			'products_base_type_id' => 2,
			'products_tread_type_id' => 2,
			'max_load_capacity' => 2,
			'back_spacing' => 2,
			'offset' => 2,
			'lug_circle' => 'Lorem ip',
			'lug_count' => 'Lorem ip',
			'products_finish_id' => 2,
			'buy_price' => 2,
			'sell_price' => 2,
			'keywords' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'reps_prompt' => 1,
			'non_stock' => 1,
			'deleted' => '2012-08-02 17:24:11',
			'deleted_by' => 2
		),
		array(
			'id' => 3,
			'product_type_id' => 3,
			'product_subtype_id' => 3,
			'tax_group_id' => 3,
			'products_data_id' => 3,
			'base_id' => 3,
			'name' => 'Lorem ipsum dolor sit amet',
			'description' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'model' => 'Lorem ipsum dolor sit amet',
			'article_number' => 'Lorem ipsum dolor sit amet',
			'upc' => 'Lorem ipsum dolor sit amet',
			'part_number' => 'Lorem ipsum dolor sit amet',
			'quick_search' => 'Lorem ipsum dolor sit amet',
			'weight' => 3,
			'1_m3' => 3,
			'1_f3' => 3,
			'manufacturer_id' => 3,
			'manufacturers_products_line_id' => 3,
			'products_measurement_id' => 3,
			'special_tax_fet' => 3,
			'warranty' => 3,
			'width' => 'Lorem ip',
			'ratio' => 'Lorem ip',
			'rim' => 'Lorem ip',
			'products_side_wall_id' => 3,
			'products_load_range_id' => 3,
			'products_temperature_id' => 3,
			'tread_depth' => 3,
			'treadwear' => 3,
			'products_traction_id' => 3,
			'load_index' => 'Lorem ipsum d',
			'products_speed_rating_id' => 3,
			'products_ply_type_id' => 3,
			'products_base_type_id' => 3,
			'products_tread_type_id' => 3,
			'max_load_capacity' => 3,
			'back_spacing' => 3,
			'offset' => 3,
			'lug_circle' => 'Lorem ip',
			'lug_count' => 'Lorem ip',
			'products_finish_id' => 3,
			'buy_price' => 3,
			'sell_price' => 3,
			'keywords' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'reps_prompt' => 1,
			'non_stock' => 1,
			'deleted' => '2012-08-02 17:24:11',
			'deleted_by' => 3
		),
		array(
			'id' => 4,
			'product_type_id' => 4,
			'product_subtype_id' => 4,
			'tax_group_id' => 4,
			'products_data_id' => 4,
			'base_id' => 4,
			'name' => 'Lorem ipsum dolor sit amet',
			'description' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'model' => 'Lorem ipsum dolor sit amet',
			'article_number' => 'Lorem ipsum dolor sit amet',
			'upc' => 'Lorem ipsum dolor sit amet',
			'part_number' => 'Lorem ipsum dolor sit amet',
			'quick_search' => 'Lorem ipsum dolor sit amet',
			'weight' => 4,
			'1_m3' => 4,
			'1_f3' => 4,
			'manufacturer_id' => 4,
			'manufacturers_products_line_id' => 4,
			'products_measurement_id' => 4,
			'special_tax_fet' => 4,
			'warranty' => 4,
			'width' => 'Lorem ip',
			'ratio' => 'Lorem ip',
			'rim' => 'Lorem ip',
			'products_side_wall_id' => 4,
			'products_load_range_id' => 4,
			'products_temperature_id' => 4,
			'tread_depth' => 4,
			'treadwear' => 4,
			'products_traction_id' => 4,
			'load_index' => 'Lorem ipsum d',
			'products_speed_rating_id' => 4,
			'products_ply_type_id' => 4,
			'products_base_type_id' => 4,
			'products_tread_type_id' => 4,
			'max_load_capacity' => 4,
			'back_spacing' => 4,
			'offset' => 4,
			'lug_circle' => 'Lorem ip',
			'lug_count' => 'Lorem ip',
			'products_finish_id' => 4,
			'buy_price' => 4,
			'sell_price' => 4,
			'keywords' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'reps_prompt' => 1,
			'non_stock' => 1,
			'deleted' => '2012-08-02 17:24:11',
			'deleted_by' => 4
		),
		array(
			'id' => 5,
			'product_type_id' => 5,
			'product_subtype_id' => 5,
			'tax_group_id' => 5,
			'products_data_id' => 5,
			'base_id' => 5,
			'name' => 'Lorem ipsum dolor sit amet',
			'description' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'model' => 'Lorem ipsum dolor sit amet',
			'article_number' => 'Lorem ipsum dolor sit amet',
			'upc' => 'Lorem ipsum dolor sit amet',
			'part_number' => 'Lorem ipsum dolor sit amet',
			'quick_search' => 'Lorem ipsum dolor sit amet',
			'weight' => 5,
			'1_m3' => 5,
			'1_f3' => 5,
			'manufacturer_id' => 5,
			'manufacturers_products_line_id' => 5,
			'products_measurement_id' => 5,
			'special_tax_fet' => 5,
			'warranty' => 5,
			'width' => 'Lorem ip',
			'ratio' => 'Lorem ip',
			'rim' => 'Lorem ip',
			'products_side_wall_id' => 5,
			'products_load_range_id' => 5,
			'products_temperature_id' => 5,
			'tread_depth' => 5,
			'treadwear' => 5,
			'products_traction_id' => 5,
			'load_index' => 'Lorem ipsum d',
			'products_speed_rating_id' => 5,
			'products_ply_type_id' => 5,
			'products_base_type_id' => 5,
			'products_tread_type_id' => 5,
			'max_load_capacity' => 5,
			'back_spacing' => 5,
			'offset' => 5,
			'lug_circle' => 'Lorem ip',
			'lug_count' => 'Lorem ip',
			'products_finish_id' => 5,
			'buy_price' => 5,
			'sell_price' => 5,
			'keywords' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'reps_prompt' => 1,
			'non_stock' => 1,
			'deleted' => '2012-08-02 17:24:11',
			'deleted_by' => 5
		),
		array(
			'id' => 6,
			'product_type_id' => 6,
			'product_subtype_id' => 6,
			'tax_group_id' => 6,
			'products_data_id' => 6,
			'base_id' => 6,
			'name' => 'Lorem ipsum dolor sit amet',
			'description' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'model' => 'Lorem ipsum dolor sit amet',
			'article_number' => 'Lorem ipsum dolor sit amet',
			'upc' => 'Lorem ipsum dolor sit amet',
			'part_number' => 'Lorem ipsum dolor sit amet',
			'quick_search' => 'Lorem ipsum dolor sit amet',
			'weight' => 6,
			'1_m3' => 6,
			'1_f3' => 6,
			'manufacturer_id' => 6,
			'manufacturers_products_line_id' => 6,
			'products_measurement_id' => 6,
			'special_tax_fet' => 6,
			'warranty' => 6,
			'width' => 'Lorem ip',
			'ratio' => 'Lorem ip',
			'rim' => 'Lorem ip',
			'products_side_wall_id' => 6,
			'products_load_range_id' => 6,
			'products_temperature_id' => 6,
			'tread_depth' => 6,
			'treadwear' => 6,
			'products_traction_id' => 6,
			'load_index' => 'Lorem ipsum d',
			'products_speed_rating_id' => 6,
			'products_ply_type_id' => 6,
			'products_base_type_id' => 6,
			'products_tread_type_id' => 6,
			'max_load_capacity' => 6,
			'back_spacing' => 6,
			'offset' => 6,
			'lug_circle' => 'Lorem ip',
			'lug_count' => 'Lorem ip',
			'products_finish_id' => 6,
			'buy_price' => 6,
			'sell_price' => 6,
			'keywords' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'reps_prompt' => 1,
			'non_stock' => 1,
			'deleted' => '2012-08-02 17:24:11',
			'deleted_by' => 6
		),
		array(
			'id' => 7,
			'product_type_id' => 7,
			'product_subtype_id' => 7,
			'tax_group_id' => 7,
			'products_data_id' => 7,
			'base_id' => 7,
			'name' => 'Lorem ipsum dolor sit amet',
			'description' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'model' => 'Lorem ipsum dolor sit amet',
			'article_number' => 'Lorem ipsum dolor sit amet',
			'upc' => 'Lorem ipsum dolor sit amet',
			'part_number' => 'Lorem ipsum dolor sit amet',
			'quick_search' => 'Lorem ipsum dolor sit amet',
			'weight' => 7,
			'1_m3' => 7,
			'1_f3' => 7,
			'manufacturer_id' => 7,
			'manufacturers_products_line_id' => 7,
			'products_measurement_id' => 7,
			'special_tax_fet' => 7,
			'warranty' => 7,
			'width' => 'Lorem ip',
			'ratio' => 'Lorem ip',
			'rim' => 'Lorem ip',
			'products_side_wall_id' => 7,
			'products_load_range_id' => 7,
			'products_temperature_id' => 7,
			'tread_depth' => 7,
			'treadwear' => 7,
			'products_traction_id' => 7,
			'load_index' => 'Lorem ipsum d',
			'products_speed_rating_id' => 7,
			'products_ply_type_id' => 7,
			'products_base_type_id' => 7,
			'products_tread_type_id' => 7,
			'max_load_capacity' => 7,
			'back_spacing' => 7,
			'offset' => 7,
			'lug_circle' => 'Lorem ip',
			'lug_count' => 'Lorem ip',
			'products_finish_id' => 7,
			'buy_price' => 7,
			'sell_price' => 7,
			'keywords' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'reps_prompt' => 1,
			'non_stock' => 1,
			'deleted' => '2012-08-02 17:24:11',
			'deleted_by' => 7
		),
		array(
			'id' => 8,
			'product_type_id' => 8,
			'product_subtype_id' => 8,
			'tax_group_id' => 8,
			'products_data_id' => 8,
			'base_id' => 8,
			'name' => 'Lorem ipsum dolor sit amet',
			'description' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'model' => 'Lorem ipsum dolor sit amet',
			'article_number' => 'Lorem ipsum dolor sit amet',
			'upc' => 'Lorem ipsum dolor sit amet',
			'part_number' => 'Lorem ipsum dolor sit amet',
			'quick_search' => 'Lorem ipsum dolor sit amet',
			'weight' => 8,
			'1_m3' => 8,
			'1_f3' => 8,
			'manufacturer_id' => 8,
			'manufacturers_products_line_id' => 8,
			'products_measurement_id' => 8,
			'special_tax_fet' => 8,
			'warranty' => 8,
			'width' => 'Lorem ip',
			'ratio' => 'Lorem ip',
			'rim' => 'Lorem ip',
			'products_side_wall_id' => 8,
			'products_load_range_id' => 8,
			'products_temperature_id' => 8,
			'tread_depth' => 8,
			'treadwear' => 8,
			'products_traction_id' => 8,
			'load_index' => 'Lorem ipsum d',
			'products_speed_rating_id' => 8,
			'products_ply_type_id' => 8,
			'products_base_type_id' => 8,
			'products_tread_type_id' => 8,
			'max_load_capacity' => 8,
			'back_spacing' => 8,
			'offset' => 8,
			'lug_circle' => 'Lorem ip',
			'lug_count' => 'Lorem ip',
			'products_finish_id' => 8,
			'buy_price' => 8,
			'sell_price' => 8,
			'keywords' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'reps_prompt' => 1,
			'non_stock' => 1,
			'deleted' => '2012-08-02 17:24:11',
			'deleted_by' => 8
		),
		array(
			'id' => 9,
			'product_type_id' => 9,
			'product_subtype_id' => 9,
			'tax_group_id' => 9,
			'products_data_id' => 9,
			'base_id' => 9,
			'name' => 'Lorem ipsum dolor sit amet',
			'description' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'model' => 'Lorem ipsum dolor sit amet',
			'article_number' => 'Lorem ipsum dolor sit amet',
			'upc' => 'Lorem ipsum dolor sit amet',
			'part_number' => 'Lorem ipsum dolor sit amet',
			'quick_search' => 'Lorem ipsum dolor sit amet',
			'weight' => 9,
			'1_m3' => 9,
			'1_f3' => 9,
			'manufacturer_id' => 9,
			'manufacturers_products_line_id' => 9,
			'products_measurement_id' => 9,
			'special_tax_fet' => 9,
			'warranty' => 9,
			'width' => 'Lorem ip',
			'ratio' => 'Lorem ip',
			'rim' => 'Lorem ip',
			'products_side_wall_id' => 9,
			'products_load_range_id' => 9,
			'products_temperature_id' => 9,
			'tread_depth' => 9,
			'treadwear' => 9,
			'products_traction_id' => 9,
			'load_index' => 'Lorem ipsum d',
			'products_speed_rating_id' => 9,
			'products_ply_type_id' => 9,
			'products_base_type_id' => 9,
			'products_tread_type_id' => 9,
			'max_load_capacity' => 9,
			'back_spacing' => 9,
			'offset' => 9,
			'lug_circle' => 'Lorem ip',
			'lug_count' => 'Lorem ip',
			'products_finish_id' => 9,
			'buy_price' => 9,
			'sell_price' => 9,
			'keywords' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'reps_prompt' => 1,
			'non_stock' => 1,
			'deleted' => '2012-08-02 17:24:11',
			'deleted_by' => 9
		),
		array(
			'id' => 10,
			'product_type_id' => 10,
			'product_subtype_id' => 10,
			'tax_group_id' => 10,
			'products_data_id' => 10,
			'base_id' => 10,
			'name' => 'Lorem ipsum dolor sit amet',
			'description' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'model' => 'Lorem ipsum dolor sit amet',
			'article_number' => 'Lorem ipsum dolor sit amet',
			'upc' => 'Lorem ipsum dolor sit amet',
			'part_number' => 'Lorem ipsum dolor sit amet',
			'quick_search' => 'Lorem ipsum dolor sit amet',
			'weight' => 10,
			'1_m3' => 10,
			'1_f3' => 10,
			'manufacturer_id' => 10,
			'manufacturers_products_line_id' => 10,
			'products_measurement_id' => 10,
			'special_tax_fet' => 10,
			'warranty' => 10,
			'width' => 'Lorem ip',
			'ratio' => 'Lorem ip',
			'rim' => 'Lorem ip',
			'products_side_wall_id' => 10,
			'products_load_range_id' => 10,
			'products_temperature_id' => 10,
			'tread_depth' => 10,
			'treadwear' => 10,
			'products_traction_id' => 10,
			'load_index' => 'Lorem ipsum d',
			'products_speed_rating_id' => 10,
			'products_ply_type_id' => 10,
			'products_base_type_id' => 10,
			'products_tread_type_id' => 10,
			'max_load_capacity' => 10,
			'back_spacing' => 10,
			'offset' => 10,
			'lug_circle' => 'Lorem ip',
			'lug_count' => 'Lorem ip',
			'products_finish_id' => 10,
			'buy_price' => 10,
			'sell_price' => 10,
			'keywords' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'reps_prompt' => 1,
			'non_stock' => 1,
			'deleted' => '2012-08-02 17:24:11',
			'deleted_by' => 10
		),
	);

}