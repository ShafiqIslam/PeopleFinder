<!--==================Sign Up Section========================-->
<div class="container-fluid sign_up_page search_page">
    <h1>Search</h1>
    <hr>
    <form class="form-horizontal">
        <div class="form-group">
            <label for="" class="col-sm-offset-2 col-sm-3 control-label">First Name</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="" placeholder="First Name">
            </div>
        </div>

        <div class="form-group">
            <label for="" class="col-sm-offset-2 col-sm-3 control-label">Second Name</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="" placeholder="Second Name">
            </div>
        </div>

        <div class="form-group">
            <label for="" class="col-sm-offset-2 col-sm-3 control-label">Last Name</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="" placeholder="Last Name">
            </div>
        </div>

        <div class="form-group">
            <label for="" class="col-sm-offset-2 col-sm-3 control-label">Gender</label>
            <div class="col-sm-4">
                <select class="form-control">
                    <option>Select Gender</option>
                    <option>Male</option>
                    <option>Female</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-7">
                <input id="adv_search_img" type="file" multiple class="file" data-overwrite-initial="false" data-upload-url="#" data-max-file-count="3">
            </div>
        </div>

        <div class="form-group">
            <label for="" class="col-sm-offset-2 col-sm-3 control-label">Country</label>
            <div class="col-sm-4 country_selection_box">
                <!--<select class="input-medium bfh-countries" data-country="BD"></select>-->
    
                <div class="bfh-selectbox bfh-countries" data-country="BD" data-flags="true">
                    <input type="hidden" value="">
                    <a class="bfh-selectbox-toggle" role="button" data-toggle="bfh-selectbox" href="#">
                        <span class="bfh-selectbox-option input-medium" data-option=""></span>
                        <b class="caret"></b>
                    </a>
                    <div class="bfh-selectbox-options">
                        <input type="text" class="bfh-selectbox-filter">
                        <div role="listbox">
                            <ul role="option"></ul>
                        </div>
                    </div>
                </div>
 
            </div>
        </div>

        <div class="form-group">
            <label for="" class="col-sm-offset-2 col-sm-3 control-label">Profile ID</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="" placeholder="Profile Id">
            </div>
        </div>



        <div class="form-group">
            <div class="col-sm-offset-5 col-sm-7">
                <button type="submit" class="btn btn-primary btn_search">Search</button>
            </div>
        </div>
    </form>
</div>