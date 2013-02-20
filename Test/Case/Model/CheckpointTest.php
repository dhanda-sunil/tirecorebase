<?php
App::uses('Checkpoint', 'Model');

/**
 * Checkpoint Test Case
 *
 */
class CheckpointTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.checkpoint'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Checkpoint = ClassRegistry::init('Checkpoint');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Checkpoint);

		parent::tearDown();
	}

	public function testCreation() {
		$newCheckpoint = array('Checkpoint' => array(
			'name' => 'Here is a long name for a checkpoint.'
		));

		$this->Checkpoint->create();
		$result = $this->Checkpoint->save($newCheckpoint);
		$this->assertEqual(isset($result['Checkpoint']['id']), true, "Checkpoint was created");
	}


}
