<?php $flash = $this->Session->flash('flash'); ?>
<?php if(!empty($flash)) { ?>
	<div class="container flash_message">
		<?php echo $flash;?>
		<button class="flash_close_btn">close</button>
	</div>
<?php } ?>

<?php $logged = $this->Session->read('logged_user'); ?>

<div class="container search_result_details_wrapper">
	<div class="row">
		<div class="col-sm-6 left_side">
			<?php
			$first_name = !empty($profile['Profile']['first_name']) ? $profile['Profile']['first_name'] : "";
			$second_name = !empty($profile['Profile']['second_name']) ? $profile['Profile']['second_name'] : "";
			$last_name = !empty($profile['Profile']['last_name']) ? $profile['Profile']['last_name'] : "";
			$name = $first_name . " " . $second_name . " " . $last_name;
			?>
			<h1><?php echo $name;?></h1>

			
			<div class="row">
				<div class="col-sm-6 pull-left">
					<p class="person_place">
						<b><?php echo $profile['Profile']['missing_city'];?>, <span class="bfh-countries" data-country="<?php echo $profile['Profile']['missing_country'];?>" data-flags="true"></span></b>
					</p>

					<?php if($profile['Profile']['verified_profile']): ?>
						<span class="tooltip_check" data-toggle="tooltip" data-placement="top" title="This profile is verified."><i class="fa fa-check-square-o"></i>Verified</span>
					<?php endif; ?>
				</div>
				<div class="col-sm-6 pull-right">
					<?php
						if ($profile['Profile']['person_status'] == 'Found') {
							$mark_class = "found";
						} elseif ($profile['Profile']['person_status'] == 'Missing') {
							$mark_class = "missing";
						} elseif ($profile['Profile']['person_status'] == 'Maybe Found') {
							$mark_class = "maybe_found";
						}
					?>
					<p class="person_status"><mark class="status_mark <?php echo $mark_class;?>"><?php echo $profile['Profile']['person_status'];?></mark></p>
				</div>
			</div>

			<div class="row person_detail_info">
				<div class="col-sm-5"><h4>Birth Date</h4></div>
				<div class="col-sm-offset-1 col-sm-6"><h4><?php echo $profile['Profile']['birthdate'];?></h4></div>
			</div>
			<div class="row">
				<div class="col-sm-5"><h4>Blood Group</h4></div>
				<div class="col-sm-offset-1 col-sm-6"><h4 style="color: red;"><?php echo $profile['Profile']['blood_type'];?></h4></div>
			</div>
			<div class="row">
				<div class="col-sm-5"><h4>Person's Status</h4></div>
				<?php
					if ($profile['Profile']['person_status'] == 'Found') { ?>
						<div class="col-sm-offset-1 col-sm-6"><h4 class="<?Php echo "if_found" ?>"><?php echo $profile['Profile']['person_status'];?></h4></div>
					<?php } else { ?>
						<div class="col-sm-offset-1 col-sm-6"><h4 class="<?Php echo "if_missing" ?>"><?php echo $profile['Profile']['person_status'];?></h4></div>
					<?php } ?>
			</div>
			<div class="row">
				<div class="col-sm-5"><h4>Nationality</h4></div>
				<div class="col-sm-offset-1 col-sm-6"><h4><span class="bfh-countries" data-country="<?php echo $profile['Profile']['nationality'];?>" data-flags="true"></span></h4></div>
			</div>
			<div class="row">
				<div class="col-sm-5"><h4>Resident Country</h4></div>
				<div class="col-sm-offset-1 col-sm-6"><h4><span class="bfh-countries" data-country="<?php echo $profile['Profile']['resident_country'];?>" data-flags="true"></span></h4></div>
			</div>
			<div class="row">
				<div class="col-sm-5"><h4>Resident City</h4></div>
				<div class="col-sm-offset-1 col-sm-6"><h4><?php echo $profile['Profile']['resident_city'];?></h4></div>
			</div>
			<div class="row">
				<div class="col-sm-5"><h4>Resident Street</h4></div>
				<div class="col-sm-offset-1 col-sm-6"><h4><?php echo $profile['Profile']['resident_street'];?></h4></div>
			</div>
			<div class="row">
				<div class="col-sm-5"><h4>Mental illness</h4></div>
				<div class="col-sm-offset-1 col-sm-6"><h4><?php echo $profile['Profile']['mental_illness'];?></h4></div>
			</div>
			<div class="row">
				<div class="col-sm-5"><h4>Status</h4></div>
				<div class="col-sm-offset-1 col-sm-6"><h4><?php echo $profile['Profile']['status'];?></h4></div>
			</div>
			<div class="row">
				<div class="col-sm-5"><h4>Kidnapped</h4></div>
				<div class="col-sm-offset-1 col-sm-6"><h4><?php echo $profile['Profile']['kidnapped'];?></h4></div>
			</div>
			<div class="row">
				<div class="col-sm-5"><h4>Physical illness</h4></div>
				<div class="col-sm-offset-1 col-sm-6"><h4><?php echo $profile['Profile']['physical_illness'];?></h4></div>
			</div>

			<?php if($profile['Reporter']['reporter_id']!=$logged['id']) { ?>
			<div>
				<h3>Reporter Details</h3>
				<?php
				$first_name = !empty($profile['Reporter']['first_name']) ? $profile['Reporter']['first_name'] : "";
				$second_name = !empty($profile['Reporter']['second_name']) ? $profile['Reporter']['second_name'] : "";
				$last_name = !empty($profile['Reporter']['last_name']) ? $profile['Reporter']['last_name'] : "";
				$reporter_name = $first_name . " " . $second_name . " " . $last_name;
				?>
				<p>Name: <?php echo $reporter_name;?></p>
				<p>Email: <?php echo $profile['Reporter']['email'];?></p>
				<p>Address: <?php echo $profile['Reporter']['resident_country'];?></p>
				<p>Nationality: <?php echo $profile['Reporter']['nationality'];?></p>
				<?php if($profile['Reporter']['account_type']=="Verified") { ?>
					<p>This Reporter is verified</p>
				<?php } ?>
			</div>
			<?php } ?>

			<?php if(!empty($claimed) && $claimed==1) { ?>
				<div>
					<h3>Claimed Reporter Details</h3>
					<?php
					$first_name = !empty($claimed_by['Reporter']['first_name']) ? $claimed_by['Reporter']['first_name'] : "";
					$second_name = !empty($claimed_by['Reporter']['second_name']) ? $claimed_by['Reporter']['second_name'] : "";
					$last_name = !empty($claimed_by['Reporter']['last_name']) ? $claimed_by['Reporter']['last_name'] : "";
					$claimer_name = $first_name . " " . $second_name . " " . $last_name;
					?>
					<p>Name: <?php echo $claimer_name;?></p>
					<p>Email: <?php echo $claimed_by['Reporter']['email'];?></p>
					<p>Address: <?php echo $claimed_by['Reporter']['resident_country'];?></p>
					<p>Nationality: <?php echo $claimed_by['Reporter']['nationality'];?></p>
					<?php if($claimed_by['Reporter']['account_type']=="Verified") { ?>
						<p>This Reporter is verified</p>
					<?php } ?>
				</div>
			<?php } else if(!empty($claimed) && $claimed==2) { ?>
				<div>
					<h3>Claimed Reporter Details</h3>
					<p>Claimed By Admin.</p>
				</div>
			<?php } ?>

		</div>
		<!--===================left side===============-->

		<div class="col-sm-6 right_side">
			<!--Search Images of the Result Details-->
			<div class="">
				<div class="col-sm-12 search_result_img">
					<h1>Images of <?php echo $name;?></h1>
						<?php if(!empty($profile['Profile']['image_link_1'])) { ?>
							<div class=" search_result_Details_img">
								<a class="image-popup-no-margins" href="<?php echo $profile['Profile']['image_link_1'];?>">
									<img class="img_popover_1" src="<?php echo $profile['Profile']['image_link_1'];?>">
								</a>
							</div>
						<?php } ?>
						<?php if(!empty($profile['Profile']['image_link_2'])) { ?>
							<div class=" search_result_Details_img">
								<a class="image-popup-no-margins" href="<?php echo $profile['Profile']['image_link_2'];?>">
									<img class="img_popover_1" src="<?php echo $profile['Profile']['image_link_2'];?>">
								</a>
							</div>
								
						<?php } ?>
						<?php if(!empty($profile['Profile']['image_link_3'])) { ?>
							<div class=" search_result_Details_img">
								<a class="image-popup-no-margins" href="<?php echo $profile['Profile']['image_link_3'];?>">
									<img class="img_popover_1" src="<?php echo $profile['Profile']['image_link_3'];?>">
								</a>
							</div>
								
						<?php } ?> 
						<?php if (empty($profile['Profile']['image_link_1']) && empty($profile['Profile']['image_link_2']) && empty($profile['Profile']['image_link_3'])) { ?>
							<div class=" search_result_Details_img">
								<a class="image-popup-no-margins" href="<?php echo $this->webroot . "img/no_image_available.png" ?>">
									<img class="img_popover_1" src="<?php echo $this->webroot . "img/no_image_available.png" ?>">
								</a>
							</div>
						<?php } ?>
				</div>

				<!--=======This is for captcha using=========-->
				<?php if(!empty($logged)) { ?>
					<div class="row captcha_section">
						<?php if ($profile['Profile']['person_status'] == 'Missing') { ?>
							<?php
								if($logged['id'] == $profile['Profile']['reporter_id'])
									$found_link = $this->webroot . "profiles/found/" . $profile['Profile']['id'];
								else
									$found_link = $this->webroot . "profiles/maybe_found/" . $profile['Profile']['id'];
							?>
							<div class="col-sm-6 btn_found_section">
								<a class="btn btn_found" href="<?php echo $found_link;?>">Found</a>
							</div>
						<?php } else if($profile['Profile']['person_status'] == 'Maybe Found') { ?>
							<?php if($logged['id'] == $profile['Profile']['reporter_id']) { ?>
								<?php
								$found_link = $this->webroot . "profiles/found/" . $profile['Profile']['id'];
								$missing_link = $this->webroot . "profiles/missing/" . $profile['Profile']['id'];
								?>
								<div class="col-sm-6 btn_found_section">
									<a class="btn btn_found" href="<?php echo $found_link;?>">Found</a>
								</div>
								<div class="col-sm-6 btn_found_section">
									<a class="btn btn_found" href="<?php echo $missing_link;?>">Missing</a>
								</div>
							<?php } ?>
						<?php } ?>

						<?php if($logged['id'] != $profile['Profile']['reporter_id']) { ?>
							<div class="col-sm-6 report_abuse_section">
								<form id="captcha_form"  method="post" class="form-horizontal report_abuse" action="">
									<div id="popover_content_wrapper" class="captcha" style="display: none">
										<p></p>

										<div id="captcha" class="form-group">
											<label class="col-sm-6 control-label" id="captchaOperation"></label>
											<div class="col-sm-6 captcha_input">
												<input type="text" class="form-control" name="captcha" />
											</div>
										</div>
									</div>

									<div class="form-group">
										<div class="col-sm-12">
											<a type="submit" class="btn btn-warning btn_abuse danger" data-title="Please fill the correct captcha." name="abuse" value="abuse" href="<?php echo $this->webroot;?>search_result">Abuse</a>
										</div>
									</div>
								</form>
							</div>
						<?php } ?>
					</div>
				<?php } ?>
			</div>

			<div class="col-sm-12 log_section">
				<div id="log_scroll">
			        <h3>Profile Log Book</h3>
			        <hr>
			        <ul>
						<?php if(!empty($profile['Log'])) { foreach($profile['Log'] as $key => $log) { ?>
			        		<li>
								<strong>
									<?php echo date_format(date_create($log['created']),'h:m A - d M, Y') . ": "; ?>
								</strong>
								<code><?php echo $log['message']; ?></code>
							</li>
						<?php } } else { ?>
			        		<li>No log yet to show for this profile.</li>
						<?php } ?>
			        </ul>
			    </div>
			</div>
		</div>
	</div>

	<?php if(!empty($related) && $related==1) { ?>
	<hr>
	<div class="row">
		<div class="container">
			<!--=========Related result=============-->
			<div class="col-sm-12 related_search">
				<h1>Related Search Results</h1>
				<ul>
					<?php foreach ($related_profiles as $key=>$item) { ?>
					<li class="col-sm-2">
						<?php
						if(!empty($item['Profile']['image_link_1']))
							$image_link = $item['Profile']['image_link_1'];
						else if(!empty($item['Profile']['image_link_2']))
							$image_link = $item['Profile']['image_link_2'];
						else if(!empty($item['Profile']['image_link_3']))
							$image_link = $item['Profile']['image_link_3'];
						else
							$image_link = $this->webroot . "img/no_image_available.png";

						$first_name = !empty($item['Profile']['first_name']) ? $item['Profile']['first_name'] : "";
						$second_name = !empty($item['Profile']['second_name']) ? $item['Profile']['second_name'] : "";
						$last_name = !empty($item['Profile']['last_name']) ? $item['Profile']['last_name'] : "";
						$name = $first_name . " " . $second_name . " " . $last_name;
						?>
						<a href="<?php echo $this->webroot?>profiles/full_profile/<?php echo $item['Profile']['id']?>">
							<img class="img-thumbnail" src="<?php echo $image_link;?>">
							<h4><?php echo $name;?></h4>
							<p><?php echo $item['Profile']['person_status'];?> <?php echo $item['Profile']['missing_city'];?>, <?php echo $item['Profile']['missing_country'];?>.</p>
						</a>
					</li>
					<?php } ?>
				</ul>
			</div>
		</div>
	</div>
	<?php } ?>
</div>