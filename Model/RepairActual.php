<?php
App::uses('AppModel', 'Model');
/**
 * RepairActual Model
 *
 * @property Casing $Casing
 * @property Material $Material
 */
class RepairActual extends AppModel {

    public $actsAs = array('Bancha.BanchaRemotable');

    public $virtualFields = array(
        /*'repair_type_id' => "Material.repair_type_id",*/
        /*'name' => "Material.name"*/
    );
    
	public $belongsTo = array(
		'Casing' => array(
			'className' => 'Casing',
			'foreignKey' => 'casing_id',
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
		)
	);
}
