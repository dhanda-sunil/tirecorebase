<?php
App::uses('AppModel', 'Model');
/**
 * BuffSpec Model
 *
 */
class BuffSpec extends AppModel {
    
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';
    public $actsAs = array('Bancha.BanchaRemotable');
    
    public $belongsTo = array(
        'TireSize' => array(
			'className' => 'TireSize',
			'foreignKey' => 'tire_size_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
        ),
        'MoldType' => array(
			'className' => 'MoldType',
			'foreignKey' => 'mold_type_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
        ),
        'BeadPlate' => array(
			'className' => 'TireSize',
			'foreignKey' => 'bead_plate_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
        ),
	    'RetreadMethod' => array(
		    'className' => 'RetreadMethod',
		    'foreignKey' => 'retread_method_id'
	    )
    );
}
