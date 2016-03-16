<!--==================Sign Up Section========================-->
<div class="container-fluid sign_up_page">
    <h1>Report</h1>
    <hr>
    <form role="form" data-toggle="validator" novalidate="true" class="form-horizontal" enctype="multipart/form-data">
        <div class="form-group">
            <label for="" class="col-sm-offset-3 col-sm-2 control-label">First Name</label>
            <div class="col-sm-3">
                <input type="text" name="data[Profile][first_name]" class="form-control" id="" placeholder="First Name" required="">
            </div>
        </div>

        <div class="form-group">
            <label for="" class="col-sm-offset-3 col-sm-2 control-label">Second Name</label>
            <div class="col-sm-3">
                <input type="text" name="data[Profile][second_name]" class="form-control" id="" placeholder="Second Name">
            </div>
        </div>

        <div class="form-group">
            <label for="" class="col-sm-offset-3 col-sm-2 control-label">Last Name</label>
            <div class="col-sm-3">
                <input type="text" name="data[Profile][last_name]" class="form-control" id="" placeholder="Last Name" required="">
            </div>
        </div>

        <div class="form-group">
            <label for="" class="col-sm-offset-3 col-sm-2 control-label">Birthdate</label>
            <div class="col-sm-3">
                <input type="date" name="data[Profile][birthdate]" class="form-control" id="" placeholder="date">
            </div>
        </div>

        <div class="form-group">
            <label for="" class="col-sm-offset-3 col-sm-2 control-label">Blood Group</label>
            <div class="col-sm-3">
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
            <label for="" class="col-sm-offset-3 col-sm-2 control-label">Nationality</label>
            <div class="col-sm-3 country_selection_box">
                <div class="bfh-selectbox bfh-countries" data-name="data[Reporter][nationality]"  data-country="BD" data-flags="true">
                </div>        
            </div>
        </div>

        <div class="form-group">
            <label for="" class="col-sm-offset-3 col-sm-2 control-label">Gender</label>
            <div class="col-sm-3">
                <select name="data[Profile][gender]" class="form-control" required="">
                    <option value="">Select Gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label for="" class="col-sm-offset-3 col-sm-2 control-label">Person's Status</label>
            <div class="col-sm-3">
                <select name="data[Profile][person_status]" class="form-control" required="">
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
                <div class="bfh-selectbox bfh-countries" data-name="data[Reporter][resident_country]" data-country="BD" data-flags="true">
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="" class="col-sm-offset-3 col-sm-2 control-label">Resident City</label>
            <div class="col-sm-3">
                <input type="text" name="data[Profile][resident_city]" class="form-control" id="" placeholder="Resident City"> 
            </div>
        </div>

        <div class="form-group">
            <label for="" class="col-sm-offset-3 col-sm-2 control-label">Resident Street</label>
            <div class="col-sm-3">
                <input type="text" name="data[Profile][resident_street]" class="form-control" id="" placeholder="Resident Street"> 
            </div>
        </div>

        <div class="form-group">
            <label for="" class="col-sm-offset-3 col-sm-2 control-label">Missing Country</label>
            <div class="col-sm-3">
                <div class="bfh-selectbox bfh-countries" data-name="data[Reporter][missing_country]" data-country="BD" data-flags="true">
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="" class="col-sm-offset-3 col-sm-2 control-label">Missing City</label>
            <div class="col-sm-3">
                <input type="text" name="data[Profile][missing_city]" class="form-control" id="" placeholder="Correct City"> 
            </div>
        </div>

        <div class="form-group">
            <label for="" class="col-sm-offset-3 col-sm-2 control-label">Personal Photos</label>
            <div class="col-sm-3">
                <input type="file" name="data[Profile][personal_photos]" class="form-control" id="" enctype="multipart/form-data">
            </div>
        </div>

        <div class="form-group">
            <label for="" class="col-sm-offset-3 col-sm-2 control-label">Mental illness</label>
            <div class="col-sm-3">
                <select name="data[Profile][mental_illness]" class="form-control" required="">
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
                <select name="data[Profile][status]" class="form-control" required="">
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
                <select name="data[Profile][kidnapped]" class="form-control">
                    <option>Select Kidnapped</option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                    <option value="NA">NA</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label for="" class="col-sm-offset-3 col-sm-2 control-label">Physical illness</label>
            <div class="col-sm-3">
                <select name="data[Profile][physical_illness]" class="form-control" required="">
                    <option value="">Select Physical illness</option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                    <option value="NA">NA</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label for="" class="col-sm-offset-3 col-sm-2 control-label">Description</label>
            <div class="col-sm-3">
                <textarea name="data[Profile][description]" class="form-control"></textarea>
            </div>
        </div>



        <div class="form-group">
            <div class="col-sm-offset-5 col-sm-7">
                <button type="submit" class="btn btn-primary btn_search">Submit</button>
            </div>
        </div>
    </form>
</div>