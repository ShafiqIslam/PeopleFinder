<div class="container my_account_details">
	<div class="row">
		<?php $logged = $this->Session->read('logged_user'); ?>
		<div class="my_account_heading">
			<h1><?php echo __("Welcome,");?> <span><?php echo $logged['name'];?></span></h1>
			<h3><?php echo __("Control, protect, and secure your account, all in one place");?></h3>
		</div>
		<hr>
		<div class="myaccount_page">
			<a href="<?php echo $this->webroot;?>change_account" class="col-sm-offset-2 col-sm-4 account_edit">
				<h3><?php echo __("Edit Account");?><span><i class="fa fa-arrow-right"></i></span></h3>
				<hr>
				<h4><?php echo __("Edit & Control your Account From Here.");?></h4>
			</a>
			<a href="<?php echo $this->webroot;?>change_pass" class="col-sm-4 change_pass">
				<h3><?php echo __("Change Passward");?><span><i class="fa fa-arrow-right"></i></span></h3>
				<hr>
				<h4><?php echo __("Change & Control your password, keep yourself secure.");?></h4>
			</a>
		</div>
	</div>
</div>