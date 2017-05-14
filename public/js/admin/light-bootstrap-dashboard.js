$('.parent').children().mouseover(function(){
    console.log($(this).children().length);
    if($(this).children('.child').is(':hidden')){
        $(this).css('background','rgba(255,255,255,.4)');
    }
    if($(this).children().length == 1){
        $(this).css('background','rgba(255,255,255,.4)');
    }

});

/*$('.parent').children().mouseleave(function(){
    $(this).css('background','');
});

$('.child').children().mouseover(function () {
    $(this).css('background','rgba(255,255,255,.4)');
});

$('.child').children().mouseleave(function () {
    $(this).css('background','');
});*/


//test

/* off-canvas sidebar toggle
$('[data-toggle=offcanvas]').click(function() {
    $('.row-offcanvas').toggleClass('active');
    $('span.collapse').toggleClass('in');
});

$('[data-toggle=offcanvas-in]').click(function() {
    $('.row-offcanvas').addClass('active');
    $('span.collapse').addClass('in');
});
 */
console.log($(window).width());
$(window).resize(function(){
    if($(window).width() < 766){
        $('.navButton').show();
        $('.toggle-element').show();
    }else{
        $('.navButton').hide();
        $('.toggle-element').hide();
    }
});


$('.toggle-element').click(function(){
    $('#sidebar').slideToggle("easeInOutExpo");
});
//toggle menu


/*$('.parent').children().click(function(){
    $(this).children('.child').slideToggle('easeInOutExpo');

}).children('.child').click(function (event) {
    event.stopPropagation();
});

$('.parent').children().click(function(){
    $(this).css('background','');
});

$('.child').children().click(function(){
    //$(this).show();
});
*/