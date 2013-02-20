<?php
/**
 * DisbursementBackupFixture
 *
 */
class DisbursementBackupFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'entry_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'type' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 50, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'invoice_ref' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 50, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'original_amount' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => '9,2'),
		'balance_due' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => '9,2'),
		'discount' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => '9,2'),
		'payment' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => '9,2'),
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
			'entry_id' => 1,
			'type' => 'Lorem ipsum dolor sit amet',
			'invoice_ref' => 'Lorem ipsum dolor sit amet',
			'original_amount' => 1,
			'balance_due' => 1,
			'discount' => 1,
			'payment' => 1
		),
		array(
			'id' => 2,
			'entry_id' => 2,
			'type' => 'Lorem ipsum dolor sit amet',
			'invoice_ref' => 'Lorem ipsum dolor sit amet',
			'original_amount' => 2,
			'balance_due' => 2,
			'discount' => 2,
			'payment' => 2
		),
		array(
			'id' => 3,
			'entry_id' => 3,
			'type' => 'Lorem ipsum dolor sit amet',
			'invoice_ref' => 'Lorem ipsum dolor sit amet',
			'original_amount' => 3,
			'balance_due' => 3,
			'discount' => 3,
			'payment' => 3
		),
		array(
			'id' => 4,
			'entry_id' => 4,
			'type' => 'Lorem ipsum dolor sit amet',
			'invoice_ref' => 'Lorem ipsum dolor sit amet',
			'original_amount' => 4,
			'balance_due' => 4,
			'discount' => 4,
			'payment' => 4
		),
		array(
			'id' => 5,
			'entry_id' => 5,
			'type' => 'Lorem ipsum dolor sit amet',
			'invoice_ref' => 'Lorem ipsum dolor sit amet',
			'original_amount' => 5,
			'balance_due' => 5,
			'discount' => 5,
			'payment' => 5
		),
		array(
			'id' => 6,
			'entry_id' => 6,
			'type' => 'Lorem ipsum dolor sit amet',
			'invoice_ref' => 'Lorem ipsum dolor sit amet',
			'original_amount' => 6,
			'balance_due' => 6,
			'discount' => 6,
			'payment' => 6
		),
		array(
			'id' => 7,
			'entry_id' => 7,
			'type' => 'Lorem ipsum dolor sit amet',
			'invoice_ref' => 'Lorem ipsum dolor sit amet',
			'original_amount' => 7,
			'balance_due' => 7,
			'discount' => 7,
			'payment' => 7
		),
		array(
			'id' => 8,
			'entry_id' => 8,
			'type' => 'Lorem ipsum dolor sit amet',
			'invoice_ref' => 'Lorem ipsum dolor sit amet',
			'original_amount' => 8,
			'balance_due' => 8,
			'discount' => 8,
			'payment' => 8
		),
		array(
			'id' => 9,
			'entry_id' => 9,
			'type' => 'Lorem ipsum dolor sit amet',
			'invoice_ref' => 'Lorem ipsum dolor sit amet',
			'original_amount' => 9,
			'balance_due' => 9,
			'discount' => 9,
			'payment' => 9
		),
		array(
			'id' => 10,
			'entry_id' => 10,
			'type' => 'Lorem ipsum dolor sit amet',
			'invoice_ref' => 'Lorem ipsum dolor sit amet',
			'original_amount' => 10,
			'balance_due' => 10,
			'discount' => 10,
			'payment' => 10
		),
	);

}
