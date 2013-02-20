<div class="checkpoints view">
    
    <div class="actions">
        <div class="navbar">
            <div class="navbar-inner">
            <ul class="nav">
                <a class="brand" href="#">Actions</a>
    		<li><?php echo $this->Html->link(__('Edit Checkpoint'), array('action' => 'edit', $checkpoint['Checkpoint']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Checkpoint'), array('action' => 'delete', $checkpoint['Checkpoint']['id']), null, __('Are you sure you want to delete # %s?', $checkpoint['Checkpoint']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Checkpoints'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Checkpoint'), array('action' => 'add')); ?> </li>
            </ul>
            </div>
        </div>
    </div>
    
	<table class="table table-bordered">
		<tr>
		<td><?php echo __('Id'); ?></td>
		<td>
			<?php echo h($checkpoint['Checkpoint']['id']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Name'); ?></td>
		<td>
			<?php echo h($checkpoint['Checkpoint']['name']); ?>
			&nbsp;
		</td>
		</tr>
	</table>
</div>
