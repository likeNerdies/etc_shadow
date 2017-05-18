$(document).ready(function() {

  var url = "/admin/brands";

  //display modal form for brand editing
    $(document).on('click', '.open-modal', function(e) {
   // $('.open-modal').click(function() {
        var brand_id = $(this).val();

        $.get(url + '/' + brand_id, function (data) {
            //success data
            $('#id').val(data.id);
            $('#name').val(data.name);
            $('#info').val(data.info);
            $('#btn-save').val("update");

            $('#myModal').modal('show');
        })
    });

    //display modal form for creating new brand
    $(document).on('click', '#btn-add', function(e) {
   // $('#btn-add').click(function() {
        $('#btn-save').val("add");
        $('#formBrands').trigger("reset");
        $('#myModal').modal('show');
    });

    //delete brand and remove it from list
    $(document).on('click', '.delete-brand', function(e) {
   // $('.delete-brand').click(function() {
        var brand = $(this).val();
        console.log("brand: " + brand);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "DELETE",
            url: url + '/' + brand,
            success: function (data) {
                console.log(data);
                $("#brand" + brand).remove();
            },
            error: function (data) {
                //console.log('Error:', data);
                $('.error').addClass("alert alert-danger");
                $('.error').html("<p>There was an internal error.</p>");
            }
        });
    });

    //create new brand / update existing brand
    $("#btn-save").click(function (e) {
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
        var brand_id = $('#id').val();
        var my_url = url;

        if (state == "update"){
          console.log("update");
            type = "PUT"; //for updating existing resource
            my_url += '/' + brand_id;
        }

        console.log(formData);

        $.ajax({
            type: type,
            url: my_url,
            data: formData,
            dataType: 'json',
            success: function (data) { // success:
                console.log(data);

                var brand = '<tr id="brand' + data.id + '"><td id="id">' + data.id + '</td><td>' + data.name + '</td><td>' + data.info + '</td><td>' + data.created_at + '</td>';
                brand += '<td><button class="btn btn-warning btn-xs btn-detail open-modal  hidden-sm-down" value="' + data.id + '">Edit</button>';
                brand += '<button class="btn btn-warning hidden-md-up open-modal" value="'+ data.id +'"><i class="fa fa-pencil" aria-hidden="true"></i></button>';

                brand += '<button class="btn btn-danger btn-xs btn-delete delete-allergy  hidden-sm-down" value="' + data.id + '">Delete</button></td></tr>';
                brand += '<button class="btn btn-danger hidden-md-up delete-category" value="' + data.id + '"><i class="fa fa-trash" aria-hidden="true"></i></button>';


                if (state == "add"){ //if user added a new record
                    $('#brand-list').append(brand);
                }else{ //if user updated an existing record

                    $("#brand" + brand_id).replaceWith( brand );
                }

                $('#formBrands').trigger("reset");

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
                msg = "<p>There was an internal error. Contact with the amdin.</p>"
              }
            }
        });
    });

    $('#search').on('keyup',function () {
       $value=$(this).val();
        if($value!=''){
       $.ajax({
            type:'get',
            url:'/search/brand',
            data:{'brand':$value},
           success:function(data){
                console.log(data)
                if(data.length==0){
                    $('#brand-list').empty();
                    $('#brand-list').append('<p class="text-center">No results found</p>')
                }else{
                    $('#brand-list').empty();
                    for (i=0;i<data.length;i++){
                        var brand = '<tr id="brand' + data[i].id + '"><td id="id">' + data[i].id + '</td><td>' + data[i].name + '</td><td>' + data[i].info + '</td><td>' + data[i].created_at + '</td>';
                        brand += '<td><button class="btn btn-warning btn-xs btn-detail open-modal" value="' + data[i].id + '">Edit</button>';
                        brand += '<button class="btn btn-danger btn-xs btn-delete delete-brand" value="' + data[i].id + '">Delete</button></td></tr>';
                        $('#brand-list').append(brand);
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
