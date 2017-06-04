$(document).ready(function () {

    $(".card").click(function (e) {
        var unlike = true;
        var url = '/user/panel/ingredients/unlike';
        if ( $( this ).hasClass( "unlike" ) ) { // If it has class 'unlike' and user clicks that ingredient, it'll become a "like".
            unlike = false;
            url = '/user/panel/ingredients/like';
        }
        var div = $(this);
        //$(this).toggleClass("ingredient-selected");
        var ingredient_id = $(this).attr('id');
        var _token = $('input[name="_token"]').val();
        var datas = {"ingredient_id": ingredient_id, _token: _token};
      //  console.log(datas);

        $.ajax({
            type: "POST",
            url: url,
            data: datas,
            dataType: 'json',
            success: function (data) {
               if (unlike) { // If unlike is true, it means that this ingredient does not have the 'unlike' class, so it can be "unliked".
                   /*if (div.hasClass( "like" )) {
                       div.removeClass('like');
                     //  console.log('unlike')
                   }
                   div.addClass('unlike')*/
                   div.removeClass("like").addClass("unlike");

               } else { // The ingredient was already marked as "unliked", now it will be as "liked".
                   /*if (div.hasClass( "unlike" )) {
                       div.removeClass('unlike');
                      // console.log('like')
                   }
                   div.addClass('like')*/
                  div.removeClass("unlike").addClass("like");
               }
            },
            error: function (data) {
              $('.error').addClass("alert alert-danger").html("There was an internal error");
            }
        });
    });
});
