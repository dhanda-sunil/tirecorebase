<style type="text/css">
    .ColVis_Button{
        text-align:left;
    }
    .jedit td:hover{
        border:1px solid blue !important; 
    }
</style>
<div class="heading clearfix">
    <h3 class="pull-left" id="customer-title">Customers</h3>
</div>
<div class="tabbable" id="customer-main">
    <ul class="nav nav-tabs" id="customer-tab-list">
        <li class="active"><a href="#tab-0" data-toggle="tab">All</a></li>
        <!--<li class=""><a href="#tab-2" data-toggle="tab">Customer</a></li>-->
    </ul>
    <div class="tab-content">
        <div class="tab-pane active" id="tab-0">
            <table id="customers-table" class="table table-bordered table-striped table_vam">
                <thead>
                <tr>
                    <th>Company</th>
                    <th>Phone</th>
                    <th>Fax</th>
                    <th>Website</th>
                    <th>Tax Number</th>
                    <th>ID</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
</div>

<div id="customer-form" style="display:none"></div>
<!-- CUSTOMER TABLE ROW TEMPLATE -->
<script type="text/template" id="customer-table-template">
<tr data-id="">
    <td data-id="company_name"></td>
    <td data-id="phone_number"></td>
    <td data-id="fax_number"></td>
    <td data-id="website"></td>
    <td data-id="tax_number"></td>
    <td data-id="edit"></td>
</tr>
</script>

<!-- CUSTOMER RECORD TEMPLATE -->
<script type="text/template" id="customer-record-template">
<div id="add-new-fields" class="row-fluid">
    <div class="customer-model control-group well">
        <fieldset>
            <p class="f_legend">Customer Information</p>
            <div class="span5">
                <div class="control-group">
                    <label>Company <span class="f_req">*</span></label>
                    <input type="text" name="data[Customer][company_name]" />
                </div>
                <div class="control-group">
                    <label>Phone</label>
                    <input type="text" name="data[Customer][phone_number]" />
                </div>
                <div class="control-group">
                    <label>Fax</label>
                    <input type="text" name="data[Customer][fax_number]" />
                </div>
                <div class="control-group">
                    <label>Website</label>
                    <input type="text" name="data[Customer][website]" />
                </div>
            </div>
            <div class="span5">
                <div class="control-group">
                    <label>Tax Number</label>
                    <input type="text" name="data[Customer][tax_number]" />
                </div>
                <div class="control-group" id="datepicker">
                    <label>Tax Expiration</label>
                    <div class="input-append date" id="dp_start">
                        <input class="span6" type="text" name="data[Customer][tax_number_expiration]" readonly="readonly"  /> 
                        <span class="add-on"><i class="splashy-calendar_day_up"></i></span>
                    </div>
                </div>
                <div class="control-group">
                    <label>Retread Template <span class="f_req">*</span></label>
                    <select name="data[Customer][retread_template_id]">
                        <?foreach($retread_templates as $x => $i):?>
                        <option value="<?=$x?>"><?=$i?></option>
                        <?endforeach;?>
                    </select>
                </div>
                <div class="control-group">
                    <label>Active</label>
                    <input type="checkbox" class="uni_style" name="data[Customer][active]" value="1" id="company-is-active" /> Yes
                </div>
            </div>
        </fieldset>
    </div>
    <div class="form-actions">
        <input type="button" class="btn btn-inverse save-customer" value="Save changes" />
        <input type="button" class="btn close-customer" value="Close" />
    </div>
</div>
<div class="row-fluid edit-only">
    <h3 class="heading"><img src="/img/gCons/multi-agents.png" alt="" /> Contacts</h3>
    <table class="contacts-table customer-view table table-condensed table-striped">
        <thead>
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
</div>
<div class="row-fluid edit-only">
    <h3 class="heading"><img src="/img/gCons/briefcase.png" alt="" /> Accounts</h3>
    <table class="accounts-table customer-view table table-condensed table-striped">
        <thead>
        <tr>
            <th>Account</th>
            <th>Billing</th>
            <th>Shipping</th>
            <th>Sales</th>
            <th>Type</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
</div>
<div class="row-fluid edit-only">
    <h3 class="heading"><img src="/img/gCons/addressbook.png" alt="" /> Addresses</h3>
    <table class="addresses-table customer-view table table-condensed table-striped">
        <thead>
        <tr>
            <th>Name</th>
            <th>Address</th>
            <th>Addr Line 2</th>
            <th>City</th>
            <th>State</th>
            <th>Zip</th>
            <th>Type</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
</div>
</script>

<!-- RECORD TEMPLATE -->

<div id="page-modal" class="modal modal-big hide fade">
    <div class="modal-header">
        <button class="close" data-dismiss="modal">×</button>
        <h3 id="modal-title"></h3>
    </div>
    <div class="modal-body">

    </div>
    <div class="modal-footer">
        <input type="button" class="btn btn-inverse" name="save-modal" value="Save changes" />
    </div>
</div>

