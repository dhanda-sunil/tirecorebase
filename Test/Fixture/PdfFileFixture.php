<?php
/**
 * PdfFileFixture
 *
 */
class PdfFileFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'data' => array('type' => 'binary', 'null' => false, 'default' => null),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'created_by' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
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
			'data' => 'Lorem ipsum dolor sit amet',
			'created' => '2012-08-02 17:23:23',
			'created_by' => 1
		),
		array(
			'id' => 2,
			'data' => 'Lorem ipsum dolor sit amet',
			'created' => '2012-08-02 17:23:23',
			'created_by' => 2
		),
		array(
			'id' => 3,
			'data' => 'Lorem ipsum dolor sit amet',
			'created' => '2012-08-02 17:23:23',
			'created_by' => 3
		),
		array(
			'id' => 4,
			'data' => 'Lorem ipsum dolor sit amet',
			'created' => '2012-08-02 17:23:23',
			'created_by' => 4
		),
		array(
			'id' => 5,
			'data' => 'Lorem ipsum dolor sit amet',
			'created' => '2012-08-02 17:23:23',
			'created_by' => 5
		),
		array(
			'id' => 6,
			'data' => 'Lorem ipsum dolor sit amet',
			'created' => '2012-08-02 17:23:23',
			'created_by' => 6
		),
		array(
			'id' => 7,
			'data' => 'Lorem ipsum dolor sit amet',
			'created' => '2012-08-02 17:23:23',
			'created_by' => 7
		),
		array(
			'id' => 8,
			'data' => 'Lorem ipsum dolor sit amet',
			'created' => '2012-08-02 17:23:23',
			'created_by' => 8
		),
		array(
			'id' => 9,
			'data' => 'Lorem ipsum dolor sit amet',
			'created' => '2012-08-02 17:23:23',
			'created_by' => 9
		),
		array(
			'id' => 10,
			'data' => 'Lorem ipsum dolor sit amet',
			'created' => '2012-08-02 17:23:23',
			'created_by' => 10
		),
	);

}
