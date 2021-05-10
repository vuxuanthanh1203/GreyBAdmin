@extends('admin/layout')

@section('page_title', 'Size')

@section('container')

<div class="content">

                <!-- Start Content-->
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <h3 class="page-title">Size</h3>
                                <div class="page-title-right">
                                    <ol class="breadcrumb p-0 m-0">
                                        <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Home</a></li>
                                        <li class="breadcrumb-item"><a href="#">Product Management</a></li>
                                        <li class="breadcrumb-item active">Size</li>
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
                                <a href="{{url('admin/size/manage_size')}}" class="add-new">
                                    <button class="btn btn-success col-md-2">Add New</button>
                                </a>
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
                                                                        colspan="1" style="width: 50px;">Size
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
                                                                    <td>{{$item->size}}</td>
                                                                    <td>{{$item->created_at}}</td>
                                                                    <td>
                                                                        <a href="{{url('admin/size/manage_size')}}/{{$item->id}}">
                                                                            <button class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Edit">
                                                                                <i class="ion ion-md-color-filter"></i>
                                                                            </button>
                                                                        </a>

                                                                        @if ($item->status==0)
                                                                            <a href="{{url('admin/size/status/1')}}/{{$item->id}}">
                                                                                <button class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Deactive">
                                                                                    <i class="ion ion-md-eye-off"></i>
                                                                                </button>
                                                                            </a>
                                                                        @elseif ($item->status==1)
                                                                            <a href="{{url('admin/size/status/0')}}/{{$item->id}}">
                                                                                <button class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Active">
                                                                                    <i class="ion ion-md-eye"></i>
                                                                                </button>
                                                                            </a>
                                                                        @endif

                                                                        <a href="{{url('admin/size/delete')}}/{{$item->id}}">
                                                                            <button class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Delete">
                                                                                <i class=" ion ion-md-close"></i>
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