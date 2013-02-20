<div class="actions">
    <div class="navbar">
        <div class="navbar-inner">
        <ul class="nav">
            <a class="brand" href="#">Actions</a>
            <li><?php echo $this->Html->link(__('New User'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?></li>
        </ul>
        </div>
    </div>
</div>
<div class="users form">
<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<legend><?php echo __('Add User'); ?></legend>
	<?php
		echo $this->Form->input('shop_checkpoint_pref_id');
		echo $this->Form->input('username');
		echo $this->Form->input('password');
		echo $this->Form->input('lang');
		echo $this->Form->input('email');
		echo $this->Form->input('first_name');
		echo $this->Form->input('last_name');
		echo $this->Form->input('login_hash');
		echo $this->Form->input('login_ip');
		echo $this->Form->input('last_ui');
		echo $this->Form->input('change_password');
		echo $this->Form->input('active');
		echo $this->Form->input('admin');
		echo $this->Form->input('current_location');
		echo $this->Form->input('current_till');
		echo $this->Form->input('location_pref');
		echo $this->Form->input('company_id');
		echo $this->Form->input('deleted');
		echo $this->Form->input('deleted_by');
		echo $this->Form->input('user_group_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
