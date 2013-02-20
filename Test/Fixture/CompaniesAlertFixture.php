<?php
/**
 * CompaniesAlertFixture
 *
 */
class CompaniesAlertFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'company_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 6, 'key' => 'index'),
		'alert_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 6, 'key' => 'index'),
		'indexes' => array(
			'company_id' => array('column' => 'company_id', 'unique' => 0),
			'alert_id' => array('column' => 'alert_id', 'unique' => 0)
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
			'alert_id' => 1
		),
		array(
			'company_id' => 2,
			'alert_id' => 2
		),
		array(
			'company_id' => 3,
			'alert_id' => 3
		),
		array(
			'company_id' => 4,
			'alert_id' => 4
		),
		array(
			'company_id' => 5,
			'alert_id' => 5
		),
		array(
			'company_id' => 6,
			'alert_id' => 6
		),
		array(
			'company_id' => 7,
			'alert_id' => 7
		),
		array(
			'company_id' => 8,
			'alert_id' => 8
		),
		array(
			'company_id' => 9,
			'alert_id' => 9
		),
		array(
			'company_id' => 10,
			'alert_id' => 10
		),
	);

}
