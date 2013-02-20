<?php
/**
 * ProgramsCompanyFixture
 *
 */
class ProgramsCompanyFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'program_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 8),
		'company_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 2),
		'account_number' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 40, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
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
			'program_id' => 1,
			'company_id' => 1,
			'account_number' => 'Lorem ipsum dolor sit amet'
		),
		array(
			'id' => 2,
			'program_id' => 2,
			'company_id' => 2,
			'account_number' => 'Lorem ipsum dolor sit amet'
		),
		array(
			'id' => 3,
			'program_id' => 3,
			'company_id' => 3,
			'account_number' => 'Lorem ipsum dolor sit amet'
		),
		array(
			'id' => 4,
			'program_id' => 4,
			'company_id' => 4,
			'account_number' => 'Lorem ipsum dolor sit amet'
		),
		array(
			'id' => 5,
			'program_id' => 5,
			'company_id' => 5,
			'account_number' => 'Lorem ipsum dolor sit amet'
		),
		array(
			'id' => 6,
			'program_id' => 6,
			'company_id' => 6,
			'account_number' => 'Lorem ipsum dolor sit amet'
		),
		array(
			'id' => 7,
			'program_id' => 7,
			'company_id' => 7,
			'account_number' => 'Lorem ipsum dolor sit amet'
		),
		array(
			'id' => 8,
			'program_id' => 8,
			'company_id' => 8,
			'account_number' => 'Lorem ipsum dolor sit amet'
		),
		array(
			'id' => 9,
			'program_id' => 9,
			'company_id' => 9,
			'account_number' => 'Lorem ipsum dolor sit amet'
		),
		array(
			'id' => 10,
			'program_id' => 10,
			'company_id' => 10,
			'account_number' => 'Lorem ipsum dolor sit amet'
		),
	);

}
