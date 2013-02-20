<div class="buffSpecs">
    <div class="navbar">
        <div class="navbar-inner">
        <ul class="nav">
            <a class="brand" href="#">Actions</a>
            <li><?php echo $this->Html->link(__('New Buff Spec'), array('action' => 'add')); ?></li>
    		<li><?php echo $this->Html->link(__('List Tire Sizes'), array('controller' => 'tire_sizes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tire Size'), array('controller' => 'tire_sizes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Mold Types'), array('controller' => 'mold_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Mold Type'), array('controller' => 'mold_types', 'action' => 'add')); ?> </li>
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
			<th><?php echo $this->Paginator->sort('program_ref'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('tire_size_id'); ?></th>
			<th><?php echo $this->Paginator->sort('retread_method'); ?></th>
			<th><?php echo $this->Paginator->sort('diameter'); ?></th>
			<th><?php echo $this->Paginator->sort('crown_width'); ?></th>
			<th><?php echo $this->Paginator->sort('radius'); ?></th>
			<th><?php echo $this->Paginator->sort('machine_setting'); ?></th>
			<th><?php echo $this->Paginator->sort('shoulder_radius'); ?></th>
			<th><?php echo $this->Paginator->sort('shoulder_length'); ?></th>
			<th><?php echo $this->Paginator->sort('shoulder_angle'); ?></th>
			<th><?php echo $this->Paginator->sort('steel_belt'); ?></th>
			<th><?php echo $this->Paginator->sort('shoulder_brushing'); ?></th>
			<th><?php echo $this->Paginator->sort('bead_width'); ?></th>
			<th><?php echo $this->Paginator->sort('mold_type_id'); ?></th>
			<th><?php echo $this->Paginator->sort('bead_plate_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
    </thead>
    <tbody>
	<?php
	foreach ($buffSpecs as $buffSpec): ?>
	<tr>
		<td><?php echo h($buffSpec['BuffSpec']['id']); ?>&nbsp;</td>
		<td><?php echo h($buffSpec['BuffSpec']['program_ref']); ?>&nbsp;</td>
		<td><?php echo h($buffSpec['BuffSpec']['name']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($buffSpec['TireSize']['size_code'], array('controller' => 'tire_sizes', 'action' => 'view', $buffSpec['TireSize']['id'])); ?>
		</td>
		<td><?php echo h($buffSpec['BuffSpec']['retread_method']); ?>&nbsp;</td>
		<td><?php echo h($buffSpec['BuffSpec']['diameter']); ?>&nbsp;</td>
		<td><?php echo h($buffSpec['BuffSpec']['crown_width']); ?>&nbsp;</td>
		<td><?php echo h($buffSpec['BuffSpec']['radius']); ?>&nbsp;</td>
		<td><?php echo h($buffSpec['BuffSpec']['machine_setting']); ?>&nbsp;</td>
		<td><?php echo h($buffSpec['BuffSpec']['shoulder_radius']); ?>&nbsp;</td>
		<td><?php echo h($buffSpec['BuffSpec']['shoulder_length']); ?>&nbsp;</td>
		<td><?php echo h($buffSpec['BuffSpec']['shoulder_angle']); ?>&nbsp;</td>
		<td><?php echo h($buffSpec['BuffSpec']['steel_belt']); ?>&nbsp;</td>
		<td><?php echo h($buffSpec['BuffSpec']['shoulder_brushing']); ?>&nbsp;</td>
		<td><?php echo h($buffSpec['BuffSpec']['bead_width']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($buffSpec['MoldType']['id'], array('controller' => 'mold_types', 'action' => 'view', $buffSpec['MoldType']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($buffSpec['BeadPlate']['size_code'], array('controller' => 'tire_sizes', 'action' => 'view', $buffSpec['BeadPlate']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__(' '), array('action' => 'view', $buffSpec['BuffSpec']['id']), array('class'=>'icon-search', 'title'=>'View')); ?>
			<?php echo $this->Html->link(__(' '), array('action' => 'edit', $buffSpec['BuffSpec']['id']), array('class' => 'icon-edit', 'title'=>'Edit')); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $buffSpec['BuffSpec']['id']), null, __('Are you sure you want to delete # %s?', $buffSpec['BuffSpec']['id'])); ?>
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