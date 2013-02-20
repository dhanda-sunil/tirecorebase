<?php
App::uses('Batch', 'Model');

/**
 * Batch Test Case
 *
 */
class BatchTest extends CakeTestCase
{

	//@todo (Jared) For some reason, I keep getting the following error:
	// exception 'PDOException' with message 'SQLSTATE[42S02]: Base table or view not found: 1146 Table 'treadtracks_test.batches'
	//

	/**
	 * Fixtures
	 *
	 * @var array
	 */
	public $fixtures = array(
		'app.batch'
	);

	/**
	 * setUp method
	 *
	 * @return void
	 */
	public function setUp()
	{
		parent::setUp();
		$this->Batch = ClassRegistry::init('Batch');
	}

	/**
	 * tearDown method
	 *
	 * @return void
	 */
	public function tearDown()
	{
		unset($this->Batch);

		parent::tearDown();
	}

	public function testExpandData()
	{
		$batch=$this->Batch->findById(1); // Single records
		$this->assertEqual(count($batch[0]['Batch']['data']),12, "There should be 12 records in the data string.");
	}
}
