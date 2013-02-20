<?php
/**
 * NrtCodeFixture
 *
 */
class NrtCodeFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'abbr' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 5, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 45, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'description' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
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
			'abbr' => 'Lor',
			'name' => 'Lorem ipsum dolor sit amet',
			'description' => 'Lorem ipsum dolor sit amet'
		),
		array(
			'id' => 2,
			'abbr' => 'Lor',
			'name' => 'Lorem ipsum dolor sit amet',
			'description' => 'Lorem ipsum dolor sit amet'
		),
		array(
			'id' => 3,
			'abbr' => 'Lor',
			'name' => 'Lorem ipsum dolor sit amet',
			'description' => 'Lorem ipsum dolor sit amet'
		),
		array(
			'id' => 4,
			'abbr' => 'Lor',
			'name' => 'Lorem ipsum dolor sit amet',
			'description' => 'Lorem ipsum dolor sit amet'
		),
		array(
			'id' => 5,
			'abbr' => 'Lor',
			'name' => 'Lorem ipsum dolor sit amet',
			'description' => 'Lorem ipsum dolor sit amet'
		),
		array(
			'id' => 6,
			'abbr' => 'Lor',
			'name' => 'Lorem ipsum dolor sit amet',
			'description' => 'Lorem ipsum dolor sit amet'
		),
		array(
			'id' => 7,
			'abbr' => 'Lor',
			'name' => 'Lorem ipsum dolor sit amet',
			'description' => 'Lorem ipsum dolor sit amet'
		),
		array(
			'id' => 8,
			'abbr' => 'Lor',
			'name' => 'Lorem ipsum dolor sit amet',
			'description' => 'Lorem ipsum dolor sit amet'
		),
		array(
			'id' => 9,
			'abbr' => 'Lor',
			'name' => 'Lorem ipsum dolor sit amet',
			'description' => 'Lorem ipsum dolor sit amet'
		),
		array(
			'id' => 10,
			'abbr' => 'Lor',
			'name' => 'Lorem ipsum dolor sit amet',
			'description' => 'Lorem ipsum dolor sit amet'
		),
	);

}
