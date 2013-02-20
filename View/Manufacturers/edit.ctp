<div class="actions">
    <div class="navbar">
        <div class="navbar-inner">
        <ul class="nav">
            <a class="brand" href="#">Actions</a>
            <li><?php echo $this->Html->link(__('New Manufacturer'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Manufacturer.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Manufacturer.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Manufacturers'), array('action' => 'index')); ?></li>
        </ul>
        </div>
    </div>
</div>
<div class="manufacturers form">
<?php echo $this->Form->create('Manufacturer'); ?>
	<fieldset>
		<legend><?php echo __('Edit Manufacturer'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('dot_code');
		echo $this->Form->input('website');
		echo $this->Form->input('deleted');
		echo $this->Form->input('deleted_by');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
