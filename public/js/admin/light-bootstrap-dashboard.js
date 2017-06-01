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


    // Get the modal
    var modal = $('#myModalImage, #myModalImage2');
    // Get the image and insert it inside the modal - use its "alt" text as a caption
    var img = $('img[id^=myImg_],img[id^=myImgPr_]');

    var modalImg = $('[id^=img]');

    img.click(function () {
       modal.css('display','block');
       console.log($(this).attr('src').substring(16,17));
       modalImg.attr('src',$(this).attr('src'));
    });

    // Get the <span> element that closes the modal
    var span = $('.close');

    // When the user clicks on <span> (x), close the modal
    span.click(function () {
        modal.css('display','none');
    });



/*
$('.child').children().click(function(){
    //$(this).show();
});*/
