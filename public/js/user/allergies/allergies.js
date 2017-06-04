$(document).ready(function () {


    $('#search').on('keyup', function () {
        $value = $(this).val();
        if ($value != '') {
            $.ajax({
                type: 'get',
                url: '/search/allergy/user',
                data: {'allergy': $value},
                success: function (data) {
                    //  console.log(data)
                    $('.error').empty();
                        if (data.length == 0) {
                        $('#allergies_user').empty();
                        $('#allergies_user').append('<p class="text-center">No results found</p>')
                    } else {
                        $('#allergies_user').empty();
                        for (var i = 0; i < data.allergies.length; i++) {
                            //if (i != data.length - 1) {
                            var exists = false;
                            var clas = "hasnotAllergy";
                            var text="";
                            for (var j = 0; j < data.user_allergies.length && !exists; j++) {
                                if (data.allergies[i].id == data.user_allergies[j].id) {
                                    exists=true;
                                    clas="hasAllergy";
                                    text="Yes";
                                }
                            }
                            $('#allergies_user').append('<tr><td id="'+data.allergies[i].id +'">'+data.allergies[i].name+'</td><td class="'+clas+' allergy" style="cursor: pointer"><strong>'+text+'</strong></td></tr>');
                            // }
                        }

                    }
                   // console.log(data)
                },
                error: function (data) {
                   // console.log(data);
                    $('.error').addClass("alert alert-danger").html("There was an internal error");
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
