<?php
App::uses('AppModel', 'Model');
/**
 * RepairEstimate Model
 *
 */
class RepairEstimate extends AppModel {

    public $actsAs = array('Bancha.BanchaRemotable');
    
    public $virtualFields = array(
        /*'repair_type_name' => "RepairType.name",*/
    );
    
	public $belongsTo = array(
		'Casing' => array(
			'className' => 'Casing',
			'foreignKey' => 'casing_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'RepairType' => array(
			'className' => 'RepairType',
			'foreignKey' => 'repair_type_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
