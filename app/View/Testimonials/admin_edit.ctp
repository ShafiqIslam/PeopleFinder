<div class="testimonials form">
<?php echo $this->Form->create('Testimonial'); ?>
	<fieldset>
		<legend><?php echo __('Admin Edit Testimonial'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('testimonial');
		echo $this->Form->input('reporter_id');
		echo $this->Form->input('active');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Testimonial.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Testimonial.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Testimonials'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Reporters'), array('controller' => 'reporters', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Reporter'), array('controller' => 'reporters', 'action' => 'add')); ?> </li>
	</ul>
</div>
