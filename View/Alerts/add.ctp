<div class="actions">
    <div class="navbar">
        <div class="navbar-inner">
        <ul class="nav">
            <a class="brand" href="#">Actions</a>
            <li><?php echo $this->Html->link(__('New Alert'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Alerts'), array('action' => 'index')); ?></li>
        </ul>
        </div>
    </div>
</div>
<div class="alerts form">
<?php echo $this->Form->create('Alert'); ?>
	<fieldset>
		<legend><?php echo __('Add Alert'); ?></legend>
	<?php
		echo $this->Form->input('table_name');
		echo $this->Form->input('row_id');
		echo $this->Form->input('is_active');
		echo $this->Form->input('type');
		echo $this->Form->input('desc');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
