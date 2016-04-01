<div style="clear: both;"></div>
<div class="container-fluid chng_pass_page sign_up_page">
	<h3>Change Password</h3>

	<?php if($success==20) { ?>
		<h4>Your Password Has been changed.</h4>
	<?php } elseif($success==10) { ?>
		<h4>Oops! Your Old Password does not match.</h4>
	<?php } ?>

	<div class="col-sm-6 col-sm-offset-3">
		<form name="" data-toggle="validator" novalidate="true" id="login_form" method="post" class="form-horizontal">
            <div class="form-group">
                <label for="inputPassword" class="col-sm-4 control-label">Old Password</label>
                <div class="col-sm-8">
                    <input type="password" class="form-control" name="data[Reporter][password_old]" placeholder="Type Old Passward" required="">
                </div>
            </div>

	        <div class="form-group">
	            <label for="" class="col-sm-4 control-label">New Password</label>
	            <div class="col-sm-8">
	                <input type="password" name="data[Reporter][password]" id="inputPassword" class="form-control" data-toggle="validator" data-minlength="6" id="inputPassword" placeholder="Type New Password" required="">
	                <div class="help-block">Minimum of 6 characters</div>
	            </div>
	        </div>

	        <div class="form-group">
	            <label for="" class="col-sm-4 control-label">Confirm Password</label>
	            <div class="col-sm-8">
	                <input type="password" name="data[Reporter][password2]" class="form-control" id="" data-match="#inputPassword" data-match-error="Whoops, these don&#39;t match" placeholder="Type Confirm Password" required="">
	                <div class="help-block with-errors"></div>
	            </div>
	        </div>

	        <div class="form-group">
                <div class="col-sm-offset-9">
                    <button type="submit" class="btn btn-primary btn_search">Submit</button>
                </div>
            </div>
        </form>
	</div>
</div>