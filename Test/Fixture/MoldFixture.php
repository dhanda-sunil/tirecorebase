<?php
/**
 * MoldFixture
 *
 */
class MoldFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'mold_type_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'uses' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 4),
		'in_service' => array('type' => 'date', 'null' => false, 'default' => null),
		'last_used' => array('type' => 'date', 'null' => true, 'default' => null),
		'active' => array('type' => 'boolean', 'null' => false, 'default' => '1'),
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
			'mold_type_id' => 1,
			'uses' => 1,
			'in_service' => '2012-08-02',
			'last_used' => '2012-08-02',
			'active' => 1
		),
		array(
			'id' => 2,
			'mold_type_id' => 2,
			'uses' => 2,
			'in_service' => '2012-08-02',
			'last_used' => '2012-08-02',
			'active' => 1
		),
		array(
			'id' => 3,
			'mold_type_id' => 3,
			'uses' => 3,
			'in_service' => '2012-08-02',
			'last_used' => '2012-08-02',
			'active' => 1
		),
		array(
			'id' => 4,
			'mold_type_id' => 4,
			'uses' => 4,
			'in_service' => '2012-08-02',
			'last_used' => '2012-08-02',
			'active' => 1
		),
		array(
			'id' => 5,
			'mold_type_id' => 5,
			'uses' => 5,
			'in_service' => '2012-08-02',
			'last_used' => '2012-08-02',
			'active' => 1
		),
		array(
			'id' => 6,
			'mold_type_id' => 6,
			'uses' => 6,
			'in_service' => '2012-08-02',
			'last_used' => '2012-08-02',
			'active' => 1
		),
		array(
			'id' => 7,
			'mold_type_id' => 7,
			'uses' => 7,
			'in_service' => '2012-08-02',
			'last_used' => '2012-08-02',
			'active' => 1
		),
		array(
			'id' => 8,
			'mold_type_id' => 8,
			'uses' => 8,
			'in_service' => '2012-08-02',
			'last_used' => '2012-08-02',
			'active' => 1
		),
		array(
			'id' => 9,
			'mold_type_id' => 9,
			'uses' => 9,
			'in_service' => '2012-08-02',
			'last_used' => '2012-08-02',
			'active' => 1
		),
		array(
			'id' => 10,
			'mold_type_id' => 10,
			'uses' => 10,
			'in_service' => '2012-08-02',
			'last_used' => '2012-08-02',
			'active' => 1
		),
	);

}
