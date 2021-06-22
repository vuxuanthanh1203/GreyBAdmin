@extends('front/layout')

@section('container')
<!-- ...:::: Start Breadcrumb Section:::... -->
<div class="breadcrumb-section breadcrumb-bg-color--golden">
    <div class="breadcrumb-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3 class="breadcrumb-title">Product Details</h3>
                    <div class="breadcrumb-nav breadcrumb-nav-color--black breadcrumb-nav-hover-color--golden">
                        <nav aria-label="breadcrumb">
                            <ul>
                                <li><a href="{{url('/')}}">Home</a></li>
                                <li><a href="{{url('category/sneakers')}}">Shop</a></li>
                                <li class="active" aria-current="page">Product Details</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ...:::: End Breadcrumb Section:::... -->

<!-- Start Product Details Section -->
<div class="product-details-section">
    <div class="container">
        <div class="row">
            <div class="col-xl-5 col-lg-6">
                <div class="product-details-gallery-area" data-aos="fade-up" data-aos-delay="0">
                    <!-- Start Large Image -->
                    <div class="product-large-image product-large-image-horaizontal swiper-container">
                        <div class="swiper-wrapper">
                            @if(isset($product_img[$product[0]->id][0]))
                                @foreach($product_img[$product[0]->id] as $list)
                                <div class="product-image-large-image swiper-slide zoom-image-hover img-responsive">
                                    <img src="{{asset('storage/media/Products/'. $list->images)}}" alt="">
                                </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <!-- End Large Image -->
                    <!-- Start Thumbnail Image -->
                    <div
                        class="product-image-thumb product-image-thumb-horizontal swiper-container pos-relative mt-5">
                        <div class="swiper-wrapper">
                            @if(isset($product_img[$product[0]->id][0]))
                                @foreach($product_img[$product[0]->id] as $list)
                                    <div class="product-image-thumb-single swiper-slide">
                                        <img class="img-fluid" src="{{asset('storage/media/Products/'. $list->images)}}"
                                            alt="">
                                    </div>
                                @endforeach
                            @endif
                        </div>
                        <!-- Add Arrows -->
                        <div class="gallery-thumb-arrow swiper-button-next"></div>
                        <div class="gallery-thumb-arrow swiper-button-prev"></div>
                    </div>
                    <!-- End Thumbnail Image -->
                </div>
            </div>
            <div class="col-xl-7 col-lg-6">
                @foreach ($product as $item)
                <div class="product-details-content-area product-details--golden" data-aos="fade-up"
                    data-aos-delay="200">
                    <!-- Start  Product Details Text Area-->
                    <div class="product-details-text">
                        <h4 class="title">{{$item->name}}</h4>
                        <div class="d-flex align-items-center">
                            <ul class="review-star">
                                <li class="fill"><i class="ion-android-star"></i></li>
                                <li class="fill"><i class="ion-android-star"></i></li>
                                <li class="fill"><i class="ion-android-star"></i></li>
                                <li class="fill"><i class="ion-android-star"></i></li>
                                <li class="empty"><i class="ion-android-star"></i></li>
                            </ul>
                            <a href="#" class="customer-review ml-2">(customer review )</a>
                        </div>
                        <div class="price">{{number_format($item->price)}} VND</div>
                        <div class="product-details-catagory mb-2">
                            <span class="code" style="text-transform:uppercase">Code: </span>
                            <ul>
                                <li><a href="{{$item->slug}}">{{$item->code}}</a></li>
                            </ul>
                        </div> <!-- End  Product Details Catagories Area-->
                    </div> <!-- End  Product Details Text Area-->
                    <!-- Start Product Variable Area -->
                    <div class="product-details-variable">
                        <!-- Product Variable Single Item -->
                        <div class="variable-single-item">
                            <span>Size</span>
                            <div class="sizes_wrap">
                                @php
                                $arrSize=[];
                                foreach($product_attr[$product[0]->id] as $attr){
                                    $arrSize[]=$attr->size;
                                }  
                                $arrSize=array_unique($arrSize);
                                @endphp
                                @foreach($arrSize as $attr)
                                @if($attr!='')
                                <div class="size-details" onclick="showColor('{{$attr}}')" id="size_{{$attr}}">{{$attr}}</div>
                                @endif                                
                            @endforeach  
                            </div>
                        </div>
                        <!-- Product Variable Single Item -->
                        <div class="d-flex align-items-center ">
                            <div class="product-add-to-cart-btn">
                                <p onclick="add_to_cart('{{$product[0]->id}}','{{$product_attr[$product[0]->id][0]->size_id}}')">+ Add To Cart</p>
                            </div>
                            <div class="variable-single-item ">
                                {{-- <span>Quantity</span> --}}
                                <div class="product-variable-quantity">
                                    <input min="1" max="100" value="1" type="hidden" name="qty" id="qty">
                                </div>
                            </div>
                        </div>
                        <!-- Start  Product Details Meta Area-->
                        <div class="product-details-meta mb-20">
                            <a href="#" class="icon-space-right"><i class="icon-heart"></i>Add to
                                wishlist</a>
                            <a href="#" class="icon-space-right"><i class="icon-refresh"></i>Compare</a>
                        </div> <!-- End  Product Details Meta Area-->
                    </div> <!-- End Product Variable Area -->

                    <!-- Start  Product Details Catagories Area-->
                    <div class="product-details-catagory mb-2">
                        <span class="title">CATEGORIES:</span>
                        <ul>
                            <li><a href="{{url('category/'.$item->category_slug)}}" style="text-transform:uppercase">{{$item->category_name}}</a></li>
                        </ul>
                    </div> <!-- End  Product Details Catagories Area-->


                    <!-- Start  Product Details Social Area-->
                    <div class="product-details-social">
                        <span class="title">SHARE THIS PRODUCT:</span>
                        <ul>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div> <!-- End  Product Details Social Area-->
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div> 
<!-- End Product Details Section -->

