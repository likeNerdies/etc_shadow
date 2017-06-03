$(document).ready(function () {
    $(document).on('click', '#subscribe_btn', function(e) {

        var url = '/user/panel/plan/subscribe';
        var plan_id = $('#plan_id').val();
        var _token = $('input[name="_token"]').val();
        var datas = {"plan_id": plan_id, _token: _token};
        console.log(datas);

        $.ajax({
            type: "POST",
            url: url,
            data: datas,
            dataType: 'json',
            success: function (data) {

                if(data.succeed){
                    $('#subscribe_btn').replaceWith('<div class="alert alert-success" role="alert">  <strong> ' +data.mensaje1+' </strong> '+ data.mensaje2 +'</div> ');
                }
                else{
                    $('#subscribe_btn').replaceWith('<div class="alert alert-warning" role="alert">  <strong>Something went wrong</strong> </div> ');
                }

            },
            error: function (data) {
                //todo
            }

        });

    });
});