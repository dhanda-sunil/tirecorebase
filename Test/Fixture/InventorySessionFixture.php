<?php
/**
 * InventorySessionFixture
 *
 */
class InventorySessionFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'location_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 2),
		'json_data' => array('type' => 'text', 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'scan_count' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => '10,3'),
		'product_count' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => '10,3'),
		'executed' => array('type' => 'boolean', 'null' => false, 'default' => '0'),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'created_by' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 5, 'key' => 'index'),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified_by' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 5),
		'deleted' => array('type' => 'datetime', 'null' => true, 'default' => null, 'key' => 'index'),
		'deleted_by' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 5),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'created_by' => array('column' => 'created_by', 'unique' => 0),
			'deleted' => array('column' => 'deleted', 'unique' => 0)
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
			'location_id' => 1,
			'json_data' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'scan_count' => 1,
			'product_count' => 1,
			'executed' => 1,
			'created' => '2012-08-02 17:21:42',
			'created_by' => 1,
			'modified' => '2012-08-02 17:21:42',
			'modified_by' => 1,
			'deleted' => '2012-08-02 17:21:42',
			'deleted_by' => 1
		),
		array(
			'id' => 2,
			'location_id' => 2,
			'json_data' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'scan_count' => 2,
			'product_count' => 2,
			'executed' => 1,
			'created' => '2012-08-02 17:21:42',
			'created_by' => 2,
			'modified' => '2012-08-02 17:21:42',
			'modified_by' => 2,
			'deleted' => '2012-08-02 17:21:42',
			'deleted_by' => 2
		),
		array(
			'id' => 3,
			'location_id' => 3,
			'json_data' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'scan_count' => 3,
			'product_count' => 3,
			'executed' => 1,
			'created' => '2012-08-02 17:21:42',
			'created_by' => 3,
			'modified' => '2012-08-02 17:21:42',
			'modified_by' => 3,
			'deleted' => '2012-08-02 17:21:42',
			'deleted_by' => 3
		),
		array(
			'id' => 4,
			'location_id' => 4,
			'json_data' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'scan_count' => 4,
			'product_count' => 4,
			'executed' => 1,
			'created' => '2012-08-02 17:21:42',
			'created_by' => 4,
			'modified' => '2012-08-02 17:21:42',
			'modified_by' => 4,
			'deleted' => '2012-08-02 17:21:42',
			'deleted_by' => 4
		),
		array(
			'id' => 5,
			'location_id' => 5,
			'json_data' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'scan_count' => 5,
			'product_count' => 5,
			'executed' => 1,
			'created' => '2012-08-02 17:21:42',
			'created_by' => 5,
			'modified' => '2012-08-02 17:21:42',
			'modified_by' => 5,
			'deleted' => '2012-08-02 17:21:42',
			'deleted_by' => 5
		),
		array(
			'id' => 6,
			'location_id' => 6,
			'json_data' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'scan_count' => 6,
			'product_count' => 6,
			'executed' => 1,
			'created' => '2012-08-02 17:21:42',
			'created_by' => 6,
			'modified' => '2012-08-02 17:21:42',
			'modified_by' => 6,
			'deleted' => '2012-08-02 17:21:42',
			'deleted_by' => 6
		),
		array(
			'id' => 7,
			'location_id' => 7,
			'json_data' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'scan_count' => 7,
			'product_count' => 7,
			'executed' => 1,
			'created' => '2012-08-02 17:21:42',
			'created_by' => 7,
			'modified' => '2012-08-02 17:21:42',
			'modified_by' => 7,
			'deleted' => '2012-08-02 17:21:42',
			'deleted_by' => 7
		),
		array(
			'id' => 8,
			'location_id' => 8,
			'json_data' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'scan_count' => 8,
			'product_count' => 8,
			'executed' => 1,
			'created' => '2012-08-02 17:21:42',
			'created_by' => 8,
			'modified' => '2012-08-02 17:21:42',
			'modified_by' => 8,
			'deleted' => '2012-08-02 17:21:42',
			'deleted_by' => 8
		),
		array(
			'id' => 9,
			'location_id' => 9,
			'json_data' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'scan_count' => 9,
			'product_count' => 9,
			'executed' => 1,
			'created' => '2012-08-02 17:21:42',
			'created_by' => 9,
			'modified' => '2012-08-02 17:21:42',
			'modified_by' => 9,
			'deleted' => '2012-08-02 17:21:42',
			'deleted_by' => 9
		),
		array(
			'id' => 10,
			'location_id' => 10,
			'json_data' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'scan_count' => 10,
			'product_count' => 10,
			'executed' => 1,
			'created' => '2012-08-02 17:21:42',
			'created_by' => 10,
			'modified' => '2012-08-02 17:21:42',
			'modified_by' => 10,
			'deleted' => '2012-08-02 17:21:42',
			'deleted_by' => 10
		),
	);

}
