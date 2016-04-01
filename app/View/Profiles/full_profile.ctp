<div class="container search_result_details_wrapper">
	<div class="row">
		<div class="col-sm-5 left_side">
			<?php
			$first_name = !empty($profile['Profile']['first_name']) ? $profile['Profile']['first_name'] : "";
			$second_name = !empty($profile['Profile']['second_name']) ? $profile['Profile']['second_name'] : "";
			$last_name = !empty($profile['Profile']['last_name']) ? $profile['Profile']['last_name'] : "";
			$name = $first_name . " " . $second_name . " " . $last_name;
			?>
			<h1><?php echo $name;?></h1>

			<?php if($profile['Profile']['verified_profile']): ?>
			<span><a class="tooltip_check" href="#" data-toggle="tooltip" data-placement="top" title="Verified Report."><i class="fa fa-check-square-o"></i></a></span>
			<?php endif; ?>
			
			<p><b><?php echo $profile['Profile']['person_status'];?> : <?php echo $profile['Profile']['missing_city'];?>, <?php echo $profile['Profile']['missing_country'];?>.</b></p>

			<div class="row">
				<div class="col-sm-5"><h4>Birth Date</h4></div>
				<div class="col-sm-offset-1 col-sm-6"><h4><?php echo $profile['Profile']['birthdate'];?></h4></div>
			</div>
			<div class="row">
				<div class="col-sm-5"><h4>Blood Group</h4></div>
				<div class="col-sm-offset-1 col-sm-6"><h4><?php echo $profile['Profile']['blood_type'];?></h4></div>
			</div>
			<div class="row">
				<div class="col-sm-5"><h4>Person's Status</h4></div>
				<div class="col-sm-offset-1 col-sm-6"><h4><?php echo $profile['Profile']['person_status'];?></h4></div>
			</div>
			<div class="row">
				<div class="col-sm-5"><h4>Nationality</h4></div>
				<div class="col-sm-offset-1 col-sm-6"><h4><?php echo $profile['Profile']['nationality'];?></h4></div>
			</div>
			<div class="row">
				<div class="col-sm-5"><h4>Resident Country</h4></div>
				<div class="col-sm-offset-1 col-sm-6"><h4><?php echo $profile['Profile']['resident_country'];?></h4></div>
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
		</div>
		<!--===================left side===============-->
		<div class="col-sm-7 right_side">
			<!--Search Images of the Result Details-->
			<div class="">
				<div class="col-sm-12 search_result_img">
					<h1>Images of <?php echo $name;?></h1>
					<ul>
						<?php if(!empty($profile['Profile']['image_link_1'])) { ?>
							<li class="col-sm-4 search_result_Details_img"><img class="img-responsive" src="<?php echo $profile['Profile']['image_link_1'];?>"></li>
						<?php } ?>
						<?php if(!empty($profile['Profile']['image_link_2'])) { ?>
							<li class="col-sm-4 search_result_Details_img"><img class="img-responsive" src="<?php echo $profile['Profile']['image_link_2'];?>"></li>
						<?php } ?>
						<?php if(!empty($profile['Profile']['image_link_3'])) { ?>
							<li class="col-sm-4 search_result_Details_img"><img class="img-responsive" src="<?php echo $profile['Profile']['image_link_3'];?>"></li>
						<?php } ?>
					</ul>
				</div>

				<!--=======This is for captcha using=========-->
				<div class="row captcha_section">
					<div class="col-sm-6 btn_found_section">
						<a class="btn btn_found pull-right" href="">Found</a>
					</div>

					<div class="col-sm-6 report_abuse_section">
						<form id="captcha" method="post" class="form-horizontal report_abuse" action="">
							<div class="captcha captcha_hide">
								<p>Please fill the correct captcha for Report Abuse.</p>

								<div class="form-group">
									<label class="col-sm-6 control-label" id="captchaOperation"></label>
									<div class="col-sm-6">
										<input type="text" class="form-control" name="captcha" />
									</div>
								</div>
							</div>

							<div class="form-group">
								<div class="col-sm-12">
									<a type="submit" class="btn btn-warning btn_abuse" name="abuse" value="abuse" href="<?php echo $this->webroot;?>search_result">Abuse</a>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<hr>
	<div class="row">
		<div class="container">
			<!--=========Related result=============-->
			<div class="col-sm-12 related_search">
				<h1>Related Search Results</h1>
				<ul>
					<li>
						<a href="#">
							<img class="img-thumbnail" src="img/01.jpg">
							<h4>John Webster</h4>
							<p>Missing Dublin, Ireland, UK</p>
						</a>
					</li>
					<li>
						<a href="#">
							<img class="img-thumbnail" src="img/01.jpg">
							<h4>John Keats</h4>
							<p>Missing London, UK</p>
						</a>
					</li>
					<li>
						<a href="#">
							<img class="img-thumbnail" src="img/01.jpg">
							<h4>John Milton</h4>
							<p>Found London, UK</p>
						</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>