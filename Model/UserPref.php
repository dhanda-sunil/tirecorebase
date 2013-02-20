<?php
App::uses('AppModel', 'Model');
/**
 * UserPref Model
 *
 * @property User $User
 */
class UserPref extends AppModel {


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
		)
	);
    
    public function afterFind($results){
        
        if($results){
            
            if(isset($results['UserPref']['value'])){
                $decoded = json_decode($results['UserPref']['value']);
                if($decoded != FALSE && $decoded != NULL){
                    $results['UserPref']['value'] = $decoded;
                }
            }
            else{
                foreach($results as $x => $i){
                    $decoded = json_decode($i['UserPref']['value']);
                    if($decoded != FALSE && $decoded != NULL){
                        $results[$x]['UserPref']['value'] = $decoded;
                    }
                }
            }
        }
        return $results;
    }
}
