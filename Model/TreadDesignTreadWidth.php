<?php
App::uses('AppModel', 'Model');
/**
 * TreadDesignsTreadWidth Model
 *
 * @property TreadDesign $TreadDesign
 * @property TreadWidth $TreadWidth
 */
class TreadDesignTreadWidth extends AppModel
{

	public $actsAs = array('Bancha.BanchaRemotable');

	public $belongsTo = array(
		'TreadDesign' => array(
			'className'  => 'TreadDesign',
			'foreignKey' => 'tread_design_id',
			'conditions' => '',
			'fields'     => '',
			'order'      => ''
		),
		'TreadWidth'  => array(
			'className'  => 'TreadWidth',
			'foreignKey' => 'tread_width_id',
			'conditions' => '',
			'fields'     => '',
			'order'      => ''
		)
	);
}
