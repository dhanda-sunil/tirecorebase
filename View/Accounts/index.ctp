<div class="accounts" style="width:800px;">
    <div class="navbar">
        <div class="navbar-inner">
        <ul class="nav">
            <a class="brand" href="#">Actions</a>
            <li><?php echo $this->Html->link(__('New Account'), array('action' => 'add')); ?></li>
    		<li><?php echo $this->Html->link(__('List Customers'), array('controller' => 'customers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Customer'), array('controller' => 'customers', 'action' => 'add')); ?> </li>
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
			<th><?php echo $this->Paginator->sort('customer_id'); ?></th>
			<th><?php echo $this->Paginator->sort('account_type_id'); ?></th>
			<th><?php echo $this->Paginator->sort('number'); ?></th>
			<th><?php echo $this->Paginator->sort('desc'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('order'); ?></th>
			<th><?php echo $this->Paginator->sort('default_bill_to_id'); ?></th>
			<th><?php echo $this->Paginator->sort('default_ship_to_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
    </thead>
    <tbody>
	<?php
	foreach ($accounts as $account): ?>
	<tr>
		<td><?php echo h($account['Account']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($account['Customer']['company_name'], array('controller' => 'customers', 'action' => 'view', $account['Customer']['id'])); ?>
		</td>
		<td>
            <?php echo $this->Html->link($account['AccountType']['name'], array('controller' => 'accountype', 'action' => 'view', $account['AccountType']['id'])); ?>
        </td>
		<td><?php echo h($account['Account']['number']); ?>&nbsp;</td>
		<td><?php echo h($account['Account']['desc']); ?>&nbsp;</td>
		<td><?php echo h($account['Account']['created']); ?>&nbsp;</td>
		<td><?php echo h($account['Account']['order']); ?>&nbsp;</td>
		<td><?php echo h($account['Account']['default_bill_to_id']); ?>&nbsp;</td>
		<td><?php echo h($account['Account']['default_ship_to_id']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__(' '), array('action' => 'view', $account['Account']['id']), array('class'=>'icon-search', 'title'=>'View')); ?>
			<?php echo $this->Html->link(__(' '), array('action' => 'edit', $account['Account']['id']), array('class' => 'icon-edit', 'title'=>'Edit')); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $account['Account']['id']), null, __('Are you sure you want to delete # %s?', $account['Account']['id'])); ?>
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