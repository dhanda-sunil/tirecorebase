<?php
/**
 * TaxFixture
 *
 */
class TaxFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 60, 'key' => 'unique', 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'account_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'flat_rate' => array('type' => 'float', 'null' => false, 'default' => '0.00', 'length' => '6,2'),
		'percent' => array('type' => 'float', 'null' => false, 'default' => '0.000', 'length' => '3,3'),
		'calculate' => array('type' => 'integer', 'null' => false, 'default' => '10', 'length' => 3),
		'summarize' => array('type' => 'boolean', 'null' => false, 'default' => '0'),
		'itemize' => array('type' => 'boolean', 'null' => false, 'default' => '0'),
		'taxable' => array('type' => 'boolean', 'null' => false, 'default' => '0'),
		'overide_exempt' => array('type' => 'boolean', 'null' => false, 'default' => '0'),
		'not_apply_other_fees' => array('type' => 'boolean', 'null' => false, 'default' => '0'),
		'use_min' => array('type' => 'boolean', 'null' => false, 'default' => '0'),
		'use_max' => array('type' => 'boolean', 'null' => false, 'default' => '0'),
		'max' => array('type' => 'float', 'null' => true, 'default' => null, 'length' => '13,2'),
		'min' => array('type' => 'float', 'null' => true, 'default' => null, 'length' => '13,2'),
		'vendor_account_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 10),
		'allow_turn_off' => array('type' => 'boolean', 'null' => false, 'default' => '0'),
		'allow_modify' => array('type' => 'boolean', 'null' => false, 'default' => '0'),
		'state' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 200, 'key' => 'index', 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'county' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 200, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'city' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 200, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'company_2' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 20, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'company_3' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 20, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'company_4' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 20, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'company_5' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 20, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'deleted' => array('type' => 'datetime', 'null' => true, 'default' => null, 'key' => 'index'),
		'deleted_by' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 5),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'desc' => array('column' => 'name', 'unique' => 1),
			'deleted' => array('column' => 'deleted', 'unique' => 0),
			'state' => array('column' => array('state', 'county', 'city', 'company_2', 'company_3', 'company_4', 'company_5'), 'unique' => 0)
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
			'name' => 'Lorem ipsum dolor sit amet',
			'account_id' => 1,
			'flat_rate' => 1,
			'percent' => 1,
			'calculate' => 1,
			'summarize' => 1,
			'itemize' => 1,
			'taxable' => 1,
			'overide_exempt' => 1,
			'not_apply_other_fees' => 1,
			'use_min' => 1,
			'use_max' => 1,
			'max' => 1,
			'min' => 1,
			'vendor_account_id' => 1,
			'allow_turn_off' => 1,
			'allow_modify' => 1,
			'state' => 'Lorem ipsum dolor sit amet',
			'county' => 'Lorem ipsum dolor sit amet',
			'city' => 'Lorem ipsum dolor sit amet',
			'company_2' => 'Lorem ipsum dolor ',
			'company_3' => 'Lorem ipsum dolor ',
			'company_4' => 'Lorem ipsum dolor ',
			'company_5' => 'Lorem ipsum dolor ',
			'deleted' => '2012-08-02 17:25:20',
			'deleted_by' => 1
		),
		array(
			'id' => 2,
			'name' => 'Lorem ipsum dolor sit amet',
			'account_id' => 2,
			'flat_rate' => 2,
			'percent' => 2,
			'calculate' => 2,
			'summarize' => 1,
			'itemize' => 1,
			'taxable' => 1,
			'overide_exempt' => 1,
			'not_apply_other_fees' => 1,
			'use_min' => 1,
			'use_max' => 1,
			'max' => 2,
			'min' => 2,
			'vendor_account_id' => 2,
			'allow_turn_off' => 1,
			'allow_modify' => 1,
			'state' => 'Lorem ipsum dolor sit amet',
			'county' => 'Lorem ipsum dolor sit amet',
			'city' => 'Lorem ipsum dolor sit amet',
			'company_2' => 'Lorem ipsum dolor ',
			'company_3' => 'Lorem ipsum dolor ',
			'company_4' => 'Lorem ipsum dolor ',
			'company_5' => 'Lorem ipsum dolor ',
			'deleted' => '2012-08-02 17:25:20',
			'deleted_by' => 2
		),
		array(
			'id' => 3,
			'name' => 'Lorem ipsum dolor sit amet',
			'account_id' => 3,
			'flat_rate' => 3,
			'percent' => 3,
			'calculate' => 3,
			'summarize' => 1,
			'itemize' => 1,
			'taxable' => 1,
			'overide_exempt' => 1,
			'not_apply_other_fees' => 1,
			'use_min' => 1,
			'use_max' => 1,
			'max' => 3,
			'min' => 3,
			'vendor_account_id' => 3,
			'allow_turn_off' => 1,
			'allow_modify' => 1,
			'state' => 'Lorem ipsum dolor sit amet',
			'county' => 'Lorem ipsum dolor sit amet',
			'city' => 'Lorem ipsum dolor sit amet',
			'company_2' => 'Lorem ipsum dolor ',
			'company_3' => 'Lorem ipsum dolor ',
			'company_4' => 'Lorem ipsum dolor ',
			'company_5' => 'Lorem ipsum dolor ',
			'deleted' => '2012-08-02 17:25:20',
			'deleted_by' => 3
		),
		array(
			'id' => 4,
			'name' => 'Lorem ipsum dolor sit amet',
			'account_id' => 4,
			'flat_rate' => 4,
			'percent' => 4,
			'calculate' => 4,
			'summarize' => 1,
			'itemize' => 1,
			'taxable' => 1,
			'overide_exempt' => 1,
			'not_apply_other_fees' => 1,
			'use_min' => 1,
			'use_max' => 1,
			'max' => 4,
			'min' => 4,
			'vendor_account_id' => 4,
			'allow_turn_off' => 1,
			'allow_modify' => 1,
			'state' => 'Lorem ipsum dolor sit amet',
			'county' => 'Lorem ipsum dolor sit amet',
			'city' => 'Lorem ipsum dolor sit amet',
			'company_2' => 'Lorem ipsum dolor ',
			'company_3' => 'Lorem ipsum dolor ',
			'company_4' => 'Lorem ipsum dolor ',
			'company_5' => 'Lorem ipsum dolor ',
			'deleted' => '2012-08-02 17:25:20',
			'deleted_by' => 4
		),
		array(
			'id' => 5,
			'name' => 'Lorem ipsum dolor sit amet',
			'account_id' => 5,
			'flat_rate' => 5,
			'percent' => 5,
			'calculate' => 5,
			'summarize' => 1,
			'itemize' => 1,
			'taxable' => 1,
			'overide_exempt' => 1,
			'not_apply_other_fees' => 1,
			'use_min' => 1,
			'use_max' => 1,
			'max' => 5,
			'min' => 5,
			'vendor_account_id' => 5,
			'allow_turn_off' => 1,
			'allow_modify' => 1,
			'state' => 'Lorem ipsum dolor sit amet',
			'county' => 'Lorem ipsum dolor sit amet',
			'city' => 'Lorem ipsum dolor sit amet',
			'company_2' => 'Lorem ipsum dolor ',
			'company_3' => 'Lorem ipsum dolor ',
			'company_4' => 'Lorem ipsum dolor ',
			'company_5' => 'Lorem ipsum dolor ',
			'deleted' => '2012-08-02 17:25:20',
			'deleted_by' => 5
		),
		array(
			'id' => 6,
			'name' => 'Lorem ipsum dolor sit amet',
			'account_id' => 6,
			'flat_rate' => 6,
			'percent' => 6,
			'calculate' => 6,
			'summarize' => 1,
			'itemize' => 1,
			'taxable' => 1,
			'overide_exempt' => 1,
			'not_apply_other_fees' => 1,
			'use_min' => 1,
			'use_max' => 1,
			'max' => 6,
			'min' => 6,
			'vendor_account_id' => 6,
			'allow_turn_off' => 1,
			'allow_modify' => 1,
			'state' => 'Lorem ipsum dolor sit amet',
			'county' => 'Lorem ipsum dolor sit amet',
			'city' => 'Lorem ipsum dolor sit amet',
			'company_2' => 'Lorem ipsum dolor ',
			'company_3' => 'Lorem ipsum dolor ',
			'company_4' => 'Lorem ipsum dolor ',
			'company_5' => 'Lorem ipsum dolor ',
			'deleted' => '2012-08-02 17:25:20',
			'deleted_by' => 6
		),
		array(
			'id' => 7,
			'name' => 'Lorem ipsum dolor sit amet',
			'account_id' => 7,
			'flat_rate' => 7,
			'percent' => 7,
			'calculate' => 7,
			'summarize' => 1,
			'itemize' => 1,
			'taxable' => 1,
			'overide_exempt' => 1,
			'not_apply_other_fees' => 1,
			'use_min' => 1,
			'use_max' => 1,
			'max' => 7,
			'min' => 7,
			'vendor_account_id' => 7,
			'allow_turn_off' => 1,
			'allow_modify' => 1,
			'state' => 'Lorem ipsum dolor sit amet',
			'county' => 'Lorem ipsum dolor sit amet',
			'city' => 'Lorem ipsum dolor sit amet',
			'company_2' => 'Lorem ipsum dolor ',
			'company_3' => 'Lorem ipsum dolor ',
			'company_4' => 'Lorem ipsum dolor ',
			'company_5' => 'Lorem ipsum dolor ',
			'deleted' => '2012-08-02 17:25:20',
			'deleted_by' => 7
		),
		array(
			'id' => 8,
			'name' => 'Lorem ipsum dolor sit amet',
			'account_id' => 8,
			'flat_rate' => 8,
			'percent' => 8,
			'calculate' => 8,
			'summarize' => 1,
			'itemize' => 1,
			'taxable' => 1,
			'overide_exempt' => 1,
			'not_apply_other_fees' => 1,
			'use_min' => 1,
			'use_max' => 1,
			'max' => 8,
			'min' => 8,
			'vendor_account_id' => 8,
			'allow_turn_off' => 1,
			'allow_modify' => 1,
			'state' => 'Lorem ipsum dolor sit amet',
			'county' => 'Lorem ipsum dolor sit amet',
			'city' => 'Lorem ipsum dolor sit amet',
			'company_2' => 'Lorem ipsum dolor ',
			'company_3' => 'Lorem ipsum dolor ',
			'company_4' => 'Lorem ipsum dolor ',
			'company_5' => 'Lorem ipsum dolor ',
			'deleted' => '2012-08-02 17:25:20',
			'deleted_by' => 8
		),
		array(
			'id' => 9,
			'name' => 'Lorem ipsum dolor sit amet',
			'account_id' => 9,
			'flat_rate' => 9,
			'percent' => 9,
			'calculate' => 9,
			'summarize' => 1,
			'itemize' => 1,
			'taxable' => 1,
			'overide_exempt' => 1,
			'not_apply_other_fees' => 1,
			'use_min' => 1,
			'use_max' => 1,
			'max' => 9,
			'min' => 9,
			'vendor_account_id' => 9,
			'allow_turn_off' => 1,
			'allow_modify' => 1,
			'state' => 'Lorem ipsum dolor sit amet',
			'county' => 'Lorem ipsum dolor sit amet',
			'city' => 'Lorem ipsum dolor sit amet',
			'company_2' => 'Lorem ipsum dolor ',
			'company_3' => 'Lorem ipsum dolor ',
			'company_4' => 'Lorem ipsum dolor ',
			'company_5' => 'Lorem ipsum dolor ',
			'deleted' => '2012-08-02 17:25:20',
			'deleted_by' => 9
		),
		array(
			'id' => 10,
			'name' => 'Lorem ipsum dolor sit amet',
			'account_id' => 10,
			'flat_rate' => 10,
			'percent' => 10,
			'calculate' => 10,
			'summarize' => 1,
			'itemize' => 1,
			'taxable' => 1,
			'overide_exempt' => 1,
			'not_apply_other_fees' => 1,
			'use_min' => 1,
			'use_max' => 1,
			'max' => 10,
			'min' => 10,
			'vendor_account_id' => 10,
			'allow_turn_off' => 1,
			'allow_modify' => 1,
			'state' => 'Lorem ipsum dolor sit amet',
			'county' => 'Lorem ipsum dolor sit amet',
			'city' => 'Lorem ipsum dolor sit amet',
			'company_2' => 'Lorem ipsum dolor ',
			'company_3' => 'Lorem ipsum dolor ',
			'company_4' => 'Lorem ipsum dolor ',
			'company_5' => 'Lorem ipsum dolor ',
			'deleted' => '2012-08-02 17:25:20',
			'deleted_by' => 10
		),
	);

}
