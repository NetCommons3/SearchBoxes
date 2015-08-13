<?php echo $this->Html->css(
//	'/topics/css/topics.css',
	//	'/search_boxes/css/search_boxes.css',
	array(
		'plugin' => false,
		'once' => true,
		'inline' => false
	)
);
?>
<div style="">
	 <div class="form-group">
	         <div class="row">
	             <div class="col-md-10">
				<?php echo $this->Form->input('Block.from', array(
					'type' => 'text',
					'datetimepicker',
					'label' => false,
					'class' => 'form-control',
					'placeholder' => 'yyyy-mm-dd hh:mm',
				)); ?>
	             </div>
	         </div>
	     </div>
</div>
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
<?php echo $this->Form->end() ?>
