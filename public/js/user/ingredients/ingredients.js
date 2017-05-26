$(document).ready(function () {

    $(".card").click(function (e) {

        $(this).toggleClass("ingredient-selected");

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        //e.preventDefault();

        var ingredient_id = $(this).attr('id');
        //selected: $(this).hasClass('ingredient-selected')

        var formData = {
            ingredient_id: ingredient_id
        };
        console.log(formData);

        $.ajax({
            type: "POST",
            url: '/user/panel/ingredients/like',
            data: {'ingredient_id':1},
            dataType: 'json',
            success: function (data) {
                //$(this).css(" border", "1px solid #bf2c1b");
            },
            error: function (xhr, ajaxOptions, thrownError) {
                console.log(xhr.status);
                console.log(xhr.responseText);
                console.log(thrownError);
            }
        });

        /*   $.post(
         '/user/panel/ingredients/unlike',{"_token":$('meta[name="csrf-token"]').attr('content'),"ingredient_id":ingredient_id},
         function( data, textStatus, jQxhr ){
         $('#response pre').html( data );
         }
         //'text'
         )
         .fail(function( jqXhr, textStatus, errorThrown ){
         console.log( errorThrown );
         });*/

    });
});
