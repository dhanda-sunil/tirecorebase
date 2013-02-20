<?php
/**
 * PaymentsItemFixture
 *
 */
class PaymentsItemFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'payment_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'deposit_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'index'),
		'amount' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => '9,2'),
		'type' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 5),
		'number' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 50),
		'card' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 50, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'exp' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 4, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'cvv' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 3, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'online' => array('type' => 'boolean', 'null' => false, 'default' => '0'),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'created_by' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'deleted' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'deleted_by' => array('type' => 'integer', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'deposit_id' => array('column' => 'deposit_id', 'unique' => 0)
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
			'payment_id' => 1,
			'deposit_id' => 1,
			'amount' => 1,
			'type' => 1,
			'number' => 1,
			'card' => 'Lorem ipsum dolor sit amet',
			'exp' => 'Lo',
			'cvv' => 'L',
			'online' => 1,
			'created' => '2012-08-02 17:23:21',
			'created_by' => 1,
			'modified' => '2012-08-02 17:23:21',
			'deleted' => '2012-08-02 17:23:21',
			'deleted_by' => 1
		),
		array(
			'id' => 2,
			'payment_id' => 2,
			'deposit_id' => 2,
			'amount' => 2,
			'type' => 2,
			'number' => 2,
			'card' => 'Lorem ipsum dolor sit amet',
			'exp' => 'Lo',
			'cvv' => 'L',
			'online' => 1,
			'created' => '2012-08-02 17:23:21',
			'created_by' => 2,
			'modified' => '2012-08-02 17:23:21',
			'deleted' => '2012-08-02 17:23:21',
			'deleted_by' => 2
		),
		array(
			'id' => 3,
			'payment_id' => 3,
			'deposit_id' => 3,
			'amount' => 3,
			'type' => 3,
			'number' => 3,
			'card' => 'Lorem ipsum dolor sit amet',
			'exp' => 'Lo',
			'cvv' => 'L',
			'online' => 1,
			'created' => '2012-08-02 17:23:21',
			'created_by' => 3,
			'modified' => '2012-08-02 17:23:21',
			'deleted' => '2012-08-02 17:23:21',
			'deleted_by' => 3
		),
		array(
			'id' => 4,
			'payment_id' => 4,
			'deposit_id' => 4,
			'amount' => 4,
			'type' => 4,
			'number' => 4,
			'card' => 'Lorem ipsum dolor sit amet',
			'exp' => 'Lo',
			'cvv' => 'L',
			'online' => 1,
			'created' => '2012-08-02 17:23:21',
			'created_by' => 4,
			'modified' => '2012-08-02 17:23:21',
			'deleted' => '2012-08-02 17:23:21',
			'deleted_by' => 4
		),
		array(
			'id' => 5,
			'payment_id' => 5,
			'deposit_id' => 5,
			'amount' => 5,
			'type' => 5,
			'number' => 5,
			'card' => 'Lorem ipsum dolor sit amet',
			'exp' => 'Lo',
			'cvv' => 'L',
			'online' => 1,
			'created' => '2012-08-02 17:23:21',
			'created_by' => 5,
			'modified' => '2012-08-02 17:23:21',
			'deleted' => '2012-08-02 17:23:21',
			'deleted_by' => 5
		),
		array(
			'id' => 6,
			'payment_id' => 6,
			'deposit_id' => 6,
			'amount' => 6,
			'type' => 6,
			'number' => 6,
			'card' => 'Lorem ipsum dolor sit amet',
			'exp' => 'Lo',
			'cvv' => 'L',
			'online' => 1,
			'created' => '2012-08-02 17:23:21',
			'created_by' => 6,
			'modified' => '2012-08-02 17:23:21',
			'deleted' => '2012-08-02 17:23:21',
			'deleted_by' => 6
		),
		array(
			'id' => 7,
			'payment_id' => 7,
			'deposit_id' => 7,
			'amount' => 7,
			'type' => 7,
			'number' => 7,
			'card' => 'Lorem ipsum dolor sit amet',
			'exp' => 'Lo',
			'cvv' => 'L',
			'online' => 1,
			'created' => '2012-08-02 17:23:21',
			'created_by' => 7,
			'modified' => '2012-08-02 17:23:21',
			'deleted' => '2012-08-02 17:23:21',
			'deleted_by' => 7
		),
		array(
			'id' => 8,
			'payment_id' => 8,
			'deposit_id' => 8,
			'amount' => 8,
			'type' => 8,
			'number' => 8,
			'card' => 'Lorem ipsum dolor sit amet',
			'exp' => 'Lo',
			'cvv' => 'L',
			'online' => 1,
			'created' => '2012-08-02 17:23:21',
			'created_by' => 8,
			'modified' => '2012-08-02 17:23:21',
			'deleted' => '2012-08-02 17:23:21',
			'deleted_by' => 8
		),
		array(
			'id' => 9,
			'payment_id' => 9,
			'deposit_id' => 9,
			'amount' => 9,
			'type' => 9,
			'number' => 9,
			'card' => 'Lorem ipsum dolor sit amet',
			'exp' => 'Lo',
			'cvv' => 'L',
			'online' => 1,
			'created' => '2012-08-02 17:23:21',
			'created_by' => 9,
			'modified' => '2012-08-02 17:23:21',
			'deleted' => '2012-08-02 17:23:21',
			'deleted_by' => 9
		),
		array(
			'id' => 10,
			'payment_id' => 10,
			'deposit_id' => 10,
			'amount' => 10,
			'type' => 10,
			'number' => 10,
			'card' => 'Lorem ipsum dolor sit amet',
			'exp' => 'Lo',
			'cvv' => 'L',
			'online' => 1,
			'created' => '2012-08-02 17:23:21',
			'created_by' => 10,
			'modified' => '2012-08-02 17:23:21',
			'deleted' => '2012-08-02 17:23:21',
			'deleted_by' => 10
		),
	);

}
