/**
 * Created by borja on 15/03/2016.
 */
function social_sharing() {
    /* HOW TO USE (for more information > adobewordpress.com)

     You do not need to do any development. This script will collect your page title and url automatically.

     Remove comments from line 7 and 33. Write your Twitter username to line 9. At last go to line 32 and change div.border to body. Everything is ready. Enjoy! */

// if(/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {

    var twitterUser = '@adobewordpress'; /* Your Twitter Username */

// No need to change anything else :)

    var shareURL = window.location.href
    var shareTitle = document.getElementsByTagName("title")[0].innerHTML;
    var shareTweetdata = shareTitle + ' ' + twitterUser + ' ';

    var dataList = '<section class="socialShare">' +
        '<a class="facebook" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=' + shareURL + '"><i class="fa fa-facebook fa-2x"></i></a>' +
        '<a class="twitter" target="_blank" href="https://twitter.com/intent/tweet?text=' + shareTweetdata + '&amp;url=' + shareURL + '"><i class="fa fa-twitter fa-2x"></i></a>' +
        '<a class="google" target="_blank" href="https://plus.google.com/share?url=' + shareURL + '"><i class="fa fa-google-plus fa-2x"></i></a>' +
        //'<a class="linkedin" target="_blank" href="https://www.linkedin.com/shareArticle?mini=true&amp;url=' + shareURL + '&amp;title=' + shareTitle + '"><i class="fa fa-linkedin fa-2x"></i></a>' +
        '<a class="whatsapp" target="_blank" href="whatsapp://send?text=' + shareTitle + '%20' + shareURL + '"><i class="fa fa-whatsapp fa-2x"></i></a>' +
        '<a class="email" href="mailto:?subject=' + shareTitle + '&amp;body=' + shareURL + '"><i class="fa fa-envelope fa-2x"></i></a>' +
        '</section>';

    $('.social-sharing').prepend(dataList);
};
if (document.addEventListener){
    window.addEventListener('load',social_sharing,false);
} else {
    window.attachEvent('onload',social_sharing);
}
