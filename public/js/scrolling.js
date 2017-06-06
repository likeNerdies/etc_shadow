/**
 * Created by Adria Viñas on 06/06/2017.
 */
$(document).ready(function () {
    $(window).scroll(function (e) {
        if($(this).scrollTop() >= 1000){
            $('.topTop').css('display','block');
        }else{
            $('.topTop').css('display','none');
        }
    });
});