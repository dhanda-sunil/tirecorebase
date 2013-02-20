<?php
/**
 * CustomerRefundFixture
 *
 */
class CustomerRefundFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'customer_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'date' => array('type' => 'date', 'null' => false, 'default' => null),
		'apply_to_account' => array('type' => 'boolean', 'null' => false, 'default' => null),
		'payment_total' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => '8,2'),
		'comment' => array('type' => 'text', 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'created_by' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 5),
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
			'date' => '2012-08-02',
			'apply_to_account' => 1,
			'payment_total' => 1,
			'comment' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'created' => '2012-08-02 17:21:03',
			'created_by' => 1
		),
		array(
			'id' => 2,
			'customer_id' => 2,
			'date' => '2012-08-02',
			'apply_to_account' => 1,
			'payment_total' => 2,
			'comment' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'created' => '2012-08-02 17:21:03',
			'created_by' => 2
		),
		array(
			'id' => 3,
			'customer_id' => 3,
			'date' => '2012-08-02',
			'apply_to_account' => 1,
			'payment_total' => 3,
			'comment' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'created' => '2012-08-02 17:21:03',
			'created_by' => 3
		),
		array(
			'id' => 4,
			'customer_id' => 4,
			'date' => '2012-08-02',
			'apply_to_account' => 1,
			'payment_total' => 4,
			'comment' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'created' => '2012-08-02 17:21:03',
			'created_by' => 4
		),
		array(
			'id' => 5,
			'customer_id' => 5,
			'date' => '2012-08-02',
			'apply_to_account' => 1,
			'payment_total' => 5,
			'comment' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'created' => '2012-08-02 17:21:03',
			'created_by' => 5
		),
		array(
			'id' => 6,
			'customer_id' => 6,
			'date' => '2012-08-02',
			'apply_to_account' => 1,
			'payment_total' => 6,
			'comment' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'created' => '2012-08-02 17:21:03',
			'created_by' => 6
		),
		array(
			'id' => 7,
			'customer_id' => 7,
			'date' => '2012-08-02',
			'apply_to_account' => 1,
			'payment_total' => 7,
			'comment' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'created' => '2012-08-02 17:21:03',
			'created_by' => 7
		),
		array(
			'id' => 8,
			'customer_id' => 8,
			'date' => '2012-08-02',
			'apply_to_account' => 1,
			'payment_total' => 8,
			'comment' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'created' => '2012-08-02 17:21:03',
			'created_by' => 8
		),
		array(
			'id' => 9,
			'customer_id' => 9,
			'date' => '2012-08-02',
			'apply_to_account' => 1,
			'payment_total' => 9,
			'comment' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'created' => '2012-08-02 17:21:03',
			'created_by' => 9
		),
		array(
			'id' => 10,
			'customer_id' => 10,
			'date' => '2012-08-02',
			'apply_to_account' => 1,
			'payment_total' => 10,
			'comment' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'created' => '2012-08-02 17:21:03',
			'created_by' => 10
		),
	);

}
