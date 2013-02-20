<?php
App::uses('AppModel', 'Model');
/**
 * ManufacturersPlant Model
 *
 * @property Manufacturer $Manufacturer
 */
class ManufacturerPlant extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'code';
    public $actsAs = array('Bancha.BanchaRemotable');

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'manufacturer_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'code' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Manufacturer' => array(
			'className' => 'Manufacturer',
			'foreignKey' => 'manufacturer_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	/**
	 * Get's the correct display name for the related TireSize
	 * 
	 * @param  Integer $manufaturer_plant_id The ManufacturerPlant id
	 * @param  Integer $tire_size_code       The ManufacturerPlantSize.size_code
	 * @return String                        returns the TireSize display name
	 */
	public function getTireSizeDisplayName($manufaturer_plant_id, $tire_size_code) {
		if(!isset($this->ManufacturerPlantSize)) {
			$this->bindModel(array('hasMany'=>array('ManufacturerPlantSize')));
		}
		if(!isset($this->ManufacturerPlantSize->TireSize)) {
			$this->ManufacturerPlantSize->bindModel(array('belongsTo'=>array('TireSize')));
		}

   		$plantSize = $this->ManufacturerPlantSize->find('first', array(
			'conditions' => array(
				'manufacturer_plant_id' => $manufaturer_plant_id,
				'size_code' => $tire_size_code
				)));

   		return $this->ManufacturerPlantSize->TireSize->getDisplayName($plantSize['ManufacturerPlantSize']['tire_size_id']);
	}
	
	/**
	 * Get's the size_code for a tire based on manufacturer_plant_id and tire_size_id
	 * 
	 * @param  Integer $manufaturer_plant_id	manufacturer_plant_sizes.manufacturer_plant_id
	 * @param  Integer $tire_size_id	manufacturer_plant_sizes.tire_size_id
	 * @return String	returns manufacturer_plant_sizes.size_code
	 */
	public function getTireSizeCode($manufaturer_plant_id, $tire_size_id) {
		if(!isset($this->ManufacturerPlantSize)) {
			$this->bindModel(array('hasMany'=>array('ManufacturerPlantSize')));
		}
		if(!isset($this->ManufacturerPlantSize->TireSize)) {
			$this->ManufacturerPlantSize->bindModel(array('belongsTo'=>array('TireSize')));
		}
   		$plantSize = $this->ManufacturerPlantSize->find('first', array(
			'conditions' => array(
			'manufacturer_plant_id' => $manufaturer_plant_id,
			'tire_size_id' => $tire_size_id
		)));
        if(!$plantSize){
            return 0;
        }
		return $plantSize['ManufacturerPlantSize']['size_code'];
	}
}