<style type="text/css">
    body,table,tr,td{
        font-size: 8px;
    }
    table{
        border-collapse:collapse;
        width:100%;
    }
    td,th{
        border:1px solid #ccc;
    }
</style>
<div style="text-align:center">
    <strong>Raw Materials Inventory</strong><br/>
    <span><?=date('m/d/Y h:i a')?></span<br/>
</div>
<table id="materials-table" class="table table-bordered table-striped table_vam" style="margin-top:10px">
    <thead>
    <tr>
        <th>Item</th>
        <th>Tread Size</th>
        <th>Desc.</th>
        <th>Qty Count</th>
        <th>QOH</th>
        <th>Qty Var</th>
        <th>Lbs </th>
        <th>Lbs OH</th>
        <th>Lbs Var</th>
        <th>Qty Start</th>
        <th>Qty End</th>
        <th>Start $</th>
        <th>End $</th>
        <th>Cost</th>
        <th>Var</th>
    </tr>
    </thead>
    <tbody>
    <?
    $units = $weight = $ustart = $uend = $vstart = $vend = $vvar = $uvar = $unit_count = $unit_var = $weight_count = $weight_var = 0;
    ?>
    <? if( !isset($materials) ): ?>
    <tr class="NoRows"><td colspan="3">No materials found</td></tr>
    <? endif; ?>
    <? foreach($materials as $i): ?>
    <?
	    if(empty($i['Material']['price_per_unit']))
	        $i['Material']['price_per_unit'] =   0 ;
	    if(empty($i['Material']['units']))
	        $i['Material']['units'] =   0 ;
	    if(empty($i['Material']['weight']))
	        $i['Material']['weight'] =   0 ;
    $start_value = $i[0]['start_units']*$i['Material']['price_per_unit'];
    $end_value = $i[0]['end_units']*$i['Material']['price_per_unit'];
    ?>
    <tr part-number="<?=$i['Material']['part_number']?>" id="<?=$i['Material']['id']?>">
        <td><?=$i['Material']['part_number']?></td>
        <td><?=$i['TreadWidth']['size_mm']?></td>
        <td><?=$i['Material']['name']?></td>
        <td data-id="unit-count"><?=number_format($i['Material']['unit_count'])?></td>
        <td data-id="units" class="jedit"><?=number_format($i['Material']['units'])?></td>
        <td data-id="unit-var"><?=number_format($i['Material']['unit_var'])?></td>
        <td data-id="weight-count"><?=$i['Material']['weight_count']?></td>
        <td data-id="weight" class="jedit"><?=$i['Material']['weight']?></td>
        <td data-id="weight-var"><?=$i['Material']['weight_var']?></td>
        <td><?=$i[0]['start_units']?></td>
        <td><?=$i[0]['end_units']?></td>
        <td>$<?=number_format($start_value,2); ?></td>
        <td>$<?=number_format($end_value,2); ?></td>
        <td>$<?=number_format($i['Material']['price_per_unit'],2)?></td>
        <td>$<?=number_format($i['Material']['value_var'],2)?></td>
        <?
        $units+= $i['Material']['units'];
        $unit_count+= $i['Material']['unit_count'];
        $unit_var+= $i['Material']['unit_var'];
        
        $weight+= $i['Material']['weight'];
        $weight_count+= $i['Material']['weight_count'];
        $weight_var+= $i['Material']['weight_var'];
        
        $ustart+= $i[0]['start_units'];
        $uend+= $i[0]['end_units'];
        
        $vstart+= $start_value;
        $vend+= $end_value;
        
        $vvar+= $i['Material']['value_var'];
        ?>
    </tr>
    <? endforeach; ?>
    </tbody>
    <tfoot>
    <tr>
        <th>Totals</th>
        <th></th>
        <th></th>
        <th><?=$unit_count?></th>
        <th><?=$units?></th>
        <th><?=$unit_var?></th>
        <th><?=$weight?></th>
        <th><?=$weight_count?></th>
        <th><?=$weight_var?></th>
        <th><?=number_format($ustart)?></th>
        <th><?=number_format($uend)?></th>
        <th>$<?=number_format($vstart,2)?></th>
        <th>$<?=number_format($vend,2)?></th>
        <th></th>
        <th>$<?=number_format($vvar,2)?></th>
    </tr>
    </tfoot>
</table>