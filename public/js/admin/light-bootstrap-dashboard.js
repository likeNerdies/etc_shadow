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

$('.toggle-element').click(function(){
    $('#sidebar').slideToggle("easeInOutExpo");
});



//toggle menu

$('.parent').children().click(function(){
    $(this).children('.child').slideToggle('easeInOutExpo');

}).children('.child').click(function (event) {
    event.stopPropagation();
});


/*
$('.child').children().click(function(){
    //$(this).show();
});*/
