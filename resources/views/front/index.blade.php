@extends('front/layout')

@section('container')
    {{-- <div id="slider">
        <div class="slider">
            <div class="img-box">
                <img src="{{asset('front_assets/img/All_Img/ia_300000013.jpg')}}"
                    class="slider-img">
            </div>
        </div>
        <button class="owl-prev icon-angle-left" onclick="prev()"></button>
        <button class="owl-next icon-angle-right" onclick="next()"></button>
    </div> --}}
    <div id="content">
            <div class="new-product grid wide">
                <div class="title">
                    <h2>NEWS</h2>
                </div>
                <div class="list-product row">
                    <div class="col l-3 c-3 product">
                        <a href="">
                            <img src="{{asset('front_assets/img/All_Img/ia_300000018.jpg')}}">
                            </a>
                    </div>
                    <div class="col l-6 c-6 products">
                        <a href="">
                            <img src="{{asset('front_assets/img/All_Img/ia_300000019.jpg')}}">
                        </a>
                    </div>
                    <div class="col l-3 c-3 product">
                        <a href="">
                            <img src="{{asset('front_assets/img/All_Img/ia_300000020.jpg')}}">
                        </a>
                    </div>
                </div>
            </div>
            <div class="sale-product grid wide">
                <div class="title">
                    <h2>SALE</h2>
                </div>
                <div class="list-product row">
                    @foreach ($home_products_new as $item)
                    <div class="product-item col l-3 c-4 m-4 sm-6">
                        <div class="product-image">
                            <img src="{{asset('storage/media/Products/'.$item->image)}}">
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
                                        <a href="{{url('product/'.$item->slug)}}">Xem chi tiết</a>
                                    </span>
                                </button>
                            </div>
                        </div>
                        <div class="swatch__list">
                            <a class="color-item">
                                <img src="{{asset('storage/media/Products/'.$item->image)}}" alt="">
                            </a>
                        </div>
                        <a href="/puma-slim-softfoam-leather-black-p12816578.html" class="d-block pt-2 tp_product_name">
                            <h1>{{$item->name}}</h1>
                        </a>
                        <span class="special-price">
                            <span class="tp_product_price">
                                <h1>299,000 <sup>đ</sup></h1>
                            </span>
                            <span>
                                <h1>800,000<sup>đ</sup></h1>
                            </span>
                        </span>
                        <div class="product_detail_show">
                            <div class="card-wrapper">
                                <div class="close-product" onclick="toggleproduct();">
                                    <i class="icon-cancel-circled2"></i>
                                </div>
                                <div class="product-imgs">
                                    <div class="img-display">
                                        <div class="img-showcase">
                                            <img src=".{{asset('front_assets/img/All_Img/ia_300000020.jpg')}}"
                                                alt="Image To Zoom" class="magnifying_img">
                                            <img src=".{{asset('front_assets/img/Product detail/ia_100000009.jpg')}}" alt="Image To Zoom"
                                                class="magnifying_img">
                                            <img src=".{{asset('front_assets/img/Product detail/ia_100000012.jpg')}}" alt="Image To Zoom"
                                                class="magnifying_img">
                                            <img src=".{{asset('front_assets/img/Product detail/ia_100000012.jpg')}}" alt="Image To Zoom"
                                                class="magnifying_img">
                                        </div>
                                    </div>
                                    <div class="img-select">
                                        <div class="img-item ">
                                            <a href="#" data-id="1">
                                                <img src="{{asset('front_assets/img/Product detail/ia_1000000010.jpg')}}" alt="image product">
                                            </a>
                                        </div>
                                        <div class="img-item marginleft_6">
                                            <a href="#" data-id="2">
                                                <img src="{{asset('front_assets/img/Product detail/ia_100000010.jpg')}}" alt="image product">
                                            </a>
                                        </div>
                                        <div class="img-item marginleft_6">
                                            <a href="#" data-id="3">
                                                <img src="{{asset('front_assets/img/Product detail/ia_100000011.jpg')}}" alt="image product">
                                            </a>
                                        </div>
                                        <div class="img-item marginleft_6">
                                            <a href="#" data-id="4">
                                                <img src="{{asset('front_assets/img/Product detail/ia_100000012.jpg')}}" alt="image product">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-content">
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
                                        @foreach($home_products_new_attr[$home_products_new[0]->id] as $attr)  
                                            @if($attr->size!='')
                                                <span class="size">{{$attr->size}}</span>
                                            @endif  
                                        @endforeach  
                                        {{-- @foreach ($home_products_new_attr[$item->id] as $productArr)
                                            <span class="size">{{$productArr->size}}</span>
                                        @endforeach --}}
                                    </div>
                                    <h2 class="cart-product">THÊM VÀO GIỎ</h2>
                                    <div class="or-detail">
                                        <h2 class="or">hoặc</h2>
                                        <h2 class="product-detail">Xem chi tiết</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="best-seller grid wide">
                <div class="title">
                    <h2> BEST SELLER</h2>
                </div>
                <div class="list-product row">
                    @foreach ($home_products_hot as $item)
                    <div class="product-item col l-3 c-4 m-4 sm-6">
                        <div class="product-image">
                            <img src="{{asset('storage/media/Products/'.$item->image)}}">
                            <div class="goodsli-discount">
                                <img src="{{asset('front_assets/font/Icon/Path 24.png')}}" alt="">
                                <div>
                                    <h1>62 %</h1>
                                    <h1>off</h1>
                                </div>
                            </div>
                            <div class="button-add">
                                <button onclick="toggleproduct();" class="tp_button">
                                    <span>
                                        <a href="#">Mua ngay</a>
                                    </span>
                                </button>
                                <button title="Xem chi tiết" class="action tp_button"
                                    onclick="location.href='/puma-slim-softfoam-leather-black-p12816578.html'">
                                    <span>
                                        <a href="#">Xem chi tiết</a>
                                    </span>
                                </button>
                            </div>
                        </div>
                        <div class="swatch__list">
                            <a class="color-item">
                                <img src="{{asset('storage/media/Products/'.$item->image)}}" alt="">
                            </a>
                        </div>
                        <a href="/puma-slim-softfoam-leather-black-p12816578.html" class="d-block pt-2 tp_product_name">
                            <h1>{{$item->name}}</h1>
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
                    <div class="product_detail_show">
                        <div class="card-wrapper">
                            <div class="close-product" onclick="toggleproduct();">
                                <i class="icon-cancel-circled2"></i>
                            </div>
                            <div class="product-imgs">
                                <div class="img-display">
                                    <div class="img-showcase">
                                        <img src=".{{asset('front_assets/img/All_Img/ia_300000020.jpg')}}"
                                            alt="Image To Zoom" class="magnifying_img">
                                        <img src=".{{asset('front_assets/img/Product detail/ia_100000009.jpg')}}" alt="Image To Zoom"
                                            class="magnifying_img">
                                        <img src=".{{asset('front_assets/img/Product detail/ia_100000012.jpg')}}" alt="Image To Zoom"
                                            class="magnifying_img">
                                        <img src=".{{asset('front_assets/img/Product detail/ia_100000012.jpg')}}" alt="Image To Zoom"
                                            class="magnifying_img">
                                    </div>
                                </div>
                                <div class="img-select">
                                    <div class="img-item ">
                                        <a href="#" data-id="1">
                                            <img src="{{asset('front_assets/img/Product detail/ia_1000000010.jpg')}}" alt="image product">
                                        </a>
                                    </div>
                                    <div class="img-item marginleft_6">
                                        <a href="#" data-id="2">
                                            <img src="{{asset('front_assets/img/Product detail/ia_100000010.jpg')}}" alt="image product">
                                        </a>
                                    </div>
                                    <div class="img-item marginleft_6">
                                        <a href="#" data-id="3">
                                            <img src="{{asset('front_assets/img/Product detail/ia_100000011.jpg')}}" alt="image product">
                                        </a>
                                    </div>
                                    <div class="img-item marginleft_6">
                                        <a href="#" data-id="4">
                                            <img src="{{asset('front_assets/img/Product detail/ia_100000012.jpg')}}" alt="image product">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="product-content">
                                <h2 class="product-title">Vans Pig Suede Old Skool Purple</h2>
                                <div class="product_codes">
                                    <h2 class="product_code">Mã sản phẩm:</h2>
                                    <h2 class="product-code">29234477</h2>
                                </div>
                                <div class="product_prices">
                                    <h2 class="product-sale">630,000<sup>đ</sup></h2>
                                    <h2 class="product-price">900,000<sup>đ</sup></h2>
                                </div>
                                <p>Kích thước:</p>
                                <div class="sizes">
                                    <span class="size">36</span>
                                    <span class="size">36.5</span>
                                    <span class="size">37</span>
                                    <span class="size">38</span>
                                    <span class="size">38.5</span>
                                    <span class="size">39</span>
                                    <span class="size">42</span>
                                    <span class="size">43</span>
                                    <span class="size">43</span>
                                    <span class="size">44</span>
                                    <span class="size">45</span>
                                    <span class="size">46</span>
                                </div>
                                <h2 class="cart-product">THÊM VÀO GIỎ</h2>
                                <div class="or-detail">
                                    <h2 class="or">hoặc</h2>
                                    <h2 class="product-detail">Xem chi tiết</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    
                </div>
            </div>
            <div class="new-arrival grid wide">
                <div class="title">
                    <h2>NEW ARRIVALS</h2>
                </div>
                <div class="list-product row">
                    @foreach ($home_products_sale as $item)
                    <div class="product-item col l-3 c-4 m-4 sm-6">
                        <div class="product-image">
                            <img src="{{asset('storage/media/Products/'.$item->image)}}">
                            <div class="goodsli-discount">
                                <img src="{{asset('front_assets/font/Icon/Path 24.png')}}" alt="">
                                <div>
                                    <h1>62 %</h1>
                                    <h1>off</h1>
                                </div>
                            </div>
                            <div class="button-add">
                                <button onclick="toggleproduct();" class="tp_button">
                                    <span>
                                        <a href="#">Mua ngay</a>
                                    </span>
                                </button>
                                <button title="Xem chi tiết" class="action tp_button"
                                    onclick="location.href='/puma-slim-softfoam-leather-black-p12816578.html'">
                                    <span>
                                        <a href="#">Xem chi tiết</a>
                                    </span>
                                </button>
                            </div>
                        </div>
                        <div class="swatch__list">
                            <a class="color-item">
                                <img src="{{asset('storage/media/Products/'.$item->image)}}" alt="">
                            </a>
                        </div>
                        <a href="/puma-slim-softfoam-leather-black-p12816578.html" class="d-block pt-2 tp_product_name">
                            <h1>{{$item->name}}</h1>
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
                    <div class="product_detail_show">
                        <div class="card-wrapper">
                            <div class="close-product" onclick="toggleproduct();">
                                <i class="icon-cancel-circled2"></i>
                            </div>
                            <div class="product-imgs">
                                <div class="img-display">
                                    <div class="img-showcase">
                                        <img src=".{{asset('front_assets/img/All_Img/ia_300000020.jpg')}}"
                                            alt="Image To Zoom" class="magnifying_img">
                                        <img src=".{{asset('front_assets/img/Product detail/ia_100000009.jpg')}}" alt="Image To Zoom"
                                            class="magnifying_img">
                                        <img src=".{{asset('front_assets/img/Product detail/ia_100000012.jpg')}}" alt="Image To Zoom"
                                            class="magnifying_img">
                                        <img src=".{{asset('front_assets/img/Product detail/ia_100000012.jpg')}}" alt="Image To Zoom"
                                            class="magnifying_img">
                                    </div>
                                </div>
                                <div class="img-select">
                                    <div class="img-item ">
                                        <a href="#" data-id="1">
                                            <img src="{{asset('front_assets/img/Product detail/ia_1000000010.jpg')}}" alt="image product">
                                        </a>
                                    </div>
                                    <div class="img-item marginleft_6">
                                        <a href="#" data-id="2">
                                            <img src="{{asset('front_assets/img/Product detail/ia_100000010.jpg')}}" alt="image product">
                                        </a>
                                    </div>
                                    <div class="img-item marginleft_6">
                                        <a href="#" data-id="3">
                                            <img src="{{asset('front_assets/img/Product detail/ia_100000011.jpg')}}" alt="image product">
                                        </a>
                                    </div>
                                    <div class="img-item marginleft_6">
                                        <a href="#" data-id="4">
                                            <img src="{{asset('front_assets/img/Product detail/ia_100000012.jpg')}}" alt="image product">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="product-content">
                                <h2 class="product-title">Vans Pig Suede Old Skool Purple</h2>
                                <div class="product_codes">
                                    <h2 class="product_code">Mã sản phẩm:</h2>
                                    <h2 class="product-code">29234477</h2>
                                </div>
                                <div class="product_prices">
                                    <h2 class="product-sale">630,000<sup>đ</sup></h2>
                                    <h2 class="product-price">900,000<sup>đ</sup></h2>
                                </div>
                                <p>Kích thước:</p>
                                <div class="sizes">
                                    <span class="size">36</span>
                                    <span class="size">36.5</span>
                                    <span class="size">37</span>
                                    <span class="size">38</span>
                                    <span class="size">38.5</span>
                                    <span class="size">39</span>
                                    <span class="size">42</span>
                                    <span class="size">43</span>
                                    <span class="size">43</span>
                                    <span class="size">44</span>
                                    <span class="size">45</span>
                                    <span class="size">46</span>
                                </div>
                                <h2 class="cart-product">THÊM VÀO GIỎ</h2>
                                <div class="or-detail">
                                    <h2 class="or">hoặc</h2>
                                    <h2 class="product-detail">Xem chi tiết</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    
                </div>
            </div>
        </div>
        <input type="hidden" id="qty" value="1"/>
        <form id="frmAddToCart">
          <input type="hidden" id="size_id" name="size_id"/>
          <input type="hidden" id="color_id" name="color_id"/>
          <input type="hidden" id="pqty" name="pqty"/>
          <input type="hidden" id="product_id" name="product_id"/>           
          @csrf
        </form>
@endsection
