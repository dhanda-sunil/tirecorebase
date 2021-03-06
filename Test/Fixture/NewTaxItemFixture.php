<?php
/**
 * NewTaxItemFixture
 *
 */
class NewTaxItemFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'tax_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'index'),
		'account_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'index'),
		'name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 127, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'amount' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => '6,3'),
		'use_min' => array('type' => 'boolean', 'null' => false, 'default' => null),
		'min_amount' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => '9,2'),
		'use_max' => array('type' => 'boolean', 'null' => false, 'default' => null),
		'max_amount' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => '9,2'),
		'use_itemized_min' => array('type' => 'boolean', 'null' => false, 'default' => null),
		'itemized_min_amount' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => '9,2'),
		'use_itemized_max' => array('type' => 'boolean', 'null' => false, 'default' => null),
		'itemized_max_amount' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => '9,2'),
		'hidden' => array('type' => 'boolean', 'null' => false, 'default' => null),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'created_by' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 5, 'key' => 'index'),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified_by' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 5, 'key' => 'index'),
		'deleted' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'deleted_by' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 5, 'key' => 'index'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'created_by' => array('column' => 'created_by', 'unique' => 0),
			'modified_by' => array('column' => 'modified_by', 'unique' => 0),
			'deleted_by' => array('column' => 'deleted_by', 'unique' => 0),
			'tax_id' => array('column' => 'tax_id', 'unique' => 0),
			'account_id' => array('column' => 'account_id', 'unique' => 0)
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
			'id' => 1,
			'tax_id' => 1,
			'account_id' => 1,
			'name' => 'Lorem ipsum dolor sit amet',
			'amount' => 1,
			'use_min' => 1,
			'min_amount' => 1,
			'use_max' => 1,
			'max_amount' => 1,
			'use_itemized_min' => 1,
			'itemized_min_amount' => 1,
			'use_itemized_max' => 1,
			'itemized_max_amount' => 1,
			'hidden' => 1,
			'created' => '2012-08-02 17:23:06',
			'created_by' => 1,
			'modified' => '2012-08-02 17:23:06',
			'modified_by' => 1,
			'deleted' => '2012-08-02 17:23:06',
			'deleted_by' => 1
		),
		array(
			'id' => 2,
			'tax_id' => 2,
			'account_id' => 2,
			'name' => 'Lorem ipsum dolor sit amet',
			'amount' => 2,
			'use_min' => 1,
			'min_amount' => 2,
			'use_max' => 1,
			'max_amount' => 2,
			'use_itemized_min' => 1,
			'itemized_min_amount' => 2,
			'use_itemized_max' => 1,
			'itemized_max_amount' => 2,
			'hidden' => 1,
			'created' => '2012-08-02 17:23:06',
			'created_by' => 2,
			'modified' => '2012-08-02 17:23:06',
			'modified_by' => 2,
			'deleted' => '2012-08-02 17:23:06',
			'deleted_by' => 2
		),
		array(
			'id' => 3,
			'tax_id' => 3,
			'account_id' => 3,
			'name' => 'Lorem ipsum dolor sit amet',
			'amount' => 3,
			'use_min' => 1,
			'min_amount' => 3,
			'use_max' => 1,
			'max_amount' => 3,
			'use_itemized_min' => 1,
			'itemized_min_amount' => 3,
			'use_itemized_max' => 1,
			'itemized_max_amount' => 3,
			'hidden' => 1,
			'created' => '2012-08-02 17:23:06',
			'created_by' => 3,
			'modified' => '2012-08-02 17:23:06',
			'modified_by' => 3,
			'deleted' => '2012-08-02 17:23:06',
			'deleted_by' => 3
		),
		array(
			'id' => 4,
			'tax_id' => 4,
			'account_id' => 4,
			'name' => 'Lorem ipsum dolor sit amet',
			'amount' => 4,
			'use_min' => 1,
			'min_amount' => 4,
			'use_max' => 1,
			'max_amount' => 4,
			'use_itemized_min' => 1,
			'itemized_min_amount' => 4,
			'use_itemized_max' => 1,
			'itemized_max_amount' => 4,
			'hidden' => 1,
			'created' => '2012-08-02 17:23:06',
			'created_by' => 4,
			'modified' => '2012-08-02 17:23:06',
			'modified_by' => 4,
			'deleted' => '2012-08-02 17:23:06',
			'deleted_by' => 4
		),
		array(
			'id' => 5,
			'tax_id' => 5,
			'account_id' => 5,
			'name' => 'Lorem ipsum dolor sit amet',
			'amount' => 5,
			'use_min' => 1,
			'min_amount' => 5,
			'use_max' => 1,
			'max_amount' => 5,
			'use_itemized_min' => 1,
			'itemized_min_amount' => 5,
			'use_itemized_max' => 1,
			'itemized_max_amount' => 5,
			'hidden' => 1,
			'created' => '2012-08-02 17:23:06',
			'created_by' => 5,
			'modified' => '2012-08-02 17:23:06',
			'modified_by' => 5,
			'deleted' => '2012-08-02 17:23:06',
			'deleted_by' => 5
		),
		array(
			'id' => 6,
			'tax_id' => 6,
			'account_id' => 6,
			'name' => 'Lorem ipsum dolor sit amet',
			'amount' => 6,
			'use_min' => 1,
			'min_amount' => 6,
			'use_max' => 1,
			'max_amount' => 6,
			'use_itemized_min' => 1,
			'itemized_min_amount' => 6,
			'use_itemized_max' => 1,
			'itemized_max_amount' => 6,
			'hidden' => 1,
			'created' => '2012-08-02 17:23:06',
			'created_by' => 6,
			'modified' => '2012-08-02 17:23:06',
			'modified_by' => 6,
			'deleted' => '2012-08-02 17:23:06',
			'deleted_by' => 6
		),
		array(
			'id' => 7,
			'tax_id' => 7,
			'account_id' => 7,
			'name' => 'Lorem ipsum dolor sit amet',
			'amount' => 7,
			'use_min' => 1,
			'min_amount' => 7,
			'use_max' => 1,
			'max_amount' => 7,
			'use_itemized_min' => 1,
			'itemized_min_amount' => 7,
			'use_itemized_max' => 1,
			'itemized_max_amount' => 7,
			'hidden' => 1,
			'created' => '2012-08-02 17:23:06',
			'created_by' => 7,
			'modified' => '2012-08-02 17:23:06',
			'modified_by' => 7,
			'deleted' => '2012-08-02 17:23:06',
			'deleted_by' => 7
		),
		array(
			'id' => 8,
			'tax_id' => 8,
			'account_id' => 8,
			'name' => 'Lorem ipsum dolor sit amet',
			'amount' => 8,
			'use_min' => 1,
			'min_amount' => 8,
			'use_max' => 1,
			'max_amount' => 8,
			'use_itemized_min' => 1,
			'itemized_min_amount' => 8,
			'use_itemized_max' => 1,
			'itemized_max_amount' => 8,
			'hidden' => 1,
			'created' => '2012-08-02 17:23:06',
			'created_by' => 8,
			'modified' => '2012-08-02 17:23:06',
			'modified_by' => 8,
			'deleted' => '2012-08-02 17:23:06',
			'deleted_by' => 8
		),
		array(
			'id' => 9,
			'tax_id' => 9,
			'account_id' => 9,
			'name' => 'Lorem ipsum dolor sit amet',
			'amount' => 9,
			'use_min' => 1,
			'min_amount' => 9,
			'use_max' => 1,
			'max_amount' => 9,
			'use_itemized_min' => 1,
			'itemized_min_amount' => 9,
			'use_itemized_max' => 1,
			'itemized_max_amount' => 9,
			'hidden' => 1,
			'created' => '2012-08-02 17:23:06',
			'created_by' => 9,
			'modified' => '2012-08-02 17:23:06',
			'modified_by' => 9,
			'deleted' => '2012-08-02 17:23:06',
			'deleted_by' => 9
		),
		array(
			'id' => 10,
			'tax_id' => 10,
			'account_id' => 10,
			'name' => 'Lorem ipsum dolor sit amet',
			'amount' => 10,
			'use_min' => 1,
			'min_amount' => 10,
			'use_max' => 1,
			'max_amount' => 10,
			'use_itemized_min' => 1,
			'itemized_min_amount' => 10,
			'use_itemized_max' => 1,
			'itemized_max_amount' => 10,
			'hidden' => 1,
			'created' => '2012-08-02 17:23:06',
			'created_by' => 10,
			'modified' => '2012-08-02 17:23:06',
			'modified_by' => 10,
			'deleted' => '2012-08-02 17:23:06',
			'deleted_by' => 10
		),
	);

}
