<div class="accountTypes view">
    
    <div class="actions">
        <div class="navbar">
            <div class="navbar-inner">
            <ul class="nav">
                <a class="brand" href="#">Actions</a>
    		<li><?php echo $this->Html->link(__('Edit Account Type'), array('action' => 'edit', $accountType['AccountType']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Account Type'), array('action' => 'delete', $accountType['AccountType']['id']), null, __('Are you sure you want to delete # %s?', $accountType['AccountType']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Account Types'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Account Type'), array('action' => 'add')); ?> </li>
            </ul>
            </div>
        </div>
    </div>
    
	<table class="table table-bordered">
		<tr>
		<td><?php echo __('Id'); ?></td>
		<td>
			<?php echo h($accountType['AccountType']['id']); ?>
			&nbsp;
		</td>
		</tr>
		<tr>
		<td><?php echo __('Name'); ?></td>
		<td>
			<?php echo h($accountType['AccountType']['name']); ?>
			&nbsp;
		</td>
		</tr>
	</table>
</div>
