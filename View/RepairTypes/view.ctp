<div class="repairTypes view">
    
    <div class="actions">
        <div class="navbar">
            <div class="navbar-inner">
            <ul class="nav">
                <a class="brand" href="#">Actions</a>
    		<li><?php echo $this->Html->link(__('Edit Repair Type'), array('action' => 'edit', $repairType['RepairType']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Repair Type'), array('action' => 'delete', $repairType['RepairType']['id']), null, __('Are you sure you want to delete # %s?', $repairType['RepairType']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Repair Types'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Repair Type'), array('action' => 'add')); ?> </li>
            </ul>
            </div>
        </div>
    </div>
    
	<table class="table table-bordered">
		<tr>
		<td><?php echo __('Id'); ?></td>
		<td>
			<?php echo h($repairType['RepairType']['id']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Name'); ?></td>
		<td>
			<?php echo h($repairType['RepairType']['name']); ?>
			&nbsp;
		</td>
		</tr>
	</table>
</div>
