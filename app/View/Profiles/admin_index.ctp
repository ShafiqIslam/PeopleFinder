<div class="profiles index">
	<h2><?php echo __('Profiles'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('first_name'); ?></th>
			<th><?php echo $this->Paginator->sort('second_name'); ?></th>
			<th><?php echo $this->Paginator->sort('last_name'); ?></th>
			<th><?php echo $this->Paginator->sort('birthdate'); ?></th>
			<th><?php echo $this->Paginator->sort('blood_type'); ?></th>
			<th><?php echo $this->Paginator->sort('day_of_birth'); ?></th>
			<th><?php echo $this->Paginator->sort('nationality'); ?></th>
			<th><?php echo $this->Paginator->sort('gender'); ?></th>
			<th><?php echo $this->Paginator->sort('person_status'); ?></th>
			<th><?php echo $this->Paginator->sort('resident_country '); ?></th>
			<th><?php echo $this->Paginator->sort('resident_city '); ?></th>
			<th><?php echo $this->Paginator->sort('resident_street'); ?></th>
			<th><?php echo $this->Paginator->sort('missing_country '); ?></th>
			<th><?php echo $this->Paginator->sort('missing_city'); ?></th>
			<th><?php echo $this->Paginator->sort('personal_photos'); ?></th>
			<th><?php echo $this->Paginator->sort('mental_illness'); ?></th>
			<th><?php echo $this->Paginator->sort('status'); ?></th>
			<th><?php echo $this->Paginator->sort('kidnapped '); ?></th>
			<th><?php echo $this->Paginator->sort('physical_illness'); ?></th>
			<th><?php echo $this->Paginator->sort('document_id'); ?></th>
			<th><?php echo $this->Paginator->sort('verified_profile'); ?></th>
			<th><?php echo $this->Paginator->sort('description'); ?></th>
			<th><?php echo $this->Paginator->sort('reporter_id'); ?></th>
			<th><?php echo $this->Paginator->sort('is_admin'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($profiles as $profile): ?>
	<tr>
		<td><?php echo h($profile['Profile']['id']); ?>&nbsp;</td>
		<td><?php echo h($profile['Profile']['first_name']); ?>&nbsp;</td>
		<td><?php echo h($profile['Profile']['second_name']); ?>&nbsp;</td>
		<td><?php echo h($profile['Profile']['last_name']); ?>&nbsp;</td>
		<td><?php echo h($profile['Profile']['birthdate']); ?>&nbsp;</td>
		<td><?php echo h($profile['Profile']['blood_type']); ?>&nbsp;</td>
		<td><?php echo h($profile['Profile']['day_of_birth']); ?>&nbsp;</td>
		<td><?php echo h($profile['Profile']['nationality']); ?>&nbsp;</td>
		<td><?php echo h($profile['Profile']['gender']); ?>&nbsp;</td>
		<td><?php echo h($profile['Profile']['person_status']); ?>&nbsp;</td>
		<td><?php echo h($profile['Profile']['resident_country ']); ?>&nbsp;</td>
		<td><?php echo h($profile['Profile']['resident_city ']); ?>&nbsp;</td>
		<td><?php echo h($profile['Profile']['resident_street']); ?>&nbsp;</td>
		<td><?php echo h($profile['Profile']['missing_country ']); ?>&nbsp;</td>
		<td><?php echo h($profile['Profile']['missing_city']); ?>&nbsp;</td>
		<td><?php echo h($profile['Profile']['personal_photos']); ?>&nbsp;</td>
		<td><?php echo h($profile['Profile']['mental_illness']); ?>&nbsp;</td>
		<td><?php echo h($profile['Profile']['status']); ?>&nbsp;</td>
		<td><?php echo h($profile['Profile']['kidnapped ']); ?>&nbsp;</td>
		<td><?php echo h($profile['Profile']['physical_illness']); ?>&nbsp;</td>
		<td><?php echo h($profile['Profile']['document_id']); ?>&nbsp;</td>
		<td><?php echo h($profile['Profile']['verified_profile']); ?>&nbsp;</td>
		<td><?php echo h($profile['Profile']['description']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($profile['Reporter']['id'], array('controller' => 'reporters', 'action' => 'view', $profile['Reporter']['id'])); ?>
		</td>
		<td><?php echo h($profile['Profile']['is_admin']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($profile['User']['id'], array('controller' => 'users', 'action' => 'view', $profile['User']['id'])); ?>
		</td>
		<td><?php echo h($profile['Profile']['created']); ?>&nbsp;</td>
		<td><?php echo h($profile['Profile']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $profile['Profile']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $profile['Profile']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $profile['Profile']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $profile['Profile']['id']))); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
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
		<li><?php echo $this->Html->link(__('New Profile'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Reporters'), array('controller' => 'reporters', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Reporter'), array('controller' => 'reporters', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Logs'), array('controller' => 'logs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Log'), array('controller' => 'logs', 'action' => 'add')); ?> </li>
	</ul>
</div>
