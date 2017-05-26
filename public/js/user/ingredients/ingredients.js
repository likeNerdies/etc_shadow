$(document).ready(function () {

    $(".card").click(function (e) {

        $(this).toggleClass("ingredient-selected");

        var ingredient_id = $(this).attr('id');
        var _token = $('input[name="_token"]').val();
        var datas = {"ingredient_id": ingredient_id, _token: _token};
        console.log(datas);

        $.ajax({
            type: "POST",
            url: '/user/panel/ingredients/unlike',
            data: datas,
            dataType: 'json',
            success: function (data) {
                $(this).css(" border", "1px solid #bf2c1b");
            },
            error: function (xhr, ajaxOptions, thrownError) {
                console.log(xhr.status);
                console.log(xhr.responseText);
                console.log(thrownError);
            }
        });
    });
});
