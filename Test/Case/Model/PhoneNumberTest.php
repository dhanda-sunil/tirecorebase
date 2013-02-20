<?php
App::uses('PhoneNumber', 'Model');

/**
 * PhoneNumber Test Case
 *
 */
class PhoneNumberTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.phone_number'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->PhoneNumber = ClassRegistry::init('PhoneNumber');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->PhoneNumber);

		parent::tearDown();
	}

	public function testCreate() {

		$newPhoneNumber = 	array('PhoneNumber' =>	array(
			'ref_id' => 1,
			'ref_table' => 'contacts',
			'value' => '+33 43 384 128732 (Johnny)',
			'type' => 'Mobile',
			'primary' => 1,
		));
		$this->PhoneNumber->create();
		$result=$this->PhoneNumber->save($newPhoneNumber);
		$this->assertEqual(isset($result['PhoneNumber']['id']), true, "New PhoneNumber is created.");
	}


}
