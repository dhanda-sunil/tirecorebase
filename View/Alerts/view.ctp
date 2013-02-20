<div class="alerts view">
    
    <div class="actions">
        <div class="navbar">
            <div class="navbar-inner">
            <ul class="nav">
                <a class="brand" href="#">Actions</a>
    		<li><?php echo $this->Html->link(__('Edit Alert'), array('action' => 'edit', $alert['Alert']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Alert'), array('action' => 'delete', $alert['Alert']['id']), null, __('Are you sure you want to delete # %s?', $alert['Alert']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Alerts'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Alert'), array('action' => 'add')); ?> </li>
            </ul>
            </div>
        </div>
    </div>
    
	<table class="table table-bordered">
		<tr>
		<td><?php echo __('Id'); ?></td>
		<td>
			<?php echo h($alert['Alert']['id']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Table Name'); ?></td>
		<td>
			<?php echo h($alert['Alert']['table_name']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Row Id'); ?></td>
		<td>
			<?php echo h($alert['Alert']['row_id']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Is Active'); ?></td>
		<td>
			<?php echo h($alert['Alert']['is_active']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Type'); ?></td>
		<td>
			<?php echo h($alert['Alert']['type']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Desc'); ?></td>
		<td>
			<?php echo h($alert['Alert']['desc']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Created'); ?></td>
		<td>
			<?php echo h($alert['Alert']['created']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Modified'); ?></td>
		<td>
			<?php echo h($alert['Alert']['modified']); ?>
			&nbsp;
		</td>
		</tr>
	</table>
</div>
