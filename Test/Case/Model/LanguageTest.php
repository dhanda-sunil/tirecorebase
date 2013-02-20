<?php
App::uses('Language', 'Model');

/**
 * Language Test Case
 *
 */
class LanguageTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.language',
		'app.user',
		'app.checkpoint',
		'app.company',
		'app.location',
		'app.location_type'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Language = ClassRegistry::init('Language');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Language);

		parent::tearDown();
	}

	public function testCreate() {

		$newLanguage = 	array('Language' =>	array(
			'name' => 'Lorem ipsum dolor sit amet',
			'code' => 'lid',
		));
		$this->Language->create();
		$result=$this->Language->save($newLanguage);
		$this->assertEqual(isset($result['Language']['id']), true, "New Language is created.");
	}


}
