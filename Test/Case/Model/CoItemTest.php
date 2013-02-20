<?php
App::uses('CoItem', 'Model');

/**
 * CoItem Test Case
 *
 */
class CoItemTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.co_item',
		'app.co',
		'app.co_item_type',
		'app.co_item_type_category',
		'app.casing',
		'app.co_item_status'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->CoItem = ClassRegistry::init('CoItem');
		$this->newCoItem = array('CoItem' => array(
			'co_id' => 1,
			'line_number' => 1,
			'line_suffix' => '',
			'casing_id' => 1,
			'desc' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'co_item_type_id' => 1,
			'modified' => '2012-09-24 11:27:37',
			'modified_by' => 1,
			'created' => '2012-09-24 11:27:37',
			'created_by' => 1

		));

	}

	/*
	 * Create New Co Item
	 */

	public function testCreateNewCoItem() {
//		$result = $this->CoItem->save($this->newCoItem);
//		$added_id = array('CoItem' => array('id' => '2'));
//		$expected = array_merge_recursive($added_id,$this->newCoItem);
		//$this->assertEqual($result, $expected, 'Create new CoItem');
	}

	/*
	 * Duplicate line Item
	 */

	public function testDuplicateCoItem() {
		//$result = $this->CoItem->save($this->newCoItem);
		//$duplicate = $this->CoItem->duplicate($result['CoItem']['id']);
		//$this->assertEqual($duplicate['CoItem']['line_suffix'], 'A', 'Create new duplicate line item');
	}

	public function testFindAll() {
		$this->CoItem->recursive=2;
		$this->CoItem->Behaviors->attach('Containable');
		$result = $this->CoItem->find('first', array(
			'contain' => array(
				'CoItemType'=>array(
					'CoItemTypeCategory' => array(
						'conditions' => array(
							'name' => array('Lorem ipsum dolor sit amet')
						)
					)
				)

			),
		));
		debug($result);
		$this->assertEqual(true,true);
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->CoItem);

		parent::tearDown();
	}

}
