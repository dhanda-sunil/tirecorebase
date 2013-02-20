<?php
/**
 * ManufacturerPlantFixture
 *
 */
class ManufacturerPlantFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'manufacturer_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 45, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'code' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 2, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
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
			'manufacturer_id' => 1,
			'name' => 'AB Plant',
			'code' => 'AB'
		),
		array(
			'id' => 2,
			'manufacturer_id' => 2,
			'name' => 'CD Plant',
			'code' => 'CD'
		),
		array(
			'id' => 3,
			'manufacturer_id' => 3,
			'name' => 'OD Plant',
			'code' => 'OD'
		),
		array(
			'id' => 4,
			'manufacturer_id' => 4,
			'name' => 'QR Plant',
			'code' => 'QR'
		),
		array(
			'id' => 5,
			'manufacturer_id' => 5,
			'name' => 'SD Plant',
			'code' => 'SD'
		),
		array(
			'id' => 6,
			'manufacturer_id' => 6,
			'name' => 'RA Plant',
			'code' => 'RA'
		),
		array(
			'id' => 7,
			'manufacturer_id' => 7,
			'name' => 'A0 Plant',
			'code' => 'A0'
		),
		array(
			'id' => 8,
			'manufacturer_id' => 8,
			'name' => 'OR Plant',
			'code' => '0R'
		),
		array(
			'id' => 9,
			'manufacturer_id' => 9,
			'name' => 'LU Plant',
			'code' => 'LU'
		),
		array(
			'id' => 10,
			'manufacturer_id' => 10,
			'name' => 'PT Plant',
			'code' => 'PT'
		),
	);

}
