<?php
App::uses('MoldType', 'Model');

/**
 * MoldType Test Case
 *
 */
class MoldTypeTest extends CakeTestCase
{

	/**
	 * Fixtures
	 *
	 * @var array
	 */
	public $fixtures = array(
		'app.mold_type'
	);

	/**
	 * setUp method
	 *
	 * @return void
	 */
	public function setUp()
	{
		parent::setUp();
		$this->MoldType = ClassRegistry::init('MoldType');
	}

	/**
	 * tearDown method
	 *
	 * @return void
	 */
	public function tearDown()
	{
		unset($this->MoldType);

		parent::tearDown();
	}

	public function testCreate()
	{

		$newMoldType = array('MoldType' => array(
			'tread_design_id' => 1,
			'tire_size_id'    => 1,
			'code'            => 'L',
			'stock_status'    => 1,
			'description'     => 'Lorem ipsum dolor sit amet',
			'lifetime'        => 1
		),
		);
		$this->MoldType->create();
		$result = $this->MoldType->save($newMoldType);
		$this->assertEqual(isset($result['MoldType']['id']), true, "New MoldType is created.");
	}


}
