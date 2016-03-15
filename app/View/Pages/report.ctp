<!--==================Sign Up Section========================-->
<div class="container-fluid sign_up_page">
    <h1>Report</h1>
    <hr>
    <form role="form" data-toggle="validator" novalidate="true" class="form-horizontal">
        <div class="form-group">
            <label for="" class="col-sm-offset-3 col-sm-2 control-label">First Name</label>
            <div class="col-sm-3">
                <input type="text" class="form-control" id="" placeholder="First Name" required="">
            </div>
        </div>

        <div class="form-group">
            <label for="" class="col-sm-offset-3 col-sm-2 control-label">Second Name</label>
            <div class="col-sm-3">
                <input type="text" class="form-control" id="" placeholder="Second Name">
            </div>
        </div>

        <div class="form-group">
            <label for="" class="col-sm-offset-3 col-sm-2 control-label">Last Name</label>
            <div class="col-sm-3">
                <input type="text" class="form-control" id="" placeholder="Last Name" required="">
            </div>
        </div>

        <div class="form-group">
            <label for="" class="col-sm-offset-3 col-sm-2 control-label">Birthdate</label>
            <div class="col-sm-3">
                <input type="date" class="form-control" id="" placeholder="date">
            </div>
        </div>

        <div class="form-group">
            <label for="" class="col-sm-offset-3 col-sm-2 control-label">Blood Group</label>
            <div class="col-sm-3">
                <select class="form-control">
                    <option>Select Blood Group</option>
                    <option>A+</option>
                    <option>A-</option>
                    <option>B+</option>
                    <option>B-</option>
                    <option>O+</option>
                    <option>O-</option>
                    <option>AB+</option>
                    <option>AB-</option>

                </select>
            </div>
        </div>

        <div class="form-group">
            <label for="" class="col-sm-offset-3 col-sm-2 control-label">Nationality</label>
            <div class="col-sm-3 country_selection_box">
                <!--<select class="input-medium bfh-countries" data-country="BD"></select>-->

                <div class="bfh-selectbox bfh-countries" data-country="BD" data-flags="true">
                    <!--<input type="hidden" value="">
                    <a class="bfh-selectbox-toggle" role="button" data-toggle="bfh-selectbox" href="#">
                        <span class="bfh-selectbox-option input-medium" data-option=""></span>
                        <b class="caret"></b>
                    </a>
                    <div class="bfh-selectbox-options">
                        <input type="text" class="bfh-selectbox-filter">
                        <div role="listbox">
                            <ul role="option"></ul>
                        </div>
                    </div>-->
                </div>        
            </div>
        </div>

        <div class="form-group">
            <label for="" class="col-sm-offset-3 col-sm-2 control-label">Gender</label>
            <div class="col-sm-3">
                <select class="form-control" required="">
                    <option value="">Select Gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label for="" class="col-sm-offset-3 col-sm-2 control-label">Person's Status</label>
            <div class="col-sm-3">
                <select class="form-control" required="">
                    <option value="">Select Person's Status</option>
                    <option value="missing">Missing</option>
                    <option value="found">Found</option>
                    <option value="may be found">May be Found</option>
                </select>
            </div>
        </div>


        <div class="form-group">
            <label for="" class="col-sm-offset-3 col-sm-2 control-label">Resident Country</label>
            <div class="col-sm-3">
                <div class="bfh-selectbox bfh-countries" data-country="BD" data-flags="true">
                    <!--<input type="hidden" value="">
                    <a class="bfh-selectbox-toggle" role="button" data-toggle="bfh-selectbox" href="#">
                        <span class="bfh-selectbox-option input-medium" data-option=""></span>
                        <b class="caret"></b>
                    </a>
                    <div class="bfh-selectbox-options">
                        <input type="text" class="bfh-selectbox-filter">
                        <div role="listbox">
                            <ul role="option"></ul>
                        </div>
                    </div>-->
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="" class="col-sm-offset-3 col-sm-2 control-label">Resident City</label>
            <div class="col-sm-3">
                <input type="text" class="form-control" id="" placeholder="Correct City"> 
            </div>
        </div>

        <div class="form-group">
            <label for="" class="col-sm-offset-3 col-sm-2 control-label">Resident Street</label>
            <div class="col-sm-3">
                <input type="text" class="form-control" id="" placeholder="Correct Street"> 
            </div>
        </div>

        <div class="form-group">
            <label for="" class="col-sm-offset-3 col-sm-2 control-label">Missing Country</label>
            <div class="col-sm-3">
                <!--<select class="input-medium bfh-countries form-control" data-country="BD"></select>-->
                <div class="bfh-selectbox bfh-countries" data-country="BD" data-flags="true">
                    <!--<input type="hidden" value="">
                    <a class="bfh-selectbox-toggle" role="button" data-toggle="bfh-selectbox" href="#">
                        <span class="bfh-selectbox-option input-medium" data-option=""></span>
                        <b class="caret"></b>
                    </a>
                    <div class="bfh-selectbox-options">
                        <input type="text" class="bfh-selectbox-filter">
                        <div role="listbox">
                            <ul role="option"></ul>
                        </div>
                    </div>-->
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="" class="col-sm-offset-3 col-sm-2 control-label">Missing City</label>
            <div class="col-sm-3">
                <input type="text" class="form-control" id="" placeholder="Correct City"> 
            </div>
        </div>

        <div class="form-group">
            <label for="" class="col-sm-offset-3 col-sm-2 control-label">Personal Photos</label>
            <div class="col-sm-3">
                <input type="file" class="form-control" id="" formenctype="multipart/form-data">
            </div>
        </div>

        <div class="form-group">
            <label for="" class="col-sm-offset-3 col-sm-2 control-label">Mental illness</label>
            <div class="col-sm-3">
                <select class="form-control" required="">
                    <option value="">Select Mental illness</option>
                    <option value="yes">Yes</option>
                    <option value="no">No</option>
                    <option value="NA">NA</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label for="" class="col-sm-offset-3 col-sm-2 control-label">Status</label>
            <div class="col-sm-3">
                <select class="form-control" required="">
                    <option value="">Select Status</option>
                    <option value="alive">Alive</option>
                    <option value="death">Death</option>
                    <option value="NA">NA</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label for="" class="col-sm-offset-3 col-sm-2 control-label">Kidnapped</label>
            <div class="col-sm-3">
                <select class="form-control">
                    <option>Select Kidnapped</option>
                    <option>Yes</option>
                    <option>No</option>
                    <option>NA</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label for="" class="col-sm-offset-3 col-sm-2 control-label">Physical illness</label>
            <div class="col-sm-3">
                <select class="form-control" required="">
                    <option value="">Select Physical illness</option>
                    <option value="yes">Yes</option>
                    <option value="no">No</option>
                    <option value="NA">NA</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label for="" class="col-sm-offset-3 col-sm-2 control-label">ID Document(s)</label>
            <div class="col-sm-3">
                <input type="file" class="form-control" id="" formenctype="multipart/form-data">
            </div>
        </div>

        <div class="form-group">
            <label for="" class="col-sm-offset-3 col-sm-2 control-label">Profile ID</label>
            <div class="col-sm-3">
                <input type="text" class="form-control" id="" placeholder="Profile Id No." required="">
            </div>
        </div>

        <div class="form-group">
            <label for="" class="col-sm-offset-3 col-sm-2 control-label">Description</label>
            <div class="col-sm-3">
                <textarea type="text" class="form-control"></textarea>
            </div>
        </div>



        <div class="form-group">
            <div class="col-sm-offset-5 col-sm-7">
                <button type="submit" class="btn btn-primary btn_search">Submit</button>
            </div>
        </div>
    </form>
</div>