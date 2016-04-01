<div class="container">
	<div class="row">
		<div class="my_report_page">
			<div class="col-sm-8 col-sm-offset-2">
				<h1>Report List</h1>
				<hr>
				<ul>
					<?php foreach($my_profiles as $key => $item) { ?>
					<li>
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
							$image_link = $this->webroot . "img/no_image_available.jpg";
						?>
						
						<img src="<?php echo $image_link;?>" height="100px" width="100px">
						<a class="report_list_name" href="<?php echo $this->webroot;?>profiles/full_profile/<?php echo $item['id'];?>">
							<?php echo $item['person_status'];?> of <?php echo $name;?>.
							From <?php echo $item['missing_city'];?>, <?php echo $item['missing_country'];?>
						</a>
						<?php
						echo $this->Html->link(__('Edit'), array('controller'=>'profiles', 'action' => 'edit', $item['id']), array( 'class' => 'btn btn_myaccount edit'));
						echo $this->Form->postLink(__('Delete'), array('controller'=>'profiles', 'action' => 'delete', $item['id']), array( 'class' => 'btn btn_myaccount delete'), __('Are you sure you want to delete # %s?', $name));
						?>
					</li>
					<?php } ?>
				</ul>
			</div>
		</div>
	</div>
</div>