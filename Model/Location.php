<?php
App::uses('AppModel', 'Model');
/**
 * Location Model
 *
 */
class Location extends AppModel {


	/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';

	public $actsAs = array('Bancha.BanchaRemotable');
    
    public $belongsTo = array('Company', 'LocationType');
}
