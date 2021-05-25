@extends('front/layout')

@section('container')
<div id="productdetail">
    <div class="grid wide">
        <div class="detail-content row">
            @foreach ($product as $item)
                <div class="product-detail-img col l-6 c-12 m-12">
                    <div class="preview-product row ">
                        <img alt="" class="col l-12 c-12 m-12"
                            src="{{asset('storage/media/Products/'.$item->image)}}" id="imagebox" alt="">
                    </div>
                    <div class="product-select row sm-gutter ">
                        <img class="img-product col l-3 c-3" src="{{asset('storage/media/Products/'.$item->image)}}" onclick="clickme(this)">
                        @if(isset($product_img[$product[0]->id][0]))
                            @foreach($product_img[$product[0]->id] as $list)
                            <img class="img-product col l-3 c-3" src="{{asset('storage/media/Products/'. $list->images)}}" onclick="clickme(this)">
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="product-content col l-6 c-12 m-12">
                    <h2 class="product-title">{{$item->name}}</h2>
                    <div class="product_codes">
                        <h2 class="product_code">Mã sản phẩm:</h2>
                        <h2 class="product-code">{{$item->code}}</h2>
                    </div>
                    <div class="product_prices">
                        <h2 class="product-sale">{{$item->price}}<sup>đ</sup></h2>
                        <h2 class="product-price">{{$item->mrp}}<sup>đ</sup></h2>
                    </div>
                    <p>Kích thước:</p>
                    <div class="sizes">
                        @php
                            $arrSize=[];
                            foreach($product_attr[$product[0]->id] as $attr){
                                $arrSize[]=$attr->size;
                            }  
                            $arrSize=array_unique($arrSize);
                        @endphp
                        @foreach($arrSize as $attr)
                            @if($attr!='')
                                <span class="size size-details" onclick="showColor('{{$attr}}')" id="size_{{$attr}}">{{$attr}}</span>
                            @endif  
                        @endforeach  
                    </div>
                    <div class="quantity">
                        <p>Số lượng</p>
                        <form action="">
                            <select name="qty" id="qty" class="select-qty">
                                @for($i = 1; $i < 6; $i++)
                                    <option value="{{$i}}">{{$i}}</option>
                                @endfor
                            </select>
                        </form>
                    </div>
                    <div class="buy-addcart row">
                        <h2 class="cart-product" onclick="add_to_cart('{{$product[0]->id}}','{{$product_attr[$product[0]->id][0]->size_id}}')">THÊM VÀO GIỎ</h2>
                        <h2 class="buy-product">MUA NGAY</h2>
                    </div>
                    <div id="add_to_cart_msg"></div>
                    <div class="product-detail">
                        <div class="accordion-item">
                            <div class="accordion-item-header border_top">
                                THÔNG TIN CHI TIẾT
                            </div>
                            <div class="accordion-item-body">
                                <div class="accordion-item-body-content">
                                    Chưa có bài viết nào
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <div class="accordion-item-header">
                                CHÍNH SÁCH BẢO HÀNH
                            </div>
                            <div class="accordion-item-body">
                                <div class="accordion-item-body-content">
                                    GreyB nhận bảo hành: giày 3 tháng về keo và chỉ, balo: 6 tháng về chỉ (Không
                                    áp dụng với
                                    các sản phẩm sale)
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <div class="accordion-item-header">
                                CHÍNH SÁCH ĐỔI HÀNG
                            </div>
                            <div class="accordion-item-body">
                                <div class="accordion-item-body-content">
                                    GreyB nhận đổi hàng trong vòng 7 ngày với hàng chưa qua sử dụng, đơn đổi
                                    phải bằng hoặc
                                    hơn giá so với đơn cũ, khách hàng vui lòng thanh toán phí ship hai chiều để
                                    được đổi
                                    hàng (Không áp dụng đối với các sản phẩm sale)
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="grid wide">
        <div class="row-2">
            <div class="related-products list-product">
                <div class="title">
                    <h2>Sản phẩm liên quan</h2>
                </div>
                <div class="related row">
                    @foreach ($related_product as $list)
                    <div class="product-item col l-3 c-4 m-4 sm-6">
                        <div class="product-image">
                            <img src="{{asset('storage/media/Products/'.$list->image)}}">
                            <div class="goodsli-discount">
                                <img src="{{asset('front_assets/font/Icon/Path 24.png')}}" alt="">
                                <div>
                                    <h1>62 %</h1>
                                    <h1>off</h1>
                                </div>
                            </div>
                            <div class="button-add">
                                {{-- <button onclick="toggleproduct();" class="tp_button"> --}}
                                <button class="tp_button">
                                    <span>
                                        <a href="#">Mua ngay</a>
                                    </span>
                                </button>
                                <button title="Xem chi tiết" class="action tp_button">
                                    <span>
                                        <a href="{{url('product/'.$list->slug)}}">Xem chi tiết</a>
                                    </span>
                                </button>
                            </div>
                        </div>
                        <div class="swatch__list">
                            <a class="color-item">
                                <img src="{{asset('storage/media/Products/'.$list->image)}}" alt="">
                            </a>
                        </div>
                        <a href="/puma-slim-softfoam-leather-black-p12816578.html" class="d-block pt-2 tp_product_name">
                            <h1>{{$list->name}}</h1>
                        </a>
                        <span class="special-price">
                            <span class="tp_product_price">
                                <h1>299,000 <sup>đ</sup></h1>
                            </span>
                            <span>
                                <h1>800,000<sup>đ</sup></h1>
                            </span>
                        </span>
                        
                    </div>
                    @endforeach
                </div>
                
            </div>
        </div>
    </div>
</div>

<form id="frmAddToCart">
    <input type="hidden" id="size_id" name="size_id">
    <input type="hidden" id="pqty" name="pqty"/>
    <input type="hidden" id="product_id" name="product_id"/>           
    @csrf
  </form>
@endsection
