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
	$("input[name='data[Reporter][email]']").on('change', function() {
		var email = $("input[name='data[Reporter][email]']").val();
		//console.log(email); 
		 //$.get( "reporters/is_mail_exist", function( email ) {
		//   $( ".result" ).html( data );
		//   alert( "Load was performed." );
		// });
		$.ajax(
		   {
		      type:'GET',
		      url:'reporters/is_mail_exist/' + email,
		      //data:"userId=12345&userName=test",
		      success: function(data){
		        //alert('successful');
		        //console.log(data.exist);
		        if (data.exist) {
		        	$("input[name='data[Reporter][email]']").parent().parent().addClass('has-error').addClass('has-danger');
		        	var html = "<ul class=\"list-unstyled\"><li>Whoops,  this mail already exist!</li></ul>";
		        	$("input[name='data[Reporter][email]']").parent().find("div.help-block").html(html);

		        	$('#signup_form').find('button[type=submit]').addClass('disabled');
		        } else {
		        	$("input[name='data[Reporter][email]']").parent().parent().removeClass('has-error').removeClass('has-danger');
		        	$("input[name='data[Reporter][email]']").parent().find("div.help-block").html('');

		        	$('#signup_form').find('button[type=submit]').removeAttr('disabled');	       
		        }
		      }
		   }
		);

		/*$('#signup_form div.form-group').each(function() {
			if($(this).hasClass('has-error')) {
				$('#signup_btn').addClass('disabled');
			}
		});*/
	});

	function validate_form () {
		$('#signup_form div.form-group').each(function() {
			if($(this).hasClass('has-error')) {
			    $('#signup_form').find('button[type=submit]').prop('disabled', true);
			}
		});
	}
	$('#signup_form input').keyup(validate_form);
	$('#signup_form input').change(validate_form);
});
	