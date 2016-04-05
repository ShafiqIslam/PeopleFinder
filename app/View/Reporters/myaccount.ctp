<div class="container my_account_details">
	<div class="row">
		<?php $logged = $this->Session->read('logged_user'); ?>
		<div class="my_account_heading">
			<h1>Welcome, <span><?php echo $logged['name'];?></span></h1>
			<h3>Control, protect, and secure your account, all in one place</h3>
		</div>
		<hr>
		<div class="myaccount_page">
			<a href="<?php echo $this->webroot;?>change_account" class="col-sm-offset-2 col-sm-4 account_edit">
				<h3>Edit Account <span><i class="fa fa-arrow-right"></i></span></h3>
				<hr>
				<h4>Edit & Control your Account From Here.</h4>
			</a>
			<a href="<?php echo $this->webroot;?>change_pass" class="col-sm-4 change_pass">
				<h3>Change Passward <span><i class="fa fa-arrow-right"></i></span></h3>
				<hr>
				<h4>Change & Control your password, keep yourself secure.</h4>
			</a>
		</div>
	</div>
</div>