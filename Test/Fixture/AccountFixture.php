<?php
/**
 * AccountFixture
 *
 */
class AccountFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'customer_location_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'index'),
		'account_category_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'index'),
		'account_type_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'number' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 20, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'desc' => array('type' => 'text', 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'offset_dr_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'offset_cr_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'balance_last_changed' => array('type' => 'date', 'null' => false, 'default' => null),
		'locked' => array('type' => 'boolean', 'null' => false, 'default' => '0'),
		'inactive' => array('type' => 'boolean', 'null' => false, 'default' => '0'),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified_by' => array('type' => 'integer', 'null' => false, 'default' => null),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'order' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 6),
		'default_bill_to_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'default_ship_to_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'company_id' => array('column' => array('customer_location_id', 'inactive'), 'unique' => 0),
			'accounts_category_id' => array('column' => 'account_category_id', 'unique' => 0)
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
			'customer_location_id' => 1,
			'account_category_id' => 1,
			'account_type_id' => 1,
			'number' => 'Lorem ipsum dolor ',
			'desc' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'offset_dr_id' => 1,
			'offset_cr_id' => 1,
			'balance_last_changed' => '2012-08-23',
			'locked' => 1,
			'inactive' => 1,
			'modified' => '2012-08-23 16:05:37',
			'modified_by' => 1,
			'created' => '2012-08-23 16:05:37',
			'order' => 1,
			'default_bill_to_id' => 1,
			'default_ship_to_id' => 1
		),
	);

}
