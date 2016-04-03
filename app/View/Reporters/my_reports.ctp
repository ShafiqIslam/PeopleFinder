<div class="container">
	<div class="my_report_page result_body">
		<div class="col-sm-12">
			<h1>Report List</h1>
			<hr>
			<?php
				if (empty($my_profiles)) { ?>
					<p class="warning"><?php echo "You have no profile!"; ?></p>
					<p class="warning_solve"><a href="<?php echo $this->webroot;?>create_report"></a></p>
					<div class="col-sm-6 col-sm-offset-3 ">
			            <a class="btn btn  btn_service pull-left" href="<?php echo $this->webroot;?>report_found">Report Found</a>
			            <a class="btn btn btn_service pull-right" href="<?php echo $this->webroot;?>report_missing">Report Missing</a>
				    </div>
				<?php }
			?>
			<ul>
				<?php foreach($my_profiles as $key => $item) { ?>
				<li class="row">
					<?php
					$first_name = !empty($item['first_name']) ? $item['first_name'] : "";
					$second_name = !empty($item['second_name']) ? $item['second_name'] : "";
					$last_name = !empty($item['last_name']) ? $item['last_name'] : "";
					$name = $first_name . " " . $second_name . " " . $last_name;

					if(!empty($item['image_link_1']))
						$image_link = $item['image_link_1'];
					else if(!empty($item['image_link_2']))
						$image_link = $item['image_link_2'];
					else if(!empty($item['image_link_3']))
						$image_link = $item['image_link_3'];
					else
						$image_link = $this->webroot . "img/no_image_available.png";
					?>
					<div class="col-sm-2">
						<img class="img-thumbnail img_result" src="<?php echo $image_link;?>">
					</div>
					<div class="col-sm-4">
							<h4><?php echo $name;?></h4>							
							<p>
								<?php echo $item['missing_city'];?>,&nbsp;
								<?php echo $item['missing_country'];?>.&nbsp;
							</p>
							<p>
								<?php if($item['verified_profile']): ?>
									<span class="tooltip_check" data-toggle="tooltip" data-placement="top" title="This profile is verified."><i class="fa fa-check-square-o"></i>Verified</span>
								<?php endif; ?>
							</p>
					</div>
					<div class="col-sm-3">
						<?php
							if ($item['person_status'] == 'Found') {
								?>
									<p class="person_status"><mark class="found"><?php echo $item['person_status'];?>&nbsp;</mark></p>
								<?php
							};
							if ($item['person_status'] == 'Missing') {
								?>
									<p class="person_status"><mark class="missing"><?php echo $item['person_status'];?>&nbsp;</mark></p>
								<?php
							};
							if ($item['person_status'] == 'Maybe Found') {
								?>
									<p class="person_status"><mark class="maybe_found"><?php echo $item['person_status'];?>&nbsp;</mark></p>
								<?php
							};
						?>
					</div>
					<div class="col-sm-3">
						<?php
							echo $this->Html->link(__('Edit'), array('controller'=>'profiles', 'action' => 'edit', $item['id']), array( 'class' => 'btn btn_myaccount edit'));
							echo $this->Form->postLink(__('Delete'), array('controller'=>'profiles', 'action' => 'delete', $item['id']), array( 'class' => 'btn btn_myaccount delete'), __('Are you sure you want to delete # %s?', $name));
						?>
					</div>
				</li>
				<?php } ?>
			</ul>
		</div>
	</div>
</div>