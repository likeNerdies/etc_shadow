$(document).ready(function () {
// update existing user
    $(document).on('click', '#btn_save', function (e) {
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
            var my_url ="/user/panel/my-data/personal";

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
    });

    $(document).on('click', '#btn_change_pw', function (e) {
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
            var my_url ="/user/panel/my-data/personal-password";

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
    });


    $(document).on('click', '#address_button_user', function (e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        console.log("hola")
        e.preventDefault();

        var formData = $('form').serialize();


        var type = $("#address_button_user").val();
        var my_url ="/user/panel/my-data/address";

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
    });
});