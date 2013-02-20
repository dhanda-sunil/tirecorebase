<div class="actions">
    <div class="navbar">
        <div class="navbar-inner">
        <ul class="nav">
            <a class="brand" href="#">Actions</a>
            <li><?php echo $this->Html->link(__('New Finished Good'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('FinishedGood.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('FinishedGood.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Finished Goods'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Casings'), array('controller' => 'casings', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Casing'), array('controller' => 'casings', 'action' => 'add')); ?> </li>
        </ul>
        </div>
    </div>
</div>
<div class="finishedGoods form">
<?php echo $this->Form->create('FinishedGood'); ?>
	<fieldset>
		<legend><?php echo __('Edit Finished Good'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('casing_id');
		echo $this->Form->input('fg_code');
		echo $this->Form->input('stock_status');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
