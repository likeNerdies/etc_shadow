/**
 * Created by Adria Viñas on 06/06/2017.
 */
$(document).ready(function () {
    $(window).scroll(function (e) {
        if($(this).scrollTop() >= 1000){
            $('.topTop').css({'visibility':'visible','opacity':'1'});
        }else{
            $('.topTop').css({'visibility':'hidden','opacity':'0'});
        }
    });

    $(document).on('click', 'a.topTop', function (event) {
        var $anchor = $(this);
        // console.log("anchor: " + $anchor);
        $('html, body').stop().animate({
            scrollTop: ($($anchor.attr('href')).offset().top - 50)
        }, 1300, 'easeInOutExpo');
        event.preventDefault();
    });
});


