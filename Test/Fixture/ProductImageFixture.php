<?php
/**
 * ProductImageFixture
 *
 */
class ProductImageFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 8, 'key' => 'primary'),
		'product_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 7),
		'file_image_id' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 14, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'default' => array('type' => 'boolean', 'null' => false, 'default' => '0'),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'created_by' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 8),
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
			'product_id' => 1,
			'file_image_id' => 'Lorem ipsum ',
			'default' => 1,
			'created' => '2012-08-02 17:24:05',
			'created_by' => 1
		),
		array(
			'id' => 2,
			'product_id' => 2,
			'file_image_id' => 'Lorem ipsum ',
			'default' => 1,
			'created' => '2012-08-02 17:24:05',
			'created_by' => 2
		),
		array(
			'id' => 3,
			'product_id' => 3,
			'file_image_id' => 'Lorem ipsum ',
			'default' => 1,
			'created' => '2012-08-02 17:24:05',
			'created_by' => 3
		),
		array(
			'id' => 4,
			'product_id' => 4,
			'file_image_id' => 'Lorem ipsum ',
			'default' => 1,
			'created' => '2012-08-02 17:24:05',
			'created_by' => 4
		),
		array(
			'id' => 5,
			'product_id' => 5,
			'file_image_id' => 'Lorem ipsum ',
			'default' => 1,
			'created' => '2012-08-02 17:24:05',
			'created_by' => 5
		),
		array(
			'id' => 6,
			'product_id' => 6,
			'file_image_id' => 'Lorem ipsum ',
			'default' => 1,
			'created' => '2012-08-02 17:24:05',
			'created_by' => 6
		),
		array(
			'id' => 7,
			'product_id' => 7,
			'file_image_id' => 'Lorem ipsum ',
			'default' => 1,
			'created' => '2012-08-02 17:24:05',
			'created_by' => 7
		),
		array(
			'id' => 8,
			'product_id' => 8,
			'file_image_id' => 'Lorem ipsum ',
			'default' => 1,
			'created' => '2012-08-02 17:24:05',
			'created_by' => 8
		),
		array(
			'id' => 9,
			'product_id' => 9,
			'file_image_id' => 'Lorem ipsum ',
			'default' => 1,
			'created' => '2012-08-02 17:24:05',
			'created_by' => 9
		),
		array(
			'id' => 10,
			'product_id' => 10,
			'file_image_id' => 'Lorem ipsum ',
			'default' => 1,
			'created' => '2012-08-02 17:24:05',
			'created_by' => 10
		),
	);

}
