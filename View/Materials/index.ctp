<style>
    .jedit:hover{
        border:1px solid blue;
    }
</style>
<div class="heading clearfix">
    <h3 class="pull-left" id="title">Material Inventory <span id="sub-module"></span></h3>
</div>
<div class="row-fluid" id="datepicker">
    <div class="span3">
        <div class="input-append date" id="dp_start">
            <input class="span6" type="text" readonly="readonly" value="<?=date('m/d/Y',mktime(12,0,0,date('m'),1,date('Y')))?>" /> 
            <span class="add-on"><i class="splashy-calendar_day_up"></i></span>
        </div>
        <span class="help-block">Daterange - date start</span>
    </div>
    <div class="span3">
        <div class="input-append date" id="dp_end">
            <input class="span6" type="text" readonly="readonly" value="<?=date('m/d/Y',mktime(12,0,0,date('m')+1,0,date('Y')))?>" />
            <span class="add-on"><i class="splashy-calendar_day_down"></i></span>
        </div>
        <span class="help-block">Daterange - date end</span>
    </div>
    <input type="button" class="btn btn-inverse run-report" value="Submit" />
</div>
<div class="row-fluid" id="datepicker">
    <div class="span3">
        <select name="batch-id" id="batch-id">
            <option value="">-- Select Batch --</option>
            <? foreach($batches as $i): ?>
            <option value="<?=$i['Batch']['id']?>"><?=date('m/d/Y h:i A',strtotime($i['Batch']['created']))?> <?=$i['Batch']['type']?></option>
            <? endforeach; ?>
        </select>
        <input type="button" class="btn btn-inverse hide" id="adjust-inventory" value="Adjust Inventory" />
    </div>
</div>
<div id="response" class="hide"></div>
<?
//echo '<pre>';
//print_r($materials);
//echo '</pre>';
//die();
?>
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
    $units = $weight = $ustart = $uend = $vstart = $vend = $vvar = $uvar = 0;
    ?>
    <? if( !$materials ): ?>
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
        <td><?=$i['TreadWidth']['size']?></td>
        <td><?=$i['Material']['name']?></td>
        <td data-id="unit-count">---</td>
        <td data-id="units" class="jedit"><?=$i['Material']['units']?></td>
        <td data-id="unit-var">---</td>
        <td data-id="weight-count">---</td>
        <td data-id="weight" class="jedit"><?=$i['Material']['weight']?></td>
        <td data-id="weight-var">---</td>
        <td><?=$i[0]['start_units']?></td>
        <td><?=$i[0]['end_units']?></td>
        <td>$<?=number_format($start_value,2); ?></td>
        <td>$<?=number_format($end_value,2); ?></td>
        <td>$<?=number_format($i['Material']['price_per_unit'],2)?></td>
        <td>---</td>
        <?
        $units+= $i['Material']['units'];
        $weight+= $i['Material']['weight'];
        $ustart+= $i[0]['start_units'];
        $uend+= $i[0]['end_units'];
        $vstart+= $start_value;
        $vend+= $end_value;
        $vvar+= $end_value - $start_value;
        $uvar = $i[0]['end_units'] - $i[0]['start_units'];
        ?>
    </tr>
    <? endforeach; ?>
    </tbody>
    <tfoot>
    <tr>
        <th>Totals</th>
        <th></th>
        <th></th>
        <th></th>
        <th><?=$units?></th>
        <th></th>
        <th></th>
        <th><?=$weight?></th>
        <th></th>
        <th></th>
        <th><?=number_format($ustart,2)?></th>
        <th><?=number_format($uend,2)?></th>
        <th>$<?=number_format($vstart,2)?></th>
        <th>$<?=number_format($vend,2)?></th>
        <th>---</th>
    </tr>
    </tfoot>
</table>