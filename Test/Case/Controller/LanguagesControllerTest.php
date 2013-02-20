<?php
App::uses('LanguagesController', 'Controller');

/**
 * LanguagesController Test Case
 *
 */
class LanguagesControllerTest extends ControllerTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.language',
		'app.user',
		'app.checkpoint',
		'app.company',
		'app.location',
		'app.location_type'
	);

}
