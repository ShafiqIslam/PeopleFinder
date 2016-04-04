/*-----Window Loader Function-----*/
$(document).ready(function(){
    $(window).load(function(){
        $(".loader").fadeOut("slow");
    })
});

$(document).ready(function(){
    $('.btn_search').click(function(){
        $(".loader").fadeIn("slow");
    })
});


/*------------Menu bar Drop-down-------------*/
/*
$(document).ready(function(){
	$('ul.nav li.dropdown').hover(function() {
	  $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);
	  $(this).find('.dropdown-menu').addClass(".hover-color");
	}, function() {
	  $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);
	});
});
*/

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

    /*-------------Login popup validation--------------*/


	/*--------------Images search Js Code is Here-------------------*/
	$("#search_img").fileinput({
        previewFileIcon: '<i class="fa fa-file"></i>',
        allowedPreviewTypes: ['image'], // allow only preview of image files
        uploadAsync : false,
        maxFileCount : 1,
        overwriteInitial : false,
    });

    /*--------------Advance Images search Js Code is Here-------------------*/
	$("#adv_search_img").fileinput({
        previewFileIcon: '<i class="fa fa-file"></i>',
        allowedPreviewTypes: ['image'], // allow only preview of image files
        uploadAsync : false,
        maxFileCount : 3,
        overwriteInitial : false,
    });
});



/*-------------captcha validation-------------*/
$(document).ready(function() {
    // Generate a simple captcha
    function randomNumber(min, max) {
        return Math.floor(Math.random() * (max - min + 1) + min);
    };
    $('#captchaOperation').html([randomNumber(1, 100), '+', randomNumber(1, 200), '='].join(' '));

    $('#captcha').bootstrapValidator({
//        live: 'disabled',
        message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            captcha: {
                validators: {
                    callback: {
                        message: 'Invalid captcha answer!',
                        callback: function(value, validator) {
                            var items = $('#captchaOperation').html().split(' '), sum = parseInt(items[0]) + parseInt(items[2]);
                            return value == sum;
                        }
                    }
                }
            }
        }
    });

    // Validate the form manually
    $('#validateBtn').click(function() {
        $('#captcha').bootstrapValidator('validate');
    });

    $('#resetBtn').click(function() {
        $('#captcha').data('bootstrapValidator').resetForm(true);
    });
});


/*----------------JS for Tool Tip---------------*/
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});


/*-------captcha Show-----*/

$(document).ready(function(){
    $('.btn_abuse').click(function(){
       // $('.captcha').removeClass('captcha_hide').addClass('catpcha_show');

        //this prevent for first time progression.
        $(this).find('a').click();
        event.stopPropagation();
        return false;
    })
    
});


/*------------Popover of report abuse----------*/

$(document).ready(function(){
  $('.danger').popover({ 
    html : true,
    placement: 'bottom',
    content: function() {
      return $('#popover_content_wrapper').html();
    }
  });
});

/*---------------Popover of Images---------*/
/*
$(document).ready(function(){
  $('.img_popover_1').popover({ 
    html : true,
    placement: 'bottom',
    trigger: 'click hover',
    content: function() {
      return $('#img_popover_1').html();
    }
  });
});

$(document).ready(function(){
  $('.img_popover_2').popover({ 
    html : true,
    placement: 'bottom',
    trigger: 'click hover',
    content: function() {
      return $('#img_popover_2').html();
    }
  });
});

$(document).ready(function(){
  $('.img_popover_3').popover({ 
    html : true,
    placement: 'bottom',
    trigger: 'click hover',
    content: function() {
      return $('#img_popover_3').html();
    }
  });
});
*/
/*---------Page reload for map reload---------*/

$('#map_reload').on('shown.bs.tab', function () {
    google.maps.event.trigger(window, 'resize', {});
});


/*
$('#pic_reload').on('shown.bs.tab', function () {
    $('#photos').event.trigger(window, 'resize', {});
});
*/

/*------ Keep current Tab page active after reloading------*/
$('a[data-toggle="tab"]').click(function (e) {
    e.preventDefault();
    $(this).tab('show');
});

$('a[data-toggle="tab"]').on("shown.bs.tab", function (e) {
    var id = $(e.target).attr("href");
    localStorage.setItem('selectedTab', id)
});

var selectedTab = localStorage.getItem('selectedTab');
if (selectedTab != null) {
    $('a[data-toggle="tab"][href="' + selectedTab + '"]').tab('show');
};

$(document).ready(function(){
    $('#name_tab').click(function(){
        window.location.reload()
    })
})

$(document).ready(function(){
    $('#pic_reload').click(function(){
        window.location.reload()
    })
});

/*------------Scrolling log--------------*/
$(document).ready(function(){
    $('#log_scroll').slimScroll({
            railVisible: true,
            //railColor: '#f00'
            height: 150,
    });
});



$('.image-popup-no-margins').magnificPopup({
        type: 'image',
        closeOnContentClick: true,
        closeBtnInside: false,
        fixedContentPos: true,
        mainClass: 'mfp-no-margins mfp-with-zoom', // class to remove default margin from left and right side
        image: {
            verticalFit: true
        },
        zoom: {
            enabled: true,
            duration: 300 // don't foget to change the duration also in CSS
        }
    });
