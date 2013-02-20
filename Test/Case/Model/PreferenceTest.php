<?php
App::uses('Preference', 'Model');

/**
 * Preference Test Case
 *
 */
class PreferenceTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.preference'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Preference = ClassRegistry::init('Preference');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Preference);

		parent::tearDown();
	}

	public function testCreate() {

		$newPreference = 	array('Preference' =>	array(
			'type' => 'customer',
			'key_id' => 1,
			'name' => 'repairs.maxLife',
			'value' => '32',
			'type' => 'int',
		));
		$this->Preference->create();
		$result=$this->Preference->save($newPreference);
		$this->assertEqual(isset($result['Preference']['id']), true, "New Preference is created.");

	}


}
