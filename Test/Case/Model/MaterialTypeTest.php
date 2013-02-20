<?php
App::uses('MaterialType', 'Model');

/**
 * MaterialType Test Case
 *
 */
class MaterialTypeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.material_type'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->MaterialType = ClassRegistry::init('MaterialType');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->MaterialType);

		parent::tearDown();
	}

	public function testCreate() {

		$newMaterialType = 	array('MaterialType' =>	array(
			'name' => 'Lorem ipsum dolor sit amet',
		));
		$this->MaterialType->create();
		$result=$this->MaterialType->save($newMaterialType);
		$this->assertEqual(isset($result['MaterialType']['id']), true, "New MaterialType is created.");
	}


}
