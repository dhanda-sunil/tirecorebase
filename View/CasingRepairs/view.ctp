<div class="casingRepairs view">
    
    <div class="actions">
        <div class="navbar">
            <div class="navbar-inner">
            <ul class="nav">
                <a class="brand" href="#">Actions</a>
    		<li><?php echo $this->Html->link(__('Edit Casing Repair'), array('action' => 'edit', $casingRepair['CasingRepair']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Casing Repair'), array('action' => 'delete', $casingRepair['CasingRepair']['id']), null, __('Are you sure you want to delete # %s?', $casingRepair['CasingRepair']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Casing Repairs'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Casing Repair'), array('action' => 'add')); ?> </li>
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
			<?php echo h($casingRepair['CasingRepair']['id']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td width="300px"><?php echo __('Casing'); ?></td>
		<td>
			<?php echo $this->Html->link($casingRepair['Casing']['id'], array('controller' => 'casings', 'action' => 'view', $casingRepair['Casing']['id'])); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td width="300px"><?php echo __('Material'); ?></td>
		<td>
			<?php echo $this->Html->link($casingRepair['Material']['name'], array('controller' => 'materials', 'action' => 'view', $casingRepair['Material']['id'])); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Quantity'); ?></td>
		<td>
			<?php echo h($casingRepair['CasingRepair']['quantity']); ?>
			&nbsp;
		</td>
		</tr>
	</table>
</div>
