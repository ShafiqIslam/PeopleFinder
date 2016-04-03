<div class="testimonials view">
<h2><?php echo __('Testimonial'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($testimonial['Testimonial']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Testimonial'); ?></dt>
		<dd>
			<?php echo h($testimonial['Testimonial']['testimonial']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Reporter'); ?></dt>
		<dd>
			<?php echo $this->Html->link($testimonial['Reporter']['id'], array('controller' => 'reporters', 'action' => 'view', $testimonial['Reporter']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Active'); ?></dt>
		<dd>
			<?php echo h($testimonial['Testimonial']['active']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($testimonial['Testimonial']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($testimonial['Testimonial']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Testimonial'), array('action' => 'edit', $testimonial['Testimonial']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Testimonial'), array('action' => 'delete', $testimonial['Testimonial']['id']), array(), __('Are you sure you want to delete # %s?', $testimonial['Testimonial']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Testimonials'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Testimonial'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Reporters'), array('controller' => 'reporters', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Reporter'), array('controller' => 'reporters', 'action' => 'add')); ?> </li>
	</ul>
</div>
