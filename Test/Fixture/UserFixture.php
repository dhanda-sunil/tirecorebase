<?php
/**
<<<<<<< HEAD
 * UserFixture
 *
=======
 * Bancha test fixture
 *
 * Bancha Project : Seamlessly integrates CakePHP with ExtJS and Sencha Touch (http://banchaproject.org)
 * Copyright 2011-2012 StudioQ OG
 *
 * @package       Bancha
 * @category      Tests
 * @copyright     Copyright 2011-2012 StudioQ OG
 * @link          http://banchaproject.org Bancha Project
 * @since         Bancha v 0.9.0
 * @author        Roland Schuetz <mail@rolandschuetz.at>
 */

/**
 * Bancha test fixture
 *
 * @package       Bancha.Test.Fixture
>>>>>>> 727727777d6ec3df9b584b86f3b481f4d010645c
 */
class UserFixture extends CakeTestFixture {

/**
<<<<<<< HEAD
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 4, 'key' => 'primary'),
		'shop_checkpoint_pref_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 1),
		'username' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 64, 'key' => 'unique', 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'password' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 128, 'collate' => 'utf8_bin', 'charset' => 'utf8'),
		'language_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 2),
		'email' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'first_name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 50, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'last_name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 50, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'login_hash' => array('type' => 'binary', 'null' => true, 'default' => null, 'length' => 32, 'key' => 'unique'),
		'login_ip' => array('type' => 'float', 'null' => true, 'default' => null),
		'last_ui' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'change_password' => array('type' => 'datetime', 'null' => true, 'default' => '0000-00-00 00:00:00'),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'active' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 45, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'admin' => array('type' => 'boolean', 'null' => false, 'default' => '0'),
		'current_location' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 3),
		'current_till' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10),
		'location_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 3),
		'company_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 2),
		'deleted' => array('type' => 'datetime', 'null' => true, 'default' => null, 'key' => 'index'),
		'deleted_by' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 8),
		'user_group_id' => array('type' => 'integer', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'username' => array('column' => 'username', 'unique' => 1),
			//'login_hash' => array('column' => 'login_hash', 'unique' => 1),
			'deleted' => array('column' => 'deleted', 'unique' => 0)
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
			'shop_checkpoint_pref_id' => 1,
			'username' => 'Lorem ipsum dolor sit amet1',
			'password' => 'Lorem ipsum dolor sit amet',
			'language_id' => 1,
			'email' => 'Lorem ipsum dolor sit amet',
			'first_name' => 'Lorem ipsum dolor sit amet',
			'last_name' => 'Lorem ipsum dolor sit amet',
			'login_hash' => 'Lorem ipsum dolor sit amet',
			'login_ip' => 1,
			'last_ui' => 'Lorem ipsum dolor sit amet',
			'change_password' => '2012-11-02 17:57:19',
			'modified' => '2012-11-02 17:57:19',
			'created' => '2012-11-02 17:57:19',
			'active' => 'Lorem ipsum dolor sit amet',
			'admin' => 1,
			'current_location' => 1,
			'current_till' => 1,
			'location_id' => 1,
			'company_id' => 1,
			'deleted' => '2012-11-02 17:57:19',
			'deleted_by' => 1,
			'user_group_id' => 1
		),
		array(
			'id' => 2,
			'shop_checkpoint_pref_id' => 2,
			'username' => 'Lorem ipsum dolor sit amet2',
			'password' => 'Lorem ipsum dolor sit amet',
			'language_id' => 2,
			'email' => 'Lorem ipsum dolor sit amet',
			'first_name' => 'Lorem ipsum dolor sit amet',
			'last_name' => 'Lorem ipsum dolor sit amet',
			'login_hash' => 'Lorem ipsum dolor sit amet',
			'login_ip' => 2,
			'last_ui' => 'Lorem ipsum dolor sit amet',
			'change_password' => '2012-11-02 17:57:19',
			'modified' => '2012-11-02 17:57:19',
			'created' => '2012-11-02 17:57:19',
			'active' => 'Lorem ipsum dolor sit amet',
			'admin' => 1,
			'current_location' => 2,
			'current_till' => 2,
			'location_id' => 2,
			'company_id' => 2,
			'deleted' => '2012-11-02 17:57:19',
			'deleted_by' => 2,
			'user_group_id' => 2
		),
		array(
			'id' => 3,
			'shop_checkpoint_pref_id' => 3,
			'username' => 'Lorem ipsum dolor sit amet3',
			'password' => 'Lorem ipsum dolor sit amet',
			'language_id' => 3,
			'email' => 'Lorem ipsum dolor sit amet',
			'first_name' => 'Lorem ipsum dolor sit amet',
			'last_name' => 'Lorem ipsum dolor sit amet',
			'login_hash' => 'Lorem ipsum dolor sit amet',
			'login_ip' => 3,
			'last_ui' => 'Lorem ipsum dolor sit amet',
			'change_password' => '2012-11-02 17:57:19',
			'modified' => '2012-11-02 17:57:19',
			'created' => '2012-11-02 17:57:19',
			'active' => 'Lorem ipsum dolor sit amet',
			'admin' => 1,
			'current_location' => 3,
			'current_till' => 3,
			'location_id' => 3,
			'company_id' => 3,
			'deleted' => '2012-11-02 17:57:19',
			'deleted_by' => 3,
			'user_group_id' => 3
		),
		array(
			'id' => 4,
			'shop_checkpoint_pref_id' => 4,
			'username' => 'Lorem ipsum dolor sit amet4',
			'password' => 'Lorem ipsum dolor sit amet',
			'language_id' => 4,
			'email' => 'Lorem ipsum dolor sit amet',
			'first_name' => 'Lorem ipsum dolor sit amet',
			'last_name' => 'Lorem ipsum dolor sit amet',
			'login_hash' => 'Lorem ipsum dolor sit amet',
			'login_ip' => 4,
			'last_ui' => 'Lorem ipsum dolor sit amet',
			'change_password' => '2012-11-02 17:57:19',
			'modified' => '2012-11-02 17:57:19',
			'created' => '2012-11-02 17:57:19',
			'active' => 'Lorem ipsum dolor sit amet',
			'admin' => 1,
			'current_location' => 4,
			'current_till' => 4,
			'location_id' => 4,
			'company_id' => 4,
			'deleted' => '2012-11-02 17:57:19',
			'deleted_by' => 4,
			'user_group_id' => 4
		),
		array(
			'id' => 5,
			'shop_checkpoint_pref_id' => 5,
			'username' => 'Lorem ipsum dolor sit amet5',
			'password' => 'Lorem ipsum dolor sit amet',
			'language_id' => 5,
			'email' => 'Lorem ipsum dolor sit amet',
			'first_name' => 'Lorem ipsum dolor sit amet',
			'last_name' => 'Lorem ipsum dolor sit amet',
			'login_hash' => 'Lorem ipsum dolor sit amet',
			'login_ip' => 5,
			'last_ui' => 'Lorem ipsum dolor sit amet',
			'change_password' => '2012-11-02 17:57:19',
			'modified' => '2012-11-02 17:57:19',
			'created' => '2012-11-02 17:57:19',
			'active' => 'Lorem ipsum dolor sit amet',
			'admin' => 1,
			'current_location' => 5,
			'current_till' => 5,
			'location_id' => 5,
			'company_id' => 5,
			'deleted' => '2012-11-02 17:57:19',
			'deleted_by' => 5,
			'user_group_id' => 5
		),
		array(
			'id' => 6,
			'shop_checkpoint_pref_id' => 6,
			'username' => 'Lorem ipsum dolor sit amet6',
			'password' => 'Lorem ipsum dolor sit amet',
			'language_id' => 6,
			'email' => 'Lorem ipsum dolor sit amet',
			'first_name' => 'Lorem ipsum dolor sit amet',
			'last_name' => 'Lorem ipsum dolor sit amet',
			'login_hash' => 'Lorem ipsum dolor sit amet',
			'login_ip' => 6,
			'last_ui' => 'Lorem ipsum dolor sit amet',
			'change_password' => '2012-11-02 17:57:19',
			'modified' => '2012-11-02 17:57:19',
			'created' => '2012-11-02 17:57:19',
			'active' => 'Lorem ipsum dolor sit amet',
			'admin' => 1,
			'current_location' => 6,
			'current_till' => 6,
			'location_id' => 6,
			'company_id' => 6,
			'deleted' => '2012-11-02 17:57:19',
			'deleted_by' => 6,
			'user_group_id' => 6
		),
		array(
			'id' => 7,
			'shop_checkpoint_pref_id' => 7,
			'username' => 'Lorem ipsum dolor sit amet7',
			'password' => 'Lorem ipsum dolor sit amet',
			'language_id' => 7,
			'email' => 'Lorem ipsum dolor sit amet',
			'first_name' => 'Lorem ipsum dolor sit amet',
			'last_name' => 'Lorem ipsum dolor sit amet',
			'login_hash' => 'Lorem ipsum dolor sit amet',
			'login_ip' => 7,
			'last_ui' => 'Lorem ipsum dolor sit amet',
			'change_password' => '2012-11-02 17:57:19',
			'modified' => '2012-11-02 17:57:19',
			'created' => '2012-11-02 17:57:19',
			'active' => 'Lorem ipsum dolor sit amet',
			'admin' => 1,
			'current_location' => 7,
			'current_till' => 7,
			'location_id' => 7,
			'company_id' => 7,
			'deleted' => '2012-11-02 17:57:19',
			'deleted_by' => 7,
			'user_group_id' => 7
		),
		array(
			'id' => 8,
			'shop_checkpoint_pref_id' => 8,
			'username' => 'Lorem ipsum dolor sit amet8',
			'password' => 'Lorem ipsum dolor sit amet',
			'language_id' => 8,
			'email' => 'Lorem ipsum dolor sit amet',
			'first_name' => 'Lorem ipsum dolor sit amet',
			'last_name' => 'Lorem ipsum dolor sit amet',
			'login_hash' => 'Lorem ipsum dolor sit amet',
			'login_ip' => 8,
			'last_ui' => 'Lorem ipsum dolor sit amet',
			'change_password' => '2012-11-02 17:57:19',
			'modified' => '2012-11-02 17:57:19',
			'created' => '2012-11-02 17:57:19',
			'active' => 'Lorem ipsum dolor sit amet',
			'admin' => 1,
			'current_location' => 8,
			'current_till' => 8,
			'location_id' => 8,
			'company_id' => 8,
			'deleted' => '2012-11-02 17:57:19',
			'deleted_by' => 8,
			'user_group_id' => 8
		),
		array(
			'id' => 9,
			'shop_checkpoint_pref_id' => 9,
			'username' => 'Lorem ipsum dolor sit amet9',
			'password' => 'Lorem ipsum dolor sit amet',
			'language_id' => 9,
			'email' => 'Lorem ipsum dolor sit amet',
			'first_name' => 'Lorem ipsum dolor sit amet',
			'last_name' => 'Lorem ipsum dolor sit amet',
			'login_hash' => 'Lorem ipsum dolor sit amet',
			'login_ip' => 9,
			'last_ui' => 'Lorem ipsum dolor sit amet',
			'change_password' => '2012-11-02 17:57:19',
			'modified' => '2012-11-02 17:57:19',
			'created' => '2012-11-02 17:57:19',
			'active' => 'Lorem ipsum dolor sit amet',
			'admin' => 1,
			'current_location' => 9,
			'current_till' => 9,
			'location_id' => 9,
			'company_id' => 9,
			'deleted' => '2012-11-02 17:57:19',
			'deleted_by' => 9,
			'user_group_id' => 9
		),
		array(
			'id' => 10,
			'shop_checkpoint_pref_id' => 10,
			'username' => 'Lorem ipsum dolor sit amet10',
			'password' => 'Lorem ipsum dolor sit amet',
			'language_id' => 10,
			'email' => 'Lorem ipsum dolor sit amet',
			'first_name' => 'Lorem ipsum dolor sit amet',
			'last_name' => 'Lorem ipsum dolor sit amet',
			'login_hash' => 'Lorem ipsum dolor sit amet',
			'login_ip' => 10,
			'last_ui' => 'Lorem ipsum dolor sit amet',
			'change_password' => '2012-11-02 17:57:19',
			'modified' => '2012-11-02 17:57:19',
			'created' => '2012-11-02 17:57:19',
			'active' => 'Lorem ipsum dolor sit amet',
			'admin' => 1,
			'current_location' => 10,
			'current_till' => 10,
			'location_id' => 10,
			'company_id' => 10,
			'deleted' => '2012-11-02 17:57:19',
			'deleted_by' => 10,
			'user_group_id' => 10
		),
	);

=======
 * fields property
 *
 * @var array
 * @access public
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'key' => 'primary'),
		'user' => array('type' => 'string', 'null' => false),
		'password' => array('type' => 'string', 'null' => false),
		'created' => 'datetime',
		'updated' => 'datetime'
	);

/**
 * records property
 *
 * @var array
 * @access public
 */
	public $records = array(
		array('id'=>95, 'user' => 'mariano', 'password' => '5f4dcc3b5aa765d61d8327deb882cf99', 'created' => '2007-03-17 01:16:23', 'updated' => '2007-03-17 01:18:31'),
		array('id'=>96, 'user' => 'nate', 'password' => '5f4dcc3b5aa765d61d8327deb882cf99', 'created' => '2007-03-17 01:18:23', 'updated' => '2007-03-17 01:20:31'),
		array('id'=>97, 'user' => 'larry', 'password' => '5f4dcc3b5aa765d61d8327deb882cf99', 'created' => '2007-03-17 01:20:23', 'updated' => '2007-03-17 01:22:31'),
		array('id'=>98, 'user' => 'garrett', 'password' => '5f4dcc3b5aa765d61d8327deb882cf99', 'created' => '2007-03-17 01:22:23', 'updated' => '2007-03-17 01:24:31'),
	);
>>>>>>> 727727777d6ec3df9b584b86f3b481f4d010645c
}
