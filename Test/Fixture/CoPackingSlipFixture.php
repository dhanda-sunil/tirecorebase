<?php
/**
 * CoPackingSlipFixture
 *
 */
class CoPackingSlipFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'co_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'type' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 2),
		'route_schedule_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'scheduled' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'cutoff' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'status' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 5),
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
			'co_id' => 1,
			'type' => 1,
			'route_schedule_id' => 1,
			'scheduled' => '2012-08-02 17:19:49',
			'cutoff' => '2012-08-02 17:19:49',
			'status' => 1
		),
		array(
			'id' => 2,
			'co_id' => 2,
			'type' => 2,
			'route_schedule_id' => 2,
			'scheduled' => '2012-08-02 17:19:49',
			'cutoff' => '2012-08-02 17:19:49',
			'status' => 2
		),
		array(
			'id' => 3,
			'co_id' => 3,
			'type' => 3,
			'route_schedule_id' => 3,
			'scheduled' => '2012-08-02 17:19:49',
			'cutoff' => '2012-08-02 17:19:49',
			'status' => 3
		),
		array(
			'id' => 4,
			'co_id' => 4,
			'type' => 4,
			'route_schedule_id' => 4,
			'scheduled' => '2012-08-02 17:19:49',
			'cutoff' => '2012-08-02 17:19:49',
			'status' => 4
		),
		array(
			'id' => 5,
			'co_id' => 5,
			'type' => 5,
			'route_schedule_id' => 5,
			'scheduled' => '2012-08-02 17:19:49',
			'cutoff' => '2012-08-02 17:19:49',
			'status' => 5
		),
		array(
			'id' => 6,
			'co_id' => 6,
			'type' => 6,
			'route_schedule_id' => 6,
			'scheduled' => '2012-08-02 17:19:49',
			'cutoff' => '2012-08-02 17:19:49',
			'status' => 6
		),
		array(
			'id' => 7,
			'co_id' => 7,
			'type' => 7,
			'route_schedule_id' => 7,
			'scheduled' => '2012-08-02 17:19:49',
			'cutoff' => '2012-08-02 17:19:49',
			'status' => 7
		),
		array(
			'id' => 8,
			'co_id' => 8,
			'type' => 8,
			'route_schedule_id' => 8,
			'scheduled' => '2012-08-02 17:19:49',
			'cutoff' => '2012-08-02 17:19:49',
			'status' => 8
		),
		array(
			'id' => 9,
			'co_id' => 9,
			'type' => 9,
			'route_schedule_id' => 9,
			'scheduled' => '2012-08-02 17:19:49',
			'cutoff' => '2012-08-02 17:19:49',
			'status' => 9
		),
		array(
			'id' => 10,
			'co_id' => 10,
			'type' => 10,
			'route_schedule_id' => 10,
			'scheduled' => '2012-08-02 17:19:49',
			'cutoff' => '2012-08-02 17:19:49',
			'status' => 10
		),
	);

}
