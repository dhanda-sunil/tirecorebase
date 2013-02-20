<?php
/**
 * RouteScheduleFixture
 *
 */
class RouteScheduleFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'reoccurs' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 5),
		'route_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'date' => array('type' => 'date', 'null' => false, 'default' => null),
		'day' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 3),
		'week' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 1),
		'ship_time' => array('type' => 'time', 'null' => false, 'default' => null),
		'cutoff' => array('type' => 'time', 'null' => false, 'default' => null),
		'cutoff_delta' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 2),
		'editable' => array('type' => 'boolean', 'null' => false, 'default' => '0'),
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
			'reoccurs' => 1,
			'route_id' => 1,
			'date' => '2012-08-02',
			'day' => 1,
			'week' => 1,
			'ship_time' => '17:25:01',
			'cutoff' => '17:25:01',
			'cutoff_delta' => 1,
			'editable' => 1
		),
		array(
			'id' => 2,
			'reoccurs' => 2,
			'route_id' => 2,
			'date' => '2012-08-02',
			'day' => 2,
			'week' => 2,
			'ship_time' => '17:25:01',
			'cutoff' => '17:25:01',
			'cutoff_delta' => 2,
			'editable' => 1
		),
		array(
			'id' => 3,
			'reoccurs' => 3,
			'route_id' => 3,
			'date' => '2012-08-02',
			'day' => 3,
			'week' => 3,
			'ship_time' => '17:25:01',
			'cutoff' => '17:25:01',
			'cutoff_delta' => 3,
			'editable' => 1
		),
		array(
			'id' => 4,
			'reoccurs' => 4,
			'route_id' => 4,
			'date' => '2012-08-02',
			'day' => 4,
			'week' => 4,
			'ship_time' => '17:25:01',
			'cutoff' => '17:25:01',
			'cutoff_delta' => 4,
			'editable' => 1
		),
		array(
			'id' => 5,
			'reoccurs' => 5,
			'route_id' => 5,
			'date' => '2012-08-02',
			'day' => 5,
			'week' => 5,
			'ship_time' => '17:25:01',
			'cutoff' => '17:25:01',
			'cutoff_delta' => 5,
			'editable' => 1
		),
		array(
			'id' => 6,
			'reoccurs' => 6,
			'route_id' => 6,
			'date' => '2012-08-02',
			'day' => 6,
			'week' => 6,
			'ship_time' => '17:25:01',
			'cutoff' => '17:25:01',
			'cutoff_delta' => 6,
			'editable' => 1
		),
		array(
			'id' => 7,
			'reoccurs' => 7,
			'route_id' => 7,
			'date' => '2012-08-02',
			'day' => 7,
			'week' => 7,
			'ship_time' => '17:25:01',
			'cutoff' => '17:25:01',
			'cutoff_delta' => 7,
			'editable' => 1
		),
		array(
			'id' => 8,
			'reoccurs' => 8,
			'route_id' => 8,
			'date' => '2012-08-02',
			'day' => 8,
			'week' => 8,
			'ship_time' => '17:25:01',
			'cutoff' => '17:25:01',
			'cutoff_delta' => 8,
			'editable' => 1
		),
		array(
			'id' => 9,
			'reoccurs' => 9,
			'route_id' => 9,
			'date' => '2012-08-02',
			'day' => 9,
			'week' => 9,
			'ship_time' => '17:25:01',
			'cutoff' => '17:25:01',
			'cutoff_delta' => 9,
			'editable' => 1
		),
		array(
			'id' => 10,
			'reoccurs' => 10,
			'route_id' => 10,
			'date' => '2012-08-02',
			'day' => 10,
			'week' => 10,
			'ship_time' => '17:25:01',
			'cutoff' => '17:25:01',
			'cutoff_delta' => 10,
			'editable' => 1
		),
	);

}
