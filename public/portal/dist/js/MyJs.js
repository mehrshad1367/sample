$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});

//--------------------------Submit new post---------------------
// function insert_record() {
// $.post("ipGetter.php", function (data) {
//   $("#btn_click").val(data);
// });




$(document).ready(function () {
  $("#btn_click").click(function (event) {
    event.preventDefault();

    var record_id = $(this).data('id');

    $.ajax({
      url: 'getinfo/'+ record_id,
      type: 'POST',
      success: function (response) {
        window.location.replace($("#btn_click").attr("href"));
      }
    });
  });
});

