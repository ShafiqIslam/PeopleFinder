<!--==================log in Section========================-->
<div class="container-fluid sign_up_page">
    <h1>Login</h1>
    <hr>

    <?php if(!empty($login_fail) && $login_fail) { ?>
        <p>Incorrect Username and Password.<br>Try Again.<br>Or, Check again your email for verification. We don't recongnise your email until it's verified.</p>
        <hr>
    <?php } ?>

    <form role="form" name="login_form" id="login_form" method="post" action="<?php echo $this->webroot;?>reporters/login" class="form-horizontal">
        <div class="form-group">
            <label for="" class="col-sm-offset-3 col-sm-2 control-label">Email</label>
            <div class="col-sm-3">
                <input type="text" name="data[Reporter][email]" class="form-control" id="" placeholder="Email">
            </div>
        </div>

        <div class="form-group">
            <label for="" class="col-sm-offset-3 col-sm-2 control-label">Password</label>
            <div class="col-sm-3">
                <input type="password" class="form-control" id="inputPassword3" name="data[Reporter][password]" placeholder="passward">
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-5 col-sm-7">
                <button type="submit" class="btn btn-primary btn_search">Login</button>
            </div>
        </div>
        <a href="<?php echo $this->webroot;?>reporters/forgot_password">Forgot Your Password</a>
    </form>       
</div>