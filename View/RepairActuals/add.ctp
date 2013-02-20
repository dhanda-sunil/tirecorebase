<div class="actions">
    <div class="navbar">
        <div class="navbar-inner">
        <ul class="nav">
            <a class="brand" href="#">Actions</a>
            <li><?php echo $this->Html->link(__('New Repair Actual'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Repair Actuals'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Casings'), array('controller' => 'casings', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Casing'), array('controller' => 'casings', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Materials'), array('controller' => 'materials', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Material'), array('controller' => 'materials', 'action' => 'add')); ?> </li>
        </ul>
        </div>
    </div>
</div>
<div class="repairActuals form">
<?php echo $this->Form->create('RepairActual'); ?>
	<fieldset>
		<legend><?php echo __('Add Repair Actual'); ?></legend>
	<?php
		echo $this->Form->input('casing_id');
		echo $this->Form->input('material_id');
		echo $this->Form->input('quantity');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
