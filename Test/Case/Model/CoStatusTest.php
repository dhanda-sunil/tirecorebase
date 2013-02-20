<?php
App::uses('CoStatus', 'Model');

/**
 * CoStatus Test Case
 *
 */
class CoStatusTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.co_status',
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->CoStatus = ClassRegistry::init('CoStatus');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->CoStatus);

		parent::tearDown();
	}


	public function testCreate() {

		$newCoStatus = array('CoStatus' => array(
			'name' => 'New CoStatus Name',
		));
		$this->CoStatus->create();
		$result=$this->CoStatus->save($newCoStatus);
		$this->assertEqual(isset($result['CoStatus']['id']), true, "New CoStatus is created.");
	}

}
