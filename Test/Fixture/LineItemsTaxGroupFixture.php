<?php
/**
 * LineItemsTaxGroupFixture
 *
 */
class LineItemsTaxGroupFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'line_item_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'tax_group_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'indexes' => array(
			'PRIMARY' => array('column' => array('line_item_id', 'tax_group_id'), 'unique' => 1)
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
			'line_item_id' => 1,
			'tax_group_id' => 1
		),
		array(
			'line_item_id' => 2,
			'tax_group_id' => 2
		),
		array(
			'line_item_id' => 3,
			'tax_group_id' => 3
		),
		array(
			'line_item_id' => 4,
			'tax_group_id' => 4
		),
		array(
			'line_item_id' => 5,
			'tax_group_id' => 5
		),
		array(
			'line_item_id' => 6,
			'tax_group_id' => 6
		),
		array(
			'line_item_id' => 7,
			'tax_group_id' => 7
		),
		array(
			'line_item_id' => 8,
			'tax_group_id' => 8
		),
		array(
			'line_item_id' => 9,
			'tax_group_id' => 9
		),
		array(
			'line_item_id' => 10,
			'tax_group_id' => 10
		),
	);

}
