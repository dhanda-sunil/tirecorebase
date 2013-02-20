<div class="actions">
    <div class="navbar">
        <div class="navbar-inner">
        <ul class="nav">
            <a class="brand" href="#">Actions</a>
            <li><?php echo $this->Html->link(__('New Co Item'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Co Items'), array('action' => 'index')); ?></li>
        </ul>
        </div>
    </div>
</div>
<div class="coItems form">
<?php echo $this->Form->create('CoItem'); ?>
	<fieldset>
		<legend><?php echo __('Add Co Item'); ?></legend>
	<?php
		echo $this->Form->input('co_id');
		echo $this->Form->input('line_number');
		echo $this->Form->input('line_suffix');
		echo $this->Form->input('casing_id');
		echo $this->Form->input('desc');
		echo $this->Form->input('status');
		echo $this->Form->input('co_item_type_id');
		echo $this->Form->input('modified_by');
		echo $this->Form->input('created_by');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
