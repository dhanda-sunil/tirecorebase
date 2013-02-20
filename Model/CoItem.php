<?php
App::uses('AppModel', 'Model');
/**
 * CoItem Model
 *
 * @property Co $Co
 * @property CustomerInvoice $CustomerInvoice
 * @property LineItem $LineItem
 * @property LineSuffix $LineSuffix
 */
class CoItem extends AppModel {
    
    public $actsAs = array('Bancha.BanchaRemotable','Containable','Linkable');

    public $belongsTo = array(
        'Co' => array(
			'className' => 'Co',
			'foreignKey' => 'co_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
        'CoItemType' => array(
			'className' => 'CoItemType',
			'foreignKey' => 'co_item_type_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
        'Casing' => array(
			'className' => 'Casing',
			'foreignKey' => 'casing_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
        'CoItemStatus' => array(
			'className' => 'CoItemStatus',
			'foreignKey' => 'co_item_status_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
    );
    
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'line_number';

	/*
	 * Duplicate line item
	 */
	public function duplicate($id) {
		$original = $this->findById($id);
		$original["CoItem"]['line_suffix'] = $this->_incrementSuffix($original["CoItem"]['line_suffix']);
		unset($original['CoItem']['id']);
		$this->create();
		$this->save($original);
		return $this->data;

	}

	/**
	 * Increment Line Item Suffix
	 */
	protected function _incrementSuffix($currentSuffix) {
		return $currentSuffix == '' ? 'A' : $currentSuffix++;
	}

    public function getLineItems($params=array()){
        
        // unbind useless model associations
        $this->Casing->unbindModelAll();
        $this->CoItemType->unbindModelAll();
        $this->CoItemStatus->unbindModelAll();
        $this->Co->unbindModelAll();
        $this->Casing->Customer->unbindModelAll();
        $this->Casing->TireSize->unbindModelAll();
        $this->Casing->Size->unbindModelAll();
        $this->Casing->TreadWidth->unbindModelAll();
        $this->Casing->Manufacturer->unbindModelAll();
        $this->Casing->TreadDesign->unbindModelAll();
        
        // rebind required model associations
        $this->Casing->bindModel(array(
            'belongsTo' => array(
                'Customer',
                'TireSize',
                'Manufacturer',
                'ManufacturerPlant',
                'TreadWidth',
                'Size',
                'TreadDesign' => array(
                    'fields' => 'tread_abb,name'
                )
            ),
            'hasOne' => array(
                'FinishedGood'
            )
        ));
        
        return $this->find('all',$params);
    }
    
	/**
 * Validation rules
 *
 * @var array
 */
//	public $validate = array(
//		'co_id' => array(
//			'numeric' => array(
//				'rule' => array('numeric'),
//				//'message' => 'Your custom message here',
//				//'allowEmpty' => false,
//				//'required' => false,
//				//'last' => false, // Stop validation after this rule
//				//'on' => 'create', // Limit validation to 'create' or 'update' operations
//			),
//		),
//		'line_number' => array(
//			'numeric' => array(
//				'rule' => array('numeric'),
//				//'message' => 'Your custom message here',
//				//'allowEmpty' => false,
//				//'required' => false,
//				//'last' => false, // Stop validation after this rule
//				//'on' => 'create', // Limit validation to 'create' or 'update' operations
//			),
//		),
//		'line_suffix' => array(
//			'alphaOrNothing' => array(
//				// Either empty (''), or
//				'rule' => '/^[A-Z]*$/',
//				//'message' => 'Your custom message here',
//				//'allowEmpty' => false,
//				//'required' => false,
//				//'last' => false, // Stop validation after this rule
//				//'on' => 'create', // Limit validation to 'create' or 'update' operations
//			),
//		),
//		'modified' => array(
//			'datetime' => array(
//				'rule' => array('datetime'),
//				//'message' => 'Your custom message here',
//				//'allowEmpty' => false,
//				//'required' => false,
//				//'last' => false, // Stop validation after this rule
//				//'on' => 'create', // Limit validation to 'create' or 'update' operations
//			),
//		),
//		'modified_by' => array(
//			'numeric' => array(
//				'rule' => array('numeric'),
//				//'message' => 'Your custom message here',
//				//'allowEmpty' => false,
//				//'required' => false,
//				//'last' => false, // Stop validation after this rule
//				//'on' => 'create', // Limit validation to 'create' or 'update' operations
//			),
//		),
//		'created' => array(
//			'datetime' => array(
//				'rule' => array('datetime'),
//				//'message' => 'Your custom message here',
//				//'allowEmpty' => false,
//				//'required' => false,
//				//'last' => false, // Stop validation after this rule
//				//'on' => 'create', // Limit validation to 'create' or 'update' operations
//			),
//		),
//		'created_by' => array(
//			'numeric' => array(
//				'rule' => array('numeric'),
//				//'message' => 'Your custom message here',
//				//'allowEmpty' => false,
//				//'required' => false,
//				//'last' => false, // Stop validation after this rule
//				//'on' => 'create', // Limit validation to 'create' or 'update' operations
//			),
//		),
//	);
}
