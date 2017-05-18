$(document).ready(function() {

  var url = "/admin/admin-users";

  //display modal form for admin editing
    $(document).on('click', '.open-modal', function(e) {
   // $('.open-modal').click(function() {
        var admin_id = $(this).val();

        $.get(url + '/' + admin_id, function (data) {
            //success data
            $('#id').val(data.id);
            $('#dni').val(data.dni);
            $('#name').val(data.name);
            $('#first_surname').val(data.first_surname);
            $('#second_surname').val(data.second_surname);
            $('#email').val(data.email);
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
        $('#btn-save').val("add");
        $('#formCategories').trigger("reset");
        $('#myModal').modal('show');
    });

    //delete admin and remove it from list
    $(document).on('click', '.delete-admin', function(e) {
   // $('.delete-admin').click(function() {
        var admin = $(this).val();
        console.log("admin: " + admin);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "DELETE",
            url: url + '/' + admin,
            success: function (data) {
                console.log(data);
                $("#admin" + admin).remove();
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
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        e.preventDefault();


        var can_create;
        if($('#can_create').prop('checked')){
            can_create=1;
        }
        var formData = {
            dni:$('#dni').val(),
            name: $('#name').val(),
            first_surname: $('#first_surname').val(),
            second_surname: $('#second_surname').val(),
            email: $('#email').val(),
            password: $('#password').val(),
            password_confirmation: $('#password_confirmation').val(),
            phone_number: $('#phone_number').val(),
            can_create:can_create,
        }

        //used to determine the http verb to use [add=POST], [update=PUT]
        var state = $('#btn-save').val();

        var type = "POST"; //for creating new resource
        var admin_id = $('#id').val();
        var my_url = url;

        if (state == "update"){
          console.log("update");
            type = "PUT"; //for updating existing resource
            my_url += '/' + admin_id;
        }

        console.log(formData);

        $.ajax({
            type: type,
            url: my_url,
            data: formData,
            dataType: 'json',
            success: function (data) { // success:
                console.log(data);
                var admin='<tr id="admin' + data.id + '"><td id="id">' + data.id + '</td>';
                if(data.dni!=null){
                    admin+='<td>'+data.dni+'</td>';
                }else{
                    admin+='<td></td>';
                }
                 admin += '<td>' + data.name + '</td><td>' + data.first_surname + '</td><td>' + data.email + '</td>';
                if(data.phone_number!=null){
                    admin+='<td>'+data.phone_number+'</td>';
                }else{
                    admin+='<td></td>';
                }
                admin += '<td><button class="btn btn-warning btn-xs btn-detail open-modal" value="' + data.id + '">Edit</button>';
                admin += '<button class="btn btn-danger btn-xs btn-delete delete-admin" value="' + data.id + '">Delete</button></td></tr>';

                if (state == "add"){ //if user added a new record
                    $('#admin-list').append(admin);
                }else{ //if user updated an existing record

                    $("#admin" + admin_id).replaceWith( admin );
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
                            admin+='<td>'+data[i].dni+'</td>';
                        }else{
                            admin+='<td></td>';
                        }
                        admin += '<td>' + data[i].name + '</td><td>' + data[i].first_surname + '</td><td>' + data[i].email + '</td>';
                        if(data[i].phone_number!=null){
                            admin+='<td>'+data[i].phone_number+'</td>';
                        }else{
                            admin+='<td></td>';
                        }
                        admin += '<td><button class="btn btn-warning btn-xs btn-detail open-modal" value="' + data[i].id + '">Edit</button>';
                        admin += '<button class="btn btn-danger btn-xs btn-delete delete-admin" value="' + data[i].id + '">Delete</button></td></tr>';
                        $('#admin-list').append(admin);
                    }

                }
           },
           error:function (data) {
               console.log(data);
           }
       });
        }else{
            //todo
        }
    });

});
