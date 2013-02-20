<?php
/**
 * TransferRequestLocationFixture
 *
 */
class TransferRequestLocationFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'transfer_request_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'index'),
		'location_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'indexes' => array(
			'transfer_request_id' => array('column' => array('transfer_request_id', 'location_id'), 'unique' => 0)
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
			'transfer_request_id' => 1,
			'location_id' => 1
		),
		array(
			'transfer_request_id' => 2,
			'location_id' => 2
		),
		array(
			'transfer_request_id' => 3,
			'location_id' => 3
		),
		array(
			'transfer_request_id' => 4,
			'location_id' => 4
		),
		array(
			'transfer_request_id' => 5,
			'location_id' => 5
		),
		array(
			'transfer_request_id' => 6,
			'location_id' => 6
		),
		array(
			'transfer_request_id' => 7,
			'location_id' => 7
		),
		array(
			'transfer_request_id' => 8,
			'location_id' => 8
		),
		array(
			'transfer_request_id' => 9,
			'location_id' => 9
		),
		array(
			'transfer_request_id' => 10,
			'location_id' => 10
		),
	);

}
