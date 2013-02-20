<?php
/**
 * TreadDesignTreadWidthFixture
 *
 */
class TreadDesignTreadWidthFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'tread_design_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'tread_width_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'mrf_item_no' => array('type' => 'string', 'null' => false, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'tread_depth' => array('type' => 'float', 'null' => false, 'default' => '0.00', 'length' => '7,2'),
		'roll_weight' => array('type' => 'float', 'null' => false, 'default' => '0.00', 'length' => '10,2'),
		'weight_per_foot' => array('type' => 'float', 'null' => false, 'default' => '0.00', 'length' => '5,2'),
		'usage_uom_id' => array('type' => 'integer', 'null' => false, 'default' => null),
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
			'tread_design_id' => 1,
			'tread_width_id' => 1,
			'mrf_item_no' => 'Lorem ipsum dolor sit amet',
			'tread_depth' => 1,
			'roll_weight' => 1,
			'weight_per_foot' => 1,
			'usage_uom_id' => 1
		),
		array(
			'id' => 2,
			'tread_design_id' => 2,
			'tread_width_id' => 2,
			'mrf_item_no' => 'Lorem ipsum dolor sit amet',
			'tread_depth' => 2,
			'roll_weight' => 2,
			'weight_per_foot' => 2,
			'usage_uom_id' => 2
		),
		array(
			'id' => 3,
			'tread_design_id' => 3,
			'tread_width_id' => 3,
			'mrf_item_no' => 'Lorem ipsum dolor sit amet',
			'tread_depth' => 3,
			'roll_weight' => 3,
			'weight_per_foot' => 3,
			'usage_uom_id' => 3
		),
		array(
			'id' => 4,
			'tread_design_id' => 4,
			'tread_width_id' => 4,
			'mrf_item_no' => 'Lorem ipsum dolor sit amet',
			'tread_depth' => 4,
			'roll_weight' => 4,
			'weight_per_foot' => 4,
			'usage_uom_id' => 4
		),
		array(
			'id' => 5,
			'tread_design_id' => 5,
			'tread_width_id' => 5,
			'mrf_item_no' => 'Lorem ipsum dolor sit amet',
			'tread_depth' => 5,
			'roll_weight' => 5,
			'weight_per_foot' => 5,
			'usage_uom_id' => 5
		),
		array(
			'id' => 6,
			'tread_design_id' => 6,
			'tread_width_id' => 6,
			'mrf_item_no' => 'Lorem ipsum dolor sit amet',
			'tread_depth' => 6,
			'roll_weight' => 6,
			'weight_per_foot' => 6,
			'usage_uom_id' => 6
		),
		array(
			'id' => 7,
			'tread_design_id' => 7,
			'tread_width_id' => 7,
			'mrf_item_no' => 'Lorem ipsum dolor sit amet',
			'tread_depth' => 7,
			'roll_weight' => 7,
			'weight_per_foot' => 7,
			'usage_uom_id' => 7
		),
		array(
			'id' => 8,
			'tread_design_id' => 8,
			'tread_width_id' => 8,
			'mrf_item_no' => 'Lorem ipsum dolor sit amet',
			'tread_depth' => 8,
			'roll_weight' => 8,
			'weight_per_foot' => 8,
			'usage_uom_id' => 8
		),
		array(
			'id' => 9,
			'tread_design_id' => 9,
			'tread_width_id' => 9,
			'mrf_item_no' => 'Lorem ipsum dolor sit amet',
			'tread_depth' => 9,
			'roll_weight' => 9,
			'weight_per_foot' => 9,
			'usage_uom_id' => 9
		),
		array(
			'id' => 10,
			'tread_design_id' => 10,
			'tread_width_id' => 10,
			'mrf_item_no' => 'Lorem ipsum dolor sit amet',
			'tread_depth' => 10,
			'roll_weight' => 10,
			'weight_per_foot' => 10,
			'usage_uom_id' => 10
		),
	);

}
