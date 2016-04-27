<!--==================log in Section========================-->
<div class="container-fluid login_page">
    <h1><?php echo __("Login");?></h1>
    <hr>

    <?php if(!empty($login_fail) && $login_fail) { ?>
        <p style="text-align: center;color: #E91E63;"><?php echo __("Incorrect Username and Password.<br>Try Again.<br>Or, Check again your email for verification. We don't recongnise your email until it's verified.");?></p>
        <hr>
    <?php } ?>

    <form role="form" name="login_form" data-toggle="validator" novalidate="true" id="login_form" method="post" action="<?php echo $this->webroot;?>reporters/login" class="form-horizontal">
        <div class="form-group">
            <label for="" class="col-sm-offset-3 col-sm-2 control-label"><?php echo __("Email");?></label>
            <div class="col-sm-3">
                <input type="text" name="data[Reporter][email]" class="form-control" id="" placeholder="<?php echo __("Email");?>" required="">
            </div>
        </div>

        <div class="form-group">
            <label for="" class="col-sm-offset-3 col-sm-2 control-label"><?php echo __("Password");?></label>
            <div class="col-sm-3">
                <input type="password" class="form-control" id="inputPassword3" name="data[Reporter][password]" placeholder="<?php echo __("Password");?>" required="">
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-5 col-sm-7">
                <button type="submit" class="btn btn-primary btn_search"><?php echo __("Login");?></button>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-5 col-sm-5 forget_pass">
                <p><a href="<?php echo $this->webroot;?>reporters/forgot_password"><?php echo __("Forgot Your Password?");?></a></p>
            </div>
        </div>
    </form>       
</div>