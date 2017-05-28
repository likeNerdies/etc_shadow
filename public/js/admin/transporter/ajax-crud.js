$(document).ready(function() {

  var url = "/admin/transporters";

  //display modal form for transporter editing
    $(document).on('click', '.open-modal', function(e) {
        $('#ajaxerror').empty();
        $('#ajaxerror').removeClass("alert alert-danger");
        $('input').removeAttr( "style" );
   // $('.open-modal').click(function() {
        var transporter_id = $(this).val();
        console.log("transporter_id: " + transporter_id);

        $.get(url + '/' + transporter_id, function (data) {
            //success data
            $('#id').val(data.id);
            $('#name').val(data.name);
            $('#cif').val(data.cif);
            $('#phone_number').val(data.phone_number);
            $('#btn-save').val("update");

            $('#myModal').modal('show');
        })
    });

    //display modal form for creating new transporter
    $(document).on('click', '#btn-add', function(e) {
   // $('#btn-add').click(function() {
        $('#ajaxerror').empty();
        $('#ajaxerror').removeClass("alert alert-danger");
        $('input').removeAttr( "style" );
        $('#btn-save').val("add");
        $('#formTransporters').trigger("reset");
        $('#myModal').modal('show');
    });

    //delete transporter and remove it from list
    $(document).on('click', '.delete-transporter', function(e) {
   // $('.delete-transporter').click(function() {
        var transporter = $(this).val();
        console.log("transporter: " + transporter);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "DELETE",
            url: url + '/' + transporter,
            success: function (data) {
                console.log(data);
                $("#transporter" + transporter).remove();
                $('#ajaxerror').empty();
                $('#ajaxerror').removeClass("alert alert-danger");
                successMessage();
            },
            error: function (data) {
                console.log('Error:', data);
                $('.error').addClass("alert alert-danger");
                $('.error').html("<p>There was an internal error.</p>");
            }
        });
    });

    //create new transporter / update existing transporter
    $("#btn-save").click(function (e) {
        if (valdateAllergyForm()) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            e.preventDefault();

            var formData = {
                name: $('#name').val(),
                cif: $('#cif').val(),
                phone_number: $('#phone_number').val(),
            }

            //used to determine the http verb to use [add=POST], [update=PUT]
            var state = $('#btn-save').val();

            var type = "POST"; //for creating new resource
            var transporter_id = $('#id').val();
            console.log("id: " + transporter_id);
            var my_url = url;

            if (state == "update") {
                console.log("update");
                type = "PUT"; //for updating existing resource
                my_url += '/' + transporter_id;
            }
            console.log("URL:" + my_url);
            console.log(formData);

            $.ajax({
                type: type,
                url: my_url,
                data: formData,
                dataType: 'json',
                success: function (data) { // success:
                    console.log(data);

                    var transporter = '<tr id="transporter' + data.id + '"><td>' + data.id + '</td><td>' + data.name + '</td><td>' + data.cif + '</td><td>' + data.phone_number + '</td>';

                    transporter += '<td><button style="margin-right: 2px !important;" class="btn btn-warning btn-xs btn-detail open-modal" value="' + data.id + '"><span class="hidden-sm-down">Edit</span><i class="fa fa-pencil hidden-md-up" aria-hidden="true"></i></button>';

                    transporter += '<button style="margin-left: 2px !important;" class="btn btn-danger btn-xs btn-delete delete-transporter" value="' + data.id + '"><span class="hidden-sm-down">Delete</span><i class="fa fa-trash hidden-md-up" aria-hidden="true"></i></button>';

                    if (state == "add") { //if user added a new record
                        $('#transporter-list').append(transporter);
                    } else { //if user updated an existing record

                        $("#transporter" + transporter_id).replaceWith(transporter);
                    }

                    $('#formTransporters').trigger("reset");
                    $('#ajaxerror').empty();
                    $('#ajaxerror').removeClass("alert alert-danger");
                    $('#myModal').modal("hide");
                    successMessage();
                },
                error: function (data) {
                    //console.log('Error:', data);
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
        }
    });

    $('#search').on('keyup',function () {
       $value=$(this).val();
        if($value!=''){
       $.ajax({
            type:'get',
            url:'/search/transporter',
            data:{'transporter':$value},
           success:function(data){
                console.log(data)
                if(data.length==0){
                    $('#transporter-list').empty();
                    $('#transporter-list').append('<p class="text-center">No results found</p>')
                }else{
                    $('#transporter-list').empty();
                    for (i=0;i<data.length;i++){
                        var transporter = '<tr id="transporter' + data[i].id + '"><td>' + data[i].id + '</td><td>' + data[i].name + '</td><td>' + data[i].cif + '</td><td>' + data[i].phone_number + '</td>';
                        transporter += '<td><button style="margin-right: 2px !important;" class="btn btn-warning btn-xs btn-detail open-modal" value="' + data[i].id + '"><span class="hidden-sm-down">Edit</span><i class="fa fa-pencil hidden-md-up" aria-hidden="true"></i></button>';

                        transporter += '<button style="margin-left: 2px !important;" class="btn btn-danger btn-xs btn-delete delete-transporter" value="' + data[i].id + '"><span class="hidden-sm-down">Delete</span><i class="fa fa-trash hidden-md-up" aria-hidden="true"></i></button></td></tr>';
                        $('#transporter-list').append(transporter);
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

function valdateAllergyForm() {
    var retorn = true;
    if (!validateName($('#name').val())) {
        $('#name').css('border-color', "#a94442");
        retorn = false;
    }else{
        $('#name').css('border-color', "#5cb85c");
    }
   // if ($('#cif').val()) {
        if (!validateCIF($('#cif').val())) {
            $('#cif').css('border-color', "#a94442");
            retorn = false;
        }else{
            $('#cif').css('border-color', "#5cb85c");
        }
   // }

   // if ($('#phone_number').val()) {
        if (!validatePhone($('#phone_number').val())) {
            $('#phone_number').css('border-color', "#a94442");
            retorn = false;
        }else{
            $('#phone_number').css('border-color', "#5cb85c");
        }
    //}
    console.log(retorn);
    return retorn;
}
