<?php
App::uses('AppModel', 'Model');
/**
 * CustomerLocation Model
 *
 */
class CustomerLocation extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';
    public $actsAs = array('Bancha.BanchaRemotable');

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Customer'
	);
}
