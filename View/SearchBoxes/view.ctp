<?php echo $this->Form->create('SearchBox',
	array(
		'type' => 'get',
		'url' => array(
			'plugin' => 'topics',
			'controller' => 'topics',
			'action' => 'index'))) ?>
	<?php if ($searchBox['SearchBox']['is_advanced']): ?>
	<div class="form-group">
		<div class="input-group">
			<?php echo $this->Form->label(__d('search_boxes', 'Keyword')); ?>
		</div>
		<div class="input-group">
			<?php echo $this->Form->input('keyword',
				array(
					'label' => false,
					'class' => 'form-control')) ?>
			<span class="input-group-btn">
				<button class="btn btn-default" type="submit"><span class="glyphicon glyphicon-search"></span></button>
			</span>
		</div>
	</div>
	<div class="form-group">
		<div class="input-group">
			<?php echo $this->Form->label(__d('search_boxes', 'Search Type')); ?>
		</div>
		<div class="input-group">
			<?php echo $this->Form->input('type', [
				'label' => false,
				'type' => 'select',
				'options' => [
					__('All (AND Search)'),
					__('OR (OR Search)'),
					__('Phrase'),
				],
			]) ?>
		</div>
	</div>
	<div class="form-group">
		<div class="input-group">
			<?php echo $this->Form->input('TrackableUpdater.username',
				array(
					'required' => false,
					'class' => 'form-control')) ?>
		</div>
	</div>
	<div class="form-group">
		<div class="input-group">
			<?php echo $this->Form->label(__d('search_boxes', 'Target Room')); ?>
		</div>
		<div class="input-group">
		<?php $checked = [];
			foreach ($searchBox['SearchBoxTargetPlugin'] as $target) {
				$checked[$target['plugin_key']] = $target['plugin_key'];
			}
			echo $this->Form->input('Room.name', [
				'type' => 'select',
				'label' => false,
				'empty' => __d('search_boxes', 'n/a'),
				'options' => $plugins,
			]);
		?>
		</div>
	</div>
	<div class="input-group inline-block" >
		<div class="input-group">
			<?php echo $this->Form->label(__d('search_boxes', 'Target Datetime')); ?>
		</div>
		<div class="input-group">
			<?php echo $this->Form->time('Block.from', array(
				/* 'value' => (isset($block['from']) ? $block['from'] : null), */
				'label' => false,
				'class' => 'form-control',
				'placeholder' => 'yyyy-mm-dd hh:nn'
			)); ?>

			<span class="input-group-addon">
				<span class="glyphicon glyphicon-minus"></span>
			</span>

			<?php echo $this->Form->time('Block.to', array(
				/* 'value' => (isset($block['to']) ? $block['to'] : null), */
				'label' => false,
				'class' => 'form-control',
				'placeholder' => 'yyyy-mm-dd hh:nn'
			)); ?>
		</div>
	</div>
	<div class="form-group">
		<?php $checked = [];
			foreach ($searchBox['SearchBoxTargetPlugin'] as $target) {
				$checked[$target['plugin_key']] = $target['plugin_key'];
			}
			echo $this->Form->input('SearchBoxTargetPlugin.plugin_key', [
				'type' => 'select',
				'multiple' => 'checkbox',
				'options' => $plugins,
				'value' => $checked,
			]);
		?>
	</div>
<?php else: ?>
	<div class="form-group">
		<div class="input-group">
			<?php echo $this->Form->label(__d('search_boxes', 'Keyword')); ?>
		</div>
		<div class="input-group">
			<?php echo $this->Form->input('keyword',
				array(
					'label' => false,
					'class' => 'form-control')) ?>
			<span class="input-group-btn">
				<button class="btn btn-default" type="submit"><span class="glyphicon glyphicon-search"></span></button>
			</span>
		</div>
	</div>
<?php endif; ?>
<?php echo $this->Form->end() ?>
