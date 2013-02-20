<div class="users view">
    
    <div class="actions">
        <div class="navbar">
            <div class="navbar-inner">
            <ul class="nav">
                <a class="brand" href="#">Actions</a>
    		<li><?php echo $this->Html->link(__('Edit User'), array('action' => 'edit', $user['User']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete User'), array('action' => 'delete', $user['User']['id']), null, __('Are you sure you want to delete # %s?', $user['User']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('action' => 'add')); ?> </li>
            </ul>
            </div>
        </div>
    </div>
    
	<table class="table table-bordered">
		<tr>
		<td><?php echo __('Id'); ?></td>
		<td>
			<?php echo h($user['User']['id']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Shop Checkpoint Pref Id'); ?></td>
		<td>
			<?php echo h($user['User']['shop_checkpoint_pref_id']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Username'); ?></td>
		<td>
			<?php echo h($user['User']['username']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Password'); ?></td>
		<td>
			<?php echo h($user['User']['password']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Lang'); ?></td>
		<td>
			<?php echo h($user['User']['lang']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Email'); ?></td>
		<td>
			<?php echo h($user['User']['email']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('First Name'); ?></td>
		<td>
			<?php echo h($user['User']['first_name']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Last Name'); ?></td>
		<td>
			<?php echo h($user['User']['last_name']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Login Hash'); ?></td>
		<td>
			<?php echo h($user['User']['login_hash']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Login Ip'); ?></td>
		<td>
			<?php echo h($user['User']['login_ip']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Last Ui'); ?></td>
		<td>
			<?php echo h($user['User']['last_ui']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Change Password'); ?></td>
		<td>
			<?php echo h($user['User']['change_password']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Modified'); ?></td>
		<td>
			<?php echo h($user['User']['modified']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Created'); ?></td>
		<td>
			<?php echo h($user['User']['created']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Active'); ?></td>
		<td>
			<?php echo h($user['User']['active']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Admin'); ?></td>
		<td>
			<?php echo h($user['User']['admin']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Current Location'); ?></td>
		<td>
			<?php echo h($user['User']['current_location']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Current Till'); ?></td>
		<td>
			<?php echo h($user['User']['current_till']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Location Pref'); ?></td>
		<td>
			<?php echo h($user['User']['location_pref']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Company Id'); ?></td>
		<td>
			<?php echo h($user['User']['company_id']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Deleted'); ?></td>
		<td>
			<?php echo h($user['User']['deleted']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Deleted By'); ?></td>
		<td>
			<?php echo h($user['User']['deleted_by']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('User Group Id'); ?></td>
		<td>
			<?php echo h($user['User']['user_group_id']); ?>
			&nbsp;
		</td>
		</tr>
	</table>
</div>
