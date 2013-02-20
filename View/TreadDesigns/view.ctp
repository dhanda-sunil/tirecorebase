<div class="treadDesigns view">
    
    <div class="actions">
        <div class="navbar">
            <div class="navbar-inner">
            <ul class="nav">
                <a class="brand" href="#">Actions</a>
    		<li><?php echo $this->Html->link(__('Edit Tread Design'), array('action' => 'edit', $treadDesign['TreadDesign']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Tread Design'), array('action' => 'delete', $treadDesign['TreadDesign']['id']), null, __('Are you sure you want to delete # %s?', $treadDesign['TreadDesign']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Tread Designs'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tread Design'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Vendors'), array('controller' => 'vendors', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Vendor'), array('controller' => 'vendors', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Casings'), array('controller' => 'casings', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Casing'), array('controller' => 'casings', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Mold Types'), array('controller' => 'mold_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Mold Type'), array('controller' => 'mold_types', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tread Design Tread Widths'), array('controller' => 'tread_design_tread_widths', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tread Design Tread Width'), array('controller' => 'tread_design_tread_widths', 'action' => 'add')); ?> </li>
            </ul>
            </div>
        </div>
    </div>
    
	<table class="table table-bordered">
		<tr>
		<td><?php echo __('Id'); ?></td>
		<td>
			<?php echo h($treadDesign['TreadDesign']['id']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Tread Abb'); ?></td>
		<td>
			<?php echo h($treadDesign['TreadDesign']['tread_abb']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Name'); ?></td>
		<td>
			<?php echo h($treadDesign['TreadDesign']['name']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Xref'); ?></td>
		<td>
			<?php echo h($treadDesign['TreadDesign']['xref']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Stock Status'); ?></td>
		<td>
			<?php echo h($treadDesign['TreadDesign']['stock_status']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td width="300px"><?php echo __('Vendor'); ?></td>
		<td>
			<?php echo $this->Html->link($treadDesign['Vendor']['name'], array('controller' => 'vendors', 'action' => 'view', $treadDesign['Vendor']['id'])); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Image'); ?></td>
		<td>
			<?php echo h($treadDesign['TreadDesign']['image']); ?>
			&nbsp;
		</td>
		</tr>
	</table>
</div>
<div class="related">
	<h3><?php echo __('Related Casings'); ?></h3>
	<?php if (!empty($treadDesign['Casing'])): ?>
	<table cellpadding = "0" cellspacing = "0" class="table table-striped">
    <thead>
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Manufacturer Plant Id'); ?></th>
		<th><?php echo __('Tire Size Id'); ?></th>
		<th><?php echo __('Manufacturer Product Line Id'); ?></th>
		<th><?php echo __('Production Week'); ?></th>
		<th><?php echo __('Barcode'); ?></th>
		<th><?php echo __('Customer Id'); ?></th>
		<th><?php echo __('Customer Tag'); ?></th>
		<th><?php echo __('Rfid'); ?></th>
		<th><?php echo __('Tread Design Id'); ?></th>
		<th><?php echo __('Grade'); ?></th>
		<th><?php echo __('Checking'); ?></th>
		<th><?php echo __('Previous Caps'); ?></th>
		<th><?php echo __('Remaining Tread'); ?></th>
		<th><?php echo __('Tread Width Id'); ?></th>
		<th><?php echo __('Mold Type Id'); ?></th>
		<th><?php echo __('Buff Radius'); ?></th>
		<th><?php echo __('Nrt Code Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
    </thead>
    <tbody>
	<?php
		$i = 0;
		foreach ($treadDesign['Casing'] as $casing): ?>
		<tr>
			<td><?php echo $casing['id']; ?></td>
			<td><?php echo $casing['manufacturer_plant_id']; ?></td>
			<td><?php echo $casing['tire_size_id']; ?></td>
			<td><?php echo $casing['manufacturer_product_line_id']; ?></td>
			<td><?php echo $casing['production_week']; ?></td>
			<td><?php echo $casing['barcode']; ?></td>
			<td><?php echo $casing['customer_id']; ?></td>
			<td><?php echo $casing['customer_tag']; ?></td>
			<td><?php echo $casing['rfid']; ?></td>
			<td><?php echo $casing['tread_design_id']; ?></td>
			<td><?php echo $casing['grade']; ?></td>
			<td><?php echo $casing['checking']; ?></td>
			<td><?php echo $casing['previous_caps']; ?></td>
			<td><?php echo $casing['remaining_tread']; ?></td>
			<td><?php echo $casing['tread_width_id']; ?></td>
			<td><?php echo $casing['mold_type_id']; ?></td>
			<td><?php echo $casing['buff_radius']; ?></td>
			<td><?php echo $casing['nrt_code_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'casings', 'action' => 'view', $casing['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'casings', 'action' => 'edit', $casing['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'casings', 'action' => 'delete', $casing['id']), null, __('Are you sure you want to delete # %s?', $casing['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
    </tbody>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Casing'), array('controller' => 'casings', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Mold Types'); ?></h3>
	<?php if (!empty($treadDesign['MoldType'])): ?>
	<table cellpadding = "0" cellspacing = "0" class="table table-striped">
    <thead>
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Tread Design Id'); ?></th>
		<th><?php echo __('Tire Size Id'); ?></th>
		<th><?php echo __('Code'); ?></th>
		<th><?php echo __('Stock Status'); ?></th>
		<th><?php echo __('Description'); ?></th>
		<th><?php echo __('Lifetime'); ?></th>
		<th><?php echo __('Bead Plate'); ?></th>
		<th><?php echo __('Mold Cavity'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
    </thead>
    <tbody>
	<?php
		$i = 0;
		foreach ($treadDesign['MoldType'] as $moldType): ?>
		<tr>
			<td><?php echo $moldType['id']; ?></td>
			<td><?php echo $moldType['tread_design_id']; ?></td>
			<td><?php echo $moldType['tire_size_id']; ?></td>
			<td><?php echo $moldType['code']; ?></td>
			<td><?php echo $moldType['stock_status']; ?></td>
			<td><?php echo $moldType['description']; ?></td>
			<td><?php echo $moldType['lifetime']; ?></td>
			<td><?php echo $moldType['bead_plate']; ?></td>
			<td><?php echo $moldType['mold_cavity']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'mold_types', 'action' => 'view', $moldType['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'mold_types', 'action' => 'edit', $moldType['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'mold_types', 'action' => 'delete', $moldType['id']), null, __('Are you sure you want to delete # %s?', $moldType['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
    </tbody>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Mold Type'), array('controller' => 'mold_types', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Tread Design Tread Widths'); ?></h3>
	<?php if (!empty($treadDesign['TreadDesignTreadWidth'])): ?>
	<table cellpadding = "0" cellspacing = "0" class="table table-striped">
    <thead>
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Tread Design Id'); ?></th>
		<th><?php echo __('Tread Width Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
    </thead>
    <tbody>
	<?php
		$i = 0;
		foreach ($treadDesign['TreadDesignTreadWidth'] as $treadDesignTreadWidth): ?>
		<tr>
			<td><?php echo $treadDesignTreadWidth['id']; ?></td>
			<td><?php echo $treadDesignTreadWidth['tread_design_id']; ?></td>
			<td><?php echo $treadDesignTreadWidth['tread_width_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'tread_design_tread_widths', 'action' => 'view', $treadDesignTreadWidth['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'tread_design_tread_widths', 'action' => 'edit', $treadDesignTreadWidth['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'tread_design_tread_widths', 'action' => 'delete', $treadDesignTreadWidth['id']), null, __('Are you sure you want to delete # %s?', $treadDesignTreadWidth['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
    </tbody>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Tread Design Tread Width'), array('controller' => 'tread_design_tread_widths', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
