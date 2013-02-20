<?php
/**
 * TermItemDiscountFixture
 *
 */
class TermItemDiscountFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'term_item_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'index'),
		'percent' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => '4,2'),
		'day' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 3),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'term_item_id' => array('column' => 'term_item_id', 'unique' => 0)
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
			'term_item_id' => 1,
			'percent' => 1,
			'day' => 1
		),
		array(
			'id' => 2,
			'term_item_id' => 2,
			'percent' => 2,
			'day' => 2
		),
		array(
			'id' => 3,
			'term_item_id' => 3,
			'percent' => 3,
			'day' => 3
		),
		array(
			'id' => 4,
			'term_item_id' => 4,
			'percent' => 4,
			'day' => 4
		),
		array(
			'id' => 5,
			'term_item_id' => 5,
			'percent' => 5,
			'day' => 5
		),
		array(
			'id' => 6,
			'term_item_id' => 6,
			'percent' => 6,
			'day' => 6
		),
		array(
			'id' => 7,
			'term_item_id' => 7,
			'percent' => 7,
			'day' => 7
		),
		array(
			'id' => 8,
			'term_item_id' => 8,
			'percent' => 8,
			'day' => 8
		),
		array(
			'id' => 9,
			'term_item_id' => 9,
			'percent' => 9,
			'day' => 9
		),
		array(
			'id' => 10,
			'term_item_id' => 10,
			'percent' => 10,
			'day' => 10
		),
	);

}
