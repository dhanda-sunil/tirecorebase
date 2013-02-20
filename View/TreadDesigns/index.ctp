<div class="treadDesigns">
    <div class="navbar">
        <div class="navbar-inner">
        <ul class="nav">
            <a class="brand" href="#">Actions</a>
            <li><?php echo $this->Html->link(__('New Tread Design'), array('action' => 'add')); ?></li>
    		<li><?php echo $this->Html->link(__('List Vendors'), array('controller' => 'vendors', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Vendor'), array('controller' => 'vendors', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Casings'), array('controller' => 'casings', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Casing'), array('controller' => 'casings', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Mold Types'), array('controller' => 'mold_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Mold Type'), array('controller' => 'mold_types', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tread Design Tread Widths'), array('controller' => 'tread_design_tread_widths', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tread Design Tread Width'), array('controller' => 'tread_design_tread_widths', 'action' => 'add')); ?> </li>
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
    <pre><?php //print_r($treadDesigns); ?></pre>
	<table cellpadding="0" cellspacing="0" class="table table-striped">
    <thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('tread_abb'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('xref'); ?></th>
			<th>Tire Sizes</th>
			<th><?php echo $this->Paginator->sort('stock_status'); ?></th>
			<th><?php echo $this->Paginator->sort('vendor_id'); ?></th>
			<th><?php echo $this->Paginator->sort('image'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
    </thead>
    <tbody>
	<?php
	foreach ($treadDesigns as $treadDesign): ?>
	<tr>
		<td><?php echo h($treadDesign['TreadDesign']['id']); ?>&nbsp;</td>
		<td><?php echo h($treadDesign['TreadDesign']['tread_abb']); ?>&nbsp;</td>
		<td><?php echo h($treadDesign['TreadDesign']['name']); ?>&nbsp;</td>
		<td><?php echo h($treadDesign['TreadDesign']['xref']); ?>&nbsp;</td>
		<td>
            <?php
            $widths = array();
                foreach ($treadDesign['TreadDesignTreadWidth'] as $tw){
                    $widths[] = h($tw['TreadWidth']['size_mm']);
                }
            $widths = array_unique($widths);
            sort($widths);
            echo implode(", ", $widths);
            ?>&nbsp;
        </td>
		<td><?php echo h($treadDesign['TreadDesign']['stock_status']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($treadDesign['Vendor']['name'], array('controller' => 'vendors', 'action' => 'view', $treadDesign['Vendor']['id'])); ?>
		</td>
		<td><img src="/TreadDesigns/viewimage/<?=$treadDesign['TreadDesign']['id']?>" width="50" height="50" /></td>
		<td class="actions">
			<?php echo $this->Html->link(__(' '), array('action' => 'view', $treadDesign['TreadDesign']['id']), array('class'=>'icon-search', 'title'=>'View')); ?>
			<?php echo $this->Html->link(__(' '), array('action' => 'edit', $treadDesign['TreadDesign']['id']), array('class' => 'icon-edit', 'title'=>'Edit')); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $treadDesign['TreadDesign']['id']), null, __('Are you sure you want to delete # %s?', $treadDesign['TreadDesign']['id'])); ?>
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