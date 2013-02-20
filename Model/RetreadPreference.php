<?php
App::uses('AppModel', 'Model');
/**
 * RetreadPreference Model
 *
 * @property TireSize $TireSize
 * @property Material $Material
 * @property PatchLocation $PatchLocation
 */
class RetreadPreference extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'TireSize' => array(
			'className' => 'TireSize',
			'foreignKey' => 'tire_size_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Material' => array(
			'className' => 'Material',
			'foreignKey' => 'material_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'PatchLocation' => array(
			'className' => 'PatchLocation',
			'foreignKey' => 'patch_location_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
