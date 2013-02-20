<div class="accounts view">
    
    <div class="actions">
        <div class="navbar">
            <div class="navbar-inner">
            <ul class="nav">
                <a class="brand" href="#">Actions</a>
    		<li><?php echo $this->Html->link(__('Edit Account'), array('action' => 'edit', $account['Account']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Account'), array('action' => 'delete', $account['Account']['id']), null, __('Are you sure you want to delete # %s?', $account['Account']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Accounts'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Account'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Customers'), array('controller' => 'customers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Customer'), array('controller' => 'customers', 'action' => 'add')); ?> </li>
            </ul>
            </div>
        </div>
    </div>
    
	<table class="table table-bordered">
		<tr>
		<td><?php echo __('Id'); ?></td>
		<td>
			<?php echo h($account['Account']['id']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td width="300px"><?php echo __('Customer'); ?></td>
		<td>
			<?php echo $this->Html->link($account['Customer']['company_name'], array('controller' => 'customers', 'action' => 'view', $account['Customer']['id'])); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Account Type Id'); ?></td>
		<td>
			<?php echo h($account['Account']['account_type_id']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Number'); ?></td>
		<td>
			<?php echo h($account['Account']['number']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Desc'); ?></td>
		<td>
			<?php echo h($account['Account']['desc']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Modified'); ?></td>
		<td>
			<?php echo h($account['Account']['modified']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Modified By'); ?></td>
		<td>
			<?php echo h($account['Account']['modified_by']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Created'); ?></td>
		<td>
			<?php echo h($account['Account']['created']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Order'); ?></td>
		<td>
			<?php echo h($account['Account']['order']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Default Bill To Id'); ?></td>
		<td>
			<?php echo h($account['Account']['default_bill_to_id']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Default Ship To Id'); ?></td>
		<td>
			<?php echo h($account['Account']['default_ship_to_id']); ?>
			&nbsp;
		</td>
		</tr>
	</table>
</div>
