<div class="reporters index">
	<h2><?php echo __('Reporters'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('first_name'); ?></th>
			<th><?php echo $this->Paginator->sort('second_name'); ?></th>
			<th><?php echo $this->Paginator->sort('last_name'); ?></th>
			<th><?php echo $this->Paginator->sort('nationality'); ?></th>
			<th><?php echo $this->Paginator->sort('gender'); ?></th>
			<th><?php echo $this->Paginator->sort('resident_country'); ?></th>
			<th><?php echo $this->Paginator->sort('document_id'); ?></th>
			<th><?php echo $this->Paginator->sort('email'); ?></th>
			<th><?php echo $this->Paginator->sort('password'); ?></th>
			<th><?php echo $this->Paginator->sort('email_verification_token'); ?></th>
			<th><?php echo $this->Paginator->sort('account_type'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($reporters as $reporter): ?>
	<tr>
		<td><?php echo h($reporter['Reporter']['id']); ?>&nbsp;</td>
		<td><?php echo h($reporter['Reporter']['first_name']); ?>&nbsp;</td>
		<td><?php echo h($reporter['Reporter']['second_name']); ?>&nbsp;</td>
		<td><?php echo h($reporter['Reporter']['last_name']); ?>&nbsp;</td>
		<td><?php echo h($reporter['Reporter']['nationality']); ?>&nbsp;</td>
		<td><?php echo h($reporter['Reporter']['gender']); ?>&nbsp;</td>
		<td><?php echo h($reporter['Reporter']['resident_country']); ?>&nbsp;</td>
		<td><?php echo h($reporter['Reporter']['document_id']); ?>&nbsp;</td>
		<td><?php echo h($reporter['Reporter']['email']); ?>&nbsp;</td>
		<td><?php echo h($reporter['Reporter']['password']); ?>&nbsp;</td>
		<td><?php echo h($reporter['Reporter']['email_verification_token']); ?>&nbsp;</td>
		<td><?php echo h($reporter['Reporter']['account_type']); ?>&nbsp;</td>
		<td><?php echo h($reporter['Reporter']['created']); ?>&nbsp;</td>
		<td><?php echo h($reporter['Reporter']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $reporter['Reporter']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $reporter['Reporter']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $reporter['Reporter']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $reporter['Reporter']['id']))); ?>
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
		<li><?php echo $this->Html->link(__('New Reporter'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Logs'), array('controller' => 'logs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Log'), array('controller' => 'logs', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Profiles'), array('controller' => 'profiles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Profile'), array('controller' => 'profiles', 'action' => 'add')); ?> </li>
	</ul>
</div>
