<div class="actions">
    <div class="navbar">
        <div class="navbar-inner">
        <ul class="nav">
            <a class="brand" href="#">Actions</a>
            <li><?php echo $this->Html->link(__('New Tread Design'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('TreadDesign.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('TreadDesign.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Tread Designs'), array('action' => 'index')); ?></li>
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
</div>
<div class="treadDesigns form">
<?php echo $this->Form->create('TreadDesign',array('enctype' => 'multipart/form-data')); ?>
	<fieldset>
		<legend><?php echo __('Edit Tread Design'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('tread_abb');
		echo $this->Form->input('name');
		echo $this->Form->input('xref');
		echo $this->Form->input('stock_status');
		echo $this->Form->input('vendor_id');
		echo $this->Form->file('image');
        if($this->request->data['TreadDesign']['image']){
            echo '<img src="/TreadDesigns/viewimage/'.$this->request->data['TreadDesign']['id'].'" />';
        }
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
