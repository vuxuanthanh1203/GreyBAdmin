@extends('front/layout')
@section('page_title', 'Brand')
@section('container')

<!-- ...:::: Start Shop Section:::... -->
<div class="shop-section">
    <div class="container">
        <div class="row flex-column-reverse flex-lg-row">
            <div class="col-12" style="margin: 70px 0">
                <h3 class="breadcrumb-title text-center"> List Product </h3>
                <div class="breadcrumb-nav breadcrumb-nav-color--black breadcrumb-nav-hover-color--golden">
                    <nav aria-label="breadcrumb">
                        <ul>
                            <li><a href="{{url('/')}}">Home</a></li>
                            <li><a href="{{url('category/sneakers')}}">Shop</a></li>
                            <li class="active" aria-current="page">List Product</li>
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="col-lg-3">
                <!-- Start Sidebar Area -->
                <div class="siderbar-section" data-aos="fade-up" data-aos-delay="0">

                    <!-- Start Single Sidebar Widget -->
                    <div class="sidebar-single-widget">
                        <h6 class="sidebar-title">CATEGORIES</h6>
                        <div class="sidebar-content">
                            <ul class="sidebar-menu">
                                <li>
                                    <a href="{{url('category/sneakers')}}" >Sneakers</a>
                                </li>
                                <li>
                                    <a href="{{url('category/backpacks')}}" >BackPacks</a>
                                </li>
                                <li>
                                    <a href="{{url('category/tshirt')}}" >Tshirt</a>
                                </li>
                                <li>
                                    <a href="{{url('category/accessories')}}" >Accessories</a>
                                </li>
                            </ul>
                        </div>
                    </div> <!-- End Single Sidebar Widget -->
                    <div class="sidebar-single-widget">
                        <h6 class="sidebar-title">BRANDS</h6>
                        <div class="sidebar-content">
                            <ul class="sidebar-menu">
                                @foreach($brands_left as $brand_left)
                                    @if($slug==$brand_left->brand_name)
                                    <li><a href="{{url('brand/'.$brand_left->brand_name)}}" class="category_active">{{$brand_left->brand_name}}</a></li>
                                    @else
                                    <li><a href="{{url('brand/'.$brand_left->brand_name)}}">{{$brand_left->brand_name}}</a></li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </div> <!-- End Single Sidebar Widget -->

                    <!-- Start Single Sidebar Widget -->
                    <div class="sidebar-single-widget">
                        <h6 class="sidebar-title">FILTER BY PRICE</h6>
                        <div class="aa-sidebar-price-range">
                            <form action="">
                                <div id="skipstep" class="noUi-target noUi-ltr noUi-horizontal noUi-background">
                                </div>
                                <div class="range-amount">
                                    <div class="range-input">
                                        <div class="input-start">
                                            <input type="text" id="amount-start" readonly style="font-size:13px; color:#f6931f; font-weight:bold;">
                                            <span  style="font-size:13px; color:#f6931f; font-weight:bold;"> VND</span>
                                        </div>
                                        <div class="gach-noi">-</div>
                                        <div class="input-start">
                                            <input type="text" id="amount-end" readonly style="font-size:13px; color:#f6931f; font-weight:bold;">
                                            <span  style="font-size:13px; color:#f6931f; font-weight:bold;"> VND</span>
                                        </div>
                                    </div>
                                    <input type="hidden" name="start-price" id="start-price">
                                    <input type="hidden" name="end-price" id="end-price">
                                    <input class="aa-filter-btn" type="submit" value="Filter">
                                </div>
                            </form>
                         </div>
                    </div> 
                    <!-- End Single Sidebar Widget -->

                    <!-- Start Single Sidebar Widget -->
                    <div class="sidebar-single-widget">
                        <div class="sidebar-content">
                            <a href="{{url('/')}}" class="sidebar-banner img-hover-zoom">
                                <img class="img-fluid" src="{{asset('assets/images/banner/side-banner.jpg')}}" alt="">
                            </a>
                        </div>
                    </div> <!-- End Single Sidebar Widget -->

                </div> <!-- End Sidebar Area -->
            </div>
            <div class="col-lg-9"  data-aos="fade-up" data-aos-delay="0">
                <!-- Start Shop Product Sorting Section -->
                <div class="shop-sort-section">
                    <div class="container">
                        <div class="row">
                            <!-- Start Sort Wrapper Box -->
                            <div class="sort-box d-flex justify-content-between align-items-md-center align-items-start flex-md-row flex-column">
                                <!-- Start Sort tab Button -->
                                <div class="sort-tablist d-flex align-items-center"></div>
                                <!-- End Sort tab Button -->
                                <!-- Start Sort Select Option -->
                                <div class="sort-select-list d-flex align-items-center">
                                    <label class="mr-2">Sort By:</label>
                                    <form>
                                        @csrf
                                        <select name="sort" id="sort_by_value" class="select_sort">
                                            <option class="select_value" value="{{Request::url()}}?sort_by=default">     --- Filter ---      </option>
                                            <option class="select_value" value="{{Request::url()}}?sort_by=asc">Price: low to high</option>
                                            <option class="select_value" value="{{Request::url()}}?sort_by=dec">Price: high to low</option>
                                            <option class="select_value" value="{{Request::url()}}?sort_by=az">Name: A - Z</option>
                                            <option class="select_value" value="{{Request::url()}}?sort_by=za">Name: Z - A</option>
                                        </select>
                                    </form>
                                </div> <!-- End Sort Select Option -->
                            </div> <!-- Start Sort Wrapper Box -->
                        </div>
                    </div>
                </div> <!-- End Section Content -->

                <!-- Start Tab Wrapper -->
                <div class="sort-product-tab-wrapper">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="tab-content tab-animate-zoom">
                                    <!-- Start Grid View Product -->
                                    <div class="tab-pane active show sort-layout-single" id="layout-3-grid">
                                        <div class="row">
                                            @if(isset($product[0]))
                                            @foreach($product as $item)
                                            <div class="col-xl-4 col-sm-6 col-12">
                                                <!-- Start Product Default Single Item -->
                                                <div class="product-default-single-item product-color--golden">
                                                    <div class="image-box">
                                                        <a href="{{url('product/'.$item->slug)}}" class="image-link">
                                                            <img src="{{asset('storage/media/Products/'.$item->image)}}" alt="">
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
                                                                <a href="wishlist.html"><i
                                                                        class="icon-heart"></i></a>
                                                                <a href="compare.html"><i
                                                                        class="icon-shuffle"></i></a>
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
                                                <!-- End Product Default Single Item -->
                                            </div>
                                            @endforeach
                                            
                                            @endif
                                        </div>
                                    </div> <!-- End Grid View Product -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- End Tab Wrapper -->

                <!-- Start Pagination -->
                {{$product->links('front.pagination')}}
                <!-- End Pagination -->
            </div> <!-- End Shop Product Sorting Section  -->
        </div>
    </div>
</div> <!-- ...:::: End Shop Section:::... -->

@endsection
