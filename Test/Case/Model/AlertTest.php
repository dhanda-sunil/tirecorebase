<?php
App::uses('Alert', 'Model');

/**
 * Alert Test Case
 *
 */
class AlertTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.alert'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Alert = ClassRegistry::init('Alert');

		$this->newAlert=array('Alert' => array(
			'table_name' => 'customers',
			'row_id' => '1',
			'is_active' => '1',
			'type' => '',
			'desc' => 'Here is a customer alert'
		));

	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Alert);

		parent::tearDown();
	}

	public function testCreateAndDeactivate() {

		$this->Alert->create();
		$result = $this->Alert->save($this->newAlert);
		$this->assertEqual(isset($result['Alert']['id']), true, "Create new alert");

		$id=$result['Alert']['id'];
		$change= array('Alert' => array('id' => $id, 'is_active' => 0));
		$this->Alert->create();
		$result= $this->Alert->save($change);
		$this->assertNotEqual($result,false,"Deactivating Alert works");

	}


}
