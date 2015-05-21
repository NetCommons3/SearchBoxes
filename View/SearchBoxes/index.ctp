<div class="searchBoxes index">
	<h2><?php echo __('Search Boxes'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('frame_key'); ?></th>
			<th><?php echo $this->Paginator->sort('is_advanced'); ?></th>
			<th><?php echo $this->Paginator->sort('created_user'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified_user'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($searchBoxes as $searchBox): ?>
	<tr>
		<td><?php echo h($searchBox['SearchBox']['id']); ?>&nbsp;</td>
		<td><?php echo h($searchBox['SearchBox']['frame_key']); ?>&nbsp;</td>
		<td><?php echo h($searchBox['SearchBox']['is_advanced']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($searchBox['TrackableCreator']['id'], array('plugin' => 'users', 'controller' => 'users', 'action' => 'view', $searchBox['TrackableCreator']['id'])); ?>
		</td>
		<td><?php echo h($searchBox['SearchBox']['created']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($searchBox['TrackableUpdater']['id'], array('plugin' => 'users', 'controller' => 'users', 'action' => 'view', $searchBox['TrackableUpdater']['id'])); ?>
		</td>
		<td><?php echo h($searchBox['SearchBox']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $searchBox['SearchBox']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $searchBox['SearchBox']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $searchBox['SearchBox']['id']), null, __('Are you sure you want to delete # %s?', $searchBox['SearchBox']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Search Box'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('plugin' => 'users', 'controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Trackable Creator'), array('plugin' => 'users', 'controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Search Box Target Plugins'), array('controller' => 'search_box_target_plugins', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Search Box Target Plugin'), array('controller' => 'search_box_target_plugins', 'action' => 'add')); ?> </li>
	</ul>
</div>
