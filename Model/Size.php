<?php
App::uses('AppModel', 'Model');
/**
 * TireSize Model
 *
 * @property Casing $Casing
 * @property MoldType $MoldType
 * @property BuffSpec $BuffSpec
 */
class Size extends AppModel {

    public $actsAs = array('Bancha.BanchaRemotable');
    public $displayField = 'size_code';
    public $useTable = 'tire_sizes';
	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Casing' => array(
			'className' => 'Casing',
			'foreignKey' => 'tire_size_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'MoldType' => array(
			'className' => 'MoldType',
			'foreignKey' => 'tire_size_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
        'BuffSpec' => array(
			'className' => 'BuffSpec',
			'foreignKey' => 'tire_size_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
        )
	);
}