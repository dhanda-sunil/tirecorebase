<?php
/**
 * CompaniesMonthFixture
 *
 */
class CompaniesMonthFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'company_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 2, 'key' => 'index'),
		'month' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 2, 'key' => 'index'),
		'year' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 4),
		'closed' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 2),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified_by' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'company_id' => array('column' => 'company_id', 'unique' => 0),
			'month' => array('column' => array('month', 'year'), 'unique' => 0)
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
			'company_id' => 1,
			'month' => 1,
			'year' => 1,
			'closed' => 1,
			'modified' => '2012-08-02 17:20:04',
			'modified_by' => 1,
			'created' => '2012-08-02 17:20:04'
		),
		array(
			'id' => 2,
			'company_id' => 2,
			'month' => 2,
			'year' => 2,
			'closed' => 2,
			'modified' => '2012-08-02 17:20:04',
			'modified_by' => 2,
			'created' => '2012-08-02 17:20:04'
		),
		array(
			'id' => 3,
			'company_id' => 3,
			'month' => 3,
			'year' => 3,
			'closed' => 3,
			'modified' => '2012-08-02 17:20:04',
			'modified_by' => 3,
			'created' => '2012-08-02 17:20:04'
		),
		array(
			'id' => 4,
			'company_id' => 4,
			'month' => 4,
			'year' => 4,
			'closed' => 4,
			'modified' => '2012-08-02 17:20:04',
			'modified_by' => 4,
			'created' => '2012-08-02 17:20:04'
		),
		array(
			'id' => 5,
			'company_id' => 5,
			'month' => 5,
			'year' => 5,
			'closed' => 5,
			'modified' => '2012-08-02 17:20:04',
			'modified_by' => 5,
			'created' => '2012-08-02 17:20:04'
		),
		array(
			'id' => 6,
			'company_id' => 6,
			'month' => 6,
			'year' => 6,
			'closed' => 6,
			'modified' => '2012-08-02 17:20:04',
			'modified_by' => 6,
			'created' => '2012-08-02 17:20:04'
		),
		array(
			'id' => 7,
			'company_id' => 7,
			'month' => 7,
			'year' => 7,
			'closed' => 7,
			'modified' => '2012-08-02 17:20:04',
			'modified_by' => 7,
			'created' => '2012-08-02 17:20:04'
		),
		array(
			'id' => 8,
			'company_id' => 8,
			'month' => 8,
			'year' => 8,
			'closed' => 8,
			'modified' => '2012-08-02 17:20:04',
			'modified_by' => 8,
			'created' => '2012-08-02 17:20:04'
		),
		array(
			'id' => 9,
			'company_id' => 9,
			'month' => 9,
			'year' => 9,
			'closed' => 9,
			'modified' => '2012-08-02 17:20:04',
			'modified_by' => 9,
			'created' => '2012-08-02 17:20:04'
		),
		array(
			'id' => 10,
			'company_id' => 10,
			'month' => 10,
			'year' => 10,
			'closed' => 10,
			'modified' => '2012-08-02 17:20:04',
			'modified_by' => 10,
			'created' => '2012-08-02 17:20:04'
		),
	);

}
