<div class="actions">
    <div class="navbar">
        <div class="navbar-inner">
        <ul class="nav">
            <a class="brand" href="#">Actions</a>
            <li><?php echo $this->Html->link(__('New Casing'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Casings'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Manufacturer Plants'), array('controller' => 'manufacturer_plants', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Manufacturer Plant'), array('controller' => 'manufacturer_plants', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tire Sizes'), array('controller' => 'tire_sizes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tire Size'), array('controller' => 'tire_sizes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Manufacturer Product Lines'), array('controller' => 'manufacturer_product_lines', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Manufacturer Product Line'), array('controller' => 'manufacturer_product_lines', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Customers'), array('controller' => 'customers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Customer'), array('controller' => 'customers', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tread Designs'), array('controller' => 'tread_designs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tread Design'), array('controller' => 'tread_designs', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Casing Logs'), array('controller' => 'casing_logs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Casing Log'), array('controller' => 'casing_logs', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Casing Repairs'), array('controller' => 'casing_repairs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Casing Repair'), array('controller' => 'casing_repairs', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Finished Goods'), array('controller' => 'finished_goods', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Finished Good'), array('controller' => 'finished_goods', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Co Items'), array('controller' => 'co_items', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Co Item'), array('controller' => 'co_items', 'action' => 'add')); ?> </li>
        </ul>
        </div>
    </div>
</div>
<div class="casings form">
<?php echo $this->Form->create('Casing'); ?>
	<fieldset>
		<legend><?php echo __('Add Casing'); ?></legend>
	<?php
		echo $this->Form->input('manufacturer_plant_id');
		echo $this->Form->input('tire_size_id');
		echo $this->Form->input('manufacturer_product_line_id');
		echo $this->Form->input('production_week');
		echo $this->Form->input('barcode');
		echo $this->Form->input('customer_id');
		echo $this->Form->input('customer_tag');
		echo $this->Form->input('rfid');
		echo $this->Form->input('tread_design_id');
		echo $this->Form->input('grade');
		echo $this->Form->input('checking');
		echo $this->Form->input('previous_caps');
		echo $this->Form->input('remaining_tread');
		echo $this->Form->input('tread_width_id');
		echo $this->Form->input('mold_type_id');
		echo $this->Form->input('buff_radius');
		echo $this->Form->input('nrt_code_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
