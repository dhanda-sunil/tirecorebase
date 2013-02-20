<?php
App::uses('AppModel', 'Model');
/**
 * TreadWidth Model
 *
 */
class TreadWidth extends AppModel
{

	/**
	 * Display field
	 *
	 * @var string
	 */
	public $displayField = 'size_standard';

	public $actsAs = array('Bancha.BanchaRemotable');

	public $virtualFields = array(
		'tread_width' => "CONCAT(TreadWidth.size_standard, TreadWidth.Suffix, '\" ', TreadWidth.size_mm, 'mm')",
		'preferred'   => 0
	);

	public $hasMany = array(
		'TreadDesignTreadWidth'
	);

//    public $hasAndBelongsToMany = array('TreadDesign');

	/*
	 * Given a size string, find the correct ID for that size
	 * @param string size Size string, e.g. 85N, 320, 140, etc.
	 */
	public function findTreadWidth($size)
	{

		preg_match("/([a-z])/i", $size, $suffixMatch);
		preg_match("/([0-9\.]+)/", $size, $numericMatch);
		$numericOptions = array();
		if (empty($numericMatch[1])) {
			return false;
		}
		$queryOptions = array('fields' => array('*'));
		$fields = array();
		$numericPart = $numericMatch[1];
		if ((int)$numericPart < 170) {
//			$numericPart = preg_replace('/[0\. ]/', '', $numericPart);
//			$queryOptions['group'] = array("TreadWidth.id HAVING standard_trimmed = {$numericPart}");
//			$queryOptions['fields'][] = "TRIM(BOTH '0' FROM TRIM(BOTH '.' FROM TRIM(BOTH '0' FROM CAST((size_standard*100) AS CHAR)))) AS standard_trimmed";
			$queryOptions['conditions'] = array('size_standard' => array( (int) $numericPart, (int) $numericPart/10));
		} else { // Must be in mm
			$queryOptions['conditions'] = array('size_mm' => $size);

		}
		for ($i = 0; $i <= strlen($numericMatch[1]); $i++) {
			$num              = (float)substr_replace($numericMatch[1], '.', $i, 0);
			$numericOptions[] = round($num, 2);
		}
//		debug('');
//		debug('New Size');
//		debug($size);
//		debug($numericMatch);
//		debug($suffixMatch);
//		debug($numericOptions);

		if (isset($suffixMatch[1]))
			$queryOptions['conditions']['suffix'] = $suffixMatch[1];

		$result = $this->find('first', $queryOptions);
//		if (!$result) {
//			debug($size);
//			$dbo  = $this->getDatasource();
//			$logs = $dbo->getLog();
//			debug(end($logs['log']));
//		} else {
//			debug($result);
//			die;
//		}
		return $result;

	}
}
