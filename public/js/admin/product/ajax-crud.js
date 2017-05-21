$(document).ready(function () {

    var url = "/admin/products";
    //display modal form for product editing
    $(document).on('click', '.open-modal', function (e) {
        // $('.open-modal').click(function() {

        //quitamos las option seleccionadas
        $(".select2-selection__choice").remove();
        $("#ingredient_list").html('');
        $("#category_list").html('');

        var product_id = $(this).val();
        $('#ajaxerror').empty();
        $('#ajaxerror').removeClass("alert alert-danger");
        $('input').removeAttr("style");
        $.get(url + '/' + product_id, function (data) {
            //success data
            $('#id').val(data.product.id);
            $('#name').val(data.product.name);
            $('#price').val(data.product.price);
            $('#description').val(data.product.description);
            $('#expiration_date').val(data.product.expiration_date);
            $('#weight').val(data.product.weight);
            $('#stock').val(data.product.stock);


            $("#ingredient_list").val(null).trigger("change");
            if (data.ingredients.length != 0) {//adding initial options
                for (i = 0; i < data.ingredients.length; i++) {
                    //$('#ingredient_list').empty();
                    $('#ingredient_list').append("<option selected='selected' value='" + data.ingredients[i].id + "'>" + data.ingredients[i].name + "</option>");
                }
            }

            $("#category_list").val(null).trigger("change");
            if (data.categories.length != 0) {//adding initial options
                for (i = 0; i < data.categories.length; i++) {
                    //$('#category_list').empty();
                    $('#category_list').append("<option selected='selected' value='" + data.categories[i].id + "'>" + data.categories[i].name + "</option>");
                }
            }

            if (data.brand != null) {
                console.log(data.brand.id);
                var id = data.brand.id;
                //$("#brand_id").select2().select2('val',id);
               // $('#brand_id option[value=' + id + ']').prop('selected', true)
                $("#brand_id").val(id).trigger('change.select2');
            }
            /*for (i = 0; i < data.brands.length; i++) {
             if(data.brand.id==data.brands[i].id){
             $('#brand_id').append("<option selected='selected'  value='" + data.brands[i].id + "'>" + data.brands[i].name + "</option>");
             }else{
             $('#brand_id').append("<option  value='" + data.brands[i].id + "'>" + data.brands[i].name + "</option>");
             }
             }*/

            $('#dimension').val(data.product.dimension);
            $('#real_weight').val(data.product.real_weight);

            if (data.product.vegetarian == 1) {
                $('#vegetarian').prop('checked', true);
            } else {
                $('#vegetarian').prop('checked', false);
            }

            if (data.product.vegan == 1) {
                $('#vegan').prop('checked', true);
            } else {
                $('#vegan').prop('checked', false);
            }

            if (data.product.organic == 1) {
                $('#organic').prop('checked', true);
            } else {
                $('#organic').prop('checked', false);
            }

            $('#btn-save').val("update");
            $('#myModal').modal('show');
        })
    });

    //display modal form for creating new product
    $(document).on('click', '#btn-add', function (e) {
        // $('#btn-add').click(function() {
        $(".select2-selection__choice").remove();
        $("#ingredient_list").html('');
        $("#category_list").html('');
        $('#btn-save').val("add");
        $('#formProducts').trigger("reset");
        $('#myModal').modal('show');
    });

    //delete product and remove it from list
    $(document).on('click', '.delete-product', function (e) {
        // $('.delete-product').click(function() {
        var product = $(this).val();
        console.log("product: " + product);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "DELETE",
            url: url + '/' + product,
            success: function (data) {
                console.log(data);
                $("#product" + product).remove();
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


    //create new product / update existing product
    $("#btn-save").click(function (e) {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        e.preventDefault();

        var brand_id = $("#brand_id").val();
        var categories = $("#category_list").val();
        var ingredients = $("#ingredient_list").val();
        /*
         var datos_ingredients_select = $("#ingredient_list").select2("data");
         var ingredients = [];
         for (i = 0; i < datos_ingredients_select.length; i++) {
         ingredients[i] = datos_ingredients_select[i].id;
         }


         var datos_categories_select = $("#category-list").select2("data");
         var categories = [];
         for (i = 0; i < datos_categories_select.length; i++) {
         categories[i] = datos_categories_select[i].id;
         }*/
        var vegetarian = 0, vegan = 0, organic = 0;
        if ($('#vegetarian').prop('checked')) {
            vegetarian = 1;
        }
        if ($('#vegan').prop('checked')) {
            vegan = 1;
        }
        if ($('#organic').prop('checked')) {
            organic = 1;
        }

        /* var photo=null;
         if(document.getElementById("photo").files.length != 0) {
         photo= formData.append('photo',document.getElementById('photo').files[0]);
         }*/
        var formData = {
            //   photo:photo,
            name: $('#name').val(),
            info: $('#info').val(),
            price: $('#price').val(),
            description: $('#description').val(),
            expiration_date: $('#expiration_date').val(),
            weight: $('#weight').val(),
            stock: $('#stock').val(),
            ingredients: ingredients,
            categories: categories,
            brand_id: brand_id,
            dimension: $('#dimension').val(),
            real_weight: $('#real_weight').val(),
            vegetarian: vegetarian,
            vegan: vegan,
            organic: organic
            //photo:$('#photo').val(),
        }
        /*  var formData = new FormData();
         if(document.getElementById("photo").value != "") {
         formData.append('photo',document.getElementById('photo').files[0]);
         }
         formData.append('name', $('#name').val());
         formData.append('allergies',allergies);
         formData.append('info',$('#info').val());*/

        //console.log(allergies)
        //used to determine the http verb to use [add=POST], [update=PUT]
        var state = $('#btn-save').val();

        var type = "POST"; //for creating new resource
        var product_id = $('#id').val();
        var my_url = url;

        if (state == "update") {

            type = "PUT"; //for updating existing resource
            my_url += '/' + product_id;
        }

        //console.log(formData);
        console.log("update");
        $.ajax({
            type: type,
            //contentType: false,
            // processData: false,
            url: my_url,
            data: formData,
            dataType: 'json',
            success: function (data) { // success:
                console.log(data);


                //info
                var product = '<tr id="product' + data.product.id + '"><td id="id">' + data.product.id + '</td><td>' + data.product.name + '</td><td>' + data.product.price + '</td><td>' + data.product.expiration_date + '</td>';
                product += '<td>' + data.product.weight + '</td><td>' + data.product.stock + '</td>';
                if (data.categories.length == 0 || data.categories.length == null) {
                    product += ' <td></td>';
                } else {
                    product += '<td>';
                    for (i = 0; i < data.categories.length; i++) {
                        product += ' <p>' + data.categories[i].name + '</p>';
                    }
                    product += '</td>';

                }

                product += '<td id="product-img"></td>';//for images

                // product += '<td id="product-img"></td>';//for images
                product += '<td><button style="margin-right: 2px !important;" class="btn btn-warning btn-xs btn-detail open-modal" value="' + data.product.id + '"><span class="hidden-sm-down">Edit</span><i class="fa fa-pencil hidden-md-up" aria-hidden="true"></i></button>';

                product += '<button style="margin-left: 2px !important;" class="btn btn-danger btn-xs btn-delete delete-product" value="' + data.product.id + '"><span class="hidden-sm-down">Delete</span><i class="fa fa-trash hidden-md-up" aria-hidden="true"></i></button></td></tr>';

                if (state == "add") { //if user added a new record
                    $('#product-list').append(product);
                } else { //if user updated an existing record
                    $("#product" + product_id).replaceWith(product);
                }
                insertImg(e, data.product.id, type);//en el caso de update y no poner imagen, la imagen no se muestra
                $('#product' + product_id + ' > #product-img').replaceWith("<td id='product-img'><img class='img-thumbnail' width='48.2' height='48.2' src='/admin/products/" + data.images[0].id + "/image'></td>");
                $('#formProducts').trigger("reset");
                $('#ajaxerror').empty();
                $('#ajaxerror').removeClass("alert alert-danger");
                $('#myModal').modal("hide");
            },
            error: function (data) {
                console.log('Error:', data);
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
    });

    //search
    $('#search').on('keyup', function () {
        $value = $(this).val();
        if ($value != '') {
            $.ajax({
                type: 'get',
                url: '/search/product',
                data: {'product': $value},
                success: function (data) {
                    console.log(data)
                    if (data.length == 0) {
                        $('#product-list').empty();
                        $('#product-list').append('<p class="text-center">No results found</p>')
                    } else {
                        $('#product-list').empty();
                        for (i = 0; i < data.length; i++) {
                            var product = '<tr id="product' + data[i].product.id + '"><td id="id">' + data[i].product.id + '</td><td>' + data[i].product.name + '</td><td>' + data[i].product.price + '</td><td>' + data[i].product.expiration_date + '</td>';
                            product += '<td>' + data[i].product.weight + '</td><td>' + data[i].product.stock + '</td>';
                            if (data[i].categories.length == 0 || data[i].categories.length == null) {
                                product += ' <td></td>';
                            } else {
                                product += '<td>';
                                for (j = 0; j < data[i].categories.length; j++) {
                                    product += ' <p>' + data[i].categories[j].name + '</p>';
                                }
                                product += '</td>';

                            }
                            if (data[i].images.length == 0) {
                                product += '<td id="product-img"></td>';//for images
                            } else {
                                product += '<td id="product-img"><img class="img-thumbnail" src="/admin/products/' + data[i].images + '/image" width="48.2" height="48.2"></td>';//for images
                            }


                            product += '<td><button style="margin-right:2px !important;" class="btn btn-warning btn-xs btn-detail open-modal" value="' + data[i].product.id + '"><span class="hidden-sm-down">Edit</span><i class="fa fa-pencil hidden-md-up" aria-hidden="true"></i></button>';

                            product += '<button style="margin-left:2px !important;" class="btn btn-danger btn-xs btn-delete delete-product" value="' + data[i].product.id + '"><span class="hidden-sm-down">Delete</span><i class="fa fa-trash hidden-md-up"></i></button></td></tr>';
                            $('#product-list').append(product);
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

    $('#category_list').select2({
        dropdownParent: $('#ing-parent'),
        placeholder: "Choose categories...",
        minimumInputLength: 1,
        ajax: {
            url: "/search/categorySelect",
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
            //   cache: true
        }
    });

    $('#ingredient_list').select2({
        dropdownParent: $('#cat-parent'),
        placeholder: "Choose allergies...",
        minimumInputLength: 1,
        ajax: {
            url: "/search/ingredientSelect",
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
            //  cache: true
        }
    });

    $('#brand_id').select2({dropdownParent: $('#brand-container')});

    function insertImg(e, id, type) {
        if (document.getElementById("image").value != "") {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            e.preventDefault();
            var formData = new FormData();
            // console.log( document.getElementById('image').files[0]);
            formData.append('image[]', document.getElementById('image').files[0]);
            formData.append('image[]', document.getElementById('image').files[1]);
            formData.append('image[]', document.getElementById('image').files[2]);
            $.ajax({
                type: "POST",
                contentType: false,
                processData: false,
                url: "/admin/products/" + id + "/image",
                data: formData,
                dataType: 'json',
                success: function (data) { // success:
                    console.log(data);
                    $('#product' + id + ' > #product-img').replaceWith("<td id='product-img'><img class='img-thumbnail' width='48.2' height='48.2' src='/admin/products/" + data.images + "/image'></td>");
                    $('#ajaxerror').empty();
                    $('#ajaxerror').removeClass("alert alert-danger");
                },
                error: function (data) {
                    console.log('Error:', data);
                    $('#ajaxerror').addClass("alert alert-danger");
                    $('.error').html("<p>There was an internal error.</p>");
                }
            });
        }
    }
});
