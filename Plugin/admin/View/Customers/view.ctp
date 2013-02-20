<div class="customers view">
    
    <div class="actions">
        <div class="navbar">
            <div class="navbar-inner">
            <ul class="nav">
                <a class="brand" href="#">Actions</a>
    		<li><?php echo $this->Html->link(__('Edit Customer'), array('action' => 'edit', $customer['Customer']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Customer'), array('action' => 'delete', $customer['Customer']['id']), null, __('Are you sure you want to delete # %s?', $customer['Customer']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Customers'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Customer'), array('action' => 'add')); ?> </li>
            </ul>
            </div>
        </div>
    </div>
    
	<table class="table table-bordered">
		<tr>
		<td><?php echo __('Id'); ?></td>
		<td>
			<?php echo h($customer['Customer']['id']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Company Name'); ?></td>
		<td>
			<?php echo h($customer['Customer']['company_name']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('First Name'); ?></td>
		<td>
			<?php echo h($customer['Customer']['first_name']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Last Name'); ?></td>
		<td>
			<?php echo h($customer['Customer']['last_name']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Website'); ?></td>
		<td>
			<?php echo h($customer['Customer']['website']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Phone Number'); ?></td>
		<td>
			<?php echo h($customer['Customer']['phone_number']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Fax Number'); ?></td>
		<td>
			<?php echo h($customer['Customer']['fax_number']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Email'); ?></td>
		<td>
			<?php echo h($customer['Customer']['email']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Tax Number'); ?></td>
		<td>
			<?php echo h($customer['Customer']['tax_number']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Tax Number Expiration'); ?></td>
		<td>
			<?php echo h($customer['Customer']['tax_number_expiration']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		</tr>
		<tr>
		<td><?php echo __('Is Company'); ?></td>
		<td>
			<?php echo h($customer['Customer']['is_company']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Walk In'); ?></td>
		<td>
			<?php echo h($customer['Customer']['walk_in']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Active'); ?></td>
		<td>
			<?php echo h($customer['Customer']['active']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Keywords'); ?></td>
		<td>
			<?php echo h($customer['Customer']['keywords']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Deleted'); ?></td>
		<td>
			<?php echo h($customer['Customer']['deleted']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Deleted By'); ?></td>
		<td>
			<?php echo h($customer['Customer']['deleted_by']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Notes'); ?></td>
		<td>
			<?php echo h($customer['Customer']['notes']); ?>
			&nbsp;
		</td>
		</tr>
	</table>
</div>
