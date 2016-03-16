<div class="container-fluid simple_msg_page">
	<h2>
		<?php
			if($success) 
				echo "THANKS!!";
			else
				echo "OOPS!!";
		?>
	</h2>
	<hr>
	<p>
		<?php if($success) { ?>
			Thanks for using our service. An e-mail has been send to <?php echo $email;?>. Please follow the mail to verify your mail.
		<?php } else { ?>
			Sorry, email can't be send to <?php echo $email;?>. Please check your input again.
		<?php } ?>
	</p>
</div>