$(document).ready(function () {

    var url = "/admin/ingredients";

    //display modal form for ingredient editing
    $(document).on('click', '.open-modal', function (e) {
        // $('.open-modal').click(function() {
        $('#ajaxerror').empty();
        $('#ajaxerror').removeClass("alert alert-danger");
        $('input').removeAttr( "style" );
        var ingredient_id = $(this).val();
        console.log("edit")
        $.get(url + '/' + ingredient_id, function (data) {
            //success data
            $('#id').val(data.ingredient.id);
            $('#name').val(data.ingredient.name);
            $('#info').val(data.ingredient.info);

            if (data.allergies.length != 0) {//adding initial options
                for (i = 0; i < data.allergies.length; i++) {
                    $('#tag_list').append("<option selected='selected' value='" + data.allergies[i].id + "'>" + data.allergies[i].name + "</option>");
                }
            }

            $('#btn-save').val("update");

            $('#myModal').modal('show');
        })
    });

    //display modal form for creating new ingredient
    $(document).on('click', '#btn-add', function (e) {
        // $('#btn-add').click(function() {
        $('#btn-save').val("add");
        $('#formIngredients').trigger("reset");
        $('#myModal').modal('show');
    });

    //delete ingredient and remove it from list
    $(document).on('click', '.delete-ingredient', function (e) {
        // $('.delete-ingredient').click(function() {
        var ingredient = $(this).val();
        console.log("brand: " + ingredient);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "DELETE",
            url: url + '/' + ingredient,
            success: function (data) {
                console.log(data);
                $("#ingredient" + ingredient).remove();
                //location.reload(true);
                $('#ajaxerror').empty();
                $('#ajaxerror').removeClass("alert alert-danger");
            },
            error: function (data) {
                //console.log('Error:', data);
                $('.error').addClass("alert alert-danger");
                $('.error').html("<p>There was an internal error.</p>");
            }
        });
    });


    //create new ingredient / update existing ingredient
    $("#btn-save").click(function (e) {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        e.preventDefault();
        $datos_allergies_select = $("#tag_list").select2("data");
        var allergies = [];
        for (i = 0; i < $datos_allergies_select.length; i++) {
            allergies[i] = $datos_allergies_select[i].id;
        }

        /* var photo=null;
         if(document.getElementById("photo").files.length != 0) {
         photo= formData.append('photo',document.getElementById('photo').files[0]);
         }*/
        var formData = {
            //   photo:photo,
            name: $('#name').val(),
            info: $('#info').val(),
            allergies: allergies,
            //photo:$('#photo').val(),
        }
        /*  var formData = new FormData();
         if(document.getElementById("photo").value != "") {
         formData.append('photo',document.getElementById('photo').files[0]);
         }
         formData.append('name', $('#name').val());
         formData.append('allergies',allergies);
         formData.append('info',$('#info').val());*/

        console.log(allergies)
        //used to determine the http verb to use [add=POST], [update=PUT]
        var state = $('#btn-save').val();

        var type = "POST"; //for creating new resource
        var ingredient_id = $('#id').val();
        var my_url = url;

        if (state == "update") {
            console.log("update");
            type = "PUT"; //for updating existing resource
            my_url += '/' + ingredient_id;
        }

        console.log(formData);

        $.ajax({
            type: type,
            //contentType: false,
            // processData: false,
            url: my_url,
            data: formData,
            dataType: 'json',
            success: function (data) { // success:
                insertImg(e,data.ingredient.id,type);
                console.log(data);
                //info
                var ingredient = '<tr id="ingredient' + data.ingredient.id + '"><td id="id">' + data.ingredient.id + '</td><td>' + data.ingredient.name + '</td>';
                if(data.ingredient.info==null){
                    ingredient+=' <td class="media-480-delete"></td>';
                }else{
                    ingredient+=' <td class="media-480-delete">' + data.ingredient.info + '</td>';
                }

                //allergies
                ingredient += '<td class="media-767-delete">';
                if (data.allergies.length == 0) {
                    ingredient += '<p></p>';
                } else {
                    for (i = 0; i < data.allergies.length; i++) {
                        ingredient += '<p>' + data.allergies[i].name + '</p>';
                    }
                }
                ingredient += '</td>';


                ingredient += '<td id="ingredient-img"></td>';//for images
                ingredient += '<td class="media-767-delete">' + data.ingredient.created_at + '</td>';

                ingredient += '<td><button style="margin-right: 2px !important;" class="btn btn-warning btn-xs btn-detail open-modal" value="' + data.ingredient.id + '"><span class="hidden-sm-down">Edit</span><i class="fa fa-pencil hidden-md-up" aria-hidden="true"></i></button>';

                ingredient += '<button style="margin-left: 2px !important;" class="btn btn-danger btn-xs btn-delete delete-ingredient" value="' + data.ingredient.id + '"><span class="hidden-sm-down">Delete</span><i class="fa fa-trash hidden-md-up" aria-hidden="true"></i></button>';

                if (state == "add") { //if user added a new record
                    $('#ingredient-list').append(ingredient);
                } else { //if user updated an existing record
                    $("#ingredient" + ingredient_id).replaceWith(ingredient);
                }

                $('#formIngredients').trigger("reset");
                $('#ajaxerror').empty();
                $('#ajaxerror').removeClass("alert alert-danger");
                $('#myModal').modal("hide");
                //location.reload(true);
            },
            error: function (data) {
              console.log('Error:', data);
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

    //search
    $('#search').on('keyup', function () {
        $value = $(this).val();
        if ($value != '') {
            $.ajax({
                type: 'get',
                url: '/search/ingredient',
                data: {'ingredient': $value},
                success: function (data) {
                    console.log(data)
                    if (data.length == 0) {
                        $('#ingredient-list').empty();
                        $('#ingredient-list').append('<p class="text-center">No results found</p>')
                    } else {
                        $('#ingredient-list').empty();
                        for (i = 0; i < data.length; i++) {

                        }
                        for (i = 0; i < data.length; i++) {
                            var ingredient = '<tr id="ingredient' + data[i].ingredient.id + '"><td id="id">' + data[i].ingredient.id + '</td><td>' + data[i].ingredient.name + '</td>';
                            if (data[i].ingredient.info == null) {
                                ingredient += '<td></td>';
                            } else {
                                ingredient += '<td>' + data[i].ingredient.info + '</td>';
                            }
                            ingredient += '<td>';
                            if (data[i].allergies.length == 0) {
                                ingredient += '<p>This ingredient has no allergies</p>';
                            } else {
                                for (j = 0; j < data[i].allergies.length; j++) {
                                    ingredient += '<p>' + data[i].allergies[j].name + '</p>';
                                }
                            }
                            ingredient += '</td>';
                            ingredient += '<td id="ingredient-img"><img class="img-thumbnail" src="/admin/ingredients/'+data[i].ingredient.id+'/image" width="48.2" height="48.2"></td>';//for images
                            ingredient += '<td>' + data[i].ingredient.created_at + '</td>';
                            ingredient += '<td><button style="margin-right: 2px !important;" class="btn btn-warning btn-xs btn-detail open-modal" value="' + data[i].ingredient.id + '"><span class="hidden-sm-down">Edit</span><i class="fa fa-pencil hidden-md-up" aria-hidden="true"></i></button>';

                            ingredient += '<button style="margin-left: 2px !important;" class="btn btn-danger btn-xs btn-delete delete-ingredient" value="' + data[i].ingredient.id  + '"><span class="hidden-sm-down">Delete</span><i class="fa fa-trash hidden-md-up" aria-hidden="true"></i></button>';
                            $('#ingredient-list').append(ingredient);
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


    //search allergies
    $('#tag_list').select2({
        placeholder: "Choose allergies...",
        minimumInputLength: 1,
        ajax: {
            url: "/search/allergySelect",
            dataType: 'json',
            data: function (params) {
                return {
                    q: $.trim(params.term)
                };
            },
            processResults: function (data) {
                return {
                    results: data
                };
            },
            cache: true
        }
    });

    function insertImg(e,id,type) {
        if (document.getElementById("image").value != "") {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            e.preventDefault();
            var formData = new FormData();
            formData.append('image', document.getElementById('image').files[0]);
            $.ajax({
                type: "POST",
                contentType: false,
                processData: false,
                url:  "/admin/ingredients/"+id+"/image",
                data: formData,
                dataType: 'json',
                success: function (data) { // success:
                    img_id=data.id;
                    console.log(data);

                    $('#ingredient'+id+' > #ingredient-img').empty();
                    $('#ingredient'+id+' > #ingredient-img').replaceWith("<td id='ingredient-img'><img class='img-thumbnail' width='48.2' height='48.2' src='/admin/ingredients/"+data.id+"/image'></td>");
                    $('#ajaxerror').empty();
                    $('#ajaxerror').removeClass("alert alert-danger");
                },
                error: function (data) {
                    console.log('Error:', data);
                    $('.error').addClass("alert alert-danger");
                    $('.error').html("<p>" + data.responseJSON.image + "</p>");
                  //  $('#ajaxerror').addClass("alert alert-danger");
                  //  $('#ajaxerror').html("<p>" + data.responseText + "</p>");
                }
            });
        }
    }
});
