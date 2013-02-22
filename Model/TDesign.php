<?php
App::uses('AppModel', 'Model');
/**
 * TDesign Model
 *
 * @property xyz $abc
 */
class TDesign extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasOne = array(
		'TreadDesignTreadWidth' => array(
			'className' => 'tread_design_tread_width',
			'foreignKey' => 't_design_id',
			'dependent' => false,
			'conditions' => '',
			//'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}
