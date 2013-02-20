<div class="actions">
    <div class="navbar">
        <div class="navbar-inner">
        <ul class="nav">
            <a class="brand" href="#">Actions</a>
            <li><?php echo $this->Html->link(__('New Account'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Account.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Account.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Accounts'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Customers'), array('controller' => 'customers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Customer'), array('controller' => 'customers', 'action' => 'add')); ?> </li>
        </ul>
        </div>
    </div>
</div>
<div class="accounts form">
<? //echo '<pre>'; print_r($this->request->data); die; ?>
<?php echo $this->Form->create('Account'); ?>
	<fieldset>
		<legend><?php echo __('Edit Account'); ?></legend>
	<?php
		
		echo $this->Form->input('customer_id',array(
            'options' => $customers,
            'selected' => $this->request->data['Account']['customer_id']
        ));
		echo $this->Form->input('account_type_id',array(
            'options' => $accounttypes,
            'selected' => $this->request->data['Account']['account_type_id']
        ));
		echo $this->Form->input('user_id',array(
            'options' => $users,
            'selected' => $this->request->data['Account']['user_id'],
            'empty' => true
        ));
		echo $this->Form->input('number');
		echo $this->Form->input('desc');
		echo $this->Form->input('default_bill_to_id',array(
            'options' => $billingaddresses,
            'selected' => $this->request->data['BillingAddress']['id'],
        ));
		echo $this->Form->input('default_ship_to_id',array(
            'options' => $shippingaddresses,
            'selected' => $this->request->data['ShippingAddress']['id'],
        ));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
