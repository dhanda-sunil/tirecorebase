<?php
/**
 * AdjustmentFixture
 *
 */
class AdjustmentFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'type' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 3),
		'status' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 5),
		'customer_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'customer_credit_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 10),
		'work_order_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 10),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'created_by' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified_by' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 10),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
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
			'type' => 1,
			'status' => 1,
			'customer_id' => 1,
			'customer_credit_id' => 1,
			'work_order_id' => 1,
			'created' => '2012-08-02 17:19:09',
			'created_by' => 1,
			'modified' => '2012-08-02 17:19:09',
			'modified_by' => 1
		),
		array(
			'id' => 2,
			'type' => 2,
			'status' => 2,
			'customer_id' => 2,
			'customer_credit_id' => 2,
			'work_order_id' => 2,
			'created' => '2012-08-02 17:19:09',
			'created_by' => 2,
			'modified' => '2012-08-02 17:19:09',
			'modified_by' => 2
		),
		array(
			'id' => 3,
			'type' => 3,
			'status' => 3,
			'customer_id' => 3,
			'customer_credit_id' => 3,
			'work_order_id' => 3,
			'created' => '2012-08-02 17:19:09',
			'created_by' => 3,
			'modified' => '2012-08-02 17:19:09',
			'modified_by' => 3
		),
		array(
			'id' => 4,
			'type' => 4,
			'status' => 4,
			'customer_id' => 4,
			'customer_credit_id' => 4,
			'work_order_id' => 4,
			'created' => '2012-08-02 17:19:09',
			'created_by' => 4,
			'modified' => '2012-08-02 17:19:09',
			'modified_by' => 4
		),
		array(
			'id' => 5,
			'type' => 5,
			'status' => 5,
			'customer_id' => 5,
			'customer_credit_id' => 5,
			'work_order_id' => 5,
			'created' => '2012-08-02 17:19:09',
			'created_by' => 5,
			'modified' => '2012-08-02 17:19:09',
			'modified_by' => 5
		),
		array(
			'id' => 6,
			'type' => 6,
			'status' => 6,
			'customer_id' => 6,
			'customer_credit_id' => 6,
			'work_order_id' => 6,
			'created' => '2012-08-02 17:19:09',
			'created_by' => 6,
			'modified' => '2012-08-02 17:19:09',
			'modified_by' => 6
		),
		array(
			'id' => 7,
			'type' => 7,
			'status' => 7,
			'customer_id' => 7,
			'customer_credit_id' => 7,
			'work_order_id' => 7,
			'created' => '2012-08-02 17:19:09',
			'created_by' => 7,
			'modified' => '2012-08-02 17:19:09',
			'modified_by' => 7
		),
		array(
			'id' => 8,
			'type' => 8,
			'status' => 8,
			'customer_id' => 8,
			'customer_credit_id' => 8,
			'work_order_id' => 8,
			'created' => '2012-08-02 17:19:09',
			'created_by' => 8,
			'modified' => '2012-08-02 17:19:09',
			'modified_by' => 8
		),
		array(
			'id' => 9,
			'type' => 9,
			'status' => 9,
			'customer_id' => 9,
			'customer_credit_id' => 9,
			'work_order_id' => 9,
			'created' => '2012-08-02 17:19:09',
			'created_by' => 9,
			'modified' => '2012-08-02 17:19:09',
			'modified_by' => 9
		),
		array(
			'id' => 10,
			'type' => 10,
			'status' => 10,
			'customer_id' => 10,
			'customer_credit_id' => 10,
			'work_order_id' => 10,
			'created' => '2012-08-02 17:19:09',
			'created_by' => 10,
			'modified' => '2012-08-02 17:19:09',
			'modified_by' => 10
		),
	);

}
