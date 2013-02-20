<div class="actions">
    <div class="navbar">
        <div class="navbar-inner">
        <ul class="nav">
            <a class="brand" href="#">Actions</a>
            <li><?php echo $this->Html->link(__('New Material'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Material.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Material.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Materials'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Vendor Items'), array('controller' => 'vendor_items', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Vendor Item'), array('controller' => 'vendor_items', 'action' => 'add')); ?> </li>
        </ul>
        </div>
    </div>
</div>
<div class="materials form">
<?php echo $this->Form->create('Material'); ?>
	<fieldset>
		<legend><?php echo __('Edit Material'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('material_uom');
		echo $this->Form->input('material_type');
		echo $this->Form->input('vendor_item_id');
		echo $this->Form->input('repair_type_id');
		echo $this->Form->input('name');
		echo $this->Form->input('part_number');
		echo $this->Form->input('manf_part_number');
		echo $this->Form->input('tread_width_id');
		echo $this->Form->input('tread_width_unit');
		echo $this->Form->input('dot_code');
		echo $this->Form->input('density');
		echo $this->Form->input('tread_design_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
