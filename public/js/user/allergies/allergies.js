$(document).ready(function () {

    $('.allergy').click(function () {

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
        console.log(datas);

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
                    td.html("<strong>No</strong>");

                } else {
                    if (td.hasClass("hasnotAllergy")) {
                        td.removeClass('hasnotAllergy');
                    }
                    td.addClass('hasAllergies')
                    td.html("<strong>Yes</strong>");
                }
            },
            error: function (data) {
                //todo
            }

        });

    });

});
