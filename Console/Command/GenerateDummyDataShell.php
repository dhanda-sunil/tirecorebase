<?php
set_time_limit(0);
App::uses('Sanitize', 'Utility');
App::uses('ConsoleOptionParser', 'Utility');
App::uses('ConnectionManager', 'Core');

/**
 * Imports csv file from Oliver Tire (possibly others)
 * @example Console/cake OliverImportShell oliver_info.csv
 * @author jared
 */
class GenerateDummyDataShell extends AppShell
{

	public $uses = array('Manufacturers', 'ManufacturerPlants', 'ManufacturerProductLines', 'ManufacturerPlantSizes', 'TreadWidths', 'TireSizes');

	public function  __construct()
	{
//		ConnectionManager::getDataSource('default'); // Uncomment if datasource is different
		parent::__construct();
	}

	/**
	 * Run import methods, requires absolute path to export directory as shell arg
	 * @example Console/cake FileImport run /home/chris/Downloads/export/
	 * @param string $arg[0] absolute path to export directory containing xml files
	 * @return void
	 */
	public function main()
	{
		$this->out("<info>Please enter the table you want to generate data for.</info>");
	}

	public function Man()
	{
//		debug($this->Manufacturer);
//		die;
		$data = array();
		for ($i = 0; $i < 26; $i++) {
			for ($j = 0; $j < 26; $j++) {
				$code = chr(65 + $i) . chr(65 + $j);
				$this->out($code);
				$data[] = array(
					'name'     => "Manufacturer $code",
					'dot_code' => $code
				);
			}
		}
		$insertData = array('Manufacturer' => $data);
		$this->Manufacturer->create();
		debug($this->Manufacturer->saveAll($insertData));


	}

	public function manufacturer_product_lines()
	{
		$data   = array();
		$plants = $this->ManufacturerPlant->find('all');
		foreach ($plants as $plant) {
//			for ($i = 0; $i < 26; $i++) {
//				for ($j = 0; $j < 26; $j++) {
//					for ($k = 0; $k < 26; $k++) {
			$i = $j = $k = 0;
			for ($l = 0; $l < 26; $l++) {
				$code = chr(65 + $i) . chr(65 + $j) . chr(65 + $k) . chr(65 + $l);
				$this->out($code);
				$data[] = array(
					'manufacturer_plant_id'              => $plant['ManufacturerPlant']['id'],
					'manufacturer_product_line_group_id' => 1,
					'is_material'                        => 1,
					'dot_code'                           => $code,
					'name'                               => "Product line " . $code,
					'material_size_list'                 => ''
				);
			}
//					}
//				}
//			}
		}
		$this->ManufacturerProductLine->create();
		debug($this->ManufacturerProductLine->saveAll($data, array('deep' => true, 'validate' => false, 'atomic' => false)));

	}

	public function tire_sizes()
	{
		$data   = array();
		$widths = $this->TreadWidths->find('all');
		for ($i = 0; $i < 26; $i++) {
			for ($j = 0; $j < 26; $j++) {
				$randWidth = array_rand($widths);
				$code      = chr(65 + $i) . chr(65 + $j);
				$this->out($code);
				$data[] = array(
					'two_char_code'  => $code,
					'size_code'      => $i + $j,
					'tread_width_id' => $widths[$randWidth]['TreadWidths']['id'],
					'aspect_ratio'   => rand(16, 24),
					'diameter'       => rand(20, 40)
				);
			}
		}
		$this->TireSizes->create();
		debug($this->TireSizes->saveAll($data, array('validate' => false, 'atomic' => false)));
	}

	public function manufacturer_plant_sizes()
	{
		$data                = array();
		$manufacturer_plants = $this->ManufacturerPlants->find('all');
		$tire_sizes          = $this->TireSizes->find('all');
		foreach ($manufacturer_plants as $plant) {
			foreach ($tire_sizes as $ts) {
				$data[] = array(
					'manufacturer_plant_id' => $plant['ManufacturerPlants']['id'],
					'tire_size_id'          => $ts['TireSizes']['id'],
					'size_code'             => $ts['TireSizes']['two_char_code']
				);
			}
		}
		$this->ManufacturerPlantSizes->create();
		debug($this->ManufacturerPlantSizes->saveAll($data, array('validate' => false, 'atomic' => false)));
	}

	public function customers()
	{
		$data         = array();
		$companyNames = array('JR Simpson Hauling', 'Anderson Excavation', 'Sunshine Trucking', 'Superior Waste', 'Simpson Radiation');
		foreach ($companyNames as $name) {
			$company = array(
				'Companies' => array(
					'company_name' => $name,
					'Contacts' => array(),
					'Accounts' => array(),
					'Addresses' => array(),
				)
			);
			for($i=0,$contacts=rand(1,3);$i<$contacts;$i++ ) {
				$company['Companies']['Contacts'][$i] = $this->generateContact();

			}
		}

	}

	public function generateContact() {
		$first_names =array('John','Richard','James','Ken','Chris','Bob', 'Alex');
		$last_names =array('Smith','Johnson','Anderson','Jones','Singleton','Richards');
		return array(
			'first_name' => $first_names[array_rand($first_names)],
			'last_name' => $last_names[array_rand($last_names)],
			'ref_table' => 'customers'
		);
}
}