$(document).ready(function () {

    $('#search').on('keyup', function () {
        $value = $(this).val();
        if ($value != '') {
            $.ajax({
                type: 'get',
                url: '/search/ingredient/user',
                data: {'ingredient': $value},
                success: function (data) {
                    //  console.log(data)
                    if (data.ingredients.length == 0) {
                        $('#ingredients_user').empty();
                        $('#ingredients_user').append('<p class="text-center">No results found</p>')
                    } else {
                        $('#ingredients_user').empty();
                        for (var i = 0; i < data.ingredients.length; i++) {
                            //if (i != data.length - 1) {
                                var exists = false;
                                var clas = "like";
                                for (var j = 0; j < data.user_ingredients.length && !exists; j++) {
                                    if (data.ingredients[i].id == data.user_ingredients[j].id) {
                                        exists = true;
                                        clas = "unlike";
                                    }
                                }
                                var ingredient = '<div class="card-wrapper m-1">';
                                ingredient += '<div id="' +data.ingredients[i].id + '" class="card mx-auto ' + clas + '">';
                                ingredient += ' <img src="/user/panel/ingredients/' + data.ingredients[i].id + '/image" class="rounded card-img-top ingredient-img img-responsive mx-auto py-3" alt="' + data.ingredients[i].name + '">';
                                ingredient += '<div class="card-footer">';
                                ingredient += '<small>' + data.ingredients[i].name + '</small>';
                                ingredient += ' </div> </div> </div>';

                                $('#ingredients_user').append(ingredient);
                           // }
                        }

                    }
                    console.log(data)
                },
                error: function (data) {
                    console.log(data);
                }
            });
        } else {
            //todo
        }
    });

    $(document).on('click', '.card', function (e) {
   // $(".card").click(function (e) {
        var unlike = true;
        var url = '/user/panel/ingredients/unlike';
        if ($(this).hasClass("unlike")) { // If it has class 'unlike' and user clicks that ingredient, it'll become a "like".
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
