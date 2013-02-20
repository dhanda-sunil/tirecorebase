<div class="tireSizes view">
    
    <div class="actions">
        <div class="navbar">
            <div class="navbar-inner">
            <ul class="nav">
                <a class="brand" href="#">Actions</a>
    		<li><?php echo $this->Html->link(__('Edit Tire Size'), array('action' => 'edit', $tireSize['TireSize']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Tire Size'), array('action' => 'delete', $tireSize['TireSize']['id']), null, __('Are you sure you want to delete # %s?', $tireSize['TireSize']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Tire Sizes'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tire Size'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Casings'), array('controller' => 'casings', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Casing'), array('controller' => 'casings', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Mold Types'), array('controller' => 'mold_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Mold Type'), array('controller' => 'mold_types', 'action' => 'add')); ?> </li>
            </ul>
            </div>
        </div>
    </div>
    
	<table class="table table-bordered">
		<tr>
		<td><?php echo __('Id'); ?></td>
		<td>
			<?php echo h($tireSize['TireSize']['id']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Two Char Code'); ?></td>
		<td>
			<?php echo h($tireSize['TireSize']['two_char_code']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Size Code'); ?></td>
		<td>
			<?php echo h($tireSize['TireSize']['size_code']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Dot Primary'); ?></td>
		<td>
			<?php echo h($tireSize['TireSize']['dot_primary']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Dot Secondary'); ?></td>
		<td>
			<?php echo h($tireSize['TireSize']['dot_secondary']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Dot Tertiary'); ?></td>
		<td>
			<?php echo h($tireSize['TireSize']['dot_tertiary']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Size Group'); ?></td>
		<td>
			<?php echo h($tireSize['TireSize']['size_group']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Stock Status'); ?></td>
		<td>
			<?php echo h($tireSize['TireSize']['stock_status']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Buff Circ'); ?></td>
		<td>
			<?php echo h($tireSize['TireSize']['buff_circ']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Rim Size'); ?></td>
		<td>
			<?php echo h($tireSize['TireSize']['rim_size']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Cross Section'); ?></td>
		<td>
			<?php echo h($tireSize['TireSize']['cross_section']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Bead Setting'); ?></td>
		<td>
			<?php echo h($tireSize['TireSize']['bead_setting']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Scale Min'); ?></td>
		<td>
			<?php echo h($tireSize['TireSize']['scale_min']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Scale Max'); ?></td>
		<td>
			<?php echo h($tireSize['TireSize']['scale_max']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Width'); ?></td>
		<td>
			<?php echo h($tireSize['TireSize']['width']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Aspect Ratio'); ?></td>
		<td>
			<?php echo h($tireSize['TireSize']['aspect_ratio']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Diameter'); ?></td>
		<td>
			<?php echo h($tireSize['TireSize']['diameter']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Std Base Width'); ?></td>
		<td>
			<?php echo h($tireSize['TireSize']['std_base_width']); ?>
			&nbsp;
		</td>
		</tr>
	</table>
</div>
<div class="related">
	<h3><?php echo __('Related Casings'); ?></h3>
	<?php if (!empty($tireSize['Casing'])): ?>
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
		foreach ($tireSize['Casing'] as $casing): ?>
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
	<?php if (!empty($tireSize['MoldType'])): ?>
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
		foreach ($tireSize['MoldType'] as $moldType): ?>
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
