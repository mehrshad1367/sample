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
      url: 'getinfo/' + record_id,
      type: 'POST',
      success: function (response) {
        window.location.replace($("#btn_click").attr("href"));
      }
    });
  });

    $(document).on('click', '.pagination a', function(event){
    event.preventDefault();
    var page = $(this).attr('href').split('page=')[1];
    fetch_data(page);
  });

});
function fetch_data(page) {

  $.ajax({
    url: "authorPortal/fetch_data?page=" + page,
    success: function(data) {
      $('#table_container').html(data);
    }
  });

}
