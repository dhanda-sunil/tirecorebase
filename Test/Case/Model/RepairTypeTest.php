<?php
App::uses('RepairType', 'Model');

/**
 * RepairType Test Case
 *
 */
class RepairTypeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.repair_type'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->RepairType = ClassRegistry::init('RepairType');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->RepairType);

		parent::tearDown();
	}

	public function testCreate() {

		$newRepairType = 	array('RepairType' =>	array(
			'name' => 'Lorem ipsum dolor sit amet',
		));
		$this->RepairType->create();
		$result=$this->RepairType->save($newRepairType);
		$this->assertEqual(isset($result['RepairType']['id']), true, "New RepairType is created.");
	}

}
