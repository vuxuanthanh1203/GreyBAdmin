@extends('front/layout')
@section('page_title', 'Home')
@section('container')
<div class="hero-slider-section">
    <!-- Slider main container -->
    <div class="hero-slider-active swiper-container">
        <!-- Additional required wrapper -->
        <div class="swiper-wrapper">
            <!-- Start Hero Single Slider Item -->
            <div class="hero-single-slider-item swiper-slide">
                <!-- Hero Slider Image -->
                <div class="hero-slider-bg">
                    <img src="{{asset('assets/images/hero-slider/home-1/hero-slider-1.jpg')}}" alt="">
                </div>
            </div> <!-- End Hero Single Slider Item -->
            <!-- Start Hero Single Slider Item -->
            <div class="hero-single-slider-item swiper-slide">
                <!-- Hero Slider Image -->
                <div class="hero-slider-bg">
                    <img src="{{asset('assets/images/hero-slider/home-1/hero-slider-2.jpg')}}" alt="">
                </div>
            </div> <!-- End Hero Single Slider Item -->
            <div class="hero-single-slider-item swiper-slide">
                <!-- Hero Slider Image -->
                <div class="hero-slider-bg">
                    <img src="{{asset('assets/images/hero-slider/home-1/hero-slider-3.jpg')}}" alt="">
                </div>
            </div> <!-- End Hero Single Slider Item -->
        </div>

        <!-- If we need pagination -->
        <div class="swiper-pagination active-color-golden"></div>

        <!-- If we need navigation buttons -->
        <div class="swiper-button-prev d-none d-lg-block"></div>
        <div class="swiper-button-next d-none d-lg-block"></div>
    </div>
    <!-- End Hero Slider Section-->

    <!-- Start Service Section -->
    <div class="service-promo-section section-top-gap-100" style="margin: 70px 0">
        <div class="service-wrapper">
            <div class="container">
                <div class="row">
                    <!-- Start Service Promo Single Item -->
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="service-promo-single-item" data-aos="fade-up" data-aos-delay="0">
                            <div class="image">
                                <img src="{{asset('assets/images/icons/service-promo-1.png')}}" alt="">
                            </div>
                            <div class="content">
                                <h6 class="title">FREE SHIPPING</h6>
                                <p>Get 10% cash back, free shipping, free returns, and more at 1000+ top retailers!</p>
                            </div>
                        </div>
                    </div>
                    <!-- End Service Promo Single Item -->
                    <!-- Start Service Promo Single Item -->
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="service-promo-single-item" data-aos="fade-up" data-aos-delay="200">
                            <div class="image">
                                <img src="{{asset('assets/images/icons/service-promo-2.png')}}" alt="">
                            </div>
                            <div class="content">
                                <h6 class="title">30 DAYS MONEY BACK</h6>
                                <p>100% satisfaction guaranteed, or get your money back within 30 days!</p>
                            </div>
                        </div>
                    </div>
                    <!-- End Service Promo Single Item -->
                    <!-- Start Service Promo Single Item -->
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="service-promo-single-item" data-aos="fade-up" data-aos-delay="400">
                            <div class="image">
                                <img src="{{asset('assets/images/icons/service-promo-3.png')}}" alt="">
                            </div>
                            <div class="content">
                                <h6 class="title">SAFE PAYMENT</h6>
                                <p>Pay with the world’s most popular and secure payment methods.</p>
                            </div>
                        </div>
                    </div>
                    <!-- End Service Promo Single Item -->
                    <!-- Start Service Promo Single Item -->
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="service-promo-single-item" data-aos="fade-up" data-aos-delay="600">
                            <div class="image">
                                <img src="{{asset('assets/images/icons/service-promo-4.png')}}" alt="">
                            </div>
                            <div class="content">
                                <h6 class="title">LOYALTY CUSTOMER</h6>
                                <p>Card for the other 30% of their purchases at a rate of 1% cash back.</p>
                            </div>
                        </div>
                    </div>
                    <!-- End Service Promo Single Item -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Service Section -->

    <!-- Start Product Default Slider Section -->
    <div class="product-default-slider-section section-top-gap-100 section-fluid section-inner-bg">
        <!-- Start Section Content Text Area -->
        <div class="section-title-wrapper" data-aos="fade-up" data-aos-delay="0">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-content-gap">
                            <div class="secton-content">
                                <h3 class="section-title">THE NEW ARRIVALS</h3>
                                <p>Preorder now to receive exclusive deals & gifts</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Start Section Content Text Area -->
        <div class="product-wrapper" data-aos="fade-up" data-aos-delay="0">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="product-slider-default-1row default-slider-nav-arrow">
                            <!-- Slider main container -->
                            <div class="swiper-container product-default-slider-4grid-1row">
                                <!-- Additional required wrapper -->
                                <div class="swiper-wrapper">
                                    <!-- End Product Default Single Item -->
                                    <!-- Start Product Default Single Item -->
                                    @foreach ($home_products_new as $new)
                                    <div class="product-default-single-item product-color--golden swiper-slide">
                                        <div class="image-box">
                                            <a href="{{url('product/'.$new->slug)}}" class="image-link">
                                                <img src="{{asset('storage/media/Products/'.$new->image)}}">
                                            </a>
                                            <a href="{{url('product/'.$new->slug)}}" class="product-short_desc">
                                                <h5 class="short_desc-title">desc</h5>
                                                <p class="short_desc-content">{!!$new->short_desc!!}</p>
                                            </a>
                                            {{-- <div class="action-link">
                                                <div class="action-link-left">
                                                    <a href="{{url('product/'.$new->slug)}}" data-bs-toggle="modal"
                                                        data-bs-target="#modalAddcart">Add to Cart</a>
                                                </div>
                                                <div class="action-link-right">
                                                    <a href="{{url('product/'.$new->slug)}}" data-bs-toggle="modal"
                                                        data-bs-target="#modalQuickview"><i
                                                            class="icon-magnifier"></i></a>
                                                    <a href="#"><i class="icon-heart"></i></a>
                                                    <a href="#"><i class="icon-shuffle"></i></a>
                                                </div>
                                            </div> --}}
                                        </div>
                                        <div class="content">
                                            <div class="content-left">
                                                <h6 class="title"><a href="{{url('product/'.$new->slug)}}">{{$new->name}}</a></h6>
                                                
                                            </div>
                                            <div class="content-right">
                                                <ul class="review-star">
                                                    <li class="fill"><i class="ion-android-star"></i></li>
                                                    <li class="fill"><i class="ion-android-star"></i></li>
                                                    <li class="fill"><i class="ion-android-star"></i></li>
                                                    <li class="fill"><i class="ion-android-star"></i></li>
                                                    <li class="empty"><i class="ion-android-star"></i></li>
                                                </ul>
                                                <span class="price">{{number_format($new->price)}} VND</span>
                                            </div>

                                        </div>
                                    </div>
                                    @endforeach
                                    <!-- End Product Default Single Item -->
                                </div>
                            </div>
                            <!-- If we need navigation buttons -->
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-button-next"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Product Default Slider Section -->

    <!-- Start Banner Section -->
    <div class="banner-section section-top-gap-100" style="margin: 70px 0">
        <div class="banner-wrapper">
            <div class="container">
                <div class="row d-flex align-items-center mb-n6">
                    <div class="col-xxl-6 col-md-6 mb-6">
                        <!-- Start Banner Single Item -->
                        <a href="{{url('category/sneakers')}}">
                            <div class="banner-single-item banner-style-9 banner-animation banner-color--green float-left"
                                data-aos="fade-up" data-aos-delay="0">
                                <div class="image">
                                    <img class="img-fluid" src="{{asset('assets/images/banner/Rectangle6.png')}}" alt="">
                                </div>
                            </div>
                        </a>
                        <!-- End Banner Single Item -->
                    </div>
                    <div class="col-xxl-5 col-md-6 mb-6">
                        <!-- Start Banner Single Item -->
                        <div class="banner-single-item banner-style-10" data-aos="fade-up" data-aos-delay="200">
                            <a href="{{url('category/backpacks')}}">
                                <div class="banner-animation banner-color--green">
                                    <div class="image">
                                        <img class="img-fluid" src="{{asset('assets/images/banner/Rectangle7.png')}}"
                                            alt="">
                                    </div>
                                </div>
                            </a>
                            <div class="content-out">
                                <div class="inner-out">
                                    <h3 class="inner-title">
                                        <span class="title">Back Pack</span>
                                        <span class="price">575,000 VND</span>
                                    </h3>
                                    <p>A popular mountaineering silhouette, the Herschel Little America™ backpack elevates an iconic style with modern functionality.</p>
                                </div>
                                <a href="{{url('category/backpacks')}}"
                                    class="btn btn-lg btn-outline-aqua icon-space-left">Shop now <span><i
                                            class="ion-ios-arrow-thin-right"></i></span></a>
                            </div>
                        </div>
                        <!-- End Banner Single Item -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Banner Section -->

    <!-- Start Product Default Slider Section -->
    <div class="product-default-slider-section section-top-gap-100 section-fluid section-inner-bg">
        <!-- Start Section Content Text Area -->
        <div class="section-title-wrapper" data-aos="fade-up" data-aos-delay="0">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-content-gap">
                            <div class="secton-content">
                                <h3 class="section-title">BEST SELLERS</h3>
                                <p>Add our best sellers to your weekly lineup</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Start Section Content Text Area -->
        <div class="product-wrapper" data-aos="fade-up" data-aos-delay="0">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="product-slider-default-1row default-slider-nav-arrow">
                            <!-- Slider main container -->
                            <div class="swiper-container product-default-slider-4grid-1row">
                                <!-- Additional required wrapper -->
                                <div class="swiper-wrapper">
                                    <!-- End Product Default Single Item -->
                                    <!-- Start Product Default Single Item -->
                                    @foreach ($home_products_hot as $hot)
                                    <div class="product-default-single-item product-color--golden swiper-slide">
                                        <div class="image-box">
                                            <a href="{{url('product/'.$hot->slug)}}" class="image-link">
                                                <img src="{{asset('storage/media/Products/'.$hot->image)}}">
                                            </a>
                                            {{-- <div class="action-link">
                                                <div class="action-link-left">
                                                    <a href="{{url('product/'.$item->slug)}}" data-bs-toggle="modal"
                                                        data-bs-target="#modalAddcart">Add to Cart</a>
                                                    <a href="#modalAddcart{{$hot->id}}" data-bs-toggle="modal">Add to Cart</a>
                                                </div>
                                                <div class="action-link-right">
                                                    <a href="{{url('product/'.$hot->slug)}}" data-bs-toggle="modal"
                                                        data-bs-target="#modalQuickview"><i
                                                            class="icon-magnifier"></i></a>
                                                    <a href="#"><i class="icon-heart"></i></a>
                                                    <a href="#"><i class="icon-shuffle"></i></a>
                                                </div>
                                            </div> --}}
                                            <div class="product-short_desc">
                                                <h5 class="short_desc-title">desc</h5>
                                                <p>{!!$new->short_desc!!}</p>
                                            </div>
                                        </div>
                                        <div class="content">
                                            <div class="content-left">
                                                <h6 class="title"><a href="{{url('product/'.$hot->slug)}}">{{$hot->name}}</a></h6>
                                                
                                            </div>
                                            <div class="content-right">
                                                <ul class="review-star">
                                                    <li class="fill"><i class="ion-android-star"></i></li>
                                                    <li class="fill"><i class="ion-android-star"></i></li>
                                                    <li class="fill"><i class="ion-android-star"></i></li>
                                                    <li class="fill"><i class="ion-android-star"></i></li>
                                                    <li class="empty"><i class="ion-android-star"></i></li>
                                                </ul>
                                                <span class="price">{{number_format($hot->price)}} VND</span>
                                            </div>

                                        </div>
                                    </div>
                                    @endforeach
                                    <!-- End Product Default Single Item -->
                                </div>
                            </div>
                            <!-- If we need navigation buttons -->
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-button-next"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Product Default Slider Section -->

    <!-- Start Banner Section -->
    <div class="banner-section">
        <div class="banner-wrapper clearfix">
            <!-- Start Banner Single Item -->
            <div class="banner-single-item banner-style-4 banner-animation banner-color--golden float-left img-responsive"
                data-aos="fade-up" data-aos-delay="0">
                <div class="image">
                    <img class="img-fluid" src="{{asset('assets/images/banner/1.jpg')}}" alt="">
                </div>
                <a href="{{url('category/sneakers')}}" class="content">
                    <div class="inner">
                        <h4 class="title">Sneakers</h4>
                        {{-- <h6 class="sub-title">20 products</h6> --}}
                    </div>
                    <span class="round-btn"><i class="ion-ios-arrow-thin-right"></i></span>
                </a>
            </div>
            <!-- End Banner Single Item -->
            <!-- Start Banner Single Item -->
            <div class="banner-single-item banner-style-4 banner-animation banner-color--golden float-left img-responsive"
                data-aos="fade-up" data-aos-delay="200">
                <div class="image">
                    <img class="img-fluid" src="{{asset('assets/images/banner/bp.jpg')}}" alt="">
                </div>
                <a href="{{url('category/backpacks')}}" class="content">
                    <div class="inner">
                        <h4 class="title">BackPacks</h4>
                        {{-- <h6 class="sub-title">20 products</h6> --}}
                    </div>
                    <span class="round-btn"><i class="ion-ios-arrow-thin-right"></i></span>
                </a>
            </div>
            <!-- End Banner Single Item -->
            <!-- Start Banner Single Item -->
            <div class="banner-single-item banner-style-4 banner-animation banner-color--golden float-left img-responsive"
                data-aos="fade-up" data-aos-delay="400">
                <div class="image">
                    <img class="img-fluid" src="{{asset('assets/images/banner/top.jpeg')}}" alt="">
                </div>
                <a href="{{url('category/tshirt')}}" class="content">
                    <div class="inner">
                        <h4 class="title">Tshirt</h4>
                        {{-- <h6 class="sub-title">20 products</h6> --}}
                    </div>
                    <span class="round-btn"><i class="ion-ios-arrow-thin-right"></i></span>
                </a>
            </div>
            <!-- End Banner Single Item -->
            <!-- Start Banner Single Item -->
            <div class="banner-single-item banner-style-4 banner-animation banner-color--golden float-left img-responsive"
                data-aos="fade-up" data-aos-delay="600">
                <div class="image">
                    <img class="img-fluid" src="{{asset('assets/images/banner/a.jpg')}}" alt="">
                </div>
                <a href="{{url('category/accessories')}}" class="content">
                    <div class="inner">
                        <h4 class="title">Accessories</h4>
                        {{-- <h6 class="sub-title">20 products</h6> --}}
                    </div>
                    <span class="round-btn"><i class="ion-ios-arrow-thin-right"></i></span>
                </a>
            </div>
            <!-- End Banner Single Item -->
        </div>
    </div>
    <!-- End Banner Section -->

    <!-- Start Instagramr Section -->
 <div class="instagram-section section-top-gap-100 section-inner-bg">
    <div class="instagram-wrapper" data-aos="fade-up" data-aos-delay="0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="instagram-box">
                        <div id="instagramFeed" class="instagram-grid clearfix">
                            <a href="https://www.instagram.com/greyb.vn/" target="_blank"
                                class="instagram-image-link float-left banner-animation"><img
                                    src="assets/images/instagram/instagram-1.jpg" alt=""></a>
                            <a href="https://www.instagram.com/greyb.vn/" target="_blank"
                                class="instagram-image-link float-left banner-animation"><img
                                    src="assets/images/instagram/instagram-2.jpg" alt=""></a>
                            <a href="https://www.instagram.com/greyb.vn/" target="_blank"
                                class="instagram-image-link float-left banner-animation"><img
                                    src="assets/images/instagram/instagram-3.jpg" alt=""></a>
                            <a href="https://www.instagram.com/greyb.vn/" target="_blank"
                                class="instagram-image-link float-left banner-animation"><img
                                    src="assets/images/instagram/instagram-4.jpg" alt=""></a>
                            <a href="https://www.instagram.com/greyb.vn/" target="_blank"
                                class="instagram-image-link float-left banner-animation"><img
                                    src="assets/images/instagram/instagram-5.jpg" alt=""></a>
                            <a href="https://www.instagram.com/greyb.vn/" target="_blank"
                                class="instagram-image-link float-left banner-animation"><img
                                    src="assets/images/instagram/instagram-6.jpg" alt=""></a>
                        </div>
                        <div class="instagram-link">
                            <h5>
                                <a href="https://www.instagram.com/greyb.vn/" target="_blank"
                                    rel="noopener noreferrer">
                                    <p><span style="text-indent:10px;">Follow GreyB</span></p>
                                </a>
                            </h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Instagramr Section -->

