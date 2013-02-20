<?php
App::uses('CoItemsController', 'Controller');

/**
 * CoItemsController Test Case
 *
 */
class CoItemsControllerTest extends ControllerTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.co_item',
		'app.casing'
	);


/**
 * testIndex method
 *
 * @return void
 */
	public function testIndex() {
	}



/**
 * testGetByCasingId method
 *
 * @return void
 */
	public function testGetByCasingId() {
	}

/**
 * testGetCoCasingItems method
 *
 * @return void
 */
	public function testGetCoCasingItems() {
	}

/**
 * testGetCoServiceItems method
 *
 * @return void
 */
	public function testGetCoServiceItems() {
	}

/**
 * testCreateCoCasingItem method
 *
 * @return void
 */
	public function testCreateCoCasingItem() {
		$data = array('CoItem' => array(
			"dot_code" => "0DTSMAPL4209",
			"id" => "ext-record-90",
			"line_number" => "3",
			"casing_id" => 1,
			"co_item_type_id" => 3,
			"barcode" => "124",
			"co_id" => 1,
			"tire_size_id" => null,
			"tire_size_code" => "TS",
			"manufacturer_id" => 2,
			"manufacturer_plant_code" => "0D",
			"manufacturer_name" => "DELTA",
			"tread_design_id" => 1
)
		);
		$result=$this->testAction(
			'/CoItems/createCoCasingItem/e',
			array('data' => $data, 'method' => 'post')
		);
		debug($result);
	}

/**
 * testUpdateCoCasingItem method
 *
 * @return void
 */
	public function testUpdateCoCasingItem() {
	}

/**
 * testCreateCoServiceItem method
 *
 * @return void
 */
	public function testCreateCoServiceItem() {
	}

/**
 * testUpdateCoServiceItem method
 *
 * @return void
 */
	public function testUpdateCoServiceItem() {
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

}
