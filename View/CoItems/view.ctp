<div class="coItems view">
    
    <div class="actions">
        <div class="navbar">
            <div class="navbar-inner">
            <ul class="nav">
                <a class="brand" href="#">Actions</a>
    		<li><?php echo $this->Html->link(__('Edit Co Item'), array('action' => 'edit', $coItem['CoItem']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Co Item'), array('action' => 'delete', $coItem['CoItem']['id']), null, __('Are you sure you want to delete # %s?', $coItem['CoItem']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Co Items'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Co Item'), array('action' => 'add')); ?> </li>
            </ul>
            </div>
        </div>
    </div>
    
	<table class="table table-bordered">
		<tr>
		<td><?php echo __('Id'); ?></td>
		<td>
			<?php echo h($coItem['CoItem']['id']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Co Id'); ?></td>
		<td>
			<?php echo h($coItem['CoItem']['co_id']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Line Number'); ?></td>
		<td>
			<?php echo h($coItem['CoItem']['line_number']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Line Suffix'); ?></td>
		<td>
			<?php echo h($coItem['CoItem']['line_suffix']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Casing Id'); ?></td>
		<td>
			<?php echo h($coItem['CoItem']['casing_id']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Desc'); ?></td>
		<td>
			<?php echo h($coItem['CoItem']['desc']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Status'); ?></td>
		<td>
			<?php echo h($coItem['CoItem']['status']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Co Item Type Id'); ?></td>
		<td>
			<?php echo h($coItem['CoItem']['co_item_type_id']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Modified'); ?></td>
		<td>
			<?php echo h($coItem['CoItem']['modified']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Modified By'); ?></td>
		<td>
			<?php echo h($coItem['CoItem']['modified_by']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Created'); ?></td>
		<td>
			<?php echo h($coItem['CoItem']['created']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Created By'); ?></td>
		<td>
			<?php echo h($coItem['CoItem']['created_by']); ?>
			&nbsp;
		</td>
		</tr>
	</table>
</div>
