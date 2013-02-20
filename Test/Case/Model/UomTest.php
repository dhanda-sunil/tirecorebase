<?php
App::uses('Uom', 'Model');

/**
 * Uom Test Case
 *
 */
class UomTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.uom',
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Uom = ClassRegistry::init('Uom');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Uom);

		parent::tearDown();
	}

	public function testCreate() {

		$newUom = 	array('Uom' =>	array(
			'name' => 'Lorem ipsum dolor sit amet',
			'symbol' => 'Lorem ipsum dolor sit amet',
			'suffix_or_prefix' => 's',
		));
		$this->Uom->create();
		$result=$this->Uom->save($newUom);
		$this->assertEqual(isset($result['Uom']['id']), true, "New Uom is created.");
	}


}
