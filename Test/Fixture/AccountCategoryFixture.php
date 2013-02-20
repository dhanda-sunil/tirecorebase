<?php
/**
 * AccountCategoryFixture
 *
 */
class AccountCategoryFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'primary'),
		'parent_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'key' => 'index'),
		'company_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'order' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 5),
		'name' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'parent_id' => array('column' => array('parent_id', 'company_id', 'order'), 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'parent_id' => 1,
			'company_id' => 1,
			'order' => 1,
			'name' => 'Lorem ipsum dolor sit amet',
			'created' => '2012-08-02 17:18:49',
			'modified' => '2012-08-02 17:18:49'
		),
		array(
			'id' => 2,
			'parent_id' => 2,
			'company_id' => 2,
			'order' => 2,
			'name' => 'Lorem ipsum dolor sit amet',
			'created' => '2012-08-02 17:18:49',
			'modified' => '2012-08-02 17:18:49'
		),
		array(
			'id' => 3,
			'parent_id' => 3,
			'company_id' => 3,
			'order' => 3,
			'name' => 'Lorem ipsum dolor sit amet',
			'created' => '2012-08-02 17:18:49',
			'modified' => '2012-08-02 17:18:49'
		),
		array(
			'id' => 4,
			'parent_id' => 4,
			'company_id' => 4,
			'order' => 4,
			'name' => 'Lorem ipsum dolor sit amet',
			'created' => '2012-08-02 17:18:49',
			'modified' => '2012-08-02 17:18:49'
		),
		array(
			'id' => 5,
			'parent_id' => 5,
			'company_id' => 5,
			'order' => 5,
			'name' => 'Lorem ipsum dolor sit amet',
			'created' => '2012-08-02 17:18:49',
			'modified' => '2012-08-02 17:18:49'
		),
		array(
			'id' => 6,
			'parent_id' => 6,
			'company_id' => 6,
			'order' => 6,
			'name' => 'Lorem ipsum dolor sit amet',
			'created' => '2012-08-02 17:18:49',
			'modified' => '2012-08-02 17:18:49'
		),
		array(
			'id' => 7,
			'parent_id' => 7,
			'company_id' => 7,
			'order' => 7,
			'name' => 'Lorem ipsum dolor sit amet',
			'created' => '2012-08-02 17:18:49',
			'modified' => '2012-08-02 17:18:49'
		),
		array(
			'id' => 8,
			'parent_id' => 8,
			'company_id' => 8,
			'order' => 8,
			'name' => 'Lorem ipsum dolor sit amet',
			'created' => '2012-08-02 17:18:49',
			'modified' => '2012-08-02 17:18:49'
		),
		array(
			'id' => 9,
			'parent_id' => 9,
			'company_id' => 9,
			'order' => 9,
			'name' => 'Lorem ipsum dolor sit amet',
			'created' => '2012-08-02 17:18:49',
			'modified' => '2012-08-02 17:18:49'
		),
		array(
			'id' => 10,
			'parent_id' => 10,
			'company_id' => 10,
			'order' => 10,
			'name' => 'Lorem ipsum dolor sit amet',
			'created' => '2012-08-02 17:18:49',
			'modified' => '2012-08-02 17:18:49'
		),
	);

}
