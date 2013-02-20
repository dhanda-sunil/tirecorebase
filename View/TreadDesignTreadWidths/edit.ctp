<div class="actions">
    <div class="navbar">
        <div class="navbar-inner">
        <ul class="nav">
            <a class="brand" href="#">Actions</a>
            <li><?php echo $this->Html->link(__('New Tread Design Tread Width'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('TreadDesignTreadWidth.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('TreadDesignTreadWidth.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Tread Design Tread Widths'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Tread Designs'), array('controller' => 'tread_designs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tread Design'), array('controller' => 'tread_designs', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tread Widths'), array('controller' => 'tread_widths', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tread Width'), array('controller' => 'tread_widths', 'action' => 'add')); ?> </li>
        </ul>
        </div>
    </div>
</div>
<div class="treadDesignTreadWidths form">
<?php echo $this->Form->create('TreadDesignTreadWidth'); ?>
	<fieldset>
		<legend><?php echo __('Edit Tread Design Tread Width'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('tread_design_id');
		echo $this->Form->input('tread_width_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
