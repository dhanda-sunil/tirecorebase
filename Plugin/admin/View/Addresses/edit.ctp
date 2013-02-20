<div class="actions">
    <div class="navbar">
        <div class="navbar-inner">
        <ul class="nav">
            <a class="brand" href="#">Actions</a>
            <li><?php echo $this->Html->link(__('New Address'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Address.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Address.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Addresses'), array('action' => 'index')); ?></li>
        </ul>
        </div>
    </div>
</div>
<div class="addresses form">
<?php echo $this->Form->create('Address'); ?>
	<fieldset>
		<legend><?php echo __('Edit Address'); ?></legend>
	<?php
		echo $this->Form->input('id');
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
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
