<div class="container-fluid simple_msg_page">
		<?php
			if($success){ ?>
				<h2 class="success"> <?php echo __("THANKS!!"); ?></h2>
			<?php }else{ ?>
				<h2 class="wrong"> <?php echo __("OOPS!!"); ?></h2>
			<?php } ?>
	<hr>
		<?php if($success) { ?>
			<p class="success"><?php echo __("Thanks for using our service. An e-mail has been send to ");?><i><?php echo $email;?></i>. <?php echo __("Please follow the mail to verify your mail.");?></p>
		<?php } else { ?>
			<p class="wrong"><?php echo __("Sorry, email can't be send to");?> <i><?php echo $email;?></i>. <?php echo __("Please check your input again.");?></p>
		<?php } ?>
</div>