$(document).ready(function() {

  var url = "/admin/allergies";

  //display modal form for allergy editing
    $(document).on('click', '.open-modal', function(e) {
   // $('.open-modal').click(function() {
        var allergy_id = $(this).val();

        $.get(url + '/' + allergy_id, function (data) {
            //success data
            $('#id').val(data.id);
            $('#name').val(data.name);

            $('#btn-save').val("update");

            $('#myModal').modal('show');
        })
    });

    //display modal form for creating new allergy
    $(document).on('click', '#btn-add', function(e) {
   // $('#btn-add').click(function() {
        $('#btn-save').val("add");
        $('#formAllergies').trigger("reset");
        $('#myModal').modal('show');
    });

    //delete allergy and remove it from list
    $(document).on('click', '.delete-allergy', function(e) {
   // $('.delete-allergy').click(function() {
        var allergy = $(this).val();
        console.log("allergy: " + allergy);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "DELETE",
            url: url + '/' + allergy,
            success: function (data) {
                console.log(data);
                $("#allergy" + allergy).remove();
            },
            error: function (data) {
                //console.log('Error:', data);
                $('.error').addClass("alert alert-danger");
                $('.error').html("<p>There was an internal error.</p>");
            }
        });
    });

    //create new allergy / update existing allergy
    $("#btn-save").click(function (e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        e.preventDefault();

        var formData = {
            name: $('#name').val(),
        }

        //used to determine the http verb to use [add=POST], [update=PUT]
        var state = $('#btn-save').val();

        var type = "POST"; //for creating new resource
        var allergy_id = $('#id').val();
        var my_url = url;

        if (state == "update"){
          console.log("update");
            type = "PUT"; //for updating existing resource
            my_url += '/' + allergy_id;
        }

        console.log(formData);

        $.ajax({
            type: type,
            url: my_url,
            data: formData,
            dataType: 'json',
            success: function (data) { // success:
                console.log(data);

                var allergy = '<tr id="allergy' + data.id + '"><td id="id">' + data.id + '</td><td>' + data.name + '</td><td>' + data.created_at + '</td>';
                allergy += '<td><button class="btn btn-warning btn-xs btn-detail open-modal  hidden-sm-down" value="' + data.id + '">Edit</button>';
                allergy += '<button class="btn btn-warning hidden-md-up open-modal" value="'+ data.id +'"><i class="fa fa-pencil" aria-hidden="true"></i></button>';

                allergy += '<button class="btn btn-danger btn-xs btn-delete delete-allergy  hidden-sm-down" value="' + data.id + '">Delete</button></tr>';
                allergy += '<button class="btn btn-danger hidden-md-up delete-category" value="' + data.id + '"><i class="fa fa-trash" aria-hidden="true"></i></button></td>';

                if (state == "add"){ //if user added a new record
                    $('#allergy-list').append(allergy);
                }else{ //if user updated an existing record

                    $("#allergy" + allergy_id).replaceWith( allergy );
                }

                $('#formAllergies').trigger("reset");

                $('#myModal').modal("hide");
            },
            error: function (data) {
              //console.log('Error:', data);
              $('#ajaxerror').addClass("alert alert-danger");
              var msg;

              if (data.status == 422){
                msg = "<ul>";
                for (var key in data.responseJSON) {
                  msg += "<li>"+data.responseJSON[key]+"</li>";
                }
                msg += "</ul>";
              } else {
                msg = "<p>There was an internal error. Contact with the admin.</p>";
              }
              $('#ajaxerror').html(msg);
            }
        });
    });

    $('#search').on('keyup',function () {
       $value=$(this).val();
        if($value!=''){
       $.ajax({
            type:'get',
            url:'/search/allergy',
            data:{'allergy':$value},
           success:function(data){
                console.log(data)
                if(data.length==0){
                    $('#allergy-list').empty();
                    $('#allergy-list').append('<p class="text-center">No results found</p>')
                }else{
                    $('#allergy-list').empty();
                    for (i=0;i<data.length;i++){
                        var allergy = '<tr id="allergy' + data[i].id + '"><td id="id">' + data[i].id + '</td><td>' + data[i].name + '</td><td>' + data[i].created_at + '</td>';
                        allergy += '<td><button class="btn btn-warning btn-xs btn-detail open-modal" value="' + data[i].id + '">Edit</button>';
                        allergy += '<button class="btn btn-danger btn-xs btn-delete delete-allergy" value="' + data[i].id + '">Delete</button></td></tr>';
                        $('#allergy-list').append(allergy);
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