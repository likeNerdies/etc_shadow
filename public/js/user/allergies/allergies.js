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


    $(document).on('click', '.allergy', function (e) {
  //  $('.allergy').click(function () {

        var hasAllergies = true;
        var url = '/user/panel/allergies/doesnt';
        if ($(this).hasClass("hasnotAllergy")) {
            hasAllergies = false;
            url = '/user/panel/allergies/has';
        }
        var td = $(this);
        // $(this).toggleClass("ingredient-selected");
        var allergy_id = $(this).prev().attr('id');
        var _token = $('input[name="_token"]').val();
        var datas = {"allergy_id": allergy_id, _token: _token};
        //console.log(datas);

        $.ajax({
            type: "POST",
            url: url,
            data: datas,
            dataType: 'json',
            success: function (data) {
                if (hasAllergies) {
                    if (td.hasClass("hasAllergies")) {
                        td.removeClass('hasAllergies');
                    }

                    td.addClass('hasnotAllergy')
                    td.html("");

                } else {
                    if (td.hasClass("hasnotAllergy")) {
                        td.removeClass('hasnotAllergy');
                    }
                    td.addClass('hasAllergies')
                    td.html("<strong>Yes</strong>");
                }
            },
            error: function (data) {
             // console.log('Error:', data);
              $('.error').addClass("alert alert-danger").html("There was an internal error");
            }

        });

    });

});
