@extends('front/layout')
@section('page_title', 'Search')
@section('container')

<!-- ...:::: Start Shop Section:::... -->
<div class="shop-section" style="margin: 70px 0">
    <div class="container">
        <div class="row flex-column-reverse flex-lg-row">
            <div class="col-lg-12" data-aos="fade-up" data-aos-delay="0">
                <!-- Start Tab Wrapper -->
                <div class="sort-product-tab-wrapper">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <h3 class="breadcrumb-title text-center">Result for "{{$key}}"</h3>
                                <div class="breadcrumb-nav breadcrumb-nav-color--black breadcrumb-nav-hover-color--golden">
                                    <nav aria-label="breadcrumb">
                                        <ul>
                                            <li><a href="{{url('/')}}">Home</a></li>
                                            <li><a href="#">Search</a></li>
                                            <li class="active" aria-current="page">{{$key}}</li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="tab-content tab-animate-zoom">
                                    <!-- Start Grid View Product -->
                                    <div class="tab-pane active show sort-layout-single" id="layout-3-grid">
                                        <div class="row">
                                            @if(isset($product[0]))
                                            @foreach($product as $item)
                                            <div class="col-xl-3 col-sm-4 col-12">
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
                                            @else
                                            <div class="empty-cart-section section-fluid" style="margin-bottom: 50px">
                                                <div class="emptycart-wrapper">
                                                    <div class="container">
                                                        <div class="row">
                                                            <div class="col-12 col-md-10 offset-md-1 col-xl-6 offset-xl-3">
                                                                <div class="emptycart-content text-center">
                                                                    <div class="image">
                                                                        <img class="img-fluid" src="{{asset('assets/images/emprt-cart/empty-cart.png')}}" alt="">
                                                                    </div>
                                                                    <h6 class="sub-title">No products found for this keyword</h6>
                                                                    <a href="{{url('/')}}" class="btn btn-lg btn-golden">Continue Shopping</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> <!-- ...::::End  About Us Center Section:::... -->
                                            @endif
                                        </div>
                                    </div> <!-- End Grid View Product -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- End Tab Wrapper -->

                <!-- Start Pagination -->
                {{-- {{$product->links('front.pagination')}} --}}
                <!-- End Pagination -->
            </div> <!-- End Shop Product Sorting Section  -->
        </div>
    </div>
</div> <!-- ...:::: End Shop Section:::... -->

<input type="hidden" id="qty" value="1"/>
  <form id="frmAddToCart">
    <input type="hidden" id="size_id" name="size_id"/>
    <input type="hidden" id="color_id" name="color_id"/>
    <input type="hidden" id="pqty" name="pqty"/>
    <input type="hidden" id="product_id" name="product_id"/>           
    @csrf
  </form> 
@endsection
