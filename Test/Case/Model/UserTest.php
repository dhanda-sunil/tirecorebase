<?php
App::uses('User', 'Model');

/**
 * User Test Case
 *
 */
class UserTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.user'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->User = ClassRegistry::init('User');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->User);

		parent::tearDown();
	}

	public function testCreate() {

		$newUser = 	array('User' =>	array(
			'shop_checkpoint_pref_id' => 1,
			'username' => 'Lorem ipsum dolor sit amet',
			'password' => 'Lorem ipsum dolor sit amet',
			'language_id' => 1,
			'email' => 'Lorem ipsum dolor sit amet',
			'first_name' => 'Lorem ipsum dolor sit amet',
			'last_name' => 'Lorem ipsum dolor sit amet',
			'login_hash' => 'Lorem ipsum dolor sit amet',
			'login_ip' => 1,
			'last_ui' => 'Lorem ipsum dolor sit amet',
			'change_password' => '2012-11-02 17:57:19',
			'modified' => '2012-11-02 17:57:19',
			'created' => '2012-11-02 17:57:19',
			'active' => 'Lorem ipsum dolor sit amet',
			'admin' => 1,
			'current_location' => 1,
			'current_till' => 1,
			'location_id' => 1,
			'company_id' => 1,
			'deleted' => '2012-11-02 17:57:19',
			'deleted_by' => 1,
			'user_group_id' => 1
		));
		$this->User->create();
		$result=$this->User->save($newUser);
		$this->assertEqual(isset($result['User']['id']), true, "New User is created.");
	}

}
