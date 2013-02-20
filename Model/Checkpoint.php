<?php
App::uses('AppModel', 'Model');
/**
 * Checkpoint Model
 *
 */
class Checkpoint extends AppModel {

    public $actsAs = array('Bancha.BanchaRemotable');
	public $displayField = 'name';

}
