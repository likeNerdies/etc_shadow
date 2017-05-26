$(document).ready(function () {

    $(".card").click(function (e) {
        var unlike=true;
        var url='/user/panel/ingredients/unlike';
        if ( $( this ).hasClass( "unlike" ) ) {
            unlike=false;
            url='/user/panel/ingredients/like';
        }
        var div=$(this );
        $(this).toggleClass("ingredient-selected");
        var ingredient_id = $(this).attr('id');
        var _token = $('input[name="_token"]').val();
        var datas = {"ingredient_id": ingredient_id, _token: _token};
        console.log(datas);

        $.ajax({
            type: "POST",
            url:url ,
            data: datas,
            dataType: 'json',
            success: function (data) {
               if(unlike){
                   if (div.hasClass( "like" )){
                       div.removeClass('like');
                       console.log('unlike')
                   }
                   div.addClass('unlike')

               }else{
                   if (div.hasClass( "unlike" )){
                       div.removeClass('unlike');
                       console.log('like')
                   }
                   div.addClass('like')
               }
            },
            error: function (data) {
                //todo
            }
        });
    });
});
