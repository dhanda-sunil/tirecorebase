<div class="actions">
    <div class="navbar">
        <div class="navbar-inner">
        <ul class="nav">
            <a class="brand" href="#">Actions</a>
            <li><?php echo $this->Html->link(__('New Jockey'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Jockeys'), array('action' => 'index')); ?></li>
        </ul>
        </div>
    </div>
</div>
<div class="jockeys form">
<?php echo $this->Form->create('Jockey'); ?>
	<fieldset>
		<legend><?php echo __('Add Jockey'); ?></legend>
	<?php
		echo $this->Form->input('name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
