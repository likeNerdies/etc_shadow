$(document).ready(function() {

  var url = "/admin/plans";



  //display modal form for transporter editing
    $(document).on('click', '.open-modal', function(e) {
   // $('.open-modal').click(function() {
        $('#ajaxerror').empty();
        $('#ajaxerror').removeClass("alert alert-danger");
        $('input').removeAttr( "style" );
        $('textarea').removeAttr( "style" );
        var plan_id = $(this).val();
      //  console.log("transporter_id: " + plan_id);

        $.get(url + '/' + plan_id, function (data) {
            //success data
          //  console.log(data)
            $('#id').val(data.id);
            $('#name').val(data.name);
            $('#price').val(data.price);
            $('#info').val(data.info);
            $('#btn-save').val("update");

            $('#myModal').modal('show');
        })
    });

    //display modal form for creating new plan
    $(document).on('click', '#btn-add', function(e) {
   // $('#btn-add').click(function() {
        $('#ajaxerror').empty();
        $('#ajaxerror').removeClass("alert alert-danger");
        $('input').removeAttr( "style" );
        $('textarea').removeAttr( "style" );
        $('#btn-save').val("add");
        $('#formTransporters').trigger("reset");
        $('#myModal').modal('show');
    });

    //delete transporter and remove it from list
    $(document).on('click', '.delete-plan', function(e) {
   // $('.delete-plan').click(function() {
        var plan = $(this).val();
     //   console.log("plan: " + plan);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "DELETE",
            url: url + '/' + plan,
            success: function (data) {
              //  console.log(data);
                $("#plan" + plan).remove();
                $('#ajaxerror').empty();
                $('#ajaxerror').removeClass("alert alert-danger");
                successMessage();
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
        if (valdateForm()) {
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
          //  console.log("id: " + plan_id);
            var my_url = url;

            if (state == "update") {
             //   console.log("update");
                type = "PUT"; //for updating existing resource
                my_url += '/' + plan_id;
            }
           // console.log("URL:" + my_url);
          //  console.log(formData);

            $.ajax({
                type: type,
                url: my_url,
                data: formData,
                dataType: 'json',
                success: function (data) { // success:
                  //  console.log(data);

                    var plan = '<tr id="plan' + data.plan.id + '"><td id="id">' + data.plan.id + '</td><td>' + data.plan.name + '</td><td>' + data.plan.price + '</td>';

                    if (data.plan.info != null) {
                        plan += '<td class="media-767-delete">' + data.plan.info + '</td>';
                    } else {
                        plan += '<td class="media-767-delete"></td>';
                    }

                    if(data.can_create){
                    plan += '<td><button style="margin-right: 2px !important;" class="btn btn-warning btn-xs btn-detail open-modal" value="' + data.plan.id + '"><span class="hidden-sm-down">Edit</span><i class="fa fa-pencil hidden-md-up" aria-hidden="true"></i></button>';
                    plan += '<button style="margin-left: 2px !important;" class="btn btn-danger btn-xs btn-delete delete-plan" value="' + data.plan.id + '"><span class="hidden-sm-down">Delete</span><i class="fa fa-trash hidden-md-up" aria-hidden="true"></i></button>';
                    }else{
                        plan+="<td></td>";
                    }
                    if (state == "add") { //if user added a new record
                        $('#plan-list').append(plan);
                    } else { //if user updated an existing record

                        $("#plan" + plan_id).replaceWith(plan);
                    }

                    $('#formPlans').trigger("reset");
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
            url:'/search/plan',
            data:{'plan':$value},
           success:function(data){
              //  console.log(data)
                if(data.plan.length==0){
                    $('#plan-list').empty();
                    $('#plan-list').append('<p class="text-center">No results found</p>')
                }else{
                    $('#plan-list').empty();
                    for (i=0;i<data.plan.length;i++){

                        var plan = '<tr id="plan' + data.plan[i].id + '"><td id="id">' + data.plan[i].id + '</td><td>' + data.plan[i].name + '</td><td>' + data.plan[i].price + '</td>';

                        if(data.plan[i].info!=null){
                            plan+='<td class="media-767-delete">' + data.plan[i].info + '</td>';
                        }else{
                            plan+='<td class="media-767-delete"></td>';
                        }
                        if(data.can_create){
                        plan += '<td><button style="margin-right: 2px !important;" class="btn btn-warning btn-xs btn-detail open-modal" value="' + data.plan[i].id + '"><span class="hidden-sm-down">Edit</span><i class="fa fa-pencil hidden-md-up" aria-hidden="true"></i></button>';
                        plan += '<button style="margin-left: 2px !important;" class="btn btn-danger btn-xs btn-delete delete-plan" value="' + data.plan[i].id + '"><span class="hidden-sm-down">Delete</span><i class="fa fa-trash hidden-md-up" aria-hidden="true"></i></button></td></tr>';
                        }else{
                            plan+="<td></td>";
                        }
                        $('#plan-list').append(plan);
                    }

                }
           },
           error:function (data) {
             //  console.log(data);
           }
       });
        }else{
            //todo
        }
    });

});

function valdateForm() {
    var retorn = true;
    if (!validateName($('#name').val())) {
        $('#name').css('border-color', "#a94442");
        retorn = false;
    }else{
        $('#name').css('border-color', "#5cb85c");
    }
    if (!validatePrice($('#price').val())) {
        $('#price').css('border-color', "#a94442");
        retorn = false;
    }else{
        $('#price').css('border-color', "#5cb85c");
    }
    if ($('#info').val()) {
        if (!validateLongText($('#info').val())) {
            $('#info').css('border-color', "#a94442");
            retorn = false;
        }else{
            $('#info').css('border-color', "#5cb85c");
        }
    }
    /*  if (!$('#image').val()) {
     retorn=false;
     $('#image').css('border-color', "#a94442");
     //todo mensaje sellecione imagen
     }*/
  //  console.log(retorn);
    return retorn;
}
