<div class="treadDesignTreadWidths view">
    
    <div class="actions">
        <div class="navbar">
            <div class="navbar-inner">
            <ul class="nav">
                <a class="brand" href="#">Actions</a>
    		<li><?php echo $this->Html->link(__('Edit Tread Design Tread Width'), array('action' => 'edit', $treadDesignTreadWidth['TreadDesignTreadWidth']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Tread Design Tread Width'), array('action' => 'delete', $treadDesignTreadWidth['TreadDesignTreadWidth']['id']), null, __('Are you sure you want to delete # %s?', $treadDesignTreadWidth['TreadDesignTreadWidth']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Tread Design Tread Widths'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tread Design Tread Width'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tread Designs'), array('controller' => 'tread_designs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tread Design'), array('controller' => 'tread_designs', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tread Widths'), array('controller' => 'tread_widths', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tread Width'), array('controller' => 'tread_widths', 'action' => 'add')); ?> </li>
            </ul>
            </div>
        </div>
    </div>
    
	<table class="table table-bordered">
		<tr>
		<td><?php echo __('Id'); ?></td>
		<td>
			<?php echo h($treadDesignTreadWidth['TreadDesignTreadWidth']['id']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td width="300px"><?php echo __('Tread Design'); ?></td>
		<td>
			<?php echo $this->Html->link($treadDesignTreadWidth['TreadDesign']['name'], array('controller' => 'tread_designs', 'action' => 'view', $treadDesignTreadWidth['TreadDesign']['id'])); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td width="300px"><?php echo __('Tread Width'); ?></td>
		<td>
			<?php echo $this->Html->link($treadDesignTreadWidth['TreadWidth']['size_standard'], array('controller' => 'tread_widths', 'action' => 'view', $treadDesignTreadWidth['TreadWidth']['id'])); ?>
			&nbsp;
		</td>
		</tr>
	</table>
</div>
