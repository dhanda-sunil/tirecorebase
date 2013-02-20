<?php
/**
 * ProgramProductFixture
 *
 */
class ProgramProductFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'program_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 8, 'key' => 'index'),
		'product_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'price' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => '8,2'),
		'desc' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'program_id' => array('column' => 'program_id', 'unique' => 0)
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
			'product_id' => 1,
			'price' => 1,
			'desc' => 'Lorem ipsum dolor sit amet',
			'modified' => '2012-08-02 17:24:44',
			'created' => '2012-08-02 17:24:44'
		),
		array(
			'id' => 2,
			'program_id' => 2,
			'product_id' => 2,
			'price' => 2,
			'desc' => 'Lorem ipsum dolor sit amet',
			'modified' => '2012-08-02 17:24:44',
			'created' => '2012-08-02 17:24:44'
		),
		array(
			'id' => 3,
			'program_id' => 3,
			'product_id' => 3,
			'price' => 3,
			'desc' => 'Lorem ipsum dolor sit amet',
			'modified' => '2012-08-02 17:24:44',
			'created' => '2012-08-02 17:24:44'
		),
		array(
			'id' => 4,
			'program_id' => 4,
			'product_id' => 4,
			'price' => 4,
			'desc' => 'Lorem ipsum dolor sit amet',
			'modified' => '2012-08-02 17:24:44',
			'created' => '2012-08-02 17:24:44'
		),
		array(
			'id' => 5,
			'program_id' => 5,
			'product_id' => 5,
			'price' => 5,
			'desc' => 'Lorem ipsum dolor sit amet',
			'modified' => '2012-08-02 17:24:44',
			'created' => '2012-08-02 17:24:44'
		),
		array(
			'id' => 6,
			'program_id' => 6,
			'product_id' => 6,
			'price' => 6,
			'desc' => 'Lorem ipsum dolor sit amet',
			'modified' => '2012-08-02 17:24:44',
			'created' => '2012-08-02 17:24:44'
		),
		array(
			'id' => 7,
			'program_id' => 7,
			'product_id' => 7,
			'price' => 7,
			'desc' => 'Lorem ipsum dolor sit amet',
			'modified' => '2012-08-02 17:24:44',
			'created' => '2012-08-02 17:24:44'
		),
		array(
			'id' => 8,
			'program_id' => 8,
			'product_id' => 8,
			'price' => 8,
			'desc' => 'Lorem ipsum dolor sit amet',
			'modified' => '2012-08-02 17:24:44',
			'created' => '2012-08-02 17:24:44'
		),
		array(
			'id' => 9,
			'program_id' => 9,
			'product_id' => 9,
			'price' => 9,
			'desc' => 'Lorem ipsum dolor sit amet',
			'modified' => '2012-08-02 17:24:44',
			'created' => '2012-08-02 17:24:44'
		),
		array(
			'id' => 10,
			'program_id' => 10,
			'product_id' => 10,
			'price' => 10,
			'desc' => 'Lorem ipsum dolor sit amet',
			'modified' => '2012-08-02 17:24:44',
			'created' => '2012-08-02 17:24:44'
		),
	);

}
