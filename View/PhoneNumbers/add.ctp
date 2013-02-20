<div class="actions">
    <div class="navbar">
        <div class="navbar-inner">
        <ul class="nav">
            <a class="brand" href="#">Actions</a>
            <li><?php echo $this->Html->link(__('New Phone Number'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Phone Numbers'), array('action' => 'index')); ?></li>
        </ul>
        </div>
    </div>
</div>
<div class="phoneNumbers form">
<?php echo $this->Form->create('PhoneNumber'); ?>
	<fieldset>
		<legend><?php echo __('Add Phone Number'); ?></legend>
	<?php
		echo $this->Form->input('ref_id');
		echo $this->Form->input('ref_table');
		echo $this->Form->input('value');
		echo $this->Form->input('type');
		echo $this->Form->input('primary');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
