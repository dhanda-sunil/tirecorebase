<?php
/**
 * JournalDefinitionFixture
 *
 */
class JournalDefinitionFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
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
			'start_date' => '2012-08-02 17:21:44',
			'end_date' => '2012-08-02 17:21:44',
			'created' => '2012-08-02 17:21:44'
		),
		array(
			'id' => 2,
			'start_date' => '2012-08-02 17:21:44',
			'end_date' => '2012-08-02 17:21:44',
			'created' => '2012-08-02 17:21:44'
		),
		array(
			'id' => 3,
			'start_date' => '2012-08-02 17:21:44',
			'end_date' => '2012-08-02 17:21:44',
			'created' => '2012-08-02 17:21:44'
		),
		array(
			'id' => 4,
			'start_date' => '2012-08-02 17:21:44',
			'end_date' => '2012-08-02 17:21:44',
			'created' => '2012-08-02 17:21:44'
		),
		array(
			'id' => 5,
			'start_date' => '2012-08-02 17:21:44',
			'end_date' => '2012-08-02 17:21:44',
			'created' => '2012-08-02 17:21:44'
		),
		array(
			'id' => 6,
			'start_date' => '2012-08-02 17:21:44',
			'end_date' => '2012-08-02 17:21:44',
			'created' => '2012-08-02 17:21:44'
		),
		array(
			'id' => 7,
			'start_date' => '2012-08-02 17:21:44',
			'end_date' => '2012-08-02 17:21:44',
			'created' => '2012-08-02 17:21:44'
		),
		array(
			'id' => 8,
			'start_date' => '2012-08-02 17:21:44',
			'end_date' => '2012-08-02 17:21:44',
			'created' => '2012-08-02 17:21:44'
		),
		array(
			'id' => 9,
			'start_date' => '2012-08-02 17:21:44',
			'end_date' => '2012-08-02 17:21:44',
			'created' => '2012-08-02 17:21:44'
		),
		array(
			'id' => 10,
			'start_date' => '2012-08-02 17:21:44',
			'end_date' => '2012-08-02 17:21:44',
			'created' => '2012-08-02 17:21:44'
		),
	);

}
