<!--==================Sign Up Section========================-->
<div class="container-fluid sign_up_page search_page">
    <h1>Search</h1>
    <hr>
    <form class="form-horizontal" action="<?php echo $this->webroot?>profiles/search" method="post">
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
                <select name="gender" class="form-control">
                    <option>Select Gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label for="" class="col-sm-offset-2 col-sm-3 control-label">Missing Country</label>
            <div class="col-sm-4 country_selection_box">
                <div class="bfh-selectbox bfh-countries" data-name="missing_country" data-country="BD" data-flags="true">
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
                <div id="map-canvas"></div><!-- Drag on google map-->
                <p>Draw a circle on the map.</p>
            </div>
            <input type="hidden" name="search_lat" value="">
            <input type="hidden" name="search_lng" value="">
            <input type="hidden" name="search_radius" value="">
        </div>


        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-7">
                <input id="adv_search_img" type="file" multiple class="file" data-overwrite-initial="false" data-upload-url="#" data-max-file-count="3">
            </div>
        </div>


        <div class="form-group">
            <div class="col-sm-offset-7 col-sm-5 report_found_submit">
                <button type="submit" class="btn btn-primary btn_search">Search</button>
            </div>
        </div>
    </form>
</div>