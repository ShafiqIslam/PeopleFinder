<div class="reporters form">
<?php echo $this->Form->create('Reporter'); ?>
	<fieldset>
		<legend><?php echo __('Admin Edit Reporter'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('first_name');
		echo $this->Form->input('second_name');
		echo $this->Form->input('last_name');
		echo $this->Form->input('nationality');
		echo $this->Form->input('gender');
		echo $this->Form->input('resident_country');
		echo $this->Form->input('document_id');
		echo $this->Form->input('email');
		echo $this->Form->input('password');
		echo $this->Form->input('email_verification_token');
		echo $this->Form->input('account_type');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Reporter.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Reporter.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Reporters'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Logs'), array('controller' => 'logs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Log'), array('controller' => 'logs', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Profiles'), array('controller' => 'profiles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Profile'), array('controller' => 'profiles', 'action' => 'add')); ?> </li>
	</ul>
</div>
