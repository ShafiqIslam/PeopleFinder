<div class="container">
	<div class="row">
		<div class="col-sm-7 search_result_wrappper"> 
			<h1>Your Search Results :</h1>
			<?php if(!$count) { ?>
				<p class="no_search_result">No result Found. Sorry. <?php echo $this->Html->link('Try Again.', array('controller'=>'pages', 'action'=>'display', 'search'));?></p>
			<?php } else { ?>
			<div class="result_body">
				<ul>
					<?php foreach($profiles as $key => $profile) : ?>
					<li class="row">
						<?php
						if(!empty($profile['Profile']['image_link_1']))
							$image_link = $profile['Profile']['image_link_1'];
						else if(!empty($profile['Profile']['image_link_2']))
							$image_link = $profile['Profile']['image_link_2'];
						else if(!empty($profile['Profile']['image_link_3']))
							$image_link = $profile['Profile']['image_link_3'];
						else
							$image_link = $this->webroot . "img/no_image_available.jpg";
						?>
						<div class="col-sm-4">
							<a href="<?php echo $this->webroot;?>profiles/full_profile/<?php echo $profile['Profile']['id'];?>">
								<img class="img-thumbnail img_result" src="<?php echo $image_link;?>">
							</a>
						</div>
						<?php
						$first_name = !empty($profile['Profile']['first_name']) ? $profile['Profile']['first_name'] : "";
						$second_name = !empty($profile['Profile']['second_name']) ? $profile['Profile']['second_name'] : "";
						$last_name = !empty($profile['Profile']['last_name']) ? $profile['Profile']['last_name'] : "";
						$name = $first_name . " " . $second_name . " " . $last_name;
						?>
						<div class="col-sm-8">
							<a href="<?php echo $this->webroot;?>profiles/full_profile/<?php echo $profile['Profile']['id'];?>">
								<h4><?php echo $name;?></h4>
							</a>
							<?php if($profile['Profile']['verified_profile']): ?>
							<span><a class="tooltip_check" href="#" data-toggle="tooltip" data-placement="top" title="Verified Report."><i class="fa fa-check-square-o"></i></a></span>
							<?php endif; ?>
							<a href="<?php echo $this->webroot;?>profiles/full_profile/<?php echo $profile['Profile']['id'];?>">
								<p>
									<mark><?php echo $profile['Profile']['person_status'];?>&nbsp;</mark>
									<?php echo $profile['Profile']['missing_city'];?>,&nbsp;
									<?php echo $profile['Profile']['missing_country'];?>.&nbsp;
								</p>
							</a>
						</div>
					</li>
					<?php endforeach; ?>
				</ul>	
			</div>
			<?php } ?>
		</div>
		<div class="col-sm-3 col-sm-offset-2 sign_up_page search_page search_again">
			<h1>Search</h1>
		    <hr>
		    <form role="form" method="post" data-toggle="validator" novalidate="true" class="form-horizontal" action="<?php echo $this->webroot?>profiles/search">
		        <div class="form-group">
		            <div class="col-sm-12">
		                <input type="text" name="first_name" class="form-control" id="" placeholder="First Name" required="">
		            </div>
		        </div>

		        <div class="form-group">
		            <div class="col-sm-12">
		                <input type="text" name="second_name" class="form-control" id="" placeholder="Second Name">
		            </div>
		        </div>

		        <div class="form-group">
		            <div class="col-sm-12">
		                <input type="text" name="last_name" class="form-control" id="" placeholder="Last Name">
		            </div>
		        </div>

		        <div class="form-group">
		            <div class="col-sm-12">
		                <select name="gender" class="form-control" required="">
		                    <option value="">Select Gender</option>
		                    <option value="Male">Male</option>
		                    <option value="Female">Female</option>
		                </select>
		            </div>
		        </div>

		        <div class="form-group">
		            <div class="col-sm-12 country_selection_box">
		                <div class="bfh-selectbox bfh-countries" data-name="missing_country" data-country="BD" data-flags="true">
		                </div>
		            </div>
		        </div>

		        <div class="form-group">
		            <div class="col-sm-12">
		                <input type="text" name="missing_city" class="form-control" id="" placeholder="City">
		            </div>
		        </div>

		        <div class="form-group">
		            <div class="col-sm-12">
		                <input name="id" type="text" class="form-control" id="" placeholder="Profile Id">
		            </div>
		        </div>


		        <div class="form-group">
		            <div class="col-sm-4 col-sm-offset-8 report_found_submit">
		                <button type="submit" class="btn btn-primary btn_search">Search</button>
		            </div>
		        </div>
		    </form>	
		</div>
	</div>
</div>