<style>
    #page-sub-title{color:#666}
</style>
<div class="heading clearfix">
    <h3 class="pull-left"><span id="page-title">Molds</span> <span id="page-sub-title"></span></h3>
</div>

<table id="molds-table" class="table table-bordered table-striped table_vam" style="margin-top:10px">
    <thead>
    <tr>
        <th>Barcode</th>
        <th>Mold Type</th>
        <th>Uses</th>
        <th>In Service Date</th>
        <th>Last Used</th>
        <th>Tread</th>
        <th>Size</th>
        <!-- hidden by data tables: -->
        <th>ID</th>
        <th>Description</th>
    </tr>
    </thead>
    <tbody>
    </tbody>
</table>

<div id="page-container"></div>

<div id="page-modal" class="modal modal-big hide fade">
    <div class="modal-header">
        <button class="close" data-dismiss="modal">×</button>
        <h3 id="modal-title"></h3>
    </div>
    <div class="modal-body"></div>
    <div class="modal-footer">
            <input type="button" class="btn btn-inverse" name="save" value="Save changes" />
            <input type="button" class="btn" name="cancel" value="Cancel" />
    </div>
</div>

<!-- RECORD TEMPLATE -->
<script type="text/template" id="page-add-template">
<div class="row-fluid">
    <div class="span8">
        <form class="form-horizontal well">
            <fieldset>
                <p class="f_legend">Mold Information</p>
                <div class="control-group">
                    <label class="control-label">Barcode <span class="f_req">*</span></label>
                    <div class="controls">
                        <input type="text" class="span10" name="data[Mold][barcode]" />
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Mold Type <span class="f_req">*</span></label>
                    <div class="controls">
                        <select name="data[Mold][mold_type_id]">
                            <? foreach($moldtypes as $x => $i): ?>
                            <option value="<?=$x?>"><?=$i?></option>
                            <? endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="control-group control-buttons">
                    <div class="controls">
                        <input type="button" class="btn btn-inverse" name="save" value="Save changes" />
                        <input type="button" class="btn" name="cancel" value="Cancel" />
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
</div>
</script>