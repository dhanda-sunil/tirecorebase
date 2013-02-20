<?php
/**
 * AccountBalancesDefinitionFixture
 *
 */
class AccountBalancesDefinitionFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'table_name' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'start_date' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'end_date' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
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
			'table_name' => 'Lorem ipsum dolor sit amet',
			'start_date' => '2012-08-02 17:18:27',
			'end_date' => '2012-08-02 17:18:27',
			'created' => '2012-08-02 17:18:27'
		),
		array(
			'id' => 2,
			'table_name' => 'Lorem ipsum dolor sit amet',
			'start_date' => '2012-08-02 17:18:27',
			'end_date' => '2012-08-02 17:18:27',
			'created' => '2012-08-02 17:18:27'
		),
		array(
			'id' => 3,
			'table_name' => 'Lorem ipsum dolor sit amet',
			'start_date' => '2012-08-02 17:18:27',
			'end_date' => '2012-08-02 17:18:27',
			'created' => '2012-08-02 17:18:27'
		),
		array(
			'id' => 4,
			'table_name' => 'Lorem ipsum dolor sit amet',
			'start_date' => '2012-08-02 17:18:27',
			'end_date' => '2012-08-02 17:18:27',
			'created' => '2012-08-02 17:18:27'
		),
		array(
			'id' => 5,
			'table_name' => 'Lorem ipsum dolor sit amet',
			'start_date' => '2012-08-02 17:18:27',
			'end_date' => '2012-08-02 17:18:27',
			'created' => '2012-08-02 17:18:27'
		),
		array(
			'id' => 6,
			'table_name' => 'Lorem ipsum dolor sit amet',
			'start_date' => '2012-08-02 17:18:27',
			'end_date' => '2012-08-02 17:18:27',
			'created' => '2012-08-02 17:18:27'
		),
		array(
			'id' => 7,
			'table_name' => 'Lorem ipsum dolor sit amet',
			'start_date' => '2012-08-02 17:18:27',
			'end_date' => '2012-08-02 17:18:27',
			'created' => '2012-08-02 17:18:27'
		),
		array(
			'id' => 8,
			'table_name' => 'Lorem ipsum dolor sit amet',
			'start_date' => '2012-08-02 17:18:27',
			'end_date' => '2012-08-02 17:18:27',
			'created' => '2012-08-02 17:18:27'
		),
		array(
			'id' => 9,
			'table_name' => 'Lorem ipsum dolor sit amet',
			'start_date' => '2012-08-02 17:18:27',
			'end_date' => '2012-08-02 17:18:27',
			'created' => '2012-08-02 17:18:27'
		),
		array(
			'id' => 10,
			'table_name' => 'Lorem ipsum dolor sit amet',
			'start_date' => '2012-08-02 17:18:27',
			'end_date' => '2012-08-02 17:18:27',
			'created' => '2012-08-02 17:18:27'
		),
	);

}
