<div class="actions">
    <div class="navbar">
        <div class="navbar-inner">
        <ul class="nav">
            <a class="brand" href="#">Actions</a>
            <li><?php echo $this->Html->link(__('New Co Item Type'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Co Item Types'), array('action' => 'index')); ?></li>
        </ul>
        </div>
    </div>
</div>
<div class="coItemTypes form">
<?php echo $this->Form->create('CoItemType'); ?>
	<fieldset>
		<legend><?php echo __('Add Co Item Type'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('type');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
