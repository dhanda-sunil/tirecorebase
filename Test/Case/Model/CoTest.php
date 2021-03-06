<?php
App::uses('Co', 'Model');

/**
 * Co Test Case
 *
 */
class CoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.co'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Co = ClassRegistry::init('Co');
	}

/*
     * Test Co Creation
     */

    public function testCreateCo() {
        $newCo=array('Co' => array(
            'ref' => 'Lorem ipsum dolor 2',
            'account_id' => 1,
            'type' => 1,
            'term_id' => 1,
            'bill_address_id' => 1,
            'ship_address_id' => 1,
            'is_national_account' => 1,
            'notes' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'requestor' => 'Lorem ipsum dolor sit amet',
            'authorized' => '2012-09-24 11:32:03',
            'authorized_by' => 1,
            'created' => '2012-09-24 11:32:03',
            'created_by' => 1,
            'modified' => '2012-09-24 11:32:03',
            'modified_by' => 1

        ));
        $result = $this->Co->save($newCo);
        $this->assertEqual(isset($result['Co']['id']), true, "Check if new Co can be created");
        $this->assertEqual($result['Co']['status'], "Open", "Check if new Co is set to status of Open");

        // Save with a duplicate ref id
	    $this->Co->create();
        $result = $this->Co->save($newCo);
        $this->assertEqual(empty($result), true, "Don't allow duplicate ref IDs in Co table");

    }
/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Co);

		parent::tearDown();
	}

}
