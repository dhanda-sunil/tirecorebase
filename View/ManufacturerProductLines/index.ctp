<div class="manufacturerProductLines">
    <div class="navbar">
        <div class="navbar-inner">
        <ul class="nav">
            <a class="brand" href="#">Actions</a>
            <li><?php echo $this->Html->link(__('New Manufacturer Product Line'), array('action' => 'add')); ?></li>
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
			<th><?php echo $this->Paginator->sort('manufacturers_products_lines_group_id'); ?></th>
			<th><?php echo $this->Paginator->sort('is_material'); ?></th>
			<th><?php echo $this->Paginator->sort('dot_code'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('order'); ?></th>
			<th><?php echo $this->Paginator->sort('material_size_list'); ?></th>
			<th><?php echo $this->Paginator->sort('deleted'); ?></th>
			<th><?php echo $this->Paginator->sort('deleted_by'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
    </thead>
    <tbody>
	<?php
	foreach ($manufacturerProductLines as $manufacturerProductLine): ?>
	<tr>
		<td><?php echo h($manufacturerProductLine['ManufacturerProductLine']['id']); ?>&nbsp;</td>
		<td><?php echo h($manufacturerProductLine['ManufacturerProductLine']['manufacturer_plant_id']); ?>&nbsp;</td>
		<td><?php echo h($manufacturerProductLine['ManufacturerProductLine']['manufacturers_products_lines_group_id']); ?>&nbsp;</td>
		<td><?php echo h($manufacturerProductLine['ManufacturerProductLine']['is_material']); ?>&nbsp;</td>
		<td><?php echo h($manufacturerProductLine['ManufacturerProductLine']['dot_code']); ?>&nbsp;</td>
		<td><?php echo h($manufacturerProductLine['ManufacturerProductLine']['name']); ?>&nbsp;</td>
		<td><?php echo h($manufacturerProductLine['ManufacturerProductLine']['order']); ?>&nbsp;</td>
		<td><?php echo h($manufacturerProductLine['ManufacturerProductLine']['material_size_list']); ?>&nbsp;</td>
		<td><?php echo h($manufacturerProductLine['ManufacturerProductLine']['deleted']); ?>&nbsp;</td>
		<td><?php echo h($manufacturerProductLine['ManufacturerProductLine']['deleted_by']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__(' '), array('action' => 'view', $manufacturerProductLine['ManufacturerProductLine']['id']), array('class'=>'icon-search', 'title'=>'View')); ?>
			<?php echo $this->Html->link(__(' '), array('action' => 'edit', $manufacturerProductLine['ManufacturerProductLine']['id']), array('class' => 'icon-edit', 'title'=>'Edit')); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $manufacturerProductLine['ManufacturerProductLine']['id']), null, __('Are you sure you want to delete # %s?', $manufacturerProductLine['ManufacturerProductLine']['id'])); ?>
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