<?php
/**
 * LocationsLinkFixture
 *
 */
class LocationsLinkFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 6, 'key' => 'primary'),
		'location_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 3),
		'parent_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 3),
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
			'location_id' => 1,
			'parent_id' => 1
		),
		array(
			'id' => 2,
			'location_id' => 2,
			'parent_id' => 2
		),
		array(
			'id' => 3,
			'location_id' => 3,
			'parent_id' => 3
		),
		array(
			'id' => 4,
			'location_id' => 4,
			'parent_id' => 4
		),
		array(
			'id' => 5,
			'location_id' => 5,
			'parent_id' => 5
		),
		array(
			'id' => 6,
			'location_id' => 6,
			'parent_id' => 6
		),
		array(
			'id' => 7,
			'location_id' => 7,
			'parent_id' => 7
		),
		array(
			'id' => 8,
			'location_id' => 8,
			'parent_id' => 8
		),
		array(
			'id' => 9,
			'location_id' => 9,
			'parent_id' => 9
		),
		array(
			'id' => 10,
			'location_id' => 10,
			'parent_id' => 10
		),
	);

}
