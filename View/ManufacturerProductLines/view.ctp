<div class="manufacturerProductLines view">
    
    <div class="actions">
        <div class="navbar">
            <div class="navbar-inner">
            <ul class="nav">
                <a class="brand" href="#">Actions</a>
    		<li><?php echo $this->Html->link(__('Edit Manufacturer Product Line'), array('action' => 'edit', $manufacturerProductLine['ManufacturerProductLine']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Manufacturer Product Line'), array('action' => 'delete', $manufacturerProductLine['ManufacturerProductLine']['id']), null, __('Are you sure you want to delete # %s?', $manufacturerProductLine['ManufacturerProductLine']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Manufacturer Product Lines'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Manufacturer Product Line'), array('action' => 'add')); ?> </li>
            </ul>
            </div>
        </div>
    </div>
    
	<table class="table table-bordered">
		<tr>
		<td><?php echo __('Id'); ?></td>
		<td>
			<?php echo h($manufacturerProductLine['ManufacturerProductLine']['id']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Manufacturer Plant Id'); ?></td>
		<td>
			<?php echo h($manufacturerProductLine['ManufacturerProductLine']['manufacturer_plant_id']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Manufacturers Products Lines Group Id'); ?></td>
		<td>
			<?php echo h($manufacturerProductLine['ManufacturerProductLine']['manufacturers_products_lines_group_id']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Is Material'); ?></td>
		<td>
			<?php echo h($manufacturerProductLine['ManufacturerProductLine']['is_material']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Dot Code'); ?></td>
		<td>
			<?php echo h($manufacturerProductLine['ManufacturerProductLine']['dot_code']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Name'); ?></td>
		<td>
			<?php echo h($manufacturerProductLine['ManufacturerProductLine']['name']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Order'); ?></td>
		<td>
			<?php echo h($manufacturerProductLine['ManufacturerProductLine']['order']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Material Size List'); ?></td>
		<td>
			<?php echo h($manufacturerProductLine['ManufacturerProductLine']['material_size_list']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Deleted'); ?></td>
		<td>
			<?php echo h($manufacturerProductLine['ManufacturerProductLine']['deleted']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Deleted By'); ?></td>
		<td>
			<?php echo h($manufacturerProductLine['ManufacturerProductLine']['deleted_by']); ?>
			&nbsp;
		</td>
		</tr>
	</table>
</div>
