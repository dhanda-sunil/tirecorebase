<?php
/**
 * CustomerCompanyFixture
 *
 */
class CustomerCompanyFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'customer_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'company_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'credit_limit' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => '9,2'),
		'credit_used' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => '9,2'),
		'account_number' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 100, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'account_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 8),
		'is_national_account' => array('type' => 'boolean', 'null' => false, 'default' => '0'),
		'is_government_account' => array('type' => 'boolean', 'null' => false, 'default' => '0'),
		'print_credit_statement' => array('type' => 'boolean', 'null' => false, 'default' => null),
		'print_credit_limit' => array('type' => 'boolean', 'null' => false, 'default' => null),
		'default_grace_period' => array('type' => 'boolean', 'null' => false, 'default' => null),
		'fee_grace_period' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 3),
		'default_fee_rate' => array('type' => 'boolean', 'null' => false, 'default' => null),
		'fee_rate' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => '6,3'),
		'no_service_charge' => array('type' => 'boolean', 'null' => false, 'default' => '0'),
		'pdf_file_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => array('customer_id', 'company_id'), 'unique' => 1)
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
			'customer_id' => 1,
			'company_id' => 1,
			'credit_limit' => 1,
			'credit_used' => 1,
			'account_number' => 'Lorem ipsum dolor sit amet',
			'account_id' => 1,
			'is_national_account' => 1,
			'is_government_account' => 1,
			'print_credit_statement' => 1,
			'print_credit_limit' => 1,
			'default_grace_period' => 1,
			'fee_grace_period' => 1,
			'default_fee_rate' => 1,
			'fee_rate' => 1,
			'no_service_charge' => 1,
			'pdf_file_id' => 1
		),
		array(
			'customer_id' => 2,
			'company_id' => 2,
			'credit_limit' => 2,
			'credit_used' => 2,
			'account_number' => 'Lorem ipsum dolor sit amet',
			'account_id' => 2,
			'is_national_account' => 1,
			'is_government_account' => 1,
			'print_credit_statement' => 1,
			'print_credit_limit' => 1,
			'default_grace_period' => 1,
			'fee_grace_period' => 2,
			'default_fee_rate' => 1,
			'fee_rate' => 2,
			'no_service_charge' => 1,
			'pdf_file_id' => 2
		),
		array(
			'customer_id' => 3,
			'company_id' => 3,
			'credit_limit' => 3,
			'credit_used' => 3,
			'account_number' => 'Lorem ipsum dolor sit amet',
			'account_id' => 3,
			'is_national_account' => 1,
			'is_government_account' => 1,
			'print_credit_statement' => 1,
			'print_credit_limit' => 1,
			'default_grace_period' => 1,
			'fee_grace_period' => 3,
			'default_fee_rate' => 1,
			'fee_rate' => 3,
			'no_service_charge' => 1,
			'pdf_file_id' => 3
		),
		array(
			'customer_id' => 4,
			'company_id' => 4,
			'credit_limit' => 4,
			'credit_used' => 4,
			'account_number' => 'Lorem ipsum dolor sit amet',
			'account_id' => 4,
			'is_national_account' => 1,
			'is_government_account' => 1,
			'print_credit_statement' => 1,
			'print_credit_limit' => 1,
			'default_grace_period' => 1,
			'fee_grace_period' => 4,
			'default_fee_rate' => 1,
			'fee_rate' => 4,
			'no_service_charge' => 1,
			'pdf_file_id' => 4
		),
		array(
			'customer_id' => 5,
			'company_id' => 5,
			'credit_limit' => 5,
			'credit_used' => 5,
			'account_number' => 'Lorem ipsum dolor sit amet',
			'account_id' => 5,
			'is_national_account' => 1,
			'is_government_account' => 1,
			'print_credit_statement' => 1,
			'print_credit_limit' => 1,
			'default_grace_period' => 1,
			'fee_grace_period' => 5,
			'default_fee_rate' => 1,
			'fee_rate' => 5,
			'no_service_charge' => 1,
			'pdf_file_id' => 5
		),
		array(
			'customer_id' => 6,
			'company_id' => 6,
			'credit_limit' => 6,
			'credit_used' => 6,
			'account_number' => 'Lorem ipsum dolor sit amet',
			'account_id' => 6,
			'is_national_account' => 1,
			'is_government_account' => 1,
			'print_credit_statement' => 1,
			'print_credit_limit' => 1,
			'default_grace_period' => 1,
			'fee_grace_period' => 6,
			'default_fee_rate' => 1,
			'fee_rate' => 6,
			'no_service_charge' => 1,
			'pdf_file_id' => 6
		),
		array(
			'customer_id' => 7,
			'company_id' => 7,
			'credit_limit' => 7,
			'credit_used' => 7,
			'account_number' => 'Lorem ipsum dolor sit amet',
			'account_id' => 7,
			'is_national_account' => 1,
			'is_government_account' => 1,
			'print_credit_statement' => 1,
			'print_credit_limit' => 1,
			'default_grace_period' => 1,
			'fee_grace_period' => 7,
			'default_fee_rate' => 1,
			'fee_rate' => 7,
			'no_service_charge' => 1,
			'pdf_file_id' => 7
		),
		array(
			'customer_id' => 8,
			'company_id' => 8,
			'credit_limit' => 8,
			'credit_used' => 8,
			'account_number' => 'Lorem ipsum dolor sit amet',
			'account_id' => 8,
			'is_national_account' => 1,
			'is_government_account' => 1,
			'print_credit_statement' => 1,
			'print_credit_limit' => 1,
			'default_grace_period' => 1,
			'fee_grace_period' => 8,
			'default_fee_rate' => 1,
			'fee_rate' => 8,
			'no_service_charge' => 1,
			'pdf_file_id' => 8
		),
		array(
			'customer_id' => 9,
			'company_id' => 9,
			'credit_limit' => 9,
			'credit_used' => 9,
			'account_number' => 'Lorem ipsum dolor sit amet',
			'account_id' => 9,
			'is_national_account' => 1,
			'is_government_account' => 1,
			'print_credit_statement' => 1,
			'print_credit_limit' => 1,
			'default_grace_period' => 1,
			'fee_grace_period' => 9,
			'default_fee_rate' => 1,
			'fee_rate' => 9,
			'no_service_charge' => 1,
			'pdf_file_id' => 9
		),
		array(
			'customer_id' => 10,
			'company_id' => 10,
			'credit_limit' => 10,
			'credit_used' => 10,
			'account_number' => 'Lorem ipsum dolor sit amet',
			'account_id' => 10,
			'is_national_account' => 1,
			'is_government_account' => 1,
			'print_credit_statement' => 1,
			'print_credit_limit' => 1,
			'default_grace_period' => 1,
			'fee_grace_period' => 10,
			'default_fee_rate' => 1,
			'fee_rate' => 10,
			'no_service_charge' => 1,
			'pdf_file_id' => 10
		),
	);

}
