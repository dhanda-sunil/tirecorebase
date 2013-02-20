<?php
App::uses('NrtCode', 'Model');

/**
 * NrtCode Test Case
 *
 */
class NrtCodeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.nrt_code',
		'app.nrt_code_category'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->NrtCode = ClassRegistry::init('NrtCode');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->NrtCode);

		parent::tearDown();
	}

	public function testCreate() {

		$newNrtCode = 	array('NrtCode' =>	array(
			'name' => 'Lorem ipsum dolor sit amet',
			'nrt_code_category_id' => '1',
			'abbr' => 'nrtr',
			'ordering' => 200,
			'description' => 'Longer description about the code',
		));
		$this->NrtCode->create();
		$result=$this->NrtCode->save($newNrtCode);
		$this->assertEqual(isset($result['NrtCode']['id']), true, "New NrtCode is created.");
	}


}
