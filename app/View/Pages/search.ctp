<script type="text/javascript" src="https://maps.google.com/maps/api/js?libraries=drawing"></script>
<?php
    echo $this->Html->script(array('app'));
?>
<!--==================Sign Up Section========================-->
<div class="container-fluid sign_up_page search_page">
    <h1>Search</h1>
    <hr>
    <form role="form" method="post" data-toggle="validator" novalidate="true" class="form-horizontal" action="<?php echo $this->webroot?>profiles/search">
        <div class="form-group">
            <label for="" class="col-sm-offset-2 col-sm-3 control-label">First Name</label>
            <div class="col-sm-4">
                <input type="text" name="first_name" class="form-control" id="" placeholder="First Name">
            </div>
        </div>

        <div class="form-group">
            <label for="" class="col-sm-offset-2 col-sm-3 control-label">Second Name</label>
            <div class="col-sm-4">
                <input type="text" name="second_name" class="form-control" id="" placeholder="Second Name">
            </div>
        </div>

        <div class="form-group">
            <label for="" class="col-sm-offset-2 col-sm-3 control-label">Last Name</label>
            <div class="col-sm-4">
                <input type="text" name="last_name" class="form-control" id="" placeholder="Last Name">
            </div>
        </div>

        <div class="form-group">
            <label for="" class="col-sm-offset-2 col-sm-3 control-label">Gender</label>
            <div class="col-sm-4">
                <select name="gender" class="form-control" required="">
                    <option value="">Select Gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label for="" class="col-sm-offset-2 col-sm-3 control-label">Birth Date</label>
            <div class="col-sm-4">
                <input type="date" name="birth_date" class="form-control" id="" placeholder="Date">
            </div>
        </div>

        <div class="form-group">
            <label for="" class="col-sm-offset-2 col-sm-3 control-label">Living Country</label>
            <div class="col-sm-4 country_selection_box">
                <div class="bfh-selectbox bfh-countries" data-name="missing_country" data-country="" data-flags="true">
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="" class="col-sm-offset-2 col-sm-3 control-label">Living City</label>
            <div class="col-sm-4">
                <input type="text" name="missing_city" class="form-control" id="" placeholder="City">
            </div>
        </div>

        <div class="form-group">
            <label for="" class="col-sm-offset-2 col-sm-3 control-label">Missing Country</label>
            <div class="col-sm-4 country_selection_box">
                <div class="bfh-selectbox bfh-countries" data-name="missing_country" data-country="" data-flags="true">
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="" class="col-sm-offset-2 col-sm-3 control-label">Missing City</label>
            <div class="col-sm-4">
                <input type="text" name="missing_city" class="form-control" id="" placeholder="City">
            </div>
        </div>

        <div class="form-group">
            <label for="" class="col-sm-offset-2 col-sm-3 control-label">Profile ID</label>
            <div class="col-sm-4">
                <input name="id" type="text" class="form-control" id="" placeholder="Profile Id">
            </div>
        </div>

        <div class="form-group adv_draw_map">
            <div class="col-sm-offset-2 col-sm-7">
                <p class="saech_map">Search by Map</p>
                <div id="map-canvas"></div><!-- Drag on google map-->
                <p>Draw a circle on the map.</p>
            </div>
            <input type="hidden" name="search_lat" value="">
            <input type="hidden" name="search_lng" value="">
            <input type="hidden" name="search_radius" value="">
        </div>


        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-7 upload_img">
                <p class="info_search">Search by photos</p>
                <input id="adv_search_img" name="data[Profile][images]" type="file" multiple class="file" data-overwrite-initial="false" data-upload-url="<?php echo $this->webroot;?>profiles/upload_image" data-max-file-count="1">
                <input type="hidden" name="search_image">
                <p>You must upload the photos. Otherwise its will not be uploaded.</p>
            </div>
        </div>

        <script>
            $('#adv_search_img').on('fileuploaded', function(event, data, previewId, index) {
                var response = data.response.response;
                var filename = data.response.filename;
                $("input[name=search_image]").val(filename);
            });
        </script>


        <div class="form-group">
            <div class="col-sm-offset-4 faceplus_img col-sm-3">
                                    <img src="<?php echo $this->webroot;?>img/inside.png" alt="">
                                </div>
            <div class="col-sm-5 report_found_submit">
                <button type="submit" class="btn btn-primary btn_search">Search</button>
            </div>
        </div>
    </form>
</div>