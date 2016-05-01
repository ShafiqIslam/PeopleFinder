<div class="container">
	<div class="row">
		<div class="col-sm-3 col-sm-offset-1 sign_up_page search_page search_again pull-right">
			<h1><?php echo __("Search");?></h1>
		    <hr>
		    <form role="form" method="post" class="form-horizontal search_form" action="<?php echo $this->webroot?>profiles/search">
		        <div class="form-group">
		            <div class="col-sm-12">
		                <input type="text" name="first_name" class="form-control" id="" placeholder="<?php echo __("First Name");?>">
		            </div>
		        </div>

		        <div class="form-group">
		            <div class="col-sm-12">
		                <input type="text" name="second_name" class="form-control" id="" placeholder="<?php echo __("Second Name");?>">
		            </div>
		        </div>

		        <div class="form-group">
		            <div class="col-sm-12">
		                <input type="text" name="last_name" class="form-control" id="" placeholder="<?php echo __("Last Name");?>">
		            </div>
		        </div>

		        <div class="form-group">
		            <div class="col-sm-12">
		                <select name="gender" class="form-control gender">
		                    <option value=""><?php echo __("Select Gender");?></option>
		                    <option value="Male"><?php echo __("Male");?></option>
		                    <option value="Female"><?php echo __("Female");?></option>
		                </select>
		            </div>
		        </div>

		        <div class="form-group">
		            <div class="col-sm-12 country_selection_box">
		                <div class="bfh-selectbox bfh-countries" data-name="missing_country" data-country="EG" data-flags="true">
		                </div>
		            </div>
		        </div>

		        <div class="form-group">
		            <div class="col-sm-12">
		                <input type="text" name="missing_city" class="form-control" id="" placeholder="<?php echo __("Missing City");?>">
		            </div>
		        </div>

		        <div class="form-group">
		            <div class="col-sm-12">
		                <input name="id" type="text" class="form-control" id="" placeholder="<?php echo __("Profile Id");?>">
		            </div>
		        </div>


		        <div class="form-group">
		            <div class="col-sm-4 col-sm-offset-5 report_found_submit">
		                <button type="submit" class="btn btn-primary btn_search btn_valid"><?php echo __("Search");?></button>
		            </div>
		        </div>
		    </form>	
		</div>
		<div class="col-sm-8 search_result_wrappper pull-left"> 
			<h1><?php echo __("Your Search Results :");?></h1>
			<?php if(!$count) { ?>
				<p class="no_search_result"><?php echo __("No result Found. Sorry. ");?><?php echo $this->Html->link('Try Again.', array('controller'=>'pages', 'action'=>'display', 'search'));?></p>
			<?php } else { ?>
			<div class="result_body">
				<ul>
					<?php foreach($profiles as $key => $profile) : ?>
					<a href="<?php echo $this->webroot;?>profiles/full_profile/<?php echo $profile['Profile']['id'];?>">
					<li class="row">
						<?php
						if(!empty($profile['Profile']['image_link_1']))
							$image_link = $profile['Profile']['image_link_1'];
						else if(!empty($profile['Profile']['image_link_2']))
							$image_link = $profile['Profile']['image_link_2'];
						else if(!empty($profile['Profile']['image_link_3']))
							$image_link = $profile['Profile']['image_link_3'];
						else
							$image_link = $this->webroot . "img/no_image_available.png";
						?>
						<div class="col-sm-3">
							<img class="img-thumbnail img_result" src="<?php echo $image_link;?>">
						</div>
						<?php
						$first_name = !empty($profile['Profile']['first_name']) ? $profile['Profile']['first_name'] : "";
						$second_name = !empty($profile['Profile']['second_name']) ? $profile['Profile']['second_name'] : "";
						$last_name = !empty($profile['Profile']['last_name']) ? $profile['Profile']['last_name'] : "";
						$name = $first_name . " " . $second_name . " " . $last_name;
						?>
						<div class="col-sm-5">
								<h4><?php echo $name;?></h4>
								<h5 class="p_id"><?php echo __("Profile Id :");?> <?php echo $profile['Profile']['id'];?></h5>							
								<p>
									<?php echo $profile['Profile']['missing_city'];?>&nbsp;
									<span class="bfh-countries" data-country="<?php echo $profile['Profile']['missing_country'];?>" data-flags="true"></span>.&nbsp;
								</p>
								<p>
									<?php if($profile['Profile']['verified_profile']): ?>
										<span class="tooltip_check" data-toggle="tooltip" data-placement="top" title="This profile is verified."><i class="fa fa-check-square-o"></i><?php echo __("Verified");?></span>
									<?php endif; ?>
								</p>
						</div>
						<div class="col-sm-4">
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
					</li>
					</a>
					<?php endforeach; ?>
				</ul>
			</div>

			<div class="col-sm-12 search_pagination">
				<?php
					$next = $offset+$limit;
					$prev = $offset-$limit;
					$next_link = $this->webroot . 'profiles/search/' . $next ;
					$prev_link = $this->webroot . 'profiles/search/' . $prev ;

					$showing_from = $offset+1;
					$showing_to = $offset+$limit;
					if($showing_to > $count)
						$showing_to = $count;
				?>
				<div class="previous_arrow col-sm-3">
					<a href="<?php echo $prev_link?>" class="btn btn-primary btn_prv <?php if($prev<0) echo 'disabled_link'?>"><span><i class="fa fa-chevron-left" aria-hidden="true"></i></span></a>
				</div>

				<div class="col-sm-6 search_info">
					<p><?php echo __("Showing");?> <span><?php echo $showing_from?></span> <?php echo __("to");?> <span><?php echo $showing_to?></span> <?php echo __("of");?> <span><?php echo $count?></span> <?php echo __("results.");?></p>
				</div>

				<div class="next_arrow col-sm-3 pull-right">
					<a href="<?php echo $next_link?>" class="btn btn-primary btn_prv pull-right <?php if($next>=$count) echo 'disabled_link'?>"><span><i class="fa fa-chevron-right" aria-hidden="true"></i></span></a>
				</div>
			</div>

			<?php } ?>
		</div>
	</div>
</div>