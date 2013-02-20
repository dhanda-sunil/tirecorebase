<div class="customers" style="width:800px;">
    <div class="navbar">
        <div class="navbar-inner">
        <ul class="nav">
            <a class="brand" href="#">Actions</a>
            <li><?php echo $this->Html->link(__('New Customer'), array('action' => 'add')); ?></li>
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
			<th><?php echo $this->Paginator->sort('company_name'); ?></th>
			<th><?php echo $this->Paginator->sort('first_name'); ?></th>
			<th><?php echo $this->Paginator->sort('last_name'); ?></th>
			<th><?php echo $this->Paginator->sort('website'); ?></th>
			<th><?php echo $this->Paginator->sort('phone_number'); ?></th>
			<th><?php echo $this->Paginator->sort('fax_number'); ?></th>
			<th><?php echo $this->Paginator->sort('email'); ?></th>
			<th><?php echo $this->Paginator->sort('tax_number'); ?></th>
			<th><?php echo $this->Paginator->sort('tax_number_expiration'); ?></th>
			<th><?php echo $this->Paginator->sort('price_group_id'); ?></th>
			<th><?php echo $this->Paginator->sort('is_company'); ?></th>
			<th><?php echo $this->Paginator->sort('location_id'); ?></th>
			<th><?php echo $this->Paginator->sort('customer_group_id'); ?></th>
			<th><?php echo $this->Paginator->sort('customer_status_id'); ?></th>
			<th><?php echo $this->Paginator->sort('walk_in'); ?></th>
			<th><?php echo $this->Paginator->sort('active'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
    </thead>
    <tbody>
	<?php
	foreach ($customers as $customer): ?>
	<tr>
		<td><?php echo h($customer['Customer']['id']); ?>&nbsp;</td>
		<td><?php echo h($customer['Customer']['company_name']); ?>&nbsp;</td>
		<td><?php echo h($customer['Customer']['first_name']); ?>&nbsp;</td>
		<td><?php echo h($customer['Customer']['last_name']); ?>&nbsp;</td>
		<td><?php echo h($customer['Customer']['website']); ?>&nbsp;</td>
		<td><?php echo h($customer['Customer']['phone_number']); ?>&nbsp;</td>
		<td><?php echo h($customer['Customer']['fax_number']); ?>&nbsp;</td>
		<td><?php echo h($customer['Customer']['email']); ?>&nbsp;</td>
		<td><?php echo h($customer['Customer']['tax_number']); ?>&nbsp;</td>
		<td><?php echo h($customer['Customer']['tax_number_expiration']); ?>&nbsp;</td>
		<td><?php echo h(@$customer['Customer']['price_group_id']); ?>&nbsp;</td>
		<td><?php echo h($customer['Customer']['is_company']); ?>&nbsp;</td>
		<td><?php echo h(@$customer['Customer']['location_id']); ?>&nbsp;</td>
		<td><?php echo h(@$customer['Customer']['customer_group_id']); ?>&nbsp;</td>
		<td><?php echo h(@$customer['Customer']['customer_status_id']); ?>&nbsp;</td>
		<td><?php echo h($customer['Customer']['walk_in']); ?>&nbsp;</td>
		<td><?php echo h($customer['Customer']['active']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__(' '), array('action' => 'view', $customer['Customer']['id']), array('class'=>'icon-search', 'title'=>'View')); ?>
			<?php echo $this->Html->link(__(' '), array('action' => 'edit', $customer['Customer']['id']), array('class' => 'icon-edit', 'title'=>'Edit')); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $customer['Customer']['id']), null, __('Are you sure you want to delete # %s?', $customer['Customer']['id'])); ?>
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