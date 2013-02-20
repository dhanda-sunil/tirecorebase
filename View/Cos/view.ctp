<div class="cos view">
    
    <div class="actions">
        <div class="navbar">
            <div class="navbar-inner">
            <ul class="nav">
                <a class="brand" href="#">Actions</a>
    		<li><?php echo $this->Html->link(__('Edit Co'), array('action' => 'edit', $co['Co']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Co'), array('action' => 'delete', $co['Co']['id']), null, __('Are you sure you want to delete # %s?', $co['Co']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Cos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Co'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Accounts'), array('controller' => 'accounts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Account'), array('controller' => 'accounts', 'action' => 'add')); ?> </li>
            </ul>
            </div>
        </div>
    </div>
    
	<table class="table table-bordered">
		<tr>
		<td><?php echo __('Id'); ?></td>
		<td>
			<?php echo h($co['Co']['id']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Ref'); ?></td>
		<td>
			<?php echo h($co['Co']['ref']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td width="300px"><?php echo __('Account'); ?></td>
		<td>
			<?php echo $this->Html->link($co['Account']['number'], array('controller' => 'accounts', 'action' => 'view', $co['Account']['id'])); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Type'); ?></td>
		<td>
			<?php echo h($co['Co']['type']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Term Id'); ?></td>
		<td>
			<?php echo h($co['Co']['term_id']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Status'); ?></td>
		<td>
			<?php echo h($co['Co']['status']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Bill Address Id'); ?></td>
		<td>
			<?php echo h($co['Co']['bill_address_id']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Ship Address Id'); ?></td>
		<td>
			<?php echo h($co['Co']['ship_address_id']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Is National Account'); ?></td>
		<td>
			<?php echo h($co['Co']['is_national_account']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Notes'); ?></td>
		<td>
			<?php echo h($co['Co']['notes']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Requestor'); ?></td>
		<td>
			<?php echo h($co['Co']['requestor']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Authorized'); ?></td>
		<td>
			<?php echo h($co['Co']['authorized']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Authorized By'); ?></td>
		<td>
			<?php echo h($co['Co']['authorized_by']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Created'); ?></td>
		<td>
			<?php echo h($co['Co']['created']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Created By'); ?></td>
		<td>
			<?php echo h($co['Co']['created_by']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Modified'); ?></td>
		<td>
			<?php echo h($co['Co']['modified']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Modified By'); ?></td>
		<td>
			<?php echo h($co['Co']['modified_by']); ?>
			&nbsp;
		</td>
		</tr>
	</table>
</div>
