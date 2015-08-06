<?php
	echo $this->Form->hidden('id');
	echo $this->Form->hidden('frame_key');
	echo $this->Form->hidden('Frame.key', ['value' => $frameKey]);
	echo $this->Form->hidden('created_user');
	echo $this->Form->hidden('modified_user');
?>
<div class="form-group">
	<?php
		echo $this->Form->input('is_advanced', [
			'label' => __d('search_boxes', 'Search Type'),
			'type' => 'select',
			'options' => [
				__d('search_boxes', 'General Search'),
				__d('search_boxes', 'Advanced Search'),
			],
			'class' => 'form-control',
		]);
		$checked = [];
	?>
</div>
	<div class="form-group">
		<div class="input-group">
			<?php echo $this->Form->label(__d('search_boxes', 'Target Plugins')); ?>
		</div>
		<div class="input-group">
		<?php $checked = [];
			foreach ($this->Form->request->data['SearchBoxTargetPlugin'] as $target) {
				$checked[$target['plugin_key']] = $target['plugin_key'];
			}
			/* foreach ($searchBox['SearchBoxTargetPlugin'] as $target) { */
			/* 	$checked[$target['plugin_key']] = $target['plugin_key']; */
			/* } */
			echo $this->Form->input('SearchBoxTargetPlugin.plugin_key', [
				'label' => false,
				'div' => false,
				'class' => 'form-input',
				'multiple' => 'checkbox',
				'options' => $plugins,
				'value' => $checked,
			]);
		?>
		</div>
	</div>
<div class="form-group">
	<?php
		/* foreach ($this->Form->request->data['SearchBoxTargetPlugin'] as $target) { */
		/* 	$checked[$target['plugin_key']] = $target['plugin_key']; */
		/* } */
		/* echo $this->Form->input('SearchBoxTargetPlugin.plugin_key', [ */
		/* 	'label' => __d('search_boxes', 'Target Plugins'), */
		/* 	'type' => 'select', */
		/* 	'multiple' => 'multiple', */
		/* 	'options' => $plugins, */
		/* 	'value' => $checked, */
		/* 	'class' => 'form-control', */
		/* ]); */
	?>
</div>
