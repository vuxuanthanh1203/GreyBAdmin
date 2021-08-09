@extends('admin/layout')

@section('page_title', 'Dashboard')
@section('container')


<div class="content">

    <!-- Start Content-->
    <div class="container-fluid count-total">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h3 class="page-title">Dashboard</h3>
                    <div class="page-title-right">
                        <ol class="breadcrumb p-0 m-0">
                            <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-md-6 col-xl-4">
                <div class="card-box">
                    <div class="row">
                        <div class="col-4">
                            <div class="avatar-md bg-warning rounded-circle">
                                <i class="ion-md-cart avatar-title font-26 text-white"></i>
                            </div>
                        </div>
                        <div class="col-8">
                            <div class="text-right">
                                <h3 class="my-0 font-weight-bold"><span data-plugin="counterup">{{$order}}</span></h3>
                                <p class="mb-0 mt-1 text-truncate">Total Orders</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end card-box-->
            </div>

            <div class="col-md-6 col-xl-4">
                <div class="card-box">
                    <div class="row">
                        <div class="col-4">
                            <div class="avatar-md bg-success rounded-circle">
                                <i class="ion-md-contacts avatar-title font-26 text-white"></i>
                            </div>
                        </div>
                        <div class="col-8">
                            <div class="text-right">
                                <h3 class="my-0 font-weight-bold"><span data-plugin="counterup">{{$customer}}</span></h3>
                                <p class="mb-0 mt-1 text-truncate">Total Users</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end card-box-->
            </div>

            <div class="col-md-6 col-xl-4">
                <div class="card-box">
                    <div class="row">
                        <div class="col-4">
                            <div class="avatar-md bg-primary rounded-circle">
                                <i class=" ion ion-md-jet avatar-title font-26 text-white"></i>
                            </div>
                        </div>
                        <div class="col-8">
                            <div class="text-right">
                                <h3 class="my-0 font-weight-bold"><span data-plugin="counterup">{{$product}}</span></h3>
                                <p class="mb-0 mt-1 text-truncate">Total Product</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end card-box-->
            </div>
        </div>
    </div>
    <!-- end container-fluid -->

    <!-- Charts Start -->

    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="filter-form">
                    <h4 class="header-title mb-4">Sales Order Statistics</h4>
                    <form autocomplete="off">
                    @csrf
                        <div class="form-row">
                            <div class="form-group col-md-2">
                                <label for="datepicker" class="col-form-label">From date: </label>
                                <input type="text" class="form-control" id="datepicker">
                            </div>
                            <div class="form-group col-md-2">
                                <label for="datepicker2" class="col-form-label">To date: </label>
                                <input type="text" class="form-control" id="datepicker2">
                            </div>
                            <div class="form-group col-md-2">
                                <label for="filterBy" class="col-form-label">Filter by</label>
                                <select id="filterBy" class="form-control dashboard-filter">
                                    <option>-- Select --</option>
                                    <option value="week">7 days ago</option>
                                    <option value="lastMonth">Last Month</option>
                                    <option value="thisMonth">This Month</option>
                                    <option value="year">365 days ago</option>
                                </select>
                            </div>
                            <div class="form-group col-md-2">
                                <label class="col-form-label" style="display:block;">&nbsp;&nbsp;&nbsp;</label>
                                <input type="button" id="btn-dashboard-filter" value="Filter" class="btn btn-primary">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-12">
                    <div id="myfirstchart" style="height: 250px;"></div>
                </div>
                <!-- end card-->
            </div>
        </div>
        <!-- end col -->

    </div>

    <!-- End Charts -->


</div>
<!-- end content -->
@endsection
