$(document).ready(function () {
// update existing user
    $(document).on('click', '#btn_save', function (e) {
        if (valdateUserData()) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            e.preventDefault();


            var formData = {
                dni: $('#dni').val(),
                name: $('#name').val(),
                first_surname: $('#first_surname').val(),
                second_surname: $('#second_surname').val(),
                email: $('#email').val(),
                phone_number: $('#phone_number').val()
            }

            //used to determine the http verb to use [add=POST], [update=PUT];

            var type = "PUT"; //for creating new resource
            var my_url = "/user/panel/my-data/personal";

            $.ajax({
                type: type,
                url: my_url,
                data: formData,
                dataType: 'json',
                success: function (data) { // success:
                    $('#btn_save').replaceWith('<button class="btn btn-success float-right text-center disabled"><i class="fa fa-check" aria-hidden="true"></i></button>');
                    e.stopPropagation();
                    console.log(data);
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });



        }
    });

    $(document).on('click', '#btn_change_pw', function (e) {
        if (validateUserPWReset()) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            e.preventDefault();


            var formData = {
                old_password: $('#old_password').val(),
                password: $('#new_password').val(),
                password_confirmation: $('#password_confirmation').val(),
            }
            console.log(formData)
            //used to determine the http verb to use [add=POST], [update=PUT]

            var type = "POST"; //for creating new resource
            var my_url = "/user/panel/my-data/personal-password";

            $.ajax({
                type: type,
                url: my_url,
                data: formData,
                dataType: 'json',
                success: function (data) { // success:
                    console.log(data);


                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
        }
    });


    $(document).on('click', '#address_button_user', function (e) {
        if (validateAddress()) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            console.log("hola")
            e.preventDefault();

            var formData = $('form').serialize();


            var type = $("#address_button_user").val();
            var my_url = "/user/panel/my-data/address";

            $.ajax({
                type: type,
                url: my_url,
                data: formData,
                dataType: 'json',
                success: function (data) { // success:
                    console.log(data);


                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
        }
    });
});

function valdateUserData() {
    var retorn = true;
    if (!validateName($('#name').val())) {
        $('#name').css('border-color', "#a94442");
        retorn = false;
    } else {
        $('#name').css('border-color', "#5cb85c");
    }
    if ($('#dni').val()) {
        if (!validateDniNif($('#dni').val())) {
            $('#dni').css('border-color', "#a94442");
            retorn = false;
        } else {
            $('#dni').css('border-color', "#5cb85c");
        }
    }
    if (!validateName($('#first_surname').val())) {
        $('#first_surname').css('border-color', "#a94442");
        retorn = false;
    } else {
        $('#first_surname').css('border-color', "#5cb85c");
    }

    if ($('#second_surname').val()) {
        if (!validateName($('#second_surname').val())) {
            $('#second_surname').css('border-color', "#a94442");
            retorn = false;
        } else {
            $('#second_surname').css('border-color', "#5cb85c");
        }
    }
    if (!validateEmail($('#email').val())) {
        $('#email').css('border-color', "#a94442");
        retorn = false;
    } else {
        $('#email').css('border-color', "#5cb85c");
    }
    if ($('#phone_number').val()) {
        if (!validatePhone($('#phone_number').val())) {
            $('#phone_number').css('border-color', "#a94442");
            retorn = false;
        } else {
            $('#phone_number').css('border-color', "#5cb85c");
        }
    }
    console.log(retorn);
    return retorn;
}

function validateUserPWReset() {
    var retorn = true;
    if (!validatePassword($('#old_password').val())) {
        $('#old_password').css('border-color', "#a94442");
        retorn = false;
    } else {
        $('#old_password').css('border-color', "#5cb85c");
    }

    if (!validatePassword($('#new_password').val())) {
        $('#new_password').css('border-color', "#a94442");
        retorn = false;
    } else {
        $('#new_password').css('border-color', "#5cb85c");
    }

    if (!validatePassword($('#password_confirmation').val())) {
        $('#password_confirmation').css('border-color', "#a94442");
        retorn = false;
    } else {
        $('#password_confirmation').css('border-color', "#5cb85c");
    }

    if ($('#password_confirmation').val()) {
        if ($('#password_confirmation').val() != $('#new_password').val()) {
            retorn = false;
            $('#password_confirmation').css('border-color', "#a94442");
            $('#new_password').css('border-color', "#a94442");
            //todo mensaje password no spn igualges
        } else {
            $('#password_confirmation').css('border-color', "#5cb85c");
            $('#new_password').css('border-color', "#5cb85c");
        }
    }
    console.log(retorn);
    return retorn;
}
function validateAddress() {
    var retorn = true;
    if (!validateName($('#street').val())) {
        $('#street').css('border-color', "#a94442");
        retorn = false;
    } else {
        $('#street').css('border-color', "#5cb85c");
    }

    if (!$.isNumeric($('#building_number').val())) {
        $('#building_number').css('border-color', "#a94442");
        retorn = false;
    } else {
        $('#building_number').css('border-color', "#5cb85c");
    }

    if ($('#building_block').val()) {
        if (!$('#building_block').val()) {
            $('#building_block').css('border-color', "#a94442");
            retorn = false;
        } else {
            $('#building_block').css('border-color', "#5cb85c");
        }
    }
    if ($('#floor').val()) {
        if (!$.isNumeric($('#floor').val())) {
            $('#floor').css('border-color', "#a94442");
            retorn = false;
        } else {
            $('#floor').css('border-color', "#5cb85c");
        }
    }
    if ($('#door').val()) {
        if (!$('#door').val()) {
            $('#door').css('border-color', "#a94442");
            retorn = false;
        } else {
            $('#door').css('border-color', "#5cb85c");
        }
    }

    if (!validateCodePostal($('#postal_code').val())) {
        $('#postal_code').css('border-color', "#a94442");
        retorn = false;
    } else {
        $('#postal_code').css('border-color', "#5cb85c");
    }

    if (!validateName($('#town').val())) {
        $('#town').css('border-color', "#a94442");
        retorn = false;
    } else {
        $('#town').css('border-color', "#5cb85c");
    }


    if (!validateName($('#province').val())) {
        $('#province').css('border-color', "#a94442");
        retorn = false;
    } else {
        $('#province').css('border-color', "#5cb85c");
    }

    if (!validateName($('#country').val())) {
        $('#country').css('border-color', "#a94442");
        retorn = false;
    } else {
        $('#country').css('border-color', "#5cb85c");
    }

    console.log(retorn)
    return retorn;
}
