<div class="container search_result_wrappper">
	<div> 
		<h1>Your Search Results</h1>
		<?php if(!$count) { ?>
			<p>No result Found. Sorry. <?php echo $this->Html->link('Try Again.', array('controller'=>'pages', 'action'=>'display', 'search'));?></p>
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
					<div class="col-sm-2">
						<img class="img-thumbnail img_result" src="<?php echo $image_link;?>">
					</div>
					<?php
					$first_name = !empty($profile['Profile']['first_name']) ? $profile['Profile']['first_name'] : "";
					$second_name = !empty($profile['Profile']['second_name']) ? $profile['Profile']['second_name'] : "";
					$last_name = !empty($profile['Profile']['last_name']) ? $profile['Profile']['last_name'] : "";
					$name = $first_name . " " . $second_name . " " . $last_name;
					?>
					<div class="col-sm-5">
						<a href="#">
							<h4><?php echo $name;?></h4>
						</a>
						<?php if($profile['Profile']['verified_profile']): ?>
						<span><a class="tooltip_check" href="#" data-toggle="tooltip" data-placement="top" title="Verified Report."><i class="fa fa-check-square-o"></i></a></span>
						<?php endif; ?>
						<p>
							<?php echo $profile['Profile']['person_status'];?> &nbsp;
							<?php echo $profile['Profile']['missing_city'];?>,&nbsp;
							<?php echo $profile['Profile']['missing_country'];?>.&nbsp;
							<a href="<?php echo $this->webroot;?>profiles/full_profile/<?php echo $profile['Profile']['id'];?>">learn more about this person</a>
						</p>
					</div>
				</li>
				<?php endforeach; ?>
			</ul>
		</div>
		<?php } ?>
	</div>
</div>