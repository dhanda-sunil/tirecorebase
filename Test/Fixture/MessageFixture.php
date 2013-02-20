<?php
/**
 * MessageFixture
 *
 */
class MessageFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'index'),
		'subject' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'body' => array('type' => 'text', 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'type' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 1),
		'created_user_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'index'),
		'due' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'completed' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'read' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'user_id' => array('column' => 'user_id', 'unique' => 0),
			'created_user_id' => array('column' => 'created_user_id', 'unique' => 0)
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
			'subject' => 'Lorem ipsum dolor sit amet',
			'body' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'type' => 1,
			'created_user_id' => 1,
			'due' => '2012-08-02 17:22:49',
			'completed' => '2012-08-02 17:22:49',
			'read' => '2012-08-02 17:22:49',
			'created' => '2012-08-02 17:22:49'
		),
		array(
			'id' => 2,
			'user_id' => 2,
			'subject' => 'Lorem ipsum dolor sit amet',
			'body' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'type' => 2,
			'created_user_id' => 2,
			'due' => '2012-08-02 17:22:49',
			'completed' => '2012-08-02 17:22:49',
			'read' => '2012-08-02 17:22:49',
			'created' => '2012-08-02 17:22:49'
		),
		array(
			'id' => 3,
			'user_id' => 3,
			'subject' => 'Lorem ipsum dolor sit amet',
			'body' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'type' => 3,
			'created_user_id' => 3,
			'due' => '2012-08-02 17:22:49',
			'completed' => '2012-08-02 17:22:49',
			'read' => '2012-08-02 17:22:49',
			'created' => '2012-08-02 17:22:49'
		),
		array(
			'id' => 4,
			'user_id' => 4,
			'subject' => 'Lorem ipsum dolor sit amet',
			'body' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'type' => 4,
			'created_user_id' => 4,
			'due' => '2012-08-02 17:22:49',
			'completed' => '2012-08-02 17:22:49',
			'read' => '2012-08-02 17:22:49',
			'created' => '2012-08-02 17:22:49'
		),
		array(
			'id' => 5,
			'user_id' => 5,
			'subject' => 'Lorem ipsum dolor sit amet',
			'body' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'type' => 5,
			'created_user_id' => 5,
			'due' => '2012-08-02 17:22:49',
			'completed' => '2012-08-02 17:22:49',
			'read' => '2012-08-02 17:22:49',
			'created' => '2012-08-02 17:22:49'
		),
		array(
			'id' => 6,
			'user_id' => 6,
			'subject' => 'Lorem ipsum dolor sit amet',
			'body' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'type' => 6,
			'created_user_id' => 6,
			'due' => '2012-08-02 17:22:49',
			'completed' => '2012-08-02 17:22:49',
			'read' => '2012-08-02 17:22:49',
			'created' => '2012-08-02 17:22:49'
		),
		array(
			'id' => 7,
			'user_id' => 7,
			'subject' => 'Lorem ipsum dolor sit amet',
			'body' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'type' => 7,
			'created_user_id' => 7,
			'due' => '2012-08-02 17:22:49',
			'completed' => '2012-08-02 17:22:49',
			'read' => '2012-08-02 17:22:49',
			'created' => '2012-08-02 17:22:49'
		),
		array(
			'id' => 8,
			'user_id' => 8,
			'subject' => 'Lorem ipsum dolor sit amet',
			'body' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'type' => 8,
			'created_user_id' => 8,
			'due' => '2012-08-02 17:22:49',
			'completed' => '2012-08-02 17:22:49',
			'read' => '2012-08-02 17:22:49',
			'created' => '2012-08-02 17:22:49'
		),
		array(
			'id' => 9,
			'user_id' => 9,
			'subject' => 'Lorem ipsum dolor sit amet',
			'body' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'type' => 9,
			'created_user_id' => 9,
			'due' => '2012-08-02 17:22:49',
			'completed' => '2012-08-02 17:22:49',
			'read' => '2012-08-02 17:22:49',
			'created' => '2012-08-02 17:22:49'
		),
		array(
			'id' => 10,
			'user_id' => 10,
			'subject' => 'Lorem ipsum dolor sit amet',
			'body' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'type' => 10,
			'created_user_id' => 10,
			'due' => '2012-08-02 17:22:49',
			'completed' => '2012-08-02 17:22:49',
			'read' => '2012-08-02 17:22:49',
			'created' => '2012-08-02 17:22:49'
		),
	);

}
