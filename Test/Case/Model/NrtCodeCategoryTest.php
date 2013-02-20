<?php
App::uses('NrtCodeCategory', 'Model');

/**
 * NrtCodeCategory Test Case
 *
 */
class NrtCodeCategoryTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.nrt_code_category',
		'app.nrt_code'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->NrtCodeCategory = ClassRegistry::init('NrtCodeCategory');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->NrtCodeCategory);

		parent::tearDown();
	}

	public function testCreate() {

		$newNrtCodeCategory = 	array('NrtCodeCategory' =>	array(
			'name' => 'Lorem ipsum dolor sit amet',
		));
		$this->NrtCodeCategory->create();
		$result=$this->NrtCodeCategory->save($newNrtCodeCategory);
		$this->assertEqual(isset($result['NrtCodeCategory']['id']), true, "New NrtCodeCategory is created.");
	}

}
