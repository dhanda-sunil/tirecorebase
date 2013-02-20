<?php
/**
 * ServiceFixture
 *
 */
class ServiceFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'service_type_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'tax_group_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'index'),
		'code' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 30, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'name' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'desc' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'std_hours' => array('type' => 'float', 'null' => false, 'default' => '0.0000', 'length' => '7,4'),
		'set_cost' => array('type' => 'boolean', 'null' => false, 'default' => '0'),
		'min_quantity' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => '8,2'),
		'max_quantity' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => '8,2'),
		'interval' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'default_note' => array('type' => 'text', 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'non_standard' => array('type' => 'boolean', 'null' => false, 'default' => '0'),
		'reps_prompt' => array('type' => 'boolean', 'null' => false, 'default' => '1'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'tax_group_id' => array('column' => 'tax_group_id', 'unique' => 0)
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
			'service_type_id' => 1,
			'tax_group_id' => 1,
			'code' => 'Lorem ipsum dolor sit amet',
			'name' => 'Lorem ipsum dolor sit amet',
			'desc' => 'Lorem ipsum dolor sit amet',
			'std_hours' => 1,
			'set_cost' => 1,
			'min_quantity' => 1,
			'max_quantity' => 1,
			'interval' => 1,
			'default_note' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'non_standard' => 1,
			'reps_prompt' => 1
		),
		array(
			'id' => 2,
			'service_type_id' => 2,
			'tax_group_id' => 2,
			'code' => 'Lorem ipsum dolor sit amet',
			'name' => 'Lorem ipsum dolor sit amet',
			'desc' => 'Lorem ipsum dolor sit amet',
			'std_hours' => 2,
			'set_cost' => 1,
			'min_quantity' => 2,
			'max_quantity' => 2,
			'interval' => 2,
			'default_note' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'non_standard' => 1,
			'reps_prompt' => 1
		),
		array(
			'id' => 3,
			'service_type_id' => 3,
			'tax_group_id' => 3,
			'code' => 'Lorem ipsum dolor sit amet',
			'name' => 'Lorem ipsum dolor sit amet',
			'desc' => 'Lorem ipsum dolor sit amet',
			'std_hours' => 3,
			'set_cost' => 1,
			'min_quantity' => 3,
			'max_quantity' => 3,
			'interval' => 3,
			'default_note' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'non_standard' => 1,
			'reps_prompt' => 1
		),
		array(
			'id' => 4,
			'service_type_id' => 4,
			'tax_group_id' => 4,
			'code' => 'Lorem ipsum dolor sit amet',
			'name' => 'Lorem ipsum dolor sit amet',
			'desc' => 'Lorem ipsum dolor sit amet',
			'std_hours' => 4,
			'set_cost' => 1,
			'min_quantity' => 4,
			'max_quantity' => 4,
			'interval' => 4,
			'default_note' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'non_standard' => 1,
			'reps_prompt' => 1
		),
		array(
			'id' => 5,
			'service_type_id' => 5,
			'tax_group_id' => 5,
			'code' => 'Lorem ipsum dolor sit amet',
			'name' => 'Lorem ipsum dolor sit amet',
			'desc' => 'Lorem ipsum dolor sit amet',
			'std_hours' => 5,
			'set_cost' => 1,
			'min_quantity' => 5,
			'max_quantity' => 5,
			'interval' => 5,
			'default_note' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'non_standard' => 1,
			'reps_prompt' => 1
		),
		array(
			'id' => 6,
			'service_type_id' => 6,
			'tax_group_id' => 6,
			'code' => 'Lorem ipsum dolor sit amet',
			'name' => 'Lorem ipsum dolor sit amet',
			'desc' => 'Lorem ipsum dolor sit amet',
			'std_hours' => 6,
			'set_cost' => 1,
			'min_quantity' => 6,
			'max_quantity' => 6,
			'interval' => 6,
			'default_note' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'non_standard' => 1,
			'reps_prompt' => 1
		),
		array(
			'id' => 7,
			'service_type_id' => 7,
			'tax_group_id' => 7,
			'code' => 'Lorem ipsum dolor sit amet',
			'name' => 'Lorem ipsum dolor sit amet',
			'desc' => 'Lorem ipsum dolor sit amet',
			'std_hours' => 7,
			'set_cost' => 1,
			'min_quantity' => 7,
			'max_quantity' => 7,
			'interval' => 7,
			'default_note' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'non_standard' => 1,
			'reps_prompt' => 1
		),
		array(
			'id' => 8,
			'service_type_id' => 8,
			'tax_group_id' => 8,
			'code' => 'Lorem ipsum dolor sit amet',
			'name' => 'Lorem ipsum dolor sit amet',
			'desc' => 'Lorem ipsum dolor sit amet',
			'std_hours' => 8,
			'set_cost' => 1,
			'min_quantity' => 8,
			'max_quantity' => 8,
			'interval' => 8,
			'default_note' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'non_standard' => 1,
			'reps_prompt' => 1
		),
		array(
			'id' => 9,
			'service_type_id' => 9,
			'tax_group_id' => 9,
			'code' => 'Lorem ipsum dolor sit amet',
			'name' => 'Lorem ipsum dolor sit amet',
			'desc' => 'Lorem ipsum dolor sit amet',
			'std_hours' => 9,
			'set_cost' => 1,
			'min_quantity' => 9,
			'max_quantity' => 9,
			'interval' => 9,
			'default_note' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'non_standard' => 1,
			'reps_prompt' => 1
		),
		array(
			'id' => 10,
			'service_type_id' => 10,
			'tax_group_id' => 10,
			'code' => 'Lorem ipsum dolor sit amet',
			'name' => 'Lorem ipsum dolor sit amet',
			'desc' => 'Lorem ipsum dolor sit amet',
			'std_hours' => 10,
			'set_cost' => 1,
			'min_quantity' => 10,
			'max_quantity' => 10,
			'interval' => 10,
			'default_note' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'non_standard' => 1,
			'reps_prompt' => 1
		),
	);

}
