<?php
App::uses('UsersController', 'Controller');

/**
 * UsersController Test Case
 *
 */
class UsersControllerTest extends ControllerTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.user',
		'app.checkpoint',
		'app.company',
		'app.location',
		'app.language',

	);

/**
 * testIndex method
 *
 * @return void
 */
	public function testIndex() {
	}

/**
 * testView method
 *
 * @return void
 */
	public function testView() {
	}

/**
 * testAdd method
 *
 * @return void
 */
	public function testAdd() {
	}

/**
 * testEdit method
 *
 * @return void
 */
	public function testEdit() {
	}

/**
 * testDelete method
 *
 * @return void
 */
	public function testDelete() {
	}

	public function testLogin() {
		$result = $this->testAction('/users/login');
		debug($result);

		$this->testAction('/users/add', array(
			'data' => array(
				'Post' => array(
					'username' => 'testUsername',
					'password' => 'testPassword',
					'language_id' => 2,
					'first_name' => 'test',
					'location_id' => 1,
					'company_id' => 2,
					'current_till' => 1,
					'current_location' => 1,
					'login_hash' => '4fbfbdefbfbdefbfbdefbfbdefbfbdefbfbdefbfbdefbfbdefbfbdefbfbdefbf'

				),
			)
		));

		$this->assertContains('/users/index', $this->headers['Location']);
		$this->testAction('/users/index');
		debug($this->contents);
		$this->assertContains('testUsername', $this->contents['records'][10]['User']['username']);
		$this->testAction('/users/login', array(
			'data' => array(
				'Post' => array('username' => 'testUsername', 'password' => 'testPassword')
			)
		));
		debug($this->vars);

	}

}
