/*--------------Menu Bar Shrink Js----------*/
$(document).on("scroll",function(){
    if($(document).scrollTop()>100){
        $("header").removeClass("large").addClass("small");
    } else{
        $("header").removeClass("small").addClass("large");
    }
});


/*------------AJAX DATA CALLING check email exist in database-------*/
$(document).ready(function(){
	$("#email_db_check").on('change', function() {
		var email = $("#email_db_check").val();
		$.ajax({
			type:'GET',
			url:'reporters/is_mail_exist/' + email,
			success: function(data){
				if (data.exist) {
					$("#email_db_check").parent().parent().addClass('has-error').addClass('has-danger');
					var html = "<ul class=\"list-unstyled\"><li>Whoops, this mail already exist!</li></ul>";
					$("#email_db_check").parent().find("div.help-block").html(html);

					$('#signup_form').find('button[type=submit]').prop('disabled', true);
				} else {
					$("#email_db_check").parent().parent().removeClass('has-error').removeClass('has-danger');
					$("#email_db_check").parent().find("div.help-block").html('');

					$('#signup_form').find('button[type=submit]').removeAttr('disabled');	       
				}
			}
	    });
	});

	$('#signup_form input').keyup(validate_form);
	$('#signup_form input').change(validate_form);


	function validate_form () {
		var error = 0;
		$('#signup_form div.form-group').each(function() {
			if($(this).hasClass('has-error')) {
				error = 1;
			    $('#signup_form').find('button[type=submit]').prop('disabled', true);
			}
		});

		if(!error) {
			$('#signup_form').find('button[type=submit]').removeAttr('disabled');
		}
	}
});
