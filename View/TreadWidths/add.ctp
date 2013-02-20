<div class="actions">
    <div class="navbar">
        <div class="navbar-inner">
        <ul class="nav">
            <a class="brand" href="#">Actions</a>
            <li><?php echo $this->Html->link(__('New Tread Width'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Tread Widths'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Tread Design Tread Widths'), array('controller' => 'tread_design_tread_widths', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tread Design Tread Width'), array('controller' => 'tread_design_tread_widths', 'action' => 'add')); ?> </li>
        </ul>
        </div>
    </div>
</div>
<div class="treadWidths form">
<?php echo $this->Form->create('TreadWidth'); ?>
	<fieldset>
		<legend><?php echo __('Add Tread Width'); ?></legend>
	<?php
		echo $this->Form->input('size_standard');
		echo $this->Form->input('size_mm');
		echo $this->Form->input('suffix');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
