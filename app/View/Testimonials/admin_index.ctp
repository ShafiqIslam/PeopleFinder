<script type="text/javascript">
	$(function () {
		$("#go").on('click', function () {
			var keyword = $.trim($('#keyword').val());
			location.href = ROOT+ 'admin/testimonials/index/keyword:' + keyword;
		})
	});
</script>

<?php echo $this->element('menu');?>
<div class="cmsUsers col-md-10 col-sm-10 index">
	<div class="white">
		<div class="paging pull-right">
			<ul class="pagination pull-right">
				<?php
				$this->Paginator->options(array(
					'url' => array(
						'keyword' => $keyword
					)
				));
				echo $this->Paginator->prev(' < ', array('tag' => 'li', 'disabledTag' => 'li', 'escape' => false), '<a href="#"> < </a>', array('class' => 'prev disabled', 'tag' => 'li', 'disabledTag' => 'li', 'escape' => false));
				echo $this->Paginator->numbers(array('separator' => '', 'tag' => 'li', 'currentTag' => 'a'));
				echo $this->Paginator->next(' > ', array('tag' => 'li', 'disabledTag' => 'li', 'escape' => false), '<a href="#"> > </a>', array('class' => 'next disabled', 'tag' => 'li', 'disabledTag' => 'li', 'escape' => false));
				?>
			</ul>
			<p class="text-right">
				<?php
				echo $this->Paginator->counter(array(
					'format' => __('Showing {:start} to {:end} of {:count} entries')
				));
				?>
			</p>
		</div>
		<h2><?php echo __('Testimonials'); ?></h2>

		<div class="form-horizontal">
			<div class="form-group">
				<label for="inputEmail3" class="col-sm-1 control-label">Keyword</label>
				<div class="col-sm-3">
					<?php echo $this->Form->input('titlex', array('id' => 'keyword', 'label' => false,'class'=>'form-control')); ?>
				</div>
				<div class="col-sm-1">
					<?php
					echo $this->Form->input('Go', array('id' => 'go','class'=>'btn btn-info', 'type' => 'button', 'label' => false));
					?>
				</div>
			</div>
		</div>

		<table cellpadding="0" cellspacing="0" class="table">
			<thead>
			<tr>
				<th><?php echo $this->Paginator->sort('reporter_id'); ?></th>
				<th><?php echo $this->Paginator->sort('testimonial'); ?></th>
				<th><?php echo $this->Paginator->sort('active'); ?></th>
				<th><?php echo $this->Paginator->sort('created'); ?></th>
				<th class="actions"><?php echo __('Actions'); ?></th>
			</tr>
			</thead>
			<tbody>
				<?php foreach ($testimonials as $testimonial): ?>
				<tr>
					<td><?php echo h($testimonial['Reporter']['first_name']); ?>&nbsp;</td>
					<td><?php echo h(mb_substr($testimonial['Testimonial']['testimonial'], 0, 20)); ?>&nbsp;...&nbsp;</td>
					<td><?php echo h($testimonial['Testimonial']['active']); ?>&nbsp;</td>
					<td><?php echo date_format(date_create($testimonial['Testimonial']['created']),'d M Y');?>&nbsp;</td>
					<td class="actions" style="min-width: 250px">
						<?php echo $this->Html->link(__('View'), array('action' => 'view', $testimonial['Testimonial']['id']), array( 'class' => 'btn btn-info', 'target'=>'_blank')); ?>
						<?php if($testimonial['Testimonial']['active']) { ?>
							<?php echo $this->Html->link(__('Deactivate'), array('action' => 'activate', $testimonial['Testimonial']['id']), array( 'class' => 'btn btn-info')); ?>
						<?php } else { ?>
							<?php echo $this->Html->link(__('Activate'), array('action' => 'activate', $testimonial['Testimonial']['id']), array( 'class' => 'btn btn-info')); ?>
						<?php } ?>
						<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $testimonial['Testimonial']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $testimonial['Testimonial']['id']), 'class' => 'btn btn-info')); ?>
					</td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>
