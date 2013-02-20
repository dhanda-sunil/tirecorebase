<?php
/**
 * PriceGroupFixture
 *
 */
class PriceGroupFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 3, 'key' => 'primary'),
		'name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 96, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'active' => array('type' => 'boolean', 'null' => true, 'default' => null, 'key' => 'index'),
		'default' => array('type' => 'boolean', 'null' => false, 'default' => '0'),
		'adjustment' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => '7,3'),
		'order' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 3),
		'start_date' => array('type' => 'date', 'null' => true, 'default' => null),
		'end_date' => array('type' => 'date', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'active' => array('column' => 'active', 'unique' => 0)
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
			'name' => 'Lorem ipsum dolor sit amet',
			'active' => 1,
			'default' => 1,
			'adjustment' => 1,
			'order' => 1,
			'start_date' => '2012-08-02',
			'end_date' => '2012-08-02'
		),
		array(
			'id' => 2,
			'name' => 'Lorem ipsum dolor sit amet',
			'active' => 1,
			'default' => 1,
			'adjustment' => 2,
			'order' => 2,
			'start_date' => '2012-08-02',
			'end_date' => '2012-08-02'
		),
		array(
			'id' => 3,
			'name' => 'Lorem ipsum dolor sit amet',
			'active' => 1,
			'default' => 1,
			'adjustment' => 3,
			'order' => 3,
			'start_date' => '2012-08-02',
			'end_date' => '2012-08-02'
		),
		array(
			'id' => 4,
			'name' => 'Lorem ipsum dolor sit amet',
			'active' => 1,
			'default' => 1,
			'adjustment' => 4,
			'order' => 4,
			'start_date' => '2012-08-02',
			'end_date' => '2012-08-02'
		),
		array(
			'id' => 5,
			'name' => 'Lorem ipsum dolor sit amet',
			'active' => 1,
			'default' => 1,
			'adjustment' => 5,
			'order' => 5,
			'start_date' => '2012-08-02',
			'end_date' => '2012-08-02'
		),
		array(
			'id' => 6,
			'name' => 'Lorem ipsum dolor sit amet',
			'active' => 1,
			'default' => 1,
			'adjustment' => 6,
			'order' => 6,
			'start_date' => '2012-08-02',
			'end_date' => '2012-08-02'
		),
		array(
			'id' => 7,
			'name' => 'Lorem ipsum dolor sit amet',
			'active' => 1,
			'default' => 1,
			'adjustment' => 7,
			'order' => 7,
			'start_date' => '2012-08-02',
			'end_date' => '2012-08-02'
		),
		array(
			'id' => 8,
			'name' => 'Lorem ipsum dolor sit amet',
			'active' => 1,
			'default' => 1,
			'adjustment' => 8,
			'order' => 8,
			'start_date' => '2012-08-02',
			'end_date' => '2012-08-02'
		),
		array(
			'id' => 9,
			'name' => 'Lorem ipsum dolor sit amet',
			'active' => 1,
			'default' => 1,
			'adjustment' => 9,
			'order' => 9,
			'start_date' => '2012-08-02',
			'end_date' => '2012-08-02'
		),
		array(
			'id' => 10,
			'name' => 'Lorem ipsum dolor sit amet',
			'active' => 1,
			'default' => 1,
			'adjustment' => 10,
			'order' => 10,
			'start_date' => '2012-08-02',
			'end_date' => '2012-08-02'
		),
	);

}
