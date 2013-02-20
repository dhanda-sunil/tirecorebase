<div class="customerLocations view">
    
    <div class="actions">
        <div class="navbar">
            <div class="navbar-inner">
            <ul class="nav">
                <a class="brand" href="#">Actions</a>
    		<li><?php echo $this->Html->link(__('Edit Customer Location'), array('action' => 'edit', $customerLocation['CustomerLocation']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Customer Location'), array('action' => 'delete', $customerLocation['CustomerLocation']['id']), null, __('Are you sure you want to delete # %s?', $customerLocation['CustomerLocation']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Customer Locations'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Customer Location'), array('action' => 'add')); ?> </li>
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
			<?php echo h($customerLocation['CustomerLocation']['id']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td width="300px"><?php echo __('Customer'); ?></td>
		<td>
			<?php echo $this->Html->link($customerLocation['Customer']['company_name'], array('controller' => 'customers', 'action' => 'view', $customerLocation['Customer']['id'])); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Name'); ?></td>
		<td>
			<?php echo h($customerLocation['CustomerLocation']['name']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Description'); ?></td>
		<td>
			<?php echo h($customerLocation['CustomerLocation']['description']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Customer Group Id'); ?></td>
		<td>
			<?php echo h($customerLocation['CustomerLocation']['customer_group_id']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Modified'); ?></td>
		<td>
			<?php echo h($customerLocation['CustomerLocation']['modified']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Created'); ?></td>
		<td>
			<?php echo h($customerLocation['CustomerLocation']['created']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Deleted'); ?></td>
		<td>
			<?php echo h($customerLocation['CustomerLocation']['deleted']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Deleted By'); ?></td>
		<td>
			<?php echo h($customerLocation['CustomerLocation']['deleted_by']); ?>
			&nbsp;
		</td>
		</tr>
	</table>
</div>
