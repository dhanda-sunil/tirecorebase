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
class OliverImportShell extends AppShell
{

	public $uses = array('TreadDesign', 'Uom', 'TreadWidth');

	/**
	 * Run import methods, requires absolute path to export directory as shell arg
	 * @example Console/cake FileImport run /home/chris/Downloads/export/
	 * @param string $arg[0] absolute path to export directory containing xml files
	 * @return void
	 */
	public function main()
	{
		ConnectionManager::getDataSource('quality');

		$this->Uom->useDbConfig = $this->TreadWidth->useDbConfig = $this->TreadDesign->useDbConfig='quality';

		$this->out("<info>Running file import ...</info>");

		$args  = $this->args;
		$error = "";
		if (count($args) < 1) {
			$error = "No import file was added.";
		} elseif (!file_exists($args[0])) {
			$error = sprintf("Couldn't find file %s", $args[0]);
		} elseif (!($handle = fopen($args[0], "r")) !== FALSE) {
			$error = sprintf("Couldn't open file %s", $args[0]);
		}

		// Check to see if we have any errors at this point
		if ($error != "") {
			$this->out(sprintf("<error>%s</error>", $error));
			if (isset($handle))
				fclose($handle);
			die;
		}

		// Looks like we have a correct file at this point
		$rows = array();
		while (($row = fgetcsv($handle, 1000, ",")) !== FALSE) {
			$rows[] = $row;
		}
		fclose($handle);

		$this->out(sprintf("<info>Read %d rows from %s</info>", count($rows), $args[0]));

		$format = array(NULL, NULL, NULL, NULL,
			'action_code', // Only import "C"
			'TreadDesign.vendor_id', // This will need to be manually added to the csv file
			"TreadDesign.tread_abb",
			'TreadDesignTreadWidth.mfr_item_no',
			'TreadDesign.name',
			'TreadDesign.tread_width',
			'TreadDesignTreadWidth.tread_depth',
			'TreadDesign.tread_group_id',
			'TreadDesignTreadWidth.roll_weight',
			'TreadDesignTreadWidth.weight_per_foot',
			'TreadDesignTreadWidth.uom'
		);

		// Get only the fields we need
		$cleanData = array();
		foreach ($rows as $row) {
			$cleanRow = array();
			foreach ($format as $key => $col) {
				if (!empty($col)) {
					$cleanRow[$col] = $row[$key];
				}
			}
			$cleanData[] = $cleanRow;
		}

//		debug($cleanData);

		// Group Data
		$insertData      = array();
		$i               = -1;
		$currentTreadAbb = '';

		$noWidths = array();
		$yesWidths = array();
		foreach ($cleanData as $row) {
			// Only import "C" action codes
			if ($row['action_code'] != "C")
				continue;

			// Group together by Tread Abbreviations
			if ($currentTreadAbb != $row['TreadDesign.tread_abb']) {
				$i++; $j=0;
				$currentTreadAbb                                 = $row['TreadDesign.tread_abb'];
				$insertData[$i]['TreadDesign']['tread_abb']      = $row['TreadDesign.tread_abb'];
				$insertData[$i]['TreadDesign']['name']           = preg_replace("/ \d+$/", "", $row['TreadDesign.name']);
				$insertData[$i]['TreadDesign']['tread_group_id'] = $row['TreadDesign.tread_group_id'];
				$insertData[$i]['TreadDesign']['vendor_id'] = $row['TreadDesign.vendor_id'];
			}
			$insertData[$i]['TreadDesign']['TreadDesignTreadWidth'][$j]['mfr_item_no']     = $row['TreadDesignTreadWidth.mfr_item_no'];
			$insertData[$i]['TreadDesign']['TreadDesignTreadWidth'][$j]['tread_depth']     = $row['TreadDesignTreadWidth.tread_depth'];
			$insertData[$i]['TreadDesign']['TreadDesignTreadWidth'][$j]['roll_weight']     = $row['TreadDesignTreadWidth.roll_weight'];
			$insertData[$i]['TreadDesign']['TreadDesignTreadWidth'][$j]['weight_per_foot'] = $row['TreadDesignTreadWidth.weight_per_foot'];
			$insertData[$i]['TreadDesign']['TreadDesignTreadWidth'][$j]['uom_id']          = $this->getUOM($row['TreadDesignTreadWidth.uom']);
			$insertData[$i]['TreadDesign']['TreadDesignTreadWidth'][$j]['tread_width_id']     = $this->getTreadWidthID($row['TreadDesign.tread_width']);
			if(empty($insertData[$i]['TreadDesign']['TreadDesignTreadWidth'][$j]['tread_width_id'])) {
				$noWidths[]=$row['TreadDesign.tread_width'];
			} else {
				$yesWidths[]=$row['TreadDesign.tread_width'];
			}
			$j++;


		}
//
//		debug($insertData);
//		debug(array_unique($noWidths));
//		debug(array_unique($yesWidths));

		debug($this->TreadDesign->saveAll($insertData, array('deep'=> true)));
		$this->out("<comment>Complete!</comment>");
	}

