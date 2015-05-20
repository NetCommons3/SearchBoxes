<div class="searchBoxes view">
<h2><?php echo __('Search Box'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($searchBox['SearchBox']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Block Key'); ?></dt>
		<dd>
			<?php echo h($searchBox['SearchBox']['block_key']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Is Advanced'); ?></dt>
		<dd>
			<?php echo h($searchBox['SearchBox']['is_advanced']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Trackable Creator'); ?></dt>
		<dd>
			<?php echo $this->Html->link($searchBox['TrackableCreator']['id'], array('controller' => 'users', 'action' => 'view', $searchBox['TrackableCreator']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($searchBox['SearchBox']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Trackable Updater'); ?></dt>
		<dd>
			<?php echo $this->Html->link($searchBox['TrackableUpdater']['id'], array('controller' => 'users', 'action' => 'view', $searchBox['TrackableUpdater']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($searchBox['SearchBox']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Search Box'), array('action' => 'edit', $searchBox['SearchBox']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Search Box'), array('action' => 'delete', $searchBox['SearchBox']['id']), null, __('Are you sure you want to delete # %s?', $searchBox['SearchBox']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Search Boxes'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Search Box'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Trackable Creator'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Search Box Target Plugins'), array('controller' => 'search_box_target_plugins', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Search Box Target Plugin'), array('controller' => 'search_box_target_plugins', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Search Box Target Plugins'); ?></h3>
	<?php if (!empty($searchBox['SearchBoxTargetPlugin'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Search Box Id'); ?></th>
		<th><?php echo __('Plugin Key'); ?></th>
		<th><?php echo __('Created User'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified User'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($searchBox['SearchBoxTargetPlugin'] as $searchBoxTargetPlugin): ?>
		<tr>
			<td><?php echo $searchBoxTargetPlugin['id']; ?></td>
			<td><?php echo $searchBoxTargetPlugin['search_box_id']; ?></td>
			<td><?php echo $searchBoxTargetPlugin['plugin_key']; ?></td>
			<td><?php echo $searchBoxTargetPlugin['created_user']; ?></td>
			<td><?php echo $searchBoxTargetPlugin['created']; ?></td>
			<td><?php echo $searchBoxTargetPlugin['modified_user']; ?></td>
			<td><?php echo $searchBoxTargetPlugin['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'search_box_target_plugins', 'action' => 'view', $searchBoxTargetPlugin['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'search_box_target_plugins', 'action' => 'edit', $searchBoxTargetPlugin['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'search_box_target_plugins', 'action' => 'delete', $searchBoxTargetPlugin['id']), null, __('Are you sure you want to delete # %s?', $searchBoxTargetPlugin['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Search Box Target Plugin'), array('controller' => 'search_box_target_plugins', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