<script type="text/template" id="contact-add-template">
    <div class="row-fluid">
    <div class="span6">
        <form class="form-horizontal well">
            <fieldset>
                <p class="f_legend">Contact Information</p>
                <div class="control-group">
                    <label class="control-label">First Name <span class="f_req">*</span></label>
                    <div class="controls">
                        <input type="text" class="span10" name="data[Contact][first_name]" />
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Last Name</label>
                    <div class="controls">
                        <input type="text" class="span10" name="data[Contact][last_name]" />
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Phone</label>
                    <div class="controls">
                        <input type="text" class="span10" name="data[Contact][phone_number]" />
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Email</label>
                    <div class="controls">
                        <input type="text" class="span10" name="data[Contact][email]" />
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Active </label>
                    <div class="controls">
                        <input type="checkbox" class="uni_style" name="data[Contact][active]" value="1" checked />
                        <input type="hidden" name="data[Contact][ref_id]" />
                        <input type="hidden" name="data[Contact][ref_table]" value="customers" />
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
    </div>
</script>

<script type="text/template" id="account-add-template">
    <div class="row-fluid">
    <div class="span8">
        <form class="form-horizontal well">
            <fieldset>
                <p class="f_legend">Account Information</p>
                <div class="control-group">
                    <label class="control-label">Account Number <span class="f_req">*</span></label>
                    <div class="controls">
                        <input type="text" class="span10" name="data[Account][number]" />
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Sales Agent</label>
                    <div class="controls">
                        <select name="data[Account][user_id]">
                            <? foreach($salesperson as $i): ?>
                                <option value="<?=$i['User']['id']?>"><?=$i['User']['first_name']?> <?=$i['User']['last_name']?></option>
                            <? endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Account Type</label>
                    <div class="controls">
                        <input type="radio" class="uni_style" name="data[Account][account_type_id]" value="1" id="local-account" /> 
                        <label for="local-account">Local </label>
                        <input type="radio" class="uni_style" name="data[Account][account_type_id]" value="2" id="national-account" /> 
                        <label for="national-account">National </label>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Active </label>
                    <div class="controls">
                        <input type="checkbox" class="uni_style" name="data[Account][active]" value="1" checked />
                        <input type="hidden" name="data[Account][customer_id]" />
                    </div>
                </div>
            </fieldset>
           <fieldset class="account-billing-address">
                <p class="f_legend">Billing Address </p>
                <div class="control-group">
                    <label class="control-label">Name <span class="f_req">*</span></label>
                    <div class="controls">
                        <input type="text" class="span10" name="data[BillingAddress][name]" />
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Address Line 1</label>
                    <div class="controls">
                        <input type="text" class="span10" name="data[BillingAddress][line1]" />
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Address Line 2</label>
                    <div class="controls">
                        <input type="text" class="span10" name="data[BillingAddress][line2]" />
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">City</label>
                    <div class="controls">
                        <input type="text" class="span10" name="data[BillingAddress][city]" />
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">State / Province</label>
                    <div class="controls">
                        <input type="text" class="span10" name="data[BillingAddress][state]" />
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Zip</label>
                    <div class="controls">
                        <input type="text" class="span10" name="data[BillingAddress][zip]" />
                    </div>
                </div>
            </fieldset>
            <fieldset class="account-shipping-address">
                <p class="f_legend">Shipping Address</p>
                <div class="control-group">
                    <label class="control-label">Same as Billing</label>
                    <div class="controls">
                        <input type="checkbox" class="uni_style" id="same-as-billing" value="1" name="data[Null][null]" />
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Name <span class="f_req">*</span></label>
                    <div class="controls">
                        <input type="text" class="span10" name="data[ShippingAddress][name]" />
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Address Line 1</label>
                    <div class="controls">
                        <input type="text" class="span10" name="data[ShippingAddress][line1]" />
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Address Line 2</label>
                    <div class="controls">
                        <input type="text" class="span10" name="data[ShippingAddress][line2]" />
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">City</label>
                    <div class="controls">
                        <input type="text" class="span10" name="data[ShippingAddress][city]" />
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">State / Province</label>
                    <div class="controls">
                        <input type="text" class="span10" name="data[ShippingAddress][state]" />
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Zip</label>
                    <div class="controls">
                        <input type="text" class="span10" name="data[ShippingAddress][zip]" />
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
    </div>
</script>

<script type="text/template" id="address-add-template">
    <div class="row-fluid">
    <div class="span8">
        <form class="form-horizontal well">
            <fieldset>
                <p class="f_legend">Address Information</p>
                <div class="control-group">
                    <label class="control-label">Name <span class="f_req">*</span></label>
                    <div class="controls">
                        <input type="text" class="span10" name="data[Address][name]" />
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Address Line 1</label>
                    <div class="controls">
                        <input type="text" class="span10" name="data[Address][line1]" />
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Address Line 2</label>
                    <div class="controls">
                        <input type="text" class="span10" name="data[Address][line2]" />
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">City</label>
                    <div class="controls">
                        <input type="text" class="span10" name="data[Address][city]" />
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">State / Province</label>
                    <div class="controls">
                        <input type="text" class="span10" name="data[Address][state]" />
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Zip</label>
                    <div class="controls">
                        <input type="text" class="span10" name="data[Address][zip]" />
                    </div>
                </div> 
                <div class="control-group">
                    <label class="control-label">Type</label>
                    <div class="controls">
                        <select name="data[Address][address_type]">
                            <option value="Shipping">Shipping</option>
                            <option value="Billing">Billing</option>
                            <option value="Both">Both: Shipping & Billing</option>
                        </select>
                    </div>
                </div> 
                <div class="control-group">
                    <label class="control-label">Active </label>
                    <div class="controls">
                        <input type="checkbox" class="uni_style" name="data[Address][active]" value="1" checked />
                        <input type="hidden" name="data[Address][ref_id]" />
                        <input type="hidden" name="data[Address][ref_table]" value="customers" />
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
    </div>
</script>