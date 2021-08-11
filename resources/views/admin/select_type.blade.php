@extends('admin/layout')

@section('page_title', 'Manage Product')
@section('container')

<div class="content">
    <!-- Start Content-->
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <h3 class="page-title">Select Product Type</h3>
                        <div class="page-title-right">
                            <ol class="breadcrumb p-0 m-0">
                                <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Home</a></li>
                                <li class="breadcrumb-item"><a href="#">Product Management</a></li>
                                <li class="breadcrumb-item active">Select Product Type</li>
                            </ol>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <!-- end page title -->
        </div>
        <!-- end container-fluid -->
        <div class="row">
            <div class="col-lg-4">
                <a href="{{url('admin/product/manage_shoes')}}" style="color: #8f798f !important">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Add New Shoes</h5>
                            <p class="card-text">We are Footway and we sell shoes online. We need new, great product descriptions packed with fun and relevant information for our customers.
                            </p>
                            <p class="card-text">
                                <small class="text-muted">Last updated 3 mins ago</small>
                            </p>
                        </div>
                        <img style="height:215px;" class="card-img-bottom img-fluid" src="{{asset('admin_assets/images/shoes.png')}}" alt="Card image cap">
                    </div>
                </a>
            </div>
            <div class="col-lg-4">
                <a href="{{url('admin/product/manage_shirt')}}" style="color: #8f798f !important">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Add New T-Shirt</h5>
                            <p class="card-text">A T-shirt, or tee shirt, is a style of fabric shirt named after the T shape of its body and sleeves. Traditionally, it has short sleeves and a round neckline, which lacks a collar
                            </p>
                            <p class="card-text">
                                <small class="text-muted">Last updated 3 mins ago</small>
                            </p>
                        </div>
                        <img style="height:215px;" class="card-img-bottom img-fluid" src="{{asset('admin_assets/images/shirt.jpg')}}" alt="Card image cap">
                    </div>
                </a>
            </div>
            <div class="col-lg-4">
                <a href="{{url('admin/product/manage_accessory')}}" style="color: #8f798f !important">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Add New Accessory</h5>
                            <p class="card-text">In fashion, an accessory is an item used to contribute, in a secondary manner. Accessories are often chosen to complete an outfit and complement the wearer's look.
                            </p>
                            <p class="card-text">
                                <small class="text-muted">Last updated 3 mins ago</small>
                            </p>
                        </div>
                        <img style="height:215px;" class="card-img-bottom img-fluid" src="{{asset('admin_assets/images/accessory.png')}}" alt="Card image cap">
                    </div>
                </a>
            </div>
        </div>
    </div>

@endsection
            