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
                $('.error').html("<strong>Oh snap!</strong> Refresh the page and try again.");
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

                var brand = '<tr id="brand' + data.id + '"><td>' + data.id + '</td><td>' + data.name + '</td><td>' + data.info + '</td><td>' + data.created_at + '</td>';
                brand += '<td><button class="btn btn-warning btn-xs btn-detail open-modal" value="' + data.id + '">Edit</button>';
                brand += '<button class="btn btn-danger btn-xs btn-delete delete-brand" value="' + data.id + '">Delete</button></td></tr>';

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
                $('.error').addClass("alert alert-danger");
                $('.error').html("<strong>Oh snap!</strong> Refresh the page and try again.");
            }
        });
    });

});
