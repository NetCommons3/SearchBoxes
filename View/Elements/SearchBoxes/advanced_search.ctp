<?php echo $this->Form->create('SearchBoxes.SearchBox',
	array(
		'type' => 'get',
		'url' => '/topics/topics/index/' . $frameId,
		)) ?>
	<?php if ($searchBox['SearchBox']['is_advanced']): ?>
	<div class="form-group">
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
	<div class="form-group">
		<div class="input-group">
			<?php echo $this->Form->input('TrackableUpdater.username',
				array(
					'required' => false,
					'class' => 'form-control',
					'value' => (isset($this->request->query['username']) ? $this->request->query['username'] : null),
				)) ?>
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
				'options' => ['ルーム1', 'ルーム2'],
				'class' => 'form-control',
			]);
		?>
		</div>
	</div>
	<div class="form-group inline-block" >
		<div class="input-group">
			<?php echo $this->Form->label(__d('search_boxes', 'Target Datetime')); ?>
		</div>
		<div class="input-group inline-block">
				<?php echo $this->Form->input('Block.from', array(
					'type' => 'text',
					'datetimepicker',
					'label' => false,
					'class' => 'form-control',
					'placeholder' => 'yyyy-mm-dd hh:mm',
				)); ?>
			〜
		</div>
		<div class="input-group inline-block">
				<?php echo $this->Form->input('Block.to', array(
					'type' => 'text',
					'datetimepicker',
					'label' => false,
					'class' => 'form-control',
					'placeholder' => 'yyyy-mm-dd hh:mm',
				)); ?>
		</div>
	</div>
<!--
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
//-->
	<div class="form-group">
		<div class="input-group">
			<?php echo $this->Form->label(__d('search_boxes', 'Target Plugins')); ?>
		</div>
		<div class="input-group">
		<?php $checked = [];
			foreach ($searchBox['SearchBoxTargetPlugin'] as $target) {
				$checked[$target['plugin_key']] = $target['plugin_key'];
			}
			echo $this->Form->input('SearchBoxTargetPlugin.plugin_key', [
				'label' => false,
				'div' => false,
				'class' => 'form-input inline-block',
				'multiple' => 'checkbox',
				'options' => $plugins,
				'value' => $checked,
			]);
		?>
		</div>
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
					'class' => 'form-control'
				)) ?>
			<span class="input-group-btn">
				<button class="btn btn-default" type="submit"><span class="glyphicon glyphicon-search"></span></button>
			</span>
		</div>
	</div>
<?php endif; ?>
<?php echo $this->Form->end() ?>
