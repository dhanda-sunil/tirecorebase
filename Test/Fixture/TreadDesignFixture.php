<?php
/**
 * TreadDesignFixture
 *
 */
class TreadDesignFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'tread_abb' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 45, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'name' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'xref' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'stock_status' => array('type' => 'boolean', 'null' => true, 'default' => '1'),
		'vendor_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'grade' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 2, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'MyISAM')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'tread_abb' => 'Lorem ipsum dolor sit amet',
			'name' => 'Lorem ipsum dolor sit amet',
			'xref' => 'Lorem ipsum dolor sit amet',
			'stock_status' => 1,
			'vendor_id' => 1,
			'grade' => ''
		),
		array(
			'id' => 2,
			'tread_abb' => 'Lorem ipsum dolor sit amet',
			'name' => 'Lorem ipsum dolor sit amet',
			'xref' => 'Lorem ipsum dolor sit amet',
			'stock_status' => 1,
			'vendor_id' => 2,
			'grade' => ''
		),
		array(
			'id' => 3,
			'tread_abb' => 'Lorem ipsum dolor sit amet',
			'name' => 'Lorem ipsum dolor sit amet',
			'xref' => 'Lorem ipsum dolor sit amet',
			'stock_status' => 1,
			'vendor_id' => 3,
			'grade' => ''
		),
		array(
			'id' => 4,
			'tread_abb' => 'Lorem ipsum dolor sit amet',
			'name' => 'Lorem ipsum dolor sit amet',
			'xref' => 'Lorem ipsum dolor sit amet',
			'stock_status' => 1,
			'vendor_id' => 4,
			'grade' => ''
		),
		array(
			'id' => 5,
			'tread_abb' => 'Lorem ipsum dolor sit amet',
			'name' => 'Lorem ipsum dolor sit amet',
			'xref' => 'Lorem ipsum dolor sit amet',
			'stock_status' => 1,
			'vendor_id' => 5,
			'grade' => ''
		),
		array(
			'id' => 6,
			'tread_abb' => 'Lorem ipsum dolor sit amet',
			'name' => 'Lorem ipsum dolor sit amet',
			'xref' => 'Lorem ipsum dolor sit amet',
			'stock_status' => 1,
			'vendor_id' => 6,
			'grade' => ''
		),
		array(
			'id' => 7,
			'tread_abb' => 'Lorem ipsum dolor sit amet',
			'name' => 'Lorem ipsum dolor sit amet',
			'xref' => 'Lorem ipsum dolor sit amet',
			'stock_status' => 1,
			'vendor_id' => 7,
			'grade' => ''
		),
		array(
			'id' => 8,
			'tread_abb' => 'Lorem ipsum dolor sit amet',
			'name' => 'Lorem ipsum dolor sit amet',
			'xref' => 'Lorem ipsum dolor sit amet',
			'stock_status' => 1,
			'vendor_id' => 8,
			'grade' => ''
		),
		array(
			'id' => 9,
			'tread_abb' => 'Lorem ipsum dolor sit amet',
			'name' => 'Lorem ipsum dolor sit amet',
			'xref' => 'Lorem ipsum dolor sit amet',
			'stock_status' => 1,
			'vendor_id' => 9,
			'grade' => ''
		),
		array(
			'id' => 10,
			'tread_abb' => 'Lorem ipsum dolor sit amet',
			'name' => 'Lorem ipsum dolor sit amet',
			'xref' => 'Lorem ipsum dolor sit amet',
			'stock_status' => 1,
			'vendor_id' => 10,
			'grade' => ''
		),
	);

}
