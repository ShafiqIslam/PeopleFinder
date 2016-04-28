<!--==================Sign Up Section========================-->
<div class="container-fluid sign_up_page report_found">
    <h1><?php echo __("REPORT A FOUND PERSON");?></h1>
    <hr>
    <form role="form" method="post" data-toggle="validator" novalidate="novalidate" class="form-horizontal search_form" enctype="multipart/form-data">
        <div class="form-group">
            <label for="" class="col-sm-offset-2 col-sm-3 control-label"><?php echo __("First Name");?></label>
            <div class="col-sm-4">
                <input type="text" name="data[Profile][first_name]" class="form-control" id="" placeholder="<?php echo __("First Name");?>" required="">
            </div>
        </div>

        <div class="form-group">
            <label for="" class="col-sm-offset-2 col-sm-3 control-label"><?php echo __("Second Name");?></label>
            <div class="col-sm-4">
                <input type="text" name="data[Profile][second_name]" class="form-control" id="" placeholder="<?php echo __("Second Name");?>">
            </div>
        </div>

        <div class="form-group">
            <label for="" class="col-sm-offset-2 col-sm-3 control-label"><?php echo __("Last Name");?></label>
            <div class="col-sm-4">
                <input type="text" name="data[Profile][last_name]" class="form-control" id="" placeholder="<?php echo __("Last Name");?>" required="">
            </div>
        </div>

        <div class="form-group">
            <label for="" class="col-sm-offset-2 col-sm-3 control-label"><?php echo __("Date of Birth");?></label>
            <div class="col-sm-4">
                <input type="text" name="data[Profile][birthdate]" class="form-control" id="datepicker" placeholder="<?php echo __("Date of Birth");?>">
            </div>
        </div>

        <div class="form-group">
            <label for="" class="col-sm-offset-2 col-sm-3 control-label"><?php echo __("Blood Group");?></label>
            <div class="col-sm-4">
                <select name="data[Profile][blood_type]" class="form-control">
                    <option selected disabled="disabled"><?php echo __("Select Blood Group");?></option>
                    <option value="A+">A+</option>
                    <option value="A-">A-</option>
                    <option value="B+">B+</option>
                    <option value="B-">B-</option>
                    <option value="O+">O+</option>
                    <option value="O-">O-</option>
                    <option value="AB+">AB+</option>
                    <option value="AB-">AB-</option>

                </select>
            </div>
        </div>

        <div class="form-group">
            <label for="" class="col-sm-offset-2 col-sm-3 control-label"><?php echo __("Nationality");?></label>
            <div class="col-sm-4 country_selection_box">
                <div class="bfh-selectbox bfh-countries" data-name="data[Profile][nationality]"  data-country="EG" data-flags="true">
                </div>        
            </div>
        </div>

        <div class="form-group">
            <label for="" class="col-sm-offset-2 col-sm-3 control-label"><?php echo __("Gender");?></label>
            <div class="col-sm-4">
                <select name="data[Profile][gender]" class="form-control gender">
                    <option value=""><?php echo __("Select Gender");?></option>
                    <option value="Male"><?php echo __("Male");?></option>
                    <option value="Female"><?php echo __("Female");?></option>
                </select>
                <div class="error" style="color:red; display: none"><?php echo __("Please select gender");?></div>
            </div>
        </div>

        <input type="hidden" name="data[Profile][person_status]" value="Found">


        <div class="form-group">
            <label for="" class="col-sm-offset-2 col-sm-3 control-label"><?php echo __("Resident Country");?></label>
            <div class="col-sm-4">
                <div class="bfh-selectbox bfh-countries" data-name="data[Profile][resident_country]" data-country="EG" data-flags="true">
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="" class="col-sm-offset-2 col-sm-3 control-label"><?php echo __("Resident City");?></label>
            <div class="col-sm-4">
                <input type="text" name="data[Profile][resident_city]" class="form-control" id="" placeholder="<?php echo __("Resident City");?>"> 
            </div>
        </div>

        <div class="form-group">
            <label for="" class="col-sm-offset-2 col-sm-3 control-label"><?php echo __("Resident Street");?></label>
            <div class="col-sm-4">
                <input type="text" name="data[Profile][resident_street]" class="form-control" id="" placeholder="<?php echo __("Resident Street");?>"> 
            </div>
        </div>

        <div class="form-group">
            <label for="" class="col-sm-offset-2 col-sm-3 control-label"><?php echo __("Missing Country");?></label>
            <div class="col-sm-4">
                <div class="bfh-selectbox bfh-countries" data-name="data[Profile][missing_country]" data-country="EG" data-flags="true"></div>
            </div>
        </div>

        <div class="form-group">
            <label for="" class="col-sm-offset-2 col-sm-3 control-label"><?php echo __("Missing City");?></label>
            <div class="col-sm-4">
                <input type="text" name="data[Profile][missing_city]" class="form-control" id="" placeholder="<?php echo __("Missing City");?>"> 
            </div>
        </div>

        <div class="form-group">
            <label for="" class="col-sm-offset-2 col-sm-3 control-label"><?php echo __("Mental illness");?></label>
            <div class="col-sm-4">
                <select name="data[Profile][mental_illness]" class="form-control">
                    <option selected disabled="disabled"><?php echo __("Select Mental illness");?></option>
                    <option value="Yes"><?php echo __("Yes");?></option>
                    <option value="No"><?php echo __("No");?></option>
                    <option value="NA"><?php echo __("NA");?></option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label for="" class="col-sm-offset-2 col-sm-3 control-label"><?php echo __("Status");?></label>
            <div class="col-sm-4">
                <select name="data[Profile][status]" class="form-control">
                    <option selected disabled="disabled"><?php echo __("Select Status");?></option>
                    <option value="Alive"><?php echo __("Alive");?></option>
                    <option value="Dead"><?php echo __("Dead");?></option>
                    <option value="NA"><?php echo __("NA");?></option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label for="" class="col-sm-offset-2 col-sm-3 control-label"><?php echo __("Kidnapped");?></label>
            <div class="col-sm-4">
                <select name="data[Profile][kidnapped]" class="form-control">
                    <option selected disabled="disabled"><?php echo __("Select Kidnapped");?></option>
                    <option value="Yes"><?php echo __("Yes");?></option>
                    <option value="No"><?php echo __("No");?></option>
                    <option value="NA"><?php echo __("NA");?></option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label for="" class="col-sm-offset-2 col-sm-3 control-label"><?php echo __("Physical illness");?></label>
            <div class="col-sm-4">
                <select name="data[Profile][physical_illness]" class="form-control">
                    <option selected disabled="disabled"><?php echo __("Select Physical illness");?></option>
                    <option value="Yes"><?php echo __("Yes");?></option>
                    <option value="No"><?php echo __("No");?></option>
                    <option value="NA"><?php echo __("NA");?></option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label for="" class="col-sm-offset-2 col-sm-3 control-label"><?php echo __("Description");?></label>
            <div class="col-sm-4">
                <textarea name="data[Profile][description]" class="form-control"></textarea>
            </div>
        </div>

        <div class="form-group">
            <label for="" class="col-sm-offset-2 col-sm-3 control-label"><?php echo __("Upload Photos");?></label>
            <div class="col-sm-offset-2 col-sm-7 upload_img">
                <input id="adv_search_img" name="data[Profile][images]" type="file" multiple class="file" data-overwrite-initial="false" data-upload-url="<?php echo $this->webroot;?>profiles/upload_image" data-max-file-count="3" data-min-file-count="1" enctype="multipart/form-data">
                <p><?php echo __("** NB: You must click 'Upload' before submitting after adding image.");?></p>
            </div>
        </div>

        <input type="hidden" name="data[Profile][image_links_1]">
        <input type="hidden" name="data[Profile][image_links_2]">
        <input type="hidden" name="data[Profile][image_links_3]">

        <div class="form-group">
            <div class="col-sm-offset-7 col-sm-5 report_found_submit">
                <button type="submit" class="btn btn-primary btn_search"><?php echo __("Submit");?></button>
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