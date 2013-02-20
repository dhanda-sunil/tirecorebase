<div class="actions">
    <div class="navbar">
        <div class="navbar-inner">
        <ul class="nav">
            <a class="brand" href="#">Actions</a>
            <li><?php echo $this->Html->link(__('New Tire Size'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Tire Sizes'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Casings'), array('controller' => 'casings', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Casing'), array('controller' => 'casings', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Mold Types'), array('controller' => 'mold_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Mold Type'), array('controller' => 'mold_types', 'action' => 'add')); ?> </li>
        </ul>
        </div>
    </div>
</div>
<div class="tireSizes form">
<?php echo $this->Form->create('TireSize'); ?>
	<fieldset>
		<legend><?php echo __('Add Tire Size'); ?></legend>
	<?php
		echo $this->Form->input('two_char_code');
		echo $this->Form->input('size_code');
		echo $this->Form->input('dot_primary');
		echo $this->Form->input('dot_secondary');
		echo $this->Form->input('dot_tertiary');
		echo $this->Form->input('size_group');
		echo $this->Form->input('stock_status');
		echo $this->Form->input('buff_circ');
		echo $this->Form->input('rim_size');
		echo $this->Form->input('cross_section');
		echo $this->Form->input('bead_setting');
		echo $this->Form->input('scale_min');
		echo $this->Form->input('scale_max');
		echo $this->Form->input('width');
		echo $this->Form->input('aspect_ratio');
		echo $this->Form->input('diameter');
		echo $this->Form->input('std_base_width');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
