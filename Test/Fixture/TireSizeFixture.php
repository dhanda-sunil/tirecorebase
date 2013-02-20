<?php
/**
 * TireSizeFixture
 *
 */
class TireSizeFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'size_code' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 3),
		'dot_primary' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 2, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'dot_secondary' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 2, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'dot_tertiary' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 3, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'stock_status' => array('type' => 'boolean', 'null' => true, 'default' => '1'),
		'buff_circ' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 3, 'comment' => 'Buffed Casing Circumference'),
		'rim_size' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 13, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'cross_section' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 10, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'bead_setting' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 2),
		'scale_min' => array('type' => 'float', 'null' => true, 'default' => null, 'length' => '10,3', 'comment' => 'For digital scales: Minimum tread rubber quantity (lbs)'),
		'scale_max' => array('type' => 'float', 'null' => true, 'default' => null, 'length' => '10,3', 'comment' => 'For digital scales: Maximum tread rubber quantity (lbs)'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'MyISAM')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'size_code' => 1,
			'dot_primary' => '',
			'dot_secondary' => '',
			'dot_tertiary' => 'L',
			'stock_status' => 1,
			'buff_circ' => 1,
			'rim_size' => 'Lorem ipsum',
			'cross_section' => 'Lorem ip',
			'bead_setting' => 1,
			'scale_min' => 1,
			'scale_max' => 1
		),
		array(
			'id' => 2,
			'size_code' => 2,
			'dot_primary' => '',
			'dot_secondary' => '',
			'dot_tertiary' => 'L',
			'stock_status' => 1,
			'buff_circ' => 2,
			'rim_size' => 'Lorem ipsum',
			'cross_section' => 'Lorem ip',
			'bead_setting' => 2,
			'scale_min' => 2,
			'scale_max' => 2
		),
		array(
			'id' => 3,
			'size_code' => 3,
			'dot_primary' => '',
			'dot_secondary' => '',
			'dot_tertiary' => 'L',
			'stock_status' => 1,
			'buff_circ' => 3,
			'rim_size' => 'Lorem ipsum',
			'cross_section' => 'Lorem ip',
			'bead_setting' => 3,
			'scale_min' => 3,
			'scale_max' => 3
		),
		array(
			'id' => 4,
			'size_code' => 4,
			'dot_primary' => '',
			'dot_secondary' => '',
			'dot_tertiary' => 'L',
			'stock_status' => 1,
			'buff_circ' => 4,
			'rim_size' => 'Lorem ipsum',
			'cross_section' => 'Lorem ip',
			'bead_setting' => 4,
			'scale_min' => 4,
			'scale_max' => 4
		),
		array(
			'id' => 5,
			'size_code' => 5,
			'dot_primary' => '',
			'dot_secondary' => '',
			'dot_tertiary' => 'L',
			'stock_status' => 1,
			'buff_circ' => 5,
			'rim_size' => 'Lorem ipsum',
			'cross_section' => 'Lorem ip',
			'bead_setting' => 5,
			'scale_min' => 5,
			'scale_max' => 5
		),
		array(
			'id' => 6,
			'size_code' => 6,
			'dot_primary' => '',
			'dot_secondary' => '',
			'dot_tertiary' => 'L',
			'stock_status' => 1,
			'buff_circ' => 6,
			'rim_size' => 'Lorem ipsum',
			'cross_section' => 'Lorem ip',
			'bead_setting' => 6,
			'scale_min' => 6,
			'scale_max' => 6
		),
		array(
			'id' => 7,
			'size_code' => 7,
			'dot_primary' => '',
			'dot_secondary' => '',
			'dot_tertiary' => 'L',
			'stock_status' => 1,
			'buff_circ' => 7,
			'rim_size' => 'Lorem ipsum',
			'cross_section' => 'Lorem ip',
			'bead_setting' => 7,
			'scale_min' => 7,
			'scale_max' => 7
		),
		array(
			'id' => 8,
			'size_code' => 8,
			'dot_primary' => '',
			'dot_secondary' => '',
			'dot_tertiary' => 'L',
			'stock_status' => 1,
			'buff_circ' => 8,
			'rim_size' => 'Lorem ipsum',
			'cross_section' => 'Lorem ip',
			'bead_setting' => 8,
			'scale_min' => 8,
			'scale_max' => 8
		),
		array(
			'id' => 9,
			'size_code' => 9,
			'dot_primary' => '',
			'dot_secondary' => '',
			'dot_tertiary' => 'L',
			'stock_status' => 1,
			'buff_circ' => 9,
			'rim_size' => 'Lorem ipsum',
			'cross_section' => 'Lorem ip',
			'bead_setting' => 9,
			'scale_min' => 9,
			'scale_max' => 9
		),
		array(
			'id' => 10,
			'size_code' => 10,
			'dot_primary' => '',
			'dot_secondary' => '',
			'dot_tertiary' => 'L',
			'stock_status' => 1,
			'buff_circ' => 10,
			'rim_size' => 'Lorem ipsum',
			'cross_section' => 'Lorem ip',
			'bead_setting' => 10,
			'scale_min' => 10,
			'scale_max' => 10
		),
	);

}
