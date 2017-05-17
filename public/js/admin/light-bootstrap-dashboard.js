$(document).ready(function () {
    //draggable log out
    $('.logout-wrapper').draggable({
        stop: function(event, ui) {
            // event.toElement is the element that was responsible
            // for triggering this event. The handle, in case of a draggable.
            $( event.originalEvent.target ).one('click', function(e){
                e.stopImmediatePropagation();
            } );
        }
    });

    //submit form
    $('.logout-btn').click(function (event) {
        $('.floating-form').submit();
        event.preventDefault();
    });

    $('.parent').children().on({
        mouseover:function () {
            if($(this).children('.child').is(':hidden')){
                $(this).css('background','rgba(255,255,255,.2)');
            }
            if($(this).children().length == 1){
                $(this).css('background','rgba(255,255,255,.2)');
            }
        },
        mouseleave:function () {
            $(this).css('background','');
        }
    });

    $('.parent').children().click(function(){
        $(this).css('background','');
    });

    $('.child').children().on({
        mouseover:function(){
            $(this).css('background','rgba(255,255,255,.2)');
        },
        mouseleave:function () {
            $(this).css('background','');
        }
    });

    //toggle responsive

    $('.toggle-element').click(function(){
        $('#sidebar').slideToggle("easeOutElastic");
    });


//toggle menu

    $('.parent').children().click(function(){
        $(this).children('.child').slideToggle('easeInOutExpo');

    }).children('.child').click(function (event) {
        event.stopPropagation();
    });
});






/*
$('.child').children().click(function(){
    //$(this).show();
});*/
