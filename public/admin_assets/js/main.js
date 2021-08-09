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


$(function() {
  $( "#datepicker" ).datepicker({
    dateFormat: 'yy-mm-dd'
  });
  $( "#datepicker2" ).datepicker({
    dateFormat: 'yy-mm-dd'
  });
});

$(document).ready(function() {
  chart30daysorder();

  var chart = new Morris.Bar({
    element: 'myfirstchart',
    lineColors: ['#819C79', '#fc8710', '#FF6541', '#A4ADD3', '#766B56'],
    hideHover: 'auto',
    parseTime: false,
    xkey: 'period',
    ykeys: ['order', 'sales', 'profit', 'quantity'],
    labels: ['order', 'sales', 'profit', 'quantity'],
  });


  $('.dashboard-filter').change(function() {
    var dashboard_value = $(this).val();
    var _token = $('input[name="_token"]').val();
    
    $.ajax({
      url: 'dashboard-filter',
      method: 'POST',
      dataType: 'json',
      data: {
        dashboard_value: dashboard_value,
        _token: _token
      },
      success: function(data) {
        chart.setData(data);
      }
    });
  });


  function chart30daysorder() {
    var _token = $('input[name="_token"]').val();
    $.ajax({
      url: 'days-order',
      method: 'POST',
      dataType: 'json',
      data: {_token: _token},
      success: function(data) {
        chart.setData(data);
      }
    });
  }


  $('#btn-dashboard-filter').click(function() {
    var _token = $('input[name="_token"]').val();
    var from_date = $( "#datepicker" ).val();
    var to_date = $( "#datepicker2" ).val();
    
    $.ajax({
      url: 'dashboard-filter-by-date',
      method: 'POST',
      dataType: 'json',
      data: {from_date: from_date, to_date: to_date, _token: _token},
      success: function(data) {
        chart.setData(data);
      }
    });
  });
});
