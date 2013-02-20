<div class="manufacturers view">
    
    <div class="actions">
        <div class="navbar">
            <div class="navbar-inner">
            <ul class="nav">
                <a class="brand" href="#">Actions</a>
    		<li><?php echo $this->Html->link(__('Edit Manufacturer'), array('action' => 'edit', $manufacturer['Manufacturer']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Manufacturer'), array('action' => 'delete', $manufacturer['Manufacturer']['id']), null, __('Are you sure you want to delete # %s?', $manufacturer['Manufacturer']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Manufacturers'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Manufacturer'), array('action' => 'add')); ?> </li>
            </ul>
            </div>
        </div>
    </div>
    
	<table class="table table-bordered">
		<tr>
		<td><?php echo __('Id'); ?></td>
		<td>
			<?php echo h($manufacturer['Manufacturer']['id']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Name'); ?></td>
		<td>
			<?php echo h($manufacturer['Manufacturer']['name']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Dot Code'); ?></td>
		<td>
			<?php echo h($manufacturer['Manufacturer']['dot_code']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Website'); ?></td>
		<td>
			<?php echo h($manufacturer['Manufacturer']['website']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Deleted'); ?></td>
		<td>
			<?php echo h($manufacturer['Manufacturer']['deleted']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Deleted By'); ?></td>
		<td>
			<?php echo h($manufacturer['Manufacturer']['deleted_by']); ?>
			&nbsp;
		</td>
		</tr>
	</table>
</div>
