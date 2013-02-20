<div class="casings">
    <div class="navbar">
        <div class="navbar-inner">
        <ul class="nav">
            <a class="brand" href="#">Actions</a>
            <li><?php echo $this->Html->link(__('New Casing'), array('action' => 'add')); ?></li>
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
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="pagination">
        <ul>
	<?php
		echo $this->Paginator->prev('' . __('Prev'), array('tag'=>'li'), null, array('class' => 'prev'));
		echo $this->Paginator->numbers(array('separator' => '', 'tag'=>'li','currentClass'=>'currentPage'));
		echo $this->Paginator->next(__('Next') . '', array('tag'=>'li'), null, array('class' => 'next'));
	?>
        </ul>
	</div>
	<table cellpadding="0" cellspacing="0" class="table table-striped">
    <thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('manufacturer_plant_id'); ?></th>
			<th><?php echo $this->Paginator->sort('tire_size_id'); ?></th>
			<th><?php echo $this->Paginator->sort('manufacturer_product_line_id'); ?></th>
			<th><?php echo $this->Paginator->sort('production_week'); ?></th>
			<th><?php echo $this->Paginator->sort('barcode'); ?></th>
			<th><?php echo $this->Paginator->sort('customer_id'); ?></th>
			<th><?php echo $this->Paginator->sort('customer_tag'); ?></th>
			<th><?php echo $this->Paginator->sort('rfid'); ?></th>
			<th><?php echo $this->Paginator->sort('tread_design_id'); ?></th>
			<th><?php echo $this->Paginator->sort('grade'); ?></th>
			<th><?php echo $this->Paginator->sort('checking'); ?></th>
			<th><?php echo $this->Paginator->sort('previous_caps'); ?></th>
			<th><?php echo $this->Paginator->sort('remaining_tread'); ?></th>
			<th><?php echo $this->Paginator->sort('tread_width_id'); ?></th>
			<th><?php echo $this->Paginator->sort('mold_type_id'); ?></th>
			<th><?php echo $this->Paginator->sort('buff_radius'); ?></th>
			<th><?php echo $this->Paginator->sort('nrt_code_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
    </thead>
    <tbody>
	<?php
	foreach ($casings as $casing): ?>
	<tr>
		<td><?php echo h($casing['Casing']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($casing['ManufacturerPlant']['name'], array('controller' => 'manufacturer_plants', 'action' => 'view', $casing['ManufacturerPlant']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($casing['TireSize']['id'], array('controller' => 'tire_sizes', 'action' => 'view', $casing['TireSize']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($casing['ManufacturerProductLine']['name'], array('controller' => 'manufacturer_product_lines', 'action' => 'view', $casing['ManufacturerProductLine']['id'])); ?>
		</td>
		<td><?php echo h($casing['Casing']['production_week']); ?>&nbsp;</td>
		<td><?php echo h($casing['Casing']['barcode']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($casing['Customer']['company_name'], array('controller' => 'customers', 'action' => 'view', $casing['Customer']['id'])); ?>
		</td>
		<td><?php echo h($casing['Casing']['customer_tag']); ?>&nbsp;</td>
		<td><?php echo h($casing['Casing']['rfid']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($casing['TreadDesign']['name'], array('controller' => 'tread_designs', 'action' => 'view', $casing['TreadDesign']['id'])); ?>
		</td>
		<td><?php echo h($casing['Casing']['grade']); ?>&nbsp;</td>
		<td><?php echo h($casing['Casing']['checking']); ?>&nbsp;</td>
		<td><?php echo h($casing['Casing']['previous_caps']); ?>&nbsp;</td>
		<td><?php echo h($casing['Casing']['remaining_tread']); ?>&nbsp;</td>
		<td><?php echo h($casing['Casing']['tread_width_id']); ?>&nbsp;</td>
		<td><?php echo h($casing['Casing']['mold_type_id']); ?>&nbsp;</td>
		<td><?php echo h($casing['Casing']['buff_radius']); ?>&nbsp;</td>
		<td><?php echo h($casing['Casing']['nrt_code_id']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__(' '), array('action' => 'view', $casing['Casing']['id']), array('class'=>'icon-search', 'title'=>'View')); ?>
			<?php echo $this->Html->link(__(' '), array('action' => 'edit', $casing['Casing']['id']), array('class' => 'icon-edit', 'title'=>'Edit')); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $casing['Casing']['id']), null, __('Are you sure you want to delete # %s?', $casing['Casing']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
    </tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="pagination">
        <ul>
	<?php
		echo $this->Paginator->prev('' . __('Prev'), array('tag'=>'li'), null, array('class' => 'prev'));
		echo $this->Paginator->numbers(array('separator' => '', 'tag'=>'li','currentClass'=>'currentPage'));
		echo $this->Paginator->next(__('Next') . '', array('tag'=>'li'), null, array('class' => 'next'));
	?>
        </ul>
	</div>
</div>
<script>
    $('.icon-search').tooltip();
    $('.icon-edit').tooltip();
    $('.icon-remove').tooltip();
    if($('.currentPage')){
        $('.currentPage').html('<a class="currentPage">'+$('.currentPage').html()+'</a>')
    }
    if($('.prev').prop('tagName').toLowerCase() == 'span'){
        $('.prev').replaceWith('<li><a style="color:#ccc">prev</a></li>')
    }
    if($('.next').prop('tagName').toLowerCase() == 'span'){
        $('.next').replaceWith('<li><a style="color:#ccc">next</a></li>')
    }
</script>