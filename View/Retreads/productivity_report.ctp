<style>
    #chart svg{
        height:400px;
        display:none;
    }
</style>

<div class="heading clearfix">
    <h3 class="pull-left" id="page-title">Productivity Report <span id="page-sub-title"></span></h3>
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
        <select name="checkpoint-id" id="checkpoint-id">
            <option value="">-- Select Checkpoint --</option>
            <? foreach($checkpoints as $x=> $i): ?>
            <option value="<?=$x?>" <?=(isset($this->data['checkpoint_id']) && $this->data['checkpoint_id'] == $x) ? 'selected':''?>><?=$i?></option>
            <? endforeach; ?>
        </select>
    </div>
    <div class="span3">
        <select name="graph-options" id="graph-options">
            <option value="">-- Graph Options --</option>
            <option value="average_time" selected>Average Time</option>
            <option value="total_time">Total Time</option>
            <option value="casings">Casings Processed</option>
        </select>
    </div>
</div>

<div id="response" class="hide"></div>

<div id="chart">
    <svg></svg>
</div>

<table id="productivity-table" class="table table-bordered table-striped table_vam" style="margin-top:10px">
    <thead>
    <tr>
        <th>Last Name</th>
        <th>First Name</th>
        <th>Casings</th>
        <th>Total Time</th>
        <th>Avg. Time</th>
    </tr>
    </thead>
    <tbody>
    <? foreach($report as $i): ?>
        <tr>
            <td><?=$i['last_name']?></td>
            <td><?=$i['first_name']?></td>
            <td><?=$i['casing_count']?></td>
            <td><?=date('H:i:s',mktime(0, 0, $i['total_time']))?></td>
            <td><?=date('H:i:s',mktime(0, 0, $i['average_time']))?></td>
        </tr>
    <? endforeach; ?>
    </tbody>
    <tfoot>
    <tr>
    </tr>
    </tfoot>
</table>