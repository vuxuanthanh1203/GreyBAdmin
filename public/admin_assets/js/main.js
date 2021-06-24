toastr.options = {
  "closeButton": false,
  "debug": false,
  "newestOnTop": false,
  "progressBar": false,
  "positionClass": "toast-top-right",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "3000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}

/** Customer */
$(document).ready(function(){
  $('.deactivebtn').on('click',function(e) {
    e.preventDefault();
    var update_id = $(this).closest("tr").find('.updateStatusbtn').val();
    swal({
      title: "Are you sure?",
      text: "Update This Element Status",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        var data = {
          "_token": $('input[name=_token]').val(),
          "id": update_id,
        };
        $.ajax({
          type: "GET",
          url: 'customer/status/0/'+update_id,
          data: data,
          success:function(result) {
            if(result.status=="success"){
              toastr.success(result.msg);
              setTimeout(function() {
                location.reload()
            }, 1500);
            }
          }
        });
      }
    });
  });
});

$(document).ready(function(){
  $('.activebtn').on('click', function(e) {
    e.preventDefault();
    var update_id = $(this).closest("tr").find('.updateStatusbtn').val();
    swal({
      title: "Are you sure?",
      text: "Update This Element Status",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        var data = {
          "_token": $('input[name=_token]').val(),
          "id": update_id,
        };
        $.ajax({
          type: "GET",
          url: 'customer/status/1/'+update_id,
          data: data,
          success:function(result) {
            if(result.status=="success"){
              toastr.success(result.msg);
              setTimeout(function() {
                location.reload()
            }, 1500);
            }
          }
        });
      }
    });
  });
});