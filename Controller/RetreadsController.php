<?php
App::uses('AppController', 'Controller');
/**
 * AccountTypes Controller
 *
 */
class RetreadsController extends AppController {
    
    public $uses = array('CasingLog','Checkpoint');
    
    public function sidebar_action(){
        
    }
    
    public function index(){
        
    }
    
    public function productivity_report(){
        
        // set default date range to current month if user does not define one
        $start_date = isset($this->data['start_date']) ? date('Y-m-d',strtotime($this->data['start_date'])) : date('Y-m-d',  mktime(12, 0, 0, date('m'), 1, date('Y')));
        $end_date = isset($this->data['end_date']) ? date('Y-m-d',strtotime($this->data['end_date'])) : date('Y-m-d',  mktime(12, 0, 0, date('m')+1, 0, date('Y')));
        
        $condition = "WHERE (casing_logs.created_date BETWEEN '$start_date' AND '$end_date' ) AND ";
        
        if( isset($this->data['checkpoint_id']) && $this->data['checkpoint_id'] > 0 ){
            $condition.= "casing_logs.checkpoint_id = ".$this->data['checkpoint_id']." AND ";
        }
        
        if( !empty($condition) ){
            $condition = SUBSTR($condition,0,-4);
        }
        
        $sql = "SELECT 
                    User.first_name, User.last_name, casing_logs.* 
                FROM
                    casing_logs 
                JOIN 
                    users as User on User.id = casing_logs.user_id 
                JOIN
                    checkpoints as Checkpoint on Checkpoint.id = casing_logs.checkpoint_id 
                $condition
                ORDER BY 
                    casing_logs.user_id ASC, casing_logs.id ASC 
                ";

        $result = $this->CasingLog->query($sql);

        $report = array();
        
        // sum totals per user_id
        foreach($result as $x => $i){
            
            $next = false;
            
            if( isset($result[($x+1)]) ){
                $next = $result[($x+1)];
            }
            
            /*
             * current and next record must:
             * - equal same user_id
             * - be on the same checkpoint
             * - have same casing_id
             * - next must NOT be a scanned event
             * - current must be a scanned event
             */
            
            if($next && $next['casing_logs']['user_id'] == $i['casing_logs']['user_id'] && 
               $next['casing_logs']['checkpoint_id'] == $i['casing_logs']['checkpoint_id'] && 
               $next['casing_logs']['casing_id'] == $i['casing_logs']['casing_id'] &&
               $next['casing_logs']['casing_log_event_id'] != 1 && $i['casing_logs']['casing_log_event_id'] == 1){
                
                $start_time = strtotime($i['casing_logs']['created_date'].' '.$i['casing_logs']['created_time']);
                $end_time = strtotime($next['casing_logs']['created_date'].' '.$next['casing_logs']['created_time']);
                // determine elapsed time in seconds
                $elapsed_time = $end_time - $start_time;
                
                //echo $i['casing_logs']['id'].": ".$next['casing_logs']['created_time']." - ".$i['casing_logs']['created_time'].": <br/>";
                //echo $i['casing_logs']['id'].": $end_time - $start_time = $elapsed_time<br/>";
                
                $user_id = $i['casing_logs']['user_id'];
                
                if( !isset($report[$user_id]) ){

                    $report[$user_id] = array(
                        'user_id' => $user_id,
                        'first_name' => $i['User']['first_name'],
                        'last_name' => $i['User']['last_name'],
                        'total_time' => $elapsed_time,
                        'casing_count' => 1,
                    );
                }
                else{
                    $report[$user_id]['total_time']+= $elapsed_time;
                    $report[$user_id]['casing_count']+= 1;
                }
            }
        }
        
        // determine average time in seconds
        foreach($report as $x => $i){
            if($i['casing_count'] !=0 && $i['total_time'] != 0){
                $report[$x]['average_time'] = $i['total_time'] / $i['casing_count'];
            }
        }
        
        if( $this->RequestHandler->responseType() == 'json' ){
            $values = array();
            foreach($report as $x => $i){
                
                $tmp = array();
                
                switch($this->data['graph']){
                    case 'total_time':
                        $tmp['value'] = $i['total_time'] / 60;
                        $tmp['label'] = $i['first_name'].' '.$i['last_name']. ' ('.date('H:i:s',mktime(0, 0, $i['total_time'])).')';
                        break;
                    case 'casings':
                        $tmp['value'] = $i['casing_count'];
                        $tmp['label'] = $i['first_name'].' '.$i['last_name'];
                        break;
                    default:
                    case 'average_time':
                        $tmp['value'] = $i['average_time'] / 60;
                        $tmp['label'] = $i['first_name'].' '.$i['last_name']. ' ('.date('H:i:s',mktime(0, 0, $i['average_time'])).')';
                        break;
                }
                $values[] = $tmp;
            }
            
            $graph = array(array(
                'key' => 'Report',
                'values' => $values
            ));            
            
            $this->set('graph',$graph);
            $this->set('_serialize','graph');
        }
        else{
            $this->set('report',$report);
            $this->set('checkpoints',$this->Checkpoint->find('list'));
        }
    }
}