$(document).ready(function() {
  $('.allergy_yesno').click(function() {
    $(this).toggleClass("yes");
    $('.yes').html("Yes");
    $(this).not(".yes").html("");
  });





});
