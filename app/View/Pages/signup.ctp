<!--==================Sign Up Section========================-->
<div class="container-fluid sign_up_page">
    <h1>Sign Up</h1>
    <hr>
    <form role="form" data-toggle="validator" id="signup_form" novalidate="true" enctype="multipart/form-data" class="form-horizontal" method="post" action="<?php echo $this->webroot;?>reporters/signup">
        <div class="form-group">
            <label for="" class="col-sm-offset-2 col-sm-3 control-label">First Name</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="" name="data[Reporter][first_name]" placeholder="First Name" required="">
            </div>
        </div>

        <div class="form-group">
            <label for="" class="col-sm-offset-2 col-sm-3 control-label">Second Name</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="" name="data[Reporter][second_name]" placeholder="Second Name">
            </div>
        </div>

        <div class="form-group">
            <label for="" class="col-sm-offset-2 col-sm-3 control-label">Last Name</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="" name="data[Reporter][last_name]" placeholder="Last Name" required="">
            </div>
        </div>


        <div class="form-group">
            <label for="" class="col-sm-offset-2 col-sm-3 control-label">Nationality</label>
            <div class="col-sm-4">
                <div class="bfh-selectbox bfh-countries" data-name="data[Reporter][nationality]" data-country="BD" data-flags="true"></div>
            </div>
        </div>

        <div class="form-group">
            <label for="" class=" col-sm-offset-2 col-sm-3 control-label">Gender</label>
            <div class="col-sm-4">
                <select name="data[Reporter][gender]" class="form-control" required="">
                    <option value="">Select Gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label for="" class="col-sm-offset-2 col-sm-3 control-label">Resident Country</label>
            <div class="col-sm-4">
                <div class="bfh-selectbox bfh-countries" data-name="data[Reporter][resident_country]" data-country="BD" data-flags="true"></div>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-4">
                <p style="font-size: 16px;color: #9E9E9E;margin-bottom: -7px;">Insert the photos of your ID</p>
            </div>
            <div class="col-sm-offset-2 col-sm-7 upload_img">
                <input id="adv_search_img" name="data[Reporter][images]" type="file" multiple class="file" data-overwrite-initial="false" data-upload-url="<?php echo $this->webroot;?>reporters/upload_image" data-max-file-count="3" enctype="multipart/form-data">
                <p>You must upload the photos. Otherwise its will not be uploaded.</p>
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
            <label for="" class="col-sm-offset-2 col-sm-3 control-label">Email</label>
            <div class="col-sm-4">
                <input type="email" name="data[Reporter][email]" class="form-control" id="email_db_check" data-error="Bruh, that email address is invalid" required="">
                <div class="help-block with-errors"></div>
            </div>
        </div>

        <div class="form-group">
            <label for="" class="col-sm-offset-2 col-sm-3 control-label">Password</label>
            <div class="col-sm-4">
                <input type="password" name="data[Reporter][password]" class="form-control" data-toggle="validator" data-minlength="6" id="inputPassword" required="">
                <div class="help-block">Minimum of 6 characters</div>
            </div>
        </div>

        <div class="form-group">
            <label for="" class="col-sm-offset-2 col-sm-3 control-label">Confirm Password</label>
            <div class="col-sm-4">
                <input type="password" name="data[Reporter][password2]" class="form-control" id="" data-match="#inputPassword" data-match-error="Whoops, these don&#39;t match" required="">
                <div class="help-block with-errors"></div>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-7 col-sm-5 report_found_submit">
                <button type="submit" class="btn btn-primary btn_search">Submit</button>
            </div>
        </div>
    </form>       
</div>