<style type="text/css">
    .ColVis_Button{
        text-align:left;
    }
</style>
<div class="heading clearfix">
    <h3 class="pull-left" id="page-title">Users</h3>
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
                    <th></th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Username</th>
                    <th>Group</th>
                    <th>Location</th>
                    <th>Action</th>
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
            <label>First Name</label>
            <input type="text" name="data[User][first_name]" />
        </div>
        <div class="span12">
            <label>Last Name</label>
            <input type="text" name="data[User][last_name]" />
        </div>
        <div class="span12">
            <label>Username</label>
            <input type="text" name="data[User][username]" />
        </div>
        <div class="span12">
            <label>Email</label>
            <input type="text" name="data[User][email]" />
        </div>
        <div class="span12">
            <label>User Group</label>
            <select name="data[User][user_group_id]">
                <option value="">---</option>
                <?foreach($groups as $x => $i):?>
                <option value="<?=$x?>"><?=$i?></option>
                <?endforeach;?>
            </select>
        </div>
        <div class="span12">
            <label>Location</label>
            <select name="data[User][location_id]">
                <option value="">---</option>
                <?foreach($locations as $x => $i):?>
                <option value="<?=$x?>"><?=$i?></option>
                <?endforeach;?>
            </select>
        </div>
        <div class="span12">
            <label>Default Checkpoint <span class="help-block">*For shopfloor users</span></label> 
            <select name="data[User][checkpoint_id]">
                <option value="">---</option>
                <?foreach($checkpoints as $x => $i):?>
                <option value="<?=$x?>"><?=$i?></option>
                <?endforeach;?>
            </select>
            
        </div>
        <div class="span12">
            <label>Active</label>
            <input type="checkbox" name="data[User][active]" value="1" /> Yes
        </div>
        <div class="span12">
            <label>Password</label>
            <input type="password" name="data[User][password]" />
        </div>
        </fieldset>
    </div>
</div>
<div class="form-actions">
    <input type="button" class="btn btn-inverse save-record" value="Save changes" />
    <input type="button" class="btn close-record" value="Close" />
</div>
</script>