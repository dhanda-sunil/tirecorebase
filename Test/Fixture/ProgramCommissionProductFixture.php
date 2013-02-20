<?php
/**
 * ProgramCommissionProductFixture
 *
 */
class ProgramCommissionProductFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'program_commission_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'program_product_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'indexes' => array(
			
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
			'program_commission_id' => 1,
			'program_product_id' => 1
		),
		array(
			'program_commission_id' => 2,
			'program_product_id' => 2
		),
		array(
			'program_commission_id' => 3,
			'program_product_id' => 3
		),
		array(
			'program_commission_id' => 4,
			'program_product_id' => 4
		),
		array(
			'program_commission_id' => 5,
			'program_product_id' => 5
		),
		array(
			'program_commission_id' => 6,
			'program_product_id' => 6
		),
		array(
			'program_commission_id' => 7,
			'program_product_id' => 7
		),
		array(
			'program_commission_id' => 8,
			'program_product_id' => 8
		),
		array(
			'program_commission_id' => 9,
			'program_product_id' => 9
		),
		array(
			'program_commission_id' => 10,
			'program_product_id' => 10
		),
	);

}
