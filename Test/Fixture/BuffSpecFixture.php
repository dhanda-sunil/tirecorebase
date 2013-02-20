<?php
/**
 * BuffSpecFixture
 *
 */
class BuffSpecFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'program_ref' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 4),
		'name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 45, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'tread_size' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 6, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'diameter' => array('type' => 'float', 'null' => true, 'default' => null, 'length' => '10,3'),
		'crown_width' => array('type' => 'float', 'null' => true, 'default' => null, 'length' => '10,3'),
		'radius' => array('type' => 'float', 'null' => true, 'default' => null, 'length' => '10,3'),
		'machine' => array('type' => 'float', 'null' => true, 'default' => null, 'length' => '10,3'),
		'shoulder_radius' => array('type' => 'float', 'null' => true, 'default' => null, 'length' => '10,3'),
		'shoulder_length' => array('type' => 'float', 'null' => true, 'default' => null, 'length' => '10,3'),
		'shoulder_angle' => array('type' => 'float', 'null' => true, 'default' => null, 'length' => '10,3'),
		'steel_belt' => array('type' => 'float', 'null' => true, 'default' => null, 'length' => '10,3'),
		'shoulder_brushing' => array('type' => 'float', 'null' => true, 'default' => null, 'length' => '10,3'),
		'bead_width' => array('type' => 'float', 'null' => true, 'default' => null, 'length' => '10,3'),
		'mold_type_id' => array('type' => 'integer', 'null' => true, 'default' => null),
		'bead_plate_id' => array('type' => 'integer', 'null' => true, 'default' => null),
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
			'program_ref' => 1,
			'name' => 'Lorem ipsum dolor sit amet',
			'tread_size' => 'Lore',
			'diameter' => 1,
			'crown_width' => 1,
			'radius' => 1,
			'machine' => 1,
			'shoulder_radius' => 1,
			'shoulder_length' => 1,
			'shoulder_angle' => 1,
			'steel_belt' => 1,
			'shoulder_brushing' => 1,
			'bead_width' => 1,
			'mold_type_id' => 1,
			'bead_plate_id' => 1
		),
		array(
			'id' => 2,
			'program_ref' => 2,
			'name' => 'Lorem ipsum dolor sit amet',
			'tread_size' => 'Lore',
			'diameter' => 2,
			'crown_width' => 2,
			'radius' => 2,
			'machine' => 2,
			'shoulder_radius' => 2,
			'shoulder_length' => 2,
			'shoulder_angle' => 2,
			'steel_belt' => 2,
			'shoulder_brushing' => 2,
			'bead_width' => 2,
			'mold_type_id' => 2,
			'bead_plate_id' => 2
		),
		array(
			'id' => 3,
			'program_ref' => 3,
			'name' => 'Lorem ipsum dolor sit amet',
			'tread_size' => 'Lore',
			'diameter' => 3,
			'crown_width' => 3,
			'radius' => 3,
			'machine' => 3,
			'shoulder_radius' => 3,
			'shoulder_length' => 3,
			'shoulder_angle' => 3,
			'steel_belt' => 3,
			'shoulder_brushing' => 3,
			'bead_width' => 3,
			'mold_type_id' => 3,
			'bead_plate_id' => 3
		),
		array(
			'id' => 4,
			'program_ref' => 4,
			'name' => 'Lorem ipsum dolor sit amet',
			'tread_size' => 'Lore',
			'diameter' => 4,
			'crown_width' => 4,
			'radius' => 4,
			'machine' => 4,
			'shoulder_radius' => 4,
			'shoulder_length' => 4,
			'shoulder_angle' => 4,
			'steel_belt' => 4,
			'shoulder_brushing' => 4,
			'bead_width' => 4,
			'mold_type_id' => 4,
			'bead_plate_id' => 4
		),
		array(
			'id' => 5,
			'program_ref' => 5,
			'name' => 'Lorem ipsum dolor sit amet',
			'tread_size' => 'Lore',
			'diameter' => 5,
			'crown_width' => 5,
			'radius' => 5,
			'machine' => 5,
			'shoulder_radius' => 5,
			'shoulder_length' => 5,
			'shoulder_angle' => 5,
			'steel_belt' => 5,
			'shoulder_brushing' => 5,
			'bead_width' => 5,
			'mold_type_id' => 5,
			'bead_plate_id' => 5
		),
		array(
			'id' => 6,
			'program_ref' => 6,
			'name' => 'Lorem ipsum dolor sit amet',
			'tread_size' => 'Lore',
			'diameter' => 6,
			'crown_width' => 6,
			'radius' => 6,
			'machine' => 6,
			'shoulder_radius' => 6,
			'shoulder_length' => 6,
			'shoulder_angle' => 6,
			'steel_belt' => 6,
			'shoulder_brushing' => 6,
			'bead_width' => 6,
			'mold_type_id' => 6,
			'bead_plate_id' => 6
		),
		array(
			'id' => 7,
			'program_ref' => 7,
			'name' => 'Lorem ipsum dolor sit amet',
			'tread_size' => 'Lore',
			'diameter' => 7,
			'crown_width' => 7,
			'radius' => 7,
			'machine' => 7,
			'shoulder_radius' => 7,
			'shoulder_length' => 7,
			'shoulder_angle' => 7,
			'steel_belt' => 7,
			'shoulder_brushing' => 7,
			'bead_width' => 7,
			'mold_type_id' => 7,
			'bead_plate_id' => 7
		),
		array(
			'id' => 8,
			'program_ref' => 8,
			'name' => 'Lorem ipsum dolor sit amet',
			'tread_size' => 'Lore',
			'diameter' => 8,
			'crown_width' => 8,
			'radius' => 8,
			'machine' => 8,
			'shoulder_radius' => 8,
			'shoulder_length' => 8,
			'shoulder_angle' => 8,
			'steel_belt' => 8,
			'shoulder_brushing' => 8,
			'bead_width' => 8,
			'mold_type_id' => 8,
			'bead_plate_id' => 8
		),
		array(
			'id' => 9,
			'program_ref' => 9,
			'name' => 'Lorem ipsum dolor sit amet',
			'tread_size' => 'Lore',
			'diameter' => 9,
			'crown_width' => 9,
			'radius' => 9,
			'machine' => 9,
			'shoulder_radius' => 9,
			'shoulder_length' => 9,
			'shoulder_angle' => 9,
			'steel_belt' => 9,
			'shoulder_brushing' => 9,
			'bead_width' => 9,
			'mold_type_id' => 9,
			'bead_plate_id' => 9
		),
		array(
			'id' => 10,
			'program_ref' => 10,
			'name' => 'Lorem ipsum dolor sit amet',
			'tread_size' => 'Lore',
			'diameter' => 10,
			'crown_width' => 10,
			'radius' => 10,
			'machine' => 10,
			'shoulder_radius' => 10,
			'shoulder_length' => 10,
			'shoulder_angle' => 10,
			'steel_belt' => 10,
			'shoulder_brushing' => 10,
			'bead_width' => 10,
			'mold_type_id' => 10,
			'bead_plate_id' => 10
		),
	);

}
