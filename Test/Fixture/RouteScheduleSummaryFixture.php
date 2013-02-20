<?php
/**
 * RouteScheduleSummaryFixture
 *
 */
class RouteScheduleSummaryFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'scheduled_for' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'route_schedule_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'scheduled' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'pending' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'completed' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'completed_by' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
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
			'scheduled_for' => '2012-08-02 17:24:59',
			'route_schedule_id' => 1,
			'scheduled' => 1,
			'pending' => 1,
			'completed' => '2012-08-02 17:24:59',
			'completed_by' => 1,
			'created' => '2012-08-02 17:24:59'
		),
		array(
			'id' => 2,
			'scheduled_for' => '2012-08-02 17:24:59',
			'route_schedule_id' => 2,
			'scheduled' => 2,
			'pending' => 2,
			'completed' => '2012-08-02 17:24:59',
			'completed_by' => 2,
			'created' => '2012-08-02 17:24:59'
		),
		array(
			'id' => 3,
			'scheduled_for' => '2012-08-02 17:24:59',
			'route_schedule_id' => 3,
			'scheduled' => 3,
			'pending' => 3,
			'completed' => '2012-08-02 17:24:59',
			'completed_by' => 3,
			'created' => '2012-08-02 17:24:59'
		),
		array(
			'id' => 4,
			'scheduled_for' => '2012-08-02 17:24:59',
			'route_schedule_id' => 4,
			'scheduled' => 4,
			'pending' => 4,
			'completed' => '2012-08-02 17:24:59',
			'completed_by' => 4,
			'created' => '2012-08-02 17:24:59'
		),
		array(
			'id' => 5,
			'scheduled_for' => '2012-08-02 17:24:59',
			'route_schedule_id' => 5,
			'scheduled' => 5,
			'pending' => 5,
			'completed' => '2012-08-02 17:24:59',
			'completed_by' => 5,
			'created' => '2012-08-02 17:24:59'
		),
		array(
			'id' => 6,
			'scheduled_for' => '2012-08-02 17:24:59',
			'route_schedule_id' => 6,
			'scheduled' => 6,
			'pending' => 6,
			'completed' => '2012-08-02 17:24:59',
			'completed_by' => 6,
			'created' => '2012-08-02 17:24:59'
		),
		array(
			'id' => 7,
			'scheduled_for' => '2012-08-02 17:24:59',
			'route_schedule_id' => 7,
			'scheduled' => 7,
			'pending' => 7,
			'completed' => '2012-08-02 17:24:59',
			'completed_by' => 7,
			'created' => '2012-08-02 17:24:59'
		),
		array(
			'id' => 8,
			'scheduled_for' => '2012-08-02 17:24:59',
			'route_schedule_id' => 8,
			'scheduled' => 8,
			'pending' => 8,
			'completed' => '2012-08-02 17:24:59',
			'completed_by' => 8,
			'created' => '2012-08-02 17:24:59'
		),
		array(
			'id' => 9,
			'scheduled_for' => '2012-08-02 17:24:59',
			'route_schedule_id' => 9,
			'scheduled' => 9,
			'pending' => 9,
			'completed' => '2012-08-02 17:24:59',
			'completed_by' => 9,
			'created' => '2012-08-02 17:24:59'
		),
		array(
			'id' => 10,
			'scheduled_for' => '2012-08-02 17:24:59',
			'route_schedule_id' => 10,
			'scheduled' => 10,
			'pending' => 10,
			'completed' => '2012-08-02 17:24:59',
			'completed_by' => 10,
			'created' => '2012-08-02 17:24:59'
		),
	);

}
