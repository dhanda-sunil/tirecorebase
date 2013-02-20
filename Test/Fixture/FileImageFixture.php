<?php
/**
 * FileImageFixture
 *
 */
class FileImageFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 14, 'key' => 'primary', 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'binary' => array('type' => 'binary', 'null' => false, 'default' => null),
		'name' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'mime' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 40, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'size' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 8),
		'width' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 8),
		'height' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 8),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
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
			'id' => 'Lorem ipsum ',
			'binary' => 'Lorem ipsum dolor sit amet',
			'name' => 'Lorem ipsum dolor sit amet',
			'mime' => 'Lorem ipsum dolor sit amet',
			'size' => 1,
			'width' => 1,
			'height' => 1,
			'created' => '2012-08-02 17:21:36'
		),
		array(
			'id' => 'Lorem ipsum ',
			'binary' => 'Lorem ipsum dolor sit amet',
			'name' => 'Lorem ipsum dolor sit amet',
			'mime' => 'Lorem ipsum dolor sit amet',
			'size' => 2,
			'width' => 2,
			'height' => 2,
			'created' => '2012-08-02 17:21:36'
		),
		array(
			'id' => 'Lorem ipsum ',
			'binary' => 'Lorem ipsum dolor sit amet',
			'name' => 'Lorem ipsum dolor sit amet',
			'mime' => 'Lorem ipsum dolor sit amet',
			'size' => 3,
			'width' => 3,
			'height' => 3,
			'created' => '2012-08-02 17:21:36'
		),
		array(
			'id' => 'Lorem ipsum ',
			'binary' => 'Lorem ipsum dolor sit amet',
			'name' => 'Lorem ipsum dolor sit amet',
			'mime' => 'Lorem ipsum dolor sit amet',
			'size' => 4,
			'width' => 4,
			'height' => 4,
			'created' => '2012-08-02 17:21:36'
		),
		array(
			'id' => 'Lorem ipsum ',
			'binary' => 'Lorem ipsum dolor sit amet',
			'name' => 'Lorem ipsum dolor sit amet',
			'mime' => 'Lorem ipsum dolor sit amet',
			'size' => 5,
			'width' => 5,
			'height' => 5,
			'created' => '2012-08-02 17:21:36'
		),
		array(
			'id' => 'Lorem ipsum ',
			'binary' => 'Lorem ipsum dolor sit amet',
			'name' => 'Lorem ipsum dolor sit amet',
			'mime' => 'Lorem ipsum dolor sit amet',
			'size' => 6,
			'width' => 6,
			'height' => 6,
			'created' => '2012-08-02 17:21:36'
		),
		array(
			'id' => 'Lorem ipsum ',
			'binary' => 'Lorem ipsum dolor sit amet',
			'name' => 'Lorem ipsum dolor sit amet',
			'mime' => 'Lorem ipsum dolor sit amet',
			'size' => 7,
			'width' => 7,
			'height' => 7,
			'created' => '2012-08-02 17:21:36'
		),
		array(
			'id' => 'Lorem ipsum ',
			'binary' => 'Lorem ipsum dolor sit amet',
			'name' => 'Lorem ipsum dolor sit amet',
			'mime' => 'Lorem ipsum dolor sit amet',
			'size' => 8,
			'width' => 8,
			'height' => 8,
			'created' => '2012-08-02 17:21:36'
		),
		array(
			'id' => 'Lorem ipsum ',
			'binary' => 'Lorem ipsum dolor sit amet',
			'name' => 'Lorem ipsum dolor sit amet',
			'mime' => 'Lorem ipsum dolor sit amet',
			'size' => 9,
			'width' => 9,
			'height' => 9,
			'created' => '2012-08-02 17:21:36'
		),
		array(
			'id' => 'Lorem ipsum ',
			'binary' => 'Lorem ipsum dolor sit amet',
			'name' => 'Lorem ipsum dolor sit amet',
			'mime' => 'Lorem ipsum dolor sit amet',
			'size' => 10,
			'width' => 10,
			'height' => 10,
			'created' => '2012-08-02 17:21:36'
		),
	);

}
