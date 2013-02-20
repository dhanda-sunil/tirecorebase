<div class="actions">
    <div class="navbar">
        <div class="navbar-inner">
        <ul class="nav">
            <a class="brand" href="#">Actions</a>
            <li><?php echo $this->Html->link(__('New Customer Location'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Customer Locations'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Customers'), array('controller' => 'customers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Customer'), array('controller' => 'customers', 'action' => 'add')); ?> </li>
        </ul>
        </div>
    </div>
</div>
<div class="customerLocations form">
<?php echo $this->Form->create('CustomerLocation'); ?>
	<fieldset>
		<legend><?php echo __('Add Customer Location'); ?></legend>
	<?php
		echo $this->Form->input('customer_id');
		echo $this->Form->input('name');
		echo $this->Form->input('description');
		echo $this->Form->input('customer_group_id');
		echo $this->Form->input('deleted');
		echo $this->Form->input('deleted_by');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
