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
          url: 'product/active-status/'+update_id,
          data: data,
          success:function(result) {
            if(result.status=="success"){
              toastr.success(result.msg);
              setTimeout(function() {
                // location.reload()
              }, 1000);
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
          url: 'product/deactive-status/'+update_id,
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
    lineColors: ['#819C79', '#fc8710', '#FF6541', '#A4ADD3'],
    hideHover: 'auto',
    parseTime: false,
    xkey: 'period',
    ykeys: ['order', 'sales', 'profit'],
    labels: ['order', 'sales', 'profit'],
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


$(document).ready(function() {
  $('.cancelbtn').on('click', function() {
    $tr = $(this).closest('tr');
    var result = $tr.children("td").map(function() {
      return $(this).text();
    }).get();
    // console.log(data);
    $('#id').val(result[0])
  });

  $('#cancelForm').on('submit', function(e) {
    e.preventDefault();
    var id = $('#id').val();
    $.ajax({
      type: 'POST',
      url: "cancelorder/"+id,
      data: $('#cancelForm').serialize(),
      success: function(result) {
        if(result.status=="success"){
          toastr.success(result.msg);
          setTimeout(function() {
            location.reload()
        }, 1500);
        }
      }
    });
  });
});

//active product
$(document).ready(function(){
  $('.deactiveproduct').on('click',function(e) {
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
          // "id": update_id,
        };
        $.ajax({
          type: "GET",
          url: 'product/active-product/'+update_id,
          data: data,
          success:function(result) {
            if(result.status=="success"){
              toastr.success(result.msg);
              setTimeout(function() {
                location.reload()
              }, 1000);
            }
          }
        });
      }
    });
  });
});

$(document).ready(function(){
  $('.activeproduct').on('click', function(e) {
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
          url: 'product/deactive-product/'+update_id,
          data: data,
          success:function(result) {
            if(result.status=="success"){
              toastr.success(result.msg);
              setTimeout(function() {
                location.reload()
              }, 1000);
            }
          }
        });
      }
    });
  });
});

//active customer
$(document).ready(function(){
  $('.deactivecustomer').on('click',function(e) {
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
          // "id": update_id,
        };
        $.ajax({
          type: "GET",
          url: 'customer/active-customer/'+update_id,
          data: data,
          success:function(result) {
            if(result.status=="success"){
              toastr.success(result.msg);
              setTimeout(function() {
                location.reload()
              }, 1000);
            }
          }
        });
      }
    });
  });
});

$(document).ready(function(){
  $('.activecustomer').on('click', function(e) {
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
          url: 'customer/deactive-customer/'+update_id,
          data: data,
          success:function(result) {
            if(result.status=="success"){
              toastr.success(result.msg);
              setTimeout(function() {
                location.reload()
              }, 1000);
            }
          }
        });
      }
    });
  });
});