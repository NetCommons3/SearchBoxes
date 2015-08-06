<?php echo $this->Form->create('SearchBox',
	array(
		'type' => 'get',
		'url' => '/topics/topics/search/' . $frameId,
		)) ?>
	<div class="form-group">
		<div class="input-group">
			<?php
				echo $this->Form->input('keyword',
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
			<?php echo $this->Form->label(__d('search_boxes', 'Target Room')); ?>
		</div>
		<div class="input-group">
			<?php
				$options = [];
				foreach ($rooms as $target) {
					$options[$target['LanguagesPage']['id']] = $target['LanguagesPage']['name'];
				}
				echo $this->Form->input('Block.room_id', [
					'type' => 'select',
					'label' => false,
					'empty' => __d('topics', 'Unspecified'),
					'options' => $options,
					'class' => 'form-control',
				]);
			?>
		</div>
	</div>
	<div class="form-group">
		<div class="input-group">
			<?php echo $this->Form->label(__d('search_boxes', 'Target Block')); ?>
		</div>
		<div class="input-group">
			<?php
				$options = [];
				echo $this->Form->input('block_id', [
					'type' => 'select',
					'label' => false,
					'empty' => __d('topics', 'Unspecified'),
					'options' => $options,
					'class' => 'form-control',
				]);
			?>
		</div>
	</div>
	<div class="form-group inline-block" >
		<div class="input-group">
			<?php echo $this->Form->label(__d('search_boxes', 'Target Datetime')); ?>
		</div>

		<div class="input-group">
			<div class="inline-block input-range">
				<?php echo $this->Form->input('Block.from', array(
					'type' => 'text',
					'datetimepicker',
					'label' => false,
					'class' => 'form-control',
					'placeholder' => 'yyyy-mm-dd hh:mm',
				)); ?>
			</div>
			<div class="inline-block input-range">
				<div class="form-control form-text">
					〜
				</div>
			</div>
			<div class="inline-block input-range">
				<?php echo $this->Form->input('Block.to', array(
					'type' => 'text',
					'datetimepicker',
					'label' => false,
					'class' => 'form-control',
					'placeholder' => 'yyyy-mm-dd hh:mm',
				)); ?>
			</div>
		</div>
	</div>
	<div class="form-group">
		<div class="input-group">
			<?php echo $this->Form->label(__d('search_boxes', 'Target Plugins')); ?>
		</div>
		<div class="input-group plugins">
			<?php
				$checked = [];
				if (isset($this->request->query['plugin_key'])) {
					foreach ($this->request->query['plugin_key'] as $target) {
						$checked[$target] = $target;
					}
				} else {
					foreach ($searchBox['SearchBoxTargetPlugin'] as $target) {
						$checked[$target['plugin_key']] = $target['plugin_key'];
					}
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
<?php echo $this->Form->end() ?>
