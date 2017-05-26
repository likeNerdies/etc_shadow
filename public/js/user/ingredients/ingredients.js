$(document).ready(function() {
  $(".card").click(function (e) {

    $(this).toggleClass("ingredient-selected");

    $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    e.preventDefault();

    var formData = {
        selected: $(this).hasClass('ingredient-selected')
    }
    //var type = "POST";
    var ingredient_id = $(this).attr('id');
    console.log(formData);
    console.log("id: " + ingredient_id);

    $.ajax({
      type = "POST",
      url: '/ingredients/like',
      data: formData,
      dataType: 'json',
      success: function (data) {
          $(this).css(" border", "1px solid #bf2c1b");
      },
      error: function (data) {
        console.log("Error: " + data);
      }
    });

  })
});;
