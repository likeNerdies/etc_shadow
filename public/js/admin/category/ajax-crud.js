$(document).ready(function() {

  var url = "/admin/categories";

  //display modal form for category editing
    $(document).on('click', '.open-modal', function(e) {
   // $('.open-modal').click(function() {
        var category_id = $(this).val();

        $.get(url + '/' + category_id, function (data) {
            //success data
            $('#id').val(data.id);
            $('#name').val(data.name);
            $('#info').val(data.info);
            $('#btn-save').val("update");

            $('#myModal').modal('show');
        })
    });

    //display modal form for creating new category
    $(document).on('click', '#btn-add', function(e) {
   // $('#btn-add').click(function() {
        $('#btn-save').val("add");
        $('#formCategories').trigger("reset");
        $('#myModal').modal('show');
    });

    //delete category and remove it from list
    $(document).on('click', '.delete-category', function(e) {
   // $('.delete-category').click(function() {
        var category = $(this).val();
        console.log("category: " + category);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "DELETE",
            url: url + '/' + category,
            success: function (data) {
                console.log(data);
                $("#category" + category).remove();
            },
            error: function (data) {
                //console.log('Error:', data);
                $('.error').addClass("alert alert-danger");
                $('.error').html("<p>There was an internal error.</p>");
            }
        });
    });

    //create new category / update existing category
    $(document).on('click', '#btn-save', function(e) {
   // $("#btn-save").click(function (e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        e.preventDefault();

        var formData = {
            name: $('#name').val(),
            info: $('#info').val(),
        }

        //used to determine the http verb to use [add=POST], [update=PUT]
        var state = $('#btn-save').val();

        var type = "POST"; //for creating new resource
        var category_id = $('#id').val();
        var my_url = url;

        if (state == "update"){
          console.log("update");
            type = "PUT"; //for updating existing resource
            my_url += '/' + category_id;
        }

        console.log(formData);

        $.ajax({
            type: type,
            url: my_url,
            data: formData,
            dataType: 'json',
            success: function (data) { // success:
                console.log(data);

                var category = '<tr id="category' + data.id + '"><td>' + data.id + '</td><td>' + data.name + '</td><td>' + data.info + '</td><td class="media-480-delete">' + data.created_at + '</td>';
                category += '<td><button class="btn btn-warning btn-xs btn-detail open-modal  hidden-sm-down" value="' + data.id + '">Edit</button>';
                category += '<button class="btn btn-warning hidden-md-up open-modal" value="'+ data.id +'"><i class="fa fa-pencil" aria-hidden="true"></i></button>';

                category += '<button class="btn btn-danger btn-xs btn-delete delete-allergy  hidden-sm-down" value="' + data.id + '">Delete</button></td></tr>';
                category += '<button class="btn btn-danger hidden-md-up delete-category" value="' + data.id + '"><i class="fa fa-trash" aria-hidden="true"></i></button>';


                if (state == "add"){ //if user added a new record
                    $('#category-list').append(category);
                }else{ //if user updated an existing record

                    $("#category" + category_id).replaceWith( category );
                }

                $('#formCategories').trigger("reset");

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
                $('#ajaxerror').html(msg);
              } else {
                msg = "<p>There was an internal error. Contact with the admin.</p>";
                $('#ajaxerror').html(msg);
              }
            }
        });
    });

    $('#search').on('keyup',function () {
       $value=$(this).val();
        if($value!=''){
       $.ajax({
            type:'get',
            url:'/search/category',
            data:{'category':$value},
           success:function(data){
                if(data.length==0){
                    $('#category-list').empty();
                    $('#category-list').append('<p class="text-center">No results found</p>')
                }else{
                    $('#category-list').empty();
                    for (i=0;i<data.length;i++){
                        var category = '<tr id="category' + data[i].id + '"><td>' + data[i].id + '</td><td>' + data[i].name + '</td><td>' + data[i].info + '</td><td>' + data[i].created_at + '</td>';
                        category += '<td><button class="btn btn-warning btn-xs btn-detail open-modal" value="' + data[i].id + '">Edit</button>';
                        category += '<button class="btn btn-danger btn-xs btn-delete delete-category" value="' + data[i].id + '">Delete</button></td></tr>';
                        $('#category-list').append(category);
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
