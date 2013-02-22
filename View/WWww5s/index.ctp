<!-- THIS TEMPLATE IS BAKED! -->
<div class="heading clearfix">
    <h3 class="pull-left"><span id="page-title">W Www5s</span> <span id="page-sub-title"></span></h3>
</div>

<table id="page-table" class="table table-bordered table-striped table_vam">
    <thead>
    <tr>
        <th>Id</th>
        <th>Name</th>
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

<!-- RECORD TEMPLATE -->
<script type="text/template" id="page-record-template">
<div class="row-fluid">
    <div class="span8">
        <form class="form-horizontal well">
        <fieldset>
            <p class="f_legend">W Www5 Information</p>
			<div class="control-group" isPrimaryKey>
				<label class="control-label">Id <span class="f_req">*</span></label>
				<div class="controls">
					<input type="text" readonly name="data[WWww5][id]" />
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">Name <span class="f_req">*</span></label>
				<div class="controls">
					<input type="text" name="data[WWww5][name]" />
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