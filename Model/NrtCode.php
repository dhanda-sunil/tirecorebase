<?php
App::uses('AppModel', 'Model');
/**
 * NrtCode Model
 *
 */
class NrtCode extends AppModel {

	public $displayField = 'name';
    public $actsAs = array('Bancha.BanchaRemotable');

	public $belongsTo = array('NrtCodeCategory');
}
