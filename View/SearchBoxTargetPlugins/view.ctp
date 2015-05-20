<div class="searchBoxTargetPlugins view">
<h2><?php echo __('Search Box Target Plugin'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($searchBoxTargetPlugin['SearchBoxTargetPlugin']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Search Box'); ?></dt>
		<dd>
			<?php echo $this->Html->link($searchBoxTargetPlugin['SearchBox']['id'], array('controller' => 'search_boxes', 'action' => 'view', $searchBoxTargetPlugin['SearchBox']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Plugin Key'); ?></dt>
		<dd>
			<?php echo h($searchBoxTargetPlugin['SearchBoxTargetPlugin']['plugin_key']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Trackable Creator'); ?></dt>
		<dd>
			<?php echo $this->Html->link($searchBoxTargetPlugin['TrackableCreator']['id'], array('controller' => 'users', 'action' => 'view', $searchBoxTargetPlugin['TrackableCreator']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($searchBoxTargetPlugin['SearchBoxTargetPlugin']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Trackable Updater'); ?></dt>
		<dd>
			<?php echo $this->Html->link($searchBoxTargetPlugin['TrackableUpdater']['id'], array('controller' => 'users', 'action' => 'view', $searchBoxTargetPlugin['TrackableUpdater']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($searchBoxTargetPlugin['SearchBoxTargetPlugin']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Search Box Target Plugin'), array('action' => 'edit', $searchBoxTargetPlugin['SearchBoxTargetPlugin']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Search Box Target Plugin'), array('action' => 'delete', $searchBoxTargetPlugin['SearchBoxTargetPlugin']['id']), null, __('Are you sure you want to delete # %s?', $searchBoxTargetPlugin['SearchBoxTargetPlugin']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Search Box Target Plugins'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Search Box Target Plugin'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Search Boxes'), array('controller' => 'search_boxes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Search Box'), array('controller' => 'search_boxes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Trackable Creator'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
