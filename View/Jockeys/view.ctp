<div class="jockeys view">
    
    <div class="actions">
        <div class="navbar">
            <div class="navbar-inner">
            <ul class="nav">
                <a class="brand" href="#">Actions</a>
    		<li><?php echo $this->Html->link(__('Edit Jockey'), array('action' => 'edit', $jockey['Jockey']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Jockey'), array('action' => 'delete', $jockey['Jockey']['id']), null, __('Are you sure you want to delete # %s?', $jockey['Jockey']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Jockeys'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Jockey'), array('action' => 'add')); ?> </li>
            </ul>
            </div>
        </div>
    </div>
    
	<table class="table table-bordered">
		<tr>
		<td><?php echo __('Id'); ?></td>
		<td>
			<?php echo h($jockey['Jockey']['id']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Name'); ?></td>
		<td>
			<?php echo h($jockey['Jockey']['name']); ?>
			&nbsp;
		</td>
		</tr>
	</table>
</div>
