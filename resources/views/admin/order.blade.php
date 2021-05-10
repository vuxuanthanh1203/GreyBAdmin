@extends('admin/layout')

@section('page_title', 'Order')

@section('container')

<div class="content">

                <!-- Start Content-->
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <h3 class="page-title">Order Pending</h3>
                                <div class="page-title-right">
                                    <ol class="breadcrumb p-0 m-0">
                                        <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Home</a></li>
                                        <li class="breadcrumb-item"><a href="#">Order</a></li>
                                        <li class="breadcrumb-item active"><a href="{{url('admin/order')}}">Order Pending</a></li>
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
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body table-responsive">
                                <div id="datatable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div id="datatable_wrapper"
                                                class="dataTables_wrapper dt-bootstrap4 no-footer">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <table id="datatable"
                                                            class="table table-bordered text-center dt-responsive nowrap dataTable no-footer dtr-inline"
                                                            style="border-collapse: collapse; border-spacing: 0px; width: 100%;"
                                                            role="grid" aria-describedby="datatable_info">
                                                            <thead class="thead-dark">
                                                                <tr role="row">
                                                                    <th class="sorting" tabindex="0"
                                                                        aria-controls="datatable" rowspan="1"
                                                                        colspan="1" style="width: 50px;">Order ID
                                                                    </th>
                                                                    <th class="sorting" tabindex="0"
                                                                        aria-controls="datatable" rowspan="1"
                                                                        colspan="1" style="width: 50px;">Customer Name
                                                                    </th>
                                                                    <th class="sorting" tabindex="0"
                                                                        aria-controls="datatable" rowspan="1"
                                                                        colspan="1" style="width: 50px;">Address
                                                                    </th>
                                                                    <th class="sorting" tabindex="0"
                                                                        aria-controls="datatable" rowspan="1"
                                                                        colspan="1" style="width: 50px;">Status
                                                                    </th>
                                                                    <th rowspan="1" colspan="1" style="width: 50px;">
                                                                        Order Date
                                                                    </th>
                                                                    <th rowspan="1" colspan="1" style="width: 50px;">
                                                                        Action
                                                                    </th>
                                                                </tr>
                                                            </thead>

                                                            <tbody>
                                                                @foreach($orders as $item)
                                                                <tr role="row" class="odd product_content text-center">
                                                                    <td>{{$item->id}}</td>
                                                                    <td>{{$item->name}}</td>
                                                                    <td>{{$item->address}}</td>
                                                                    <td>{{$item->orders_status}}</td>
                                                                    <td>{{$item->created_at}}</td>
                                                                    <td>
                                                                        <a href="{{url('admin/order_detail')}}/{{$item->id}}">
                                                                            <button class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Order Detail">
                                                                                <i class="fas fa-clipboard-list"></i>
                                                                            </button>
                                                                        </a>
                                                                        <a href="{{url('admin/order/status/2')}}/{{$item->id}}">
                                                                            <button class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Confirm">
                                                                                <i class="fas fa-check"></i>
                                                                            </button>
                                                                        </a>
                                                                        <a href="{{url('admin/order/status/3')}}/{{$item->id}}">
                                                                            <button class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Cancel">
                                                                                <i class="fas fa-times"></i>
                                                                            </button>
                                                                        </a>
                                                                    </td>
                                                                </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>

@endsection