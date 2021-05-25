@extends('front/layout')

@section('container')

<div id="checkout">
    <div class="grid wide">
        <div class="container">
            <form action="" id="form-checkout" class="row">
                <div class="main-checkout col l-8 c-12 m-12">
                    <div class="main-content">
                        <div class="section-header">
                            <h2>Thông tin giao hàng</h2>
                        </div>
                        <div class="section-content">
                            <div class="infor-cus">
                                <h3>1. Nhập thông tin</h3>
                                @if(session()->has('FRONT_USER_LOGIN') == null)
                                <p>Bạn có đã tài khoản? <a href="{{url('/login')}}">Đăng nhập ngay</a></p>
                                @endif
                            </div>
                            <div class="input-infor">
                                <div class="input-infor-name">
                                    <input type="text" name="fullname" id="fullname" placeholder="Họ và tên" value="{{$customers['name']}}" required>
                                </div>
                                <div class="input-infor-email">
                                    <input type="email" name="email" id="email" placeholder="Email" value="{{$customers['email']}}" required>
                                    <input type="tel" name="tel" id="tel" placeholder="Số điện thoại" value="{{$customers['mobile']}}" required>
                                </div>
                                <div class="input-infor-address">
                                    <input type="text" name="address" id="address" placeholder="Địa chỉ" value="{{$customers['address']}}" required>
                                </div>
                            </div>
                        </div>
                        <div class="section-notice">
                            <div class="input-notice">
                                <h3>Ghi chú đơn hàng</h3>
                                <textarea name="description" id="cus-description" cols="30" rows="5" placeholder="Ghi chú"></textarea>
                            </div>
                        </div>
                        <div class="section-payment-method">
                            <div class="infor-cus">
                                <h3>2. Chọn hình thức giao hàng</h3>
                            </div>
                            <div class="payment-method">
                                <div class="method-cod">
                                    <label for="radio1" class="radio-label">
                                        <div class="radio-input">
                                            <input type="radio" name="paymentMethod">
                                        </div>
                                        <img src="assets/font/Icon/Vector.png" alt="">
                                        <div class="radio-primary">
                                            <span>Thanh toán khi nhận hàng (COD)</span>
                                            <p>Miễn phí vận chuyển cho mọi đơn hàng trên 2.000.000đ</p>
                                        </div>
                                    </label>
                                </div>
                                <div class="method-banking">
                                    <label for="radio2" class="radio-label">
                                        <div class="radio-input">
                                            <input type="radio" name="paymentMethod">
                                        </div>
                                        <img src="assets/font/Icon/Vector2.png" alt="">
                                        <div class="radio-primary">
                                            <span>Thanh toán chuyển khoản</span>
                                        </div>
                                    </label>
                                </div>                        
                            </div>
                        </div>
                        <button class="submit" type="submit">Đặt hàng</button>
                        <div class="section-footer">
                            <a href="{{url('/cart')}}">QUAY LẠI GIỎ HÀNG</a>
                        </div>
                    </div>
                </div>
                <div class="order-summary-info col l-4 c-12 m-12">
                    <div class="cart-info-content">
                        <div class="infoCus">
                            <h3>Giỏ hàng của bạn</h3>
                        </div>
                        @php
                            $totalPrice = 0;
                        @endphp
                        @foreach($cart_data as $data)

                        @php
                            $totalPrice += ($data->price * $data->qty)
                        @endphp

                        <div class="product-table">
                            <div class="product-img">
                                <img src="{{asset('storage/media/Products/'. $data->image)}}" alt="Vans Old Skool">
                            </div>
                            <div class="product-description">
                                <span class="checkout-name">{{$data->name}}</span>
                                <span class="checkout-option">Size: {{$data->size}}</span>
                                <span class="checkout-option">Số lượng: {{$data->qty}}</span>
                            </div>
                            <div class="product-prices">
                                <strong>{{$data->price * $data->qty}} đ</strong>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="order-discount">
                        <div class="discount-content">
                            <div class="discount-code">
                                <input type="text" class="input-code" placeholder="Nhập mã giảm giá">
                                <button class="apply-code">Áp dụng</button>
                            </div>
                            <div class="order-summary">
                                <div>
                                    <h3>Tóm tắt đơn hàng</h3>
                                </div>
                                <div class="order-box">
                                    <span>Tạm tính:</span>
                                    <strong class="totals-price1">{{$totalPrice}} đ</strong>
                                </div>
                                <div class="order-box">
                                    <span>Phí giao hàng:</span>
                                    <strong>0đ</strong>
                                </div>
                                <div class="order-box">
                                    <span>Giảm giá:</span>
                                    <strong>-0đ</strong>
                                </div>
                                <div class="order-box-totals">
                                    <strong>Tổng tiền:</strong>
                                    <strong class="totals-price2">1,200,000đ</strong>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="noteCheckout">
                        <p>
                            Grey.B sẽ XÁC NHẬN đơn hàng bằng TIN NHẮN SMS hoặc GỌI ĐIỆN. Bạn vui lòng kiểm tra TIN NHẮN hoặc NGHE MÁY ngay khi đặt hàng thành công và CHỜ NHẬN HÀNG
                        </p>
                    </div>
                    <button class="submit" type="submit">Đặt hàng</button>
                    <div class="section-footer-mobile">
                        <a href="cart.html">QUAY LẠI GIỎ HÀNG</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
