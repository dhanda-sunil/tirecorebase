<div class="addresses" style="width:800px;">
    <div class="navbar">
        <div class="navbar-inner">
        <ul class="nav">
            <a class="brand" href="#">Actions</a>
            <li><?php echo $this->Html->link(__('New Address'), array('action' => 'add')); ?></li>
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
			<th><?php echo $this->Paginator->sort('ref_id'); ?></th>
			<th><?php echo $this->Paginator->sort('ref_table'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('attn'); ?></th>
			<th><?php echo $this->Paginator->sort('line1'); ?></th>
			<th><?php echo $this->Paginator->sort('line2'); ?></th>
			<th><?php echo $this->Paginator->sort('city'); ?></th>
			<th><?php echo $this->Paginator->sort('state'); ?></th>
			<th><?php echo $this->Paginator->sort('zip'); ?></th>
			<th><?php echo $this->Paginator->sort('is_billing'); ?></th>
			<th><?php echo $this->Paginator->sort('is_shipping'); ?></th>
			<th><?php echo $this->Paginator->sort('active'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
    </thead>
    <tbody>
	<?php
	foreach ($addresses as $address): ?>
	<tr>
		<td><?php echo h($address['Address']['id']); ?>&nbsp;</td>
		<td><?php echo h($address['Address']['ref_id']); ?>&nbsp;</td>
		<td><?php echo h($address['Address']['ref_table']); ?>&nbsp;</td>
		<td><?php echo h($address['Address']['name']); ?>&nbsp;</td>
		<td><?php echo h($address['Address']['attn']); ?>&nbsp;</td>
		<td><?php echo h($address['Address']['line1']); ?>&nbsp;</td>
		<td><?php echo h($address['Address']['line2']); ?>&nbsp;</td>
		<td><?php echo h($address['Address']['city']); ?>&nbsp;</td>
		<td><?php echo h($address['Address']['state']); ?>&nbsp;</td>
		<td><?php echo h($address['Address']['zip']); ?>&nbsp;</td>
		<td><?php echo h($address['Address']['is_billing']); ?>&nbsp;</td>
		<td><?php echo h($address['Address']['is_shipping']); ?>&nbsp;</td>
		<td><?php echo h($address['Address']['active']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__(' '), array('action' => 'view', $address['Address']['id']), array('class'=>'icon-search', 'title'=>'View')); ?>
			<?php echo $this->Html->link(__(' '), array('action' => 'edit', $address['Address']['id']), array('class' => 'icon-edit', 'title'=>'Edit')); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $address['Address']['id']), null, __('Are you sure you want to delete # %s?', $address['Address']['id'])); ?>
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