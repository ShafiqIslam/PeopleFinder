<!--==================log in Section========================-->
<div class="container-fluid sign_up_page">
    <h1>Recover Password</h1>
    <hr>
    
    <?php if($is_post) { ?>
        <?php if($success) { ?>
            <p>Your password has been reset. You can <a href="<?php echo $this->webroot?>login">login now</a>.</p>
        <?php } else { ?>
            <p>Your password can't be reset right now. Try again.</p>
        <?php } ?>
    <?php } ?>

    <?php if(!$success) { ?>
    <form role="form" name="forgot_form" id="forgot_form" method="post" class="form-horizontal">
        <div class="form-group">
            <label for="" class="col-sm-offset-3 col-sm-2 control-label">New Password</label>
            <div class="col-sm-3">
                <input type="password" name="data[Reporter][password]" class="form-control" id="" placeholder="Enter New Password">
            </div>
        </div>

        <div class="form-group">
            <label for="" class="col-sm-offset-3 col-sm-2 control-label">Confirm Password</label>
            <div class="col-sm-3">
                <input type="password" name="data[Reporter][c_password]" class="form-control" id="" placeholder="Repeat New Password">
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-5 col-sm-7">
                <button type="submit" class="btn btn-primary btn_search">Submit</button>
            </div>
        </div>
    </form>
    <?php } ?>      
</div>