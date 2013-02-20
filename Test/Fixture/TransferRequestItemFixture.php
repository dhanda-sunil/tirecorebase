<?php
/**
 * TransferRequestItemFixture
 *
 */
class TransferRequestItemFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'transfer_request_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'index'),
		'accepted_location_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 6),
		'line_item_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'quantity' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => '9,4'),
		'quantity_accepted' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => '9,4'),
		'accepted_by' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 8),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'transfer_request_id' => array('column' => 'transfer_request_id', 'unique' => 0)
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
			'transfer_request_id' => 1,
			'accepted_location_id' => 1,
			'line_item_id' => 1,
			'quantity' => 1,
			'quantity_accepted' => 1,
			'accepted_by' => 1,
			'created' => '2012-08-02 17:25:47'
		),
		array(
			'id' => 2,
			'transfer_request_id' => 2,
			'accepted_location_id' => 2,
			'line_item_id' => 2,
			'quantity' => 2,
			'quantity_accepted' => 2,
			'accepted_by' => 2,
			'created' => '2012-08-02 17:25:47'
		),
		array(
			'id' => 3,
			'transfer_request_id' => 3,
			'accepted_location_id' => 3,
			'line_item_id' => 3,
			'quantity' => 3,
			'quantity_accepted' => 3,
			'accepted_by' => 3,
			'created' => '2012-08-02 17:25:47'
		),
		array(
			'id' => 4,
			'transfer_request_id' => 4,
			'accepted_location_id' => 4,
			'line_item_id' => 4,
			'quantity' => 4,
			'quantity_accepted' => 4,
			'accepted_by' => 4,
			'created' => '2012-08-02 17:25:47'
		),
		array(
			'id' => 5,
			'transfer_request_id' => 5,
			'accepted_location_id' => 5,
			'line_item_id' => 5,
			'quantity' => 5,
			'quantity_accepted' => 5,
			'accepted_by' => 5,
			'created' => '2012-08-02 17:25:47'
		),
		array(
			'id' => 6,
			'transfer_request_id' => 6,
			'accepted_location_id' => 6,
			'line_item_id' => 6,
			'quantity' => 6,
			'quantity_accepted' => 6,
			'accepted_by' => 6,
			'created' => '2012-08-02 17:25:47'
		),
		array(
			'id' => 7,
			'transfer_request_id' => 7,
			'accepted_location_id' => 7,
			'line_item_id' => 7,
			'quantity' => 7,
			'quantity_accepted' => 7,
			'accepted_by' => 7,
			'created' => '2012-08-02 17:25:47'
		),
		array(
			'id' => 8,
			'transfer_request_id' => 8,
			'accepted_location_id' => 8,
			'line_item_id' => 8,
			'quantity' => 8,
			'quantity_accepted' => 8,
			'accepted_by' => 8,
			'created' => '2012-08-02 17:25:47'
		),
		array(
			'id' => 9,
			'transfer_request_id' => 9,
			'accepted_location_id' => 9,
			'line_item_id' => 9,
			'quantity' => 9,
			'quantity_accepted' => 9,
			'accepted_by' => 9,
			'created' => '2012-08-02 17:25:47'
		),
		array(
			'id' => 10,
			'transfer_request_id' => 10,
			'accepted_location_id' => 10,
			'line_item_id' => 10,
			'quantity' => 10,
			'quantity_accepted' => 10,
			'accepted_by' => 10,
			'created' => '2012-08-02 17:25:47'
		),
	);

}
