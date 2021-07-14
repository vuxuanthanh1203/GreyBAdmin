@extends('front/layout')
@section('page_title', 'Cart')
@section('container')

@php
    $totalPrice = 0;
@endphp

<!-- ...:::: Start Cart Section:::... -->
@if(isset($list[0]))
<form action="">
<div class="cart-section">
    <!-- Start Cart Table -->
    <div class="cart-table-wrapper" data-aos="fade-up" data-aos-delay="0">
        <div class="container">
            <div class="row">
                <div class="col-12" style="margin: 70px 0">
                    <h3 class="breadcrumb-title text-center"> Cart </h3>
                    <div class="breadcrumb-nav breadcrumb-nav-color--black breadcrumb-nav-hover-color--golden">
                        <nav aria-label="breadcrumb">
                            <ul>
                                <li><a href="{{url('/')}}">Home</a></li>
                                <li class="active" aria-current="page">Cart </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-12">
                    <div class="table_desc">
                        <div class="table_page table-responsive">
                            <table>
                                <!-- Start Cart Table Head -->
                                <thead>
                                    <tr>
                                        <th class="product_thumb">Image</th>
                                        <th class="product_name">Product</th>
                                        <th class="product_name">Size</th>
                                        <th class="product-price">Price</th>
                                        <th class="product_quantity">Quantity</th>
                                        <th class="product_total">Total</th>
                                        <th class="product_remove">Action</th>
                                    </tr>
                                </thead> <!-- End Cart Table Head -->
                                @foreach($list as $data)
                                @php
                                    $totalPrice += ($data->price * $data->qty)
                                @endphp
                                <tbody>
                                    <!-- Start Cart Single Item-->
                                    <tr class="idProduct" id="cart_box{{$data->attr_id}}">
                                        <td class="product_thumb">
                                            <a href="/product/{{$data->slug}}">
                                                <img src="{{asset('storage/media/Products/'. $data->image)}}" alt="">
                                            </a>
                                        </td>
                                        <td class="product_name">
                                            <a href="/product/{{$data->slug}}">{{$data->name}}</a>
                                        </td>
                                        <td class="product_name">
                                            <p>{{$data->size}}</p>
                                        </td>
                                        <td class="product_name">{{number_format($data->price)}} VND</td>
                                        <td class="product_quantity">
                                            <label>Quantity</label> 
                                            <input id="qty{{$data->attr_id}}" min="1" max="100" value="{{$data->qty}}" onkeypress="return isNumberKey(event)" type="number" onchange="updateQty('{{$data->pid}}','{{$data->size}}','{{$data->attr_id}}','{{$data->price}}')">
                                        </td>
                                        <td class="product_total" id="total_price_{{$data->attr_id}}">{{number_format($data->price * $data->qty)}} VND</td>
                                        <td class="product_remove">
                                            <a href="javascript:void(0)" onclick="deleteCartProduct('{{$data->pid}}','{{$data->size}}','{{$data->attr_id}}')"><i class="fas fa-trash"></i></a>
                                        </td>
                                    </tr> 
                                    <!-- End Cart Single Item-->
                                </tbody>
                                @endforeach  
                            </table>
                        </div>
                        {{-- <div class="cart_submit">
                            <button class="btn btn-md btn-golden" type="submit">update cart</button>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> <!-- End Cart Table -->
</form>
    <!-- Start Coupon Start -->
    <div class="coupon_area" >
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6"></div>
                <div class="col-lg-6 col-md-6">
                    <div class="coupon_code right" data-aos="fade-up" data-aos-delay="400">
                        <h3>Cart Totals</h3>
                        <div class="coupon_inner">
                            <div class="cart_subtotal">
                                <p>Subtotal</p>
                                <p class="cart_amount">{{number_format($totalPrice)}} VND</p>
                            </div>

                            <div class="checkout_btn">
                                <a href="{{url('/checkout')}}" class="btn btn-md btn-golden">Proceed to Checkout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End Coupon Start -->
</div> <!-- ...:::: End Cart Section:::... -->

@else
 <!-- ...::::Start About Us Center Section:::... -->
<div class="empty-cart-section section-fluid" style="margin: 50px 0">
    <div class="emptycart-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-10 offset-md-1 col-xl-6 offset-xl-3">
                    <div class="emptycart-content text-center">
                        <div class="image">
                            <img class="img-fluid" src="{{asset('assets/images/emprt-cart/empty-cart.png')}}" alt="">
                        </div>
                        <h4 class="title">Your Cart is Empty</h4>
                        <h6 class="sub-title">Sorry Mate... No item Found inside your cart!</h6>
                        <a href="{{url('/')}}" class="btn btn-lg btn-golden">Continue Shopping</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> <!-- ...::::End  About Us Center Section:::... -->
@endif

<input type="hidden" id="qty" value="1"/>
<form id="frmAddToCart">
    <input type="hidden" id="size_id" name="size_id">
    <input type="hidden" id="pqty" name="pqty"/>
    <input type="hidden" id="product_id" name="product_id"/>           
    @csrf
  </form>
@endsection
