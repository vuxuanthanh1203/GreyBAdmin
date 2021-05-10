@extends('admin/layout')
@section('page_title', 'Order Details')
@section('container')
<div class="content">
   <!-- Start Content-->
   <div class="container-fluid">
      <!-- start page title -->
      <div class="row">
         <div class="col-12">
            <div class="page-title-box">
               <h3 class="page-title">Order Details</h3>
               <div class="page-title-right">
                  <ol class="breadcrumb p-0 m-0">
                     <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Home</a></li>
                     <li class="breadcrumb-item"><a href="#">Order</a></li>
                     <li class="breadcrumb-item active"><a href="#">Order Details</a></li>
                  </ol>
               </div>
               <div class="clearfix"></div>
            </div>
         </div>
      </div>
      <!-- end page title -->
      <div class="row card">
         <div class="col-md-6">
            <div class="customer_info">
               <p><strong>Name</strong>: <span style="font-style: italic; text-transform: capitalize">{{$orders_details[0]->name}}</span></p>
               <p><strong>Email</strong>: <span style="font-style: italic">{{$orders_details[0]->email}}</span></p>
               <p><strong>Mobile</strong>: <span style="font-style: italic">{{$orders_details[0]->mobile}}</span></p>
               <p><strong>Address</strong>: <span style="font-style: italic; text-transform: capitalize">{{$orders_details[0]->address}}</span></p>
            </div>
         </div>
         <div class="col-md-6">
            <div class="order_detail">
               <p><strong>Order Status</strong>: <span style="font-style: italic">{{$orders_details[0]->orders_status}}</span></p>
            </div>
         </div>
         <div class="col-md-12">
            <div class="cart-view-area">
               <div class="cart-view-table">
                  <div class="table-responsive">
                     <table class="table order_detail text-center">
                        <thead class="thead-dark">
                           <tr>
                              <th>Product</th>
                              <th>Image</th>
                              <th>Size</th>
                              <th>Price</th>
                              <th>Qty</th>
                              <th>Total</th>
                           </tr>
                        </thead>
                        <tbody>
                           @php 
                           $totalAmt=0;
                           @endphp
                           @foreach($orders_details as $list)
                           @php 
                           $totalAmt=$totalAmt+($list->price*$list->qty);
                           @endphp
                           <tr>
                              <td>{{$list->pname}}</td>
                              <td><img width="200px" src='{{asset('storage/media/Products/'.$list->pimage)}}'/></td>
                              <td>{{$list->size}}</td>
                              <td>{{$list->price}}</td>
                              <td>{{$list->qty}}</td>
                              <td>{{$list->price*$list->qty}}</td>
                           </tr>
                           @endforeach
                           <tr>
                              <td colspan="4">&nbsp;</td>
                              <td><b>Total</b></td>
                              <td><b>{{$totalAmt}}</b></td>
                           </tr>
                           <?php
                              if($orders_details[0]->coupon_value>0){
                                echo '<tr>
                                  <td colspan="4">&nbsp;</td>
                                  <td><b>Coupon <span class="coupon_apply_txt">('.$orders_details[0]->coupon_code.')</span></b></td>
                                  <td>'.$orders_details[0]->coupon_value.' %</td>
                                </tr>';
                                  $totalAmt=$totalAmt - ($totalAmt * ($orders_details[0]->coupon_value/100));
                                echo '<tr>
                                  <td colspan="4">&nbsp;</td>
                                  <td><b>Final Total</b></td>
                                  <td>'.$totalAmt.'</td>
                                </tr>';
                              }
                              ?>
                        </tbody>
                     </table>
                  </div>
                  <!-- Cart Total view -->
               </div>
            </div>
         </div>
      </div>
      
         
         <div class="form-group text-right mb-0">
            <a href="{{url('admin/order')}}">
              <button type="button" class="btn btn-primary waves-effect waves-light">
                Back
              </button>
            </a>
         </div>
      </div>
   </div>
   <!-- end container-fluid -->
</div>
@endsection