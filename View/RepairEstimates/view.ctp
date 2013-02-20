<div class="repairEstimates view">
    
    <div class="actions">
        <div class="navbar">
            <div class="navbar-inner">
            <ul class="nav">
                <a class="brand" href="#">Actions</a>
    		<li><?php echo $this->Html->link(__('Edit Repair Estimate'), array('action' => 'edit', $repairEstimate['RepairEstimate']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Repair Estimate'), array('action' => 'delete', $repairEstimate['RepairEstimate']['id']), null, __('Are you sure you want to delete # %s?', $repairEstimate['RepairEstimate']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Repair Estimates'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Repair Estimate'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Casings'), array('controller' => 'casings', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Casing'), array('controller' => 'casings', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Repair Types'), array('controller' => 'repair_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Repair Type'), array('controller' => 'repair_types', 'action' => 'add')); ?> </li>
            </ul>
            </div>
        </div>
    </div>
    
	<table class="table table-bordered">
		<tr>
		<td><?php echo __('Id'); ?></td>
		<td>
			<?php echo h($repairEstimate['RepairEstimate']['id']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td width="300px"><?php echo __('Casing'); ?></td>
		<td>
			<?php echo $this->Html->link($repairEstimate['Casing']['id'], array('controller' => 'casings', 'action' => 'view', $repairEstimate['Casing']['id'])); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td width="300px"><?php echo __('Repair Type'); ?></td>
		<td>
			<?php echo $this->Html->link($repairEstimate['RepairType']['name'], array('controller' => 'repair_types', 'action' => 'view', $repairEstimate['RepairType']['id'])); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Existing'); ?></td>
		<td>
			<?php echo h($repairEstimate['RepairEstimate']['existing']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('New'); ?></td>
		<td>
			<?php echo h($repairEstimate['RepairEstimate']['new']); ?>
			&nbsp;
		</td>
		</tr>
	</table>
</div>
