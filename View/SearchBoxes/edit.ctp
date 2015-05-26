<div class="searchBoxes form">
<?php echo $this->Form->create('SearchBox'); ?>
	<fieldset>
		<legend><?php echo __('Edit Search Box'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('frame_key');
echo $this->Form->input('is_advanced', [
	'type' => 'select',
	'options' => [
		__('General Search'),
		__('Advanced Search'),
	],
]);
$checked = [];
foreach ($this->Form->request->data['SearchBoxTargetPlugin'] as $target) {
	$checked[$target['plugin_key']] = $target['plugin_key'];
}
echo $this->Form->input('SearchBoxTargetPlugin.plugin_key', [
	'type' => 'select',
	'multiple' => 'checkbox',
	'options' => $plugins,
	'value' => $checked,
]);
		echo $this->Form->input('created_user');
		echo $this->Form->input('modified_user');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('SearchBox.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('SearchBox.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Search Boxes'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Trackable Creator'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Search Box Target Plugins'), array('controller' => 'search_box_target_plugins', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Search Box Target Plugin'), array('controller' => 'search_box_target_plugins', 'action' => 'add')); ?> </li>
	</ul>
</div>
