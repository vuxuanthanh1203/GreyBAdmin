@extends('admin/layout')

@section('page_title', 'Dashboard')
@section('container')


<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">

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
            <div class="col-md-6 col-xl-3">
                <div class="card-box">
                    <div class="row">
                        <div class="col-4">
                            <div class="avatar-md bg-info rounded-circle">
                                <i class="ion-logo-usd avatar-title font-26 text-white"></i>
                            </div>
                        </div>
                        <div class="col-8">
                            <div class="text-right">
                                <h3 class="my-0 font-weight-bold"><span data-plugin="counterup">15852</span></h3>
                                <p class="mb-0 mt-1 text-truncate">Total Sales</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end card-box-->
            </div>

            <div class="col-md-6 col-xl-3">
                <div class="card-box">
                    <div class="row">
                        <div class="col-4">
                            <div class="avatar-md bg-warning rounded-circle">
                                <i class="ion-md-cart avatar-title font-26 text-white"></i>
                            </div>
                        </div>
                        <div class="col-8">
                            <div class="text-right">
                                <h3 class="my-0 font-weight-bold"><span data-plugin="counterup">956</span></h3>
                                <p class="mb-0 mt-1 text-truncate">New Orders</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end card-box-->
            </div>

            <div class="col-md-6 col-xl-3">
                <div class="card-box">
                    <div class="row">
                        <div class="col-4">
                            <div class="avatar-md bg-success rounded-circle">
                                <i class="ion-md-contacts avatar-title font-26 text-white"></i>
                            </div>
                        </div>
                        <div class="col-8">
                            <div class="text-right">
                                <h3 class="my-0 font-weight-bold"><span data-plugin="counterup">5210</span></h3>
                                <p class="mb-0 mt-1 text-truncate">New Users</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end card-box-->
            </div>

            <div class="col-md-6 col-xl-3">
                <div class="card-box">
                    <div class="row">
                        <div class="col-4">
                            <div class="avatar-md bg-primary rounded-circle">
                                <i class="ion-md-eye avatar-title font-26 text-white"></i>
                            </div>
                        </div>
                        <div class="col-8">
                            <div class="text-right">
                                <h3 class="my-0 font-weight-bold"><span data-plugin="counterup">20544</span></h3>
                                <p class="mb-0 mt-1 text-truncate">Unique Visitors</p>
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
        <div class="col-xl-8">
            <div class="card">
                <div class="card-header py-3 bg-transparent">
                    <div class="card-widgets">
                        <a href="javascript:;" data-toggle="reload"><i class="mdi mdi-refresh"></i></a>
                        <a data-toggle="collapse" href="#cardCollpase3" role="button" aria-expanded="false" aria-controls="cardCollpase3"><i class="mdi mdi-minus"></i></a>
                        <a href="#" data-toggle="remove"><i class="mdi mdi-close"></i></a>
                    </div>
                    <h5 class="header-title mb-0"> Revenue </h5>
                </div>
                <div id="cardCollpase3" class="collapse show">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <canvas id="line-chart" width="669" height="334" style="display: block; box-sizing: border-box; height: 334px; width: 669.3px;"></canvas>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end card-->
            </div>
        </div>
        <!-- end col -->

        <div class="col-xl-4">
            <div class="card">
                <div class="card-header py-3 bg-transparent">
                    <div class="card-widgets">
                        <a href="javascript:;" data-toggle="reload"><i class="mdi mdi-refresh"></i></a>
                        <a data-toggle="collapse" href="#cardCollpase4" role="button" aria-expanded="false" aria-controls="cardCollpase4"><i class="mdi mdi-minus"></i></a>
                        <a href="#" data-toggle="remove"><i class="mdi mdi-close"></i></a>
                    </div>
                    <h5 class="header-title mb-0"> Payments </h5>
                </div>
                <div id="cardCollpase4" class="collapse show">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 mb-4">
                                <canvas id="pie-chart" width="301" height="301" style="display: block; box-sizing: border-box; height: 301px; width: 301.7px;"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end card-->
            </div>
            <!-- end col -->
        </div>
    </div>

    <!-- End Charts -->

</div>
<!-- end content -->
@endsection