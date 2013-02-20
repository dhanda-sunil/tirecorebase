<?php
App::uses('CoItemStatus', 'Model');

/**
 * CoItemStatus Test Case
 *
 */
class CoItemStatusTest extends CakeTestCase
{

	/**
	 * Fixtures
	 *
	 * @var array
	 */
	public $fixtures = array(
		'app.co_item_status',
	);

	/**
	 * setUp method
	 *
	 * @return void
	 */
	public function setUp()
	{
		parent::setUp();
		$this->CoItemStatus = ClassRegistry::init('CoItemStatus');
	}

	/**
	 * tearDown method
	 *
	 * @return void
	 */
	public function tearDown()
	{
		unset($this->CoItemStatus);

		parent::tearDown();
	}

	public function testCreation()
	{
		$newCoItemStatus = array('CoItemStatus' => array(
			'name' => 'Here is a long name for an Co Item.'
		));

		$this->CoItemStatus->create();
		$result = $this->CoItemStatus->save($newCoItemStatus);
		$this->assertEqual(isset($result['CoItemStatus']['id']), true, "CoItemStatus was created");
	}


}
