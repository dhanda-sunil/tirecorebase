<?php
App::uses('AppModel', 'Model');
/**
 * TireSize Model
 *
 * @property Casing $Casing
 * @property MoldType $MoldType
 * @property BuffSpec $BuffSpec
 */
class TireSize extends AppModel {

    public $actsAs = array('Bancha.BanchaRemotable');
    public $displayField = 'name';
	//The Associations below have been created with all possible keys, those that are not needed can be removed


    /**
     * generates the display name for the given $tire_size_id
     * @param Integer $tire_size_id the TireSize.id
     * @return String a name in the format {size_mm (from tread_widths table)}/{aspect_ratio}{construction_code}{diameter}
     */
    public function getDisplayName($tire_size_id) {

    	// associate with needed models
    	$this->bindModel(array('belongsTo'=>array('TreadWidth')));
		
    	$data = $this->find('first', array(
		'conditions' => array(
				'TireSize.id' => $tire_size_id
				),
    		'contain' => array(
    			'TireSize.aspect_ratio',
    			'TireSize.diameter',
    			'TreadWidth.size_mm',
    			)
    		));
			
		/***** construction_code does not exist *****/
		//return $data['TreadWidth']['size_mm'] . '/' . $data['TireSize']['aspect_ratio'] . $data['TireSize']['construction_code'] . $data['TireSize']['diameter'];

    	return $data['TreadWidth']['size_mm'] . '/' . $data['TireSize']['aspect_ratio']. $data['TireSize']['diameter'];
    }
	
	/**
     * generates the display name for the given $tire_size_id
     * @param Integer $tire_size_id the TireSize.id
     * @return String a name in the format {size_mm (from tread_widths table)}/{aspect_ratio}{construction_code}{diameter}
     */
    public function getGridDisplayName($tire_size_id) {

    	// associate with needed models
    	$this->bindModel(array('belongsTo'=>array('TreadWidth')));
		
    	$data = $this->find('first', array(
		'conditions' => array(
				'TireSize.id' => $tire_size_id
				),
    		'contain' => array(
    			'TireSize.aspect_ratio',
    			'TireSize.diameter',
    			'TreadWidth.size_mm',
    			)
    		));

		if (isset($data['TireSize'])) {
    		return $data['TireSize']['name'];
		} else {
			return array();
		}
    }

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