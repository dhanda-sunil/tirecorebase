<?php
App::uses('CoItemTypeCategory', 'Model');

/**
 * CoItemTypeCategory Test Case
 *
 */
class CoItemTypeCategoryTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.co_item_type_category',
		'app.co_item_type'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->CoItemTypeCategory = ClassRegistry::init('CoItemTypeCategory');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->CoItemTypeCategory);

		parent::tearDown();
	}

	public function testCreate() {

		$newCoItemTypeCategory = array('CoItemTypeCategory' => array(
			'name' => 'New CoItemTypeCategory Name',
		));
		$this->CoItemTypeCategory->create();
		$result=$this->CoItemTypeCategory->save($newCoItemTypeCategory);
		$this->assertEqual(isset($result['CoItemTypeCategory']['id']), true, "New CoItemTypeCategory is created.");
	}


}
