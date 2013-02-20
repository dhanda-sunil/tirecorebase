<div class="nrtCodes view">
    
    <div class="actions">
        <div class="navbar">
            <div class="navbar-inner">
            <ul class="nav">
                <a class="brand" href="#">Actions</a>
    		<li><?php echo $this->Html->link(__('Edit Nrt Code'), array('action' => 'edit', $nrtCode['NrtCode']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Nrt Code'), array('action' => 'delete', $nrtCode['NrtCode']['id']), null, __('Are you sure you want to delete # %s?', $nrtCode['NrtCode']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Nrt Codes'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Nrt Code'), array('action' => 'add')); ?> </li>
            </ul>
            </div>
        </div>
    </div>
    
	<table class="table table-bordered">
		<tr>
		<td><?php echo __('Id'); ?></td>
		<td>
			<?php echo h($nrtCode['NrtCode']['id']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Abbr'); ?></td>
		<td>
			<?php echo h($nrtCode['NrtCode']['abbr']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Category'); ?></td>
		<td>
			<?php echo h($nrtCode['NrtCode']['category']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Name'); ?></td>
		<td>
			<?php echo h($nrtCode['NrtCode']['name']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Description'); ?></td>
		<td>
			<?php echo h($nrtCode['NrtCode']['description']); ?>
			&nbsp;
		</td>
		</tr>
	</table>
</div>
