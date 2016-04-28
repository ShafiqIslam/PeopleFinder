
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
});

// jQuery.fn.mouseIsOver = function () {
//     if($(this[0]).is(":hover"))
//     {
//         return true;
//     }
//     return false;
// }; 

// setInterval(function(){
//     var $sample = $('.admin_img_edit');
//     if($sample.mouseIsOver()) {
//        $('.fa').removeClass('display_none');
//     }
//     else {
//        $('.fa').addClass('display_none');
//     }
// }, 200);


// $('.admin_img_edit').hover(function(){
//     $('.fa').removeClass('display_none');
// });