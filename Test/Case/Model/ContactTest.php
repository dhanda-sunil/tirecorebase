<?php
App::uses('Contact', 'Model');

/**
 * Contact Test Case
 *
 */
class ContactTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.contact',
		'app.contact_method'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Contact = ClassRegistry::init('Contact');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Contact);

		parent::tearDown();
	}

	public function testCreate() {

		$newContact = 	array('Contact' =>	array(
			'ref_table' => 'customers',
			'ref_id' => 1,
			'first_name' => 'John Q.',
			'last_name' => 'Doe',
			'label' => 'The label? What\'s this?',
			'email' => 'john.q.doe.the.third@testing.com',
			'primary' => 0,
			'active' => 1,
		));
		$this->Contact->create();
		$result=$this->Contact->save($newContact);
		$this->assertEqual(isset($result['Contact']['id']), true, "New Contact is created.");
	}


}
