<?php
App::uses('AppModel', 'Model');
/**
 * CoItemType Model
 *
 */
class CoItemType extends AppModel {
    public $actsAs = array('Bancha.BanchaRemotable');

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';

	public $belongsTo = array('CoItemTypeCategory');

	public $hasMany = array('CoItem');

}
