<?php
App::uses('AdjustmentType', 'Model');

/**
 * AdjustmentType Test Case
 *
 */
class AdjustmentTypeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.adjustment_type'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->AdjustmentType = ClassRegistry::init('AdjustmentType');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->AdjustmentType);

		parent::tearDown();
	}

	public function testCreation() {
		$newAdjustment = array('AdjustmentType' => array(
			'name' => 'Here is a long name for an adjustment type.'
		));

		$this->AdjustmentType->create();
		$result = $this->AdjustmentType->save($newAdjustment);
		$this->assertEqual(isset($result['AdjustmentType']['id']), true, "AdjustmentType was created");
	}

}
