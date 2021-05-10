@extends('admin/layout')

@section('page_title', 'Customer')

@section('container')

<div class="content">

                <!-- Start Content-->
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <h3 class="page-title">Customer</h3>
                                <div class="page-title-right">
                                    <ol class="breadcrumb p-0 m-0">
                                        <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Home</a></li>
                                        <li class="breadcrumb-item active"><a href="{{url('admin/customer')}}">Customer</a></li>
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
                                                                        colspan="1" style="width: 50px;">ID
                                                                    </th>
                                                                    <th class="sorting" tabindex="0"
                                                                        aria-controls="datatable" rowspan="1"
                                                                        colspan="1" style="width: 50px;">Name
                                                                    </th>
                                                                    <th class="sorting" tabindex="0"
                                                                        aria-controls="datatable" rowspan="1"
                                                                        colspan="1" style="width: 50px;">Email
                                                                    </th>
                                                                    <th class="sorting" tabindex="0"
                                                                        aria-controls="datatable" rowspan="1"
                                                                        colspan="1" style="width: 50px;">Mobile
                                                                    </th>
                                                                    <th class="sorting" tabindex="0"
                                                                        aria-controls="datatable" rowspan="1"
                                                                        colspan="1" style="width: 50px;">Address
                                                                    </th>
                                                                    <th rowspan="1" colspan="1" style="width: 50px;">
                                                                        Created At
                                                                    </th>
                                                                    <th rowspan="1" colspan="1" style="width: 50px;">
                                                                        Action
                                                                    </th>
                                                                </tr>
                                                            </thead>

                                                            <tbody>
                                                                @foreach($data as $item)
                                                                <tr role="row" class="odd product_content text-center">
                                                                    <td>{{$item->id}}</td>
                                                                    <td>{{$item->name}}</td>
                                                                    <td>{{$item->email}}</td>
                                                                    <td>{{$item->mobile}}</td>
                                                                    <td>{{$item->address}}</td>
                                                                    <td>{{$item->created_at}}</td>
                                                                    <td>
                                                                        <a href="{{url('admin/customer/show')}}/{{$item->id}}">
                                                                            <button class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="View">
                                                                                <i class="ion ion-md-color-filter"></i>
                                                                            </button>
                                                                        </a>

                                                                        @if ($item->status==0)
                                                                            <a href="{{url('admin/customer/status/1')}}/{{$item->id}}">
                                                                                <button class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Deactive">
                                                                                    <i class="ion ion-md-eye-off"></i>
                                                                                </button>
                                                                            </a>
                                                                        @elseif ($item->status==1)
                                                                            <a href="{{url('admin/customer/status/0')}}/{{$item->id}}">
                                                                                <button class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Active">
                                                                                    <i class="ion ion-md-eye"></i>
                                                                                </button>
                                                                            </a>
                                                                        @endif
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