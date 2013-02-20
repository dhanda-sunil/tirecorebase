<div class="actions">
    <div class="navbar">
        <div class="navbar-inner">
        <ul class="nav">
            <a class="brand" href="#">Actions</a>
            <li><?php echo $this->Html->link(__('New Account'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Accounts'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Customers'), array('controller' => 'customers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Customer'), array('controller' => 'customers', 'action' => 'add')); ?> </li>
        </ul>
        </div>
    </div>
</div>
<div class="accounts form">
<?php echo $this->Form->create('Account'); ?>
	<fieldset>
		<legend><?php echo __('Add Account'); ?></legend>
	<?php
		echo $this->Form->input('customer_id',array(
            'options' => $customers
        ));
		echo $this->Form->input('account_type_id',array(
            'options' => $accounttypes
        ));
		echo $this->Form->input('user_id',array(
            'options' => $users,
            'empty' => true
        ));
		echo $this->Form->input('number');
		echo $this->Form->input('desc');
		echo $this->Form->input('order');
		echo $this->Form->input('default_bill_to_id',array(
            'options' => $billingaddresses
        ));
		echo $this->Form->input('default_ship_to_id',array(
            'options' => $shippingaddresses
        ));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
