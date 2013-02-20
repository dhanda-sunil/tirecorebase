<div class="actions">
    <div class="navbar">
        <div class="navbar-inner">
        <ul class="nav">
            <a class="brand" href="#">Actions</a>
            <li><?php echo $this->Html->link(__('New Repair Estimate'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('RepairEstimate.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('RepairEstimate.id'))); ?></li>
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
		<legend><?php echo __('Edit Repair Estimate'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('casing_id');
		echo $this->Form->input('repair_type_id');
		echo $this->Form->input('existing');
		echo $this->Form->input('new');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
