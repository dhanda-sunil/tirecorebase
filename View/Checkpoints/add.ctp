<div class="actions">
    <div class="navbar">
        <div class="navbar-inner">
        <ul class="nav">
            <a class="brand" href="#">Actions</a>
            <li><?php echo $this->Html->link(__('New Checkpoint'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Checkpoints'), array('action' => 'index')); ?></li>
        </ul>
        </div>
    </div>
</div>
<div class="checkpoints form">
<?php echo $this->Form->create('Checkpoint'); ?>
	<fieldset>
		<legend><?php echo __('Add Checkpoint'); ?></legend>
	<?php
		echo $this->Form->input('name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
