$(document).ready(function() {

  var url = "/admin/plans";



  //display modal form for transporter editing
    $(document).on('click', '.open-modal', function(e) {
   // $('.open-modal').click(function() {
        var plan_id = $(this).val();
        console.log("transporter_id: " + plan_id);

        $.get(url + '/' + plan_id, function (data) {
            //success data
            $('#id').val(data.id);
            $('#name').val(data.name);
            $('#price').val(data.cif);
            $('#info').val(data.info);
            $('#btn-save').val("update");

            $('#myModal').modal('show');
        })
    });

    //display modal form for creating new plan
    $(document).on('click', '#btn-add', function(e) {
   // $('#btn-add').click(function() {
        $('#btn-save').val("add");
        $('#formTransporters').trigger("reset");
        $('#myModal').modal('show');
    });

    //delete transporter and remove it from list
    $(document).on('click', '.delete-plan', function(e) {
   // $('.delete-plan').click(function() {
        var plan = $(this).val();
        console.log("plan: " + plan);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "DELETE",
            url: url + '/' + plan,
            success: function (data) {
                console.log(data);
                $("#plan" + plan).remove();
            },
            error: function (data) {
                //console.log('Error:', data);
                $('.error').addClass("alert alert-danger");
                $('.error').html("<p>There was an internal error.</p>");
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
            price: $('#price').val(),
            info: $('#info').val(),
        }

        //used to determine the http verb to use [add=POST], [update=PUT]
        var state = $('#btn-save').val();

        var type = "POST"; //for creating new resource
        var plan_id = $('#id').val();
        console.log("id: " +plan_id);
        var my_url = url;

        if (state == "update"){
          console.log("update");
            type = "PUT"; //for updating existing resource
            my_url += '/' + plan_id;
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

                var plan = '<tr id="plan' + data.id + '"><td id="id">' + data.id + '</td><td>' + data.name + '</td><td>' + data.price + '</td>';

                    if(data.info!=null){
                        plan+='<td>' + data.info + '</td>';
                    }else{
                        plan+='<td></td>';
                    }

                plan += '<td><button style="margin-right: 2px !important;" class="btn btn-warning btn-xs btn-detail open-modal" value="' + data.id + '"><span class="hidden-sm-down">Edit</span><i class="fa fa-pencil hidden-md-up" aria-hidden="true"></i></button>';

                plan += '<button style="margin-left: 2px !important;" class="btn btn-danger btn-xs btn-delete delete-plan" value="' + data.id + '"><span class="hidden-sm-down">Delete</span><i class="fa fa-trash hidden-md-up" aria-hidden="true"></i></button>';

                if (state == "add"){ //if user added a new record
                    $('#plan-list').append(plan);
                }else{ //if user updated an existing record

                    $("#plan" + plan_id).replaceWith( plan );
                }

                $('#formPlans').trigger("reset");

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
            url:'/search/plan',
            data:{'plan':$value},
           success:function(data){
                console.log(data)
                if(data.length==0){
                    $('#plan-list').empty();
                    $('#plan-list').append('<p class="text-center">No results found</p>')
                }else{
                    $('#plan-list').empty();
                    for (i=0;i<data.length;i++){

                        var plan = '<tr id="plan' + data[i].id + '"><td id="id">' + data[i].id + '</td><td>' + data[i].name + '</td><td>' + data[i].price + '</td>';

                        if(data.info!=null){
                            plan+='<td>' + data[i].info + '</td>';
                        }else{
                            plan+='<td></td>';
                        }

                        plan += '<td><button style="margin-right: 2px !important;" class="btn btn-warning btn-xs btn-detail open-modal" value="' + data[i].id + '"><span class="hidden-sm-down">Edit</span><i class="fa fa-pencil hidden-md-up" aria-hidden="true"></i></button>';

                        plan += '<button style="margin-left: 2px !important;" class="btn btn-danger btn-xs btn-delete delete-plan" value="' + data[i].id + '"><span class="hidden-sm-down">Delete</span><i class="fa fa-trash hidden-md-up" aria-hidden="true"></i></button></td></tr>';

                        $('#plan-list').append(plan);
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
