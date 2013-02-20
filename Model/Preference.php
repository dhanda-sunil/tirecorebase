<?php
App::uses('AppModel', 'Model');
/**
 * Preference Model
 *
 */
class Preference extends AppModel {

	public $actsAs = array('Bancha.BanchaRemotable');

	/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';

	/*
	 *
	 *
 * Get General Preferences
	 *
	 * @todo put this in the afterFind method
 * @return array|false
 */
	public function getPreferences($type = null, $key = null, $name = null) {
		$conditions = array();
		if(!empty($type))
			$conditions['type'] = $type;
		if(!empty($key))
			$conditions['key_id'] = $key;
		if(!empty($name))
			$conditions['name'] = $name;
		$preferences = $this->find('all', array(
			'conditions' => $conditions
		));

		if($preferences) {
			foreach($preferences['Preference'] as $key => $pref) {
				$preferences['Preference'][$key]['value'] = unserialize($preferences['Preference'][$key]['value']);
		}
		}

		return $preferences;
	}

	/*
	 * Serialize save values
	 * @todo Put this in the beforeSave
	 */
	public function savePreference($value, $type, $key_id = null, $name = null) {
		$toSave = array('Preference' => array(
			'type' => $type,
			'key_id' => $key_id,
			'name' => $name,
			'value' => serialize($value)

		));

		$this->create();
		return $this->save($toSave);
	}

}
