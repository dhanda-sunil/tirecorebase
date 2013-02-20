<div class="actions">
    <div class="navbar">
        <div class="navbar-inner">
        <ul class="nav">
            <a class="brand" href="#">Actions</a>
            <li><?php echo $this->Html->link(__('New Manufacturer Product Line'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('ManufacturerProductLine.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('ManufacturerProductLine.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Manufacturer Product Lines'), array('action' => 'index')); ?></li>
        </ul>
        </div>
    </div>
</div>
<div class="manufacturerProductLines form">
<?php echo $this->Form->create('ManufacturerProductLine'); ?>
	<fieldset>
		<legend><?php echo __('Edit Manufacturer Product Line'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('manufacturer_plant_id');
		echo $this->Form->input('manufacturers_products_lines_group_id');
		echo $this->Form->input('is_material');
		echo $this->Form->input('dot_code');
		echo $this->Form->input('name');
		echo $this->Form->input('order');
		echo $this->Form->input('material_size_list');
		echo $this->Form->input('deleted');
		echo $this->Form->input('deleted_by');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
