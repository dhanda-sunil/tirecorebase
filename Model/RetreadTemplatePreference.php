<?php
App::uses('AppModel', 'Model');
/**
 * RetreadTemplatePreference Model
 *
 * @property RetreadPreference $RetreadPreference
 */
class RetreadTemplatePreference extends AppModel {

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'RetreadTemplate' => array(
			'className' => 'RetreadTemplate',
			'foreignKey' => 'retread_template_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'TireSize' => array(
			'className' => 'TireSize',
			'foreignKey' => 'tire_size_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		) 
    );
}
