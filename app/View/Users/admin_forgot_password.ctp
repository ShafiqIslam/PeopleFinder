<div class="container dashboard">
    <div class="row"  id="admin-login">
        <div class="col-md-5 col-sm-5 col-md-push-6 col-sm-push-6  ">
            <?php echo $this->Form->create('User',array('class'=>'form-group'));?>
            <fieldset>
                <h2>
                    Face Finder <span>Dashboard</span> 
                    <span class="pull-right" style="color:#820605">Forgot Password</span>
                </h2>
                
                <?php
                echo $this->Form->input('email', array('class'=>'form-control','label'=>false,'placeholder'=>'Email','div'=>array('class'=>'form-group')));?>

                <button type="submit" class="btn btn-primary pull-right">RECOVER</button>
                <?php echo $this->Form->end(); ?>
            </fieldset>
        </div>
        <div class="col-md-1 col-sm-1">
            <div class="border"></div>
        </div>
        <div class="col-md-5 col-sm-5 col-md-pull-7 col-sm-pull-7">
            <div class="admin-images pull-right"></div>
        </div>
    </div>
</div>