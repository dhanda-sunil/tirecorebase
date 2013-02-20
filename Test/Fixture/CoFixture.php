<?php
/**
 * CoFixture
 *
 */
class CoFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'ref' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 20, 'collate' => 'latin1_swedish_ci', 'comment' => 'Inside the TreadTracks WorkOrder tis is called "Work Oder Number"', 'charset' => 'latin1'),
		'account_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'type' => array('type' => 'integer', 'null' => false, 'default' => '45', 'length' => 2),
		'term_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 6),
		'bill_address_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10, 'comment' => 'refers to the accounts table'),
		'ship_address_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10, 'comment' => 'refers to the accounts table'),
		'is_national_account' => array('type' => 'boolean', 'null' => false, 'default' => null),
		'notes' => array('type' => 'text', 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'requestor' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 100, 'collate' => 'latin1_swedish_ci', 'comment' => 'This is a name (string) and refers to the person who requested the co', 'charset' => 'latin1'),
		'authorized' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'authorized_by' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null, 'key' => 'index'),
		'created_by' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 5),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified_by' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 5),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'customer_id' => array('column' => 'account_id', 'unique' => 0),
			'created' => array('column' => 'created', 'unique' => 0)
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
			'ref' => 'Lorem ipsum dolor ',
			'account_id' => 1,
			'type' => 1,
			'term_id' => 1,
			'bill_address_id' => 1,
			'ship_address_id' => 1,
			'is_national_account' => 1,
			'notes' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'requestor' => 'Lorem ipsum dolor sit amet',
			'authorized' => '2012-09-24 11:32:03',
			'authorized_by' => 1,
			'created' => '2012-09-24 11:32:03',
			'created_by' => 1,
			'modified' => '2012-09-24 11:32:03',
			'modified_by' => 1
		),
	);

}
