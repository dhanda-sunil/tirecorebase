<?php
App::uses('AppModel', 'Model');
/**
 * RepairType Model
 *
 */
class RepairType extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';

    public $actsAs = array('Bancha.BanchaRemotable');
    
    public $virtualFields = array(
        'repairs' => "0",
        'allowed' => "0",
    );
}
