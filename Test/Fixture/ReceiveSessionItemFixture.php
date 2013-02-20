<?php
/**
 * ReceiveSessionItemFixture
 *
 */
class ReceiveSessionItemFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'receive_session_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'line_item_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'name' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'count' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => '10,3'),
		'ordered' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => '10,2'),
		'processed' => array('type' => 'boolean', 'null' => false, 'default' => '0'),
		'found' => array('type' => 'boolean', 'null' => false, 'default' => '0'),
		'on_po' => array('type' => 'boolean', 'null' => false, 'default' => '0'),
		'upc' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 50, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'part_number' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 50, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'deleted' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'deleted_by' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 8),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'po_id' => array('column' => 'receive_session_id', 'unique' => 0)
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
			'receive_session_id' => 1,
			'line_item_id' => 1,
			'name' => 'Lorem ipsum dolor sit amet',
			'count' => 1,
			'ordered' => 1,
			'processed' => 1,
			'found' => 1,
			'on_po' => 1,
			'upc' => 'Lorem ipsum dolor sit amet',
			'part_number' => 'Lorem ipsum dolor sit amet',
			'created' => '2012-08-02 17:24:52',
			'modified' => '2012-08-02 17:24:52',
			'deleted' => '2012-08-02 17:24:52',
			'deleted_by' => 1
		),
		array(
			'id' => 2,
			'receive_session_id' => 2,
			'line_item_id' => 2,
			'name' => 'Lorem ipsum dolor sit amet',
			'count' => 2,
			'ordered' => 2,
			'processed' => 1,
			'found' => 1,
			'on_po' => 1,
			'upc' => 'Lorem ipsum dolor sit amet',
			'part_number' => 'Lorem ipsum dolor sit amet',
			'created' => '2012-08-02 17:24:52',
			'modified' => '2012-08-02 17:24:52',
			'deleted' => '2012-08-02 17:24:52',
			'deleted_by' => 2
		),
		array(
			'id' => 3,
			'receive_session_id' => 3,
			'line_item_id' => 3,
			'name' => 'Lorem ipsum dolor sit amet',
			'count' => 3,
			'ordered' => 3,
			'processed' => 1,
			'found' => 1,
			'on_po' => 1,
			'upc' => 'Lorem ipsum dolor sit amet',
			'part_number' => 'Lorem ipsum dolor sit amet',
			'created' => '2012-08-02 17:24:52',
			'modified' => '2012-08-02 17:24:52',
			'deleted' => '2012-08-02 17:24:52',
			'deleted_by' => 3
		),
		array(
			'id' => 4,
			'receive_session_id' => 4,
			'line_item_id' => 4,
			'name' => 'Lorem ipsum dolor sit amet',
			'count' => 4,
			'ordered' => 4,
			'processed' => 1,
			'found' => 1,
			'on_po' => 1,
			'upc' => 'Lorem ipsum dolor sit amet',
			'part_number' => 'Lorem ipsum dolor sit amet',
			'created' => '2012-08-02 17:24:52',
			'modified' => '2012-08-02 17:24:52',
			'deleted' => '2012-08-02 17:24:52',
			'deleted_by' => 4
		),
		array(
			'id' => 5,
			'receive_session_id' => 5,
			'line_item_id' => 5,
			'name' => 'Lorem ipsum dolor sit amet',
			'count' => 5,
			'ordered' => 5,
			'processed' => 1,
			'found' => 1,
			'on_po' => 1,
			'upc' => 'Lorem ipsum dolor sit amet',
			'part_number' => 'Lorem ipsum dolor sit amet',
			'created' => '2012-08-02 17:24:52',
			'modified' => '2012-08-02 17:24:52',
			'deleted' => '2012-08-02 17:24:52',
			'deleted_by' => 5
		),
		array(
			'id' => 6,
			'receive_session_id' => 6,
			'line_item_id' => 6,
			'name' => 'Lorem ipsum dolor sit amet',
			'count' => 6,
			'ordered' => 6,
			'processed' => 1,
			'found' => 1,
			'on_po' => 1,
			'upc' => 'Lorem ipsum dolor sit amet',
			'part_number' => 'Lorem ipsum dolor sit amet',
			'created' => '2012-08-02 17:24:52',
			'modified' => '2012-08-02 17:24:52',
			'deleted' => '2012-08-02 17:24:52',
			'deleted_by' => 6
		),
		array(
			'id' => 7,
			'receive_session_id' => 7,
			'line_item_id' => 7,
			'name' => 'Lorem ipsum dolor sit amet',
			'count' => 7,
			'ordered' => 7,
			'processed' => 1,
			'found' => 1,
			'on_po' => 1,
			'upc' => 'Lorem ipsum dolor sit amet',
			'part_number' => 'Lorem ipsum dolor sit amet',
			'created' => '2012-08-02 17:24:52',
			'modified' => '2012-08-02 17:24:52',
			'deleted' => '2012-08-02 17:24:52',
			'deleted_by' => 7
		),
		array(
			'id' => 8,
			'receive_session_id' => 8,
			'line_item_id' => 8,
			'name' => 'Lorem ipsum dolor sit amet',
			'count' => 8,
			'ordered' => 8,
			'processed' => 1,
			'found' => 1,
			'on_po' => 1,
			'upc' => 'Lorem ipsum dolor sit amet',
			'part_number' => 'Lorem ipsum dolor sit amet',
			'created' => '2012-08-02 17:24:52',
			'modified' => '2012-08-02 17:24:52',
			'deleted' => '2012-08-02 17:24:52',
			'deleted_by' => 8
		),
		array(
			'id' => 9,
			'receive_session_id' => 9,
			'line_item_id' => 9,
			'name' => 'Lorem ipsum dolor sit amet',
			'count' => 9,
			'ordered' => 9,
			'processed' => 1,
			'found' => 1,
			'on_po' => 1,
			'upc' => 'Lorem ipsum dolor sit amet',
			'part_number' => 'Lorem ipsum dolor sit amet',
			'created' => '2012-08-02 17:24:52',
			'modified' => '2012-08-02 17:24:52',
			'deleted' => '2012-08-02 17:24:52',
			'deleted_by' => 9
		),
		array(
			'id' => 10,
			'receive_session_id' => 10,
			'line_item_id' => 10,
			'name' => 'Lorem ipsum dolor sit amet',
			'count' => 10,
			'ordered' => 10,
			'processed' => 1,
			'found' => 1,
			'on_po' => 1,
			'upc' => 'Lorem ipsum dolor sit amet',
			'part_number' => 'Lorem ipsum dolor sit amet',
			'created' => '2012-08-02 17:24:52',
			'modified' => '2012-08-02 17:24:52',
			'deleted' => '2012-08-02 17:24:52',
			'deleted_by' => 10
		),
	);

}
