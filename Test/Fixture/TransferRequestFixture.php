<?php
/**
 * TransferRequestFixture
 *
 */
class TransferRequestFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'requested_from_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 6, 'key' => 'index', 'comment' => 'location request was made from'),
		'location_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 6),
		'status' => array('type' => 'integer', 'null' => false, 'default' => '100', 'length' => 3, 'key' => 'index'),
		'number_items' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 6),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'created_by' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified_by' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'deleted' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'deleted_by' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'location_id' => array('column' => 'requested_from_id', 'unique' => 0),
			'status' => array('column' => 'status', 'unique' => 0)
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
			'requested_from_id' => 1,
			'location_id' => 1,
			'status' => 1,
			'number_items' => 1,
			'created' => '2012-08-02 17:25:51',
			'created_by' => 1,
			'modified' => '2012-08-02 17:25:51',
			'modified_by' => 1,
			'deleted' => '2012-08-02 17:25:51',
			'deleted_by' => 1
		),
		array(
			'id' => 2,
			'requested_from_id' => 2,
			'location_id' => 2,
			'status' => 2,
			'number_items' => 2,
			'created' => '2012-08-02 17:25:51',
			'created_by' => 2,
			'modified' => '2012-08-02 17:25:51',
			'modified_by' => 2,
			'deleted' => '2012-08-02 17:25:51',
			'deleted_by' => 2
		),
		array(
			'id' => 3,
			'requested_from_id' => 3,
			'location_id' => 3,
			'status' => 3,
			'number_items' => 3,
			'created' => '2012-08-02 17:25:51',
			'created_by' => 3,
			'modified' => '2012-08-02 17:25:51',
			'modified_by' => 3,
			'deleted' => '2012-08-02 17:25:51',
			'deleted_by' => 3
		),
		array(
			'id' => 4,
			'requested_from_id' => 4,
			'location_id' => 4,
			'status' => 4,
			'number_items' => 4,
			'created' => '2012-08-02 17:25:51',
			'created_by' => 4,
			'modified' => '2012-08-02 17:25:51',
			'modified_by' => 4,
			'deleted' => '2012-08-02 17:25:51',
			'deleted_by' => 4
		),
		array(
			'id' => 5,
			'requested_from_id' => 5,
			'location_id' => 5,
			'status' => 5,
			'number_items' => 5,
			'created' => '2012-08-02 17:25:51',
			'created_by' => 5,
			'modified' => '2012-08-02 17:25:51',
			'modified_by' => 5,
			'deleted' => '2012-08-02 17:25:51',
			'deleted_by' => 5
		),
		array(
			'id' => 6,
			'requested_from_id' => 6,
			'location_id' => 6,
			'status' => 6,
			'number_items' => 6,
			'created' => '2012-08-02 17:25:51',
			'created_by' => 6,
			'modified' => '2012-08-02 17:25:51',
			'modified_by' => 6,
			'deleted' => '2012-08-02 17:25:51',
			'deleted_by' => 6
		),
		array(
			'id' => 7,
			'requested_from_id' => 7,
			'location_id' => 7,
			'status' => 7,
			'number_items' => 7,
			'created' => '2012-08-02 17:25:51',
			'created_by' => 7,
			'modified' => '2012-08-02 17:25:51',
			'modified_by' => 7,
			'deleted' => '2012-08-02 17:25:51',
			'deleted_by' => 7
		),
		array(
			'id' => 8,
			'requested_from_id' => 8,
			'location_id' => 8,
			'status' => 8,
			'number_items' => 8,
			'created' => '2012-08-02 17:25:51',
			'created_by' => 8,
			'modified' => '2012-08-02 17:25:51',
			'modified_by' => 8,
			'deleted' => '2012-08-02 17:25:51',
			'deleted_by' => 8
		),
		array(
			'id' => 9,
			'requested_from_id' => 9,
			'location_id' => 9,
			'status' => 9,
			'number_items' => 9,
			'created' => '2012-08-02 17:25:51',
			'created_by' => 9,
			'modified' => '2012-08-02 17:25:51',
			'modified_by' => 9,
			'deleted' => '2012-08-02 17:25:51',
			'deleted_by' => 9
		),
		array(
			'id' => 10,
			'requested_from_id' => 10,
			'location_id' => 10,
			'status' => 10,
			'number_items' => 10,
			'created' => '2012-08-02 17:25:51',
			'created_by' => 10,
			'modified' => '2012-08-02 17:25:51',
			'modified_by' => 10,
			'deleted' => '2012-08-02 17:25:51',
			'deleted_by' => 10
		),
	);

}
