<div class="casings view">
    
    <div class="actions">
        <div class="navbar">
            <div class="navbar-inner">
            <ul class="nav">
                <a class="brand" href="#">Actions</a>
    		<li><?php echo $this->Html->link(__('Edit Casing'), array('action' => 'edit', $casing['Casing']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Casing'), array('action' => 'delete', $casing['Casing']['id']), null, __('Are you sure you want to delete # %s?', $casing['Casing']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Casings'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Casing'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Manufacturer Plants'), array('controller' => 'manufacturer_plants', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Manufacturer Plant'), array('controller' => 'manufacturer_plants', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tire Sizes'), array('controller' => 'tire_sizes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tire Size'), array('controller' => 'tire_sizes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Manufacturer Product Lines'), array('controller' => 'manufacturer_product_lines', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Manufacturer Product Line'), array('controller' => 'manufacturer_product_lines', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Customers'), array('controller' => 'customers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Customer'), array('controller' => 'customers', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tread Designs'), array('controller' => 'tread_designs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tread Design'), array('controller' => 'tread_designs', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Casing Logs'), array('controller' => 'casing_logs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Casing Log'), array('controller' => 'casing_logs', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Casing Repairs'), array('controller' => 'casing_repairs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Casing Repair'), array('controller' => 'casing_repairs', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Finished Goods'), array('controller' => 'finished_goods', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Finished Good'), array('controller' => 'finished_goods', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Co Items'), array('controller' => 'co_items', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Co Item'), array('controller' => 'co_items', 'action' => 'add')); ?> </li>
            </ul>
            </div>
        </div>
    </div>
    
	<table class="table table-bordered">
		<tr>
		<td><?php echo __('Id'); ?></td>
		<td>
			<?php echo h($casing['Casing']['id']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td width="300px"><?php echo __('Manufacturer Plant'); ?></td>
		<td>
			<?php echo $this->Html->link($casing['ManufacturerPlant']['name'], array('controller' => 'manufacturer_plants', 'action' => 'view', $casing['ManufacturerPlant']['id'])); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td width="300px"><?php echo __('Tire Size'); ?></td>
		<td>
			<?php echo $this->Html->link($casing['TireSize']['id'], array('controller' => 'tire_sizes', 'action' => 'view', $casing['TireSize']['id'])); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td width="300px"><?php echo __('Manufacturer Product Line'); ?></td>
		<td>
			<?php echo $this->Html->link($casing['ManufacturerProductLine']['name'], array('controller' => 'manufacturer_product_lines', 'action' => 'view', $casing['ManufacturerProductLine']['id'])); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Production Week'); ?></td>
		<td>
			<?php echo h($casing['Casing']['production_week']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Barcode'); ?></td>
		<td>
			<?php echo h($casing['Casing']['barcode']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td width="300px"><?php echo __('Customer'); ?></td>
		<td>
			<?php echo $this->Html->link($casing['Customer']['company_name'], array('controller' => 'customers', 'action' => 'view', $casing['Customer']['id'])); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Customer Tag'); ?></td>
		<td>
			<?php echo h($casing['Casing']['customer_tag']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Rfid'); ?></td>
		<td>
			<?php echo h($casing['Casing']['rfid']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td width="300px"><?php echo __('Tread Design'); ?></td>
		<td>
			<?php echo $this->Html->link($casing['TreadDesign']['name'], array('controller' => 'tread_designs', 'action' => 'view', $casing['TreadDesign']['id'])); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Grade'); ?></td>
		<td>
			<?php echo h($casing['Casing']['grade']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Checking'); ?></td>
		<td>
			<?php echo h($casing['Casing']['checking']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Previous Caps'); ?></td>
		<td>
			<?php echo h($casing['Casing']['previous_caps']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Remaining Tread'); ?></td>
		<td>
			<?php echo h($casing['Casing']['remaining_tread']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Tread Width Id'); ?></td>
		<td>
			<?php echo h($casing['Casing']['tread_width_id']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Mold Type Id'); ?></td>
		<td>
			<?php echo h($casing['Casing']['mold_type_id']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Buff Radius'); ?></td>
		<td>
			<?php echo h($casing['Casing']['buff_radius']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Nrt Code Id'); ?></td>
		<td>
			<?php echo h($casing['Casing']['nrt_code_id']); ?>
			&nbsp;
		</td>
		</tr>
	</table>
</div>
<div class="related">
	<h3><?php echo __('Related Casing Logs'); ?></h3>
	<?php if (!empty($casing['CasingLog'])): ?>
	<table cellpadding = "0" cellspacing = "0" class="table table-striped">
    <thead>
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Casing Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Checkpoint Id'); ?></th>
		<th><?php echo __('Nrt Code Id'); ?></th>
		<th><?php echo __('Created Date'); ?></th>
		<th><?php echo __('Created Time'); ?></th>
		<th><?php echo __('Event Type'); ?></th>
		<th><?php echo __('Description'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
    </thead>
    <tbody>
	<?php
		$i = 0;
		foreach ($casing['CasingLog'] as $casingLog): ?>
		<tr>
			<td><?php echo $casingLog['id']; ?></td>
			<td><?php echo $casingLog['casing_id']; ?></td>
			<td><?php echo $casingLog['user_id']; ?></td>
			<td><?php echo $casingLog['checkpoint_id']; ?></td>
			<td><?php echo $casingLog['nrt_code_id']; ?></td>
			<td><?php echo $casingLog['created_date']; ?></td>
			<td><?php echo $casingLog['created_time']; ?></td>
			<td><?php echo $casingLog['event_type']; ?></td>
			<td><?php echo $casingLog['description']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'casing_logs', 'action' => 'view', $casingLog['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'casing_logs', 'action' => 'edit', $casingLog['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'casing_logs', 'action' => 'delete', $casingLog['id']), null, __('Are you sure you want to delete # %s?', $casingLog['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
    </tbody>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Casing Log'), array('controller' => 'casing_logs', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Casing Repairs'); ?></h3>
	<?php if (!empty($casing['CasingRepair'])): ?>
	<table cellpadding = "0" cellspacing = "0" class="table table-striped">
    <thead>
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Casing Id'); ?></th>
		<th><?php echo __('Material Id'); ?></th>
		<th><?php echo __('Quantity'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
    </thead>
    <tbody>
	<?php
		$i = 0;
		foreach ($casing['CasingRepair'] as $casingRepair): ?>
		<tr>
			<td><?php echo $casingRepair['id']; ?></td>
			<td><?php echo $casingRepair['casing_id']; ?></td>
			<td><?php echo $casingRepair['material_id']; ?></td>
			<td><?php echo $casingRepair['quantity']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'casing_repairs', 'action' => 'view', $casingRepair['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'casing_repairs', 'action' => 'edit', $casingRepair['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'casing_repairs', 'action' => 'delete', $casingRepair['id']), null, __('Are you sure you want to delete # %s?', $casingRepair['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
    </tbody>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Casing Repair'), array('controller' => 'casing_repairs', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Finished Goods'); ?></h3>
	<?php if (!empty($casing['FinishedGood'])): ?>
	<table cellpadding = "0" cellspacing = "0" class="table table-striped">
    <thead>
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Casing Id'); ?></th>
		<th><?php echo __('Fg Code'); ?></th>
		<th><?php echo __('Stock Status'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
    </thead>
    <tbody>
	<?php
		$i = 0;
		foreach ($casing['FinishedGood'] as $finishedGood): ?>
		<tr>
			<td><?php echo $finishedGood['id']; ?></td>
			<td><?php echo $finishedGood['casing_id']; ?></td>
			<td><?php echo $finishedGood['fg_code']; ?></td>
			<td><?php echo $finishedGood['stock_status']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'finished_goods', 'action' => 'view', $finishedGood['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'finished_goods', 'action' => 'edit', $finishedGood['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'finished_goods', 'action' => 'delete', $finishedGood['id']), null, __('Are you sure you want to delete # %s?', $finishedGood['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
    </tbody>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Finished Good'), array('controller' => 'finished_goods', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Co Items'); ?></h3>
	<?php if (!empty($casing['CoItem'])): ?>
	<table cellpadding = "0" cellspacing = "0" class="table table-striped">
    <thead>
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Co Id'); ?></th>
		<th><?php echo __('Line Number'); ?></th>
		<th><?php echo __('Line Suffix'); ?></th>
		<th><?php echo __('Casing Id'); ?></th>
		<th><?php echo __('Desc'); ?></th>
		<th><?php echo __('Status'); ?></th>
		<th><?php echo __('Co Item Type Id'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Modified By'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Created By'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
    </thead>
    <tbody>
	<?php
		$i = 0;
		foreach ($casing['CoItem'] as $coItem): ?>
		<tr>
			<td><?php echo $coItem['id']; ?></td>
			<td><?php echo $coItem['co_id']; ?></td>
			<td><?php echo $coItem['line_number']; ?></td>
			<td><?php echo $coItem['line_suffix']; ?></td>
			<td><?php echo $coItem['casing_id']; ?></td>
			<td><?php echo $coItem['desc']; ?></td>
			<td><?php echo $coItem['status']; ?></td>
			<td><?php echo $coItem['co_item_type_id']; ?></td>
			<td><?php echo $coItem['modified']; ?></td>
			<td><?php echo $coItem['modified_by']; ?></td>
			<td><?php echo $coItem['created']; ?></td>
			<td><?php echo $coItem['created_by']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'co_items', 'action' => 'view', $coItem['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'co_items', 'action' => 'edit', $coItem['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'co_items', 'action' => 'delete', $coItem['id']), null, __('Are you sure you want to delete # %s?', $coItem['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
    </tbody>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Co Item'), array('controller' => 'co_items', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
