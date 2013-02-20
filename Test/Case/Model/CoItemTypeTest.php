<?php
App::uses('CoItemType', 'Model');

/**
 * CoItemType Test Case
 *
 */
class CoItemTypeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.co_item_type'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->CoItemType = ClassRegistry::init('CoItemType');

	}
/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->CoItemType);

		parent::tearDown();
	}

	public function testCreate() {

		$newCoItemType = array('CoItemType' => array(
			'name' => 'New CoItemType Name',
			'co_item_type_category_id' => '1',
		));
		$this->CoItemType->create();
		$result=$this->CoItemType->save($newCoItemType);
		$this->assertEqual(isset($result['CoItemType']['id']), true, "New CoItemType is created.");
	}


}
