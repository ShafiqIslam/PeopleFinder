<script type="text/javascript">
	$(function () {
		$("#go").on('click', function () {
			var keyword = $.trim($('#keyword').val());
			location.href = ROOT+ 'admin/profiles/index/keyword:' + keyword;
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
		<h2><?php echo __('Reporters'); ?></h2>

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
				<th><?php echo $this->Paginator->sort('id'); ?></th>
				<th><?php echo $this->Paginator->sort('person_status'); ?></th>
				<th><?php echo $this->Paginator->sort('first_name'); ?></th>
				<th><?php echo $this->Paginator->sort('second_name'); ?></th>
				<th><?php echo $this->Paginator->sort('last_name'); ?></th>
				<th><?php echo $this->Paginator->sort('birthdate'); ?></th>
				<th><?php echo $this->Paginator->sort('blood_type'); ?></th>
				<th><?php echo $this->Paginator->sort('nationality'); ?></th>
				<th><?php echo $this->Paginator->sort('gender'); ?></th>
				<th><?php echo $this->Paginator->sort('missing_country'); ?></th>
				<th><?php echo $this->Paginator->sort('missing_city'); ?></th>
				<th><?php echo $this->Paginator->sort('verified_profile'); ?></th>
				<th><?php echo $this->Paginator->sort('reporter_id'); ?></th>
				<th><?php echo $this->Paginator->sort('created'); ?></th>
				<th class="actions"><?php echo __('Actions'); ?></th>
			</tr>
			</thead>
			<tbody>
			<?php foreach ($profiles as $profile): ?>
			<tr>
				<td><?php echo h($profile['Profile']['id']); ?>&nbsp;</td>
				<td><?php echo h($profile['Profile']['person_status']); ?>&nbsp;</td>
				<td><?php echo h($profile['Profile']['first_name']); ?>&nbsp;</td>
				<td><?php echo h($profile['Profile']['second_name']); ?>&nbsp;</td>
				<td><?php echo h($profile['Profile']['last_name']); ?>&nbsp;</td>
				<td><?php echo h($profile['Profile']['birthdate']); ?>&nbsp;</td>
				<td><?php echo h($profile['Profile']['blood_type']); ?>&nbsp;</td>
				<td><?php echo h($profile['Profile']['nationality']); ?>&nbsp;</td>
				<td><?php echo h($profile['Profile']['gender']); ?>&nbsp;</td>
				<td><?php echo h($profile['Profile']['missing_country']); ?>&nbsp;</td>
				<td><?php echo h($profile['Profile']['missing_city']); ?>&nbsp;</td>
				<td><?php echo h($profile['Profile']['verified_profile']); ?>&nbsp;</td>
				<td><?php echo h($profile['Reporter']['first_name']); ?>&nbsp;</td>
				<td><?php echo h($profile['Profile']['created']); ?>&nbsp;</td>
				<td class="actions">
					<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $profile['Profile']['id'])); ?>
					<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $profile['Profile']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $profile['Profile']['id']))); ?>
				</td>
			</tr>
			<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>
