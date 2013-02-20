<div class="finishedGoods">
    <div class="navbar">
        <div class="navbar-inner">
        <ul class="nav">
            <a class="brand" href="#">Actions</a>
            <li><?php echo $this->Html->link(__('New Finished Good'), array('action' => 'add')); ?></li>
    		<li><?php echo $this->Html->link(__('List Casings'), array('controller' => 'casings', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Casing'), array('controller' => 'casings', 'action' => 'add')); ?> </li>
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
			<th><?php echo $this->Paginator->sort('casing_id'); ?></th>
			<th><?php echo $this->Paginator->sort('fg_code'); ?></th>
			<th><?php echo $this->Paginator->sort('stock_status'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
    </thead>
    <tbody>
	<?php
	foreach ($finishedGoods as $finishedGood): ?>
	<tr>
		<td><?php echo h($finishedGood['FinishedGood']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($finishedGood['Casing']['id'], array('controller' => 'casings', 'action' => 'view', $finishedGood['Casing']['id'])); ?>
		</td>
		<td><?php echo h($finishedGood['FinishedGood']['fg_code']); ?>&nbsp;</td>
		<td><?php echo h($finishedGood['FinishedGood']['stock_status']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__(' '), array('action' => 'view', $finishedGood['FinishedGood']['id']), array('class'=>'icon-search', 'title'=>'View')); ?>
			<?php echo $this->Html->link(__(' '), array('action' => 'edit', $finishedGood['FinishedGood']['id']), array('class' => 'icon-edit', 'title'=>'Edit')); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $finishedGood['FinishedGood']['id']), null, __('Are you sure you want to delete # %s?', $finishedGood['FinishedGood']['id'])); ?>
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