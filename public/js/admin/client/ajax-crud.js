$(document).ready(function () {

    var url = "/admin/clients";

    //display modal form for user editing
    $(document).on('click', '.open-modal', function (e) {
        // $('.open-modal').click(function() {
        $('#ajaxerror').empty();
        $('#ajaxerror').removeClass("alert alert-danger");
        $('input').removeAttr("style");
        var client_id = $(this).val();
        console.log("client_id edit: " + client_id);

        $.get(url + '/' + client_id, function (data) {
            //success data
            $('#id').val(data.client.id);
            $('#dni').val(data.client.dni);
            $('#name').val(data.client.name);
            $('#first_surname').val(data.client.first_surname);
            $('#second_surname').val(data.client.second_surname);
            $('#email').val(data.client.email);
            $('#phone_number').val(data.phone_number);
            //$('#plan').append("<option value=''>No plan</option>");
            console.log($('select#plan option').length)
            if (data.plans.length != 0) {//adding initial options

                if ($('select#plan option').length == 1) {
                    for (i = 0; i < data.plans.length; i++) {
                        if (data.plan != null) {
                            if (data.plan.id == data.plans[i].id) {
                                $('#plan').append("<option selected='selected' value='" + data.plans[i].id + "'>" + data.plans[i].name + "</option>");
                            } else {
                                $('#plan').append("<option value='" + data.plans[i].id + "'>" + data.plans[i].name + "</option>");
                            }
                        } else {
                            $('#plan').append("<option value='" + data.plans[i].id + "'>" + data.plans[i].name + "</option>");
                        }

                    }
                } else {
                    if (data.plan != null) {
                        $("#plan").val(data.plan.id);
                    }
                }


            }

            $('#btn-save').val("update");

            $('#myModal').modal('show');
        })
    });

    /* //display modal form for creating new user
     $(document).on('click', '#btn-add', function (e) {
     // $('#btn-add').click(function() {
     $('#btn-save').val("add");
     $('#formCategories').trigger("reset");
     $('#myModal').modal('show');
     });
     */
    //delete client and remove it from list
    $(document).on('click', '.delete-client', function (e) {
        // $('.delete-client').click(function() {
        var client = $(this).val();
        console.log("client: " + client);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "DELETE",
            url: url + '/' + client,
            success: function (data) {
                console.log(data);
                $("#client" + client).remove();
                $('#ajaxerror').empty();
                $('#ajaxerror').removeClass("alert alert-danger");
                successMessage();
            },
            error: function (data) {
                //console.log('Error:', data);
                $('.error').addClass("alert alert-danger");
                $('.error').html("<p>There was an internal error.</p>");
            }
        });
    });

    //create new client / update existing client
    $(document).on('click', '#btn-save', function (e) {
        // $("#btn-save").click(function (e) {
        if (valdateAllergyForm()) {
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
                password: $('#password').val(),
                password_confirmation: $('#password_confirmation').val(),
                phone_number: $('#phone_number').val(),
                plan: $('#plan').val(),
            }

            //used to determine the http verb to use [add=POST], [update=PUT]
            var state = $('#btn-save').val();

            var type = "POST"; //for creating new resource
            var client_id = $('#id').val();
            var my_url = url;

            if (state == "update") {
                console.log("update: " + client_id);
                type = "PUT"; //for updating existing resource
                my_url += '/' + client_id;
            }

            console.log(formData);

            $.ajax({
                type: type,
                url: my_url,
                data: formData,
                dataType: 'json',
                success: function (data) { // success:
                    console.log(data);
                    var client = '<tr id="client' + data.client.id + '"><td id="id">' + data.client.id + '</td>';
                    if (data.client.dni != null) {
                        client += '<td>' + data.client.dni + '</td>';
                    } else {
                        client += '<td></td>';
                    }
                    client += '<td>' + data.client.name + '</td><td>' + data.client.first_surname + '</td><td>' + data.client.email + '</td>';
                    if (data.client.phone_number != null) {
                        client += '<td>' + data.client.phone_number + '</td>';
                    } else {
                        client += '<td></td>';
                    }
                    if (data.plan != null) {
                        client += '<td>Plan : ' + data.plan.name + '</td>';
                    } else {
                        client += '<td>Without plan</td>';
                    }

                    client += '<td><button class="btn btn-warning btn-xs btn-detail open-modal" value="' + data.client.id + '"><span class="hidden-sm-down">Edit</span><i class="fa fa-pencil hidden-md-up" aria-hidden="true"></i></button>';

                    client += '<button class="btn btn-danger btn-xs btn-delete delete-client" value="' + data.client.id + '"><span class="hidden-sm-down">Delete</span><i class="fa fa-trash hidden-md-up" aria-hidden="true"></i></button></td></tr>';

                    if (state == "add") { //if user added a new record
                        $('#client-list').append(client);
                    } else { //if user updated an existing record

                        $("#client" + client_id).replaceWith(client);
                    }

                    $('#formClients').trigger("reset");
                    $('#ajaxerror').empty();
                    $('#ajaxerror').removeClass("alert alert-danger");
                    $('#myModal').modal("hide");
                    successMessage();
                },
                error: function (data) {
                    //console.log('Error:', data);
                    $('#ajaxerror').addClass("alert alert-danger");
                    var msg;

                    if (data.status == 422) {
                        msg = "<ul>";
                        for (var key in data.responseJSON) {
                            msg += "<li>" + data.responseJSON[key] + "</li>";
                        }
                        msg += "</ul>";
                    } else {
                        msg = "<p>There was an internal error. Contact with the admin.</p>";
                    }
                    $('#ajaxerror').html(msg);
                }
            });
        }
    });

    $('#search').on('keyup', function () {
        $value = $(this).val();
        if ($value != '') {
            $.ajax({
                type: 'get',
                url: '/search/client',
                data: {'client': $value},
                success: function (data) {
                    if (data.length == 0) {
                        $('#client-list').empty();
                        $('#client-list').append('<p class="text-center">No results found</p>')
                    } else {
                        $('#client-list').empty();
                        for (i = 0; i < data.length; i++) {
                            var client = '<tr id="client' + data[i].client.id + '"><td id="id">' + data[i].client.id + '</td>';
                            if (data[i].client.dni != null) {
                                client += '<td>' + data[i].client.dni + '</td>';
                            } else {
                                client += '<td></td>';
                            }
                            client += '<td>' + data[i].client.name + '</td><td>' + data[i].client.first_surname + '</td><td>' + data[i].client.email + '</td>';
                            if (data[i].client.phone_number != null) {
                                client += '<td>' + data[i].client.phone_number + '</td>';
                            } else {
                                client += '<td></td>';
                            }
                            if (data[i].plan != null) {
                                client += '<td>Plan : ' + data[i].plan.name + '</td>';
                            } else {
                                client += '<td>Without plan</td>';
                            }
                            client += '<td><button class="btn btn-warning btn-xs btn-detail open-modal" value="' + data[i].client.id + '"><span class="hidden-sm-down">Edit</span><i class="fa fa-pencil hidden-md-up" aria-hidden="true"></i></button>';

                            client += '<button class="btn btn-danger btn-xs btn-delete delete-client" value="' + data[i].client.id + '"><span class="hidden-sm-down">Delete</span><i class="fa fa-trash hidden-md-up" aria-hidden="true"></i></button></td></tr>';
                            $('#client-list').append(client);
                        }

                    }
                },
                error: function (data) {
                    console.log(data);
                }
            });
        } else {
            //todo
        }
    });

});
function valdateAllergyForm() {
    var retorn = true;
    if (!validateName($('#name').val())) {
        $('#name').css('border-color', "#a94442");
        retorn = false;
    }else{
        $('#name').css('border-color', "#5cb85c");
    }
    if ($('#dni').val()) {
        if (!validateDniNif($('#dni').val())) {
            $('#dni').css('border-color', "#a94442");
            retorn = false;
        }else{
            $('#dni').css('border-color', "#5cb85c");
        }
    }
    if (!validateName($('#first_surname').val())) {
        $('#first_surname').css('border-color', "#a94442");
        retorn = false;
    }else{
        $('#first_surname').css('border-color', "#5cb85c");
    }

    if ($('#second_surname').val()) {
        if (!validateName($('#second_surname').val())) {
            $('#second_surname').css('border-color', "#a94442");
            retorn = false;
        }else{
            $('#second_surname').css('border-color', "#5cb85c");
        }
    }
    if (!validateEmail($('#email').val())) {
        $('#email').css('border-color', "#a94442");
        retorn = false;
    }else{
        $('#email').css('border-color', "#5cb85c");
    }
    if ($('#password').val()) {
        if (!validatePassword($('#password').val())) {
            $('#password').css('border-color', "#a94442");
            retorn = false;
        }else{
            $('#password').css('border-color', "#5cb85c");
        }
    }
    if ($('#password_confirmation').val()) {
        if (!validatePassword($('#password_confirmation').val())) {
            $('#password_confirmation').css('border-color', "#a94442");
            retorn = false;
        }else{
            $('#password_confirmation').css('border-color', "#5cb85c");
        }
    }
    if ($('#password_confirmation').val() && $('#password').val()) {
        if ($('#password_confirmation').val() != $('#password').val()) {
            retorn = false;
            $('#password_confirmation').css('border-color', "#a94442");
            $('#password').css('border-color', "#a94442");
            //todo mensaje password no spn igualges
        }else{
            $('#password_confirmation').css('border-color', "#5cb85c");
            $('#password').css('border-color', "#5cb85c");
        }
    }
    if ($('#phone_number').val()) {
        if (!validatePhone($('#phone_number').val())) {
            $('#phone_number').css('border-color', "#a94442");
            retorn = false;
        }else{
            $('#phone_number').css('border-color', "#5cb85c");
        }
    }
    console.log(retorn);
    return retorn;
}