/*-----Window Loader Function-----*/
$(document).ready(function(){
    $(window).load(function(){
        $(".loader").fadeOut("slow");
    });

    $('.btn_search').click(function(){
        if (!$(this).hasClass('disabled')) {
          $(".loader").fadeIn("slow");  
        }
    });

    $('.flash_close_btn').click(function(){
        $(".flash_message").fadeOut("slow");
    });
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
            //width:600,
    });
});



$('.image-popup-no-margins').magnificPopup({
        type: 'image',
        closeOnContentClick: true,
        closeBtnInside: true,
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


/*

    // You can also share to pinterest and tumblr:

    var options = {

        // Pinterest requires a image to be "pinned"

        pinterest: {
            media: 'http://example.com/image.jpg',
            description: 'My lovely picture'
        },

        // Tumblr takes a name and a description

        tumblr: {
            name: 'jQuery Social Buttons Plugin!',
            description: 'There is a new article on tutorialzine.com page! Check out!'
        }
    };

*/



/*------------- Posting a message---------*/


$(document).ready(function(){
    $("#sending_message").submit(function(e) {
        e.preventDefault();

        //$('#send_btn').html("Sending... Please Wait.");

        var name = $(".name").val(),
        email = $(".email").val(),
        message = $(".message").val();
        var data = $('#sending_message').serializeObject();
        //console.log(data);
        url = $('#sending_message').attr('action');
        //console.log(url);
        //show the loading sign
        if (!$(this).hasClass('disabled')) {
           $('.msg_loading_bg').show(); 
        }
       

        $.ajax({
            type:'POST',
            url:url,
            data: data,
            dataType: 'json',
            cache: false,
            success: function(response){
                //$('#send_btn').hide();
                //if (response.success == true) {
                    $('#reply_msg').show();
                    $('#reply_msg > p').addClass('check').append("<br><h2>Message Sent!</h2>");
                    //.addClass('fa-check-square').addClass('fa-5x');
                //} //else {
                   // $('#reply_msg').html(response.msg);
                //}
                
               // $('#reply_msg').html("Send.");
                $('.msg_loading_bg').hide();
                //$('#reply_msg').fadeOut(5000);
                $('#reply_msg').delay(3000).fadeOut(1000);

            }, 
            /*failer: function(response){
                $('#sending_message').find('#reply_msg').html(response.msg);
                $('.loader').hide();
            },*/
        });
        
    });
    return false;
});

$.fn.serializeObject = function () {
    var o = {};
    var a = this.serializeArray();
    $.each(a, function () {
        if (o[this.name] !== undefined) {
            if (!o[this.name].push) {
                o[this.name] = [o[this.name]];
            }
            o[this.name].push(this.value || '');
        } else {
            o[this.name] = this.value || '';
        }
    });
    return o;
};

