<?php $logged = $this->Session->read('logged_user'); ?>
<?php
	$link = "$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
 ?>

<div class="container-fluid">
	<!--Social Share button=============-->
	<div class="sticky-container">
		<ul class="sticky">
			<a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $link ?>" target="_blank">
				<li>
					<img width="32" height="32" title="" alt="" src="<?php echo $this->webroot;?>img/fb1.png" />
					<p>Facebook</p>
				</li>
			</a>
			<a href="https://twitter.com/home?status=<?php echo $link ?>" target="_blank">
				<li>
					<img width="32" height="32" title="" alt="" src="<?php echo $this->webroot;?>img/tw1.png" />
					<p>Twitter</p>
				</li>
			</a>
			<a href="https://plus.google.com/share?url=<?php echo $link ?>" target="_blank">
				<li>
					<img width="32" height="32" title="" alt="" src="<?php echo $this->webroot;?>img/google-plus.png" />
					<p>Google+</p>
				</li>
			</a>
		</ul>
	</div>
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
						<h3 class="p_id"><?php echo __("Profile Id :");?> <?php echo $profile['Profile']['id'];?></h3>
						<p class="person_place">
							<b><?php echo $profile['Profile']['missing_city'];?>&nbsp; <span class="bfh-countries" data-country="<?php echo $profile['Profile']['missing_country'];?>" data-flags="true"></span></b>
						</p>

						<?php if($profile['Profile']['verified_profile']): ?>
							<span class="tooltip_check" data-toggle="tooltip" data-placement="top" title="This profile is verified."><i class="fa fa-check-square-o"></i><?php echo __("Verified");?></span>
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
					<div class="col-sm-5"><h4><?php echo __("Date of Birth");?></h4></div>
					<?php 
						if (empty($profile['Profile']['birthdate'])) { ?>
							<div class="col-sm-offset-1 col-sm-6"><h4 style="color: #FFC516;"><?php echo __("No Birthdate Selected.");?></h4></div>
						<?php } else { ?>
							<div class="col-sm-offset-1 col-sm-6"><h4><?php echo $profile['Profile']['birthdate'];?></h4></div>
					<?php } ?>
					
				</div>
				<div class="row">
					<div class="col-sm-5"><h4><?php echo __("Blood Group");?></h4></div>
					<?php if (empty($profile['Profile']['blood_type'])) { ?>
						<div class="col-sm-offset-1 col-sm-6"><h4 style="color: red;"><?php echo __("No Blood Group Selected.");?></h4></div>
					<?php } else { ?>
						<div class="col-sm-offset-1 col-sm-6"><h4 style="color: red;"><?php echo $profile['Profile']['blood_type'];?></h4></div>
					<?php } ?>
				</div>
				<div class="row">
					<div class="col-sm-5"><h4><?php echo __("Person's Status");?></h4></div>
					<?php
						if ($profile['Profile']['person_status'] == 'Found') { ?>
							<div class="col-sm-offset-1 col-sm-6"><h4 class="<?Php echo "if_found" ?>"><?php echo $profile['Profile']['person_status'];?></h4></div>
						<?php } else { ?>
							<div class="col-sm-offset-1 col-sm-6"><h4 class="<?Php echo "if_missing" ?>"><?php echo $profile['Profile']['person_status'];?></h4></div>
					<?php } ?>
				</div>
				<div class="row">
					<div class="col-sm-5"><h4><?php echo __("Nationality");?></h4></div>
					<?php if (empty($profile['Profile']['nationality'])) { ?>
						<div class="col-sm-offset-1 col-sm-6"><h4 style="color: #FFC516;"><span class="bfh-countries" data-country="<?php echo __("Nationatily not Selected.");?>" data-flags="true"></span>
					<?php } else { ?>
						<div class="col-sm-offset-1 col-sm-6"><h4><span class="bfh-countries" data-country="<?php echo $profile['Profile']['nationality'];?>" data-flags="true"></span></h4></div>
					<?php } ?>
				</div>
				<div class="row">
					<div class="col-sm-5"><h4><?php echo __("Resident Country");?></h4></div>
					<div class="col-sm-offset-1 col-sm-6"><h4><span class="bfh-countries" data-country="<?php echo $profile['Profile']['resident_country'];?>" data-flags="true"></span></h4></div>
				</div>
				<div class="row">
					<div class="col-sm-5"><h4><?php echo __("Resident City");?></h4></div>
					<?php
						if (empty($profile['Profile']['resident_city'])) { ?>
							<div class="col-sm-offset-1 col-sm-6"><h4 style="color: #FFC516;"><?php echo __("Resident City Not Selected.");?></h4></div>
						<?php } else { ?>
							<div class="col-sm-offset-1 col-sm-6"><h4><?php echo $profile['Profile']['resident_city'];?></h4></div>
					<?php } ?>
				</div>
				<div class="row">
					<div class="col-sm-5"><h4><?php echo __("Resident Street");?></h4></div>
					<?php 
						if (empty($profile['Profile']['resident_street'])) { ?>
							<div class="col-sm-offset-1 col-sm-6"><h4 style="color: #FFC516;"><?php echo __("Resident Street Not Selected.");?></h4></div>
						<?php } else { ?>
							<div class="col-sm-offset-1 col-sm-6"><h4><?php echo $profile['Profile']['resident_street'];?></h4></div>
					<?php } ?>
					
				</div>
				<div class="row">
					<div class="col-sm-5"><h4><?php echo __("Mental illness");?></h4></div>
					<?php
						if (empty($profile['Profile']['mental_illness'])) { ?>
							<div class="col-sm-offset-1 col-sm-6"><h4 style="color: #FFC516;"><?php echo __("Mental illness Not Selected.");?></h4></div>
						<?php } else { ?>
							<div class="col-sm-offset-1 col-sm-6"><h4><?php echo $profile['Profile']['mental_illness'];?></h4></div>
					<?php } ?>
				</div>
				<div class="row">
					<div class="col-sm-5"><h4><?php echo __("Status");?></h4></div>
					<?php
						if (empty($profile['Profile']['status'])) { ?>
							<div class="col-sm-offset-1 col-sm-6"><h4 style="color: #FFC516;"><?php echo __("No Status Selected.");?></h4></div>
						<?php } else { ?>
							<div class="col-sm-offset-1 col-sm-6"><h4><?php echo $profile['Profile']['status'];?></h4></div>
					<?php } ?>
				</div>
				<div class="row">
					<div class="col-sm-5"><h4><?php echo __("Kidnapped");?></h4></div>
					<?php
						if (empty($profile['Profile']['kidnapped'])) { ?>
							<div class="col-sm-offset-1 col-sm-6"><h4 style="color: #FFC516;"><?php echo __("No Information.");?></h4></div>
						<?php } else { ?>
							<div class="col-sm-offset-1 col-sm-6"><h4><?php echo $profile['Profile']['kidnapped'];?></h4></div>
						<?php } ?>
				</div>
				<div class="row">
					<div class="col-sm-5"><h4><?php echo __("Physical illness");?></h4></div>
					<?php
						if (empty($profile['Profile']['physical_illness'])) { ?>
							<div class="col-sm-offset-1 col-sm-6"><h4 style="color: #FFC516;"><?php echo __("No Information.");?></h4></div>
						<?php } else { ?>
							<div class="col-sm-offset-1 col-sm-6"><h4><?php echo $profile['Profile']['physical_illness'];?></h4></div>
						<?php } ?>
				</div>

				<?php if($profile['Profile']['reporter_id']!=$logged['id']) { ?>

				<hr> 
				<div class="reporter_details">
					<h3><?php echo __("Reporter Details");?></h3>
					<?php
					$first_name = !empty($profile['Reporter']['first_name']) ? $profile['Reporter']['first_name'] : "";
					$second_name = !empty($profile['Reporter']['second_name']) ? $profile['Reporter']['second_name'] : "";
					$last_name = !empty($profile['Reporter']['last_name']) ? $profile['Reporter']['last_name'] : "";
					$reporter_name = $first_name . " " . $second_name . " " . $last_name;
					?>

					<div class="row">
	                    <div class="col-sm-4"><h4><?php echo __("Reporter Name");?></h4></div>
	                    <div class="col-sm-offset-1 col-sm-7"><h4><?php echo $reporter_name;?></h4></div>
	                </div>
	                <div class="row">
	                    <div class="col-sm-4"><h4><?php echo __("Email");?></h4></div>
	                    <div class="col-sm-offset-1 col-sm-7"><h4><?php echo (!empty($logged)) ? $profile['Reporter']['email'] : "You have to login to obtain the email.";?></h4></div>
	                </div>
	                <div class="row">
	                    <div class="col-sm-4"><h4><?php echo __("Address");?></h4></div>
	                    <div class="col-sm-offset-1 col-sm-7"><h4><span class="bfh-countries" data-country="<?php echo $profile['Reporter']['resident_country'];?>" data-flags="true"></span></h4></div>
	                </div>
	                <div class="row">
	                    <div class="col-sm-4"><h4><?php echo __("Nationality");?></h4></div>
	                    <div class="col-sm-offset-1 col-sm-7"><h4><span class="bfh-countries" data-country="<?php echo $profile['Reporter']['nationality'];?>" data-flags="true"></span></h4></div>
	                </div>

	                <?php if(0): ?>
						<p>Name: <?php echo $reporter_name;?></p>
						<p>Email: <?php echo (!empty($logged)) ? $profile['Reporter']['email'] : "You have to login to obtain the email.";?></p>
						<p>Address: <?php echo $profile['Reporter']['resident_country'];?></p>
						<p>Nationality: <?php echo $profile['Reporter']['nationality'];?></p>
						<?php if($profile['Reporter']['account_type']=="Verified") { ?>
							<p><?php echo __("This Reporter is verified");?></p>
						<?php } ?>
					<?php endif; ?>
				</div>
				<?php } ?>

				<?php if(!empty($claimed) && $claimed==1) { ?>
					<hr>
					<div class="reporter_details">

						<h3><?php echo __("Claimed Reporter Details");?></h3>
						<?php
						$first_name = !empty($claimed_by['Reporter']['first_name']) ? $claimed_by['Reporter']['first_name'] : "";
						$second_name = !empty($claimed_by['Reporter']['second_name']) ? $claimed_by['Reporter']['second_name'] : "";
						$last_name = !empty($claimed_by['Reporter']['last_name']) ? $claimed_by['Reporter']['last_name'] : "";
						$claimer_name = $first_name . " " . $second_name . " " . $last_name;
						?>

						<div class="row">
	                        <div class="col-sm-4"><h4><?php echo __("Clamier Name");?></h4></div>
	                        <div class="col-sm-offset-1 col-sm-7"><h4><?php echo $claimer_name;?></h4></div>
	                    </div>
	                    <div class="row">
	                        <div class="col-sm-4"><h4><?php echo __("Email");?></h4></div>
	                        <div class="col-sm-offset-1 col-sm-7"><h4><?php echo (!empty($logged)) ? $claimed_by['Reporter']['email'] : "You have to login to obtain the email.";?></h4></div>
	                    </div>
	                    <div class="row">
	                        <div class="col-sm-4"><h4><?php echo __("Address");?></h4></div>
	                        <div class="col-sm-offset-1 col-sm-7"><h4><span class="bfh-countries" data-country="<?php echo $claimed_by['Reporter']['resident_country'];?>" data-flags="true"></span></h4></div>
	                    </div>
	                    <div class="row">
	                        <div class="col-sm-4"><h4><?php echo __("Nationality");?></h4></div>
	                        <div class="col-sm-offset-1 col-sm-7"><h4><span class="bfh-countries" data-country="<?php echo $claimed_by['Reporter']['nationality'];?>" data-flags="true"></span></h4></div>
	                    </div>

	                    <?php if(0): ?>
							<p>Name: <?php echo $claimer_name;?></p>
							<p>Email: <?php echo (!empty($logged)) ? $claimed_by['Reporter']['email'] : "You have to login to obtain the email.";?></p>
							<p>Address: <?php echo $claimed_by['Reporter']['resident_country'];?></p>
							<p>Nationality: <?php echo $claimed_by['Reporter']['nationality'];?></p>
							<?php if($claimed_by['Reporter']['account_type']=="Verified") { ?>
								<p><?php echo __("This Reporter is verified");?></p>
							<?php } ?>
						<?php endif; ?>
					</div>
				<?php } else if(!empty($claimed) && $claimed==2) { ?>
					<div>
						<h3><?php echo __("Claimed Reporter Details");?></h3>
						<p><?php echo __("Claimed By Admin.");?></p>
					</div>
				<?php } ?>

			</div>
			<!--===================left side===============-->

			<div class="col-sm-6 right_side">
				<!--Search Images of the Result Details-->
				<div class="">
					<div class="col-sm-12 search_result_img">
						<h1><?php echo __("Images of ");?> <?php echo $name;?></h1>
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
									<a class="btn btn_found" href="<?php echo $found_link;?>"><?php echo __("Found");?></a>
								</div>
							<?php } else if($profile['Profile']['person_status'] == 'Maybe Found') { ?>
								<?php if($logged['id'] == $profile['Profile']['reporter_id']) { ?>
									<?php
									$found_link = $this->webroot . "profiles/found/" . $profile['Profile']['id'];
									$missing_link = $this->webroot . "profiles/missing/" . $profile['Profile']['id'];
									?>
									<div class="col-sm-6 btn_found_section">
										<a class="btn btn_found" href="<?php echo $found_link;?>"><?php echo __("Found");?></a>
									</div>
									<div class="col-sm-6 btn_found_section">
										<a class="btn btn_found" href="<?php echo $missing_link;?>"><?php echo __("Missing");?></a>
									</div>
								<?php } ?>
							<?php } ?>

							<?php if($logged['id'] != $profile['Profile']['reporter_id']) { ?>
								<?php $abuse_link = $this->webroot . "profiles/abuse/" . $profile['Profile']['id']; ?>
								<div class="col-sm-6 report_abuse_section">
										<div class="form-group">
											<div class="col-sm-12">
												<a type="submit" class="btn btn_warning btn_abuse" href="<?php echo $abuse_link;?>"><?php echo __("Abuse");?></a>
											</div>
										</div>
								</div>
							<?php } ?>
						</div>
					<?php } ?>
				</div>

				<div class="col-sm-12 log_section">
					<div id="log_scroll">
				        <h3><?php echo __("Profile Log Book");?></h3>
				        <hr>
				        <ul>
							<?php if(!empty($profile['Log'])) { ?>
								<?php foreach($profile['Log'] as $key => $log) { ?>
									<li>
										<strong>
											<?php echo date_format(date_create($log['created']),'h:m A - d M, Y') . ": "; ?>
										</strong>
										<code><?php echo $log['message']; ?></code>
									</li>
								<?php } ?>
							<?php } else { ?>
				        		<li><?php echo __("No log yet to show for this profile.");?></li>
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
					<h1><?php echo __("Related Search Results");?></h1>
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
</div>