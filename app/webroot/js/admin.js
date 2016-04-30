
$(document).ready(function(){
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

    //gender validation

    $('.search_form').submit(function () {
        if($(".gender").val()==""){
            $(".gender").addClass("gender_error");
            return false;
        }else{
            $(".gender").removeClass("gender_error");
            $(".btn_valid").removeClass("disabled")
        }
        return true;
    })
    $(".gender").on("change", function () {
        $(".gender").removeClass("gender_error");
        $(".btn_valid").removeClass("disabled")
    });


});

