<?php
/**
 * ProgramFixture
 *
 */
class ProgramFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 8, 'key' => 'primary'),
		'manufacturer_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 6, 'key' => 'index'),
		'is_national' => array('type' => 'boolean', 'null' => false, 'default' => '0'),
		'key' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 50, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'code' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 50, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'name' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'desc' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'all' => array('type' => 'boolean', 'null' => false, 'default' => '0'),
		'effective_date' => array('type' => 'date', 'null' => true, 'default' => null),
		'end_date' => array('type' => 'date', 'null' => true, 'default' => null),
		'image_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'pdf_file_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'deleted' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'program_account_id' => array('column' => 'manufacturer_id', 'unique' => 0)
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
			'manufacturer_id' => 1,
			'is_national' => 1,
			'key' => 'Lorem ipsum dolor sit amet',
			'code' => 'Lorem ipsum dolor sit amet',
			'name' => 'Lorem ipsum dolor sit amet',
			'desc' => 'Lorem ipsum dolor sit amet',
			'all' => 1,
			'effective_date' => '2012-08-02',
			'end_date' => '2012-08-02',
			'image_id' => 1,
			'pdf_file_id' => 1,
			'created' => '2012-08-02 17:24:48',
			'deleted' => '2012-08-02 17:24:48'
		),
		array(
			'id' => 2,
			'manufacturer_id' => 2,
			'is_national' => 1,
			'key' => 'Lorem ipsum dolor sit amet',
			'code' => 'Lorem ipsum dolor sit amet',
			'name' => 'Lorem ipsum dolor sit amet',
			'desc' => 'Lorem ipsum dolor sit amet',
			'all' => 1,
			'effective_date' => '2012-08-02',
			'end_date' => '2012-08-02',
			'image_id' => 2,
			'pdf_file_id' => 2,
			'created' => '2012-08-02 17:24:48',
			'deleted' => '2012-08-02 17:24:48'
		),
		array(
			'id' => 3,
			'manufacturer_id' => 3,
			'is_national' => 1,
			'key' => 'Lorem ipsum dolor sit amet',
			'code' => 'Lorem ipsum dolor sit amet',
			'name' => 'Lorem ipsum dolor sit amet',
			'desc' => 'Lorem ipsum dolor sit amet',
			'all' => 1,
			'effective_date' => '2012-08-02',
			'end_date' => '2012-08-02',
			'image_id' => 3,
			'pdf_file_id' => 3,
			'created' => '2012-08-02 17:24:48',
			'deleted' => '2012-08-02 17:24:48'
		),
		array(
			'id' => 4,
			'manufacturer_id' => 4,
			'is_national' => 1,
			'key' => 'Lorem ipsum dolor sit amet',
			'code' => 'Lorem ipsum dolor sit amet',
			'name' => 'Lorem ipsum dolor sit amet',
			'desc' => 'Lorem ipsum dolor sit amet',
			'all' => 1,
			'effective_date' => '2012-08-02',
			'end_date' => '2012-08-02',
			'image_id' => 4,
			'pdf_file_id' => 4,
			'created' => '2012-08-02 17:24:48',
			'deleted' => '2012-08-02 17:24:48'
		),
		array(
			'id' => 5,
			'manufacturer_id' => 5,
			'is_national' => 1,
			'key' => 'Lorem ipsum dolor sit amet',
			'code' => 'Lorem ipsum dolor sit amet',
			'name' => 'Lorem ipsum dolor sit amet',
			'desc' => 'Lorem ipsum dolor sit amet',
			'all' => 1,
			'effective_date' => '2012-08-02',
			'end_date' => '2012-08-02',
			'image_id' => 5,
			'pdf_file_id' => 5,
			'created' => '2012-08-02 17:24:48',
			'deleted' => '2012-08-02 17:24:48'
		),
		array(
			'id' => 6,
			'manufacturer_id' => 6,
			'is_national' => 1,
			'key' => 'Lorem ipsum dolor sit amet',
			'code' => 'Lorem ipsum dolor sit amet',
			'name' => 'Lorem ipsum dolor sit amet',
			'desc' => 'Lorem ipsum dolor sit amet',
			'all' => 1,
			'effective_date' => '2012-08-02',
			'end_date' => '2012-08-02',
			'image_id' => 6,
			'pdf_file_id' => 6,
			'created' => '2012-08-02 17:24:48',
			'deleted' => '2012-08-02 17:24:48'
		),
		array(
			'id' => 7,
			'manufacturer_id' => 7,
			'is_national' => 1,
			'key' => 'Lorem ipsum dolor sit amet',
			'code' => 'Lorem ipsum dolor sit amet',
			'name' => 'Lorem ipsum dolor sit amet',
			'desc' => 'Lorem ipsum dolor sit amet',
			'all' => 1,
			'effective_date' => '2012-08-02',
			'end_date' => '2012-08-02',
			'image_id' => 7,
			'pdf_file_id' => 7,
			'created' => '2012-08-02 17:24:48',
			'deleted' => '2012-08-02 17:24:48'
		),
		array(
			'id' => 8,
			'manufacturer_id' => 8,
			'is_national' => 1,
			'key' => 'Lorem ipsum dolor sit amet',
			'code' => 'Lorem ipsum dolor sit amet',
			'name' => 'Lorem ipsum dolor sit amet',
			'desc' => 'Lorem ipsum dolor sit amet',
			'all' => 1,
			'effective_date' => '2012-08-02',
			'end_date' => '2012-08-02',
			'image_id' => 8,
			'pdf_file_id' => 8,
			'created' => '2012-08-02 17:24:48',
			'deleted' => '2012-08-02 17:24:48'
		),
		array(
			'id' => 9,
			'manufacturer_id' => 9,
			'is_national' => 1,
			'key' => 'Lorem ipsum dolor sit amet',
			'code' => 'Lorem ipsum dolor sit amet',
			'name' => 'Lorem ipsum dolor sit amet',
			'desc' => 'Lorem ipsum dolor sit amet',
			'all' => 1,
			'effective_date' => '2012-08-02',
			'end_date' => '2012-08-02',
			'image_id' => 9,
			'pdf_file_id' => 9,
			'created' => '2012-08-02 17:24:48',
			'deleted' => '2012-08-02 17:24:48'
		),
		array(
			'id' => 10,
			'manufacturer_id' => 10,
			'is_national' => 1,
			'key' => 'Lorem ipsum dolor sit amet',
			'code' => 'Lorem ipsum dolor sit amet',
			'name' => 'Lorem ipsum dolor sit amet',
			'desc' => 'Lorem ipsum dolor sit amet',
			'all' => 1,
			'effective_date' => '2012-08-02',
			'end_date' => '2012-08-02',
			'image_id' => 10,
			'pdf_file_id' => 10,
			'created' => '2012-08-02 17:24:48',
			'deleted' => '2012-08-02 17:24:48'
		),
	);

}
