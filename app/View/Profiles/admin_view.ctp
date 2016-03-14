<div class="profiles view">
<h2><?php echo __('Profile'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($profile['Profile']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('First Name'); ?></dt>
		<dd>
			<?php echo h($profile['Profile']['first_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Second Name'); ?></dt>
		<dd>
			<?php echo h($profile['Profile']['second_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Last Name'); ?></dt>
		<dd>
			<?php echo h($profile['Profile']['last_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Birthdate'); ?></dt>
		<dd>
			<?php echo h($profile['Profile']['birthdate']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Blood Type'); ?></dt>
		<dd>
			<?php echo h($profile['Profile']['blood_type']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Day Of Birth'); ?></dt>
		<dd>
			<?php echo h($profile['Profile']['day_of_birth']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nationality'); ?></dt>
		<dd>
			<?php echo h($profile['Profile']['nationality']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Gender'); ?></dt>
		<dd>
			<?php echo h($profile['Profile']['gender']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Person Status'); ?></dt>
		<dd>
			<?php echo h($profile['Profile']['person_status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Resident Country '); ?></dt>
		<dd>
			<?php echo h($profile['Profile']['resident_country ']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Resident City '); ?></dt>
		<dd>
			<?php echo h($profile['Profile']['resident_city ']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Resident Street'); ?></dt>
		<dd>
			<?php echo h($profile['Profile']['resident_street']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Missing Country '); ?></dt>
		<dd>
			<?php echo h($profile['Profile']['missing_country ']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Missing City'); ?></dt>
		<dd>
			<?php echo h($profile['Profile']['missing_city']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Personal Photos'); ?></dt>
		<dd>
			<?php echo h($profile['Profile']['personal_photos']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Mental Illness'); ?></dt>
		<dd>
			<?php echo h($profile['Profile']['mental_illness']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($profile['Profile']['status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Kidnapped '); ?></dt>
		<dd>
			<?php echo h($profile['Profile']['kidnapped ']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Physical Illness'); ?></dt>
		<dd>
			<?php echo h($profile['Profile']['physical_illness']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Document Id'); ?></dt>
		<dd>
			<?php echo h($profile['Profile']['document_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Verified Profile'); ?></dt>
		<dd>
			<?php echo h($profile['Profile']['verified_profile']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($profile['Profile']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Reporter'); ?></dt>
		<dd>
			<?php echo $this->Html->link($profile['Reporter']['id'], array('controller' => 'reporters', 'action' => 'view', $profile['Reporter']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Is Admin'); ?></dt>
		<dd>
			<?php echo h($profile['Profile']['is_admin']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($profile['User']['id'], array('controller' => 'users', 'action' => 'view', $profile['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($profile['Profile']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($profile['Profile']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Profile'), array('action' => 'edit', $profile['Profile']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Profile'), array('action' => 'delete', $profile['Profile']['id']), array(), __('Are you sure you want to delete # %s?', $profile['Profile']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Profiles'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Profile'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Reporters'), array('controller' => 'reporters', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Reporter'), array('controller' => 'reporters', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Logs'), array('controller' => 'logs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Log'), array('controller' => 'logs', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Logs'); ?></h3>
	<?php if (!empty($profile['Log'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Profile Id'); ?></th>
		<th><?php echo __('Reporter Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Message'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($profile['Log'] as $log): ?>
		<tr>
			<td><?php echo $log['id']; ?></td>
			<td><?php echo $log['profile_id']; ?></td>
			<td><?php echo $log['reporter_id']; ?></td>
			<td><?php echo $log['user_id']; ?></td>
			<td><?php echo $log['message']; ?></td>
			<td><?php echo $log['created']; ?></td>
			<td><?php echo $log['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'logs', 'action' => 'view', $log['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'logs', 'action' => 'edit', $log['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'logs', 'action' => 'delete', $log['id']), array(), __('Are you sure you want to delete # %s?', $log['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Log'), array('controller' => 'logs', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
