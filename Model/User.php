<?php
App::uses('AppModel', 'Model');
App::uses('AuthComponent', 'Controller/Component');

/**
 * User Model
 *
 */
class User extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'username';

	public $actsAs = array(
		'Bancha.BanchaRemotable',
		'Acl' => array('type' => 'requester'),
        'Containable',
        'Linkable'
	);

	public $validate = array(
		'username' => array(
			'notempty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Please enter a username',
				'allowEmpty' => false,
			),
			'isUnique' => array(
				'rule' => array('isUnique'),
				'message' => 'Username is already in use',
			),
		),
		'active' => array(
			'boolean' => array(
				'rule' => array('boolean'),
				'message' => 'Please set user to active or inactive',
				'allowEmpty' => false,
			),
		),
		'first_name' => array(
			'notempty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Please enter a first name',
				'allowEmpty' => false,
			),
		),
		'last_name' => array(
			'notempty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Please enter a last name',
				'allowEmpty' => false,
			),
		),
		'password' => array(
			'notempty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Please enter a password',
				'allowEmpty' => false,
                'on' => 'create',
			),
		),
	);
    
	/*
	 * For Acl
	 */
	public function parentNode() {
		if (!$this->id && empty($this->data)) {
			return null;
		}
		if (isset($this->data['User']['user_group_id'])) {
			$groupId = $this->data['User']['user_group_id'];
		} else {
			$groupId = $this->field('user_group_id');
		}
		if(!$groupId) {
			return null;
		} else {
			return array('UserGroup' => array('id' => $groupId));
		}
	}

	/*
* Hash password before saving it
*/
	public function beforeSave($options = array()) {
		if(!empty($this->data['User']['password'])){
			$this->data['User']['password'] = AuthComponent::password($this->data['User']['password']);
        }
        else{
            unset($this->data['User']['password']);
        }
		return true;
	}


	public $belongsTo = array(
        'Checkpoint',
        'Company',
        'Location',
	    'Language',
        'UserGroup'
    );
}
