<div class="actions">
    <div class="navbar">
        <div class="navbar-inner">
        <ul class="nav">
            <a class="brand" href="#">Actions</a>
            <li><?php echo $this->Html->link(__('New Preference'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Preference.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Preference.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Preferences'), array('action' => 'index')); ?></li>
        </ul>
        </div>
    </div>
</div>
<div class="preferences form">
<?php echo $this->Form->create('Preference'); ?>
	<fieldset>
		<legend><?php echo __('Edit Preference'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('type');
		echo $this->Form->input('key_id');
		echo $this->Form->input('name');
		echo $this->Form->input('value');
		echo $this->Form->input('value_type');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
