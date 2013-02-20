<?php
/**
 * WorkOrdersPdfFileFixture
 *
 */
class WorkOrdersPdfFileFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'work_order_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'index'),
		'pdf_file_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'type' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'work_order_id' => array('column' => array('work_order_id', 'pdf_file_id', 'type'), 'unique' => 0)
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
			'work_order_id' => 1,
			'pdf_file_id' => 1,
			'type' => 1
		),
		array(
			'id' => 2,
			'work_order_id' => 2,
			'pdf_file_id' => 2,
			'type' => 2
		),
		array(
			'id' => 3,
			'work_order_id' => 3,
			'pdf_file_id' => 3,
			'type' => 3
		),
		array(
			'id' => 4,
			'work_order_id' => 4,
			'pdf_file_id' => 4,
			'type' => 4
		),
		array(
			'id' => 5,
			'work_order_id' => 5,
			'pdf_file_id' => 5,
			'type' => 5
		),
		array(
			'id' => 6,
			'work_order_id' => 6,
			'pdf_file_id' => 6,
			'type' => 6
		),
		array(
			'id' => 7,
			'work_order_id' => 7,
			'pdf_file_id' => 7,
			'type' => 7
		),
		array(
			'id' => 8,
			'work_order_id' => 8,
			'pdf_file_id' => 8,
			'type' => 8
		),
		array(
			'id' => 9,
			'work_order_id' => 9,
			'pdf_file_id' => 9,
			'type' => 9
		),
		array(
			'id' => 10,
			'work_order_id' => 10,
			'pdf_file_id' => 10,
			'type' => 10
		),
	);

}
