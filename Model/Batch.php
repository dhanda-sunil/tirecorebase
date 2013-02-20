<?php
App::uses('AppModel', 'Model');
/**
 * Batch Model
 *
 */
class Batch extends AppModel
{

	/**
	 * Display field
	 *
	 * @var string
	 */
	public $displayField = 'created';

	/**
	 * afterFind method
	 *
	 * json_decode data
	 *
	 */
	public function afterFind($results, $primary = false)
	{
		foreach ($results as $key => $val) {
			if (isset($val['Batch']['data'])) {
				$results[$key]['Batch']['data'] = json_decode($val['Batch']['data']);
			}
			elseif ($primary=== false && $key ==='data') {
				$results[$key]= json_decode($val);
			}
		}

		return $results;
	}

	/**
	 * beforeSave method
	 *
	 * Strip delimiting characters off of beginning and end of data and json_encode data
	 */
	public function beforeSave($options = array()) {
		if(!empty($this->data['Batch']['data'])) {
			$this->data['Batch']['data']= json_encode($this->parseData(trim($this->data['Batch']['data'],"|:\n")));
		}
		return true;
	}

	/**
	 * parseData method
	 *
	 * Take data from data field, expand pipe separated and colon separated data
	 *
	 * @param string $data
	 * @return array
	 */
	protected function parseData($data)
	{
		$separated = explode("|", $data);
		foreach ($separated as $key => $val) {
			if (!empty($val) && strstr($val,":") !== false) {
				$separated[$key] = explode(":", $val);
			}
		}
		return $separated;
	}
    
    /**
     * retrieves an inventory batch and sums totals
     * @param integer $id
     * @return array 
     */
    public function getCalculatedInventoryBatch($id){
        $batch = array();
        $data = $this->find('all',array('conditions'=>array('id'=>$id)));
        // loop through returned data
        foreach($data as $i){
            // foreach batched data
            foreach($i['Batch']['data'] as $j){
                // create index using the sku
                if( !isset($batch[$j[0]]) ){
                    $batch[$j[0]] = array(
                        'sku' => $j[0],
                        'units' => 1,
                        'weight' => $j[1]
                    );
                }
                // add to existing sku
                else{
                    $batch[$j[0]]['sku'] = $j[0];
                    $batch[$j[0]]['units']+= 1;
                    $batch[$j[0]]['weight']+= $j[1];
                }
            }
        }
        
        return $batch;
    }
}
