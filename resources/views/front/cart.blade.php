@extends('front/layout')

@section('container')
<div id="content_cart">
    <div class="grid wide">
        <div class="row">
            @if(isset($list[0]))
            <form action="">
                <div class="content_cart">
                    <table>
                        <tr class="g">
                            <th class="product_cart">Sản phẩm</th>
                            <th class="size">Size</th>
                            <th class="price">Giá</th>
                            <th>Số lượng</th>
                            <th class="total">Tổng</th>
                            <th class="delete">Thao tác</th>
                        </tr>
                        <tr class="spacing"></tr>
                        @php
                            $totalPrice = 0;
                        @endphp
                        @foreach($list as $data)
                        @php
                            $totalPrice += ($data->price * $data->qty)
                        @endphp
                            <tr id="cart_box{{$data->attr_id}}">
                                <td class="product_cart">
                                    <div class="product__cart">
                                        <img src="{{asset('storage/media/Products/'. $data->image)}}" alt="product-img">
                                        <h1>{{$data->name}}</h1>
                                    </div>
                                </td>
                                <td class="size">{{$data->size}}</td>
                                <td class="price">{{$data->price}} đ</td>
                                <td><input id="qty{{$data->attr_id}}" type="number" value="{{$data->qty}}" min='1' onchange="updateQty('{{$data->pid}}','{{$data->size}}','{{$data->attr_id}}','{{$data->price}}')"></td>
                                <td class="total" id="total_price_{{$data->attr_id}}">{{$data->price * $data->qty}}</td>
                                <td class="delete"><a class="delete" href="javascript:void(0)" onclick="deleteCartProduct('{{$data->pid}}','{{$data->size}}','{{$data->attr_id}}')">Xóa</a></td>
                            </tr>
                        @endforeach  
                        
                    </table>
                    <div id="totals">
                        <div class="totals">
                            <h1>Tổng: {{$totalPrice}} đ</h1>
                        </div>
                        <div class="continued_or_pay">
                            <a href="">TIẾP TỤC MUA SẮM</a>
                            <a href="{{url('/checkout')}}">THANH TOÁN</a>
                        </div>
                    </div>
                </div>
            </form>
            @else
                <div class="col l-6 m-6 s-12 cart-empty">
                    <h3>Cart empty</h3>
                </div>
            @endif
            <div class="content_cart_mobile grid wide">
                <div class="listProductWislist row">
                    <div class="idProduct">
                        <div class="wislistItem row">
                            <div class="img_product_cart col c-3">
                                <a href=""><img src="{{asset('front_assets/img/All_Img/Sale1.jpg')}}" alt=""
                                        class="img__product"></a>
                            </div>
                            <div class="content_product_cart col c-9">
                                <a href="" class="productname">
                                    <h1>Vans Authentic</h1>
                                </a>
                                <h3 class="size">43</h3>
                                <h3 class="count"><input value="1" type="number"></h3>
                                <h3 class="total">1,050,000 đ</h3>
                                <h3 class="delete"><a class="delete" href="">Xóa</a></h3>
                            </div>
                        </div>
                    </div>
                    
                    <div id="totals_mobile">
                        <div class="totals">
                            <h1>Tổng: 2,147,000 đ</h1>
                        </div>
                        <div class="continued_or_pay">
                            <a href="">TIẾP TỤC MUA SẮM</a>
                            <a href="">THANH TOÁN</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<input type="hidden" id="qty" value="1"/>
<form id="frmAddToCart">
    <input type="hidden" id="size_id" name="size_id">
    <input type="hidden" id="pqty" name="pqty"/>
    <input type="hidden" id="product_id" name="product_id"/>           
    @csrf
  </form>
@endsection
