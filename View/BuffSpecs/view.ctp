<div class="buffSpecs view">
    
    <div class="actions">
        <div class="navbar">
            <div class="navbar-inner">
            <ul class="nav">
                <a class="brand" href="#">Actions</a>
    		<li><?php echo $this->Html->link(__('Edit Buff Spec'), array('action' => 'edit', $buffSpec['BuffSpec']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Buff Spec'), array('action' => 'delete', $buffSpec['BuffSpec']['id']), null, __('Are you sure you want to delete # %s?', $buffSpec['BuffSpec']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Buff Specs'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Buff Spec'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tire Sizes'), array('controller' => 'tire_sizes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tire Size'), array('controller' => 'tire_sizes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Mold Types'), array('controller' => 'mold_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Mold Type'), array('controller' => 'mold_types', 'action' => 'add')); ?> </li>
            </ul>
            </div>
        </div>
    </div>
    
	<table class="table table-bordered">
		<tr>
		<td width="300px"><?php echo __('Id'); ?></td>
		<td>
			<?php echo h($buffSpec['BuffSpec']['id']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td width="300px"><?php echo __('Program Ref'); ?></td>
		<td>
			<?php echo h($buffSpec['BuffSpec']['program_ref']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td width="300px"><?php echo __('Name'); ?></td>
		<td>
			<?php echo h($buffSpec['BuffSpec']['name']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td width="300px"><?php echo __('Tire Size'); ?></td>
		<td>
			<?php echo $this->Html->link($buffSpec['TireSize']['size_code'], array('controller' => 'tire_sizes', 'action' => 'view', $buffSpec['TireSize']['id'])); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td width="300px"><?php echo __('Retread Method'); ?></td>
		<td>
			<?php echo h($buffSpec['BuffSpec']['retread_method']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td width="300px"><?php echo __('Diameter'); ?></td>
		<td>
			<?php echo h($buffSpec['BuffSpec']['diameter']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td width="300px"><?php echo __('Crown Width'); ?></td>
		<td>
			<?php echo h($buffSpec['BuffSpec']['crown_width']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td width="300px"><?php echo __('Radius'); ?></td>
		<td>
			<?php echo h($buffSpec['BuffSpec']['radius']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td width="300px"><?php echo __('Machine Setting'); ?></td>
		<td>
			<?php echo h($buffSpec['BuffSpec']['machine_setting']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td width="300px"><?php echo __('Shoulder Radius'); ?></td>
		<td>
			<?php echo h($buffSpec['BuffSpec']['shoulder_radius']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td width="300px"><?php echo __('Shoulder Length'); ?></td>
		<td>
			<?php echo h($buffSpec['BuffSpec']['shoulder_length']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td width="300px"><?php echo __('Shoulder Angle'); ?></td>
		<td>
			<?php echo h($buffSpec['BuffSpec']['shoulder_angle']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td width="300px"><?php echo __('Steel Belt'); ?></td>
		<td>
			<?php echo h($buffSpec['BuffSpec']['steel_belt']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td width="300px"><?php echo __('Shoulder Brushing'); ?></td>
		<td>
			<?php echo h($buffSpec['BuffSpec']['shoulder_brushing']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td width="300px"><?php echo __('Bead Width'); ?></td>
		<td>
			<?php echo h($buffSpec['BuffSpec']['bead_width']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td width="300px"><?php echo __('Mold Type'); ?></td>
		<td>
			<?php echo $this->Html->link($buffSpec['MoldType']['id'], array('controller' => 'mold_types', 'action' => 'view', $buffSpec['MoldType']['id'])); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td width="300px"><?php echo __('Bead Plate'); ?></td>
		<td>
			<?php echo $this->Html->link($buffSpec['BeadPlate']['size_code'], array('controller' => 'tire_sizes', 'action' => 'view', $buffSpec['BeadPlate']['id'])); ?>
			&nbsp;
		</td>
		</tr>
	</table>
</div>
