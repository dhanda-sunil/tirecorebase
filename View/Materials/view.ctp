<div class="materials view">
    
    <div class="actions">
        <div class="navbar">
            <div class="navbar-inner">
            <ul class="nav">
                <a class="brand" href="#">Actions</a>
    		<li><?php echo $this->Html->link(__('Edit Material'), array('action' => 'edit', $material['Material']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Material'), array('action' => 'delete', $material['Material']['id']), null, __('Are you sure you want to delete # %s?', $material['Material']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Materials'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Material'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Vendor Items'), array('controller' => 'vendor_items', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Vendor Item'), array('controller' => 'vendor_items', 'action' => 'add')); ?> </li>
            </ul>
            </div>
        </div>
    </div>
    
	<table class="table table-bordered">
		<tr>
		<td><?php echo __('Id'); ?></td>
		<td>
			<?php echo h($material['Material']['id']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Material Uom'); ?></td>
		<td>
			<?php echo h($material['Material']['material_uom']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Material Type'); ?></td>
		<td>
			<?php echo h($material['Material']['material_type']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td width="300px"><?php echo __('Vendor Item'); ?></td>
		<td>
			<?php echo $this->Html->link($material['VendorItem']['name'], array('controller' => 'vendor_items', 'action' => 'view', $material['VendorItem']['id'])); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Repair Type Id'); ?></td>
		<td>
			<?php echo h($material['Material']['repair_type_id']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Name'); ?></td>
		<td>
			<?php echo h($material['Material']['name']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Part Number'); ?></td>
		<td>
			<?php echo h($material['Material']['part_number']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Manf Part Number'); ?></td>
		<td>
			<?php echo h($material['Material']['manf_part_number']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Tread Width Id'); ?></td>
		<td>
			<?php echo h($material['Material']['tread_width_id']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Tread Width Unit'); ?></td>
		<td>
			<?php echo h($material['Material']['tread_width_unit']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Dot Code'); ?></td>
		<td>
			<?php echo h($material['Material']['dot_code']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Density'); ?></td>
		<td>
			<?php echo h($material['Material']['density']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Tread Design Id'); ?></td>
		<td>
			<?php echo h($material['Material']['tread_design_id']); ?>
			&nbsp;
		</td>
		</tr>
	</table>
</div>
