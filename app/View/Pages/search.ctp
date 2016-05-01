
<script type="text/javascript" src="https://maps.google.com/maps/api/js?libraries=drawing"></script>
<?php echo $this->Html->script(array('app')); ?>
<!--==================Sign Up Section========================-->
<div class="container-fluid sign_up_page search_page">
    <h1>Search</h1>
    <hr>
    <form id="detail_search" role="form" method="post" class="form-horizontal search_form" action="<?php echo $this->webroot?>profiles/search"  enctype="multipart/form-data">
        <div class="form-group">
            <label for="" class="col-sm-offset-2 col-sm-3 control-label"><?php echo __("First Name");?></label>
            <div class="col-sm-4">
                <input type="text" name="first_name" class="form-control" id="" placeholder="<?php echo __("First Name");?>">
            </div>
        </div>

        <div class="form-group">
            <label for="" class="col-sm-offset-2 col-sm-3 control-label"><?php echo __("Second Name");?></label>
            <div class="col-sm-4">
                <input type="text" name="second_name" class="form-control" id="" placeholder="<?php echo __("Second Name");?>">
            </div>
        </div>

        <div class="form-group">
            <label for="" class="col-sm-offset-2 col-sm-3 control-label"><?php echo __("Last Name");?></label>
            <div class="col-sm-4">
                <input type="text" name="last_name" class="form-control" id="" placeholder="<?php echo __("Last Name");?>">
            </div>
        </div>

        <div class="form-group">
            <label for="" class="col-sm-offset-2 col-sm-3 control-label"><?php echo __("Gender");?></label>
            <div class="col-sm-4">
                <select name="gender" class="form-control gender">
                    <option value=""><?php echo __("Select Gender");?></option>
                    <option value="Male"><?php echo __("Male");?></option>
                    <option value="Female"><?php echo __("Female");?></option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label for="" class="col-sm-offset-2 col-sm-3 control-label"><?php echo __("Birth Date");?></label>
            <div class="col-sm-4" >
                <input type="text" name="birthdate"  class="form-control" placeholder="<?php echo __("Birth Date");?>" id="datepicker">
            </div>
        </div>

        <div class="form-group">
            <label for="" class="col-sm-offset-2 col-sm-3 control-label"><?php echo __("Resident Country");?></label>
            <div class="col-sm-4 country_selection_box">
                <div class="bfh-selectbox bfh-countries" data-name="resident_country" data-country="" data-flags="true">
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="" class="col-sm-offset-2 col-sm-3 control-label"><?php echo __("Resident City");?></label>
            <div class="col-sm-4">
                <input type="text" name="resident_city" class="form-control" id="" placeholder="<?php echo __("Resident City");?>">
            </div>
        </div>

        <div class="form-group">
            <label for="" class="col-sm-offset-2 col-sm-3 control-label"><?php echo __("Missing Country");?></label>
            <div class="col-sm-4 country_selection_box">
                <div class="bfh-selectbox bfh-countries" data-name="missing_country" data-country="" data-flags="true">
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="" class="col-sm-offset-2 col-sm-3 control-label"><?php echo __("Missing City");?></label>
            <div class="col-sm-4">
                <input type="text" name="missing_city" class="form-control" id="" placeholder="<?php echo __("Missing City");?>">
            </div>
        </div>

        <div class="form-group">
            <label for="" class="col-sm-offset-2 col-sm-3 control-label"><?php echo __("Profile ID");?></label>
            <div class="col-sm-4">
                <input name="id" type="number" class="form-control" min="0" id="" placeholder="<?php echo __("Profile Id");?>">
            </div>
        </div>

        <div class="form-group adv_draw_map">
            <label for="" class="col-sm-offset-2 col-sm-3 control-label"><?php echo __("Search By Location");?></label>
            <div class="col-sm-offset-2 col-sm-7">
                <div id="map-canvas"></div><!-- Drag on google map-->
                <p><?php echo __("Draw a circle on the map.");?></p>
            </div>
            <input type="hidden" name="search_lat" value="">
            <input type="hidden" name="search_lng" value="">
            <input type="hidden" name="search_radius" value="">
        </div>


        <div class="form-group">
            <label for="" class="col-sm-offset-2 col-sm-3 control-label"><?php echo __("Upload Photos");?></label>
            <div class="col-sm-offset-2 col-sm-7 upload_img">
                <input id="adv_search_img" name="data[Profile][images]" type="file" multiple class="file" data-overwrite-initial="false" data-upload-url="<?php echo $this->webroot;?>profiles/upload_image" data-max-file-count="1">
                <p><?php echo __("** NB: You must click 'Upload' before submitting after adding image.");?></p>
            </div>
        </div>

        <input type="hidden" name="search_image">

        <script>
            $('#adv_search_img').on('fileuploaded', function(event, data, previewId, index) {
                var response = data.response.response;
                var filename = data.response.filename;
                $("input[name=search_image]").val(filename);
            });
        </script>


        <div class="form-group">
            <div class="faceplus_img col-sm-offset-2 col-sm-3">
                <img style="width: 160px;" src="<?php echo $this->webroot;?>img/inside.png" alt="">
            </div>
            <div class="col-sm-offset-2 col-sm-2 report_found_submit">
                <button type="submit" class="btn btn-primary btn_search pull-right btn_valid"><?php echo __("Search");?></button>
            </div>
        </div>
    </form>
</div>