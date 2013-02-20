<?php
/**
 * ProgramCommissionFixture
 *
 */
class ProgramCommissionFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'program_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'desc' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'rate' => array('type' => 'float', 'null' => true, 'default' => null, 'length' => '9,2'),
		'amount' => array('type' => 'float', 'null' => true, 'default' => null, 'length' => '9,2'),
		'min_quantity' => array('type' => 'float', 'null' => true, 'default' => null, 'length' => '8,2'),
		'max_quantity' => array('type' => 'float', 'null' => true, 'default' => null, 'length' => '8,2'),
		'all_items' => array('type' => 'boolean', 'null' => false, 'default' => '1'),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'created_by' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
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
			'desc' => 'Lorem ipsum dolor sit amet',
			'rate' => 1,
			'amount' => 1,
			'min_quantity' => 1,
			'max_quantity' => 1,
			'all_items' => 1,
			'created' => '2012-08-02 17:24:39',
			'created_by' => 1,
			'modified' => '2012-08-02 17:24:39'
		),
		array(
			'id' => 2,
			'program_id' => 2,
			'desc' => 'Lorem ipsum dolor sit amet',
			'rate' => 2,
			'amount' => 2,
			'min_quantity' => 2,
			'max_quantity' => 2,
			'all_items' => 1,
			'created' => '2012-08-02 17:24:39',
			'created_by' => 2,
			'modified' => '2012-08-02 17:24:39'
		),
		array(
			'id' => 3,
			'program_id' => 3,
			'desc' => 'Lorem ipsum dolor sit amet',
			'rate' => 3,
			'amount' => 3,
			'min_quantity' => 3,
			'max_quantity' => 3,
			'all_items' => 1,
			'created' => '2012-08-02 17:24:39',
			'created_by' => 3,
			'modified' => '2012-08-02 17:24:39'
		),
		array(
			'id' => 4,
			'program_id' => 4,
			'desc' => 'Lorem ipsum dolor sit amet',
			'rate' => 4,
			'amount' => 4,
			'min_quantity' => 4,
			'max_quantity' => 4,
			'all_items' => 1,
			'created' => '2012-08-02 17:24:39',
			'created_by' => 4,
			'modified' => '2012-08-02 17:24:39'
		),
		array(
			'id' => 5,
			'program_id' => 5,
			'desc' => 'Lorem ipsum dolor sit amet',
			'rate' => 5,
			'amount' => 5,
			'min_quantity' => 5,
			'max_quantity' => 5,
			'all_items' => 1,
			'created' => '2012-08-02 17:24:39',
			'created_by' => 5,
			'modified' => '2012-08-02 17:24:39'
		),
		array(
			'id' => 6,
			'program_id' => 6,
			'desc' => 'Lorem ipsum dolor sit amet',
			'rate' => 6,
			'amount' => 6,
			'min_quantity' => 6,
			'max_quantity' => 6,
			'all_items' => 1,
			'created' => '2012-08-02 17:24:39',
			'created_by' => 6,
			'modified' => '2012-08-02 17:24:39'
		),
		array(
			'id' => 7,
			'program_id' => 7,
			'desc' => 'Lorem ipsum dolor sit amet',
			'rate' => 7,
			'amount' => 7,
			'min_quantity' => 7,
			'max_quantity' => 7,
			'all_items' => 1,
			'created' => '2012-08-02 17:24:39',
			'created_by' => 7,
			'modified' => '2012-08-02 17:24:39'
		),
		array(
			'id' => 8,
			'program_id' => 8,
			'desc' => 'Lorem ipsum dolor sit amet',
			'rate' => 8,
			'amount' => 8,
			'min_quantity' => 8,
			'max_quantity' => 8,
			'all_items' => 1,
			'created' => '2012-08-02 17:24:39',
			'created_by' => 8,
			'modified' => '2012-08-02 17:24:39'
		),
		array(
			'id' => 9,
			'program_id' => 9,
			'desc' => 'Lorem ipsum dolor sit amet',
			'rate' => 9,
			'amount' => 9,
			'min_quantity' => 9,
			'max_quantity' => 9,
			'all_items' => 1,
			'created' => '2012-08-02 17:24:39',
			'created_by' => 9,
			'modified' => '2012-08-02 17:24:39'
		),
		array(
			'id' => 10,
			'program_id' => 10,
			'desc' => 'Lorem ipsum dolor sit amet',
			'rate' => 10,
			'amount' => 10,
			'min_quantity' => 10,
			'max_quantity' => 10,
			'all_items' => 1,
			'created' => '2012-08-02 17:24:39',
			'created_by' => 10,
			'modified' => '2012-08-02 17:24:39'
		),
	);

}
