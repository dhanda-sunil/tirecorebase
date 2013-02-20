<?php
App::uses('BuffSpec', 'Model');

/**
 * BuffSpec Test Case
 *
 */
class BuffSpecTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.buff_spec'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->BuffSpec = ClassRegistry::init('BuffSpec');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->BuffSpec);

		parent::tearDown();
	}

	public function testCreate() {
		$newBuffSpec = array('BuffSpec' => array(
			'program_ref' => 1,
			'name' => 'Lorem ipsum dolor sit amet',
			'tread_size' => 'Lore',
			'diameter' => 1,
			'crown_width' => 1,
			'radius' => 1,
			'machine' => 1,
			'shoulder_radius' => 1,
			'shoulder_length' => 1,
			'shoulder_angle' => 1,
			'steel_belt' => 1,
			'shoulder_brushing' => 1,
			'bead_width' => 1,
			'mold_type_id' => 1,
			'bead_plate_id' => 1
		)
		);

		$this->BuffSpec->create();
		$result=$this->BuffSpec->save($newBuffSpec);
		$this->assertEqual(isset($result['BuffSpec']['id']), true, "New Buff Spec was created");
	}

}
