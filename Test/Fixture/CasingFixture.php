<?php
/**
 * CasingFixture
 *
 */
class CasingFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'manufacturer_plant_id' => array('type' => 'integer', 'null' => true, 'default' => null),
		'tire_size_id' => array('type' => 'integer', 'null' => true, 'default' => null),
		'manufacturer_product_line_id' => array('type' => 'integer', 'null' => true, 'default' => null),
		'production_week' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 4, 'comment' => 'format: WWYY'),
		'barcode' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 20),
		'customer_id' => array('type' => 'integer', 'null' => true, 'default' => null),
		'customer_tag' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 10, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'rfid' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 20, 'comment' => 'future'),
		'tread_design_id' => array('type' => 'integer', 'null' => true, 'default' => null),
		'grade' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 2, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'checking' => array('type' => 'string', 'null' => false, 'length' => 2, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'previous_caps' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 2),
		'remaining_tread' => array('type' => 'float', 'null' => true, 'default' => null, 'length' => '4,2'),
		'tread_width' => array('type' => 'float', 'null' => false, 'length' => '8,4'),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
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
			'manufacturer_plant_id' => 1,
			'tire_size_id' => 1,
			'manufacturer_product_line_id' => 1,
			'production_week' => 1,
			'barcode' => 1,
			'customer_id' => 1,
			'customer_tag' => 'Lorem ip',
			'rfid' => 1,
			'tread_design_id' => 1,
			'grade' => '',
			'checking' => '',
			'previous_caps' => 1,
			'remaining_tread' => 1,
			'tread_width' => 1
		),
	);

}