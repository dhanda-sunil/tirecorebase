<?php
App::uses('Account', 'Model');

/**
 * Account Test Case
 *
 */
class AccountTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.account'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Account = ClassRegistry::init('Account');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Account);

		parent::tearDown();
	}

	public function testNewAccount() {

		$newAccount = array('Account' => array(
			'customer_id' => '1',
			'account_type_id' => '1',
			'number' => 'XF384n*4nfls83n',
			'desc' => 'A test account. This has a very long description. '
		));
		$this->Account->create();
		$result=$this->Account->save($newAccount);
		$this->assertEqual(isset($result['Account']['id']), true, "New account is created along with new account ID");
	}

}
