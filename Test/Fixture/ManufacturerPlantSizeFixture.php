<?php
/**
 * ManufacturerPlantSizeFixture
 *
 */
class ManufacturerPlantSizeFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'manufacturer_plant_id' => array('type' => 'integer', 'null' => true, 'default' => null),
		'tire_size_id' => array('type' => 'integer', 'null' => true, 'default' => null),
		'size_code' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 2, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
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
			'manufacturer_plant_id' => 1,
			'tire_size_id' => 1,
			'size_code' => '4E'
		),
		array(
			'id' => 2,
			'manufacturer_plant_id' => 2,
			'tire_size_id' => 2,
			'size_code' => 'RE'
		),
		array( // This entry is needed for testing
			'id' => 3,
			'manufacturer_plant_id' => 1,
			'tire_size_id' => 3,
			'size_code' => 'CD'
		),
		array(
			'id' => 4,
			'manufacturer_plant_id' => 4,
			'tire_size_id' => 4,
			'size_code' => 'EF'
		),
		array(
			'id' => 5,
			'manufacturer_plant_id' => 5,
			'tire_size_id' => 5,
			'size_code' => 'GH'
		),
		array(
			'id' => 6,
			'manufacturer_plant_id' => 6,
			'tire_size_id' => 6,
			'size_code' => 'IJ'
		),
		array(
			'id' => 7,
			'manufacturer_plant_id' => 7,
			'tire_size_id' => 7,
			'size_code' => 'KL'
		),
		array(
			'id' => 8,
			'manufacturer_plant_id' => 8,
			'tire_size_id' => 8,
			'size_code' => ''
		),
		array(
			'id' => 9,
			'manufacturer_plant_id' => 9,
			'tire_size_id' => 9,
			'size_code' => ''
		),
		array(
			'id' => 10,
			'manufacturer_plant_id' => 10,
			'tire_size_id' => 10,
			'size_code' => ''
		),
	);

}
