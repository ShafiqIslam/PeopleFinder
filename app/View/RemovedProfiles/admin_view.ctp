<?php echo $this->element('menu');?>
<div class="cmsUsers col-md-10 col-sm-10 index">
	<div class="white">
		<div class="RemovedProfiles form">
			<form role="form" method="post" data-toggle="validator" novalidate="true" class="form-horizontal search_form" enctype="multipart/form-data">
				<div class="form-group">
					<label for="" class="col-sm-offset-1 col-sm-3 control-label"><?php echo __("First Name"); ?></label>
					<div class="col-sm-6">
						<input type="text" value="<?php echo $this->request->data['RemovedProfile']['first_name']?>" name="data[RemovedProfile][first_name]" class="form-control" id="" placeholder="<?php echo __("First Name"); ?>" required="">
					</div>
				</div>

				<div class="form-group">
					<label for="" class="col-sm-offset-1 col-sm-3 control-label"><?php echo __("Second Name"); ?></label>
					<div class="col-sm-6">
						<input type="text" value="<?php echo $this->request->data['RemovedProfile']['second_name']?>" name="data[RemovedProfile][second_name]" class="form-control" id="" placeholder="<?php echo __("Second Name"); ?>">
					</div>
				</div>

				<div class="form-group">
					<label for="" class="col-sm-offset-1 col-sm-3 control-label"><?php echo __("Last Name"); ?></label>
					<div class="col-sm-6">
						<input type="text" value="<?php echo $this->request->data['RemovedProfile']['last_name']?>" name="data[RemovedProfile][last_name]" class="form-control" id="" placeholder="<?php echo __("Last Name"); ?>" required="">
					</div>
				</div>

				<div class="form-group">
					<label for="" class="col-sm-offset-1 col-sm-3 control-label"><?php echo __("Date of Birth"); ?></label>
					<div class="col-sm-6">
						<input type="date" value="<?php echo $this->request->data['RemovedProfile']['birthdate']?>" name="data[RemovedProfile][birthdate]" class="form-control" id="" placeholder="<?php echo __("Date of Birth"); ?>">
					</div>
				</div>

				<div class="form-group">
					<label for="" class="col-sm-offset-1 col-sm-3 control-label"><?php echo __("Blood Group"); ?></label>
					<div class="col-sm-6">
						<select name="data[RemovedProfile][blood_type]" class="form-control">
							<option selected="true" disabled="disabled"><?php echo __("Select Blood Group"); ?></option>
							<option value="A+" <?php if($this->request->data['RemovedProfile']['blood_type']=="A+") echo "selected";?>>A+</option>
							<option value="A-" <?php if($this->request->data['RemovedProfile']['blood_type']=="A-") echo "selected";?>>A-</option>
							<option value="B+" <?php if($this->request->data['RemovedProfile']['blood_type']=="B+") echo "selected";?>>B+</option>
							<option value="B-" <?php if($this->request->data['RemovedProfile']['blood_type']=="B-") echo "selected";?>>B-</option>
							<option value="O+" <?php if($this->request->data['RemovedProfile']['blood_type']=="O+") echo "selected";?>>O+</option>
							<option value="O-" <?php if($this->request->data['RemovedProfile']['blood_type']=="O-") echo "selected";?>>O-</option>
							<option value="AB+" <?php if($this->request->data['RemovedProfile']['blood_type']=="AB+") echo "selected";?>>AB+</option>
							<option value="AB-" <?php if($this->request->data['RemovedProfile']['blood_type']=="AB-") echo "selected";?>>AB-</option>
						</select>
					</div>
				</div>

				<div class="form-group">
					<label for="" class="col-sm-offset-1 col-sm-3 control-label"><?php echo __("Nationality"); ?></label>
					<div class="col-sm-6 country_selection_box">
						<div class="bfh-selectbox bfh-countries" data-name="data[RemovedProfile][nationality]" data-country="<?php echo $this->request->data['RemovedProfile']['nationality']?>" data-flags="true">
						</div>
					</div>
				</div>

				<div class="form-group">
					<label for="" class="col-sm-offset-1 col-sm-3 control-label"><?php echo __("Gender"); ?></label>
					<div class="col-sm-6">
						<select name="data[RemovedProfile][gender]" class="form-control gender">
							<option value=""><?php echo __("Select Gender"); ?></option>
							<option value="Male" <?php if($this->request->data['RemovedProfile']['gender']=="Male") echo "selected";?>><?php echo __("Male"); ?></option>
							<option value="Female" <?php if($this->request->data['RemovedProfile']['gender']=="Female") echo "selected";?>><?php echo __("Female"); ?></option>
						</select>
					</div>
				</div>

				<input type="hidden" name="data[RemovedProfile][person_status]" value="<?php echo $this->request->data['RemovedProfile']['person_status']?>">

				<div class="form-group">
					<label for="" class="col-sm-offset-1 col-sm-3 control-label"><?php echo __("Verified RemovedProfile"); ?></label>
					<div class="col-sm-6">
						<input type="checkbox" name="data[RemovedProfile][verified_profile]" <?php echo ($this->request->data['RemovedProfile']['verified_profile']) ? "checked" : "";?> value="1">
						<?php echo __("Verified"); ?>
					</div>
				</div>

				<div class="form-group">
					<label for="" class="col-sm-offset-1 col-sm-3 control-label"><?php echo __("Resident Country"); ?></label>
					<div class="col-sm-6">
						<div class="bfh-selectbox bfh-countries" data-name="data[RemovedProfile][resident_country]" data-country="<?php echo $this->request->data['RemovedProfile']['resident_country']?>" data-flags="true">
						</div>
					</div>
				</div>

				<div class="form-group">
					<label for="" class="col-sm-offset-1 col-sm-3 control-label"><?php echo __("Resident City"); ?></label>
					<div class="col-sm-6">
						<input type="text" value="<?php echo $this->request->data['RemovedProfile']['resident_city']?>" name="data[RemovedProfile][resident_city]" class="form-control" id="" placeholder="<?php echo __("Resident City"); ?>">
					</div>
				</div>

				<div class="form-group">
					<label for="" class="col-sm-offset-1 col-sm-3 control-label"><?php echo __("Resident Street"); ?></label>
					<div class="col-sm-6">
						<input type="text" value="<?php echo $this->request->data['RemovedProfile']['resident_street']?>" name="data[RemovedProfile][resident_street]" class="form-control" id="" placeholder="<?php echo __("Resident Street"); ?>">
					</div>
				</div>

				<div class="form-group">
					<label for="" class="col-sm-offset-1 col-sm-3 control-label"><?php echo __("Missing Country"); ?></label>
					<div class="col-sm-6">
						<div class="bfh-selectbox bfh-countries" data-name="data[RemovedProfile][missing_country]" data-country="<?php echo $this->request->data['RemovedProfile']['missing_country']?>" data-flags="true">
						</div>
					</div>
				</div>

				<div class="form-group">
					<label for="" class="col-sm-offset-1 col-sm-3 control-label"><?php echo __("Missing City"); ?></label>
					<div class="col-sm-6">
						<input type="text" value="<?php echo $this->request->data['RemovedProfile']['missing_city']?>" name="data[RemovedProfile][missing_city]" class="form-control" id="" placeholder="<?php echo __("Missing City"); ?>">
					</div>
				</div>

				<div class="form-group">
					<label for="" class="col-sm-offset-1 col-sm-3 control-label"><?php echo __("Mental illness"); ?></label>
					<div class="col-sm-6">
						<select  name="data[RemovedProfile][mental_illness]" class="form-control">
							<option selected="true" disabled="disabled" value=""><?php echo __("Select Mental illness"); ?></option>
							<option value="Yes" <?php if($this->request->data['RemovedProfile']['mental_illness']=="Yes") echo "selected";?>><?php echo __("Yes"); ?></option>
							<option value="No" <?php if($this->request->data['RemovedProfile']['mental_illness']=="No") echo "selected";?>><?php echo __("No"); ?></option>
							<option value="NA" <?php if($this->request->data['RemovedProfile']['mental_illness']=="NA") echo "selected";?>><?php echo __("NA"); ?></option>
						</select>
					</div>
				</div>

				<div class="form-group">
					<label for="" class="col-sm-offset-1 col-sm-3 control-label"><?php echo __("Status"); ?></label>
					<div class="col-sm-6">
						<select name="data[RemovedProfile][status]" class="form-control">
							<option selected="true" disabled="disabled" value=""><?php echo __("Select Status"); ?></option>
							<option value="Alive" <?php if($this->request->data['RemovedProfile']['status']=="Alive") echo "selected";?>><?php echo __("Alive"); ?></option>
							<option value="Dead" <?php if($this->request->data['RemovedProfile']['status']=="Dead") echo "selected";?>><?php echo __("Dead"); ?></option>
							<option value="NA" <?php if($this->request->data['RemovedProfile']['status']=="NA") echo "selected";?>><?php echo __("NA"); ?></option>
						</select>
					</div>
				</div>

				<div class="form-group">
					<label for="" class="col-sm-offset-1 col-sm-3 control-label"><?php echo __("Kidnapped"); ?></label>
					<div class="col-sm-6">
						<select name="data[RemovedProfile][kidnapped]" class="form-control">
							<option selected="true" disabled="disabled"><?php echo __("Select Kidnapped"); ?></option>
							<option value="Yes" <?php if($this->request->data['RemovedProfile']['kidnapped']=="Yes") echo "selected";?>><?php echo __("Yes"); ?></option>
							<option value="No" <?php if($this->request->data['RemovedProfile']['kidnapped']=="No") echo "selected";?>><?php echo __("No"); ?></option>
							<option value="NA" <?php if($this->request->data['RemovedProfile']['kidnapped']=="NA") echo "selected";?>><?php echo __("NA"); ?></option>
						</select>
					</div>
				</div>

				<div class="form-group">
					<label for="" class="col-sm-offset-1 col-sm-3 control-label"><?php echo __("Physical illness"); ?></label>
					<div class="col-sm-6">
						<select name="data[RemovedProfile][physical_illness]" class="form-control">
							<option selected="true" disabled="disabled" value=""><?php echo __("Select Physical illness"); ?></option>
							<option value="Yes" <?php if($this->request->data['RemovedProfile']['physical_illness']=="Yes") echo "selected";?>><?php echo __("Yes"); ?></option>
							<option value="No" <?php if($this->request->data['RemovedProfile']['physical_illness']=="No") echo "selected";?>><?php echo __("No"); ?></option>
							<option value="NA" <?php if($this->request->data['RemovedProfile']['physical_illness']=="NA") echo "selected";?>><?php echo __("NA"); ?></option>
						</select>
					</div>
				</div>

				<div class="form-group">
					<label for="" class="col-sm-offset-1 col-sm-3 control-label"><?php echo __("Description"); ?></label>
					<div class="col-sm-6">
						<textarea name="data[RemovedProfile][description]" class="form-control"><?php echo $this->request->data['RemovedProfile']['description']?></textarea>
					</div>
				</div>

				<div class="form-group">
					<label for="" class="col-sm-offset-1 col-sm-3 control-label"><?php echo __("Currently Used Images"); ?></label>
					<div class="col-sm-6 search_result_img admin_img_edit_section">
						<table class="table table-responsive">
							<tr>
							<?php $image_avail = 0; ?>
							<?php if(!empty($this->request->data['RemovedProfile']['image_link_1'])) { ?>
								<td>
									<a href="<?php echo $this->webroot."admin/RemovedProfiles/remove_image/".$this->request->data['RemovedProfile']['id']."/1";?>">
										<i class="fa fa-trash-o display_none"></i>
									</a>
									<a class="image-popup-no-margins admin_img_edit" href="<?php echo $this->request->data['RemovedProfile']['image_link_1'];?>">
										<img class="img-responsive img_popover_1" src="<?php echo $this->request->data['RemovedProfile']['image_link_1'];?>">
									</a>
								</td>
								<?php $image_avail++; ?>
							<?php } ?>
							<?php if(!empty($this->request->data['RemovedProfile']['image_link_2'])) { ?>
								<td>
									<a href="<?php echo $this->webroot."admin/RemovedProfiles/remove_image/".$this->request->data['RemovedProfile']['id']."/2";?>">
										<i class="fa fa-trash-o display_none"></i>
									</a>
									<a class="image-popup-no-margins admin_img_edit" href="<?php echo $this->request->data['RemovedProfile']['image_link_2'];?>">
										<img class="img-responsive img_popover_1" src="<?php echo $this->request->data['RemovedProfile']['image_link_2'];?>">
									</a>
								</td>
								<?php $image_avail++; ?>
							<?php } ?>
							<?php if(!empty($this->request->data['RemovedProfile']['image_link_3'])) { ?>
								<td>
									<a href="<?php echo $this->webroot."admin/RemovedProfiles/remove_image/".$this->request->data['RemovedProfile']['id']."/3";?>">
										<i class="fa fa-trash-o display_none"></i>
									</a>
									<a class="image-popup-no-margins admin_img_edit" href="<?php echo $this->request->data['RemovedProfile']['image_link_3'];?>">
										<img class="img-responsive img_popover_1" src="<?php echo $this->request->data['RemovedProfile']['image_link_3'];?>">
									</a>
								</td>
								<?php $image_avail++; ?>
							<?php } ?>
							</tr>
						</table>

					</div>
				</div>
			</form>
		</div>
	</div>
</div>


