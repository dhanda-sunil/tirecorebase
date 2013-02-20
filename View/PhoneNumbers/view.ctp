<div class="phoneNumbers view">
    
    <div class="actions">
        <div class="navbar">
            <div class="navbar-inner">
            <ul class="nav">
                <a class="brand" href="#">Actions</a>
    		<li><?php echo $this->Html->link(__('Edit Phone Number'), array('action' => 'edit', $phoneNumber['PhoneNumber']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Phone Number'), array('action' => 'delete', $phoneNumber['PhoneNumber']['id']), null, __('Are you sure you want to delete # %s?', $phoneNumber['PhoneNumber']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Phone Numbers'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Phone Number'), array('action' => 'add')); ?> </li>
            </ul>
            </div>
        </div>
    </div>
    
	<table class="table table-bordered">
		<tr>
		<td><?php echo __('Id'); ?></td>
		<td>
			<?php echo h($phoneNumber['PhoneNumber']['id']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Ref Id'); ?></td>
		<td>
			<?php echo h($phoneNumber['PhoneNumber']['ref_id']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Ref Table'); ?></td>
		<td>
			<?php echo h($phoneNumber['PhoneNumber']['ref_table']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Value'); ?></td>
		<td>
			<?php echo h($phoneNumber['PhoneNumber']['value']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Type'); ?></td>
		<td>
			<?php echo h($phoneNumber['PhoneNumber']['type']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Primary'); ?></td>
		<td>
			<?php echo h($phoneNumber['PhoneNumber']['primary']); ?>
			&nbsp;
		</td>
		</tr>
	</table>
</div>
