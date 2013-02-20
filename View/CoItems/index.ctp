<div class="coItems">
    <div class="navbar">
        <div class="navbar-inner">
        <ul class="nav">
            <a class="brand" href="#">Actions</a>
            <li><?php echo $this->Html->link(__('New Co Item'), array('action' => 'add')); ?></li>
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
			<th><?php echo $this->Paginator->sort('co_id'); ?></th>
			<th><?php echo $this->Paginator->sort('line_number'); ?></th>
			<th><?php echo $this->Paginator->sort('line_suffix'); ?></th>
			<th><?php echo $this->Paginator->sort('casing_id'); ?></th>
			<th><?php echo $this->Paginator->sort('desc'); ?></th>
			<th><?php echo $this->Paginator->sort('status'); ?></th>
			<th><?php echo $this->Paginator->sort('co_item_type_id'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th><?php echo $this->Paginator->sort('modified_by'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('created_by'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
    </thead>
    <tbody>
	<?php
	foreach ($coItems as $coItem): ?>
	<tr>
		<td><?php echo h($coItem['CoItem']['id']); ?>&nbsp;</td>
		<td><?php echo h($coItem['CoItem']['co_id']); ?>&nbsp;</td>
		<td><?php echo h($coItem['CoItem']['line_number']); ?>&nbsp;</td>
		<td><?php echo h($coItem['CoItem']['line_suffix']); ?>&nbsp;</td>
		<td><?php echo h($coItem['CoItem']['casing_id']); ?>&nbsp;</td>
		<td><?php echo h($coItem['CoItem']['desc']); ?>&nbsp;</td>
		<td><?php echo h($coItem['CoItem']['status']); ?>&nbsp;</td>
		<td><?php echo h($coItem['CoItem']['co_item_type_id']); ?>&nbsp;</td>
		<td><?php echo h($coItem['CoItem']['modified']); ?>&nbsp;</td>
		<td><?php echo h($coItem['CoItem']['modified_by']); ?>&nbsp;</td>
		<td><?php echo h($coItem['CoItem']['created']); ?>&nbsp;</td>
		<td><?php echo h($coItem['CoItem']['created_by']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__(' '), array('action' => 'view', $coItem['CoItem']['id']), array('class'=>'icon-search', 'title'=>'View')); ?>
			<?php echo $this->Html->link(__(' '), array('action' => 'edit', $coItem['CoItem']['id']), array('class' => 'icon-edit', 'title'=>'Edit')); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $coItem['CoItem']['id']), null, __('Are you sure you want to delete # %s?', $coItem['CoItem']['id'])); ?>
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