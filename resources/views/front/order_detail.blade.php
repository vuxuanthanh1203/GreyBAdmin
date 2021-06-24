@extends('front/layout')
@section('page_title', 'Order Details')
@section('container')

<!-- ...:::: Start Breadcrumb Section:::... -->
<div class="breadcrumb-section breadcrumb-bg-color--golden">
    <div class="breadcrumb-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3 class="breadcrumb-title">Order Details</h3>
                    <div class="breadcrumb-nav breadcrumb-nav-color--black breadcrumb-nav-hover-color--golden">
                        <nav aria-label="breadcrumb">
                            <ul>
                                <li><a href="{{url('/')}}">Home</a></li>
                                <li><a href="{{url('category/sneakers')}}">Shop</a></li>
                                <li class="active" aria-current="page">Order Details</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> <!-- ...:::: End Breadcrumb Section:::... -->

 <!-- ...:::: Start Account Dashboard Section:::... -->
 <div class="account-dashboard">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-4" data-aos="fade-up" data-aos-delay="200">
                <!-- Start Contact Details -->
                <div class="contact-details-wrapper section-top-gap-100 aos-init aos-animate" style="margin-bottom: 30px;" >
                    <div class="contact-details">
                        <!-- Start Contact Details Single Item -->
                        <div class="contact-details-single-item">
                            <div class="contact-details-icon">
                                <i class="fa fa-user"></i>
                            </div>
                            <div class="contact-details-content contact-phone">
                                <p>{{$orders_details[0]->name}}</p>
                            </div>
                        </div> <!-- End Contact Details Single Item -->
                        <!-- Start Contact Details Single Item -->
                        <div class="contact-details-single-item">
                            <div class="contact-details-icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="contact-details-content contact-phone">
                                <p>{{$orders_details[0]->mobile}}</p>
                            </div>
                        </div> <!-- End Contact Details Single Item -->
                        <!-- Start Contact Details Single Item -->
                        <div class="contact-details-single-item">
                            <div class="contact-details-icon">
                                <i class="fa fa-envelope"></i>
                            </div>
                            <div class="contact-details-content contact-phone">
                                <p>{{$orders_details[0]->email}}</p>
                            </div>
                        </div> <!-- End Contact Details Single Item -->
                        <!-- Start Contact Details Single Item -->
                        <div class="contact-details-single-item">
                            <div class="contact-details-icon">
                                <i class="fa fa-map-marker"></i>
                            </div>
                            <div class="contact-details-content contact-phone">
                                <p>{{$orders_details[0]->address}}</p>
                            </div>
                        </div> <!-- End Contact Details Single Item -->
                    </div>
                </div> <!-- End Contact Details -->
            </div>
            <div class="col-sm-12 col-md-12 col-lg-8" data-aos="fade-up" data-aos-delay="200">
                <!-- Tab panes -->
                <div class="tab-content dashboard_content">
                    <div class="tab-pane fade show active" id="orders">
                        <div class="table_page table-responsive">
                            <table>
                                <!-- Start Cart Table Head -->
                                <thead>
                                    <tr>
                                        <th class="product_name">ID</th>
                                        <th class="product_thumb">Image</th>
                                        <th class="product_name">Product</th>
                                        <th class="product_name">Size</th>
                                        <th class="product-price">Price</th>
                                        <th class="product_quantity">Quantity</th>
                                        <th class="product_total">Total</th>
                                    </tr>
                                </thead> <!-- End Cart Table Head -->
                                
                                <tbody>
                                    <!-- Start Cart Single Item-->
                                    @foreach($orders_details as $data)
                                    <tr>
                                        <td class="product_name">
                                            <p>{{$data->id}}</p>
                                        </td>
                                        <td class="product_thumb">
                                            <a href="/product/{{$data->pslug}}">
                                                <img src="{{asset('storage/media/Products/'. $data->pimage)}}" alt="">
                                            </a>
                                        </td>
                                        <td class="product_name">
                                            <a href="/product/{{$data->pslug}}">{{$data->pname}}</a>
                                        </td>
                                        <td class="product_name">
                                            <p>{{$data->size}}</p>
                                        </td>
                                        <td class="product_name">{{number_format($data->pprice)}} VND</td>
                                        <td class="product_quantity">{{$data->qty}}</td>
                                        <td class="product_total" >{{number_format($data->price * $data->qty)}} VND</td>
                                    </tr> <!-- End Cart Single Item-->
                                    @endforeach  
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row" style="margin-top: 40px">
                    <div class="col-lg-4 col-md-4"></div>
                    <div class="col-lg-8 col-md-8">
                        <div class="coupon_code right" style="margin: 0 !important">
                            <h3>Order Totals</h3>
                            <div class="coupon_inner">
                                <div class="cart_subtotal">
                                    <p>Total</p>
                                    <p class="cart_amount">{{number_format($orders_details[0]->total_amt)}} VND</p>
                                </div>
                                <div class="checkout_btn">
                                    <a href="{{url('/order')}}" class="btn btn-md btn-golden">Back to My Order</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> <!-- ...:::: End Account Dashboard Section:::... -->

<!-- Start Coupon Start -->
<div class="coupon_area" >
    <div class="container">
        
    </div>
</div> <!-- End Coupon Start -->

@endsection
