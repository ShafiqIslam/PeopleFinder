
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

    /*--------------Gender input solution for SAFARI Browser----------*/
    $(".btn_valid").addClass("disabled");
    $('.search_form').submit(function () {
        var $gender = $(this).find(".gender");
        if($gender.val()==""){
            $gender.addClass("gender_error");
            //$(this).parent().parent().parent().parent().find(".btn_valid").prop('disabled', true);
            return false;
        } else {
            $gender.removeClass("gender_error");
            $gender.parent().parent().parent().parent().find(".btn_valid").removeClass("disabled");
            //$(this).parent().parent().parent().parent().find(".btn_valid").removeAttr('disabled');
        }
        return true;
    });
    
    $(".gender").on("change", function () {
        if($(this).val()=="") {
            $(this).addClass("gender_error");
            $(this).parent().parent().parent().parent().find(".btn_valid").addClass("disabled");
            //$(this).parent().parent().parent().parent().find(".btn_valid").prop('disabled', true);
        } else {
            $(this).removeClass("gender_error");
            $(this).parent().parent().parent().parent().find(".btn_valid").removeClass("disabled");
            //$(this).parent().parent().parent().parent().find(".btn_valid").removeAttr('disabled');
        }
    });

    $('.search_form2').submit(function () {
        var $gender = $(this).find(".gender2");
        if($gender.val()==""){
            $gender.addClass("gender_error");
            $(this).parent().parent().parent().parent().find(".btn_valid").prop('disabled', true);
            return false;
        } else {
            $gender.removeClass("gender_error");
            //$gender.parent().parent().parent().parent().find(".btn_valid").removeClass("disabled");
            $(this).parent().parent().parent().parent().find(".btn_valid").removeAttr('disabled');
        }
        return true;
    });
    
    $(".gender2").on("change", function () {
        if($(this).val()=="") {
            $(this).addClass("gender_error");
            //$(this).parent().parent().parent().parent().find(".btn_valid").addClass("disabled");
            $(this).parent().parent().parent().parent().find(".btn_valid").prop('disabled', true);
        } else {
            $(this).removeClass("gender_error");
            //$(this).parent().parent().parent().parent().find(".btn_valid").removeClass("disabled");
            $(this).parent().parent().parent().parent().find(".btn_valid").removeAttr('disabled');
        }
    });

    /*--------------Language popup overlay Js-----------------*/

    $(document).ready(function () {
        $('#basic').popup({
            transition: 'all 0.3s',
            //scrolllock: true
        });
    });

});


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

					//$('#signup_form').find('button[type=submit]').prop('disabled', true);
                    validate_form();
				} else {
					$("#email_db_check").parent().parent().removeClass('has-error').removeClass('has-danger');
					$("#email_db_check").parent().find("div.help-block").html('');

					//$('#signup_form').find('button[type=submit]').removeAttr('disabled');
                    validate_form();        
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
			}
		});

        if($('#signup_form div.form-group').find('.gender2').val()=="") {
            error = 1;
        }

		if(!error) {
			$('#signup_form').find('button[type=submit]').removeAttr('disabled');
		} else {
            $('#signup_form').find('button[type=submit]').prop('disabled', true);
        }
	}


/*=========Bootstrap input file upload plaguin Js Code here================*/
	/*--------------Images search Js Code is Here-------------------*/
	$("#search_img").fileinput({
        previewFileIcon: '<i class="fa fa-file"></i>',
        allowedPreviewTypes: ['image'], // allow only preview of image files
        uploadAsync : false,
        maxFileSize: 100,
        maxFileCount : 3,
        overwriteInitial : false,
    });

    /*--------------Advance Images search Js Code is Here-------------------*/
	$("#adv_search_img").fileinput({
        previewFileIcon: '<i class="fa fa-file"></i>',
        allowedPreviewTypes: ['image'], // allow only preview of image files
        uploadAsync : false,
        allowedFileExtensions : ['jpg', 'png','gif'],
        overwriteInitial: false,
        maxFileSize: 1000,
        maxFileCount:3,
        //allowedFileTypes: ['image', 'video', 'flash'],
        slugCallback: function(filename) {
            return filename.replace('(', '_').replace(']', '_');
        }
    });

    /*$("#detail_search").fileinput({
        previewFileIcon: '<i class="fa fa-file"></i>',
        allowedPreviewTypes: ['image'], // allow only preview of image files
        uploadAsync : false,
        maxFileSize: 100,
        maxFileCount : 3,
        overwriteInitial : false,
    });*/
});



/*-------------captcha validation-------------*/
$(document).ready(function() {
    // Generate a simple captcha
    function randomNumber(min, max) {
        return Math.floor(Math.random() * (max - min + 1) + min);
    };
    $('#captchaOperation').html([randomNumber(1, 100), '+', randomNumber(1, 200), '='].join(' '));

    $('#defaultForm').bootstrapValidator({
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
                        message: 'Captcha does not match!',
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
        $('#defaultForm').bootstrapValidator('validate');
    });

    $('#resetBtn').click(function() {
        $('#defaultForm').data('bootstrapValidator').resetForm(true);
    });
});


/*----------------JS for Tool Tip---------------*/
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});


/*---------Page reload for map reload---------*/

$('#map_reload').on('shown.bs.tab', function () {
    google.maps.event.trigger(window, 'resize', {});
});



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
            height: 250,
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


/*------------- Posting a message---------*/


$(document).ready(function(){
    $("#sending_message").submit(function(e) {
        e.preventDefault();

        var name = $(".name").val(),
        email = $(".email").val(),
        message = $(".message").val();
        var data = $('#sending_message').serializeObject();
        url = $('#sending_message').attr('action');
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
                $('#reply_msg').show();
                var txt = "<br><h2>"+response.msg+"</h2>";

                if (response.success) {
                    $('#reply_msg > p').addClass('check').html(txt);
                    $("#sending_message").trigger('reset');
                } else {
                     $('#reply_msg > p').addClass('msr_not_sent').html(txt);
                };
                
                $('.msg_loading_bg').hide();
                $('#reply_msg').delay(3000).fadeOut(1000);

            }, 
            error: function(response) {
                $('#reply_msg').show();
                var txt = "<br><h2>Something bad happened!!! Please, try again.</h2>";
                $('#reply_msg > p').addClass('msr_not_sent').html(txt);
                
                $('.msg_loading_bg').hide();
                $('#reply_msg').delay(3000).fadeOut(1000);    
            }
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

/*----------------date Picker--------------------*/

  $(function() {
    $( "#datepicker" ).datepicker({
        changeMonth: true,
        changeYear: true,
        yearRange: '1930:c',
        dateFormat: "yy-mm-dd",
    });
  });