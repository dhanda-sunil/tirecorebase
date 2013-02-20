<?php
/**
 * JournalEntryTypeFixture
 *
 */
class JournalEntryTypeFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 8, 'key' => 'primary'),
		'ref_table' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 30, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'description' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 50, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
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
			'ref_table' => 'Lorem ipsum dolor sit amet',
			'description' => 'Lorem ipsum dolor sit amet'
		),
		array(
			'id' => 2,
			'ref_table' => 'Lorem ipsum dolor sit amet',
			'description' => 'Lorem ipsum dolor sit amet'
		),
		array(
			'id' => 3,
			'ref_table' => 'Lorem ipsum dolor sit amet',
			'description' => 'Lorem ipsum dolor sit amet'
		),
		array(
			'id' => 4,
			'ref_table' => 'Lorem ipsum dolor sit amet',
			'description' => 'Lorem ipsum dolor sit amet'
		),
		array(
			'id' => 5,
			'ref_table' => 'Lorem ipsum dolor sit amet',
			'description' => 'Lorem ipsum dolor sit amet'
		),
		array(
			'id' => 6,
			'ref_table' => 'Lorem ipsum dolor sit amet',
			'description' => 'Lorem ipsum dolor sit amet'
		),
		array(
			'id' => 7,
			'ref_table' => 'Lorem ipsum dolor sit amet',
			'description' => 'Lorem ipsum dolor sit amet'
		),
		array(
			'id' => 8,
			'ref_table' => 'Lorem ipsum dolor sit amet',
			'description' => 'Lorem ipsum dolor sit amet'
		),
		array(
			'id' => 9,
			'ref_table' => 'Lorem ipsum dolor sit amet',
			'description' => 'Lorem ipsum dolor sit amet'
		),
		array(
			'id' => 10,
			'ref_table' => 'Lorem ipsum dolor sit amet',
			'description' => 'Lorem ipsum dolor sit amet'
		),
	);

}
