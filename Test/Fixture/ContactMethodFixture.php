<?php
/**
 * ContactMethodFixture
 *
 */
class ContactMethodFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'contact_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'type' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'value' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'primary' => array('type' => 'boolean', 'null' => false, 'default' => null),
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
			'contact_id' => 1,
			'type' => 'Lorem ipsum dolor sit amet',
			'value' => 'Lorem ipsum dolor sit amet',
			'primary' => 1
		),
		array(
			'id' => 2,
			'contact_id' => 2,
			'type' => 'Lorem ipsum dolor sit amet',
			'value' => 'Lorem ipsum dolor sit amet',
			'primary' => 1
		),
		array(
			'id' => 3,
			'contact_id' => 3,
			'type' => 'Lorem ipsum dolor sit amet',
			'value' => 'Lorem ipsum dolor sit amet',
			'primary' => 1
		),
		array(
			'id' => 4,
			'contact_id' => 4,
			'type' => 'Lorem ipsum dolor sit amet',
			'value' => 'Lorem ipsum dolor sit amet',
			'primary' => 1
		),
		array(
			'id' => 5,
			'contact_id' => 5,
			'type' => 'Lorem ipsum dolor sit amet',
			'value' => 'Lorem ipsum dolor sit amet',
			'primary' => 1
		),
		array(
			'id' => 6,
			'contact_id' => 6,
			'type' => 'Lorem ipsum dolor sit amet',
			'value' => 'Lorem ipsum dolor sit amet',
			'primary' => 1
		),
		array(
			'id' => 7,
			'contact_id' => 7,
			'type' => 'Lorem ipsum dolor sit amet',
			'value' => 'Lorem ipsum dolor sit amet',
			'primary' => 1
		),
		array(
			'id' => 8,
			'contact_id' => 8,
			'type' => 'Lorem ipsum dolor sit amet',
			'value' => 'Lorem ipsum dolor sit amet',
			'primary' => 1
		),
		array(
			'id' => 9,
			'contact_id' => 9,
			'type' => 'Lorem ipsum dolor sit amet',
			'value' => 'Lorem ipsum dolor sit amet',
			'primary' => 1
		),
		array(
			'id' => 10,
			'contact_id' => 10,
			'type' => 'Lorem ipsum dolor sit amet',
			'value' => 'Lorem ipsum dolor sit amet',
			'primary' => 1
		),
	);

}
