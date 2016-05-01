<!--==================Sign Up Section========================-->
<div class="container-fluid sign_up_page">
    <h1><?php echo __("Sign Up");?></h1>
    <hr>
    <form role="form" data-toggle="validator" novalidate="true" id="signup_form" enctype="multipart/form-data" class="form-horizontal search_form2" method="post" action="<?php echo $this->webroot;?>reporters/signup">
        <div class="form-group">
            <label for="" class="col-sm-offset-2 col-sm-3 control-label"><?php echo __("First Name");?></label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="" name="data[Reporter][first_name]" placeholder="<?php echo __("First Name");?>" required="">
            </div>
        </div>

        <div class="form-group">
            <label for="" class="col-sm-offset-2 col-sm-3 control-label"><?php echo __("Second Name");?></label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="" name="data[Reporter][second_name]" placeholder="<?php echo __("Second Name");?>">
            </div>
        </div>

        <div class="form-group">
            <label for="" class="col-sm-offset-2 col-sm-3 control-label"><?php echo __("Last Name");?></label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="" name="data[Reporter][last_name]" placeholder="<?php echo __("Last Name");?>" required="">
            </div>
        </div>


        <div class="form-group">
            <label for="" class="col-sm-offset-2 col-sm-3 control-label"><?php echo __("Nationality");?></label>
            <div class="col-sm-4">
                <div class="bfh-selectbox bfh-countries" data-name="data[Reporter][nationality]" data-country="EG" data-flags="true"></div>
            </div>
        </div>

        <div class="form-group">
            <label for="" class=" col-sm-offset-2 col-sm-3 control-label"><?php echo __("Gender");?></label>
            <div class="col-sm-4">
                <select name="data[Reporter][gender]" class="form-control gender2">
                    <option value=""><?php echo __("Select Gender");?></option>
                    <option value="Male"><?php echo __("Male");?></option>
                    <option value="Female"><?php echo __("Female");?></option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label for="" class="col-sm-offset-2 col-sm-3 control-label"><?php echo __("Resident Country");?></label>
            <div class="col-sm-4">
                <div class="bfh-selectbox bfh-countries" data-name="data[Reporter][resident_country]" data-country="EG" data-flags="true"></div>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-4">
                <p style="font-size: 16px;color: #9E9E9E;margin-bottom: -7px;"><?php echo __("Insert the photos of your ID");?></p>
            </div>
            <div class="col-sm-offset-2 col-sm-7 upload_img">
                <input id="adv_search_img" name="data[Reporter][images]" type="file" multiple class="file" data-overwrite-initial="false" data-upload-url="<?php echo $this->webroot;?>reporters/upload_image" data-max-file-count="3" enctype="multipart/form-data">
                <p><?php echo __("You must upload the photos. Otherwise its will not be uploaded.");?></p>
            </div>
        </div>
        
        <script>
            $('#adv_search_img').on('fileuploaded', function(event, data, previewId, index) {
                var response = data.response.response;
                var filename = data.response.filename;

                if(!$("input[name='data[Reporter][image_links_1]']").val()) {
                    $("input[name='data[Reporter][image_links_1]']").val(filename);
                } else if(!$("input[name='data[Reporter][image_links_2]']").val()) {
                    $("input[name='data[Reporter][image_links_2]']").val(filename);
                } else if(!$("input[name='data[Reporter][image_links_3]']").val()) {
                    $("input[name='data[Reporter][image_links_3]']").val(filename);
                }
            });
        </script>

        <input type="hidden" name="data[Reporter][image_links_1]">
        <input type="hidden" name="data[Reporter][image_links_2]">
        <input type="hidden" name="data[Reporter][image_links_3]">

        <div class="form-group">
            <label for="" class="col-sm-offset-2 col-sm-3 control-label"><?php echo __("Email");?></label>
            <div class="col-sm-4">
                <input type="email" name="data[Reporter][email]" class="form-control" id="email_db_check" data-error="<?php echo __("Bruh, that email address is invalid");?>" required="">
                <div class="help-block with-errors"></div>
            </div>
        </div>

        <div class="form-group">
            <label for="" class="col-sm-offset-2 col-sm-3 control-label"><?php echo __("Password");?></label>
            <div class="col-sm-4">
                <input type="password" name="data[Reporter][password]" class="form-control" data-toggle="validator" data-minlength="6" id="inputPassword" required="">
                <div class="help-block"><?php echo __("Minimum of 6 characters");?></div>
            </div>
        </div>

        <div class="form-group">
            <label for="" class="col-sm-offset-2 col-sm-3 control-label"><?php echo __("Confirm Password");?></label>
            <div class="col-sm-4">
                <input type="password" name="data[Reporter][password2]" class="form-control" id="" data-match="#inputPassword" data-match-error="<?php echo __("Whoops, these don&#39;t match");?>" required="">
                <div class="help-block with-errors"></div>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-7 col-sm-5 report_found_submit">
                <button type="submit" class="btn btn-primary btn_search btn_valid"><?php echo __("Submit");?></button>
            </div>
        </div>
    </form>       
</div>