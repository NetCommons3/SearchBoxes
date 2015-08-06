<?php echo $this->Form->create('SearchBoxes.SearchBox',
	array(
		'type' => 'get',
		'url' => '/topics/topics/search/' . $frameId,
		)) ?>
	<div class="form-group general-search-keyword">
		<div class="input-group">
			<?php echo $this->Form->input('keyword',
				array(
					'label' => false,
					'class' => 'form-control',
					'value' => (isset($this->request->query['keyword']) ? $this->request->query['keyword'] : null),
					'placeholder' => __d('search_boxes', 'Keyword'),
				)) ?>
			<span class="input-group-btn">
				<button class="btn btn-default" type="submit"><span class="glyphicon glyphicon-search"></span></button>
			</span>
		</div>
	</div>
<?php echo $this->Form->end() ?>
