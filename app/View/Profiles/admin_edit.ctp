<div class="profiles form">
<?php echo $this->Form->create('Profile'); ?>
	<fieldset>
		<legend><?php echo __('Admin Edit Profile'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('first_name');
		echo $this->Form->input('second_name');
		echo $this->Form->input('last_name');
		echo $this->Form->input('birthdate');
		echo $this->Form->input('blood_type');
		echo $this->Form->input('day_of_birth');
		echo $this->Form->input('nationality');
		echo $this->Form->input('gender');
		echo $this->Form->input('person_status');
		echo $this->Form->input('resident_country ');
		echo $this->Form->input('resident_city ');
		echo $this->Form->input('resident_street');
		echo $this->Form->input('missing_country ');
		echo $this->Form->input('missing_city');
		echo $this->Form->input('personal_photos');
		echo $this->Form->input('mental_illness');
		echo $this->Form->input('status');
		echo $this->Form->input('kidnapped ');
		echo $this->Form->input('physical_illness');
		echo $this->Form->input('document_id');
		echo $this->Form->input('verified_profile');
		echo $this->Form->input('description');
		echo $this->Form->input('reporter_id');
		echo $this->Form->input('is_admin');
		echo $this->Form->input('user_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Profile.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Profile.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Profiles'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Reporters'), array('controller' => 'reporters', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Reporter'), array('controller' => 'reporters', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Logs'), array('controller' => 'logs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Log'), array('controller' => 'logs', 'action' => 'add')); ?> </li>
	</ul>
</div>
