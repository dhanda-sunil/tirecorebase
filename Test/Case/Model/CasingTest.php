<?php
App::uses('Casing', 'Model');

/**
 * Casing Test Case
 *
 */
class CasingTest extends CakeTestCase
{

	/**
	 * Fixtures
	 *
	 * @var array
	 */
	public $fixtures = array(
		'app.casing',
		'app.customer',
		'app.co_item',
		'app.mold_type',
		'app.manufacturer_plant',
		'app.manufacturer_plant_size',
		'app.manufacturer_product_line'
	);

	/**
	 * setUp method
	 *
	 * @return void
	 */
	public function setUp()
	{
		parent::setUp();
		$this->Casing = ClassRegistry::init('Casing');

		$this->newCasing = array('Casing' => array(
			'manufacturer_plant_id'        => 1,
			'tire_size_id'                 => 1,
			'manufacturer_product_line_id' => 1,
			'production_week'              => 1,
			'barcode'                      => 25413541,
			'customer_id'                  => 1,
			'customer_tag'                 => 'Lorem ip',
			'rfid'                         => 1,
			'tread_design_id'              => 1,
			'grade'                        => '',
			'checking'                     => '',
			'previous_caps'                => 1,
			'remaining_tread'              => 1,
			'tread_width'                  => 1

		));
	}

	public function testNothing() {

	}
	public function testCasingCreate()
	{
		//pr($this->newCasing);
		$result = $this->Casing->save($this->newCasing);
		//debug($this->Casing->validationErrors);
		//pr($result);
		//die;
		$this->assertEqual(isset($result['Casing']['id']), true, "New Casing created");
	}

	public function testCasingAge()
	{
		$weeksAgo = 74;
		$production_week=strtotime(sprintf("%d weeks ago",$weeksAgo));
		$weekString=date("Wy",$production_week);
		$age = $this->Casing->getAge($weekString);
		debug($age);
		$this->assertEqual($age,$weeksAgo,"Should return the correct age");
	}

	public function testMinimumCasingInformation()
	{
		$casing = array('Casing' => array(
			"dot_code"                     => null,
			"line_number"                  => "3",
			"casing_id"                    => null,
			"co_item_type_id"              => null,
			"barcode"                      => "",
			"tread_design_id"              => null,
			"co_id"                        => 7,
			"tire_size_name"               => null,
			"manufacturer_name"            => null,
			"manufacturer_id"              => null,
			"tire_size_id"                 => null,
			"manufacturer_product_line_id" => null,
			"customer_id"                  => 13

		));

		$result=$this->Casing->save($casing);
		debug($result);
	}

	public function testParseDOT() {
		$codes = explode(",","OD,ABCD,ABCDEFGH,1234,AB1234,ABCD1234,ABCDEFGH1234");
		debug($codes);
		foreach($codes as $code) {
			$result=$this->Casing->parseDOT($code);
			debug($result);
			$this->assertEqual($result['original'],strtoupper($code));
		}
	}

	/**
	 * tearDown method
	 *
	 * @return void
	 */
	public function tearDown()
	{
		unset($this->Casing);

		parent::tearDown();
	}

}
