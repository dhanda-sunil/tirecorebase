<style>
    #page-sub-title{color:#666}
</style>
<div class="heading clearfix">
    <h3 class="pull-left"><span id="page-title">Shipments</span> <span id="page-sub-title"></span></h3>
</div>

<table id="shipments-table" class="table table-bordered table-striped table_vam" style="margin-top:10px">
    <thead>
    <tr>
        <th>Shipment</th>
        <th>Date/Time</th>
        <th>Created By</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>ID</th>
    </tr>
    </thead>
    <tbody>
    </tbody>
</table>

<div id="add-new-shipment"></div>

<div id="shipped-goods"></div>

<script type="text/template" id="add-new-shipment-template">
    <div class="row-fluid">
    <form class="form_validation_ttip" novalidate="novalidate">
        <div class="formSep">
            <div class="row-fluid">
                <div class="span12">
                    <label>Shipment Name <span class="f_req">*</span></label>
                    <input type="text" class="shipment_name" class="span8" id="shipment-name" />
                    <span class="help-block">*Select by batch or from the non-shipped casings below:</span>
                </div>
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
        </div>
        
        <div id="casings-table-div"></div>
        
        <div class="form-actions">
            <input type="button" class="btn btn-inverse" name="save" value="Save changes" />
            <input type="button" class="btn" name="cancel" value="Cancel" />
        </div>
    </form>
</script>

<script type="text/template" id="casings-table-template">
    <table class="table table-bordered table-striped table_vam" style="margin-top:10px">
        <thead>
        <tr>
            <th>ID</th>
            <th>Workorder</th>
            <th>Customer</th>
            <th>Line</th>
            <th>Barcode</th>
            <th>Type</th>
            <th>Item No.</th>
            <th>Tire Size</th>
            <th>Brand</th>
            <th>DOT</th>
            <th>Desc.</th>
            <th>Tread Size</th>
            <th><i class="icon-ok"></i></th>
        </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</script>

<div id="casings-modal" class="modal modal-big hide fade">
    <div class="modal-header">
        <button class="close" data-dismiss="modal">×</button>
        <h3 id="modal-title">Shipment</h3>
    </div>
    <div class="modal-body"></div>
    <div class="modal-footer">
        <input type="button" class="btn btn-inverse" name="print" value="Print" />
    </div>
</div>

<div id="casings-confirm-modal" class="modal modal-big hide fade">
    <div class="modal-header">
        <button class="close" data-dismiss="modal">×</button>
        <h3 id="modal-title">Confirm Shipment</h3>
    </div>
    <div class="modal-body"></div>
    <div class="modal-footer">
        <input type="button" class="btn" name="cancel-shipment" value="Cancel" />
        <input type="button" class="btn btn-inverse" name="confirm-shipment" value="Confirm" />
    </div>
</div>