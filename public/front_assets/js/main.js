// const sizes = document.querySelectorAll('.size');

// function changeSize(){
// 	sizes.forEach(size => size.classList.remove('active'));
// 	this.classList.add('active');
// }

// sizes.forEach(size => size.addEventListener('click',changeSize));

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


function showColor(size){
    jQuery('#size_id').val(size);
    jQuery('.size_'+size).show();
  }

function add_to_cart(id, size_str_id){
    // jQuery('#add_to_cart_msg').html('');
    var size_id = jQuery('#size_id').val();

    if(size_str_id==0){
        size_id='no';
    }
    if(size_id=='' && size_id!='no'){
      setTimeout(() => {
        toastr.error('Bạn chưa chọn size !!!');
        },500)
        // jQuery('#add_to_cart_msg').html('Please select size');
    }
    else{
        jQuery('#product_id').val(id);
        jQuery('#pqty').val(jQuery('#qty').val());
        jQuery.ajax({
          url:'/add_to_cart',
          data:jQuery('#frmAddToCart').serialize(),
          type:'post',
          success:function(result){
            // alert('Product '+result.msg)
            setTimeout(() => {
              toastr.success(result.msg);
              },500)
          }
        });
    }
}

function updateQty(pid,size,attr_id,price){
    jQuery('#size_id').val(size);
    var qty=jQuery('#qty'+attr_id).val();
    jQuery('#qty').val(qty)
    add_to_cart(pid,size);
    jQuery('#total_price_'+attr_id).html(qty*price);
}

function deleteCartProduct(pid,size,attr_id){
    jQuery('#size_id').val(size);
    jQuery('#qty').val(0)
    add_to_cart(pid,size);
    //jQuery('#total_price_'+attr_id).html('Rs '+qty*price);
    jQuery('#cart_box'+attr_id).hide();
  }

jQuery('#frmLogin').submit(function(e){
  jQuery('#login_msg').html("");
  e.preventDefault();
  jQuery.ajax({
    url:'/login_process',
    data:jQuery('#frmLogin').serialize(),
    type:'post',
    success:function(data){
      if(data.status=="error"){
        setTimeout(() => {
          toastr.error(data.msg);
          },500)
      }
      if(data.status=="success"){
        setTimeout(() => {
          toastr.success(data.msg);
          },500)
        window.location.href='/'
      }
    },
  });
});

function applyCouponCode() {
  var coupon_code = jQuery('#coupon_code').val();
  if(coupon_code != '') {
    jQuery.ajax({
      type:'post',
      url:'/apply_coupon_code',
      data:'coupon_code='+coupon_code+'&_token='+jQuery("[name='_token']").val(),
      success:function(result){
        if(result.status=="success"){
          setTimeout(() => {
            toastr.success(result.msg);
            },500)
        }
        if(result.status=="error"){
          setTimeout(() => {
            toastr.error(result.msg);
            },500)
        }
      }
    });
  }
}

jQuery('#frmPlaceOrder').submit(function(e){
  // jQuery('#order_place_msg').html("Please wait...");
  e.preventDefault();
  jQuery.ajax({
    url:'/place_order',
    data:jQuery('#frmPlaceOrder').serialize(),
    type:'post',
    success:function(result){
      if(result.status=="success"){
        setTimeout(() => {
          toastr.success(result.msg);
          window.location.href="/order_placed";
          },500)
      }
      if(result.status=="error"){
        setTimeout(() => {
          toastr.error(result.msg);
          },500)
      }
    }
  });
});

function sort_by(){
  var sort_by_value=jQuery('#sort_by_value').val();
  jQuery('#sort').val(sort_by_value);
  jQuery('#categoryFilter').submit();
}

jQuery('#frmRegistration').submit(function(e){
  e.preventDefault();
  jQuery('.field_error').html('');
  jQuery.ajax({
    url:'registration_process',
    data:jQuery('#frmRegistration').serialize(),
    type:'post',
    success:function(result){
      if(result.status=="success"){
          setTimeout(() => {
            toastr.success(result.msg);
            },500)
        }
        if(result.status=="error"){
          jQuery.each(result.error,function(key,val){
            jQuery('#'+key+'_error').html(val[0]);
          });
        }
    }
  });
});