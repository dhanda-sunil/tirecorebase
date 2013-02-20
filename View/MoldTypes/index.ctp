<style>
    #page-sub-title{color:#666}
</style>
<div class="heading clearfix">
    <h3 class="pull-left"><span id="page-title">Mold Types</span> <span id="page-sub-title"></span></h3>
</div>

<table id="moldtypes-table" class="table table-bordered table-striped table_vam" style="margin-top:10px">
    <thead>
    <tr>
        <th>ID</th>
        <th>Code</th>
        <th>Description</th>
        <th>Bead Plate</th>
        <th>Mold Cavity</th>
        <th>Tread</th>
        <th>Size</th>
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
                <p class="f_legend">Mold Type Information</p>
                <div class="control-group">
                    <label class="control-label">Code <span class="f_req">*</span></label>
                    <div class="controls">
                        <input type="text" class="span10" name="data[MoldType][code]" />
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Description <span class="f_req">*</span></label>
                    <div class="controls">
                        <input type="text" class="span10" name="data[MoldType][description]" />
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Tread Design <span class="f_req">*</span></label>
                    <div class="controls">
                        <select name="data[MoldType][tread_design_id]">
                            <option value=""> --- Tread Design --- </option>
                            <? foreach($tread_designs as $x => $i): ?>
                            <option value="<?=$x?>"><?=$i?></option>
                            <? endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Tire Size <span class="f_req">*</span></label>
                    <div class="controls">
                        <select name="data[MoldType][tire_size_id]">
                            <option value=""> --- Tire Size --- </option>
                            <? foreach($tire_sizes as $x => $i): ?>
                            <option value="<?=$x?>"><?=$i?></option>
                            <? endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Lifetime</label>
                    <div class="controls">
                        <input type="text" class="span10" name="data[MoldType][lifetime]" />
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Bead Plate <span class="f_req">*</span></label>
                    <div class="controls">
                        <select name="data[MoldType][bead_plate_id]">
                            <option value=""> --- Bead Plate --- </option>
                            <? foreach($bead_plates as $x => $i): ?>
                            <option value="<?=$x?>"><?=$i?></option>
                            <? endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Mold Cavity</label>
                    <div class="controls">
                        <input type="text" class="span10" name="data[MoldType][mold_cavity]" />
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