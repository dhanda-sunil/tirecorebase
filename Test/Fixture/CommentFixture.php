<?php
/**
 * CommentFixture
 *
 */
class CommentFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'ref_id' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 16, 'key' => 'index', 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'ref_table' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 64, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 5),
		'display' => array('type' => 'boolean', 'null' => false, 'default' => '0'),
		'priority' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 2),
		'value' => array('type' => 'text', 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'valid_start' => array('type' => 'date', 'null' => true, 'default' => null),
		'valid_end' => array('type' => 'date', 'null' => true, 'default' => null),
		'active' => array('type' => 'boolean', 'null' => false, 'default' => '1'),
		'can_set_active' => array('type' => 'boolean', 'null' => false, 'default' => '0'),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'created_by' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 5),
		'deleted' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'deleted_by' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 5),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'ref_id' => array('column' => array('ref_id', 'ref_table'), 'unique' => 0)
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
			'ref_id' => 'Lorem ipsum do',
			'ref_table' => 'Lorem ipsum dolor sit amet',
			'user_id' => 1,
			'display' => 1,
			'priority' => 1,
			'value' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'valid_start' => '2012-08-02',
			'valid_end' => '2012-08-02',
			'active' => 1,
			'can_set_active' => 1,
			'created' => '2012-08-02 17:19:53',
			'created_by' => 1,
			'deleted' => '2012-08-02 17:19:53',
			'deleted_by' => 1
		),
		array(
			'id' => 2,
			'ref_id' => 'Lorem ipsum do',
			'ref_table' => 'Lorem ipsum dolor sit amet',
			'user_id' => 2,
			'display' => 1,
			'priority' => 2,
			'value' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'valid_start' => '2012-08-02',
			'valid_end' => '2012-08-02',
			'active' => 1,
			'can_set_active' => 1,
			'created' => '2012-08-02 17:19:53',
			'created_by' => 2,
			'deleted' => '2012-08-02 17:19:53',
			'deleted_by' => 2
		),
		array(
			'id' => 3,
			'ref_id' => 'Lorem ipsum do',
			'ref_table' => 'Lorem ipsum dolor sit amet',
			'user_id' => 3,
			'display' => 1,
			'priority' => 3,
			'value' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'valid_start' => '2012-08-02',
			'valid_end' => '2012-08-02',
			'active' => 1,
			'can_set_active' => 1,
			'created' => '2012-08-02 17:19:53',
			'created_by' => 3,
			'deleted' => '2012-08-02 17:19:53',
			'deleted_by' => 3
		),
		array(
			'id' => 4,
			'ref_id' => 'Lorem ipsum do',
			'ref_table' => 'Lorem ipsum dolor sit amet',
			'user_id' => 4,
			'display' => 1,
			'priority' => 4,
			'value' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'valid_start' => '2012-08-02',
			'valid_end' => '2012-08-02',
			'active' => 1,
			'can_set_active' => 1,
			'created' => '2012-08-02 17:19:53',
			'created_by' => 4,
			'deleted' => '2012-08-02 17:19:53',
			'deleted_by' => 4
		),
		array(
			'id' => 5,
			'ref_id' => 'Lorem ipsum do',
			'ref_table' => 'Lorem ipsum dolor sit amet',
			'user_id' => 5,
			'display' => 1,
			'priority' => 5,
			'value' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'valid_start' => '2012-08-02',
			'valid_end' => '2012-08-02',
			'active' => 1,
			'can_set_active' => 1,
			'created' => '2012-08-02 17:19:53',
			'created_by' => 5,
			'deleted' => '2012-08-02 17:19:53',
			'deleted_by' => 5
		),
		array(
			'id' => 6,
			'ref_id' => 'Lorem ipsum do',
			'ref_table' => 'Lorem ipsum dolor sit amet',
			'user_id' => 6,
			'display' => 1,
			'priority' => 6,
			'value' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'valid_start' => '2012-08-02',
			'valid_end' => '2012-08-02',
			'active' => 1,
			'can_set_active' => 1,
			'created' => '2012-08-02 17:19:53',
			'created_by' => 6,
			'deleted' => '2012-08-02 17:19:53',
			'deleted_by' => 6
		),
		array(
			'id' => 7,
			'ref_id' => 'Lorem ipsum do',
			'ref_table' => 'Lorem ipsum dolor sit amet',
			'user_id' => 7,
			'display' => 1,
			'priority' => 7,
			'value' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'valid_start' => '2012-08-02',
			'valid_end' => '2012-08-02',
			'active' => 1,
			'can_set_active' => 1,
			'created' => '2012-08-02 17:19:53',
			'created_by' => 7,
			'deleted' => '2012-08-02 17:19:53',
			'deleted_by' => 7
		),
		array(
			'id' => 8,
			'ref_id' => 'Lorem ipsum do',
			'ref_table' => 'Lorem ipsum dolor sit amet',
			'user_id' => 8,
			'display' => 1,
			'priority' => 8,
			'value' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'valid_start' => '2012-08-02',
			'valid_end' => '2012-08-02',
			'active' => 1,
			'can_set_active' => 1,
			'created' => '2012-08-02 17:19:53',
			'created_by' => 8,
			'deleted' => '2012-08-02 17:19:53',
			'deleted_by' => 8
		),
		array(
			'id' => 9,
			'ref_id' => 'Lorem ipsum do',
			'ref_table' => 'Lorem ipsum dolor sit amet',
			'user_id' => 9,
			'display' => 1,
			'priority' => 9,
			'value' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'valid_start' => '2012-08-02',
			'valid_end' => '2012-08-02',
			'active' => 1,
			'can_set_active' => 1,
			'created' => '2012-08-02 17:19:53',
			'created_by' => 9,
			'deleted' => '2012-08-02 17:19:53',
			'deleted_by' => 9
		),
		array(
			'id' => 10,
			'ref_id' => 'Lorem ipsum do',
			'ref_table' => 'Lorem ipsum dolor sit amet',
			'user_id' => 10,
			'display' => 1,
			'priority' => 10,
			'value' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'valid_start' => '2012-08-02',
			'valid_end' => '2012-08-02',
			'active' => 1,
			'can_set_active' => 1,
			'created' => '2012-08-02 17:19:53',
			'created_by' => 10,
			'deleted' => '2012-08-02 17:19:53',
			'deleted_by' => 10
		),
	);

}
