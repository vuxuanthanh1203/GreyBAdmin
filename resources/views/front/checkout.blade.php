@extends('front/layout')
@section('page_title', 'Checkout')
@section('container')

    <!-- ...:::: Start Checkout Section:::... -->
    <div class="checkout-section">
        <div class="container">
            <div class="row">
                <div class="col-12" style="margin: 70px 0">
                    <h3 class="breadcrumb-title text-center"> Checkout </h3>
                    <div class="breadcrumb-nav breadcrumb-nav-color--black breadcrumb-nav-hover-color--golden">
                        <nav aria-label="breadcrumb">
                            <ul>
                                <li><a href="{{url('/')}}">Home</a></li>
                                <li><a href="{{url('category/sneakers')}}">Shop</a></li>
                                <li class="active" aria-current="page">Checkout</li>
                            </ul>
                        </nav>
                    </div>
                </div>
                @if(session()->has('FRONT_USER_LOGIN') == null)
                <!-- User Quick Action Form -->
                <div class="col-12">
                    <div class="user-actions accordion" data-aos="fade-up" data-aos-delay="0">
                        <h3>
                            <i class="fas fa-flag" aria-hidden="true"></i>
                            Do you already have an account?
                            <a class="Returning" href="{{url('/login')}}" >Click here to login</a>
                        </h3>
                    </div>
                </div>
                @endif
                <!-- User Quick Action Form -->
            </div>
            <!-- Start User Details Checkout Form -->
            <div class="checkout_form" data-aos="fade-up" data-aos-delay="400">
                <div class="row">
                    <form action="" id="frmPlaceOrder" class="row">
                    <div class="col-lg-6 col-md-6">
                            <h3>Shipment Details</h3>
                            <div class="row">
                                <div class="col-12">
                                    <div class="default-form-box">
                                        <label>Name</label>
                                        <input type="text" name="name" id="fullname" value="{{$customers['name']}}" required>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="default-form-box">
                                        <label>Email</label>
                                        <input type="email" name="email" id="email" value="{{$customers['email']}}" required>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="default-form-box">
                                        <label>Mobile</label>
                                        <input type="text" name="mobile" id="tel" value="{{$customers['mobile']}}" required>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="default-form-box">
                                        <label>Address</label>
                                        <input type="text" name="address" id="address" value="{{$customers['address']}}" required>
                                    </div>
                                </div>
                                <div class="col-12 mt-3">
                                    <div class="order-notes">
                                        <label for="order_note">Order Notes</label>
                                        <textarea id="order_note" name="note" 
                                            placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="coupon_code left">
                                        <h3>Coupon</h3>
                                        <div class="coupon_inner">
                                            <p>Enter your coupon code if you have one.</p>
                                            <input class="mb-2" placeholder="Coupon code" name="coupon_code" id="coupon_code" type="text">
                                            <input type="button" onclick="applyCouponCode()" class="btn btn-md btn-golden" value="Apply coupon">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <div class="col-lg-6 col-md-6">
                            <h3>Your order</h3>
                            <div class="order_table table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                        $totalPrice = 0;
                                        $value = 0;
                                        $ship = 0;
                                        @endphp
                                        @foreach($cart_data as $data)

                                        @php
                                            $totalPrice += ($data->price * $data->qty)
                                        @endphp
                                        <tr>
                                            <td> <strong> {{$data->name}} </strong> × {{$data->qty}} <br> Size: {{$data->size}}</td>
                                            <td> {{number_format($data->price * $data->qty)}} VND</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Cart Subtotal</th>
                                            <td>{{number_format($totalPrice)}} VND</td>
                                        </tr>
                                        <tr>
                                            <th>Shipping</th>
                                            @php
                                            if($totalPrice < 1000000){
                                                $ship = 15000;
                                            } else {
                                                $ship = 0;
                                            }
                                            @endphp
                                            <td style="text-align:right;">{{number_format($ship)}} VND</td>
                                        </tr>
                                        <tr>
                                            <th>Coupon</th>
                                            <td class="coupon-info">
                                                <p id="coupon_code_str">- {{number_format($value)}} VND</p>
                                                <span id="coupon_type"></span>
                                            </td>
                                            
                                        </tr>
                                        <tr class="order_total">
                                            <th>Order Total</th>
                                            <td id="total_price"><strong>{{number_format($totalPrice + $ship)}} VND</strong></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <div class="payment_method">
                                <div class="panel-default">
                                    <label class="checkbox-default" for="cod" data-bs-toggle="collapse"
                                        data-bs-target="#methodCod">
                                        <input type="checkbox" id="cod" name="payment_type" value="COD" required>
                                        <span>Cash on Delivery</span>
                                    </label>

                                    <div id="methodCod" class="collapse" data-parent="#methodCod">
                                        <div class="card-body1">
                                            <p>Free shipping for all orders over 1,000,000 VND</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="checkout-btn-group">
                                    <div class="order_button pt-3">
                                        <button class="btn btn-md btn-black-default-hover" type="submit">Place Order</button>
                                    </div>
                                    <div class="order_button pt-3 back-cart">
                                        <a href="{{url('/cart')}}" class="btn btn-md btn-black-default-hover">Back To Cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @csrf
                    </form>
                </div>
            </div> <!-- Start User Details Checkout Form -->
        </div>
    </div><!-- ...:::: End Checkout Section:::... -->


@endsection
