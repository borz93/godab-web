/**
 * Created by borja on 03/03/2016.
 */
$.material.init();
$(window).resize(function() {
    didResize = true;
});
setInterval(function() {
    if(didResize) {
        didResize = false;
        bumpIt();
    }
}, 250);
var bumpIt = function() {
        $('body').css('margin-bottom', $('.footer').height());
    },
    didResize = false;



$(function(){
    if (document.getElementById('scroll-top-wrapper')) {
         $(document).on( 'scroll', function(){
            if ($(window).scrollTop() > 500) {
                $('.scroll-top-wrapper').addClass('show');
            } else {
                $('.scroll-top-wrapper').removeClass('show');
            }
        });
        $('.scroll-top-wrapper').on('click', scrollToTop);
    }
});
function scrollToTop() {
    verticalOffset = typeof(verticalOffset) != 'undefined' ? verticalOffset : 0;
    element = $('body');
    offset = element.offset();
    offsetTop = offset.top;
    $('html, body').animate({scrollTop: offsetTop}, 500, 'linear');
}


bumpIt();
