<div class="actions">
    <div class="navbar">
        <div class="navbar-inner">
        <ul class="nav">
            <a class="brand" href="#">Actions</a>
            <li><?php echo $this->Html->link(__('New Buff Spec'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Buff Specs'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Tire Sizes'), array('controller' => 'tire_sizes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tire Size'), array('controller' => 'tire_sizes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Mold Types'), array('controller' => 'mold_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Mold Type'), array('controller' => 'mold_types', 'action' => 'add')); ?> </li>
        </ul>
        </div>
    </div>
</div>
<div class="buffSpecs form">
<?php echo $this->Form->create('BuffSpec'); ?>
	<fieldset>
		<legend><?php echo __('Add Buff Spec'); ?></legend>
	<?php
		echo $this->Form->input('program_ref');
		echo $this->Form->input('name');
		echo $this->Form->input('tire_size_id');
		echo $this->Form->input('retread_method');
		echo $this->Form->input('diameter');
		echo $this->Form->input('crown_width');
		echo $this->Form->input('radius');
		echo $this->Form->input('machine_setting');
		echo $this->Form->input('shoulder_radius');
		echo $this->Form->input('shoulder_length');
		echo $this->Form->input('shoulder_angle');
		echo $this->Form->input('steel_belt');
		echo $this->Form->input('shoulder_brushing');
		echo $this->Form->input('bead_width');
		echo $this->Form->input('mold_type_id');
		echo $this->Form->input('bead_plate_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
