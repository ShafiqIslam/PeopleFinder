<div class="removedProfiles form">
<?php echo $this->Form->create('RemovedProfile'); ?>
	<fieldset>
		<legend><?php echo __('Admin Add Removed Profile'); ?></legend>
	<?php
		echo $this->Form->input('first_name');
		echo $this->Form->input('second_name');
		echo $this->Form->input('last_name');
		echo $this->Form->input('birthdate');
		echo $this->Form->input('blood_type');
		echo $this->Form->input('day_of_birth');
		echo $this->Form->input('nationality');
		echo $this->Form->input('gender');
		echo $this->Form->input('person_status');
		echo $this->Form->input('resident_country');
		echo $this->Form->input('resident_city');
		echo $this->Form->input('resident_street');
		echo $this->Form->input('missing_country');
		echo $this->Form->input('missing_city');
		echo $this->Form->input('lat');
		echo $this->Form->input('lng');
		echo $this->Form->input('mental_illness');
		echo $this->Form->input('status');
		echo $this->Form->input('kidnapped');
		echo $this->Form->input('physical_illness');
		echo $this->Form->input('image_link_1');
		echo $this->Form->input('image_link_2');
		echo $this->Form->input('image_link_3');
		echo $this->Form->input('verified_profile');
		echo $this->Form->input('description');
		echo $this->Form->input('maybe_found_by_admin');
		echo $this->Form->input('maybe_found_by');
		echo $this->Form->input('maybe_found_log');
		echo $this->Form->input('abuse_counter');
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

		<li><?php echo $this->Html->link(__('List Removed Profiles'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Reporters'), array('controller' => 'reporters', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Reporter'), array('controller' => 'reporters', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
