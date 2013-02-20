<div class="actions">
    <div class="navbar">
        <div class="navbar-inner">
        <ul class="nav">
            <a class="brand" href="#">Actions</a>
            <li><?php echo $this->Html->link(__('New Customer'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Customer.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Customer.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Customers'), array('action' => 'index')); ?></li>
        </ul>
        </div>
    </div>
</div>
<div class="customers form">
<?php echo $this->Form->create('Customer'); ?>
	<fieldset>
		<legend><?php echo __('Edit Customer'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('company_name');
		echo $this->Form->input('first_name');
		echo $this->Form->input('last_name');
		echo $this->Form->input('website');
		echo $this->Form->input('phone_number');
		echo $this->Form->input('fax_number');
		echo $this->Form->input('email');
		echo $this->Form->input('tax_number');
		echo $this->Form->input('tax_number_expiration');
        echo $this->Form->input('Allowed Repairs',array('name'=>'data[Preference][AllowedRepairs]','value'=>@$repairsMaxAllowed));
		//echo $this->Form->input('price_group_id');
		echo $this->Form->input('is_company');
		//echo $this->Form->input('location_id');
		//echo $this->Form->input('customer_group_id');
		//echo $this->Form->input('customer_status_id');
		echo $this->Form->input('walk_in');
		echo $this->Form->input('active');
		echo $this->Form->input('keywords');
		//echo $this->Form->input('deleted');
		//echo $this->Form->input('deleted_by');
		echo $this->Form->input('notes');
		//echo $this->Form->input('legacy_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
