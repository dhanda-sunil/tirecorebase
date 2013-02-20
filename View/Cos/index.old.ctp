<div class="cos">
    <div class="navbar">
        <div class="navbar-inner">
        <ul class="nav">
            <a class="brand" href="#">Actions</a>
            <li><?php echo $this->Html->link(__('New Co'), array('action' => 'add')); ?></li>
    		<li><?php echo $this->Html->link(__('List Accounts'), array('controller' => 'accounts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Account'), array('controller' => 'accounts', 'action' => 'add')); ?> </li>
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
			<th><?php echo $this->Paginator->sort('ref'); ?></th>
			<th><?php echo $this->Paginator->sort('account_id'); ?></th>
			<th><?php echo $this->Paginator->sort('type'); ?></th>
			<th><?php echo $this->Paginator->sort('term_id'); ?></th>
			<th><?php echo $this->Paginator->sort('status'); ?></th>
			<th><?php echo $this->Paginator->sort('bill_address_id'); ?></th>
			<th><?php echo $this->Paginator->sort('ship_address_id'); ?></th>
			<th><?php echo $this->Paginator->sort('is_national_account'); ?></th>
			<th><?php echo $this->Paginator->sort('notes'); ?></th>
			<th><?php echo $this->Paginator->sort('requestor'); ?></th>
			<th><?php echo $this->Paginator->sort('authorized'); ?></th>
			<th><?php echo $this->Paginator->sort('authorized_by'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('created_by'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th><?php echo $this->Paginator->sort('modified_by'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
    </thead>
    <tbody>
	<?php
	foreach ($cos as $co): ?>
	<tr>
		<td><?php echo h($co['Co']['id']); ?>&nbsp;</td>
		<td><?php echo h($co['Co']['ref']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($co['Account']['number'], array('controller' => 'accounts', 'action' => 'view', $co['Account']['id'])); ?>
		</td>
		<td><?php echo h($co['Co']['type']); ?>&nbsp;</td>
		<td><?php echo h($co['Co']['term_id']); ?>&nbsp;</td>
		<td><?php echo h($co['Co']['status']); ?>&nbsp;</td>
		<td><?php echo h($co['Co']['bill_address_id']); ?>&nbsp;</td>
		<td><?php echo h($co['Co']['ship_address_id']); ?>&nbsp;</td>
		<td><?php echo h($co['Co']['is_national_account']); ?>&nbsp;</td>
		<td><?php echo h($co['Co']['notes']); ?>&nbsp;</td>
		<td><?php echo h($co['Co']['requestor']); ?>&nbsp;</td>
		<td><?php echo h($co['Co']['authorized']); ?>&nbsp;</td>
		<td><?php echo h($co['Co']['authorized_by']); ?>&nbsp;</td>
		<td><?php echo h($co['Co']['created']); ?>&nbsp;</td>
		<td><?php echo h($co['Co']['created_by']); ?>&nbsp;</td>
		<td><?php echo h($co['Co']['modified']); ?>&nbsp;</td>
		<td><?php echo h($co['Co']['modified_by']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__(' '), array('action' => 'view', $co['Co']['id']), array('class'=>'icon-search', 'title'=>'View')); ?>
			<?php echo $this->Html->link(__(' '), array('action' => 'edit', $co['Co']['id']), array('class' => 'icon-edit', 'title'=>'Edit')); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $co['Co']['id']), null, __('Are you sure you want to delete # %s?', $co['Co']['id'])); ?>
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