<?php
/**
 * AdjustmentItemFixture
 *
 */
class AdjustmentItemFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'adjustment_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'co_item_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'ref_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'ref_table' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 50, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'unit_price' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => '9,2'),
		'quantity' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => '9,4'),
		'note' => array('type' => 'text', 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
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
			'adjustment_id' => 1,
			'co_item_id' => 1,
			'ref_id' => 1,
			'ref_table' => 'Lorem ipsum dolor sit amet',
			'unit_price' => 1,
			'quantity' => 1,
			'note' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.'
		),
		array(
			'id' => 2,
			'adjustment_id' => 2,
			'co_item_id' => 2,
			'ref_id' => 2,
			'ref_table' => 'Lorem ipsum dolor sit amet',
			'unit_price' => 2,
			'quantity' => 2,
			'note' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.'
		),
		array(
			'id' => 3,
			'adjustment_id' => 3,
			'co_item_id' => 3,
			'ref_id' => 3,
			'ref_table' => 'Lorem ipsum dolor sit amet',
			'unit_price' => 3,
			'quantity' => 3,
			'note' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.'
		),
		array(
			'id' => 4,
			'adjustment_id' => 4,
			'co_item_id' => 4,
			'ref_id' => 4,
			'ref_table' => 'Lorem ipsum dolor sit amet',
			'unit_price' => 4,
			'quantity' => 4,
			'note' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.'
		),
		array(
			'id' => 5,
			'adjustment_id' => 5,
			'co_item_id' => 5,
			'ref_id' => 5,
			'ref_table' => 'Lorem ipsum dolor sit amet',
			'unit_price' => 5,
			'quantity' => 5,
			'note' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.'
		),
		array(
			'id' => 6,
			'adjustment_id' => 6,
			'co_item_id' => 6,
			'ref_id' => 6,
			'ref_table' => 'Lorem ipsum dolor sit amet',
			'unit_price' => 6,
			'quantity' => 6,
			'note' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.'
		),
		array(
			'id' => 7,
			'adjustment_id' => 7,
			'co_item_id' => 7,
			'ref_id' => 7,
			'ref_table' => 'Lorem ipsum dolor sit amet',
			'unit_price' => 7,
			'quantity' => 7,
			'note' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.'
		),
		array(
			'id' => 8,
			'adjustment_id' => 8,
			'co_item_id' => 8,
			'ref_id' => 8,
			'ref_table' => 'Lorem ipsum dolor sit amet',
			'unit_price' => 8,
			'quantity' => 8,
			'note' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.'
		),
		array(
			'id' => 9,
			'adjustment_id' => 9,
			'co_item_id' => 9,
			'ref_id' => 9,
			'ref_table' => 'Lorem ipsum dolor sit amet',
			'unit_price' => 9,
			'quantity' => 9,
			'note' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.'
		),
		array(
			'id' => 10,
			'adjustment_id' => 10,
			'co_item_id' => 10,
			'ref_id' => 10,
			'ref_table' => 'Lorem ipsum dolor sit amet',
			'unit_price' => 10,
			'quantity' => 10,
			'note' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.'
		),
	);

}
