<div class="actions">
    <div class="navbar">
        <div class="navbar-inner">
        <ul class="nav">
            <a class="brand" href="#">Actions</a>
            <li><?php echo $this->Html->link(__('New Co'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Co.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Co.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Cos'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Accounts'), array('controller' => 'accounts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Account'), array('controller' => 'accounts', 'action' => 'add')); ?> </li>
        </ul>
        </div>
    </div>
</div>
<div class="cos form">
<?php echo $this->Form->create('Co'); ?>
	<fieldset>
		<legend><?php echo __('Edit Co'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('ref');
		echo $this->Form->input('account_id');
		echo $this->Form->input('type');
		echo $this->Form->input('term_id');
		echo $this->Form->input('status');
		echo $this->Form->input('bill_address_id');
		echo $this->Form->input('ship_address_id');
		echo $this->Form->input('is_national_account');
		echo $this->Form->input('notes');
		echo $this->Form->input('requestor');
		echo $this->Form->input('authorized');
		echo $this->Form->input('authorized_by');
		echo $this->Form->input('created_by');
		echo $this->Form->input('modified_by');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
