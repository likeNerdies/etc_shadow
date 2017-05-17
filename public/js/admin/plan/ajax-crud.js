$(document).ready(function() {

  var url = "/admin/transporters";

  // CANVIAR PER PLANS

  //display modal form for transporter editing
    $(document).on('click', '.open-modal', function(e) {
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
            },
            error: function (data) {
                //console.log('Error:', data);
                $('.error').addClass("alert alert-danger");
                $('.error').html("<p>" + data.responseText + "</p>");
            }
        });
    });

    //create new transporter / update existing transporter
    $("#btn-save").click(function (e) {
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
        console.log("id: " +transporter_id);
        var my_url = url;

        if (state == "update"){
          console.log("update");
            type = "PUT"; //for updating existing resource
            my_url += '/' + transporter_id;
        }
        console.log("URL:"+my_url);
        console.log(formData);

        $.ajax({
            type: type,
            url: my_url,
            data: formData,
            dataType: 'json',
            success: function (data) { // success:
                console.log(data);

                var transporter = '<tr id="transporter' + data.id + '"><td>' + data.id + '</td><td>' + data.name + '</td><td>' + data.cif + '</td><td>' + data.phone_number + '</td>';
                transporter += '<td><button class="btn btn-warning btn-xs btn-detail open-modal" value="' + data.id + '">Edit</button>';
                transporter += '<button class="btn btn-danger btn-xs btn-delete delete-transporter" value="' + data.id + '">Delete</button></td></tr>';

                if (state == "add"){ //if user added a new record
                    $('#transporter-list').append(transporter);
                }else{ //if user updated an existing record

                    $("#transporter" + transporter_id).replaceWith( transporter );
                }

                $('#formTransporters').trigger("reset");

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
                        transporter += '<td><button class="btn btn-warning btn-xs btn-detail open-modal" value="' + data[i].id + '">Edit</button>';
                        transporter += '<button class="btn btn-danger btn-xs btn-delete delete-transporter" value="' + data[i].id + '">Delete</button></td></tr>';
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
