<div class="actions">
    <div class="navbar">
        <div class="navbar-inner">
        <ul class="nav">
            <a class="brand" href="#">Actions</a>
            <li><?php echo $this->Html->link(__('New Repair Type'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Repair Types'), array('action' => 'index')); ?></li>
        </ul>
        </div>
    </div>
</div>
<div class="repairTypes form">
<?php echo $this->Form->create('RepairType'); ?>
	<fieldset>
		<legend><?php echo __('Add Repair Type'); ?></legend>
	<?php
		echo $this->Form->input('name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
