$(document).ready(function() {

  var url = "categories";

  //display modal form for category editing
    $('.open-modal').click(function() {
        var category_id = $(this).val();

        $.get(url + '/' + category_id, function (data) {
            //success data
            console.log(data);
            $('#c').val(data.id);
            $('#name').val(data.name);
            $('#info').val(data.info);
            $('#btn-save').val("update");

            $('#myModal').modal('show');
        })
    });

    //display modal form for creating new category
    $('#btn-add').click(function() {
        $('#btn-save').val("add");
        $('#formCategories').trigger("reset");
        $('#myModal').modal('show');
    });

    //delete category and remove it from list
    $('.delete-category').click(function() {
        var category = $(this).val();

        $.ajax({

            type: "DELETE",
            url: url + '/' + category,
            success: function (data) {
                console.log(data);

                $("#category" + category).remove();
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });

    //create new category / update existing category
    $("#btn-save").click(function (e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
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
        var category_id = $('#category_id').val();
        var my_url = url;

        if (state == "update"){
            type = "PUT"; //for updating existing resource
            my_url += '/' + category_id;
        }

        console.log(formData);

        $.ajax({

            type: type,
            url: my_url,
            data: formData,
            dataType: 'json',
            done: function (data) { // success:
                console.log(data);

                var category = '<tr id="category' + data.id + '"><td>' + data.id + '</td><td>' + data.name + '</td><td>' + data.info + '</td><td>' + data.created_at + '</td>';
                category += '<td><button class="btn btn-warning btn-xs btn-detail open-modal" value="' + data.id + '">Edit</button>';
                category += '<button class="btn btn-danger btn-xs btn-delete delete-category" value="' + data.id + '">Delete</button></td></tr>';

                if (state == "add"){ //if user added a new record
                    $('#category-list').append(category);
                }else{ //if user updated an existing record

                    $("#category" + category_id).replaceWith( category );
                }

                $('#formCategories').trigger("reset");

                $('#myModal').modal('hide')
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });

});
