<?php
/**
 * SystemSettingDefinitionFixture
 *
 */
class SystemSettingDefinitionFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'key' => array('type' => 'string', 'null' => false, 'default' => null, 'key' => 'primary', 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 127, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'ref_table' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 127, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'default_value' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 127, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'max_level' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 4),
		'system_setting_category_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 9, 'key' => 'index'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'key', 'unique' => 1),
			'system_setting_catigory_id' => array('column' => array('system_setting_category_id', 'name'), 'unique' => 0)
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
			'key' => 'Lorem ipsum dolor sit amet',
			'name' => 'Lorem ipsum dolor sit amet',
			'ref_table' => 'Lorem ipsum dolor sit amet',
			'default_value' => 'Lorem ipsum dolor sit amet',
			'max_level' => 1,
			'system_setting_category_id' => 1
		),
		array(
			'key' => 'Lorem ipsum dolor sit amet',
			'name' => 'Lorem ipsum dolor sit amet',
			'ref_table' => 'Lorem ipsum dolor sit amet',
			'default_value' => 'Lorem ipsum dolor sit amet',
			'max_level' => 2,
			'system_setting_category_id' => 2
		),
		array(
			'key' => 'Lorem ipsum dolor sit amet',
			'name' => 'Lorem ipsum dolor sit amet',
			'ref_table' => 'Lorem ipsum dolor sit amet',
			'default_value' => 'Lorem ipsum dolor sit amet',
			'max_level' => 3,
			'system_setting_category_id' => 3
		),
		array(
			'key' => 'Lorem ipsum dolor sit amet',
			'name' => 'Lorem ipsum dolor sit amet',
			'ref_table' => 'Lorem ipsum dolor sit amet',
			'default_value' => 'Lorem ipsum dolor sit amet',
			'max_level' => 4,
			'system_setting_category_id' => 4
		),
		array(
			'key' => 'Lorem ipsum dolor sit amet',
			'name' => 'Lorem ipsum dolor sit amet',
			'ref_table' => 'Lorem ipsum dolor sit amet',
			'default_value' => 'Lorem ipsum dolor sit amet',
			'max_level' => 5,
			'system_setting_category_id' => 5
		),
		array(
			'key' => 'Lorem ipsum dolor sit amet',
			'name' => 'Lorem ipsum dolor sit amet',
			'ref_table' => 'Lorem ipsum dolor sit amet',
			'default_value' => 'Lorem ipsum dolor sit amet',
			'max_level' => 6,
			'system_setting_category_id' => 6
		),
		array(
			'key' => 'Lorem ipsum dolor sit amet',
			'name' => 'Lorem ipsum dolor sit amet',
			'ref_table' => 'Lorem ipsum dolor sit amet',
			'default_value' => 'Lorem ipsum dolor sit amet',
			'max_level' => 7,
			'system_setting_category_id' => 7
		),
		array(
			'key' => 'Lorem ipsum dolor sit amet',
			'name' => 'Lorem ipsum dolor sit amet',
			'ref_table' => 'Lorem ipsum dolor sit amet',
			'default_value' => 'Lorem ipsum dolor sit amet',
			'max_level' => 8,
			'system_setting_category_id' => 8
		),
		array(
			'key' => 'Lorem ipsum dolor sit amet',
			'name' => 'Lorem ipsum dolor sit amet',
			'ref_table' => 'Lorem ipsum dolor sit amet',
			'default_value' => 'Lorem ipsum dolor sit amet',
			'max_level' => 9,
			'system_setting_category_id' => 9
		),
		array(
			'key' => 'Lorem ipsum dolor sit amet',
			'name' => 'Lorem ipsum dolor sit amet',
			'ref_table' => 'Lorem ipsum dolor sit amet',
			'default_value' => 'Lorem ipsum dolor sit amet',
			'max_level' => 10,
			'system_setting_category_id' => 10
		),
	);

}
