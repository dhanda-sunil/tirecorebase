<div class="actions">
    <div class="navbar">
        <div class="navbar-inner">
        <ul class="nav">
            <a class="brand" href="#">Actions</a>
            <li><?php echo $this->Html->link(__('New Checkpoint'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Checkpoint.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Checkpoint.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Checkpoints'), array('action' => 'index')); ?></li>
        </ul>
        </div>
    </div>
</div>
<div class="checkpoints form">
<?php echo $this->Form->create('Checkpoint'); ?>
	<fieldset>
		<legend><?php echo __('Edit Checkpoint'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
