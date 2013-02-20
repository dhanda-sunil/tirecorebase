<?php
App::uses('LocationType', 'Model');

/**
 * LocationType Test Case
 *
 */
class LocationTypeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.location_type',
		'app.location',
		'app.company'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->LocationType = ClassRegistry::init('LocationType');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->LocationType);

		parent::tearDown();
	}

	public function testCreate() {

		$newLocationType = 	array('LocationType' =>	array(
			'name' => 'Lorem ipsum dolor sit amet',
		));
		$this->LocationType->create();
		$result=$this->LocationType->save($newLocationType);
		$this->assertEqual(isset($result['LocationType']['id']), true, "New LocationType is created.");
	}


}
