<div class="heading clearfix">
    <h3 class="pull-left" id="page-title">User Groups</h3>
</div>
<div class="tabbable" id="page-main">
    <ul class="nav nav-tabs" id="page-tab-list">
        <li class="active"><a href="#tab-0" data-toggle="tab">All</a></li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane active" id="tab-0">
            <table id="page-table" class="table table-bordered table-striped table_vam">
                <thead>
                <tr>
                    <th>Group</th>
                    <th>ID</th>
                </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
</div>

<div id="add-form" style="display:none"></div>

<!-- RECORD TEMPLATE -->
<script type="text/template" id="page-record-template">
<div class="row-fluid">
    <div class="user-model span6 well">
        <fieldset>
        <p class="f_legend">User Information</p>
        <div class="span12">
            <label>Group Name</label>
            <input type="text" name="data[UserGroup][name]" />
        </div>
    </div>
    </fieldset>
</div>
<div class="form-actions">
    <input type="button" class="btn btn-inverse save-record" value="Save changes" />
    <input type="button" class="btn close-record" value="Close" />
</div>
</script>