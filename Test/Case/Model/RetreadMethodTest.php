<?php
App::uses('RetreadMethod', 'Model');

/**
 * RetreadMethod Test Case
 *
 */
class RetreadMethodTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.retread_method',
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->RetreadMethod = ClassRegistry::init('RetreadMethod');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->RetreadMethod);

		parent::tearDown();
	}

	public function testCreate() {

		$newRetreadMethod = 	array('RetreadMethod' =>	array(
			'name' => 'Lorem ipsum dolor sit amet',
		));
		$this->RetreadMethod->create();
		$result=$this->RetreadMethod->save($newRetreadMethod);
		$this->assertEqual(isset($result['RetreadMethod']['id']), true, "New RetreadMethod is created.");
	}


}
