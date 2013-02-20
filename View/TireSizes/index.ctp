<div class="tireSizes">
    <div class="navbar">
        <div class="navbar-inner">
        <ul class="nav">
            <a class="brand" href="#">Actions</a>
            <li><?php echo $this->Html->link(__('New Tire Size'), array('action' => 'add')); ?></li>
    		<li><?php echo $this->Html->link(__('List Casings'), array('controller' => 'casings', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Casing'), array('controller' => 'casings', 'action' => 'add')); ?> </li>
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
			<th><?php echo $this->Paginator->sort('two_char_code'); ?></th>
			<th><?php echo $this->Paginator->sort('size_code'); ?></th>
			<th><?php echo $this->Paginator->sort('dot_primary'); ?></th>
			<th><?php echo $this->Paginator->sort('dot_secondary'); ?></th>
			<th><?php echo $this->Paginator->sort('dot_tertiary'); ?></th>
			<th><?php echo $this->Paginator->sort('size_group'); ?></th>
			<th><?php echo $this->Paginator->sort('stock_status'); ?></th>
			<th><?php echo $this->Paginator->sort('buff_circ'); ?></th>
			<th><?php echo $this->Paginator->sort('rim_size'); ?></th>
			<th><?php echo $this->Paginator->sort('cross_section'); ?></th>
			<th><?php echo $this->Paginator->sort('bead_setting'); ?></th>
			<th><?php echo $this->Paginator->sort('scale_min'); ?></th>
			<th><?php echo $this->Paginator->sort('scale_max'); ?></th>
			<th><?php echo $this->Paginator->sort('width'); ?></th>
			<th><?php echo $this->Paginator->sort('aspect_ratio'); ?></th>
			<th><?php echo $this->Paginator->sort('diameter'); ?></th>
			<th><?php echo $this->Paginator->sort('std_base_width'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
    </thead>
    <tbody>
	<?php
	foreach ($tireSizes as $tireSize): ?>
	<tr>
		<td><?php echo h($tireSize['TireSize']['id']); ?>&nbsp;</td>
		<td><?php echo h($tireSize['TireSize']['two_char_code']); ?>&nbsp;</td>
		<td><?php echo h($tireSize['TireSize']['size_code']); ?>&nbsp;</td>
		<td><?php echo h($tireSize['TireSize']['dot_primary']); ?>&nbsp;</td>
		<td><?php echo h($tireSize['TireSize']['dot_secondary']); ?>&nbsp;</td>
		<td><?php echo h($tireSize['TireSize']['dot_tertiary']); ?>&nbsp;</td>
		<td><?php echo h($tireSize['TireSize']['size_group']); ?>&nbsp;</td>
		<td><?php echo h($tireSize['TireSize']['stock_status']); ?>&nbsp;</td>
		<td><?php echo h($tireSize['TireSize']['buff_circ']); ?>&nbsp;</td>
		<td><?php echo h($tireSize['TireSize']['rim_size']); ?>&nbsp;</td>
		<td><?php echo h($tireSize['TireSize']['cross_section']); ?>&nbsp;</td>
		<td><?php echo h($tireSize['TireSize']['bead_setting']); ?>&nbsp;</td>
		<td><?php echo h($tireSize['TireSize']['scale_min']); ?>&nbsp;</td>
		<td><?php echo h($tireSize['TireSize']['scale_max']); ?>&nbsp;</td>
		<td><?php echo h($tireSize['TireSize']['width']); ?>&nbsp;</td>
		<td><?php echo h($tireSize['TireSize']['aspect_ratio']); ?>&nbsp;</td>
		<td><?php echo h($tireSize['TireSize']['diameter']); ?>&nbsp;</td>
		<td><?php echo h($tireSize['TireSize']['std_base_width']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__(' '), array('action' => 'view', $tireSize['TireSize']['id']), array('class'=>'icon-search', 'title'=>'View')); ?>
			<?php echo $this->Html->link(__(' '), array('action' => 'edit', $tireSize['TireSize']['id']), array('class' => 'icon-edit', 'title'=>'Edit')); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $tireSize['TireSize']['id']), null, __('Are you sure you want to delete # %s?', $tireSize['TireSize']['id'])); ?>
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