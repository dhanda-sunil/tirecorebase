<?php
App::uses('AccountType', 'Model');

/**
 * AccountType Test Case
 *
 */
class AccountTypeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.account_type',
		'app.account',
		'app.address',
		'app.customer'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->AccountType = ClassRegistry::init('AccountType');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->AccountType);

		parent::tearDown();
	}

	/*
	 * Test creation
	 */
	public function testCreate() {
		$newAT=array('AccountType' => array(
			'name'=> 'This is the name of a new account type.'
		));
		$this->AccountType->create();
		$result=$this->AccountType->save($newAT);
		$this->assertEqual(isset($result['AccountType']['id']),true, "New Account Type was created");
	}
}
