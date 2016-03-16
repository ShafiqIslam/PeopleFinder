<div class="container-fluid simple_msg_page">
	<h2>
		<?php
			if($success) 
				echo "THANKS!!";
			else
				echo "OOPS!!";
		?>
	</h2>
	<p>
		<?php if($success) { ?>
			Your mail has been verified. You can <a href="<?php echo $this->webroot;?>login">login now</a>.
		<?php } else { ?>
			Something daunting has been happened. So, GTFO...
		<?php } ?>
	</p>
</div>