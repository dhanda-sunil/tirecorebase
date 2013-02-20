<?php
/**
 * TerminalsLogFixture
 *
 */
class TerminalsLogFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'terminal_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'index'),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'terminal_id' => array('column' => 'terminal_id', 'unique' => 0)
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
			'user_id' => 1,
			'terminal_id' => 1,
			'created' => '2012-08-02 17:25:38'
		),
		array(
			'id' => 2,
			'user_id' => 2,
			'terminal_id' => 2,
			'created' => '2012-08-02 17:25:38'
		),
		array(
			'id' => 3,
			'user_id' => 3,
			'terminal_id' => 3,
			'created' => '2012-08-02 17:25:38'
		),
		array(
			'id' => 4,
			'user_id' => 4,
			'terminal_id' => 4,
			'created' => '2012-08-02 17:25:38'
		),
		array(
			'id' => 5,
			'user_id' => 5,
			'terminal_id' => 5,
			'created' => '2012-08-02 17:25:38'
		),
		array(
			'id' => 6,
			'user_id' => 6,
			'terminal_id' => 6,
			'created' => '2012-08-02 17:25:38'
		),
		array(
			'id' => 7,
			'user_id' => 7,
			'terminal_id' => 7,
			'created' => '2012-08-02 17:25:38'
		),
		array(
			'id' => 8,
			'user_id' => 8,
			'terminal_id' => 8,
			'created' => '2012-08-02 17:25:38'
		),
		array(
			'id' => 9,
			'user_id' => 9,
			'terminal_id' => 9,
			'created' => '2012-08-02 17:25:38'
		),
		array(
			'id' => 10,
			'user_id' => 10,
			'terminal_id' => 10,
			'created' => '2012-08-02 17:25:38'
		),
	);

}
