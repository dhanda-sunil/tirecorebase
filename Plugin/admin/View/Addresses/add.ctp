<div class="actions">
    <div class="navbar">
        <div class="navbar-inner">
        <ul class="nav">
            <a class="brand" href="#">Actions</a>
            <li><?php echo $this->Html->link(__('New Address'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Addresses'), array('action' => 'index')); ?></li>
        </ul>
        </div>
    </div>
</div>
<div class="addresses form">
<?php echo $this->Form->create('Address'); ?>
	<fieldset>
		<legend><?php echo __('Add Address'); ?></legend>
	<?php
		echo $this->Form->input('ref_id');
		echo $this->Form->input('ref_table');
		echo $this->Form->input('name');
		echo $this->Form->input('attn');
		echo $this->Form->input('line1');
		echo $this->Form->input('line2');
		echo $this->Form->input('city');
		echo $this->Form->input('state');
		echo $this->Form->input('zip');
		echo $this->Form->input('is_billing');
		echo $this->Form->input('is_shipping');
		echo $this->Form->input('active');
		echo $this->Form->input('deleted');
		echo $this->Form->input('deleted_by');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
