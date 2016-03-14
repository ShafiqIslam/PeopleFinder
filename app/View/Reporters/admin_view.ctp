<div class="reporters view">
<h2><?php echo __('Reporter'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($reporter['Reporter']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('First Name'); ?></dt>
		<dd>
			<?php echo h($reporter['Reporter']['first_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Second Name'); ?></dt>
		<dd>
			<?php echo h($reporter['Reporter']['second_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Last Name'); ?></dt>
		<dd>
			<?php echo h($reporter['Reporter']['last_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nationality'); ?></dt>
		<dd>
			<?php echo h($reporter['Reporter']['nationality']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Gender'); ?></dt>
		<dd>
			<?php echo h($reporter['Reporter']['gender']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Resident Country'); ?></dt>
		<dd>
			<?php echo h($reporter['Reporter']['resident_country']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Document Id'); ?></dt>
		<dd>
			<?php echo h($reporter['Reporter']['document_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($reporter['Reporter']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Password'); ?></dt>
		<dd>
			<?php echo h($reporter['Reporter']['password']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email Verification Token'); ?></dt>
		<dd>
			<?php echo h($reporter['Reporter']['email_verification_token']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Account Type'); ?></dt>
		<dd>
			<?php echo h($reporter['Reporter']['account_type']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($reporter['Reporter']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($reporter['Reporter']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Reporter'), array('action' => 'edit', $reporter['Reporter']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Reporter'), array('action' => 'delete', $reporter['Reporter']['id']), array(), __('Are you sure you want to delete # %s?', $reporter['Reporter']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Reporters'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Reporter'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Logs'), array('controller' => 'logs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Log'), array('controller' => 'logs', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Profiles'), array('controller' => 'profiles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Profile'), array('controller' => 'profiles', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Logs'); ?></h3>
	<?php if (!empty($reporter['Log'])): ?>
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
	<?php foreach ($reporter['Log'] as $log): ?>
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
<div class="related">
	<h3><?php echo __('Related Profiles'); ?></h3>
	<?php if (!empty($reporter['Profile'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('First Name'); ?></th>
		<th><?php echo __('Second Name'); ?></th>
		<th><?php echo __('Last Name'); ?></th>
		<th><?php echo __('Birthdate'); ?></th>
		<th><?php echo __('Blood Type'); ?></th>
		<th><?php echo __('Day Of Birth'); ?></th>
		<th><?php echo __('Nationality'); ?></th>
		<th><?php echo __('Gender'); ?></th>
		<th><?php echo __('Person Status'); ?></th>
		<th><?php echo __('Resident Country '); ?></th>
		<th><?php echo __('Resident City '); ?></th>
		<th><?php echo __('Resident Street'); ?></th>
		<th><?php echo __('Missing Country '); ?></th>
		<th><?php echo __('Missing City'); ?></th>
		<th><?php echo __('Personal Photos'); ?></th>
		<th><?php echo __('Mental Illness'); ?></th>
		<th><?php echo __('Status'); ?></th>
		<th><?php echo __('Kidnapped '); ?></th>
		<th><?php echo __('Physical Illness'); ?></th>
		<th><?php echo __('Document Id'); ?></th>
		<th><?php echo __('Verified Profile'); ?></th>
		<th><?php echo __('Description'); ?></th>
		<th><?php echo __('Reporter Id'); ?></th>
		<th><?php echo __('Is Admin'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($reporter['Profile'] as $profile): ?>
		<tr>
			<td><?php echo $profile['id']; ?></td>
			<td><?php echo $profile['first_name']; ?></td>
			<td><?php echo $profile['second_name']; ?></td>
			<td><?php echo $profile['last_name']; ?></td>
			<td><?php echo $profile['birthdate']; ?></td>
			<td><?php echo $profile['blood_type']; ?></td>
			<td><?php echo $profile['day_of_birth']; ?></td>
			<td><?php echo $profile['nationality']; ?></td>
			<td><?php echo $profile['gender']; ?></td>
			<td><?php echo $profile['person_status']; ?></td>
			<td><?php echo $profile['resident_country ']; ?></td>
			<td><?php echo $profile['resident_city ']; ?></td>
			<td><?php echo $profile['resident_street']; ?></td>
			<td><?php echo $profile['missing_country ']; ?></td>
			<td><?php echo $profile['missing_city']; ?></td>
			<td><?php echo $profile['personal_photos']; ?></td>
			<td><?php echo $profile['mental_illness']; ?></td>
			<td><?php echo $profile['status']; ?></td>
			<td><?php echo $profile['kidnapped ']; ?></td>
			<td><?php echo $profile['physical_illness']; ?></td>
			<td><?php echo $profile['document_id']; ?></td>
			<td><?php echo $profile['verified_profile']; ?></td>
			<td><?php echo $profile['description']; ?></td>
			<td><?php echo $profile['reporter_id']; ?></td>
			<td><?php echo $profile['is_admin']; ?></td>
			<td><?php echo $profile['user_id']; ?></td>
			<td><?php echo $profile['created']; ?></td>
			<td><?php echo $profile['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'profiles', 'action' => 'view', $profile['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'profiles', 'action' => 'edit', $profile['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'profiles', 'action' => 'delete', $profile['id']), array(), __('Are you sure you want to delete # %s?', $profile['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Profile'), array('controller' => 'profiles', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