<!-- Start Modal Quickview cart -->
<div class="modal fade" id="modalAddcart{{$hot->id}}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col text-right">
                            <button type="button" class="close modal-close" data-bs-dismiss="modal"
                                aria-label="Close">
                                <span aria-hidden="true"> <i class="fa fa-times"></i></span>
                            </button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="product-details-gallery-area mb-7">
                                <!-- Start Large Image -->
                                <div class="product-large-image modal-product-image-large swiper-container">
                                    <div class="swiper-wrapper">
                                        <div class="product-image-large-image swiper-slide img-responsive">
                                            @foreach($product_hot_images[$hot->id] as $list)
                                                <div class="product-image-thumb-single swiper-slide">
                                                    <img class="img-fluid" src="{{asset('storage/media/Products/'. $list->images)}}"
                                                        alt="">
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <!-- End Large Image -->
                                <!-- Start Thumbnail Image -->
                                <div
                                    class="product-image-thumb modal-product-image-thumb swiper-container pos-relative mt-5">
                                    <div class="swiper-wrapper">
                                        @foreach($product_hot_images[$hot->id] as $list)
                                            <div class="product-image-large-image swiper-slide zoom-image-hover img-responsive">
                                                <img src="{{asset('storage/media/Products/'. $list->images)}}" alt="">
                                            </div>
                                        @endforeach
                                    </div>
                                    <!-- Add Arrows -->
                                    <div class="gallery-thumb-arrow swiper-button-next"></div>
                                    <div class="gallery-thumb-arrow swiper-button-prev"></div>
                                </div>
                                <!-- End Thumbnail Image -->
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="modal-product-details-content-area">
                                <!-- Start  Product Details Text Area-->
                                <div class="product-details-text">
                                    <h4 class="title"> {{$hot->name}}</h4>
                                    <div class="price"><span>Price: </span>{{number_format($hot->price)}} VND</div>
                                </div> <!-- End  Product Details Text Area-->
                                <div class="product-details-catagory mb-2">
                                    <span class="code" style="text-transform:uppercase">Code: </span>
                                    <ul>
                                        <li><a href="#" style="color: #b19361">{{$hot->code}}</a></li>
                                    </ul>
                                </div> <!-- End  Product Details Catagories Area-->
                                <!-- Start Product Variable Area -->
                                <div class="product-details-variable">
                                    <!-- Product Variable Single Item -->
                                    <div class="variable-single-item">
                                        <span>Size</span>
                                        <div class="sizes_wrap">
                                            <div class="size-details" onclick="showColor('37')">37</div>
                                            <div class="size-details" onclick="showColor('38')">38</div>
                                            <div class="size-details" onclick="showColor('39')">39</div>
                                            <div class="size-details" onclick="showColor('40')">40</div>
                                        </div>
                                    </div>
                                    <!-- Product Variable Single Item -->
                                    <div class="d-flex align-items-center flex-wrap">
                                        <div class="variable-single-item ">
                                            <span>Quantity</span>
                                            <div class="product-variable-quantity">
                                                <input min="1" max="100" value="1" type="number" onkeypress="return isNumberKey(event)">
                                            </div>
                                        </div>

                                        <div class="product-add-to-cart-btn add2cartIndex">
                                            <p>Add To Cart</p>
                                        </div>
                                    </div>
                                </div> <!-- End Product Variable Area -->
                                <div class="modal-product-about-text">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia iste
                                        laborum ad impedit pariatur esse optio tempora sint ullam autem deleniti nam
                                        in quos qui nemo ipsum numquam, reiciendis maiores quidem aperiam, rerum vel
                                        recusandae</p>
                                </div>
                                <!-- Start  Product Details Social Area-->
                                <div class="modal-product-details-social">
                                    <span class="title">SHARE THIS PRODUCT</span>
                                    <ul>
                                        <li><a href="#"><i class="fab fa-facebook-square"></i></a></li>
                                        <li><a href="#"><i class="fab fa-twitter-square"></i></a></li>
                                        <li><a href="#"><i class="fab fa-pinterest-square"></i></a></li>
                                        <li><a href="#"><i class="fab fa-google-plus-square"></i></a></li>
                                        <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                                    </ul>

                                </div> <!-- End  Product Details Social Area-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> <!-- End Modal Quickview cart -->

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
