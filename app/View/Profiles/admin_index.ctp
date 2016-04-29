<script type="text/javascript">
	$(function () {
		$("#go").on('click', function () {
			var keyword = $.trim($('#keyword').val());
			location.href = ROOT+ 'admin/profiles/index/keyword:' + keyword;
		});

		$("input[name=spammed_only]").on('change', function () {
			if($("input[name=spammed_only]").is(":checked")) {
				$('#keyword').val("spammed");
			} else {
				$('#keyword').val("");
			}
			$("#go").click();
		});
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
		<h2><?php echo __('Profiles'); ?></h2>

		<div class="form-horizontal">
			<div class="form-group">
				<label for="inputEmail3" class="col-sm-1 control-label"><?php echo __("Keyword") ?></label>
				<div class="col-sm-3">
					<?php echo $this->Form->input('titlex', array('id' => 'keyword', 'label' => false,'class'=>'form-control', 'value'=>$keyword)); ?>
				</div>
				<div class="col-sm-1">
					<?php
					echo $this->Form->input('Go', array('id' => 'go','class'=>'btn btn-info', 'type' => 'button', 'label' => false));
					?>
				</div>

				<div class="col-sm-4 pull-right" style="text-align: right">
					<input style="margin-top: 11px" type="checkbox" name="spammed_only" <?php echo ($keyword=="spammed") ? "checked" : "";?> id="spammed_only">
					<label for="inputEmail3" style="text-align: right" class="col-sm-11 control-label"><?php echo __("Spammed Profiles") ?></label>
				</div>
			</div>
		</div>

		<table cellpadding="0" cellspacing="0" class="table">
			<thead>
			<tr>
				<th><?php echo $this->Paginator->sort('id'); ?></th>
				<th><?php echo $this->Paginator->sort('person_status'); ?></th>
				<th><?php echo $this->Paginator->sort('first_name'); ?></th>
				<th><?php echo $this->Paginator->sort('last_name'); ?></th>
				<th><?php echo $this->Paginator->sort('gender'); ?></th>
				<th><?php echo $this->Paginator->sort('missing_country'); ?></th>
				<th><?php echo $this->Paginator->sort('missing_city'); ?></th>
				<th><?php echo $this->Paginator->sort('reporter_id'); ?></th>
				<th class="actions"><?php echo __('Actions'); ?></th>
			</tr>
			</thead>
			<tbody>
			<?php foreach ($profiles as $profile): ?>
			<tr>
				<td><?php echo h($profile['Profile']['id']); ?>&nbsp;</td>
				<td><?php echo h($profile['Profile']['person_status']); ?>&nbsp;</td>
				<td><?php echo h($profile['Profile']['first_name']); ?>&nbsp;</td>
				<td><?php echo h($profile['Profile']['last_name']); ?>&nbsp;</td>
				<td><?php echo h($profile['Profile']['gender']); ?>&nbsp;</td>
				<td><?php echo h($profile['Profile']['missing_country']); ?>&nbsp;</td>
				<td><?php echo h($profile['Profile']['missing_city']); ?>&nbsp;</td>
				<td><?php echo h($profile['Reporter']['first_name']); ?>&nbsp;</td>
				<td class="actions">
					<a class="btn btn-info" target="_blank" href="<?php echo $this->webroot;?>profiles/full_profile/<?php echo $profile['Profile']['id'];?>"><i class="fa fa-eye"></i></a>
					<a class="btn btn-info" href="<?php echo $this->webroot;?>admin/profiles/edit/<?php echo $profile['Profile']['id'];?>"><i class="fa fa-pencil"></i></a>
					<?php echo $this->Form->postLink('X', array('action' => 'delete', $profile['Profile']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $profile['Profile']['id']), 'class' => 'btn btn-info')); ?>
				</td>
			</tr>
			<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>
