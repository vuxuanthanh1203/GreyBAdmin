@extends('front/layout')
@section('page_title', 'My Order')
@section('container')

<!-- ...:::: Start Account Dashboard Section:::... -->
 <div class="account-dashboard">
    <div class="container">
        <div class="row">
            <div class="col-12" style="margin: 70px 0">
                <h3 class="breadcrumb-title text-center"> My Order </h3>
                <div class="breadcrumb-nav breadcrumb-nav-color--black breadcrumb-nav-hover-color--golden">
                    <nav aria-label="breadcrumb">
                        <ul>
                            <li><a href="{{url('/')}}">Home</a></li>
                            <li><a href="{{url('/my_account')}}">My Account</a></li>
                            <li class="active" aria-current="page">My Order</li>
                        </ul>
                    </nav>
                </div>
            </div>
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
                 <!-- Start Product Details Tab Button -->
                 <ul class="nav tablist product-details-content-tab-btn d-flex justify-content-center">
                    <li><a class="nav-link active" data-bs-toggle="tab" href="#pending">
                            Pending ({{$countP}})
                        </a></li>
                    <li><a class="nav-link" data-bs-toggle="tab" href="#shipping">
                            Shipping ({{$countS}})
                        </a></li>
                    <li><a class="nav-link" data-bs-toggle="tab" href="#related">
                            Successful ({{$countR}})
                        </a></li>
                    <li><a class="nav-link" data-bs-toggle="tab" href="#failed">
                            Cancelled ({{$countF}})
                    </a></li>
                </ul> <!-- End Product Details Tab Button -->

                <div class="product-details-content-tab tab-content dashboard_content" data-aos="fade-up" data-aos-delay="0">
                    <div class="tab-content">
                        @if(isset($ordersP[0]) || isset($ordersS[0]) || isset($ordersR[0]) || isset($ordersF[0]))
                        <div class="tab-pane fade show active" id="pending">
                            <div class="table_page single-tab-content-item table-responsive">
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
                                        @foreach($ordersP as $item)
                                        <tr>
                                            <input type="hidden" class="updateStatusbtn" value="{{$item->id}}">
                                            <td>{{$item->id}}</td>
                                            <td>{{$item->updated_at}}</td>
                                            <td><span class="success">{{$item->orders_status}}</span></td>
                                            <td>{{number_format($item->total_amt)}} VND</td>
                                            <td> 
                                                <div class="order-action row">
                                                    <div class="col-6 col-md-4 offset-md-4" style="margin-left: 0 !important">
                                                        <a href="#" class="btn btn-md btn-black-default-hover mt-7 cancelbtn" data-bs-toggle="modal" data-bs-target="#ModalCancel"
                                                            style="margin-top: 0 !important; width: 40px;"><i class="fas fa-trash"></i></a>
                                                    </div>
                                                    <div class="col-6 col-md-4 offset-md-4" style="margin-left: 0 !important">
                                                        <a href="{{url('order_detail')}}/{{$item->id}}" class="btn btn-md btn-black-default-hover mt-7" data-toggle="tooltip" data-placement="top" title="Order Detail"
                                                            style="margin-top: 0 !important; width: 40px;"><i class="fas fa-clipboard"></i></a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="shipping">
                            <div class="table_page single-tab-content-item table-responsive">
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
                                        @foreach($ordersS as $item)
                                        <tr>
                                            <input type="hidden" class="updateStatusbtn" value="{{$item->id}}">
                                            <td>{{$item->id}}</td>
                                            <td>{{$item->updated_at}}</td>
                                            <td><span class="success">{{$item->orders_status}}</span></td>
                                            <td>{{number_format($item->total_amt)}} VND</td>
                                            <td> 
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
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="related">
                            <div class="table_page single-tab-content-item table-responsive">
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
                                        @foreach($ordersR as $item)
                                        <tr>
                                            <input type="hidden" class="updateStatusbtn" value="{{$item->id}}">
                                            <td>{{$item->id}}</td>
                                            <td>{{$item->updated_at}}</td>
                                            <td><span class="success">{{$item->orders_status}}</span></td>
                                            <td>{{number_format($item->total_amt)}} VND</td>
                                            <td> 
                                                <div class="order-action row">
                                                    <div class="col-6 col-md-4 offset-md-4" style="margin-left: 0 !important">
                                                        <a href="{{url('order_detail')}}/{{$item->id}}"" class="btn btn-md btn-black-default-hover mt-7" data-toggle="tooltip" data-placement="top" title="Order Detail"
                                                            style="margin-top: 0 !important; width: 40px;"><i class="fas fa-clipboard"></i></a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="failed">
                            <div class="table_page single-tab-content-item table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Order</th>
                                            <th>Date</th>
                                            {{-- <th>Status</th> --}}
                                            <th>Total</th>
                                            <th>Message</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($ordersF as $item)
                                        <tr id="oid{{$item->id}}">
                                            {{-- <input type="hidden" class="updateStatusbtn" value="{{$item->id}}"> --}}
                                            <td>{{$item->id}}</td>
                                            <td>{{$item->updated_at}}</td>
                                            {{-- <td><span class="success">{{$item->orders_status}}</span></td> --}}
                                            <td>{{number_format($item->total_amt)}} VND</td>
                                            <td style="text-transform: none">{!!$item->note!!}</td>
                                            <td> 
                                                <div class="order-action row">
                                                    <div class="col-6 col-md-4 offset-md-4" style="margin-left: 0 !important">
                                                        <a href="{{url('order_detail')}}/{{$item->id}}" class="btn btn-md btn-black-default-hover mt-7" data-toggle="tooltip" data-placement="top" title="Order Detail"
                                                            style="margin-top: 0 !important; width: 40px;">
                                                            <i class="fas fa-clipboard"></i>
                                                        </a>
                                                    </div>
                                                </div>
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
                </div>
                {{-- {{$orders->links('front.pagination')}} --}}
            </div>
        </div>
    </div>
</div> <!-- ...:::: End Account Dashboard Section:::... -->

<div class="modal fade" id="ModalCancel" tabindex="-1" aria-modal="true" role="dialog" style="display: block; padding-right: 17px;">
    <div class="modal-dialog  modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col text-right">
                            <button type="button" class="close modal-close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true"> <i class="fa fa-times"></i></span>
                            </button>
                        </div>
                    </div>
                    <div class="cancel-modal">
                        <h3 style="margin-bottom: 20px;font-weight: 700;">Cancel Order</h3>
                        <form id="cancelForm">
                            @csrf
                            <input type="hidden" name="id" id="id">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="default-form-box mb-20">
                                        <label for="contact-message">Your Message</label>
                                        <textarea name="message" id="cancel-message" cols="30" rows="10" required></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <button class="btn btn-lg btn-black-default-hover" type="submit">SEND</button>
                                </div>
                                <p class="form-messege"></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
