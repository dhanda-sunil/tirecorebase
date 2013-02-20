<div class="manufacturerPlants view">
    
    <div class="actions">
        <div class="navbar">
            <div class="navbar-inner">
            <ul class="nav">
                <a class="brand" href="#">Actions</a>
    		<li><?php echo $this->Html->link(__('Edit Manufacturer Plant'), array('action' => 'edit', $manufacturerPlant['ManufacturerPlant']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Manufacturer Plant'), array('action' => 'delete', $manufacturerPlant['ManufacturerPlant']['id']), null, __('Are you sure you want to delete # %s?', $manufacturerPlant['ManufacturerPlant']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Manufacturer Plants'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Manufacturer Plant'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Manufacturers'), array('controller' => 'manufacturers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Manufacturer'), array('controller' => 'manufacturers', 'action' => 'add')); ?> </li>
            </ul>
            </div>
        </div>
    </div>
    
	<table class="table table-bordered">
		<tr>
		<td><?php echo __('Id'); ?></td>
		<td>
			<?php echo h($manufacturerPlant['ManufacturerPlant']['id']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td width="300px"><?php echo __('Manufacturer'); ?></td>
		<td>
			<?php echo $this->Html->link($manufacturerPlant['Manufacturer']['name'], array('controller' => 'manufacturers', 'action' => 'view', $manufacturerPlant['Manufacturer']['id'])); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Code'); ?></td>
		<td>
			<?php echo h($manufacturerPlant['ManufacturerPlant']['code']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('City'); ?></td>
		<td>
			<?php echo h($manufacturerPlant['ManufacturerPlant']['city']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('State'); ?></td>
		<td>
			<?php echo h($manufacturerPlant['ManufacturerPlant']['state']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Country'); ?></td>
		<td>
			<?php echo h($manufacturerPlant['ManufacturerPlant']['country']); ?>
			&nbsp;
		</td>
		</tr>
	</table>
</div>
