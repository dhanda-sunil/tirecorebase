<div class="actions">
    <div class="navbar">
        <div class="navbar-inner">
        <ul class="nav">
            <a class="brand" href="#">Actions</a>
            <li><?php echo $this->Html->link(__('New Manufacturer Plant'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('ManufacturerPlant.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('ManufacturerPlant.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Manufacturer Plants'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Manufacturers'), array('controller' => 'manufacturers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Manufacturer'), array('controller' => 'manufacturers', 'action' => 'add')); ?> </li>
        </ul>
        </div>
    </div>
</div>
<div class="manufacturerPlants form">
<?php echo $this->Form->create('ManufacturerPlant'); ?>
	<fieldset>
		<legend><?php echo __('Edit Manufacturer Plant'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('manufacturer_id');
		echo $this->Form->input('code');
		echo $this->Form->input('city');
		echo $this->Form->input('state');
		echo $this->Form->input('country');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
