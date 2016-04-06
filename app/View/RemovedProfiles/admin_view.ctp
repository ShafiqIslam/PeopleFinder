<?php echo $this->element('menu');?>
<div class="cmsUsers col-md-10 col-sm-10 index">
	<div class="white">
		<div class="profiles form">
			<form role="form" method="post" data-toggle="validator" novalidate="true" class="form-horizontal" enctype="multipart/form-data">
				<div class="form-group">
					<label for="" class="col-sm-offset-2 col-sm-3 control-label">First Name</label>
					<div class="col-sm-4">
						<input type="text" disabled value="<?php echo $this->request->data['RemovedProfile']['first_name']?>" name="data[RemovedProfile][first_name]" class="form-control" id="" placeholder="First Name" required="">
					</div>
				</div>

				<div class="form-group">
					<label for="" class="col-sm-offset-2 col-sm-3 control-label">Second Name</label>
					<div class="col-sm-4">
						<input type="text" disabled value="<?php echo $this->request->data['RemovedProfile']['second_name']?>" name="data[RemovedProfile][second_name]" class="form-control" id="" placeholder="Second Name">
					</div>
				</div>

				<div class="form-group">
					<label for="" class="col-sm-offset-2 col-sm-3 control-label">Last Name</label>
					<div class="col-sm-4">
						<input type="text" disabled value="<?php echo $this->request->data['RemovedProfile']['last_name']?>" name="data[RemovedProfile][last_name]" class="form-control" id="" placeholder="Last Name" required="">
					</div>
				</div>

				<div class="form-group">
					<label for="" class="col-sm-offset-2 col-sm-3 control-label">Birthdate</label>
					<div class="col-sm-4">
						<input type="date" disabled value="<?php echo $this->request->data['RemovedProfile']['birthdate']?>" name="data[RemovedProfile][birthdate]" class="form-control" id="" placeholder="date">
					</div>
				</div>

				<div class="form-group">
					<label for="" class="col-sm-offset-2 col-sm-3 control-label">Blood Group</label>
					<div class="col-sm-4">
						<select name="data[RemovedProfile][blood_type]" class="form-control" readonly="readonly" disabled>
							<option>Select Blood Group</option>
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
					<label for="" class="col-sm-offset-2 col-sm-3 control-label">Nationality</label>
					<div class="col-sm-4 country_selection_box">
						<span class="bfh-countries" data-country="<?php echo $this->request->data['RemovedProfile']['nationality'];?>" data-flags="true"></span>
					</div>
				</div>

				<div class="form-group">
					<label for="" class="col-sm-offset-2 col-sm-3 control-label">Gender</label>
					<div class="col-sm-4">
						<select name="data[RemovedProfile][gender]" class="form-control" readonly="readonly" disabled>
							<option value="">Select Gender</option>
							<option value="Male" <?php if($this->request->data['RemovedProfile']['gender']=="Male") echo "selected";?>>Male</option>
							<option value="Female" <?php if($this->request->data['RemovedProfile']['gender']=="Female") echo "selected";?>>Female</option>
						</select>
					</div>
				</div>

				<input type="hidden" name="data[RemovedProfile][person_status]" value="<?php echo $this->request->data['RemovedProfile']['person_status']?>">

				<div class="form-group">
					<label for="" class="col-sm-offset-2 col-sm-3 control-label">Verified RemovedProfile</label>
					<div class="col-sm-4">
						<input type="checkbox" disabled name="data[RemovedProfile][verified_profile]" <?php if($this->request->data['RemovedProfile']['verified_profile']) echo "checked=\"true\"";?>>
						Verified
					</div>
				</div>

				<div class="form-group">
					<label for="" class="col-sm-offset-2 col-sm-3 control-label">Resident Country</label>
					<div class="col-sm-4">
						<span class="bfh-countries" data-country="<?php echo $this->request->data['RemovedProfile']['resident_country'];?>" data-flags="true"></span>
					</div>
				</div>

				<div class="form-group">
					<label for="" class="col-sm-offset-2 col-sm-3 control-label">Resident City</label>
					<div class="col-sm-4">
						<input type="text" disabled value="<?php echo $this->request->data['RemovedProfile']['resident_city']?>" name="data[RemovedProfile][resident_city]" class="form-control" id="" placeholder="Resident City">
					</div>
				</div>

				<div class="form-group">
					<label for="" class="col-sm-offset-2 col-sm-3 control-label">Resident Street</label>
					<div class="col-sm-4">
						<input type="text" disabled value="<?php echo $this->request->data['RemovedProfile']['resident_street']?>" name="data[RemovedProfile][resident_street]" class="form-control" id="" placeholder="Resident Street">
					</div>
				</div>

				<div class="form-group">
					<label for="" class="col-sm-offset-2 col-sm-3 control-label">Missing Country</label>
					<div class="col-sm-4">
						<span class="bfh-countries" data-country="<?php echo $this->request->data['RemovedProfile']['missing_country'];?>" data-flags="true"></span>
					</div>
				</div>

				<div class="form-group">
					<label for="" class="col-sm-offset-2 col-sm-3 control-label">Missing City</label>
					<div class="col-sm-4">
						<input type="text" disabled value="<?php echo $this->request->data['RemovedProfile']['missing_city']?>" name="data[RemovedProfile][missing_city]" class="form-control" id="" placeholder="Correct City">
					</div>
				</div>

				<div class="form-group">
					<label for="" class="col-sm-offset-2 col-sm-3 control-label">Mental illness</label>
					<div class="col-sm-4">
						<select name="data[RemovedProfile][mental_illness]" class="form-control" readonly="readonly" disabled>
							<option value="">Select Mental illness</option>
							<option value="Yes" <?php if($this->request->data['RemovedProfile']['mental_illness']=="Yes") echo "selected";?>>Yes</option>
							<option value="No" <?php if($this->request->data['RemovedProfile']['mental_illness']=="No") echo "selected";?>>No</option>
							<option value="NA" <?php if($this->request->data['RemovedProfile']['mental_illness']=="NA") echo "selected";?>>NA</option>
						</select>
					</div>
				</div>

				<div class="form-group">
					<label for="" class="col-sm-offset-2 col-sm-3 control-label">Status</label>
					<div class="col-sm-4">
						<select name="data[RemovedProfile][status]" class="form-control" readonly="readonly" disabled>
							<option value="">Select Status</option>
							<option value="Alive" <?php if($this->request->data['RemovedProfile']['status']=="Alive") echo "selected";?>>Alive</option>
							<option value="Dead" <?php if($this->request->data['RemovedProfile']['status']=="Dead") echo "selected";?>>Dead</option>
							<option value="NA" <?php if($this->request->data['RemovedProfile']['status']=="NA") echo "selected";?>>NA</option>
						</select>
					</div>
				</div>

				<div class="form-group">
					<label for="" class="col-sm-offset-2 col-sm-3 control-label">Kidnapped</label>
					<div class="col-sm-4">
						<select name="data[RemovedProfile][kidnapped]" class="form-control" readonly="readonly" disabled>
							<option>Select Kidnapped</option>
							<option value="Yes" <?php if($this->request->data['RemovedProfile']['kidnapped']=="Yes") echo "selected";?>>Yes</option>
							<option value="No" <?php if($this->request->data['RemovedProfile']['kidnapped']=="No") echo "selected";?>>No</option>
							<option value="NA" <?php if($this->request->data['RemovedProfile']['kidnapped']=="NA") echo "selected";?>>NA</option>
						</select>
					</div>
				</div>

				<div class="form-group">
					<label for="" class="col-sm-offset-2 col-sm-3 control-label">Physical illness</label>
					<div class="col-sm-4">
						<select name="data[RemovedProfile][physical_illness]" class="form-control" readonly="readonly" disabled>
							<option value="">Select Physical illness</option>
							<option value="Yes" <?php if($this->request->data['RemovedProfile']['physical_illness']=="Yes") echo "selected";?>>Yes</option>
							<option value="No" <?php if($this->request->data['RemovedProfile']['physical_illness']=="No") echo "selected";?>>No</option>
							<option value="NA" <?php if($this->request->data['RemovedProfile']['physical_illness']=="NA") echo "selected";?>>NA</option>
						</select>
					</div>
				</div>

				<div class="form-group">
					<label for="" class="col-sm-offset-2 col-sm-3 control-label">Description</label>
					<div class="col-sm-4">
						<textarea name="data[RemovedProfile][description]" disabled aria-disabled="true" class="form-control"><?php echo $this->request->data['RemovedProfile']['description']?></textarea>
					</div>
				</div>

				<div class="form-group">
					<label for="" class="col-sm-offset-2 col-sm-3 control-label">Currently Used Images</label>
					<div class="col-sm-4">
						<ul style="list-style: none">
							<?php if(!empty($this->request->data['RemovedProfile']['image_link_1'])) { ?>
								<li class="col-sm-4 search_result_Details_img"><img class="img-responsive" src="<?php echo $this->request->data['RemovedProfile']['image_link_1'];?>"></li>
							<?php } ?>
							<?php if(!empty($this->request->data['RemovedProfile']['image_link_2'])) { ?>
								<li class="col-sm-4 search_result_Details_img"><img class="img-responsive" src="<?php echo $this->request->data['RemovedProfile']['image_link_2'];?>"></li>
							<?php } ?>
							<?php if(!empty($this->request->data['RemovedProfile']['image_link_3'])) { ?>
								<li class="col-sm-4 search_result_Details_img"><img class="img-responsive" src="<?php echo $this->request->data['RemovedProfile']['image_link_3'];?>"></li>
							<?php } ?>
						</ul>
					</div>
				</div>

				<!--<div class="form-group">
					<div class="col-sm-offset-2 col-sm-7">
						<input id="adv_search_img" name="data[RemovedProfile][images]" type="file" multiple class="file" data-overwrite-initial="false" data-upload-url="<?php echo $this->webroot;?>profiles/upload_image" data-max-file-count="3" data-min-file-count="1" enctype="multipart/form-data">
					</div>
				</div>

				<input type="hidden" name="data[RemovedProfile][image_links_1]">
				<input type="hidden" name="data[RemovedProfile][image_links_2]">
				<input type="hidden" name="data[RemovedProfile][image_links_3]">-->

				<!--<div class="form-group">
					<div class="col-sm-offset-7 col-sm-5 report_found_submit">
						<button type="submit" class="btn btn-primary btn_search">Submit</button>
					</div>
				</div>-->
			</form>
		</div>
	</div>
</div>
