<!--==================Sign Up Section========================-->
<div class="container-fluid sign_up_page">
    <h1>Sign Up</h1>
    <hr>
    <form role="form" data-toggle="validator" novalidate="true" enctype="multipart/form-data" class="form-horizontal" method="post" action="<?php echo $this->webroot;?>reporters/signup">
        <div class="form-group">
            <label for="" class="col-sm-offset-3 col-sm-2 control-label">First Name</label>
            <div class="col-sm-3">
                <input type="text" class="form-control" id="" name="data[Reporter][first_name]" placeholder="First Name" required="">
            </div>
        </div>

        <div class="form-group">
            <label for="" class="col-sm-offset-3 col-sm-2 control-label">Second Name</label>
            <div class="col-sm-3">
                <input type="text" class="form-control" id="" name="data[Reporter][second_name]" placeholder="Second Name">
            </div>
        </div>

        <div class="form-group">
            <label for="" class="col-sm-offset-3 col-sm-2 control-label">Last Name</label>
            <div class="col-sm-3">
                <input type="text" class="form-control" id="" name="data[Reporter][last_name]" placeholder="Last Name" required="">
            </div>
        </div>


        <div class="form-group">
            <label for="" class="col-sm-offset-3 col-sm-2 control-label">Nationality</label>
            <div class="col-sm-3">
                <div class="bfh-selectbox bfh-countries" data-name="data[Reporter][nationality]" data-country="BD" data-flags="true"></div>
            </div>
        </div>

        <div class="form-group">
            <label for="" class=" col-sm-offset-3 col-sm-2 control-label">Gender</label>
            <div class="col-sm-3">
                <select name="data[Reporter][gender]" class="form-control" required="">
                    <option value="">Select Gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label for="" class="col-sm-offset-3 col-sm-2 control-label">Resident Country</label>
            <div class="col-sm-3">
                <div class="bfh-selectbox bfh-countries" data-name="data[Reporter][resident_country]" data-country="BD" data-flags="true"></div>
            </div>
        </div>

        <div class="form-group">
            <label for="" class="col-sm-offset-3 col-sm-2 control-label">ID Document</label>
            <div class="col-sm-3">
                <input type="file" name="data[Reporter][document_id]" class="form-control" id="" enctype="multipart/form-data">
            </div>
        </div>

        <div class="form-group">
            <label for="" class="col-sm-offset-3 col-sm-2 control-label">Email</label>
            <div class="col-sm-3">
                <input type="email" name="data[Reporter][email]" class="form-control" id="" data-error="Bruh, that email address is invalid" required="">
                <div class="help-block with-errors"></div>
            </div>
        </div>

        <div class="form-group">
            <label for="" class="col-sm-offset-3 col-sm-2 control-label">Password</label>
            <div class="col-sm-3">
                <input type="password" name="data[Reporter][password]" class="form-control" data-toggle="validator" data-minlength="6" id="inputPassword" required="">
                <div class="help-block">Minimum of 6 characters</div>
            </div>
        </div>

        <div class="form-group">
            <label for="" class="col-sm-offset-3 col-sm-2 control-label">Confirm Password</label>
            <div class="col-sm-3">
                <input type="password" name="data[Reporter][password2]" class="form-control" id="" data-match="#inputPassword" data-match-error="Whoops, these don&#39;t match" required="">
                <div class="help-block with-errors"></div>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-5 col-sm-10">
                <button type="submit" class="btn btn-primary btn_search">Sign Up</button>
            </div>
        </div>
    </form>
</div>