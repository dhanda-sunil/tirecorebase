<div class="alerts" style="width:800px;">
    <div class="navbar">
        <div class="navbar-inner">
        <ul class="nav">
            <a class="brand" href="#">Actions</a>
            <li><?php echo $this->Html->link(__('New Alert'), array('action' => 'add')); ?></li>
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
			<th><?php echo $this->Paginator->sort('table_name'); ?></th>
			<th><?php echo $this->Paginator->sort('row_id'); ?></th>
			<th><?php echo $this->Paginator->sort('is_active'); ?></th>
			<th><?php echo $this->Paginator->sort('type'); ?></th>
			<th><?php echo $this->Paginator->sort('desc'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
    </thead>
    <tbody>
	<?php
	foreach ($alerts as $alert): ?>
	<tr>
		<td><?php echo h($alert['Alert']['id']); ?>&nbsp;</td>
		<td><?php echo h($alert['Alert']['table_name']); ?>&nbsp;</td>
		<td><?php echo h($alert['Alert']['row_id']); ?>&nbsp;</td>
		<td><?php echo h($alert['Alert']['is_active']); ?>&nbsp;</td>
		<td><?php echo h($alert['Alert']['type']); ?>&nbsp;</td>
		<td><?php echo h($alert['Alert']['desc']); ?>&nbsp;</td>
		<td><?php echo h($alert['Alert']['created']); ?>&nbsp;</td>
		<td><?php echo h($alert['Alert']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__(' '), array('action' => 'view', $alert['Alert']['id']), array('class'=>'icon-search', 'title'=>'View')); ?>
			<?php echo $this->Html->link(__(' '), array('action' => 'edit', $alert['Alert']['id']), array('class' => 'icon-edit', 'title'=>'Edit')); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $alert['Alert']['id']), null, __('Are you sure you want to delete # %s?', $alert['Alert']['id'])); ?>
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