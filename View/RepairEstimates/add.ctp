<div class="actions">
    <div class="navbar">
        <div class="navbar-inner">
        <ul class="nav">
            <a class="brand" href="#">Actions</a>
            <li><?php echo $this->Html->link(__('New Repair Estimate'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Repair Estimates'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Casings'), array('controller' => 'casings', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Casing'), array('controller' => 'casings', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Repair Types'), array('controller' => 'repair_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Repair Type'), array('controller' => 'repair_types', 'action' => 'add')); ?> </li>
        </ul>
        </div>
    </div>
</div>
<div class="repairEstimates form">
<?php echo $this->Form->create('RepairEstimate'); ?>
	<fieldset>
		<legend><?php echo __('Add Repair Estimate'); ?></legend>
	<?php
		echo $this->Form->input('casing_id');
		echo $this->Form->input('repair_type_id');
		echo $this->Form->input('existing');
		echo $this->Form->input('new');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
