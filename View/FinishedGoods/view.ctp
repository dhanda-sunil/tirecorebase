<div class="finishedGoods view">
    
    <div class="actions">
        <div class="navbar">
            <div class="navbar-inner">
            <ul class="nav">
                <a class="brand" href="#">Actions</a>
    		<li><?php echo $this->Html->link(__('Edit Finished Good'), array('action' => 'edit', $finishedGood['FinishedGood']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Finished Good'), array('action' => 'delete', $finishedGood['FinishedGood']['id']), null, __('Are you sure you want to delete # %s?', $finishedGood['FinishedGood']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Finished Goods'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Finished Good'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Casings'), array('controller' => 'casings', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Casing'), array('controller' => 'casings', 'action' => 'add')); ?> </li>
            </ul>
            </div>
        </div>
    </div>
    
	<table class="table table-bordered">
		<tr>
		<td><?php echo __('Id'); ?></td>
		<td>
			<?php echo h($finishedGood['FinishedGood']['id']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td width="300px"><?php echo __('Casing'); ?></td>
		<td>
			<?php echo $this->Html->link($finishedGood['Casing']['id'], array('controller' => 'casings', 'action' => 'view', $finishedGood['Casing']['id'])); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Fg Code'); ?></td>
		<td>
			<?php echo h($finishedGood['FinishedGood']['fg_code']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Stock Status'); ?></td>
		<td>
			<?php echo h($finishedGood['FinishedGood']['stock_status']); ?>
			&nbsp;
		</td>
		</tr>
	</table>
</div>
