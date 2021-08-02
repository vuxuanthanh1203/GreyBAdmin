@extends('front/layout')
@section('page_title', 'Category')
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
                                @foreach($categories_left as $cat_left)
                                    @if($slug==$cat_left->category_slug)
                                    <li><a href="{{url('category/'.$cat_left->category_slug)}}" class="category_active">{{$cat_left->category_name}}</a></li>
                                    @else
                                    <li><a href="{{url('category/'.$cat_left->category_slug)}}">{{$cat_left->category_name}}</a></li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </div> <!-- End Single Sidebar Widget -->
                    <div class="sidebar-single-widget">
                        <h6 class="sidebar-title">BRANDS</h6>
                        <div class="sidebar-content">
                            <ul class="sidebar-menu">
                                <li>
                                    <a href="{{url('brand/converse')}}" >Converse</a>
                                </li>
                                <li>
                                    <a href="{{url('brand/puma')}}" >Puma</a>
                                </li>
                                <li>
                                    <a href="{{url('brand/vans')}}" >Vans</a>
                                </li>
                                <li>
                                    <a href="{{url('brand/fila')}}" >Fila</a>
                                </li>
                                <li>
                                    <a href="{{url('brand/greyb')}}" >GreyB</a>
                                </li>
                                
                            </ul>
                        </div>
                    </div> <!-- End Single Sidebar Widget -->

                    <!-- Start Single Sidebar Widget -->
                    {{-- <div class="sidebar-single-widget">
                        <h6 class="sidebar-title">FILTER BY PRICE</h6>
                        <div class="aa-sidebar-price-range">
                            <form action="">
                               <div id="skipstep" class="noUi-target noUi-ltr noUi-horizontal noUi-background">
                               </div>
                               <span id="skip-value-lower" class="example-val"></span>
                               <span id="skip-value-upper" class="example-val"></span>
                               <br>
                               <button class="aa-filter-btn" type="button" onclick="sort_price_filter()">Filter</button>
                            </form>
                         </div>
                    </div>  --}}
                    <!-- End Single Sidebar Widget -->

                    <!-- Start Single Sidebar Widget -->
                    <div class="sidebar-single-widget d-md-none">
                        <div class="sidebar-content">
                            <a href="{{url('/')}}" class="sidebar-banner img-hover-zoom">
                                <img class="img-fluid" src="{{asset('assets/images/banner/side-banner.jpg')}}" alt="">
                            </a>
                        </div>
                    </div> <!-- End Single Sidebar Widget -->

                </div> <!-- End Sidebar Area -->
            </div>
            <div class="col-lg-9" data-aos="fade-up" data-aos-delay="0">
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
                                    <form action="#">
                                        <select name="" onchange="sort_by()" id="sort_by_value" class="select_sort">
                                            <option class="select_value" value="" selected="Default">Sort by default</option>
                                            <option class="select_value" value="date">Sort by newness</option>
                                            <option class="select_value" value="name">Sort by name</option>
                                            <option class="select_value" value="price_asc">Sort by price: low to high</option>
                                            <option class="select_value" value="price_desc">Sort by price: high to low</option>
                                        </select>
                                    </form>
                                    {{-- {{$sort_txt}} --}}
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

<input type="hidden" id="qty" value="1"/>
  <form id="frmAddToCart">
    <input type="hidden" id="size_id" name="size_id"/>
    <input type="hidden" id="pqty" name="pqty"/>
    <input type="hidden" id="product_id" name="product_id"/>           
    @csrf
  </form>  

 <form id="categoryFilter">
    <input type="hidden" id="sort" name="sort" value="{{$sort}}"/>
    {{-- <input type="hidden" id="filter_price_start" name="filter_price_start" value="{{$filter_price_start}}"/>
    <input type="hidden" id="filter_price_end" name="filter_price_end" value="{{$filter_price_end}}"/> --}}
</form> 
@endsection
