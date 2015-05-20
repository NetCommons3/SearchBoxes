<div class="searchBoxTargetPlugins form">
<?php echo $this->Form->create('SearchBoxTargetPlugin'); ?>
	<fieldset>
		<legend><?php echo __('Add Search Box Target Plugin'); ?></legend>
	<?php
		echo $this->Form->input('search_box_id');
		echo $this->Form->input('plugin_key');
		echo $this->Form->input('created_user');
		echo $this->Form->input('modified_user');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Search Box Target Plugins'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Search Boxes'), array('controller' => 'search_boxes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Search Box'), array('controller' => 'search_boxes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Trackable Creator'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
