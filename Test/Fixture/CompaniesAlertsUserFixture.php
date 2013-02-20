<?php
/**
 * CompaniesAlertsUserFixture
 *
 */
class CompaniesAlertsUserFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'company_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 5),
		'alert_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 8, 'key' => 'index'),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 5, 'key' => 'index'),
		'indexes' => array(
			'alert_id' => array('column' => 'alert_id', 'unique' => 0),
			'users_group_id' => array('column' => 'user_id', 'unique' => 0)
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
			'company_id' => 1,
			'alert_id' => 1,
			'user_id' => 1
		),
		array(
			'company_id' => 2,
			'alert_id' => 2,
			'user_id' => 2
		),
		array(
			'company_id' => 3,
			'alert_id' => 3,
			'user_id' => 3
		),
		array(
			'company_id' => 4,
			'alert_id' => 4,
			'user_id' => 4
		),
		array(
			'company_id' => 5,
			'alert_id' => 5,
			'user_id' => 5
		),
		array(
			'company_id' => 6,
			'alert_id' => 6,
			'user_id' => 6
		),
		array(
			'company_id' => 7,
			'alert_id' => 7,
			'user_id' => 7
		),
		array(
			'company_id' => 8,
			'alert_id' => 8,
			'user_id' => 8
		),
		array(
			'company_id' => 9,
			'alert_id' => 9,
			'user_id' => 9
		),
		array(
			'company_id' => 10,
			'alert_id' => 10,
			'user_id' => 10
		),
	);

}
