<!-- THIS TEMPLATE IS BAKED! -->
<div class="heading clearfix">
    <h3 class="pull-left"><span id="page-title">T Designs</span> <span id="page-sub-title"></span></h3>
</div>

<table id="page-table" class="table table-bordered table-striped table_vam">
    <thead>
    <tr>
        <th>Id</th>
        <th>Tread Abb</th>
        <th>Name</th>
        <th>Xref</th>
        <th>Stock Status</th>
        <th>Vendor Id</th>
        <th>Image</th>
        <th>Image Type</th>
        <th>Cure Type</th>
		<th>Action</th>
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

<div id="page-message" class="modal modal-big hide fade">
    <div class="modal-header">
        <button class="close" data-dismiss="modal">×</button>
        <h3 id="modal-title"></h3>
    </div>
    <div class="modal-body"></div>
    <div class="modal-footer">
        
    </div>
</div>
<!-- RECORD TEMPLATE -->
<script type="text/template" id="page-record-template">
<div class="row-fluid">
    <div class="span8">
        <form class="form-horizontal well">
        <fieldset>
            <p class="f_legend">T Design Information</p>
			<div class="control-group" isPrimaryKey>
				<label class="control-label">Id <span class="f_req">*</span></label>
				<div class="controls">
					<input type="text" readonly name="data[TDesign][id]" />
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">Tread_abb <span class="f_req">*</span></label>
				<div class="controls">
					<input type="text" name="data[TDesign][tread_abb]" />
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">Name <span class="f_req">*</span></label>
				<div class="controls">
					<input type="text" name="data[TDesign][name]" />
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">Xref <span class="f_req">*</span></label>
				<div class="controls">
					<input type="text" name="data[TDesign][xref]" />
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">Stock_status <span class="f_req">*</span></label>
				<div class="controls">
					<input type="text" name="data[TDesign][stock_status]" />
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">Vendor_id <span class="f_req">*</span></label>
				<div class="controls">
					<input type="text" name="data[TDesign][vendor_id]" />
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">Image <span class="f_req">*</span></label>
				<div class="controls">
					<input type="text" name="data[TDesign][image]" />
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">Image_type <span class="f_req">*</span></label>
				<div class="controls">
					<input type="text" name="data[TDesign][image_type]" />
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">Cure_type <span class="f_req">*</span></label>
				<div class="controls">
					<input type="text" name="data[TDesign][cure_type]" />
				</div>
			</div>
        </fieldset>
        </form>
    </div>
</div>
<div class="form-actions">
    <input type="button" class="btn btn-inverse save-record" name="save" value="Save changes" />
    <input type="button" class="btn close-record" name="cancel" value="Close" />
</div>
</script>