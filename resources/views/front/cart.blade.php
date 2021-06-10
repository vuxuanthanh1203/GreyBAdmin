@extends('front/layout')

@section('container')
<div id="content_cart">
    <div class="grid wide">
        <div class="row">
            @if(isset($list[0]))
            <form action="">
                <div class="content_cart">
                    <div class="row">
                        <div class="page-title">
                            <h1 class="title-head">Giỏ hàng của bạn</h1>
                            {{-- <p>Có <span style="font-weight: 600">2</span> sản phẩm trong giỏ hàng</p> --}}
                        </div>
                        <div class="col l-8 right_cart">
                            <table class="table">
                                <thead>
                                    <tr class="tt">
                                        <td class="image">Hình ảnh</td>
                                        <td class="infoTable">Thông tin</td>
                                        <td>Số lượng</td>
                                        <td>Giá tiền</td>
                                        <td></td>
                                    </tr>
                                </thead>
                                @php
                                    $totalPrice = 0;
                                @endphp
                                @foreach($list as $data)
                                @php
                                    $totalPrice += ($data->price * $data->qty)
                                @endphp
                                <tbody id="wishlist-row40" class="cart">
                                    <tr class="idProduct" id="cart_box{{$data->attr_id}}">
                                        <td class="imageWislist">
                                            <a href="/product/{{$data->slug}}">
                                                <img src="{{asset('storage/media/Products/'. $data->image)}}" alt="product-img">
                                            </a>
                                        </td>
                                        <td class="nameWislist">
                                            <a href="/product/{{$data->slug}}">{{$data->name}}</a>
                                            <p>Size: {{$data->size}}</p>
                                        </td>
                                        <td class="quantityProduct">
                                            <div class="input-groupBtn">
                                                <input id="qty{{$data->attr_id}}" type="number" value="{{$data->qty}}" min='1' onchange="updateQty('{{$data->pid}}','{{$data->size}}','{{$data->attr_id}}','{{$data->price}}')">
                                            </div>
                                        </td>
                                        <td class="cart-price">
                                            <div class="priceWislist">
                                                <span class="priceNew onlyPrice tp_product_price" id="total_price_{{$data->attr_id}}">{{$data->price * $data->qty}} đ</span>
                                            </div>
                                        </td>
                                        <td class="actitonWislist">
                                            <a class="remove-item-cart" href="javascript:void(0)"  onclick="deleteCartProduct('{{$data->pid}}','{{$data->size}}','{{$data->attr_id}}')"><i class="icofont-close-line"></i>
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                                @endforeach  
                            </table>
                        </div>

                        {{-- <div class="content_cart_mobile grid wide">
                            <div class="listProductWislist row ">
                                <div class="idProduct">
                                    <div class="wislistItem row">
                                        <div class="img_product_cart col c-3 m-5 sm-5">
                                            <a href="/product/{{$data->slug}}">
                                                <img src="{{asset('storage/media/Products/'. $data->image)}}" alt="product-img" class="img__product">
                                            </a>

                                        </div>
                                        <div class="content_product_cart col c-9 m-7 sm-7">
                                            <a href="" class="productname">
                                                <h1>{{$data->name}}</h1>
                                            </a>
                                            <h3 class="size">{{$data->size}}</h3>
                                            <h3 class="count">
                                                <input id="qty{{$data->attr_id}}" type="number" value="{{$data->qty}}" min='1' onchange="updateQty('{{$data->pid}}','{{$data->size}}','{{$data->attr_id}}','{{$data->price}}')">
                                            </h3>
                                            <h3 class="total" id="total_price_{{$data->attr_id}}">{{$data->price * $data->qty}} đ</h3>
                                            <a class="delete" href="" onclick="deleteCartProduct('{{$data->pid}}','{{$data->size}}','{{$data->attr_id}}')">Xóa</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                        <div id="totals" class="col l-4 c-12 m-12 left_cart">
                            <div class="orderWrapp">
                                <div class="each-row">
                                    <h3>Tóm tắt đơn hàng</h3>
                                </div>
                                <div class="each-row">
                                    <div class="box-style">
                                        <span class="text-label">Tạm tính: </span>
                                        <strong class="totals">{{$totalPrice}} đ</strong>
                                    </div>
                                </div>
                                <div class="each-row">
                                    <div class="box-style">
                                        <span class="text-label" style="font-weight: 600">Tổng tiền: </span>
                                        <strong class="totals1">{{$totalPrice}} đ</strong>
                                    </div>
                                </div>
                                <div class="each-row">
                                    <a class="btn-large btn-checkout" title="Tiến hành đặt hàng" href="{{url('/checkout')}}">Tiến hành đặt hàng</a>
                                    <a class="btn-large btn-buy" title="Mua thêm sản phẩm" href="/">Mua thêm sản phẩm</a>
                                </div>
                            </div>
                            </div>
                    </div>
                </div>
            </form>
            @else
                <div class="cart-empty">
                    <h3>Không có sản phẩm nào trong giỏ hàng</h3>
                </div>
            @endif
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
