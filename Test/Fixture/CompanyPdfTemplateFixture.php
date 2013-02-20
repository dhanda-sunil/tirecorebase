<?php
/**
 * CompanyPdfTemplateFixture
 *
 */
class CompanyPdfTemplateFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'page' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 63, 'key' => 'primary', 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'company_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 2, 'key' => 'primary'),
		'logo' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 14, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'h_line1' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 127, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'h_line2' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 127, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'h_line3' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 127, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'h_line4' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 127, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'h_line5' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 127, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'front_header' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 63, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'sub_header' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 63, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'footer' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 63, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'indexes' => array(
			'PRIMARY' => array('column' => array('page', 'company_id'), 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'MyISAM')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'page' => 'Lorem ipsum dolor sit amet',
			'company_id' => 1,
			'logo' => 'Lorem ipsum ',
			'h_line1' => 'Lorem ipsum dolor sit amet',
			'h_line2' => 'Lorem ipsum dolor sit amet',
			'h_line3' => 'Lorem ipsum dolor sit amet',
			'h_line4' => 'Lorem ipsum dolor sit amet',
			'h_line5' => 'Lorem ipsum dolor sit amet',
			'front_header' => 'Lorem ipsum dolor sit amet',
			'sub_header' => 'Lorem ipsum dolor sit amet',
			'footer' => 'Lorem ipsum dolor sit amet'
		),
		array(
			'page' => 'Lorem ipsum dolor sit amet',
			'company_id' => 2,
			'logo' => 'Lorem ipsum ',
			'h_line1' => 'Lorem ipsum dolor sit amet',
			'h_line2' => 'Lorem ipsum dolor sit amet',
			'h_line3' => 'Lorem ipsum dolor sit amet',
			'h_line4' => 'Lorem ipsum dolor sit amet',
			'h_line5' => 'Lorem ipsum dolor sit amet',
			'front_header' => 'Lorem ipsum dolor sit amet',
			'sub_header' => 'Lorem ipsum dolor sit amet',
			'footer' => 'Lorem ipsum dolor sit amet'
		),
		array(
			'page' => 'Lorem ipsum dolor sit amet',
			'company_id' => 3,
			'logo' => 'Lorem ipsum ',
			'h_line1' => 'Lorem ipsum dolor sit amet',
			'h_line2' => 'Lorem ipsum dolor sit amet',
			'h_line3' => 'Lorem ipsum dolor sit amet',
			'h_line4' => 'Lorem ipsum dolor sit amet',
			'h_line5' => 'Lorem ipsum dolor sit amet',
			'front_header' => 'Lorem ipsum dolor sit amet',
			'sub_header' => 'Lorem ipsum dolor sit amet',
			'footer' => 'Lorem ipsum dolor sit amet'
		),
		array(
			'page' => 'Lorem ipsum dolor sit amet',
			'company_id' => 4,
			'logo' => 'Lorem ipsum ',
			'h_line1' => 'Lorem ipsum dolor sit amet',
			'h_line2' => 'Lorem ipsum dolor sit amet',
			'h_line3' => 'Lorem ipsum dolor sit amet',
			'h_line4' => 'Lorem ipsum dolor sit amet',
			'h_line5' => 'Lorem ipsum dolor sit amet',
			'front_header' => 'Lorem ipsum dolor sit amet',
			'sub_header' => 'Lorem ipsum dolor sit amet',
			'footer' => 'Lorem ipsum dolor sit amet'
		),
		array(
			'page' => 'Lorem ipsum dolor sit amet',
			'company_id' => 5,
			'logo' => 'Lorem ipsum ',
			'h_line1' => 'Lorem ipsum dolor sit amet',
			'h_line2' => 'Lorem ipsum dolor sit amet',
			'h_line3' => 'Lorem ipsum dolor sit amet',
			'h_line4' => 'Lorem ipsum dolor sit amet',
			'h_line5' => 'Lorem ipsum dolor sit amet',
			'front_header' => 'Lorem ipsum dolor sit amet',
			'sub_header' => 'Lorem ipsum dolor sit amet',
			'footer' => 'Lorem ipsum dolor sit amet'
		),
		array(
			'page' => 'Lorem ipsum dolor sit amet',
			'company_id' => 6,
			'logo' => 'Lorem ipsum ',
			'h_line1' => 'Lorem ipsum dolor sit amet',
			'h_line2' => 'Lorem ipsum dolor sit amet',
			'h_line3' => 'Lorem ipsum dolor sit amet',
			'h_line4' => 'Lorem ipsum dolor sit amet',
			'h_line5' => 'Lorem ipsum dolor sit amet',
			'front_header' => 'Lorem ipsum dolor sit amet',
			'sub_header' => 'Lorem ipsum dolor sit amet',
			'footer' => 'Lorem ipsum dolor sit amet'
		),
		array(
			'page' => 'Lorem ipsum dolor sit amet',
			'company_id' => 7,
			'logo' => 'Lorem ipsum ',
			'h_line1' => 'Lorem ipsum dolor sit amet',
			'h_line2' => 'Lorem ipsum dolor sit amet',
			'h_line3' => 'Lorem ipsum dolor sit amet',
			'h_line4' => 'Lorem ipsum dolor sit amet',
			'h_line5' => 'Lorem ipsum dolor sit amet',
			'front_header' => 'Lorem ipsum dolor sit amet',
			'sub_header' => 'Lorem ipsum dolor sit amet',
			'footer' => 'Lorem ipsum dolor sit amet'
		),
		array(
			'page' => 'Lorem ipsum dolor sit amet',
			'company_id' => 8,
			'logo' => 'Lorem ipsum ',
			'h_line1' => 'Lorem ipsum dolor sit amet',
			'h_line2' => 'Lorem ipsum dolor sit amet',
			'h_line3' => 'Lorem ipsum dolor sit amet',
			'h_line4' => 'Lorem ipsum dolor sit amet',
			'h_line5' => 'Lorem ipsum dolor sit amet',
			'front_header' => 'Lorem ipsum dolor sit amet',
			'sub_header' => 'Lorem ipsum dolor sit amet',
			'footer' => 'Lorem ipsum dolor sit amet'
		),
		array(
			'page' => 'Lorem ipsum dolor sit amet',
			'company_id' => 9,
			'logo' => 'Lorem ipsum ',
			'h_line1' => 'Lorem ipsum dolor sit amet',
			'h_line2' => 'Lorem ipsum dolor sit amet',
			'h_line3' => 'Lorem ipsum dolor sit amet',
			'h_line4' => 'Lorem ipsum dolor sit amet',
			'h_line5' => 'Lorem ipsum dolor sit amet',
			'front_header' => 'Lorem ipsum dolor sit amet',
			'sub_header' => 'Lorem ipsum dolor sit amet',
			'footer' => 'Lorem ipsum dolor sit amet'
		),
		array(
			'page' => 'Lorem ipsum dolor sit amet',
			'company_id' => 10,
			'logo' => 'Lorem ipsum ',
			'h_line1' => 'Lorem ipsum dolor sit amet',
			'h_line2' => 'Lorem ipsum dolor sit amet',
			'h_line3' => 'Lorem ipsum dolor sit amet',
			'h_line4' => 'Lorem ipsum dolor sit amet',
			'h_line5' => 'Lorem ipsum dolor sit amet',
			'front_header' => 'Lorem ipsum dolor sit amet',
			'sub_header' => 'Lorem ipsum dolor sit amet',
			'footer' => 'Lorem ipsum dolor sit amet'
		),
	);

}
