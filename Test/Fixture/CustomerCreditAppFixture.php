<?php
/**
 * CustomerCreditAppFixture
 *
 */
class CustomerCreditAppFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'customer_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'pdf_file_id' => array('type' => 'integer', 'null' => true, 'default' => null),
		'note' => array('type' => 'text', 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'created_by' => array('type' => 'integer', 'null' => false, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'deleted' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'deleted_by' => array('type' => 'integer', 'null' => false, 'default' => null),
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
			'customer_id' => 1,
			'pdf_file_id' => 1,
			'note' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'created' => '2012-08-02 17:20:25',
			'created_by' => 1,
			'modified' => '2012-08-02 17:20:25',
			'deleted' => '2012-08-02 17:20:25',
			'deleted_by' => 1
		),
		array(
			'id' => 2,
			'customer_id' => 2,
			'pdf_file_id' => 2,
			'note' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'created' => '2012-08-02 17:20:25',
			'created_by' => 2,
			'modified' => '2012-08-02 17:20:25',
			'deleted' => '2012-08-02 17:20:25',
			'deleted_by' => 2
		),
		array(
			'id' => 3,
			'customer_id' => 3,
			'pdf_file_id' => 3,
			'note' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'created' => '2012-08-02 17:20:25',
			'created_by' => 3,
			'modified' => '2012-08-02 17:20:25',
			'deleted' => '2012-08-02 17:20:25',
			'deleted_by' => 3
		),
		array(
			'id' => 4,
			'customer_id' => 4,
			'pdf_file_id' => 4,
			'note' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'created' => '2012-08-02 17:20:25',
			'created_by' => 4,
			'modified' => '2012-08-02 17:20:25',
			'deleted' => '2012-08-02 17:20:25',
			'deleted_by' => 4
		),
		array(
			'id' => 5,
			'customer_id' => 5,
			'pdf_file_id' => 5,
			'note' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'created' => '2012-08-02 17:20:25',
			'created_by' => 5,
			'modified' => '2012-08-02 17:20:25',
			'deleted' => '2012-08-02 17:20:25',
			'deleted_by' => 5
		),
		array(
			'id' => 6,
			'customer_id' => 6,
			'pdf_file_id' => 6,
			'note' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'created' => '2012-08-02 17:20:25',
			'created_by' => 6,
			'modified' => '2012-08-02 17:20:25',
			'deleted' => '2012-08-02 17:20:25',
			'deleted_by' => 6
		),
		array(
			'id' => 7,
			'customer_id' => 7,
			'pdf_file_id' => 7,
			'note' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'created' => '2012-08-02 17:20:25',
			'created_by' => 7,
			'modified' => '2012-08-02 17:20:25',
			'deleted' => '2012-08-02 17:20:25',
			'deleted_by' => 7
		),
		array(
			'id' => 8,
			'customer_id' => 8,
			'pdf_file_id' => 8,
			'note' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'created' => '2012-08-02 17:20:25',
			'created_by' => 8,
			'modified' => '2012-08-02 17:20:25',
			'deleted' => '2012-08-02 17:20:25',
			'deleted_by' => 8
		),
		array(
			'id' => 9,
			'customer_id' => 9,
			'pdf_file_id' => 9,
			'note' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'created' => '2012-08-02 17:20:25',
			'created_by' => 9,
			'modified' => '2012-08-02 17:20:25',
			'deleted' => '2012-08-02 17:20:25',
			'deleted_by' => 9
		),
		array(
			'id' => 10,
			'customer_id' => 10,
			'pdf_file_id' => 10,
			'note' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'created' => '2012-08-02 17:20:25',
			'created_by' => 10,
			'modified' => '2012-08-02 17:20:25',
			'deleted' => '2012-08-02 17:20:25',
			'deleted_by' => 10
		),
	);

}
