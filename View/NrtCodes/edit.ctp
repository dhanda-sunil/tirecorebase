<div class="actions">
    <div class="navbar">
        <div class="navbar-inner">
        <ul class="nav">
            <a class="brand" href="#">Actions</a>
            <li><?php echo $this->Html->link(__('New Nrt Code'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('NrtCode.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('NrtCode.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Nrt Codes'), array('action' => 'index')); ?></li>
        </ul>
        </div>
    </div>
</div>
<div class="nrtCodes form">
<?php echo $this->Form->create('NrtCode'); ?>
	<fieldset>
		<legend><?php echo __('Edit Nrt Code'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('abbr');
		echo $this->Form->input('category');
		echo $this->Form->input('name');
		echo $this->Form->input('description');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
