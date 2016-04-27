
<div class="container-fluid chng_pass_page ">
	<h3 class=""><?php echo __("Change Password");?></h3>
	<div class="col-sm-6 col-sm-offset-3">
		<form name="" data-toggle="validator" novalidate="true" id="login_form" method="post" class="form-horizontal">
            <div class="form-group">
                <label for="inputPassword" class="col-sm-4 control-label"><?php echo __("Old Password");?></label>
                <div class="col-sm-8">
                    <input type="password" class="form-control" name="data[Reporter][password_old]" placeholder="<?php echo __("Type Old Passward");?>" required="">
                </div>
            </div>

	        <div class="form-group">
	            <label for="" class="col-sm-4 control-label"><?php echo __("New Password");?></label>
	            <div class="col-sm-8">
	                <input type="password" name="data[Reporter][password]" id="inputPassword" class="form-control" data-toggle="validator" data-minlength="6" id="inputPassword" placeholder="<?php echo __("Type New Password");?>" required="">
	                <div class="help-block"><?php echo __("Minimum of 6 characters");?></div>
	            </div>
	        </div>

	        <div class="form-group">
	            <label for="" class="col-sm-4 control-label"><?php echo __("Confirm Password");?></label>
	            <div class="col-sm-8">
	                <input type="password" name="data[Reporter][password2]" class="form-control" id="" data-match="#inputPassword" data-match-error="<?php echo __("Whoops, these don&#39;t match");?>" placeholder="<?php echo __("Type Confirm Password");?>" required="">
	                <div class="help-block with-errors"></div>
	            </div>
	        </div>

	        <div class="form-group">
                <div class="col-sm-offset-9">
                    <button type="submit" class="btn btn-primary btn_search"><?php echo __("Submit");?></button>
                </div>
            </div>
        </form>
	</div>
</div>