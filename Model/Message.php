<?php
App::uses('AppModel', 'Model');
/**
 * Message Model
 *
 * @property User $User
 * @property CreatedUser $CreatedUser
 */
class Message extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'subject';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'CreatedUser' => array(
			'className' => 'User',
			'foreignKey' => 'created_user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
