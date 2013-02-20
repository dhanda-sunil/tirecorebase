<?php
/**
 * TreadWidthFixture
 *
 */
class TreadWidthFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'size_standard' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => '4,2'),
		'size_mm' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 3),
		'suffix' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 1, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
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
			'size_standard' => 1,
			'size_mm' => 1,
			'suffix' => 'Lorem ipsum dolor sit ame'
		),
		array(
			'id' => 2,
			'size_standard' => 2,
			'size_mm' => 2,
			'suffix' => 'Lorem ipsum dolor sit ame'
		),
		array(
			'id' => 3,
			'size_standard' => 3,
			'size_mm' => 3,
			'suffix' => 'Lorem ipsum dolor sit ame'
		),
		array(
			'id' => 4,
			'size_standard' => 4,
			'size_mm' => 4,
			'suffix' => 'Lorem ipsum dolor sit ame'
		),
		array(
			'id' => 5,
			'size_standard' => 5,
			'size_mm' => 5,
			'suffix' => 'Lorem ipsum dolor sit ame'
		),
		array(
			'id' => 6,
			'size_standard' => 6,
			'size_mm' => 6,
			'suffix' => 'Lorem ipsum dolor sit ame'
		),
		array(
			'id' => 7,
			'size_standard' => 7,
			'size_mm' => 7,
			'suffix' => 'Lorem ipsum dolor sit ame'
		),
		array(
			'id' => 8,
			'size_standard' => 8,
			'size_mm' => 8,
			'suffix' => 'Lorem ipsum dolor sit ame'
		),
		array(
			'id' => 9,
			'size_standard' => 9,
			'size_mm' => 9,
			'suffix' => 'Lorem ipsum dolor sit ame'
		),
		array(
			'id' => 10,
			'size_standard' => 10,
			'size_mm' => 10,
			'suffix' => 'Lorem ipsum dolor sit ame'
		),
	);

}
