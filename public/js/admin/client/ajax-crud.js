$(document).ready(function () {

    var url = "/admin/clients";

    //display modal form for user editing
    $(document).on('click', '.open-modal', function (e) {
        // $('.open-modal').click(function() {
        var client_id = $(this).val();

        $.get(url + '/' + client_id, function (data) {
            //success data
            $('#id').val(data.client.id);
            $('#dni').val(data.client.dni);
            $('#name').val(data.client.name);
            $('#first_surname').val(data.client.first_surname);
            $('#second_surname').val(data.client.second_surname);
            $('#email').val(data.client.email);
            $('#phone_number').val(data.phone_number);
            $('#plan').append("<option value=''>No plan</option>");
            if (data.plans.length != 0) {//adding initial options
                for (i = 0; i < data.plans.length; i++) {
                    if (data.plan.id == data.plans[i].id)
                        $('#plan').append("<option selected='selected' value='" + data.plans[i].id + "'>" + data.plans[i].name + "</option>");
                    else
                        $('#plan').append("<option value='" + data.plans[i].id + "'>" + data.plans[i].name + "</option>");
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
            },
            error: function (data) {
                //console.log('Error:', data);
                $('.error').addClass("alert alert-danger");
                $('.error').html("<p>" + data.responseText + "</p>");
            }
        });
    });

    //create new client / update existing client
    $(document).on('click', '#btn-save', function (e) {
        // $("#btn-save").click(function (e) {
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
            console.log("update");
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
                var admin = '<tr id="admin' + data.id + '"><td id="id">' + data.id + '</td>';
                if (data.dni != null) {
                    admin += '<td>' + data.dni + '</td>';
                } else {
                    admin += '<td></td>';
                }
                admin += '<td>' + data.name + '</td><td>' + data.first_surname + '</td><td>' + data.email + '</td>';
                if (data.phone_number != null) {
                    admin += '<td>' + data.phone_number + '</td>';
                } else {
                    admin += '<td></td>';
                }
                admin += '<td><button class="btn btn-warning btn-xs btn-detail open-modal" value="' + data.id + '">Edit</button>';
                admin += '<button class="btn btn-danger btn-xs btn-delete delete-admin" value="' + data.id + '">Delete</button></td></tr>';

                if (state == "add") { //if user added a new record
                    $('#admin-list').append(admin);
                } else { //if user updated an existing record

                    $("#admin" + admin_id).replaceWith(admin);
                }

                $('#formCategories').trigger("reset");

                $('#myModal').modal("hide");
            },
            error: function (data) {
                console.log('Error:', data);
                $('#ajaxerror').addClass("alert alert-danger");
                $('#ajaxerror').html("<p>" + data.responseText + "</p>");
            }
        });
    });

    $('#search').on('keyup', function () {
        $value = $(this).val();
        if ($value != '') {
            $.ajax({
                type: 'get',
                url: '/search/category',
                data: {'category': $value},
                success: function (data) {
                    if (data.length == 0) {
                        $('#category-list').empty();
                        $('#category-list').append('<p class="text-center">No results found</p>')
                    } else {
                        $('#category-list').empty();
                        for (i = 0; i < data.length; i++) {
                            var category = '<tr id="category' + data[i].id + '"><td>' + data[i].id + '</td><td>' + data[i].name + '</td><td>' + data[i].info + '</td><td>' + data[i].created_at + '</td>';
                            category += '<td><button class="btn btn-warning btn-xs btn-detail open-modal" value="' + data[i].id + '">Edit</button>';
                            category += '<button class="btn btn-danger btn-xs btn-delete delete-category" value="' + data[i].id + '">Delete</button></td></tr>';
                            $('#category-list').append(category);
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
