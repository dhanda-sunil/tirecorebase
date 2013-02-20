<div class="actions">
    <div class="navbar">
        <div class="navbar-inner">
        <ul class="nav">
            <a class="brand" href="#">Actions</a>
            <li><?php echo $this->Html->link(__('New Co Item Type'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('CoItemType.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('CoItemType.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Co Item Types'), array('action' => 'index')); ?></li>
        </ul>
        </div>
    </div>
</div>
<div class="coItemTypes form">
<?php echo $this->Form->create('CoItemType'); ?>
	<fieldset>
		<legend><?php echo __('Edit Co Item Type'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('type');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
