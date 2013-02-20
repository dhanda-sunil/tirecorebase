<?php
App::uses('Location', 'Model');

/**
 * Location Test Case
 *
 */
class LocationTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.location'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Location = ClassRegistry::init('Location');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Location);

		parent::tearDown();
	}
	public function testCreate() {

		$newLocation = 	array('Location' =>	array(
			'name' => 'Lorem ipsum dolor sit amet',
			'company_id' => 1,
			'name' => 'Lorem ipsum dolor sit amet',
			'description' => 'Lorem ipsum dolor sit amet',
			'location_group_id' => 1,
			'location_type_id' => 1,
		));
		$this->Location->create();
		$result=$this->Location->save($newLocation);
		$this->assertEqual(isset($result['Location']['id']), true, "New Location is created.");
	}

}