	function getTreadWidthID($size)
	{
		$width = $this->TreadWidth->findTreadWidth($size);
		return $width ? $width['TreadWidth']['id'] : NULL;
	}

	function getUOM($uom)
	{

		$uom = $this->Uom->findBySymbol($uom);

		return $uom ? $uom['Uom']['id'] : NULL;
	}

	/**
	 * imports a single xml file into database table
	 * @example Console/cake FileImport single /home/chris/Downloads/export/ mfr_brand.xml
	 * @param $args[0] absolute path to export directory
	 * @param $args[1] xml file to import from
	 * @return void
	 */
	public function single()
	{

		if (empty($this->args[0]) || empty($this->args[1])) {
			$this->out("\n<error>ERROR: Missing directory path and/or xml file to parse.</error>\n");
			die();
		} else {
			list($directory, $file) = $this->args;

			$this->directory = $directory;

			if (substr($this->directory, 0, -1) != '/') {
				$this->directory .= '/';
			}
		}

		if (array_key_exists($file, $this->importable)) {

			if (is_array($this->importable[$file])) {

				foreach ($this->importable[$file] as $j) {

					$o = simplexml_load_file($this->directory . $file);
					if (is_object($o)) {
						$this->{$j}($o);
					}
				}
			} else {
				$o = simplexml_load_file($this->directory . $file);
				if (is_object($o)) {
					$this->{$this->importable[$file]}($o);
				}
			}
		} else {
			$this->out("<warning>The file '$file' does not exist in '$directory'.</warning>");
		}
	}

	/**
	 * truncates tables listed in $this->importable
	 * @example Console/cake FileImport clear
	 * @example Console/cake FileImport clear manufacturers
	 * @param $args[0] optional table to clear, if empty clears all
	 * @return void
	 */
	public function clear()
	{

		if (isset($this->args[0]) && !empty($this->args[0])) {
			$tbl = $this->args[0];
			$opt = $this->in("Warning, this will clear out the $tbl table", array('y', 'n'));
			if ($opt == 'y') {
				$this->Manufacturer->query("TRUNCATE TABLE $tbl");
				$this->out("<warning>Truncated $tbl</warning>");
			}
		} else {

			$opt = $this->in('Warning, this will clear out all tables involved in the import process.', array('y', 'n'));

			if ($opt == 'y') {
				foreach ($this->importable as $i) {
					if (is_array($i)) {
						foreach ($i as $j) {
							$r = $this->Manufacturer->query("SHOW TABLES LIKE '$j'");
							if (isset($r[0]['TABLE_NAMES'])) {
								$this->Manufacturer->query("TRUNCATE TABLE $j");
								$this->out("<warning>Truncated $j</warning>");
							}
						}
					} else {
						$r = $this->Manufacturer->query("SHOW TABLES LIKE '$i'");
						if (isset($r[0]['TABLE_NAMES'])) {
							$this->Manufacturer->query("TRUNCATE TABLE $i");
							$this->out("<warning>Truncated $i</warning>");
						}
					}
				}
			}
		}
	}

	/**
	 * Imports cust_notes.xml to customers.notes field
	 * @param object
	 * @return void
	 */
	private function customer_notes($o)
	{
		$this->out("<info>Importing customer notes ...</info>");
		$this->out("Updating customer notes ...");
		$imported = 0;

		foreach ($o as $i) {

			$attr = $this->sanitize($i->attributes());
			$note = '';

			foreach ($attr as $x => $j) {
				$j = trim($j);
				if (preg_match('/note/', $x) && !empty($j)) {
					$note .= $j . '. ';
				}
			}
			if (!empty($note)) {
				$update = "UPDATE customers SET `notes` = '" . trim($note) . "' WHERE legacy_id = '" . $attr['cust'] . "'";
				if ($this->Customer->query($update)) {
					$imported++;
				}
			}
		}
		$this->out("Imported $imported out of " . count($o) . "");
	}

	/**
	 * Imports cust_price.xml to customers.notes field
	 * @param object
	 * @return void
	 */
	private function customer_prices($o)
	{
		$this->out("<info>Importing customer pricing notes ...</info>");
		$this->out("Updating customer pricing notes ...");
		$imported = 0;

		foreach ($o as $i) {

			$attr = $this->sanitize($i->attributes());
			$note = '';

			foreach ($attr as $x => $j) {
				$j = trim($j);
				if (preg_match('/special/', $x) && !empty($j)) {
					$note .= $j . '. ';
				}
			}

			if (!empty($note)) {
				$update = "UPDATE customers SET `notes` = CONCAT(notes,' SPECIAL PRICING NOTES: " . trim($note) . "') WHERE legacy_id = '" . $attr['cust'] . "'";
				if ($this->Customer->query($update)) {
					$imported++;
				}
			}
		}
		$this->out("Imported $imported out of " . count($o) . "");
	}

