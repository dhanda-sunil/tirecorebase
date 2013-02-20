<div class="addresses view">
    
    <div class="actions">
        <div class="navbar">
            <div class="navbar-inner">
            <ul class="nav">
                <a class="brand" href="#">Actions</a>
    		<li><?php echo $this->Html->link(__('Edit Address'), array('action' => 'edit', $address['Address']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Address'), array('action' => 'delete', $address['Address']['id']), null, __('Are you sure you want to delete # %s?', $address['Address']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Addresses'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Address'), array('action' => 'add')); ?> </li>
            </ul>
            </div>
        </div>
    </div>
    
	<table class="table table-bordered">
		<tr>
		<td><?php echo __('Id'); ?></td>
		<td>
			<?php echo h($address['Address']['id']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Ref Id'); ?></td>
		<td>
			<?php echo h($address['Address']['ref_id']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Ref Table'); ?></td>
		<td>
			<?php echo h($address['Address']['ref_table']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Name'); ?></td>
		<td>
			<?php echo h($address['Address']['name']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Attn'); ?></td>
		<td>
			<?php echo h($address['Address']['attn']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Line1'); ?></td>
		<td>
			<?php echo h($address['Address']['line1']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Line2'); ?></td>
		<td>
			<?php echo h($address['Address']['line2']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('City'); ?></td>
		<td>
			<?php echo h($address['Address']['city']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('State'); ?></td>
		<td>
			<?php echo h($address['Address']['state']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Zip'); ?></td>
		<td>
			<?php echo h($address['Address']['zip']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Is Billing'); ?></td>
		<td>
			<?php echo h($address['Address']['is_billing']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Is Shipping'); ?></td>
		<td>
			<?php echo h($address['Address']['is_shipping']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Active'); ?></td>
		<td>
			<?php echo h($address['Address']['active']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Created'); ?></td>
		<td>
			<?php echo h($address['Address']['created']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Modified'); ?></td>
		<td>
			<?php echo h($address['Address']['modified']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Deleted'); ?></td>
		<td>
			<?php echo h($address['Address']['deleted']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Deleted By'); ?></td>
		<td>
			<?php echo h($address['Address']['deleted_by']); ?>
			&nbsp;
		</td>
		</tr>
	</table>
</div>
