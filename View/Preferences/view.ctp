<div class="preferences view">
    
    <div class="actions">
        <div class="navbar">
            <div class="navbar-inner">
            <ul class="nav">
                <a class="brand" href="#">Actions</a>
    		<li><?php echo $this->Html->link(__('Edit Preference'), array('action' => 'edit', $preference['Preference']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Preference'), array('action' => 'delete', $preference['Preference']['id']), null, __('Are you sure you want to delete # %s?', $preference['Preference']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Preferences'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Preference'), array('action' => 'add')); ?> </li>
            </ul>
            </div>
        </div>
    </div>
    
	<table class="table table-bordered">
		<tr>
		<td><?php echo __('Id'); ?></td>
		<td>
			<?php echo h($preference['Preference']['id']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Type'); ?></td>
		<td>
			<?php echo h($preference['Preference']['type']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Key Id'); ?></td>
		<td>
			<?php echo h($preference['Preference']['key_id']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Name'); ?></td>
		<td>
			<?php echo h($preference['Preference']['name']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Value'); ?></td>
		<td>
			<?php echo h($preference['Preference']['value']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Value Type'); ?></td>
		<td>
			<?php echo h($preference['Preference']['value_type']); ?>
			&nbsp;
		</td>
		</tr>
	</table>
</div>