<!-- Start Product Content Tab Section -->
<div class="product-details-content-tab-section section-top-gap-100">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="product-details-content-tab-wrapper" data-aos="fade-up" data-aos-delay="0">
                    <!-- Start Product Details Tab Button -->
                    <ul class="nav tablist product-details-content-tab-btn d-flex justify-content-center">
                        <li><a class="nav-link active" data-bs-toggle="tab" href="#description">
                                Description
                            </a></li>
                    </ul> <!-- End Product Details Tab Button -->

                    <!-- Start Product Details Tab Content -->
                    <div class="product-details-content-tab">
                        <div class="tab-content">
                            <!-- Start Product Details Tab Content Singel -->
                            <div class="tab-pane active show" id="description">
                                <div class="single-tab-content-item">
                                    {{$item->desc}}
                                </div>
                            </div> <!-- End Product Details Tab Content Singel -->
                        </div>
                    </div> <!-- End Product Details Tab Content -->

                </div>
            </div>
        </div>
    </div>
</div> <!-- End Product Content Tab Section -->


<!-- Start Product Default Slider Section -->
<div class="product-default-slider-section section-top-gap-100 section-fluid">
    <!-- Start Section Content Text Area -->
    <div class="section-title-wrapper" data-aos="fade-up" data-aos-delay="0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-content-gap">
                        <div class="secton-content">
                            <h3 class="section-title">RELATED PRODUCTS</h3>
                            <p>Browse the collection of our related products.</p>
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
                                @foreach ($related_product as $item)
                                <div class="product-default-single-item product-color--golden swiper-slide">
                                    <div class="image-box">
                                        <a href="{{url('product/'.$item->slug)}}" class="image-link">
                                            <img src="{{asset('storage/media/Products/'.$item->image)}}">
                                        </a>
                                        <div class="action-link">
                                            <div class="action-link-left">
                                                <a href="{{url('product/'.$item->slug)}}" data-bs-toggle="modal"
                                                    data-bs-target="#modalAddcart">Add to Cart</a>
                                            </div>
                                            <div class="action-link-right">
                                                <a href="{{url('product/'.$item->slug)}}" data-bs-toggle="modal"
                                                    data-bs-target="#modalQuickview"><i
                                                        class="icon-magnifier"></i></a>
                                                <a href="#"><i class="icon-heart"></i></a>
                                                <a href="#"><i class="icon-shuffle"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="content">
                                        <div class="content-left">
                                            <h6 class="title"><a href="{{url('product/'.$item->slug)}}">{{$item->name}}</a></h6>
                                            
                                        </div>
                                        <div class="content-right">
                                            <ul class="review-star">
                                                <li class="fill"><i class="ion-android-star"></i></li>
                                                <li class="fill"><i class="ion-android-star"></i></li>
                                                <li class="fill"><i class="ion-android-star"></i></li>
                                                <li class="fill"><i class="ion-android-star"></i></li>
                                                <li class="empty"><i class="ion-android-star"></i></li>
                                            </ul>
                                            <span class="price">{{number_format($item->price)}} VND</span>
                                        </div>

                                    </div>
                                </div>
                                @endforeach
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

<form id="frmAddToCart">
    <input type="hidden" id="size_id" name="size_id">
    <input type="hidden" id="pqty" name="pqty"/>
    <input type="hidden" id="product_id" name="product_id"/>           
    @csrf
</form>
@endsection
