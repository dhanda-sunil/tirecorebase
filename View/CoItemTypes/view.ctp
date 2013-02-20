<div class="coItemTypes view">
    
    <div class="actions">
        <div class="navbar">
            <div class="navbar-inner">
            <ul class="nav">
                <a class="brand" href="#">Actions</a>
    		<li><?php echo $this->Html->link(__('Edit Co Item Type'), array('action' => 'edit', $coItemType['CoItemType']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Co Item Type'), array('action' => 'delete', $coItemType['CoItemType']['id']), null, __('Are you sure you want to delete # %s?', $coItemType['CoItemType']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Co Item Types'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Co Item Type'), array('action' => 'add')); ?> </li>
            </ul>
            </div>
        </div>
    </div>
    
	<table class="table table-bordered">
		<tr>
		<td><?php echo __('Id'); ?></td>
		<td>
			<?php echo h($coItemType['CoItemType']['id']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Name'); ?></td>
		<td>
			<?php echo h($coItemType['CoItemType']['name']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Type'); ?></td>
		<td>
			<?php echo h($coItemType['CoItemType']['type']); ?>
			&nbsp;
		</td>
		</tr>
	</table>
</div>
