<!--==================log in Section========================-->
<div class="container-fluid sign_up_page">
    <h1><?php echo __("Forgot Password");?></h1>
    <hr>
    
    <?php if(isset($email_exist)) { ?>
        <?php if($email_exist) { ?>
            <p><?php echo __("An e-mail has been send to");?> <?php echo $email;?>. <?php echo __("Please follow the mail to get the recovery link of your account.");?></p>
        <?php } else { ?>
            <p style="text-align: center;color: #E91E63;"><?php echo __("Sorry, we dont recognise the email.<br>Try Again.<br>Or, Check again your email for verification. We don't recongnise your email until it's verified.");?></p>
        <?php } ?>
        <hr>
    <?php } ?>

    <?php if(!isset($email) || !$email_exist ) { ?>
    <form role="form" name="forgot_form" data-toggle="validator" novalidate="true" id="forgot_form" method="post" action="<?php echo $this->webroot;?>reporters/forgot_password" class="form-horizontal">
        <div class="form-group">
            <label for="" class="col-sm-offset-3 col-sm-2 control-label"><?php echo __("Email");?></label>
            <div class="col-sm-3">
                <input type="text" name="data[Reporter][email]" class="form-control" id="" placeholder="<?php echo __("Email");?>" required="">
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