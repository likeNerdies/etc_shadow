$(document).ready(function() {

  var url = "/admin/admin-users";

  //display modal form for admin editing
    $(document).on('click', '.open-modal', function(e) {
   // $('.open-modal').click(function() {
        var admin_id = $(this).val();
        $('#ajaxerror').empty();
        $('#ajaxerror').removeClass("alert alert-danger");
        $('input').removeAttr( "style" );

        $.get(url + '/' + admin_id, function (data) {
            //success data
            $('#id').val(data.id);
            $('#dni').val(data.dni);
            $('#name').val(data.name);
            $('#first_surname').val(data.first_surname);
            $('#second_surname').val(data.second_surname);
            $('#email').val(data.email);
            //$('#password_confirmation').val(data.password);
            //$('#password').val(data.password);
            $('#phone_number').val(data.phone_number);
            if(data.can_create==1){
                $('#can_create').prop('checked', true);
            }else{
                $('#can_create').prop('checked', false);
            }

            $('#btn-save').val("update");

            $('#myModal').modal('show');
        })
    });

    //display modal form for creating new admin
    $(document).on('click', '#btn-add', function(e) {
   // $('#btn-add').click(function() {
        $('#ajaxerror').empty();
        $('#ajaxerror').removeClass("alert alert-danger");
        $('input').removeAttr( "style" );
        $('#btn-save').val("add");
        $('#formCategories').trigger("reset");
        $('#myModal').modal('show');
    });

    //delete admin and remove it from list
    $(document).on('click', '.delete-admin', function(e) {
   // $('.delete-admin').click(function() {
        var admin = $(this).val();
       // console.log("admin: " + admin);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "DELETE",
            url: url + '/' + admin,
            success: function (data) {
            //    console.log(data);
                $("#admin" + admin).remove();
                $('#ajaxerror').empty();
                $('#ajaxerror').removeClass("alert alert-danger");
                successMessage();
            },
            error: function (data) {
                //console.log('Error:', data);
                $('.error').addClass("alert alert-danger");
                $('.error').html("<p>" + data.responseText + "</p>");
            }
        });
    });

    //create new admin / update existing admin
    $(document).on('click', '#btn-save', function(e) {
   // $("#btn-save").click(function (e) {
        if (valdateForm()) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            e.preventDefault();


            var can_create;
            if ($('#can_create').prop('checked')) {
                can_create = 1;
            }
            var formData = {
                dni: $('#dni').val(),
                name: $('#name').val(),
                first_surname: $('#first_surname').val(),
                second_surname: $('#second_surname').val(),
                email: $('#email').val(),
                password: $('#password').val(),
                password_confirmation: $('#password_confirmation').val(),
                phone_number: $('#phone_number').val(),
                can_create: can_create,
            }

            //used to determine the http verb to use [add=POST], [update=PUT]
            var state = $('#btn-save').val();

            var type = "POST"; //for creating new resource
            var admin_id = $('#id').val();
            var my_url = url;

            if (state == "update") {
               // console.log("update");
                type = "PUT"; //for updating existing resource
                my_url += '/' + admin_id;
            }

          //  console.log(formData);

            $.ajax({
                type: type,
                url: my_url,
                data: formData,
                dataType: 'json',
                success: function (data) { // success:
                  //  console.log(data);
                    var admin = '<tr id="admin' + data.id + '"><td id="id">' + data.id + '</td>';
                    if (data.dni != null) {
                        admin += '<td class="media-767-delete">' + data.dni + '</td>';
                    } else {
                        admin += '<td class="media-767-delete"></td>';
                    }
                    admin += '<td>' + data.name + '</td><td class="media-767-delete">' + data.first_surname + '</td><td>' + data.email + '</td>';
                    if (data.phone_number != null) {
                        admin += '<td class="media-767-delete">' + data.phone_number + '</td>';
                    } else {
                        admin += '<td class="media-767-delete"></td>';
                    }
                    admin += '<td><button style="margin-right: 2px !important;" class="btn btn-warning btn-xs btn-detail open-modal" value="' + data.id + '"><span class="hidden-sm-down">Edit</span><i class="fa fa-pencil hidden-md-up" aria-hidden="true"></i></button>';

                    admin += '<button style="margin-left: 2px !important;" class="btn btn-danger btn-xs btn-delete delete-admin" value="' + data.id + '"><span class="hidden-sm-down">Delete</span><i class="fa fa-trash hidden-md-up" aria-hidden="true"></i></button></td></tr>';

                    if (state == "add") { //if user added a new record
                        $('#admin-list').append(admin);
                    } else { //if user updated an existing record

                        $("#admin" + admin_id).replaceWith(admin);
                    }

                    $('#formCategories').trigger("reset");
                    $('#ajaxerror').empty();
                    $('#ajaxerror').removeClass("alert alert-danger");
                    $('#myModal').modal("hide");
                    successMessage();
                },
                error: function (data) {
                  //  console.log('Error:', data);
                    $('#ajaxerror').addClass("alert alert-danger");
                    $('#ajaxerror').html("<p>" + data.responseText + "</p>");
                }
            });
        }
    });

    $('#search').on('keyup',function () {
       $value=$(this).val();
        if($value!=''){
       $.ajax({
            type:'get',
            url:'/search/admin',
            data:{'admin':$value},
           success:function(data){
                if(data.length==0){
                    $('#admin-list').empty();
                    $('#admin-list').append('<p class="text-center">No results found</p>')
                }else{
                    $('#admin-list').empty();
                    for (i=0;i<data.length;i++){
                        var admin='<tr id="admin' + data[i].id + '"><td id="id">' + data[i].id + '</td>';
                        if(data[i].dni!=null){
                            admin+='<td class="media-767-delete">'+data[i].dni+'</td>';
                        }else{
                            admin+='<td class="media-767-delete"></td>';
                        }
                        admin += '<td>' + data[i].name + '</td><td class="media-767-delete">' + data[i].first_surname + '</td><td>' + data[i].email + '</td>';
                        if(data[i].phone_number!=null){
                            admin+='<td class="media-767-delete">'+data[i].phone_number+'</td>';
                        }else{
                            admin+='<td class="media-767-delete"></td>';
                        }
                        admin += '<td><button style="margin-right:2px !important;" class="btn btn-warning btn-xs btn-detail open-modal" value="' + data[i].id + '"><span class="hidden-sm-down">Edit</span><i class="fa fa-pencil hidden-md-up" aria-hidden="true"></i></button>';

                        admin += '<button style="margin-left:2px !important;" class="btn btn-danger btn-xs btn-delete delete-admin" value="' + data[i].id + '"><span class="hidden-sm-down">Delete</span><i class="fa fa-trash hidden-md-up" aria-hidden="true"></i></button></td></tr>';
                        $('#admin-list').append(admin);
                    }

                }
           },
           error:function (data) {
             //  console.log(data);
           }
       });
        }else{
            //todo
        }
    });

    $(document).on('click', '#admin_cofig_data', function (e) {
        if (valdateUserData()) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            e.preventDefault();


            var formData = {
                id:$('#id').val(),
                dni: $('#dni').val(),
                name: $('#name').val(),
                first_surname: $('#first_surname').val(),
                second_surname: $('#second_surname').val(),
                email: $('#email').val(),
                phone_number: $('#phone_number').val()
            }

            //used to determine the http verb to use [add=POST], [update=PUT];

            var type = "PUT"; //for creating new resource
            var my_url = "/admin/update";

            $.ajax({
                type: type,
                url: my_url,
                data: formData,
                dataType: 'json',
                success: function (data) { // success:
                  //  console.log(data);
                    $('#ajaxerror').empty();
                    $('#ajaxerror').removeClass("alert alert-danger");
                    successMessage();

                },
                error: function (data) {
                  //  console.log('Error:', data);
                    $('#ajaxerror').addClass("alert alert-danger");
                    $('#ajaxerror').html("<p>" + data.responseText + "</p>");
                }
            });
        }
    });

});

function valdateForm() {
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
  //  console.log(retorn);
    return retorn;
}
