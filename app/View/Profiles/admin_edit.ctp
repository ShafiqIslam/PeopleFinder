<?php echo $this->element('menu');?>
<div class="cmsUsers col-md-10 col-sm-10 index">
	<div class="white">
		<div class="profiles form">
			<form role="form" method="post" data-toggle="validator" novalidate="true" class="form-horizontal" enctype="multipart/form-data">
				<div class="form-group">
					<label for="" class="col-sm-offset-1 col-sm-3 control-label">First Name</label>
					<div class="col-sm-6">
						<input type="text" value="<?php echo $this->request->data['Profile']['first_name']?>" name="data[Profile][first_name]" class="form-control" id="" placeholder="First Name" required="">
					</div>
				</div>

				<div class="form-group">
					<label for="" class="col-sm-offset-1 col-sm-3 control-label">Second Name</label>
					<div class="col-sm-6">
						<input type="text" value="<?php echo $this->request->data['Profile']['second_name']?>" name="data[Profile][second_name]" class="form-control" id="" placeholder="Second Name">
					</div>
				</div>

				<div class="form-group">
					<label for="" class="col-sm-offset-1 col-sm-3 control-label">Last Name</label>
					<div class="col-sm-6">
						<input type="text" value="<?php echo $this->request->data['Profile']['last_name']?>" name="data[Profile][last_name]" class="form-control" id="" placeholder="Last Name" required="">
					</div>
				</div>

				<div class="form-group">
					<label for="" class="col-sm-offset-1 col-sm-3 control-label">Birthdate</label>
					<div class="col-sm-6">
						<input type="date" value="<?php echo $this->request->data['Profile']['birthdate']?>" name="data[Profile][birthdate]" class="form-control" id="" placeholder="date">
					</div>
				</div>

				<div class="form-group">
					<label for="" class="col-sm-offset-1 col-sm-3 control-label">Blood Group</label>
					<div class="col-sm-6">
						<select name="data[Profile][blood_type]" class="form-control">
							<option>Select Blood Group</option>
							<option value="A+" <?php if($this->request->data['Profile']['blood_type']=="A+") echo "selected";?>>A+</option>
							<option value="A-" <?php if($this->request->data['Profile']['blood_type']=="A-") echo "selected";?>>A-</option>
							<option value="B+" <?php if($this->request->data['Profile']['blood_type']=="B+") echo "selected";?>>B+</option>
							<option value="B-" <?php if($this->request->data['Profile']['blood_type']=="B-") echo "selected";?>>B-</option>
							<option value="O+" <?php if($this->request->data['Profile']['blood_type']=="O+") echo "selected";?>>O+</option>
							<option value="O-" <?php if($this->request->data['Profile']['blood_type']=="O-") echo "selected";?>>O-</option>
							<option value="AB+" <?php if($this->request->data['Profile']['blood_type']=="AB+") echo "selected";?>>AB+</option>
							<option value="AB-" <?php if($this->request->data['Profile']['blood_type']=="AB-") echo "selected";?>>AB-</option>
						</select>
					</div>
				</div>

				<div class="form-group">
					<label for="" class="col-sm-offset-1 col-sm-3 control-label">Nationality</label>
					<div class="col-sm-6 country_selection_box">
						<div class="bfh-selectbox bfh-countries" data-name="data[Profile][nationality]" data-country="<?php echo $this->request->data['Profile']['nationality']?>" data-flags="true">
						</div>
					</div>
				</div>

				<div class="form-group">
					<label for="" class="col-sm-offset-1 col-sm-3 control-label">Gender</label>
					<div class="col-sm-6">
						<select name="data[Profile][gender]" class="form-control" required="">
							<option value="">Select Gender</option>
							<option value="Male" <?php if($this->request->data['Profile']['gender']=="Male") echo "selected";?>>Male</option>
							<option value="Female" <?php if($this->request->data['Profile']['gender']=="Female") echo "selected";?>>Female</option>
						</select>
					</div>
				</div>

				<input type="hidden" name="data[Profile][person_status]" value="<?php echo $this->request->data['Profile']['person_status']?>">

				<div class="form-group">
					<label for="" class="col-sm-offset-1 col-sm-3 control-label">Verified Profile</label>
					<div class="col-sm-6">
						<input type="checkbox" name="data[Profile][verified_profile]" <?php if($this->request->data['Profile']['verified_profile']) echo "checked=\"true\"";?>>
						Verified
					</div>
				</div>

				<div class="form-group">
					<label for="" class="col-sm-offset-1 col-sm-3 control-label">Resident Country</label>
					<div class="col-sm-6">
						<div class="bfh-selectbox bfh-countries" data-name="data[Profile][resident_country]" data-country="<?php echo $this->request->data['Profile']['resident_country']?>" data-flags="true">
						</div>
					</div>
				</div>

				<div class="form-group">
					<label for="" class="col-sm-offset-1 col-sm-3 control-label">Resident City</label>
					<div class="col-sm-6">
						<input type="text" value="<?php echo $this->request->data['Profile']['resident_city']?>" name="data[Profile][resident_city]" class="form-control" id="" placeholder="Resident City">
					</div>
				</div>

				<div class="form-group">
					<label for="" class="col-sm-offset-1 col-sm-3 control-label">Resident Street</label>
					<div class="col-sm-6">
						<input type="text" value="<?php echo $this->request->data['Profile']['resident_street']?>" name="data[Profile][resident_street]" class="form-control" id="" placeholder="Resident Street">
					</div>
				</div>

				<div class="form-group">
					<label for="" class="col-sm-offset-1 col-sm-3 control-label">Missing Country</label>
					<div class="col-sm-6">
						<div class="bfh-selectbox bfh-countries" data-name="data[Profile][missing_country]" data-country="<?php echo $this->request->data['Profile']['missing_country']?>" data-flags="true">
						</div>
					</div>
				</div>

				<div class="form-group">
					<label for="" class="col-sm-offset-1 col-sm-3 control-label">Missing City</label>
					<div class="col-sm-6">
						<input type="text" value="<?php echo $this->request->data['Profile']['missing_city']?>" name="data[Profile][missing_city]" class="form-control" id="" placeholder="Correct City">
					</div>
				</div>

				<div class="form-group">
					<label for="" class="col-sm-offset-1 col-sm-3 control-label">Mental illness</label>
					<div class="col-sm-6">
						<select name="data[Profile][mental_illness]" class="form-control" required="">
							<option value="">Select Mental illness</option>
							<option value="Yes" <?php if($this->request->data['Profile']['mental_illness']=="Yes") echo "selected";?>>Yes</option>
							<option value="No" <?php if($this->request->data['Profile']['mental_illness']=="No") echo "selected";?>>No</option>
							<option value="NA" <?php if($this->request->data['Profile']['mental_illness']=="NA") echo "selected";?>>NA</option>
						</select>
					</div>
				</div>

				<div class="form-group">
					<label for="" class="col-sm-offset-1 col-sm-3 control-label">Status</label>
					<div class="col-sm-6">
						<select name="data[Profile][status]" class="form-control" required="">
							<option value="">Select Status</option>
							<option value="Alive" <?php if($this->request->data['Profile']['status']=="Alive") echo "selected";?>>Alive</option>
							<option value="Dead" <?php if($this->request->data['Profile']['status']=="Dead") echo "selected";?>>Dead</option>
							<option value="NA" <?php if($this->request->data['Profile']['status']=="NA") echo "selected";?>>NA</option>
						</select>
					</div>
				</div>

				<div class="form-group">
					<label for="" class="col-sm-offset-1 col-sm-3 control-label">Kidnapped</label>
					<div class="col-sm-6">
						<select name="data[Profile][kidnapped]" class="form-control">
							<option>Select Kidnapped</option>
							<option value="Yes" <?php if($this->request->data['Profile']['kidnapped']=="Yes") echo "selected";?>>Yes</option>
							<option value="No" <?php if($this->request->data['Profile']['kidnapped']=="No") echo "selected";?>>No</option>
							<option value="NA" <?php if($this->request->data['Profile']['kidnapped']=="NA") echo "selected";?>>NA</option>
						</select>
					</div>
				</div>

				<div class="form-group">
					<label for="" class="col-sm-offset-1 col-sm-3 control-label">Physical illness</label>
					<div class="col-sm-6">
						<select name="data[Profile][physical_illness]" class="form-control" required="">
							<option value="">Select Physical illness</option>
							<option value="Yes" <?php if($this->request->data['Profile']['physical_illness']=="Yes") echo "selected";?>>Yes</option>
							<option value="No" <?php if($this->request->data['Profile']['physical_illness']=="No") echo "selected";?>>No</option>
							<option value="NA" <?php if($this->request->data['Profile']['physical_illness']=="NA") echo "selected";?>>NA</option>
						</select>
					</div>
				</div>

				<div class="form-group">
					<label for="" class="col-sm-offset-1 col-sm-3 control-label">Description</label>
					<div class="col-sm-6">
						<textarea name="data[Profile][description]" class="form-control"><?php echo $this->request->data['Profile']['description']?></textarea>
					</div>
				</div>

				<div class="form-group">
					<label for="" class="col-sm-offset-1 col-sm-3 control-label">Currently Used Images</label>
					<div class="col-sm-6 search_result_img admin_img_edit_section">
						<table class="table table-responsive">
							<tr>
							<?php if(!empty($this->request->data['Profile']['image_link_1'])) { ?>
								<td>
									<a href=""><i class="fa fa-trash-o display_none"></i></a>
									<a class="image-popup-no-margins admin_img_edit" href="<?php echo $this->request->data['Profile']['image_link_1'];?>">
										<img class="img-responsive img_popover_1" src="<?php echo $this->request->data['Profile']['image_link_1'];?>">
									</a>
								</td>
							<?php } ?>
							<?php if(!empty($this->request->data['Profile']['image_link_2'])) { ?>
								<td>
									<a href=""><i class="fa fa-trash-o display_none"></i></a>
									<a class="image-popup-no-margins admin_img_edit" href="<?php echo $this->request->data['Profile']['image_link_2'];?>">
										<img class="img-responsive img_popover_1" src="<?php echo $this->request->data['Profile']['image_link_2'];?>">
									</a>
								</td>
							<?php } ?>
							<?php if(!empty($this->request->data['Profile']['image_link_3'])) { ?>
								<td>
									<a href=""><i class="fa fa-trash-o display_none"></i></a>
									<a class="image-popup-no-margins admin_img_edit" href="<?php echo $this->request->data['Profile']['image_link_3'];?>">
										<img class="img-responsive img_popover_1" src="<?php echo $this->request->data['Profile']['image_link_3'];?>">
									</a>
								</td>
							<?php } ?>
							</tr>
						</table>

					</div>
				</div>

				<div class="form-group">
					<div class="col-sm-offset-1 col-sm-9">
						<input id="adv_search_img" name="data[Profile][images]" type="file" multiple class="file" data-overwrite-initial="false" data-upload-url="<?php echo $this->webroot;?>profiles/upload_image" data-max-file-count="3" data-min-file-count="1" enctype="multipart/form-data">
					</div>
				</div>

				<input type="hidden" name="data[Profile][image_links_1]">
				<input type="hidden" name="data[Profile][image_links_2]">
				<input type="hidden" name="data[Profile][image_links_3]">

				<div class="form-group">
					<div class="col-sm-offset-9 col-sm-3 report_found_submit">
						<button type="submit" class="btn btn-primary btn_search">Submit</button>
					</div>
				</div>

				<script>
					$('#adv_search_img').on('fileuploaded', function(event, data, previewId, index) {
						var response = data.response.response;
						var filename = data.response.filename;

						if(!$("input[name='data[Profile][image_links_1]']").val()) {
							$("input[name='data[Profile][image_links_1]']").val(filename);
						} else if(!$("input[name='data[Profile][image_links_2]']").val()) {
							$("input[name='data[Profile][image_links_2]']").val(filename);
						} else if(!$("input[name='data[Profile][image_links_3]']").val()) {
							$("input[name='data[Profile][image_links_3]']").val(filename);
						}
					});
				</script>
			</form>
		</div>
	</div>
</div>


