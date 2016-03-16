<div class="container-fluid simple_msg_page">
		<?php
			if($success){ ?>
				<h2 class="success"> <?php echo "THANKS!!"; ?></h2>
			<?php }else{ ?>
				<h2 class="wrong"> <?php echo "OOPS!!"; ?></h2>
			<?php } ?>
	<hr>
		<?php if($success) { ?>
			<p class="success">Thanks for using our service. An e-mail has been send to <i><?php echo $email;?></i>. Please follow the mail to verify your mail.</p>
		<?php } else { ?>
			<p class="wrong">Sorry, email can't be send to <i><?php echo $email;?></i>. Please check your input again.</p>
		<?php } ?>
</div>