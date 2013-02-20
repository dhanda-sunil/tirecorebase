<div class="treadWidths view">
    
    <div class="actions">
        <div class="navbar">
            <div class="navbar-inner">
            <ul class="nav">
                <a class="brand" href="#">Actions</a>
    		<li><?php echo $this->Html->link(__('Edit Tread Width'), array('action' => 'edit', $treadWidth['TreadWidth']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Tread Width'), array('action' => 'delete', $treadWidth['TreadWidth']['id']), null, __('Are you sure you want to delete # %s?', $treadWidth['TreadWidth']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Tread Widths'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tread Width'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tread Design Tread Widths'), array('controller' => 'tread_design_tread_widths', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tread Design Tread Width'), array('controller' => 'tread_design_tread_widths', 'action' => 'add')); ?> </li>
            </ul>
            </div>
        </div>
    </div>
    
	<table class="table table-bordered">
		<tr>
		<td><?php echo __('Id'); ?></td>
		<td>
			<?php echo h($treadWidth['TreadWidth']['id']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Size Standard'); ?></td>
		<td>
			<?php echo h($treadWidth['TreadWidth']['size_standard']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Size Mm'); ?></td>
		<td>
			<?php echo h($treadWidth['TreadWidth']['size_mm']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Suffix'); ?></td>
		<td>
			<?php echo h($treadWidth['TreadWidth']['suffix']); ?>
			&nbsp;
		</td>
		</tr>
	</table>
</div>
<div class="related">
	<h3><?php echo __('Related Tread Design Tread Widths'); ?></h3>
	<?php if (!empty($treadWidth['TreadDesignTreadWidth'])): ?>
	<table cellpadding = "0" cellspacing = "0" class="table table-striped">
    <thead>
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Tread Design Id'); ?></th>
		<th><?php echo __('Tread Width Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
    </thead>
    <tbody>
	<?php
		$i = 0;
		foreach ($treadWidth['TreadDesignTreadWidth'] as $treadDesignTreadWidth): ?>
		<tr>
			<td><?php echo $treadDesignTreadWidth['id']; ?></td>
			<td><?php echo $treadDesignTreadWidth['tread_design_id']; ?></td>
			<td><?php echo $treadDesignTreadWidth['tread_width_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'tread_design_tread_widths', 'action' => 'view', $treadDesignTreadWidth['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'tread_design_tread_widths', 'action' => 'edit', $treadDesignTreadWidth['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'tread_design_tread_widths', 'action' => 'delete', $treadDesignTreadWidth['id']), null, __('Are you sure you want to delete # %s?', $treadDesignTreadWidth['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
    </tbody>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Tread Design Tread Width'), array('controller' => 'tread_design_tread_widths', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