	/**
	 * Imports matt_spec.xml to buff_specs
	 * @todo still some missing fields tire_size_id, mold_type_id, bead_plate_id
	 * @param object
	 * @return void
	 */
	private function buff_specs($o)
	{
		$this->out("<info>Importing buff specs ...</info>");

		$insert = "INSERT IGNORE INTO buff_specs (`program_ref`,`name`,`retread_method`,`diameter`,`crown_width`,`radius`,`machine_setting`,`shoulder_radius`,
            `shoulder_length`,`shoulder_angle`,`steel_belt`,`shoulder_brushing`,`bead_width`) VALUES ";

		foreach ($o as $i) {

			$attr = $this->sanitize($i->attributes());

			$insert .= "('" . $attr['prog_id'] . "','" . $attr['prog_name'] . "','" . $attr['method_code'] . "','" . $attr['diameter'] . "','" . $attr['crown_width'] . "',
                '" . $attr['radius'] . "','" . $attr['mach_setting'] . "','" . $attr['sh_radius'] . "','" . $attr['sh_length'] . "','" . $attr['sh_angle'] . "',
                '" . $attr['steel_belt'] . "','" . $attr['sh_brush'] . "','" . $attr['bead_width'] . "'),";

		}

		$this->import('BuffSpec', $o, $insert);
	}

	/**
	 * Imports source.xml to jockeys
	 * @todo still some missing fields tire_size_id, mold_type_id, bead_plate_id
	 * @param object
	 * @return void
	 */
	private function jockeys($o)
	{
		$this->out("<info>Importing jockeys ...</info>");

		$insert = "INSERT IGNORE INTO jockeys (`name`) VALUES ";

		foreach ($o as $i) {

			$attr = $this->sanitize($i->attributes());

			$insert .= "('" . $attr['jockey'] . "'),";

		}

		$this->import('Jockey', $o, $insert);
	}

	/**
	 * Imports moldcure_info.xml to mold_types
	 * @todo
	 * @param object
	 * @return void
	 */
	private function mold_types($o)
	{
		$this->out("<info>Importing mold types ...</info>");

		$insert = "INSERT IGNORE INTO mold_types (`bead_plate`,`mold_cavity`,`description`) VALUES ";

		foreach ($o as $i) {

			$attr = $this->sanitize($i->attributes());

			$insert .= "('" . $attr['bead_plate'] . "','" . $attr['mold_cavity'] . "','" . $attr['mcdesc'] . "'),";

		}

		$this->import('MoldType', $o, $insert);
	}

	/**
	 * Imports vendor_master.xml to vendors
	 * @todo need tax_number, tax_number_expiration, sets_basis, manufacturer_id
	 * @param object
	 * @return void
	 */
	private function vendors($o)
	{
		$this->out("<info>Importing vendors ...</info>");

		$insert = "INSERT IGNORE INTO vendors (`name`) VALUES ";

		foreach ($o as $i) {

			$attr = $this->sanitize($i->attributes());

			if (!empty($attr['vnam'])) {
				$insert .= "('" . $attr['vnam'] . "'),";
			}
		}

		$this->import('Vendor', $o, $insert);
	}

	/**
	 * Imports orbitread_spec.xml to tread_designs
	 * @todo need name, vendor_id, grade
	 * @param object
	 * @return void
	 */
	private function tread_designs($o)
	{
		$this->out("<info>Importing tread designs ...</info>");

		$insert = "INSERT IGNORE INTO tread_designs (`tread_abb`) VALUES ";

		foreach ($o as $i) {

			$attr = $this->sanitize($i->attributes());

			if (!empty($attr['treadabb'])) {
				$insert .= "('" . $attr['treadabb'] . "'),";
			}
		}

		$this->import('TreadDesign', $o, $insert);
	}

	/**
	 * Imports mfr_brand.xml to manufacturers
	 * @param object
	 * @return void
	 */
	private function manufacturers($o)
	{

		$this->out("<info>Importing manufacturers ...</info>");

		$insert = "INSERT IGNORE INTO manufacturers (`name`,`dot_code`) VALUES ";

		foreach ($o as $i) {

			$attr = $this->sanitize($i->attributes());

			$insert .= "('" . $attr['brand'] . "','" . $attr['mfr'] . "'),";
		}

		$this->import('Manufacturer', $o, $insert);
	}

	/**
	 * Imports mfr_brand.xml to manufacturer_plants
	 * @param object
	 * @return void
	 */
	private function manufacturer_plants($o)
	{

		$this->out("<info>Importing manufacturer plants ...</info>");

		$insert = "INSERT IGNORE INTO manufacturer_plants (`manufacturer_id`,`code`) VALUES ";

		$manArr = $this->Manufacturer->find('list', array('fields' => array('id', 'name'), 'recursive' => -1));

		foreach ($o as $i) {

			$attr = $this->sanitize($i->attributes());

			$id = array_search($attr['brand'], $manArr);

			$insert .= "('" . $id . "','" . $attr['mfr'] . "'),";
		}

		$this->import('ManufacturerPlant', $o, $insert);
	}

	/**
	 * Imports cust_mast.xml to customers
	 * @param object
	 * @return void
	 */
	private function customers($o)
	{

		$this->out("<info>Importing customers and addresses ...</info>");
		$this->out("Inserting records ...");
		$start = $this->Customer->find('count');

		foreach ($o as $i) {

			$a = $this->sanitize($i->attributes());

			$first = $last = '';

			if (!empty($a['ccomm'])) {

				$name = (ARRAY)@explode(' ', $a['ccomm']);

				if (count($name) == 1) {
					$first = $name[0];
				} else if (count($name) == 2) {
					$first = $name[0];
					$last  = $name[1];
				} else if (count($name) == 3) {
					$first = $name[0] . ' ' . $name[1];
					$last  = $name[2];
				} else if (count($name) == 4) {
					$first = $name[0] . ' ' . $name[1];
					$last  = $name[2] . ' ' . $name[3];
				}
			}

			$this->Customer->create();
			$data = array(
				'company_name' => $a['cname'],
				'first_name'   => trim($first),
				'last_name'    => trim($last),
				'tax_number'   => $a['ctaxno'],
				'phone_number' => $a['_cphone'],
				'legacy_id'    => $a['ccust']
			);
			$r    = $this->Customer->save($data, false);

			if ($r && $r['Customer']['id']) {

				$this->Address->create();
				$addr = array(
					'ref_id'    => $r['Customer']['id'],
					'ref_table' => 'customers',
					'line1'     => $a['caddr1'],
					'line2'     => $a['caddr2'],
					'city'      => $a['ccity'],
					'state'     => $a['csabbr'],
					'zip'       => $a['czip']
				);
				$this->Address->save($addr, false);
			}
		}

		$count    = count($o);
		$end      = $this->Customer->find('count');
		$imported = $end - $start;
		$this->out("Imported $imported out of $count customers");
	}

	/**
	 * Imports buff_spec.xml to tire_sizes
	 * @todo need dot_primary/secondar/tertiary, size_group, buff_circ, rim_size, cross_section(empty), bead_setting(empty), scale_min, scale_max
	 * @param object
	 * @return void
	 */
	private function tire_sizes($o)
	{

		$this->out("<info>Importing tire sizes ...</info>");

		$insert = "INSERT INTO tire_sizes (`size_code`,`bead_setting`) VALUES ";

		foreach ($o as $i) {

			$a = $this->sanitize($i->attributes());
			$insert .= "('" . $a['sizecode'] . "','" . $a['bead_setting'] . "'),";
		}

		$this->import('TireSize', $o, $insert);
	}

	/**
	 * Imports rt_reasons.xml to nrt_codes
	 * @todo need category
	 * @param object
	 * @return void
	 */
	private function nrt_codes($o)
	{

		$this->out("<info>Importing codes/reasons ...</info>");

		$insert = "INSERT INTO nrt_codes (`abbr`,`name`) VALUES ";

		foreach ($o as $i) {

			$a = $this->sanitize($i->attributes());

			$insert .= "('" . $a['nrt_abbr'] . "','" . $a['rtdesc'] . "'),";
		}

		$this->import('NrtCode', $o, $insert);
	}

	/**
	 * cleans attributes array using cakes sanitize utility
	 * @param object
	 * @return mixed
	 */
	private function sanitize($attr)
	{

		if (is_array($attr) || is_object($attr)) {
			$new = array();
			foreach ($attr as $x => $j) {
				$new[$x] = Sanitize::clean(Sanitize::escape($j[0]));
			}
		} else {
			$new = Sanitize::clean(Sanitize::escape($attr));
		}

		return $new;
	}

	/**
	 * performs import into table
	 * @param string $objName
	 * @param array $arr
	 * @param string $tbl
	 * @param string $insert
	 * @return void
	 */
	private function import($objName, $arr, $insert)
	{
		$this->out("Inserting records ...");
		$count = count($arr);
		$start = $this->{$objName}->find('count');
		$this->{$objName}->query(substr($insert, 0, -1));
		$end      = $this->{$objName}->find('count');
		$imported = $end - $start;
		$this->out("Imported $imported out of $count");
	}
}

?>
