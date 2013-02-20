<?php
App::uses('AppModel', 'Model');
/**
 * PhoneNumber Model
 *
 */
class PhoneNumber extends AppModel {
    public $actsAs = array('Bancha.BanchaRemotable');

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'value';

}
