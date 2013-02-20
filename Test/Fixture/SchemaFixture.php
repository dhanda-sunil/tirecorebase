<?php
/**
 * SchemaFixture
 *
 */
class SchemaFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'schema';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'ver' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'updated' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'ver', 'unique' => 1)
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
			'ver' => 1,
			'updated' => '2012-10-15 15:31:32'
		),
	);

}
