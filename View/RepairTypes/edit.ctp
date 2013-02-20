<div class="actions">
    <div class="navbar">
        <div class="navbar-inner">
        <ul class="nav">
            <a class="brand" href="#">Actions</a>
            <li><?php echo $this->Html->link(__('New Repair Type'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('RepairType.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('RepairType.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Repair Types'), array('action' => 'index')); ?></li>
        </ul>
        </div>
    </div>
</div>
<div class="repairTypes form">
<?php echo $this->Form->create('RepairType'); ?>
	<fieldset>
		<legend><?php echo __('Edit Repair Type'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
