<?php
App::uses('AppModel', 'Model');
/**
 * Alert Model
 *
 */
class Alert extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'desc';
    public $actsAs = array('Bancha.BanchaRemotable');

}
