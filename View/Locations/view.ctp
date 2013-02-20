<div class="locations view">
    
    <div class="actions">
        <div class="navbar">
            <div class="navbar-inner">
            <ul class="nav">
                <a class="brand" href="#">Actions</a>
    		<li><?php echo $this->Html->link(__('Edit Location'), array('action' => 'edit', $location['Location']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Location'), array('action' => 'delete', $location['Location']['id']), null, __('Are you sure you want to delete # %s?', $location['Location']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Locations'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Location'), array('action' => 'add')); ?> </li>
            </ul>
            </div>
        </div>
    </div>
    
	<table class="table table-bordered">
		<tr>
		<td><?php echo __('Id'); ?></td>
		<td>
			<?php echo h($location['Location']['id']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Company Id'); ?></td>
		<td>
			<?php echo h($location['Location']['company_id']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Name'); ?></td>
		<td>
			<?php echo h($location['Location']['name']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Description'); ?></td>
		<td>
			<?php echo h($location['Location']['description']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Location Group Id'); ?></td>
		<td>
			<?php echo h($location['Location']['location_group_id']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Location Type'); ?></td>
		<td>
			<?php echo h($location['Location']['location_type']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Modified'); ?></td>
		<td>
			<?php echo h($location['Location']['modified']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Created'); ?></td>
		<td>
			<?php echo h($location['Location']['created']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Deleted'); ?></td>
		<td>
			<?php echo h($location['Location']['deleted']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Deleted By'); ?></td>
		<td>
			<?php echo h($location['Location']['deleted_by']); ?>
			&nbsp;
		</td>
		</tr>
	</table>
</div>
