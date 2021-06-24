@extends('front/layout')
@section('page_title', 'My Order')
@section('container')
<!-- ...:::: Start Breadcrumb Section:::... -->
<div class="breadcrumb-section breadcrumb-bg-color--golden">
    <div class="breadcrumb-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3 class="breadcrumb-title">My Order</h3>
                    <div class="breadcrumb-nav breadcrumb-nav-color--black breadcrumb-nav-hover-color--golden">
                        <nav aria-label="breadcrumb">
                            <ul>
                                <li><a href="{{url('/')}}">Home</a></li>
                                <li><a href="{{url('category/sneakers')}}">Shop</a></li>
                                <li class="active" aria-current="page">My Order</li>
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
            <div class="col-sm-12 col-md-4 col-lg-3">
                <!-- Nav tabs -->
                <div class="dashboard_tab_button" data-aos="fade-up" data-aos-delay="0">
                    <ul role="tablist" class="nav flex-column dashboard-list">
                        <li><a href="{{url('/my_account')}}/{{session('FRONT_USER_ID')}}"
                            class="nav-link btn btn-block btn-md btn-black-default-hover">Account details</a></li>
                        <li><a href="{{url('/order')}}" data-bs-toggle="tab"
                                class="nav-link btn btn-block btn-md btn-black-default-hover active">Orders</a></li>
                        <li><a href="{{url('/logout')}}"
                                class="nav-link btn btn-block btn-md btn-black-default-hover">logout</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-12 col-md-8 col-lg-9 account-content">
                <!-- Tab panes -->
                <div class="tab-content dashboard_content" data-aos="fade-up" data-aos-delay="0">
                    @if(isset($orders[0]))
                    <div class="tab-pane fade show active" id="orders">
                        <div class="table_page table-responsive">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Order</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                        <th>Total</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($orders as $item)
                                    <tr>
                                        <input type="hidden" class="updateStatusbtn" value="{{$item->id}}">
                                        <td>{{$item->id}}</td>
                                        <td>{{$item->updated_at}}</td>
                                        <td><span class="success">{{$item->orders_status}}</span></td>
                                        <td>{{number_format($item->total_amt)}} VND</td>
                                        <td> 
                                            @if($item->orders_status == 'Pending')
                                            <div class="order-action row">
                                                <button type="button" class="btn btn-md btn-black-default-hover mt-7 cancelbtn" style="margin-top: 0 !important; width: 40px;" data-toggle="tooltip" data-placement="top" title="Cancel Order">
                                                    <i class="fas fa-trash" style="margin: 0 auto"></i>
                                                </button>
                                                <div class="col-6 col-md-4 offset-md-4" style="margin-left: 0 !important">
                                                    <a href="{{url('order_detail')}}/{{$item->id}}"" class="btn btn-md btn-black-default-hover mt-7" data-toggle="tooltip" data-placement="top" title="Order Detail"
                                                        style="margin-top: 0 !important; width: 40px;"><i class="fas fa-clipboard"></i></a>
                                                </div>
                                            </div>
                                            @elseif($item->orders_status == 'Shipping')
                                            <div class="order-action row">
                                                <div class="col-6 col-md-4 offset-md-4" style="margin-left: 0 !important;">
                                                    <button type="button" class="btn btn-md btn-black-default-hover mt-7 confirmbtn" style="margin-top: 0 !important; width: 40px;" data-toggle="tooltip" data-placement="top" title="Received">
                                                        <i class="fas fa-box-open" style="margin: 0 auto"></i>
                                                    </button>
                                                </div>
                                                <div class="col-6 col-md-4 offset-md-4" style="margin-left: 0 !important">
                                                    <a href="{{url('order_detail')}}/{{$item->id}}"" class="btn btn-md btn-black-default-hover mt-7" data-toggle="tooltip" data-placement="top" title="Order Detail"
                                                         style="margin-top: 0 !important; width: 40px;"><i class="fas fa-clipboard"></i></a>
                                                </div>
                                            </div>
                                            @elseif($item->orders_status == 'Fail' || $item->orders_status == 'Received')
                                            <div class="order-action row">
                                                <div class="col-6 col-md-4 offset-md-4" style="margin-left: 0 !important">
                                                    <a href="{{url('order_detail')}}/{{$item->id}}"" class="btn btn-md btn-black-default-hover mt-7" data-toggle="tooltip" data-placement="top" title="Order Detail"
                                                        style="margin-top: 0 !important; width: 40px;"><i class="fas fa-clipboard"></i></a>
                                                </div>
                                            </div>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    @else
                    <div class="empty-cart-section section-fluid">
                        <div class="emptycart-wrapper">
                            <div class="container">
                                <div class="row">
                                    <div class="col-12 col-md-10 offset-md-1 col-xl-6 offset-xl-3">
                                        <div class="emptycart-content text-center">
                                            <div class="image">
                                                <img class="img-fluid" src="assets/images/emprt-cart/empty-cart.png" alt="">
                                            </div>
                                            <h4 class="title">Your Order is Empty</h4>
                                            <h6 class="sub-title">Sorry Mate... You don't have any orders yet!</h6>
                                            <a href="{{url('/')}}" class="btn btn-lg btn-golden">Back to Homepage</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> 
                    @endif
                </div>
                {{-- {{$orders->links('front.pagination')}} --}}
            </div>
        </div>
    </div>
</div> <!-- ...:::: End Account Dashboard Section:::... -->

@endsection
