<?php
App::uses('AppModel', 'Model');
/**
 * Casing Model
 *
 * @property ManufacturerPlant $ManufacturerPlant
 * @property TireSize $TireSize
 * @property ManufacturerProductLine $ManufacturerProductLine
 * @property Customer $Customer
 * @property TreadDesign $TreadDesign
 * @property CasingLog $CasingLog
 * @property CasingRepair $CasingRepair
 * @property FinishedGood $FinishedGood
 */


class Casing extends AppModel
{

	public $name = 'Casing';

	public $actsAs = array('Bancha.BanchaRemotable','Containable','Linkable');



	/**
	 * Validation rules
	 *
	 * @var array
	 */


	public $validate = array(
		'manufacturer_plant_id'        => array(
			'numeric' => array(
				'rule'       => array('numeric'),
				//'message' => 'Your custom message here',
				'allowEmpty' => true,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'tire_size_id'                 => array(
			'numeric' => array(
				'rule'       => array('numeric'),
				//'message' => 'Your custom message here',
				'allowEmpty' => true,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'manufacturer_product_line_id' => array(
			'numeric' => array(
				'rule'       => array('numeric'),
				//'message' => 'Your custom message here',
				'allowEmpty' => true,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
//		'production_week' => array(
//			'numeric' => array(
//				//'rule' => array('numeric'),
//				//'message' => 'Your custom message here',
//				'allowEmpty' => true,
//				//'required' => false,
//				//'last' => false, // Stop validation after this rule
//				//'on' => 'create', // Limit validation to 'create' or 'update' operations
//			),
//		),
		'barcode'                      => array(
			'numeric' => array(
				'rule'       => array('numeric'),
				//'message' => 'Your custom message here',
				'allowEmpty' => true,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'customer_id'                  => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'customer_tag'                 => array(
			//'allow_empty' => array('allowEmpty' => true),
			'alphanumeric' => array(
				'rule'       => '/^[a-z0-9-_ ]+$/i',
				//'message' => 'Your custom message here',
				'allowEmpty' => true,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'rfid'                         => array(
			'numeric' => array(
				'rule'       => array('numeric'),
				//'message' => 'Your custom message here',
				'allowEmpty' => true,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'tread_design_id'              => array(
			'numeric' => array(
				'rule'       => array('numeric'),
				//'message' => 'Your custom message here',
				'allowEmpty' => true,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'grade'                        => array(
			'alphanumeric' => array(
				'rule'       => array('alphanumeric'), //'/^[a-z0-9-_ ]+$/i',
				//'message' => 'Your custom message here',
				'allowEmpty' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'length'       => array(
				'rule' => array('maxLength' => 2)
			)
		),
		'checking'                     => array(
			'alphanumeric' => array(
				'rule'       => array('alphanumeric'), //'/^[a-z0-9-_ ]+$/i',
				//'message' => 'Your custom message here',
				'allowEmpty' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'length'       => array(
				'rule' => array('maxLength' => 2)
			)
		),
		'previous_caps'                => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'remaining_tread'              => array(
			'decimal' => array(
				'rule' => array('decimal'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'tread_width'                  => array(
			'decimal' => array(
				'rule' => array('decimal'),
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
        ),
		'ManufacturerPlant'       => array(
			'className'  => 'ManufacturerPlant',
			'foreignKey' => 'manufacturer_plant_id',
			'conditions' => '',
			'fields'     => '',
			'order'      => ''
		),
		'ManufacturerProductLine' => array(
			'className'  => 'ManufacturerProductLine',
			'foreignKey' => 'manufacturer_product_line_id',
			'conditions' => '',
			'fields'     => '',
			'order'      => ''
		),
		'Customer'                => array(
			'className'  => 'Customer',
			'foreignKey' => 'customer_id',
			'conditions' => '',
			'fields'     => '',
			'order'      => ''
		),
		'TreadDesign'             => array(
			'className'  => 'TreadDesign',
			'foreignKey' => 'tread_design_id',
			'conditions' => '',
			'fields'     => '',
			'order'      => ''
		),
		'MoldType',
		'TreadWidth',
		'NrtCode',
		'TireSize' => array(
			'className'  => 'TireSize',
			'foreignKey' => 'tire_size_id',
			'conditions' => '',
			'fields'     => '',
			'order'      => ''
		),
		'Size' => array(
            'className'  => 'TireSize',
            'joinTable' => 'tire_sizes',
			'foreignKey' => 'size_id',
			'conditions' => '',
			'fields'     => '',
			'order'      => ''
		),
//        'TreadDesignTreadWidth' => array(
//            'className' => 'TreadDesignTreadWidth',
//            'joinTable' => 'tread_design_tread_widths',
//            'foreignKey' => false,
//            'conditions' => array(
//                'TreadDesignTreadWidth.tread_design_id' => 'Casing.tread_design_id',
//                'TreadDesignTreadWidth.tread_width_id' => 'Casing.tread_width_id'
//            )
//        )
	);

	/**
	 * hasOne associations
	 *
	 * @var array
	 */
    public $hasOne = array(
		'CoItem' => array(
			'className' => 'CoItem',
			'foreignKey' => 'id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
        'FinishedGood' => array(
            'className' => 'FinishedGood',
            'foreignKey' => 'id'
        )
    );

	/**
	 * hasMany associations
	 *
	 * @var array
	 */

	public $hasMany = array(
		'CasingLog'    => array(
			'className'    => 'CasingLog',
			'foreignKey'   => 'casing_id',
			'dependent'    => false,
			'conditions'   => '',
			'fields'       => '',
			'order'        => '',
			'limit'        => '',
			'offset'       => '',
			'exclusive'    => '',
			'finderQuery'  => '',
			'counterQuery' => ''
		),
		'CasingRepair' => array(
			'className'    => 'CasingRepair',
			'foreignKey'   => 'casing_id',
			'dependent'    => false,
			'conditions'   => '',
			'fields'       => '',
			'order'        => '',
			'limit'        => '',
			'offset'       => '',
			'exclusive'    => '',
			'finderQuery'  => '',
			'counterQuery' => ''
		),
		'FinishedGood' => array(
			'className'    => 'FinishedGood',
			'foreignKey'   => 'casing_id',
			'dependent'    => false,
			'conditions'   => '',
			'fields'       => '',
			'order'        => '',
			'limit'        => '',
			'offset'       => '',
			'exclusive'    => '',
			'finderQuery'  => '',
			'counterQuery' => ''
		)
	);

	/*
	 * For a given DOT code string, break out the various parts and look up the associated fields in the database
	 * @param string $dot_code DOT code
	 * @return array $result associated results
	 */
	public function parseDOT($dot_code)
	{
		// Remove any dashes from the DOT code and make sure everything is in uppercase
		$dot_code=strtoupper(str_replace("-","",$dot_code));

		$this->Behaviors->load('Containable');

		$result = array(
			'manufacturer_plant_id'        => null, // Manufacturer plant ID (if found)
			'tire_size_id'                 => null, // manufacturer_plant_sizes.id Tire Size ID (if found)
			'manufacturer_product_line_id' => null, // Product line ID (if found)
			'production_week'              => null, // Production week and Year (WWYY) (if found)
			'original'                     => $dot_code, // Original text to be parsed
			'plant_dot'                    => '', // Plant Two letter code (if found),
			'size_dot'                     => '', // Size Two letter code (if found)
			'product_line_dot'             => '', // Product line four letter code (if found)
			'manufacturer_id'              => null, // Manufacturer ID (if can find it from manufacturer_plant_id)
			'size_id'                      => null, // tire_size.id (if can look up based on tire_size_id
			'product_line_txt'             => '' // The Name of the product line (if can look up based on man..prod..line..id)
		);

		//First determine if we have production week/year
		if (is_numeric(substr($dot_code, -4))) {
			//found the production week/year, no lookup needed, continue to review the rest of the DOT code
			$result['production_week'] = substr($dot_code, -4);
			$dot_code                  = substr($dot_code, 0, -4);
		}

		// Check if there's at least the plant code, then pull it out
		if (strlen($dot_code) > 1) {
			$result['plant_dot'] = substr($dot_code, 0, 2);
			$dot_code            = substr($dot_code, 2);
		}

		// Check if there's another two characters for the size code, then pull it out
		if (strlen($dot_code) > 1) {
			$result['size_dot'] = substr($dot_code, 0, 2);
			$dot_code           = substr($dot_code, 2);
		}

		// Check if there's another four characters for the product line code, then pull it out
		if (strlen($dot_code) > 3) {
			$result['product_line_txt'] = substr($dot_code, 0, 4);
			$dot_code                   = substr($dot_code, 4);
		}
		//fyi: $dot code should be '' at this point, but I'm going to ignore it

		// Start looking up values in tables to see if they're available

		// Starting with Manufacturer Plant and Manufacturer
		if (strlen($result['plant_dot'])) {
			$plant = $this->ManufacturerPlant->find('first', array(
				'contain'    => array('Manufacturer'),
				'conditions' => array('ManufacturerPlant.Code' => $result['plant_dot']),
			));

			$result['manufacturer_plant_id'] = empty($plant['ManufacturerPlant']) ? NULL : $plant['ManufacturerPlant']['id'];
			$result['manufacturer_id']       = empty($plant['Manufacturer']) ? NULL : $plant['Manufacturer']['id'];
		}

		if ($result['manufacturer_plant_id'] && strlen($result['size_dot'])) {
			$manplant = ClassRegistry::init('ManufacturerPlantSize');
			$size = $manplant->find('first', array(
				'conditions' => array(
					'ManufacturerPlantSize.manufacturer_plant_id' => $result['manufacturer_plant_id'],
					'ManufacturerPlantSize.size_code'             => $result['size_dot']
				)
			));

			if (!empty($size)) {
				$result['size_id']      = $size['ManufacturerPlantSize']['tire_size_id'];
				$result['tire_size_id'] = $size['ManufacturerPlantSize']['id'];
			}

			if(strlen($result['product_line_txt'])) {
				$prodLines=ClassRegistry::init('ManufacturerProductLine');
				$prodLine = $prodLines->find('first', array(
					'conditions' => array(
						'ManufacturerProductLine.manufacturer_plant_id' => $result['manufacturer_plant_id'],
						'ManufacturerProductLine.dot_code' => $result['product_line_dot']
					)
				));
				if(!empty($prodLine)) {
					$result['manufacturer_product_line_id'] = $prodLine['ManufacturerProductLine']['id'];
					$result['product_line_txt'] = $prodLine['ManufacturerProductLine']['name'];
				}
			}
		}
		return $result;
	}



	/**
	 *
	 * @param  Integer $tire_size_id              2 digit manufacturer_plant_sizes.tire_size_id
	 * @return String                       The two digit manufacturer_plant_sizes.size_code
	 */
	public function findTireSizeCode($tire_size_id, $manufacturer_plant_id)
	{
		if ($manufacturer_plant_id === null) {
			return null;
		}

		if (!isset($this->ManufacturerPlant)) {
			$this->bindModel(array(
				'belongsTo' => array('ManufacturerPlant'),
			));
		}
		if (!isset($this->ManufacturerPlant->ManufacturerPlantSize)) {
			$this->ManufacturerPlant->bindModel(array(
				'hasMany' => array('ManufacturerPlantSize')
			));
		}

		// find the tire size_code
		$manufacturer_plant_size = $this->ManufacturerPlant->ManufacturerPlantSize->find('first', array(
			'conditions' => array(
				'ManufacturerPlantSize.tire_size_id'          => $tire_size_id,
				'ManufacturerPlantSize.manufacturer_plant_id' => $manufacturer_plant_id,
			)));

		if (count($manufacturer_plant_size) > 0) {
			if (strlen($manufacturer_plant_size['ManufacturerPlantSize']['size_code']) > 0) {
				$size_code = $manufacturer_plant_size['ManufacturerPlantSize']['size_code'];
			} else {
				$size_code = null;
			}
			return $size_code;
		} else {
			return null;
		}
	}

	/*
	 * Returns the age of the current casing in weeks
	 * @param int $prodweek Production week in the form of WWYY
	 * @return int Age of current casing in weeks
	 */
	public function getAge($production_week)
	{
		$year           = substr($production_week, -2);
		$ww             = substr($production_week, 0, -2);
		$tireProduction = date_create("20" . $year . "W" . $ww);
		$now            = date_create();
		$diff           = date_diff($now, $tireProduction);
		return floor($diff->days / 7);
	}
}