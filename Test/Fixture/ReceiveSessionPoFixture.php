<?php
/**
 * ReceiveSessionPoFixture
 *
 */
class ReceiveSessionPoFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'receive_session_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'index'),
		'po_id' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 13, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'indexes' => array(
			'receive_session_id' => array('column' => array('receive_session_id', 'po_id'), 'unique' => 0)
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
			'receive_session_id' => 1,
			'po_id' => 'Lorem ipsum'
		),
		array(
			'receive_session_id' => 2,
			'po_id' => 'Lorem ipsum'
		),
		array(
			'receive_session_id' => 3,
			'po_id' => 'Lorem ipsum'
		),
		array(
			'receive_session_id' => 4,
			'po_id' => 'Lorem ipsum'
		),
		array(
			'receive_session_id' => 5,
			'po_id' => 'Lorem ipsum'
		),
		array(
			'receive_session_id' => 6,
			'po_id' => 'Lorem ipsum'
		),
		array(
			'receive_session_id' => 7,
			'po_id' => 'Lorem ipsum'
		),
		array(
			'receive_session_id' => 8,
			'po_id' => 'Lorem ipsum'
		),
		array(
			'receive_session_id' => 9,
			'po_id' => 'Lorem ipsum'
		),
		array(
			'receive_session_id' => 10,
			'po_id' => 'Lorem ipsum'
		),
	);

}
