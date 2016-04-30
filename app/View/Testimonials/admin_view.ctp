<?php echo $this->element('menu');?>
<div class="cmsUsers col-md-10 col-sm-10 index">
	<div class="white">
		<div class="RemovedProfiles form">
			<form role="form" method="post" data-toggle="validator" novalidate="true" class="form-horizontal search_form" enctype="multipart/form-data">
				<div class="form-group">
					<label for="" class="col-sm-offset-1 col-sm-3 control-label"><?php echo __("Name"); ?></label>
					<div class="col-sm-6">
						<input type="text" value="<?php echo $name ?>" name="" class="form-control" disabled>
					</div>
				</div>

				<div class="form-group">
					<label for="" class="col-sm-offset-1 col-sm-3 control-label"><?php echo __("Description"); ?></label>
					<div class="col-sm-6">
						<textarea name="data[RemovedProfile][description]" disabled class="form-control"><?php echo $testimonial['Testimonial']['testimonial']?></textarea>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>


