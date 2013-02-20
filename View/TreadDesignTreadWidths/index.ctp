<div class="treadDesignTreadWidths">
    <div class="navbar">
        <div class="navbar-inner">
        <ul class="nav">
            <a class="brand" href="#">Actions</a>
            <li><?php echo $this->Html->link(__('New Tread Design Tread Width'), array('action' => 'add')); ?></li>
    		<li><?php echo $this->Html->link(__('List Tread Designs'), array('controller' => 'tread_designs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tread Design'), array('controller' => 'tread_designs', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tread Widths'), array('controller' => 'tread_widths', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tread Width'), array('controller' => 'tread_widths', 'action' => 'add')); ?> </li>
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
			<th><?php echo $this->Paginator->sort('tread_design_id'); ?></th>
			<th><?php echo $this->Paginator->sort('tread_width_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
    </thead>
    <tbody>
	<?php
	foreach ($treadDesignTreadWidths as $treadDesignTreadWidth): ?>
	<tr>
		<td><?php echo h($treadDesignTreadWidth['TreadDesignTreadWidth']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($treadDesignTreadWidth['TreadDesign']['name'], array('controller' => 'tread_designs', 'action' => 'view', $treadDesignTreadWidth['TreadDesign']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($treadDesignTreadWidth['TreadWidth']['size_standard'], array('controller' => 'tread_widths', 'action' => 'view', $treadDesignTreadWidth['TreadWidth']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__(' '), array('action' => 'view', $treadDesignTreadWidth['TreadDesignTreadWidth']['id']), array('class'=>'icon-search', 'title'=>'View')); ?>
			<?php echo $this->Html->link(__(' '), array('action' => 'edit', $treadDesignTreadWidth['TreadDesignTreadWidth']['id']), array('class' => 'icon-edit', 'title'=>'Edit')); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $treadDesignTreadWidth['TreadDesignTreadWidth']['id']), null, __('Are you sure you want to delete # %s?', $treadDesignTreadWidth['TreadDesignTreadWidth']['id'])); ?>
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