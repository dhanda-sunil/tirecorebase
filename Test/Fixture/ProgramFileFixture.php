<?php
/**
 * ProgramFileFixture
 *
 */
class ProgramFileFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'program_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 8),
		'label' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'name' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'extension' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 25, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'type' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 40, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'size' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 8),
		'binary' => array('type' => 'binary', 'null' => false, 'default' => null),
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
			'id' => 1,
			'program_id' => 1,
			'label' => 'Lorem ipsum dolor sit amet',
			'name' => 'Lorem ipsum dolor sit amet',
			'extension' => 'Lorem ipsum dolor sit a',
			'type' => 'Lorem ipsum dolor sit amet',
			'size' => 1,
			'binary' => 'Lorem ipsum dolor sit amet',
			'created' => '2012-08-02 17:24:41'
		),
		array(
			'id' => 2,
			'program_id' => 2,
			'label' => 'Lorem ipsum dolor sit amet',
			'name' => 'Lorem ipsum dolor sit amet',
			'extension' => 'Lorem ipsum dolor sit a',
			'type' => 'Lorem ipsum dolor sit amet',
			'size' => 2,
			'binary' => 'Lorem ipsum dolor sit amet',
			'created' => '2012-08-02 17:24:41'
		),
		array(
			'id' => 3,
			'program_id' => 3,
			'label' => 'Lorem ipsum dolor sit amet',
			'name' => 'Lorem ipsum dolor sit amet',
			'extension' => 'Lorem ipsum dolor sit a',
			'type' => 'Lorem ipsum dolor sit amet',
			'size' => 3,
			'binary' => 'Lorem ipsum dolor sit amet',
			'created' => '2012-08-02 17:24:41'
		),
		array(
			'id' => 4,
			'program_id' => 4,
			'label' => 'Lorem ipsum dolor sit amet',
			'name' => 'Lorem ipsum dolor sit amet',
			'extension' => 'Lorem ipsum dolor sit a',
			'type' => 'Lorem ipsum dolor sit amet',
			'size' => 4,
			'binary' => 'Lorem ipsum dolor sit amet',
			'created' => '2012-08-02 17:24:41'
		),
		array(
			'id' => 5,
			'program_id' => 5,
			'label' => 'Lorem ipsum dolor sit amet',
			'name' => 'Lorem ipsum dolor sit amet',
			'extension' => 'Lorem ipsum dolor sit a',
			'type' => 'Lorem ipsum dolor sit amet',
			'size' => 5,
			'binary' => 'Lorem ipsum dolor sit amet',
			'created' => '2012-08-02 17:24:41'
		),
		array(
			'id' => 6,
			'program_id' => 6,
			'label' => 'Lorem ipsum dolor sit amet',
			'name' => 'Lorem ipsum dolor sit amet',
			'extension' => 'Lorem ipsum dolor sit a',
			'type' => 'Lorem ipsum dolor sit amet',
			'size' => 6,
			'binary' => 'Lorem ipsum dolor sit amet',
			'created' => '2012-08-02 17:24:41'
		),
		array(
			'id' => 7,
			'program_id' => 7,
			'label' => 'Lorem ipsum dolor sit amet',
			'name' => 'Lorem ipsum dolor sit amet',
			'extension' => 'Lorem ipsum dolor sit a',
			'type' => 'Lorem ipsum dolor sit amet',
			'size' => 7,
			'binary' => 'Lorem ipsum dolor sit amet',
			'created' => '2012-08-02 17:24:41'
		),
		array(
			'id' => 8,
			'program_id' => 8,
			'label' => 'Lorem ipsum dolor sit amet',
			'name' => 'Lorem ipsum dolor sit amet',
			'extension' => 'Lorem ipsum dolor sit a',
			'type' => 'Lorem ipsum dolor sit amet',
			'size' => 8,
			'binary' => 'Lorem ipsum dolor sit amet',
			'created' => '2012-08-02 17:24:41'
		),
		array(
			'id' => 9,
			'program_id' => 9,
			'label' => 'Lorem ipsum dolor sit amet',
			'name' => 'Lorem ipsum dolor sit amet',
			'extension' => 'Lorem ipsum dolor sit a',
			'type' => 'Lorem ipsum dolor sit amet',
			'size' => 9,
			'binary' => 'Lorem ipsum dolor sit amet',
			'created' => '2012-08-02 17:24:41'
		),
		array(
			'id' => 10,
			'program_id' => 10,
			'label' => 'Lorem ipsum dolor sit amet',
			'name' => 'Lorem ipsum dolor sit amet',
			'extension' => 'Lorem ipsum dolor sit a',
			'type' => 'Lorem ipsum dolor sit amet',
			'size' => 10,
			'binary' => 'Lorem ipsum dolor sit amet',
			'created' => '2012-08-02 17:24:41'
		),
	);

}
