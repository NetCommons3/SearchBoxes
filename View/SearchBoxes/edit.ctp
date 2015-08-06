<?php echo $this->Html->css(
	'/topics/css/topics.css',
		array(
		'plugin' => false,
		'once' => true,
		'inline' => false
	)
); ?>
<?php echo $this->element('NetCommons.setting_tabs', $settingTabs); ?>
<div class="searchBoxes form tab-content">
	<?php echo $this->element('Blocks.edit_form', array(
		'controller' => 'SearchBox',
		'action' => 'edit' . '/' . $frameId,
		'callback' => 'SearchBoxes.SearchBoxes/edit_form',
		'cancelUrl' => $this->Html->url(isset($current['page']) ? '/' . $current['page']['permalink'] : null)
	)); ?>
</div>
