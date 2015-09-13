<?php echo $this->Html->css(
	'/topics/css/topics.css',
	array(
		'plugin' => false,
		'once' => true,
		'inline' => false
	)
);
?>
<?php echo $this->Form->create('SearchBox',
	array(
		'type' => 'get',
		'url' => '/topics/topics/search/' . $frameId,
		)) ?>
	<?php if ($searchBox['SearchBox']['is_advanced']): ?>
		<?php echo $this->element('SearchBoxes.advanced_search') ?>
	<?php else: ?>
		<div class="search-box-view">
			<?php echo $this->element('SearchBoxes.general_search') ?>
		</div>
	<?php endif; ?>
<?php echo $this->Form->end();
