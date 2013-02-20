<?php
/**
 * RetreadMethodFixture
 *
 */
class RetreadMethodFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 20, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
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
			'name' => 'Lorem ipsum dolor '
		),
		array(
			'id' => 2,
			'name' => 'Lorem ipsum dolor '
		),
		array(
			'id' => 3,
			'name' => 'Lorem ipsum dolor '
		),
		array(
			'id' => 4,
			'name' => 'Lorem ipsum dolor '
		),
		array(
			'id' => 5,
			'name' => 'Lorem ipsum dolor '
		),
		array(
			'id' => 6,
			'name' => 'Lorem ipsum dolor '
		),
		array(
			'id' => 7,
			'name' => 'Lorem ipsum dolor '
		),
		array(
			'id' => 8,
			'name' => 'Lorem ipsum dolor '
		),
		array(
			'id' => 9,
			'name' => 'Lorem ipsum dolor '
		),
		array(
			'id' => 10,
			'name' => 'Lorem ipsum dolor '
		),
	);

}
