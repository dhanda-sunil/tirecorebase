<div class="actions">
    <div class="navbar">
        <div class="navbar-inner">
        <ul class="nav">
            <a class="brand" href="#">Actions</a>
            <li><?php echo $this->Html->link(__('New Customer'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Customers'), array('action' => 'index')); ?></li>
        </ul>
        </div>
    </div>
</div>
<div class="customers form" style="float:left;width:500px">
<?php echo $this->Form->create('Customer'); ?>
	<fieldset style="width:600px">
		<legend><?php echo __('Add Customer'); ?></legend>
	<?php
		echo $this->Form->input('company_name');
		echo $this->Form->input('first_name');
		echo $this->Form->input('last_name');
		echo $this->Form->input('website');
		echo $this->Form->input('phone_number');
		echo $this->Form->input('fax_number');
		echo $this->Form->input('email');
		echo $this->Form->input('tax_number');
		echo $this->Form->input('tax_number_expiration');
		echo $this->Form->input('price_group_id');
		echo $this->Form->input('is_company');
		echo $this->Form->input('location_id');
		echo $this->Form->input('customer_group_id');
		echo $this->Form->input('customer_status_id');
        echo $this->Form->input('Allowed Repairs',array('name'=>'data[Preference][AllowedRepairs]'));
        echo $this->Form->radio('Scrap or Return',array('Return as Received'=>'Return as Received','Scrap'=>'Scrap'),array('name'=>'data[Preference][ScrapOrReturn]'));
		echo $this->Form->input('active',array('checked'=>true));
        echo $this->Form->radio('Account Type',array('1'=>'Local','2'=>'National'),array('name'=>'data[Account][account_type]'));
        echo $this->Form->input('Account Number',array('name'=>'data[Account][number]'));
		echo $this->Form->input('keywords');
		//echo $this->Form->input('deleted');
		//echo $this->Form->input('deleted_by');
		echo $this->Form->input('notes');
	?>
	</fieldset>
</div>
<div class="customers form" style="float:left">
	<fieldset>
        <legend><?php echo __('Billing Address'); ?></legend>
	<?php
		echo $this->Form->input('Address Name',array('name'=>'data[Address][name]'));
		echo $this->Form->input('Address line1',array('name'=>'data[Address][line1]'));
		echo $this->Form->input('Address line2',array('name'=>'data[Address][line2]'));
		echo $this->Form->input('Address city',array('name'=>'data[Address][city]'));
		echo $this->Form->input('Address state',array('name'=>'data[Address][state]'));
		echo $this->Form->input('Address zip',array('name'=>'data[Address][zip]'));
		echo $this->Form->input('Address email',array('name'=>'data[Address][email]'));
		//echo $this->Form->radio('Address address_type',array('is_billing'=>'Billing','is_shipping'=>'Shipping'),array('name'=>'data[Address][address_type]','label'=>'Is Billing Address?'));
	?>
	</fieldset>
	<fieldset>
        <legend><?php echo __('Shipping Address'); ?></legend>
        <input type="checkbox" onclick="isSame($(this))" id="Same" /> <label for="Same">Same As Above</label><br/>
	<?php
		echo $this->Form->input('Address2 Name',array('name'=>'data[Address2][name]'));
		echo $this->Form->input('Address2 line1',array('name'=>'data[Address2][line1]'));
		echo $this->Form->input('Address2 line2',array('name'=>'data[Address2][line2]'));
		echo $this->Form->input('Address2 city',array('name'=>'data[Address2][city]'));
		echo $this->Form->input('Address2 state',array('name'=>'data[Address2][state]'));
		echo $this->Form->input('Address2 zip',array('name'=>'data[Address2][zip]'));
		echo $this->Form->input('Address2 email',array('name'=>'data[Address2][email]'));
		//echo $this->Form->radio('Address2 address_type',array('is_billing'=>'Billing','is_shipping'=>'Shipping'),array('name'=>'data[Address2][address_type]'));
	?>
	</fieldset>
</div>
<div style="clear:left">
<?php echo $this->Form->end(__('Submit')); ?>
</div>

<script>
$(function(){
    
    isSame = function(el){
        if($(el).attr('checked') == 'checked'){
            same();
        }
        else{
            diff();
        }
    }
    
    same = function(){
        $('#CustomerAddress2Name').val($('#CustomerAddressName').val());
        $('#CustomerAddress2Line1').val($('#CustomerAddressLine1').val());
        $('#CustomerAddress2Line2').val($('#CustomerAddressLine2').val());
        $('#CustomerAddress2City').val($('#CustomerAddressCity').val());
        $('#CustomerAddress2State').val($('#CustomerAddressState').val());
        $('#CustomerAddress2Zip').val($('#CustomerAddressZip').val());
        $('#CustomerAddress2Email').val($('#CustomerAddressEmail').val());
    }
    diff = function(){
        $('#CustomerAddress2Name').val('');
        $('#CustomerAddress2Line1').val('');
        $('#CustomerAddress2Line2').val('');
        $('#CustomerAddress2City').val('');
        $('#CustomerAddress2State').val('');
        $('#CustomerAddress2Zip').val('');
        $('#CustomerAddress2Email').val('');
    }
})
</script>