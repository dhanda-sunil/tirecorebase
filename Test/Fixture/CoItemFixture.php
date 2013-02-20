<?php
/**
 * CoItemFixture
 *
 */
class CoItemFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'co_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 13, 'key' => 'index'),
		'line_number' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 5),
		'line_suffix' => array('type' => 'string', 'null' => false, 'length' => 1, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'casing_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'comment' => 'One casing migh belong to many CoItems, a CoItem can also be a service and don\'t have a casing'),
		'desc' => array('type' => 'text', 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'co_item_status_id' => array('type' => 'integer', 'null' => false, 'default' => '1', 'key' => 'index'),
		'co_item_type_id' => array('type' => 'integer', 'null' => true, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified_by' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 8),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null, 'key' => 'index'),
		'created_by' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 8),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'status' => array('column' => 'co_item_status_id', 'unique' => 0),
			'co_id' => array('column' => 'co_id', 'unique' => 0),
			'created' => array('column' => 'created', 'unique' => 0)
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
			'co_id' => 1,
			'line_number' => 1,
			'line_suffix' => 'Lorem ipsum dolor sit ame',
			'casing_id' => 1,
			'desc' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'co_item_status_id' => 1,
			'co_item_type_id' => 1,
			'modified' => '2012-10-11 09:40:28',
			'modified_by' => 1,
			'created' => '2012-10-11 09:40:28',
			'created_by' => 1
		),
		array(
			'id' => 2,
			'co_id' => 2,
			'line_number' => 2,
			'line_suffix' => 'Lorem ipsum dolor sit ame',
			'casing_id' => 2,
			'desc' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'co_item_status_id' => 2,
			'co_item_type_id' => 2,
			'modified' => '2012-10-11 09:40:28',
			'modified_by' => 2,
			'created' => '2012-10-11 09:40:28',
			'created_by' => 2
		),
		array(
			'id' => 3,
			'co_id' => 3,
			'line_number' => 3,
			'line_suffix' => 'Lorem ipsum dolor sit ame',
			'casing_id' => 3,
			'desc' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'co_item_status_id' => 3,
			'co_item_type_id' => 3,
			'modified' => '2012-10-11 09:40:28',
			'modified_by' => 3,
			'created' => '2012-10-11 09:40:28',
			'created_by' => 3
		),
		array(
			'id' => 4,
			'co_id' => 4,
			'line_number' => 4,
			'line_suffix' => 'Lorem ipsum dolor sit ame',
			'casing_id' => 4,
			'desc' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'co_item_status_id' => 4,
			'co_item_type_id' => 4,
			'modified' => '2012-10-11 09:40:28',
			'modified_by' => 4,
			'created' => '2012-10-11 09:40:28',
			'created_by' => 4
		),
		array(
			'id' => 5,
			'co_id' => 5,
			'line_number' => 5,
			'line_suffix' => 'Lorem ipsum dolor sit ame',
			'casing_id' => 5,
			'desc' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'co_item_status_id' => 5,
			'co_item_type_id' => 5,
			'modified' => '2012-10-11 09:40:28',
			'modified_by' => 5,
			'created' => '2012-10-11 09:40:28',
			'created_by' => 5
		),
		array(
			'id' => 6,
			'co_id' => 6,
			'line_number' => 6,
			'line_suffix' => 'Lorem ipsum dolor sit ame',
			'casing_id' => 6,
			'desc' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'co_item_status_id' => 6,
			'co_item_type_id' => 6,
			'modified' => '2012-10-11 09:40:28',
			'modified_by' => 6,
			'created' => '2012-10-11 09:40:28',
			'created_by' => 6
		),
		array(
			'id' => 7,
			'co_id' => 7,
			'line_number' => 7,
			'line_suffix' => 'Lorem ipsum dolor sit ame',
			'casing_id' => 7,
			'desc' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'co_item_status_id' => 7,
			'co_item_type_id' => 7,
			'modified' => '2012-10-11 09:40:28',
			'modified_by' => 7,
			'created' => '2012-10-11 09:40:28',
			'created_by' => 7
		),
		array(
			'id' => 8,
			'co_id' => 8,
			'line_number' => 8,
			'line_suffix' => 'Lorem ipsum dolor sit ame',
			'casing_id' => 8,
			'desc' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'co_item_status_id' => 8,
			'co_item_type_id' => 8,
			'modified' => '2012-10-11 09:40:28',
			'modified_by' => 8,
			'created' => '2012-10-11 09:40:28',
			'created_by' => 8
		),
		array(
			'id' => 9,
			'co_id' => 9,
			'line_number' => 9,
			'line_suffix' => 'Lorem ipsum dolor sit ame',
			'casing_id' => 9,
			'desc' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'co_item_status_id' => 9,
			'co_item_type_id' => 9,
			'modified' => '2012-10-11 09:40:28',
			'modified_by' => 9,
			'created' => '2012-10-11 09:40:28',
			'created_by' => 9
		),
		array(
			'id' => 10,
			'co_id' => 10,
			'line_number' => 10,
			'line_suffix' => 'Lorem ipsum dolor sit ame',
			'casing_id' => 10,
			'desc' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'co_item_status_id' => 10,
			'co_item_type_id' => 10,
			'modified' => '2012-10-11 09:40:28',
			'modified_by' => 10,
			'created' => '2012-10-11 09:40:28',
			'created_by' => 10
		),
	);

}
