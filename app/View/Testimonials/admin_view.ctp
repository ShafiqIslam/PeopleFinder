<?php echo $this->element('menu');?>
<div class="cmsUsers col-md-10 col-sm-10 index">
	<div class="white">
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
					<?php echo h($testimonial['Reporter']['first_name']); ?>
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
	</div>
</div>