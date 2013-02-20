<?php
/**
 * BuffSpecTireSizeFixture
 *
 */
class BuffSpecTireSizeFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'buff_spec_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'tire_size_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'buff_spec_id' => array('column' => array('buff_spec_id', 'tire_size_id'), 'unique' => 0)
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
			'buff_spec_id' => 1,
			'tire_size_id' => 1
		),
		array(
			'id' => 2,
			'buff_spec_id' => 2,
			'tire_size_id' => 2
		),
		array(
			'id' => 3,
			'buff_spec_id' => 3,
			'tire_size_id' => 3
		),
		array(
			'id' => 4,
			'buff_spec_id' => 4,
			'tire_size_id' => 4
		),
		array(
			'id' => 5,
			'buff_spec_id' => 5,
			'tire_size_id' => 5
		),
		array(
			'id' => 6,
			'buff_spec_id' => 6,
			'tire_size_id' => 6
		),
		array(
			'id' => 7,
			'buff_spec_id' => 7,
			'tire_size_id' => 7
		),
		array(
			'id' => 8,
			'buff_spec_id' => 8,
			'tire_size_id' => 8
		),
		array(
			'id' => 9,
			'buff_spec_id' => 9,
			'tire_size_id' => 9
		),
		array(
			'id' => 10,
			'buff_spec_id' => 10,
			'tire_size_id' => 10
		),
	);

}
