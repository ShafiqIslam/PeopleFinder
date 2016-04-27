<div class="container-fluid simple_msg_page">
	<h2>
		<?php
			if($success) 
				echo __("THANKS!!)";
			else
				echo __("OOPS!!");
		?>
	</h2>
	<p>
		<?php if($success) { ?>
			<?php echo __("Your mail has been verified. You can ");?><a href="<?php echo $this->webroot;?>login"><?php echo __("login now");?></a>.
		<?php } else { ?>
			<?php echo __("Something daunting has been happened. So, GTFO...");?>
		<?php } ?>
	</p>
</div>