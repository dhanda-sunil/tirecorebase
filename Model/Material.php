<?php
App::uses('AppModel', 'Model');
/**
 * Material Model
 *
 */
class Material extends AppModel {

    public $actsAs = array('Bancha.BanchaRemotable');
	public $displayField = 'name';
	public $belongsTo = array(
		'VendorItem',
		'TreadWidth',
        'RepairType',
        'TreadDesign',
		'Uom',
		'MaterialType'
	);
//    public $hasMany = array(
//        'MaterialLog'
//    );
    
    public function inventoryReport($start=null,$end=null){
        
        //App::uses('Sanitize', 'Utility');
        
        $start = (!$start) ? mktime(12,0,0,date('m'),1,date('Y')) : strtotime($start);
        $end = (!$end) ? mktime(12,0,0,date('m')+1,0,date('Y')) : strtotime($end);
        
        $start = date('Y-m-d',$start);
        $end = date('Y-m-d',$end);
        
        $sql = "SELECT 
                    Material.*, TreadWidth.size_standard, TreadWidth.size_mm, TreadWidth.suffix, TreadWidth.size,
                    (SELECT units FROM material_logs WHERE material_logs.material_id = Material.id AND ( (created_date BETWEEN '$start' AND '$end') OR created_date < '$start') ORDER BY id ASC LIMIT 1) as start_units, 
                    (SELECT units FROM material_logs WHERE material_logs.material_id = Material.id AND ( (created_date BETWEEN '$start' AND '$end') OR created_date < '$start') ORDER BY id DESC LIMIT 1) as end_units,
                    (SELECT weight FROM material_logs WHERE material_logs.material_id = Material.id AND ( (created_date BETWEEN '$start' AND '$end') OR created_date < '$start') ORDER BY id ASC LIMIT 1) as start_weight, 
                    (SELECT weight FROM material_logs WHERE material_logs.material_id = Material.id AND ( (created_date BETWEEN '$start' AND '$end') OR created_date < '$start') ORDER BY id DESC LIMIT 1) as end_weight
                FROM
                    materials as `Material`
                LEFT JOIN 
                    tread_widths as `TreadWidth` on Material.tread_width_id = TreadWidth.id";
        //echo $sql;
        return $this->query($sql);
    }
    
    
/**
 * adds a material and returns array(success=>bool,'error'=>array(str))
 * @param int $material_id
 * @param int $new_qty
 * @param int $new_weight
 * @param int $user_id
 * @return array
 */
    public function addInventory($material_id,$new_qty,$new_weight,$user_id){
        $this->begin();
        $this->id = $material_id;
        $material = $this->read();
        
        $qty_changed = $weight_changed = 0;
        
        if($new_qty != null){
            $qty_changed = $new_qty - $material['Material']['units'];
        }
        if($new_weight != null){
             $weight_changed = $new_weight - $material['Material']['weight'];
        }
        
        if( !$material || !$this->modify($material_id, $qty_changed, $weight_changed, 'add', $user_id) ){
            $this->rollback();
            return array('success' => 0, 'error' => array('Error adjusting material #'.$material_id));
        }
        // commit transaction
        if( $this->commit() ){
            return array('success' => 1);
        }
    }
    
/**
 * Adjusts a material and returns array(success=>bool,'error'=>array(str))
 * @param int $material_id
 * @param int $new_qty
 * @param int $new_weight
 * @param int $user_id
 * @return array
 */
    public function adjustInventory($material_id,$new_qty,$new_weight,$user_id){
        $this->begin();
        $this->id = $material_id;
        $material = $this->read();
        
        $qty_changed = $weight_changed = 0;
        
        if($new_qty != null){
            $qty_changed = $new_qty - $material['Material']['units'];
        }
        if($new_weight != null){
             $weight_changed = $new_weight - $material['Material']['weight'];
        }
       
        if( !$material || !$this->modify($material_id, $qty_changed, $weight_changed, 'adjust', $user_id) ){
            $this->rollback();
            return array('success' => 0, 'error' => array('Error adjusting material #'.$material_id));
        }
        // commit transaction
        if( $this->commit() ){
            return array('success' => 1);
        }
    }
    
/**
 * Remove materials from shopfloor
 * @param object $casingObj
 * @param int $user_id
 * @return array
 */
    public function removeInventory($casingObj,$user_id){
        
        App::uses('TreadDesignTreadWidth','Model');
        $error = array();
        $casing = $casingObj->read();
        $casing['TreadDesign']['image'] = '';
        
        $TreadDesignTreadWidth = new TreadDesignTreadWidth();
        
        $treadWidthDesign = $TreadDesignTreadWidth->find('first',array(
            'conditions' => array(
                'tread_design_id' => $casing['Casing']['tread_design_id'],'tread_width_id' => $casing['Casing']['tread_width_id']
            )
        ));

        $roll_weight = $treadWidthDesign['TreadDesignTreadWidth']['roll_weight'];
        $feet = $casing['TireSize']['buffed_circumference'] / 12 ;
        
        if( !$roll_weight || $roll_weight == 0 ){
            $error[] = array('Roll weight is not set for this tread.');
        }
        if( !$feet ){
            $error[] = array('Buff circumference is not set');
        }
        if(count($error)){
            return array('success'=>0,'error'=>$error);
        }
        
        // weight = feet used * weight per foot
        $weight = $feet * $roll_weight;

        // how much mold was used?
        if( $casing['TreadDesign']['cure_type'] == 'mold' ){
            //@todo need more information
        }
        // how much tread was used?
        else if( $casing['TreadDesign']['cure_type'] == 'pre' ){
            $units = $weight / $roll_weight;
        }
        else{
            return array('success'=>0,'error' => 'Cure type is not set for this this tread.');
        }
        
        // start transaction
        $this->begin();
        
        // modify inventory for materials in Casin g.CasingRepair
        foreach($casing['CasingRepair'] as $i){
            if( !$this->modify($i['material_id'], -$i['quantity'], 0, 'remove', $user_id) ){
                $this->rollback();
                return array('success' => 0, 'error' => array('Error adjusting material #'.$i['material_id']));
            }
        }
        
        // modify inventory for cure type
        $material = $this->find('first',array(
            'conditions' => array(
                'Material.tread_width_id' => $casing['Casing']['tread_width_id'], 'Material.tread_design_id' => $casing['Casing']['tread_design_id']
            )
        ));

        if( !$material || !$this->modify($material['Material']['id'], -$units, -$weight, 'remove', $user_id) ){
            $this->rollback();
            return array('success' => 0, 'error' => array('Error adjusting tread #'.$i['material_id']));
        }
        // commit transaction
        if( $this->commit() ){
            return array('success' => 1);
        }
    }
    
/**
 * modifies inventory and logs to material_logs
 * @param int $material_id
 * @param int $unit_change
 * @param int $weight_change
 * @param str $event
 * @param int $user_id
 * @return bool
 */
    private function modify($material_id,$unit_change,$weight_change,$event,$user_id){
        
        App::uses('MaterialLog','Model');
        $MaterialLog = new MaterialLog();

        $this->id = $material_id;
        
        $material = $this->read();
        // set new inventory values 
        $units = $material['Material']['units'] + $unit_change;
        $weight = $material['Material']['weight'] + $weight_change;
        // save new inventory
        $result = $this->updateAll(array(
                'Material.units' => $units, 
                'Material.weight' => $weight, 
            ), 
            array('Material.id' => $material_id)
        );
        
        // log inventory change
        if($result){
            $MaterialLog->create();
            
            $result = $MaterialLog->save(array(
                'MaterialLog' => array(
                    'material_id' => $material_id,
                    'unit_change' => $unit_change,
                    'units' => $units,
                    'weight_change' => $weight_change,
                    'weight' => $weight,
                    'created_date' => date('Y-m-d'),
                    'created_time' => date('H:i:s'),
                    'event_type' => $event,
                    'created_by' => $user_id
                )
            ));
        }
        return $result;
    }
}
