$(document).ready(function () {


    // Get the modal


    $(".img-thumbnail").click(function (e) {

        var modal = $('#myModalImage');
        // Get the image and insert it inside the modal - use its "alt" text as a caption
        var prodid = $(this).parent().parent().children(':first-child').text();
        $('#img01').attr('src', $(this).attr('src'));
        $('#img02').attr('src', '/products/' + prodid + '/image/1');
        $('#img03').attr('src', '/products/' + prodid + '/image/2');
        modal.css('display', 'block');
        // Get the <span> element that closes the modal
        var span = $('.close');
        // When the user clicks on <span> (x), close the modal
        span.click(function () {
            modal.css('display', 'none');
            $('#img01').attr('src', "");
            $('#img02').attr('src', "");
            $('#img03').attr('src', "");
        });
    });


});


/*
 $('.child').children().click(function(){
 //$(this).show();
 });*/
