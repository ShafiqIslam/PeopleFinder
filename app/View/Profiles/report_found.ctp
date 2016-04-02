<!--==================Sign Up Section========================-->
<div class="container-fluid sign_up_page">
    <h1>REPORT A FOUND PERSON</h1>
    <?php if(!empty($success) && !$success) { ?>
        <h4>Your Report can't be saved right now. Try again later.</h4>
    <?php } ?>
    <hr>
    <form role="form" method="post" data-toggle="validator" novalidate="true" class="form-horizontal" enctype="multipart/form-data">
        <div class="form-group">
            <label for="" class="col-sm-offset-2 col-sm-3 control-label">First Name</label>
            <div class="col-sm-4">
                <input type="text" name="data[Profile][first_name]" class="form-control" id="" placeholder="First Name" required="">
            </div>
        </div>

        <div class="form-group">
            <label for="" class="col-sm-offset-2 col-sm-3 control-label">Second Name</label>
            <div class="col-sm-4">
                <input type="text" name="data[Profile][second_name]" class="form-control" id="" placeholder="Second Name">
            </div>
        </div>

        <div class="form-group">
            <label for="" class="col-sm-offset-2 col-sm-3 control-label">Last Name</label>
            <div class="col-sm-4">
                <input type="text" name="data[Profile][last_name]" class="form-control" id="" placeholder="Last Name" required="">
            </div>
        </div>

        <div class="form-group">
            <label for="" class="col-sm-offset-2 col-sm-3 control-label">Birthdate</label>
            <div class="col-sm-4">
                <input type="date" name="data[Profile][birthdate]" class="form-control" id="" placeholder="date">
            </div>
        </div>

        <div class="form-group">
            <label for="" class="col-sm-offset-2 col-sm-3 control-label">Blood Group</label>
            <div class="col-sm-4">
                <select name="data[Profile][blood_type]" class="form-control">
                    <option>Select Blood Group</option>
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
            <label for="" class="col-sm-offset-2 col-sm-3 control-label">Nationality</label>
            <div class="col-sm-4 country_selection_box">
                <div class="bfh-selectbox bfh-countries" data-name="data[Profile][nationality]"  data-country="BD" data-flags="true">
                </div>        
            </div>
        </div>

        <div class="form-group">
            <label for="" class="col-sm-offset-2 col-sm-3 control-label">Gender</label>
            <div class="col-sm-4">
                <select name="data[Profile][gender]" class="form-control" required="">
                    <option value="">Select Gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
            </div>
        </div>

        <input type="hidden" name="data[Profile][person_status]" value="Found">


        <div class="form-group">
            <label for="" class="col-sm-offset-2 col-sm-3 control-label">Resident Country</label>
            <div class="col-sm-4">
                <div class="bfh-selectbox bfh-countries" data-name="data[Profile][resident_country]" data-country="BD" data-flags="true">
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="" class="col-sm-offset-2 col-sm-3 control-label">Resident City</label>
            <div class="col-sm-4">
                <input type="text" name="data[Profile][resident_city]" class="form-control" id="" placeholder="Resident City"> 
            </div>
        </div>

        <div class="form-group">
            <label for="" class="col-sm-offset-2 col-sm-3 control-label">Resident Street</label>
            <div class="col-sm-4">
                <input type="text" name="data[Profile][resident_street]" class="form-control" id="" placeholder="Resident Street"> 
            </div>
        </div>

        <div class="form-group">
            <label for="" class="col-sm-offset-2 col-sm-3 control-label">Missing Country</label>
            <div class="col-sm-4">
                <div class="bfh-selectbox bfh-countries" data-name="data[Profile][missing_country]" data-country="BD" data-flags="true">
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="" class="col-sm-offset-2 col-sm-3 control-label">Missing City</label>
            <div class="col-sm-4">
                <input type="text" name="data[Profile][missing_city]" class="form-control" id="" placeholder="Correct City"> 
            </div>
        </div>

        <!-- <div class="form-group">
            <label for="" class="col-sm-offset-2 col-sm-3 control-label">Personal Photos</label>
            <div class="col-sm-4">
                <input type="file" name="data[Profile][personal_photos]" class="form-control" id="" enctype="multipart/form-data">
            </div>
        </div> -->

        <div class="form-group">
            <label for="" class="col-sm-offset-2 col-sm-3 control-label">Mental illness</label>
            <div class="col-sm-4">
                <select name="data[Profile][mental_illness]" class="form-control" required="">
                    <option value="">Select Mental illness</option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                    <option value="NA">NA</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label for="" class="col-sm-offset-2 col-sm-3 control-label">Status</label>
            <div class="col-sm-4">
                <select name="data[Profile][status]" class="form-control" required="">
                    <option value="">Select Status</option>
                    <option value="Alive">Alive</option>
                    <option value="Dead">Dead</option>
                    <option value="NA">NA</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label for="" class="col-sm-offset-2 col-sm-3 control-label">Kidnapped</label>
            <div class="col-sm-4">
                <select name="data[Profile][kidnapped]" class="form-control">
                    <option>Select Kidnapped</option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                    <option value="NA">NA</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label for="" class="col-sm-offset-2 col-sm-3 control-label">Physical illness</label>
            <div class="col-sm-4">
                <select name="data[Profile][physical_illness]" class="form-control" required="">
                    <option value="">Select Physical illness</option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                    <option value="NA">NA</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label for="" class="col-sm-offset-2 col-sm-3 control-label">Description</label>
            <div class="col-sm-4">
                <textarea name="data[Profile][description]" class="form-control"></textarea>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-7">
                <input id="adv_search_img" name="data[Profile][images]" type="file" multiple class="file" data-overwrite-initial="false" data-upload-url="<?php echo $this->webroot;?>profiles/upload_image" data-max-file-count="3" data-min-file-count="1" enctype="multipart/form-data">
            </div>
        </div>

        <input type="hidden" name="data[Profile][image_links_1]">
        <input type="hidden" name="data[Profile][image_links_2]">
        <input type="hidden" name="data[Profile][image_links_3]">

        <div class="form-group">
            <div class="col-sm-offset-7 col-sm-5 report_found_submit">
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