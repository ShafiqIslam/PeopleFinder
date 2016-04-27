<!--==================log in Section========================-->
<div class="container-fluid sign_up_page">
    <h1><?php echo __("Recover Password");?></h1>
    <hr>
    
    <?php if($is_post) { ?>
        <?php if($success) { ?>
            <p><?php echo __("Your password has been reset. You can");?> <a href="<?php echo $this->webroot?>login"><?php echo __("login now");?></a>.</p>
        <?php } else { ?>
            <p><?php echo __("Your password can't be reset right now. Try again.");?></p>
        <?php } ?>
    <?php } ?>

    <?php if(!$success) { ?>
    <form role="form" name="forgot_form" id="forgot_form" method="post" class="form-horizontal">
        <div class="form-group">
            <label for="" class="col-sm-offset-3 col-sm-2 control-label"><?php echo __("New Password");?></label>
            <div class="col-sm-3">
                <input type="password" name="data[Reporter][password]" class="form-control" id="" placeholder="<?php echo __("Enter New Password");?>">
            </div>
        </div>

        <div class="form-group">
            <label for="" class="col-sm-offset-3 col-sm-2 control-label"><?php echo __("Confirm Password");?></label>
            <div class="col-sm-3">
                <input type="password" name="data[Reporter][c_password]" class="form-control" id="" placeholder="<?php echo __("Repeat New Password");?>">
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-5 col-sm-7">
                <button type="submit" class="btn btn-primary btn_search"><?php echo __("Submit");?></button>
            </div>
        </div>
    </form>
    <?php } ?>      
</div>