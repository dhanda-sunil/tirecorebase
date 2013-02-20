<div class="repairActuals view">
    
    <div class="actions">
        <div class="navbar">
            <div class="navbar-inner">
            <ul class="nav">
                <a class="brand" href="#">Actions</a>
    		<li><?php echo $this->Html->link(__('Edit Repair Actual'), array('action' => 'edit', $repairActual['RepairActual']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Repair Actual'), array('action' => 'delete', $repairActual['RepairActual']['id']), null, __('Are you sure you want to delete # %s?', $repairActual['RepairActual']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Repair Actuals'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Repair Actual'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Casings'), array('controller' => 'casings', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Casing'), array('controller' => 'casings', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Materials'), array('controller' => 'materials', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Material'), array('controller' => 'materials', 'action' => 'add')); ?> </li>
            </ul>
            </div>
        </div>
    </div>
    
	<table class="table table-bordered">
		<tr>
		<td><?php echo __('Id'); ?></td>
		<td>
			<?php echo h($repairActual['RepairActual']['id']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td width="300px"><?php echo __('Casing'); ?></td>
		<td>
			<?php echo $this->Html->link($repairActual['Casing']['id'], array('controller' => 'casings', 'action' => 'view', $repairActual['Casing']['id'])); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td width="300px"><?php echo __('Material'); ?></td>
		<td>
			<?php echo $this->Html->link($repairActual['Material']['name'], array('controller' => 'materials', 'action' => 'view', $repairActual['Material']['id'])); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Quantity'); ?></td>
		<td>
			<?php echo h($repairActual['RepairActual']['quantity']); ?>
			&nbsp;
		</td>
		</tr>
	</table>
</div>
